<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Toolbox extends Model
{

	const SESSION = "Toolbox";
	const ERROR = "ToolboxError";
	const SUCCESS = "ToolboxSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_toolbox, tb_users.id_user, des_description, tb_users.des_name
			FROM tb_toolboxes
			INNER JOIN tb_users
			ON tb_users.id_user = tb_toolboxes.id_user;");

		return $results;

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_toolboxes_save(:des_description, :des_name)", array(

			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_name"=>$this->getdes_name()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Toolbox::setSuccess("Maleta de ferramentas cadastrada com sucesso.");
		} else {
			Toolbox::setError("Erro no cadastro da maleta de ferramentas.");
		}

	}

	public function get($id_toolbox)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_toolbox, tb_users.id_user, des_description, tb_users.des_name
			FROM tb_toolboxes
			INNER JOIN tb_users
			ON tb_users.id_user = tb_toolboxes.id_user
			WHERE id_toolbox = :id_toolbox;", array(
				":id_toolbox"=>$id_toolbox
			));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_toolboxesupdate_save(:id_toolbox, :des_description, :des_name)", array(

			":id_toolbox"=>$this->getid_toolbox(),
			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_name"=>$this->getdes_name()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Toolbox::setSuccess("Maleta de ferramentas alterada com sucesso.");
		} else {
			Toolbox::setError("Erro no cadastro da maleta de ferramentas.");
		}

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_toolboxes WHERE id_toolbox = :id_toolbox;", array(
			":id_toolbox"=>$this->getid_toolbox()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Toolbox::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Toolbox::ERROR]) && $_SESSION[Toolbox::ERROR]) ? $_SESSION[Toolbox::ERROR] : '';

		Toolbox::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Toolbox::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Toolbox::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Toolbox::SUCCESS]) && $_SESSION[Toolbox::SUCCESS]) ? $_SESSION[Toolbox::SUCCESS] : '';

		Toolbox::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Toolbox::SUCCESS] = NULL;

	}

}

?>