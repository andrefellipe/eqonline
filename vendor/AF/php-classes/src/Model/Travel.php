<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Travel extends Model
{

	const SESSION = "Travel";
	const ERROR = "TravelError";
	const SUCCESS = "TravelSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_travel, tb_users.id_user, tb_vehicles.id_vehicle, tb_users.des_name, tb_vehicles.des_description, dt_travel, hr_out, hr_in, des_km_out, des_km_in, des_path, des_goal, des_obs
			FROM tb_travels
			INNER JOIN tb_users
			ON tb_users.id_user = tb_travels.id_user
			INNER JOIN tb_vehicles
			ON tb_vehicles.id_vehicle = tb_travels.id_vehicle;");

		return $results;

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_travels_save(:des_name, :des_description, :dt_travel, :hr_out, :hr_in, :des_km_out, :des_km_in, :des_path, :des_goal, :des_obs)", array(
			":des_name"=>$this->getdes_name(),
			":des_description"=>$this->getdes_description(),
			":dt_travel"=>$this->getdt_travel(),
			":hr_out"=>$this->gethr_out(),
			":hr_in"=>$this->gethr_in(),
			":des_km_out"=>$this->formatPriceDot($this->getdes_km_out()),
			":des_km_in"=>$this->formatPriceDot($this->getdes_km_in()),
			":des_path"=>$this->getdes_path(),
			":des_goal"=>$this->getdes_goal(),
			":des_obs"=>$this->getdes_obs()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Travel::setSuccess("Viagem cadastrada com sucesso.");
		} else {
			Travel::setError("Erro no cadastro da viagem.");
		}

	}

	public function get($id_travel)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_travel, tb_users.id_user, tb_vehicles.id_vehicle, tb_users.des_name, tb_vehicles.des_description, dt_travel, hr_out, hr_in, des_km_out, des_km_in, des_path, des_goal, des_obs
			FROM tb_travels
			INNER JOIN tb_users
			ON tb_users.id_user = tb_travels.id_user
			INNER JOIN tb_vehicles
			ON tb_vehicles.id_vehicle = tb_travels.id_vehicle
			WHERE id_travel = :id_travel;", array(
				":id_travel"=>$id_travel
			));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_travelsupdate_save(:id_travel, :des_name, :des_description, :dt_travel, :hr_out, :hr_in, :des_km_out, :des_km_in, :des_path, :des_goal, :des_obs)", array(
			":id_travel"=>$this->getid_travel(),
			":des_name"=>$this->getdes_name(),
			":des_description"=>$this->getdes_description(),
			":dt_travel"=>$this->getdt_travel(),
			":hr_out"=>$this->gethr_out(),
			":hr_in"=>$this->gethr_in(),
			":des_km_out"=>$this->formatPriceDot($this->getdes_km_out()),
			":des_km_in"=>$this->formatPriceDot($this->getdes_km_in()),
			":des_path"=>$this->getdes_path(),
			":des_goal"=>$this->getdes_goal(),
			":des_obs"=>$this->getdes_obs()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Travel::setSuccess("Viagem alterada com sucesso.");
		} else {
			Travel::setError("Erro no cadastro da viagem.");
		}

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_travels WHERE id_travel = :id_travel;", array(
			":id_travel"=>$this->getid_travel()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Travel::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Travel::ERROR]) && $_SESSION[Travel::ERROR]) ? $_SESSION[Travel::ERROR] : '';

		Travel::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Travel::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Travel::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Travel::SUCCESS]) && $_SESSION[Travel::SUCCESS]) ? $_SESSION[Travel::SUCCESS] : '';

		Travel::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Travel::SUCCESS] = NULL;

	}

}

?>