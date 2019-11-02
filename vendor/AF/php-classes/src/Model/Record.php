<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Record extends Model
{

	const SESSION = "Record";
	const ERROR = "RecordError";
	const SUCCESS = "RecordSucess";


	public static function listUserRecords($id_user)
	{

		$sql = new Sql();

		$records = $sql->select("SELECT * FROM tb_records WHERE id_user = :id_user;", array(
			":id_user"=>$id_user
		));

		return $records;

	}

	public static function listAll()
	{

		$sql = new Sql();

		$records = $sql->select("SELECT * FROM tb_records INNER JOIN tb_users ON tb_records.id_user = tb_users.id_user;");

		return $records;

	}

	public function saveBegin()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_records_in_save(:id_user, :des_type)", array(
			":id_user"=>$this->getid_user(),
			":des_type"=>$this->getdes_type()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Record::setSuccess("Registro feito com sucesso.");

			if ($this->getdes_type() == 'Regular') {

				User::sendEmailDocs($this->getid_user());

			}
			
		} else {
			Record::setError("Erro no registro.");
		}

	}

	public function saveEnd()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_records_out_save(:id_user, :des_type)", array(
			":id_user"=>$this->getid_user(),
			":des_type"=>$this->getdes_type()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Record::setSuccess("Registro feito com sucesso.");
		} else {
			Record::setError("Erro no registro.");
		}

	}

	public function get($id_record)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_records WHERE id_record = :id_record;", array(
			":id_record"=>$id_record
		));

		$results[0]["dt_start"] = date("Y-m-d\TH:i", strtotime($results[0]["dt_start"]));
		$results[0]["dt_finish"] = date("Y-m-d\TH:i", strtotime($results[0]["dt_finish"]));

		$this->setData($results[0]);
	}

	public function update()
	{

		$dt_start = date("Y-m-d H:i:s", strtotime($this->getdt_start()));
		$dt_finish = date("Y-m-d H:i:s", strtotime($this->getdt_finish()));

		$sql = new Sql();

		$results = $sql->select("CALL sp_recordsupdate_save(:id_record, :dt_start, :dt_finish)", array(

			":id_record"=>$this->getid_record(),
			":dt_start"=>$dt_start,
			":dt_finish"=>$dt_finish
		));

		$this->setData($results[0]);
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_records WHERE id_record = :id_record;", array(
			":id_record"=>$this->getid_record()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Record::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Record::ERROR]) && $_SESSION[Record::ERROR]) ? $_SESSION[Record::ERROR] : '';

		Record::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Record::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Record::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Record::SUCCESS]) && $_SESSION[Record::SUCCESS]) ? $_SESSION[Record::SUCCESS] : '';

		Record::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Record::SUCCESS] = NULL;

	}

}

 ?>