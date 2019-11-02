<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Inspection extends Model
{

	const SESSION = "Inspection";
	const ERROR = "InspectionError";
	const SUCCESS = "InspectionSuccess";

	public static function listAllV($id_vehicle)
	{

		$sql = new Sql();

		return $sql->select("
			SELECT id_v_inspection, tb_vehicles_inspections.id_vehicle, tb_vehicles.des_description, dt_insp, des_obs, des_error
			FROM tb_vehicles_inspections
			INNER JOIN tb_vehicles
			ON tb_vehicles.id_vehicle = tb_vehicles_inspections.id_vehicle
			WHERE tb_vehicles_inspections.id_vehicle = :id_vehicle;", array(
				":id_vehicle"=>$id_vehicle
			));

	}

	public static function listAllT($id_toolbox)
	{

		$sql = new Sql();

		return $sql->select("
			SELECT id_t_inspection, tb_toolboxes_inspections.id_toolbox, tb_toolboxes.des_description, dt_insp, des_obs, des_error
			FROM tb_toolboxes_inspections
			INNER JOIN tb_toolboxes
			ON tb_toolboxes.id_toolbox = tb_toolboxes_inspections.id_toolbox
			WHERE tb_toolboxes_inspections.id_toolbox = :id_toolbox;", array(
				":id_toolbox"=>$id_toolbox
			));

	}

	public function saveV()
	{

		$sql = new Sql();

		$numOfTools = (int)$this->getnum_tools();

		$checkedTools = count($this->gettool_verification());

		$des_error = "Não";

		if ($numOfTools !== $checkedTools) {
			$des_error = "Sim";
		}

		$results = $sql->select("CALL sp_vinspections_save(:dt_insp, :id_vehicle, :des_obs, :des_error)", array(

			":dt_insp"=>$this->getdt_insp(),
			":id_vehicle"=>$this->getid_vehicle(),
			":des_obs"=>$this->getdes_obs(),
			":des_error"=>$des_error
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Inspection::setSuccess("Vistoria realizada com sucesso.");
		} else {
			Inspection::setError("Erro no cadastro da vistoria.");
		}

	}

	public function saveT()
	{

		$sql = new Sql();

		$numOfTools = (int)$this->getnum_tools();

		$checkedTools = count($this->gettool_verification());

		$des_error = "Não";

		if ($numOfTools !== $checkedTools) {
			$des_error = "Sim";
		}

		$results = $sql->select("CALL sp_tinspections_save(:dt_insp, :id_toolbox, :des_obs, :des_error)", array(

			":dt_insp"=>$this->getdt_insp(),
			":id_toolbox"=>$this->getid_toolbox(),
			":des_obs"=>$this->getdes_obs(),
			":des_error"=>$des_error
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Inspection::setSuccess("Vistoria realizada com sucesso.");
		} else {
			Inspection::setError("Erro no cadastro da vistoria.");
		}

	}

	public static function setError($msg)
	{

		$_SESSION[Inspection::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Inspection::ERROR]) && $_SESSION[Inspection::ERROR]) ? $_SESSION[Inspection::ERROR] : '';

		Inspection::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Inspection::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Inspection::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Inspection::SUCCESS]) && $_SESSION[Inspection::SUCCESS]) ? $_SESSION[Inspection::SUCCESS] : '';

		Inspection::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Inspection::SUCCESS] = NULL;

	}

}

?>