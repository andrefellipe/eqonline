<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Service extends Model
{

	const SESSION = "Service";
	const ERROR = "ServiceError";
	const SUCCESS = "ServiceSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_services;");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_services_save(:des_description, :des_unit, :vl_price)", array(
			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_unit"=>$this->getdes_unit(),
			":vl_price"=>$this->formatPriceDot($this->getvl_price())
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Service::setSuccess("Serviço cadastrado com sucesso.");
		} else {
			Service::setError("Erro no cadastro do serviço.");
		}

	}

	public function get($id_service)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_services WHERE id_service = :id_service;", array(
			":id_service"=>$id_service
		));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_servicesupdate_save(:id_service, :des_description, :des_unit, :vl_price)", array(
			":id_service"=>$this->getid_service(),
			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_unit"=>$this->getdes_unit(),
			":vl_price"=>$this->formatPriceDot($this->getvl_price())
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Service::setSuccess("Serviço alterado com sucesso.");
		} else {
			Service::setError("Erro no cadastro do serviço.");
		}
		
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_services WHERE id_service = :id_service;", array(
			":id_service"=>$this->getid_service()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Service::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Service::ERROR]) && $_SESSION[Service::ERROR]) ? $_SESSION[Service::ERROR] : '';

		Service::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Service::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Service::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Service::SUCCESS]) && $_SESSION[Service::SUCCESS]) ? $_SESSION[Service::SUCCESS] : '';

		Service::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Service::SUCCESS] = NULL;

	}

}

 ?>