<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class BillToPay extends Model
{

	const SESSION = "BillToPay";
	const ERROR = "BillToPayError";
	const SUCCESS = "BillToPaySuccess";

	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_bill, tb_suppliers.id_supplier, tb_ccs.id_CC, tb_suppliers.des_name, dt_entry, dt_due, tb_ccs.des_description AS des_cc_description, tb_bills_to_pay.des_description, vl_total, des_category
			FROM tb_bills_to_pay
			INNER JOIN tb_ccs
			ON tb_bills_to_pay.id_CC = tb_ccs.id_CC
			INNER JOIN tb_suppliers
			ON tb_bills_to_pay.id_supplier = tb_suppliers.id_supplier;");

		return $results;

	}

	public static function listTotalBillsToPay($infos)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_bills_to_pay
			INNER JOIN tb_suppliers
			ON tb_bills_to_pay.id_supplier = tb_suppliers.id_supplier
			WHERE des_category = 'A Pagar' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"]
			));

		return $results;

	}

	public static function findTotalToPay($infos)
	{

		$sql = new Sql();

		$results = $sql->SELECT("
			SELECT SUM(vl_total) AS total
			FROM tb_bills_to_pay
			WHERE des_category = 'A Pagar' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"]
			));

		return $results;

	}

	public static function listTotalBillsPaid($infos)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_bills_to_pay
			INNER JOIN tb_suppliers
			ON tb_bills_to_pay.id_supplier = tb_suppliers.id_supplier
			WHERE des_category = 'Paga' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"]
			));

		return $results;
	}

	public static function findTotalPaid($infos)
	{

		$sql = new Sql();

		$results = $sql->SELECT("
			SELECT SUM(vl_total) AS total
			FROM tb_bills_to_pay
			WHERE des_category = 'Paga' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"]
			));

		return $results;
	}

	public static function listSupplierBillsToPay($infos)
	{

		$sql = new Sql();

		$id_supplier = $sql->select("
			SELECT id_supplier
			FROM tb_suppliers
			WHERE des_name = :des_name;
			", array(
				"des_name"=>$infos["des_description"]
			));

		$id_supplier = $id_supplier[0]["id_supplier"];

		$results = $sql->select("
			SELECT *
			FROM tb_bills_to_pay
			INNER JOIN tb_suppliers
			ON tb_bills_to_pay.id_supplier = tb_suppliers.id_supplier
			WHERE des_category = 'A Pagar' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish AND tb_bills_to_pay.id_supplier = :id_supplier;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"],
				"id_supplier"=>$id_supplier
			));

		return $results;

	}

	public static function findSupplierTotalToPay($infos)
	{

		$sql = new Sql();

		$id_supplier = $sql->select("
			SELECT id_supplier
			FROM tb_suppliers
			WHERE des_name = :des_name;
			", array(
				"des_name"=>$infos["des_description"]
			));

		$id_supplier = $id_supplier[0]["id_supplier"];

		$results = $sql->select("
			SELECT SUM(vl_total) AS total
			FROM tb_bills_to_pay
			WHERE 
			des_category = 'A Pagar' AND 
			dt_due BETWEEN :dt_rstart AND :dt_rfinish AND
			id_supplier = :id_supplier;", array(

				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"],
				"id_supplier"=>$id_supplier
			));

		return $results;

	}

	public static function listSupplierBillsPaid($infos)
	{

		$sql = new Sql();

		$id_supplier = $sql->select("
			SELECT id_supplier
			FROM tb_suppliers
			WHERE des_name = :des_name;
			", array(
				"des_name"=>$infos["des_description"]
			));

		$id_supplier = $id_supplier[0]["id_supplier"];

		$results = $sql->select("
			SELECT *
			FROM tb_bills_to_pay
			INNER JOIN tb_suppliers
			ON tb_bills_to_pay.id_supplier = tb_suppliers.id_supplier
			WHERE des_category = 'Paga' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish AND tb_bills_to_pay.id_supplier = :id_supplier;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"],
				"id_supplier"=>$id_supplier
			));

		return $results;

	}

	public static function findSupplierTotalPaid($infos)
	{

		$sql = new Sql();

		$id_supplier = $sql->select("
			SELECT id_supplier
			FROM tb_suppliers
			WHERE des_name = :des_name;
			", array(
				"des_name"=>$infos["des_description"]
			));

		$id_supplier = $id_supplier[0]["id_supplier"];

		$results = $sql->select("
			SELECT SUM(vl_total) AS total
			FROM tb_bills_to_pay
			WHERE 
			des_category = 'Paga' AND 
			dt_due BETWEEN :dt_rstart AND :dt_rfinish AND
			id_supplier = :id_supplier;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"],
				"id_supplier"=>$id_supplier
			));

		return $results;

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_billstopay_save(:des_supplier_name, :dt_entry, :dt_due, :des_cc_description, :des_description, :vl_total, :des_center, :des_category)", array(
			":des_supplier_name"=>$this->getdes_supplier_name(),
			":dt_entry"=>$this->getdt_entry(),
			":dt_due"=>$this->getdt_due(),
			":des_cc_description"=>$this->getdes_cc_description(),
			":des_description"=>$this->getdes_description(),
			":vl_total"=>$this->formatPriceDot($this->getvl_total()),
			":des_center"=>$this->getdes_center(),
			":des_category"=>$this->getdes_category()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			BillToPay::setSuccess("Conta a pagar cadastrada com sucesso.");
		} else {
			BillToPay::setError("Erro no cadastro da conta a pagar.");
		}

	}

	public function get($id_bill)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_bill, tb_suppliers.id_supplier, tb_ccs.id_CC, tb_suppliers.des_name, des_CPF, dt_entry, dt_due, tb_ccs.des_description AS des_cc_description, tb_bills_to_pay.des_description, vl_total, des_center, des_category
			FROM tb_bills_to_pay
			INNER JOIN tb_ccs
			ON tb_bills_to_pay.id_CC = tb_ccs.id_CC
			INNER JOIN tb_suppliers
			ON tb_bills_to_pay.id_supplier = tb_suppliers.id_supplier
			WHERE id_bill = :id_bill;", array(
				":id_bill"=>$id_bill
			));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_billstopayupdate_save(:id_bill, :des_supplier_name, :dt_entry, :dt_due, :des_cc_description, :des_description, :vl_total, :des_center, :des_category)", array(

			":id_bill"=>$this->getid_bill(),
			":des_supplier_name"=>$this->getdes_supplier_name(),
			":dt_entry"=>$this->getdt_entry(),
			":dt_due"=>$this->getdt_due(),
			":des_cc_description"=>$this->getdes_cc_description(),
			":des_description"=>$this->getdes_description(),
			":vl_total"=>$this->formatPriceDot($this->getvl_total()),
			":des_center"=>$this->getdes_center(),
			":des_category"=>$this->getdes_category()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			BillToPay::setSuccess("Conta a pagar alterada com sucesso.");
		} else {
			BillToPay::setError("Erro no cadastro da conta a pagar.");
		}

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_bills_to_pay WHERE id_bill = :id_bill;", array(
			":id_bill"=>$this->getid_bill()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[BillToPay::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[BillToPay::ERROR]) && $_SESSION[BillToPay::ERROR]) ? $_SESSION[BillToPay::ERROR] : '';

		BillToPay::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[BillToPay::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[BillToPay::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[BillToPay::SUCCESS]) && $_SESSION[BillToPay::SUCCESS]) ? $_SESSION[BillToPay::SUCCESS] : '';

		BillToPay::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[BillToPay::SUCCESS] = NULL;

	}

}

?>