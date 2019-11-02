<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Vehicle extends Model
{

	const SESSION = "Vehicle";
	const ERROR = "VehicleError";
	const SUCCESS = "VehicleSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_vehicles;");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_vehicles_save(:des_description, :des_chassi, :des_type, :des_fuel, :dt_purchase, :des_fabrication_year, :des_plate, :des_color, :des_model, :des_RENAVAM)", array(
			
			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_chassi"=>$this->getdes_chassi(),
			":des_type"=>$this->getdes_type(),
			":des_fuel"=>$this->getdes_fuel(),
			":dt_purchase"=>$this->getdt_purchase(),
			":des_fabrication_year"=>$this->getdes_fabrication_year(),
			":des_plate"=>$this->getdes_plate(),
			":des_color"=>$this->getdes_color(),
			":des_model"=>$this->getdes_model(),
			":des_RENAVAM"=>$this->getdes_RENAVAM()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Vehicle::setSuccess("Veículo cadastrado com sucesso.");
		} else {
			Vehicle::setError("Erro no cadastro do veículo.");
		}

	}

	public function get($id_vehicle)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_vehicles WHERE id_vehicle = :id_vehicle;", array(
			":id_vehicle"=>$id_vehicle
		));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_vehiclesupdate_save(:id_vehicle, :des_description, :des_chassi, :des_type, :des_fuel, :dt_purchase, :des_fabrication_year, :des_plate, :des_color, :des_model, :des_RENAVAM)", array(
			":id_vehicle"=>$this->getid_vehicle(),
			":des_description"=>trim(preg_replace('/\s+/',' ', $this->getdes_description())),
			":des_chassi"=>$this->getdes_chassi(),
			":des_type"=>$this->getdes_type(),
			":des_fuel"=>$this->getdes_fuel(),
			":dt_purchase"=>$this->getdt_purchase(),
			":des_fabrication_year"=>$this->getdes_fabrication_year(),
			":des_plate"=>$this->getdes_plate(),
			":des_color"=>$this->getdes_color(),
			":des_model"=>$this->getdes_model(),
			":des_RENAVAM"=>$this->getdes_RENAVAM()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Vehicle::setSuccess("Veículo alterado com sucesso.");
		} else {
			Vehicle::setError("Erro no cadastro do veículo.");
		}
		
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_vehicles WHERE id_vehicle = :id_vehicle;", array(
			":id_vehicle"=>$this->getid_vehicle()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Vehicle::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Vehicle::ERROR]) && $_SESSION[Vehicle::ERROR]) ? $_SESSION[Vehicle::ERROR] : '';

		Vehicle::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Vehicle::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Vehicle::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Vehicle::SUCCESS]) && $_SESSION[Vehicle::SUCCESS]) ? $_SESSION[Vehicle::SUCCESS] : '';

		Vehicle::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Vehicle::SUCCESS] = NULL;

	}

}

 ?>