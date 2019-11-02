<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Supplier extends Model
{

	const SESSION = "Supplier";
	const ERROR = "SupplierError";
	const SUCCESS = "SupplierSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_suppliers;");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_suppliers_save(:des_name, :des_CPF, :dt_registration, :des_fantasy, :des_contact, :des_state_nr, :des_city_nr, :des_address, :des_neighborhood, :des_city_state, :des_CEP, :des_phone, :des_cel_phone, :des_email, :des_site, :des_obs, :des_address_charge, :des_neighborhood_charge, :des_city_state_charge, :des_CEP_charge)", array(

			":des_name"=>trim(preg_replace('/\s+/',' ', $this->getdes_name())),
			":des_CPF"=>$this->getdes_CPF(),
			":dt_registration"=>$this->getdt_registration(),
			":des_fantasy"=>$this->getdes_fantasy(),
			":des_contact"=>$this->getdes_contact(),
			":des_state_nr"=>$this->getdes_state_nr(),
			":des_city_nr"=>$this->getdes_city_nr(),
			":des_address"=>$this->getdes_address(),
			":des_neighborhood"=>$this->getdes_neighborhood(),
			":des_city_state"=>$this->getdes_city_state(),
			":des_CEP"=>$this->getdes_CEP(),
			":des_phone"=>$this->getdes_phone(),
			":des_cel_phone"=>$this->getdes_cel_phone(),
			":des_email"=>$this->getdes_email(),
			":des_site"=>$this->getdes_site(),
			":des_obs"=>$this->getdes_obs(),
			":des_address_charge"=>$this->getdes_address_charge(),
			":des_neighborhood_charge"=>$this->getdes_neighborhood_charge(),
			":des_city_state_charge"=>$this->getdes_city_state_charge(),
			":des_CEP_charge"=>$this->getdes_CEP_charge()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Supplier::setSuccess("Fornecedor cadastrado com sucesso.");
		} else {
			Supplier::setError("Erro no cadastro do fornecedor.");
		}

	}

	public function get($id_supplier)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_suppliers WHERE id_supplier = :id_supplier;", array(
			":id_supplier"=>$id_supplier
		));

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_suppliersupdate_save(:id_supplier, :des_name, :des_CPF, :dt_registration, :des_fantasy, :des_contact, :des_state_nr, :des_city_nr, :des_address, :des_neighborhood, :des_city_state, :des_CEP, :des_phone, :des_cel_phone, :des_email, :des_site, :des_obs, :des_address_charge, :des_neighborhood_charge, :des_city_state_charge, :des_CEP_charge)", array(

			":id_supplier"=>$this->getid_supplier(),
			":des_name"=>trim(preg_replace('/\s+/',' ', $this->getdes_name())),
			":des_CPF"=>$this->getdes_CPF(),
			":dt_registration"=>$this->getdt_registration(),
			":des_fantasy"=>$this->getdes_fantasy(),
			":des_contact"=>$this->getdes_contact(),
			":des_state_nr"=>$this->getdes_state_nr(),
			":des_city_nr"=>$this->getdes_city_nr(),
			":des_address"=>$this->getdes_address(),
			":des_neighborhood"=>$this->getdes_neighborhood(),
			":des_city_state"=>$this->getdes_city_state(),
			":des_CEP"=>$this->getdes_CEP(),
			":des_phone"=>$this->getdes_phone(),
			":des_cel_phone"=>$this->getdes_cel_phone(),
			":des_email"=>$this->getdes_email(),
			":des_site"=>$this->getdes_site(),
			":des_obs"=>$this->getdes_obs(),
			":des_address_charge"=>$this->getdes_address_charge(),
			":des_neighborhood_charge"=>$this->getdes_neighborhood_charge(),
			":des_city_state_charge"=>$this->getdes_city_state_charge(),
			":des_CEP_charge"=>$this->getdes_CEP_charge()
		));

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Supplier::setSuccess("Fornecedor alterado com sucesso.");
		} else {
			Supplier::setError("Erro no cadastro do fornecedor.");
		}

		
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_suppliers WHERE id_supplier = :id_supplier;", array(
			":id_supplier"=>$this->getid_supplier()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Supplier::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Supplier::ERROR]) && $_SESSION[Supplier::ERROR]) ? $_SESSION[Supplier::ERROR] : '';

		Supplier::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Supplier::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Supplier::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Supplier::SUCCESS]) && $_SESSION[Supplier::SUCCESS]) ? $_SESSION[Supplier::SUCCESS] : '';

		Supplier::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Supplier::SUCCESS] = NULL;

	}

}

 ?>