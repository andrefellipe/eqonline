<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class CC extends Model
{

	const SESSION = "CC";
	const ERROR = "CCError";
	const SUCCESS = "CCSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_ccs;");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_ccs_save(:des_description)", array(

			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description()))
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			CC::setSuccess("Conta contábil cadastrada com sucesso.");
		} else {
			CC::setError("Erro no cadastro da conta contábil.");
		}

	}

	public function get($id_CC)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_ccs WHERE id_CC = :id_CC;", array(
			":id_CC"=>$id_CC
		));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_ccsupdate_save(:id_CC, :des_description)", array(

			":id_CC"=>$this->getid_CC(),
			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description()))
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			CC::setSuccess("Conta contábil alterada com sucesso.");
		} else {
			CC::setError("Erro no cadastro da conta contábil.");
		}
		
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_ccs WHERE id_CC = :id_CC;", array(
			":id_CC"=>$this->getid_CC()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[CC::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[CC::ERROR]) && $_SESSION[CC::ERROR]) ? $_SESSION[CC::ERROR] : '';

		CC::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[CC::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[CC::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[CC::SUCCESS]) && $_SESSION[CC::SUCCESS]) ? $_SESSION[CC::SUCCESS] : '';

		CC::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[CC::SUCCESS] = NULL;

	}

}

 ?>