<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class BillToReceive extends Model
{

	const SESSION = "BillToReceive";
	const ERROR = "BillToReceiveError";
	const SUCCESS = "BillToReceiveSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_bill, tb_clients.id_client, tb_ccs.id_CC, tb_clients.des_name, dt_entry, dt_due, tb_ccs.des_description AS des_cc_description, tb_bills_to_receive.des_description, vl_total, des_category
			FROM tb_bills_to_receive
			INNER JOIN tb_ccs
			ON tb_bills_to_receive.id_CC = tb_ccs.id_CC
			INNER JOIN tb_clients
			ON tb_bills_to_receive.id_client = tb_clients.id_client;");

		return $results;

	}

	public static function listTotalBillsToReceive($infos)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_bills_to_receive
			INNER JOIN tb_clients
			ON tb_bills_to_receive.id_client = tb_clients.id_client
			WHERE des_category = 'A Receber' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"]
			));

		return $results;

	}

	public static function findTotalToReceive($infos)
	{

		$sql = new Sql();

		$results = $sql->SELECT("
			SELECT SUM(vl_total) AS total
			FROM tb_bills_to_receive
			WHERE des_category = 'A Receber' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"]
			));

		return $results;

	}

	public static function listTotalBillsReceived($infos)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT *
			FROM tb_bills_to_receive
			INNER JOIN tb_clients
			ON tb_bills_to_receive.id_client = tb_clients.id_client
			WHERE des_category = 'Recebida' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"]
			));

		return $results;
	}

	public static function findTotalReceived($infos)
	{

		$sql = new Sql();

		$results = $sql->SELECT("
			SELECT SUM(vl_total) AS total
			FROM tb_bills_to_receive
			WHERE des_category = 'Recebida' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"]
			));

		return $results;
	}

	public static function listClientBillsToReceive($infos)
	{

		$sql = new Sql();

		$id_client = $sql->select("
			SELECT id_client
			FROM tb_clients
			WHERE des_name = :des_name;
			", array(
				"des_name"=>$infos["des_description"]
			));

		$id_client = $id_client[0]["id_client"];

		$results = $sql->select("
			SELECT *
			FROM tb_bills_to_receive
			INNER JOIN tb_clients
			ON tb_bills_to_receive.id_client = tb_clients.id_client
			WHERE des_category = 'A Receber' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish AND tb_bills_to_receive.id_client = :id_client;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"],
				"id_client"=>$id_client
			));

		return $results;

	}

	public static function findClientTotalToReceive($infos)
	{

		$sql = new Sql();

		$id_client = $sql->select("
			SELECT id_client
			FROM tb_clients
			WHERE des_name = :des_name;
			", array(
				"des_name"=>$infos["des_description"]
			));

		$id_client = $id_client[0]["id_client"];

		$results = $sql->select("
			SELECT SUM(vl_total) AS total
			FROM tb_bills_to_receive
			WHERE 
			des_category = 'A Receber' AND 
			dt_due BETWEEN :dt_rstart AND :dt_rfinish AND
			id_client = :id_client;", array(

				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"],
				"id_client"=>$id_client
			));

		return $results;

	}

	public static function listClientBillsReceived($infos)
	{

		$sql = new Sql();

		$id_client = $sql->select("
			SELECT id_client
			FROM tb_clients
			WHERE des_name = :des_name;
			", array(
				"des_name"=>$infos["des_description"]
			));

		$id_client = $id_client[0]["id_client"];

		$results = $sql->select("
			SELECT *
			FROM tb_bills_to_receive
			INNER JOIN tb_clients
			ON tb_bills_to_receive.id_client = tb_clients.id_client
			WHERE des_category = 'Recebida' AND dt_due BETWEEN :dt_rstart AND :dt_rfinish AND tb_bills_to_receive.id_client = :id_client;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"],
				"id_client"=>$id_client
			));

		return $results;

	}

	public static function findClientTotalReceived($infos)
	{

		$sql = new Sql();

		$id_client = $sql->select("
			SELECT id_client
			FROM tb_clients
			WHERE des_name = :des_name;
			", array(
				"des_name"=>$infos["des_description"]
			));

		$id_client = $id_client[0]["id_client"];

		$results = $sql->select("
			SELECT SUM(vl_total) AS total
			FROM tb_bills_to_receive
			WHERE 
			des_category = 'Recebida' AND 
			dt_due BETWEEN :dt_rstart AND :dt_rfinish AND
			id_client = :id_client;", array(
				":dt_rstart"=>$infos["dt_rstart"],
				":dt_rfinish"=>$infos["dt_rfinish"],
				"id_client"=>$id_client
			));

		return $results;

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_billstoreceive_save(:des_client_name, :dt_entry, :dt_due, :des_cc_description, :des_description, :vl_total, :des_center, :des_category)", array(
			":des_client_name"=>$this->getdes_client_name(),
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
			BillToReceive::setSuccess("Conta a receber cadastrada com sucesso.");
		} else {
			BillToReceive::setError("Erro no cadastro da conta a receber.");
		}

	}

	public function get($id_bill)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_bill, tb_clients.id_client, tb_ccs.id_CC, tb_clients.des_name, des_CPF, dt_entry, dt_due, tb_ccs.des_description AS des_cc_description, tb_bills_to_receive.des_description, vl_total, des_center, des_category
			FROM tb_bills_to_receive
			INNER JOIN tb_ccs
			ON tb_bills_to_receive.id_CC = tb_ccs.id_CC
			INNER JOIN tb_clients
			ON tb_bills_to_receive.id_client = tb_clients.id_client
			WHERE id_bill = :id_bill;", array(
				":id_bill"=>$id_bill
			));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_billstoreceiveupdate_save(:id_bill, :des_client_name, :dt_entry, :dt_due, :des_cc_description, :des_description, :vl_total, :des_center, :des_category)", array(

			":id_bill"=>$this->getid_bill(),
			":des_client_name"=>$this->getdes_client_name(),
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
			BillToReceive::setSuccess("Conta a receber alterada com sucesso.");
		} else {
			BillToReceive::setError("Erro no cadastro da conta a receber.");
		}

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_bills_to_receive WHERE id_bill = :id_bill;", array(
			":id_bill"=>$this->getid_bill()
		));

	}

	public static function setError($msg)
	{

		$_SESSION[BillToReceive::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[BillToReceive::ERROR]) && $_SESSION[BillToReceive::ERROR]) ? $_SESSION[BillToReceive::ERROR] : '';

		BillToReceive::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[BillToReceive::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[BillToReceive::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[BillToReceive::SUCCESS]) && $_SESSION[BillToReceive::SUCCESS]) ? $_SESSION[BillToReceive::SUCCESS] : '';

		BillToReceive::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[BillToReceive::SUCCESS] = NULL;

	}

}

?>