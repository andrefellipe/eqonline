<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Absence extends Model
{

	const SESSION = "Absence";
	const ERROR = "AbsenceError";
	const SUCCESS = "AbsenceSucess";


	public static function listUserAbsences($id_user)
	{

		$sql = new Sql();

		$absences = $sql->select("SELECT * FROM tb_absences WHERE id_user = :id_user;", array(
			":id_user"=>$id_user
		));

		return $absences;

	}

	public static function listAll()
	{

		$sql = new Sql();

		$absences = $sql->select("SELECT * FROM tb_absences INNER JOIN tb_users ON tb_absences.id_user = tb_users.id_user;");

		return $absences;

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_absences_save(:id_user, :dt, :des_justification)", array(
			":id_user"=>$this->getid_user(),
			":dt"=>$this->getdt(),
			":des_justification"=>$this->getdes_justification()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Absence::setSuccess("Falta cadastrada com sucesso.");
		} else {
			Absence::setError("Erro no cadastro da falta.");
		}

	}

	public function get($id_absence)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_absences WHERE id_absence = :id_absence;", array(
			":id_absence"=>$id_absence
		));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_absencesupdate_save(:id_absence, :dt, :des_justification)", array(
			":id_absence"=>$this->getid_absence(),
			":dt"=>$this->getdt(),
			":des_justification"=>$this->getdes_justification()
		));

		$this->setData($results[0]);
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_absences WHERE id_absence = :id_absence;", array(
			":id_absence"=>$this->getid_absence()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Absence::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Absence::ERROR]) && $_SESSION[Absence::ERROR]) ? $_SESSION[Absence::ERROR] : '';

		Absence::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Absence::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Absence::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Absence::SUCCESS]) && $_SESSION[Absence::SUCCESS]) ? $_SESSION[Absence::SUCCESS] : '';

		Absence::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Absence::SUCCESS] = NULL;

	}

}

 ?>