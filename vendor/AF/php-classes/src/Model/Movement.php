<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Movement extends Model
{

	const SESSION = "Movement";
	const ERROR = "MovementError";
	const SUCCESS = "MovementSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_movement, dt, des_description, tb_movements.id_product, tb_movements.qtd, des_destination, des_origin
			FROM tb_movements
			INNER JOIN tb_products
			ON tb_products.id_product = tb_movements.id_product;");

		return $results;

	}

	public static function findVehicleTools($id_vehicle, $des_destination)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT tb_movements.id_product, tb_products.des_description, tb_movements.qtd
			FROM tb_movements
			INNER JOIN tb_vehicles
			ON tb_vehicles.des_description = tb_movements.des_destination
			INNER JOIN tb_products
			ON tb_products.id_product = tb_movements.id_product
			WHERE des_destination = :des_destination AND tb_movements.qtd != 0
			GROUP BY tb_products.id_product;", array(
				":des_destination"=>$des_destination
			));

		return $results;

	}

	public static function findToolboxTools($id_toolbox, $des_destination)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT tb_movements.id_product, tb_products.des_description, tb_movements.qtd
			FROM tb_movements
			INNER JOIN tb_toolboxes
			ON tb_toolboxes.des_description = tb_movements.des_destination
			INNER JOIN tb_products
			ON tb_products.id_product = tb_movements.id_product
			WHERE des_destination = :des_destination AND tb_movements.qtd != 0
			GROUP BY tb_products.id_product;", array(
				":des_destination"=>$des_destination
			));

		return $results;

	}

	public static function findQtdToolsV($id_vehicle, $des_destination)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT COUNT(*) AS num_tools
			FROM tb_movements
			INNER JOIN tb_vehicles
			ON tb_vehicles.des_description = tb_movements.des_destination
			INNER JOIN tb_products
			ON tb_products.id_product = tb_movements.id_product
			WHERE des_destination = :des_destination AND tb_movements.qtd != 0;", array(
				":des_destination"=>$des_destination
			));

		return $results;

	}

	public static function findQtdToolsT($id_toolbox, $des_destination)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT COUNT(*) AS num_tools
			FROM tb_movements
			INNER JOIN tb_toolboxes
			ON tb_toolboxes.des_description = tb_movements.des_destination
			INNER JOIN tb_products
			ON tb_products.id_product = tb_movements.id_product
			WHERE des_destination = :des_destination AND tb_movements.qtd != 0;", array(
				":des_destination"=>$des_destination
			));

		return $results;

	}

	public static function findOrderMovements($des_origin)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT id_movement, dt, tb_movements.id_product, des_description, des_reduced_measure_unit, vl_purchase_price, vl_sell_price, tb_movements.qtd, (vl_sell_price * tb_movements.qtd) AS vl_price, des_destination, des_origin
			FROM tb_movements
			INNER JOIN tb_products
			ON tb_products.id_product = tb_movements.id_product
			WHERE des_destination = 'Serviço' AND des_origin = :des_origin AND tb_movements.qtd != 0;", array(
				":des_origin"=>$des_origin
			));

		return $results;

	}

	public static function findOrderMovementsT($des_origin)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT (SELECT SUM(vl_sell_price * tb_movements.qtd) 
			FROM tb_movements 
			INNER JOIN tb_products 
			ON tb_products.id_product = tb_movements.id_product 
			WHERE des_destination = 'Serviço' AND des_origin = :des_origin AND tb_movements.qtd != 0) AS vl_total;", array(
				":des_origin"=>$des_origin
			));

		return $results;

	}


	public function saveIn()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_movements_saveIn(:dt, :des_description, :qtd, :des_destination, :des_origin)", array(

			":dt"=>$this->getdt(),
			":des_description"=>$this->getdes_description(),
			":qtd"=>$this->formatPriceDot($this->getqtd()),
			":des_destination"=>$this->getdes_destination(),
			":des_origin"=>$this->getdes_origin()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Movement::setSuccess("Movimentação de entrada cadastrada com sucesso.");
		} else {
			Movement::setError("Erro no cadastro da movimentação de entrada.");
		}

	}

	public function saveOut()
	{
		$sql = new Sql();

		if (($this->getdes_destination() === 'Serviço' && $this->getdes_origin() === 'Avulsa') || 
			($this->getdes_destination() !== 'Serviço' && $this->getdes_origin() !== 'Avulsa') || 
			($this->getdes_destination() === 'E&Q' && $this->getdes_origin() !== 'Avulsa')) {

			Movement::setError("Movimentação inválida.");

	} else {

		$results = $sql->select("CALL sp_movements_saveOut(:dt, :des_description, :qtd, :des_destination, :des_origin)", array(

			":dt"=>$this->getdt(),
			":des_description"=>$this->getdes_description(),
			":qtd"=>$this->formatPriceDot($this->getqtd()),
			":des_destination"=>$this->getdes_destination(),
			":des_origin"=>$this->getdes_origin()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Movement::setSuccess("Movimentação de saída cadastrada com sucesso.");
		} else {
			Movement::setError("Erro no cadastro da movimentação de saída.");
		}
	}
}

public function saveReturn()
{

	$sql = new Sql();

	$results = $sql->select("CALL sp_movements_saveReturn(:dt, :des_description, :qtd, :des_destination, :des_origin)", array(

		":dt"=>$this->getdt(),
		":des_description"=>$this->getdes_description(),
		":qtd"=>$this->formatPriceDot($this->getqtd()),
		":des_destination"=>$this->getdes_destination(),
		":des_origin"=>$this->getdes_origin()
	));

	if (!empty($results[0]) ) {
		$this->setData($results[0]);
		Movement::setSuccess("Movimentação de retorno cadastrada com sucesso.");
	} else {
		Movement::setError("Erro no cadastro da movimentação de retorno.");
	}

}

public static function setError($msg)
{

	$_SESSION[Movement::ERROR] = $msg;

}

public static function getError()
{

	$msg = (isset($_SESSION[Movement::ERROR]) && $_SESSION[Movement::ERROR]) ? $_SESSION[Movement::ERROR] : '';

	Movement::clearError();

	return $msg;

}

public static function clearError()
{

	$_SESSION[Movement::ERROR] = NULL;

}

public static function setSuccess($msg)
{

	$_SESSION[Movement::SUCCESS] = $msg;

}

public static function getSuccess()
{

	$msg = (isset($_SESSION[Movement::SUCCESS]) && $_SESSION[Movement::SUCCESS]) ? $_SESSION[Movement::SUCCESS] : '';

	Movement::clearSuccess();

	return $msg;

}

public static function clearSuccess()
{

	$_SESSION[Movement::SUCCESS] = NULL;

}

}

?>