<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Maintenance extends Model
{

	const SESSION = "Maintenance";
	const ERROR = "MaintenanceError";
	const SUCCESS = "MaintenanceSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_maintenance, tb_vehicles.id_vehicle, tb_suppliers.id_supplier, tb_vehicles.des_description AS des_vehicle_description, tb_suppliers.des_name, dt_start, dt_finish, tb_maintenances.des_description, vl_total, nr_fiscal, tb_maintenances.des_obs
			FROM tb_maintenances
			INNER JOIN tb_vehicles
			ON tb_vehicles.id_vehicle = tb_maintenances.id_vehicle
			INNER JOIN tb_suppliers
			ON tb_suppliers.id_supplier = tb_maintenances.id_supplier;");

		return $results;

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_maintenances_save(:des_vehicle_description, :des_name, :dt_start, :dt_finish, :des_description, :vl_total, :nr_fiscal, :des_obs)", array(

			":des_vehicle_description"=>$this->getdes_vehicle_description(),
			":des_name"=>$this->getdes_name(),
			":dt_start"=>$this->getdt_start(),
			":dt_finish"=>$this->getdt_finish(),
			":des_description"=>$this->getdes_description(),
			":vl_total"=>$this->formatPriceDot($this->getvl_total()),
			":nr_fiscal"=>$this->getnr_fiscal(),
			":des_obs"=>$this->getdes_obs()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Maintenance::setSuccess("Manutenção cadastrada com sucesso.");
		} else {
			Maintenance::setError("Erro no cadastro da manutenção.");
		}

	}

	public function get($id_maintenance)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_maintenance, tb_vehicles.id_vehicle, tb_suppliers.id_supplier, tb_vehicles.des_description AS des_vehicle_description, tb_suppliers.des_name, dt_start, dt_finish, tb_maintenances.des_description, vl_total, nr_fiscal, tb_maintenances.des_obs
			FROM tb_maintenances
			INNER JOIN tb_vehicles
			ON tb_vehicles.id_vehicle = tb_maintenances.id_vehicle
			INNER JOIN tb_suppliers
			ON tb_suppliers.id_supplier = tb_maintenances.id_supplier
			WHERE id_maintenance = :id_maintenance;", array(
				":id_maintenance"=>$id_maintenance
			));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_maintenancesupdate_save(:id_maintenance, :des_vehicle_description, :des_name, :dt_start, :dt_finish, :des_description, :vl_total, :nr_fiscal, :des_obs)", array(

			":id_maintenance"=>$this->getid_maintenance(),
			":des_vehicle_description"=>$this->getdes_vehicle_description(),
			":des_name"=>$this->getdes_name(),
			":dt_start"=>$this->getdt_start(),
			":dt_finish"=>$this->getdt_finish(),
			":des_description"=>$this->getdes_description(),
			":vl_total"=>$this->formatPriceDot($this->getvl_total()),
			":nr_fiscal"=>$this->getnr_fiscal(),
			":des_obs"=>$this->getdes_obs()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Maintenance::setSuccess("Manutenção alterada com sucesso.");
		} else {
			Maintenance::setError("Erro no cadastro da manutenção.");
		}

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_maintenances WHERE id_maintenance = :id_maintenance;", array(
			":id_maintenance"=>$this->getid_maintenance()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Maintenance::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Maintenance::ERROR]) && $_SESSION[Maintenance::ERROR]) ? $_SESSION[Maintenance::ERROR] : '';

		Maintenance::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Maintenance::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Maintenance::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Maintenance::SUCCESS]) && $_SESSION[Maintenance::SUCCESS]) ? $_SESSION[Maintenance::SUCCESS] : '';

		Maintenance::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Maintenance::SUCCESS] = NULL;

	}

}

?>