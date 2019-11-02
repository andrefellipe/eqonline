<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;
use \AF\Model\Order;

class Order extends Model
{

	const SESSION = "Order";
	const ERROR = "OrderError";
	const SUCCESS = "OrderSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_order, tb_clients.id_client, des_description, tb_clients.des_name, dt_start, dt_finish, des_description, des_equipament, des_model, des_number, des_solicitor, des_category
			FROM tb_orders
			INNER JOIN tb_clients
			ON tb_orders.id_client = tb_clients.id_client;
			");

		return $results;

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_orders_save(:des_name, :dt_start, :dt_finish, :des_description, :des_equipament, :des_model, :des_number, :des_solicitor, :des_category)", array(
			":des_name"=>$this->getdes_name(),
			":dt_start"=>$this->getdt_start(),
			":dt_finish"=>$this->getdt_finish(),
			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_equipament"=>$this->getdes_equipament(),
			":des_model"=>$this->getdes_model(),
			":des_number"=>$this->getdes_number(),
			":des_solicitor"=>$this->getdes_solicitor(),
			":des_category"=>$this->getdes_category()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Order::setSuccess("Ordem de serviço cadastrada com sucesso.");
		} else {
			Order::setError("Erro no cadastro da ordem de serviço.");
		}

	}

	public function get($id_order)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_order, tb_clients.id_client, tb_clients.des_name, dt_start, dt_finish, des_description, des_equipament, des_model, des_number, des_solicitor, des_category
			FROM tb_orders
			INNER JOIN tb_clients
			ON tb_orders.id_client = tb_clients.id_client
			WHERE id_order = :id_order;", array(
				":id_order"=>$id_order
		));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_ordersupdate_save(:id_order, :des_name, :dt_start, :dt_finish, :des_description, :des_equipament, :des_model, :des_number, :des_solicitor, :des_category)", array(
			
			":id_order"=>$this->getid_order(),
			":des_name"=>$this->getdes_name(),
			":dt_start"=>$this->getdt_start(),
			":dt_finish"=>$this->getdt_finish(),
			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_equipament"=>$this->getdes_equipament(),
			":des_model"=>$this->getdes_model(),
			":des_number"=>$this->getdes_number(),
			":des_solicitor"=>$this->getdes_solicitor(),
			":des_category"=>$this->getdes_category()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Order::setSuccess("Ordem de serviço alterada com sucesso.");
		} else {
			Order::setError("Erro no cadastro da ordem de serviço.");
		}

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_orders WHERE id_order = :id_order;", array(
			":id_order"=>$this->getid_order()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Order::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Order::ERROR]) && $_SESSION[Order::ERROR]) ? $_SESSION[Order::ERROR] : '';

		Order::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Order::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Order::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Order::SUCCESS]) && $_SESSION[Order::SUCCESS]) ? $_SESSION[Order::SUCCESS] : '';

		Order::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Order::SUCCESS] = NULL;

	}

}

 ?>