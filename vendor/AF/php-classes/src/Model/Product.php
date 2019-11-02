<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Product extends Model
{

	const SESSION = "Product";
	const ERROR = "ProductError";
	const SUCCESS = "ProductSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_products;");

	}

	public static function getSPEDUnits()
	{

		$sql = new Sql();

		return $sql->select("
			SELECT DISTINCT des_reduced_measure_unit, des_measure_unit FROM tb_products WHERE des_storage_product = 1;");
	}

	public static function getTotalSPEDUnits()
	{

		$sql = new Sql();

		return $sql->select("SELECT COUNT(DISTINCT des_reduced_measure_unit, des_measure_unit) AS total_units FROM tb_products WHERE des_storage_product = 1;");
	}

	public static function getSPEDProducts()
	{

		$sql = new Sql();

		return $sql->select("SELECT *, (vl_sell_price * qtd) AS vl_price FROM tb_products WHERE des_storage_product = 1;");
	}

	public static function getSPEDTotal()
	{

		$sql = new Sql();

		return $sql->select("SELECT SUM((vl_sell_price * qtd)) AS total FROM tb_products WHERE des_storage_product = 1;");
	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_products_save(:des_description, :des_measure_unit, :vl_purchase_price, :vl_sell_price, :des_min_storage_product, :des_max_storage_product, :des_location, :des_group, :des_NCM, :des_reduced_measure_unit, :dt_last, :qtd, :des_storage_product)", array(

			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_measure_unit"=>$this->getdes_measure_unit(),
			":vl_purchase_price"=>$this->formatPriceDot($this->getvl_purchase_price()),
			":vl_sell_price"=>($this->formatPriceDot(($this->getvl_purchase_price())))*1.8,
			":des_min_storage_product"=>$this->getdes_min_storage_product(),
			":des_max_storage_product"=>$this->getdes_max_storage_product(),
			":des_location"=>$this->getdes_location(),
			":des_group"=>$this->getdes_group(),
			":des_NCM"=>$this->getdes_NCM(),
			":des_reduced_measure_unit"=>$this->getdes_reduced_measure_unit(),
			":dt_last"=>$this->getdt_last(),
			":qtd"=>$this->formatPriceDot($this->getqtd()),
			":des_storage_product"=>$this->getdes_storage_product(),
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Product::setSuccess("Produto cadastrado com sucesso.");
		} else {
			Product::setError("Erro no cadastro do produto.");
		}

	}

	public function get($id_product)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE id_product = :id_product;", array(
			":id_product"=>$id_product
		));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_productsupdate_save(:id_product, :des_description, :des_measure_unit, :vl_purchase_price, :vl_sell_price, :des_min_storage_product, :des_max_storage_product, :des_location, :des_group, :des_NCM, :des_reduced_measure_unit, :dt_last, :qtd, :des_storage_product)", array(

			":id_product"=>$this->getid_product(),
			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_measure_unit"=>$this->getdes_measure_unit(),
			":vl_purchase_price"=>$this->formatPriceDot($this->getvl_purchase_price()),
			":vl_sell_price"=>($this->formatPriceDot(($this->getvl_purchase_price())))*1.8,
			":des_min_storage_product"=>$this->getdes_min_storage_product(),
			":des_max_storage_product"=>$this->getdes_max_storage_product(),
			":des_location"=>$this->getdes_location(),
			":des_group"=>$this->getdes_group(),
			":des_NCM"=>$this->getdes_NCM(),
			":des_reduced_measure_unit"=>$this->getdes_reduced_measure_unit(),
			":dt_last"=>$this->getdt_last(),
			":qtd"=>$this->formatPriceDot($this->getqtd()),
			":des_storage_product"=>$this->getdes_storage_product(),
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Product::setSuccess("Produto alterado com sucesso.");
		} else {
			Product::setError("Erro no cadastro do produto.");
		}
		
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_products WHERE id_product = :id_product;", array(
			":id_product"=>$this->getid_product()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Product::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Product::ERROR]) && $_SESSION[Product::ERROR]) ? $_SESSION[Product::ERROR] : '';

		Product::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Product::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Product::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Product::SUCCESS]) && $_SESSION[Product::SUCCESS]) ? $_SESSION[Product::SUCCESS] : '';

		Product::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Product::SUCCESS] = NULL;

	}

}

 ?>