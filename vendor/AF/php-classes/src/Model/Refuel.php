<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Refuel extends Model
{

	const SESSION = "Refuel";
	const ERROR = "RefuelError";
	const SUCCESS = "RefuelSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_refuel, tb_users.id_user, tb_vehicles.id_vehicle, tb_suppliers.id_supplier, tb_users.des_name AS des_user_name, tb_vehicles.des_description, tb_suppliers.des_name AS des_supplier_name, dt_travel, hr_out, hr_in, des_km_out, des_km_in, qtd_fuel, vl_fuel, vl_total, nr_fiscal, tb_refuels.des_obs
			FROM tb_refuels
			INNER JOIN tb_users
			ON tb_users.id_user = tb_refuels.id_user
			INNER JOIN tb_vehicles
			ON tb_vehicles.id_vehicle = tb_refuels.id_vehicle
			INNER JOIN tb_suppliers
			ON tb_suppliers.id_supplier = tb_refuels.id_supplier;");

		return $results;

	}

	public static function listReport($infos)
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_refuels_report(:dt_rstart, :dt_rfinish, :des_description)", array(

			":dt_rstart"=>$infos["dt_rstart"],
			":dt_rfinish"=>$infos["dt_rfinish"],
			":des_description"=>$infos["des_description"]
		));

		return $results;

	}

	public static function listFuelTotal($infos, $id_vehicle)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT 
			(
			SELECT SUM(qtd_fuel)
			FROM tb_refuels
			INNER JOIN tb_suppliers
			ON tb_refuels.id_supplier = tb_suppliers.id_supplier
			WHERE id_vehicle = :id_vehicle
			AND dt_travel BETWEEN :dt_rstart AND :dt_rfinish) AS fuel_total;", array(

			":id_vehicle"=>$id_vehicle,
			":dt_rstart"=>$infos["dt_rstart"],
			":dt_rfinish"=>$infos["dt_rfinish"]
		));

		return $results;

	}

	public static function listPriceTotal($infos, $id_vehicle)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT 
			(
			SELECT SUM(vl_total)
			FROM tb_refuels
			INNER JOIN tb_suppliers
			ON tb_refuels.id_supplier = tb_suppliers.id_supplier
			WHERE id_vehicle = :id_vehicle
			AND dt_travel BETWEEN :dt_rstart AND :dt_rfinish) AS price_total;", array(

			":id_vehicle"=>$id_vehicle,
			":dt_rstart"=>$infos["dt_rstart"],
			":dt_rfinish"=>$infos["dt_rfinish"]
		));

		return $results;

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_refuels_save(:des_user_name, :des_description, :des_supplier_name, :dt_travel, :hr_out, :hr_in, :des_km_in, :qtd_fuel, :vl_fuel, :vl_total, :nr_fiscal, :des_obs)", array(

			":des_user_name"=>$this->getdes_user_name(),
			":des_description"=>$this->getdes_description(),
			":des_supplier_name"=>$this->getdes_supplier_name(),
			":dt_travel"=>$this->getdt_travel(),
			":hr_out"=>$this->gethr_out(),
			":hr_in"=>$this->gethr_in(),
			":des_km_in"=>$this->formatPriceDot($this->getdes_km_in()),
			":qtd_fuel"=>$this->formatPriceDot($this->getqtd_fuel()),
			":vl_fuel"=>$this->formatPriceDot($this->getvl_fuel()),
			":vl_total"=>$this->formatPriceDot($this->getvl_total()),
			":nr_fiscal"=>$this->getnr_fiscal(),
			":des_obs"=>$this->getdes_obs()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Refuel::setSuccess("Abastecimento cadastrado com sucesso.");
		} else {
			Refuel::setError("Erro no cadastro do abastecimento.");
		}

	}

	public function get($id_refuel)
	{

		$sql = new Sql();

		$results = $sql->select("
			SELECT id_refuel, tb_users.id_user, tb_vehicles.id_vehicle, tb_suppliers.id_supplier, tb_users.des_name AS des_user_name, tb_vehicles.des_description, tb_suppliers.des_name AS des_supplier_name, dt_travel, hr_out, hr_in, des_km_out, des_km_in, qtd_fuel, vl_fuel, vl_total, nr_fiscal, tb_refuels.des_obs
			FROM tb_refuels
			INNER JOIN tb_users
			ON tb_users.id_user = tb_refuels.id_user
			INNER JOIN tb_vehicles
			ON tb_vehicles.id_vehicle = tb_refuels.id_vehicle
			INNER JOIN tb_suppliers
			ON tb_suppliers.id_supplier = tb_refuels.id_supplier
			WHERE id_refuel = :id_refuel;", array(
				":id_refuel"=>$id_refuel
			));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_refuelsupdate_save(:id_refuel, :des_user_name, :des_description, :des_supplier_name, :dt_travel, :hr_out, :hr_in, :des_km_out, :des_km_in, :qtd_fuel, :vl_fuel, :vl_total, :nr_fiscal, :des_obs)", array(

			":id_refuel"=>$this->getid_refuel(),
			":des_user_name"=>$this->getdes_user_name(),
			":des_description"=>$this->getdes_description(),
			":des_supplier_name"=>$this->getdes_supplier_name(),
			":dt_travel"=>$this->getdt_travel(),
			":hr_out"=>$this->gethr_out(),
			":hr_in"=>$this->gethr_in(),
			":des_km_out"=>$this->formatPriceDot($this->getdes_km_out()),
			":des_km_in"=>$this->formatPriceDot($this->getdes_km_in()),
			":qtd_fuel"=>$this->formatPriceDot($this->getqtd_fuel()),
			":vl_fuel"=>$this->formatPriceDot($this->getvl_fuel()),
			":vl_total"=>$this->formatPriceDot($this->getvl_total()),
			":nr_fiscal"=>$this->getnr_fiscal(),
			":des_obs"=>$this->getdes_obs()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Refuel::setSuccess("Abastecimento alterado com sucesso.");
		} else {
			Refuel::setError("Erro no cadastro do abastecimento.");
		}

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_refuels WHERE id_refuel = :id_refuel;", array(
			":id_refuel"=>$this->getid_refuel()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Refuel::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Refuel::ERROR]) && $_SESSION[Refuel::ERROR]) ? $_SESSION[Refuel::ERROR] : '';

		Refuel::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Refuel::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Refuel::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Refuel::SUCCESS]) && $_SESSION[Refuel::SUCCESS]) ? $_SESSION[Refuel::SUCCESS] : '';

		Refuel::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Refuel::SUCCESS] = NULL;

	}

}

?>