<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;

class Proposal extends Model
{

	const SESSION = "Proposal";
	const ERROR = "ProposalError";
	const SUCCESS = "ProposalSuccess";

	public static function listAll()
	{

		$sql = new Sql();

		$results = $sql->select("SELECT tb_proposals.id_proposal, tb_proposals.id_client, des_service, des_name 
			FROM tb_proposals
			INNER JOIN tb_clients
			ON tb_proposals.id_client = tb_clients.id_client;");

		return $results;
	}

	public static function listPricelessMaterials($id_proposal)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT tb_proposals.id_proposal, des_client_name, des_service, dt_emission, des_description, des_reduced_measure_unit, qtd_material
			FROM tb_proposal_materials
			INNER JOIN tb_products
			ON tb_products.id_product = tb_proposal_materials.id_product
			INNER JOIN tb_proposals
			ON tb_proposals.id_proposal = tb_proposal_materials.id_proposal
			WHERE tb_proposal_materials.id_proposal = :id_proposal;", array(
				"id_proposal"=>$id_proposal
			));

		return $results;
	}

	public static function listMaterials($id_proposal)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT tb_proposals.id_proposal, des_client_name, des_service, dt_emission, des_description, des_reduced_measure_unit, qtd_material, vl_purchase_price, vl_sell_price, (vl_sell_price * qtd_material) AS final_priceM
			FROM tb_proposal_materials
			INNER JOIN tb_products
			ON tb_products.id_product = tb_proposal_materials.id_product
			INNER JOIN tb_proposals
			ON tb_proposals.id_proposal = tb_proposal_materials.id_proposal
			WHERE tb_proposal_materials.id_proposal = :id_proposal;", array(
				"id_proposal"=>$id_proposal
			));

		return $results;
	}

	public static function listServices($id_proposal)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT tb_proposals.id_proposal, des_client_name, des_service, dt_emission, des_description, des_unit, qtd_service, vl_price, (vl_price * qtd_service) AS final_priceS
			FROM tb_proposal_services
			INNER JOIN tb_services
			ON tb_services.id_service = tb_proposal_services.id_service
			INNER JOIN tb_proposals
			ON tb_proposals.id_proposal = tb_proposal_services.id_proposal
			WHERE tb_proposal_services.id_proposal = :id_proposal;", array(
				"id_proposal"=>$id_proposal
			));

		return $results;
	}

	public function save()
	{

		$sql = new Sql();

		$materialsCount = count($this->getdes_products_description());

		$materialsDesc = $this->getdes_products_description();

		$materialsQtd = $this->getqtd_material();

		$vl_material = 0;

		for ($i = 0; $i < $materialsCount; $i++) {

			$price = $sql->select("CALL sp_vl_material_calculate(:des_product_description, :qtd_material)", array(
			":des_product_description"=>$materialsDesc[$i],
			":qtd_material"=>($this->formatPriceDot($materialsQtd[$i]))
			));

			$vl_material += $price[0]["price"];

		}

		$servicesCount = count($this->getdes_services_description());

		$servicesDesc = $this->getdes_services_description();

		$servicesQtd = $this->getqtd_service();

		$vl_service = 0;

		for ($i = 0; $i < $servicesCount; $i++) {

			$price = $sql->select("CALL sp_vl_service_calculate(:des_service_description, :qtd_service)", array(
			":des_service_description"=>$servicesDesc[$i],
			":qtd_service"=>($this->formatPriceDot($servicesQtd[$i]))
			));

			$vl_service += $price[0]["price"];

		}

		$fct_buy = 1 + ($this->formatPriceDot($this->getfct_buy()) / 100);
		$fct_risk = 1 + ($this->formatPriceDot($this->getfct_risk()) / 100);

		$vl_material_buy = $vl_material * $fct_buy;
		$vl_service_risk = $vl_service * $fct_risk;

		$vl_price_commercial = $vl_material_buy + $vl_service_risk;
		$vl_price_non_commercial = 1.35 * $vl_service_risk + $vl_material_buy;

		$results = $sql->select("CALL sp_proposals_save(:des_client_name, :des_service, :dt_visit, :dt_emission, :vl_material, :vl_service, :fct_buy, :fct_risk, :vl_material_buy, :vl_service_risk, :vl_price_commercial, :vl_price_non_commercial)", array(
			":des_client_name"=>$this->getdes_client_name(),
			":des_service"=>$this->getdes_service(),
			":dt_visit"=>$this->getdt_visit(),
			":dt_emission"=>$this->getdt_emission(),
			":vl_material"=>$vl_material,
			":vl_service"=>$vl_service,
			":fct_buy"=>$fct_buy,
			":fct_risk"=>$fct_risk,
			":vl_material_buy"=>$vl_material_buy,
			":vl_service_risk"=>$vl_service_risk,
			":vl_price_commercial"=>$vl_price_commercial,
			":vl_price_non_commercial"=>$vl_price_non_commercial
		));

		$this->setData($results[0]);
		/* -------------------------------------------------------- */
		$productsCount = count($this->getdes_products_description());
		$productsNames = $this->getdes_products_description();
		$productsQtd = $this->getqtd_material();

		$results[0]["des_products_description"] = [];
		$results[0]["qtd_material"] = [];

		for ($i = 0; $i < $productsCount; $i++) {

			
			$materials = $sql->select("CALL sp_proposal_materials_save(:id_proposal, :des_products_description, :qtd_material)", array(
				":id_proposal"=>$this->getid_proposal(),
				":des_products_description"=>$productsNames[$i],
				":qtd_material"=>$this->formatPriceDot($productsQtd[$i])
			));

			if (!empty($docs[$i]) ) {
				array_push($results[0]["des_products_description"], $materials[$i]["des_products_description"]);
				array_push($results[0]["qtd_material"], $materials[$i]["qtd_material"]);
			}

		}
		/* -------------------------------------------------------- */
		$servicesCount = count($this->getdes_services_description());
		$servicesNames = $this->getdes_services_description();
		$servicesQtd = $this->getqtd_service();

		$results[0]["des_services_description"] = [];
		$results[0]["qtd_service"] = [];

		for ($i = 0; $i < $servicesCount; $i++) {

			$services = $sql->select("CALL sp_proposal_services_save(:id_proposal, :des_services_description, :qtd_service)", array(
				":id_proposal"=>$this->getid_proposal(),
				":des_services_description"=>$servicesNames[$i],
				":qtd_service"=>$this->formatPriceDot($servicesQtd[$i])
			));

			if (!empty($docs[$i]) ) {
				array_push($results[0]["des_services_description"], $services[$i]["des_services_description"]);
				array_push($results[0]["qtd_service"], $services[$i]["qtd_service"]);
			}

		}
		/* -------------------------------------------------------- */
		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			Proposal::setSuccess("Proposta cadastrada com sucesso.");
		} else {
			Proposal::setError("Erro no cadastro da proposta.");
		}

	}

	public function get($id_proposal)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_proposals WHERE id_proposal = :id_proposal;", array(
			":id_proposal"=>$id_proposal
		));

		$results[0]["fct_buy"] = ($results[0]["fct_buy"] - 1) * 100;
		$results[0]["fct_risk"] = ($results[0]["fct_risk"] - 1) * 100;

		$materials = $sql->select("
			SELECT id_material, tb_proposal_materials.id_product, id_proposal, qtd_material, des_description AS des_products_description, vl_sell_price
			FROM tb_proposal_materials
			INNER JOIN tb_products
			ON tb_proposal_materials.id_product = tb_products.id_product
			WHERE id_proposal = :id_proposal;", array(
			":id_proposal"=>$id_proposal
		));

		$services = $sql->select("
			SELECT id_proposal_service, tb_proposal_services.id_service, id_proposal, qtd_service, des_description AS des_services_description, vl_price
			FROM tb_proposal_services
			INNER JOIN tb_services
			ON tb_proposal_services.id_service = tb_services.id_service
			WHERE id_proposal = :id_proposal;", array(
			":id_proposal"=>$id_proposal
		));

		$results[0]["des_products_description"] = [];
		$results[0]["qtd_material"] = [];
		$results[0]["vl_sell_price"] = [];

		for ($i = 0; $i < count($materials); $i++) {
			if (!empty($materials[$i]) ) {
				array_push($results[0]["des_products_description"], $materials[$i]["des_products_description"]);
				array_push($results[0]["qtd_material"], $materials[$i]["qtd_material"]);
				array_push($results[0]["vl_sell_price"], $materials[$i]["vl_sell_price"]);
			}
		}

		$results[0]["des_services_description"] = [];
		$results[0]["qtd_service"] = [];
		$results[0]["vl_price"] = [];

		for ($i = 0; $i < count($services); $i++) {
			if (!empty($services[$i]) ) {
				array_push($results[0]["des_services_description"], $services[$i]["des_services_description"]);
				array_push($results[0]["qtd_service"], $services[$i]["qtd_service"]);
				array_push($results[0]["vl_price"], $services[$i]["vl_price"]);
			}
		}

		$this->setData($results[0]);
	}

	public function update()
	{

		$sql = new Sql();

		$materialsCount = count($this->getdes_products_description());

		$materialsDesc = $this->getdes_products_description();

		$materialsQtd = $this->getqtd_material();

		$vl_material = 0;

		for ($i = 0; $i < $materialsCount; $i++) {

			$price = $sql->select("CALL sp_vl_material_calculate(:des_product_description, :qtd_material)", array(
			":des_product_description"=>$materialsDesc[$i],
			":qtd_material"=>($this->formatPriceDot($materialsQtd[$i]))
			));

			$vl_material += $price[0]["price"];

		}

		$servicesCount = count($this->getdes_services_description());

		$servicesDesc = $this->getdes_services_description();

		$servicesQtd = $this->getqtd_service();

		$vl_service = 0;

		for ($i = 0; $i < $servicesCount; $i++) {

			$price = $sql->select("CALL sp_vl_service_calculate(:des_service_description, :qtd_service)", array(
			":des_service_description"=>$servicesDesc[$i],
			":qtd_service"=>($this->formatPriceDot($servicesQtd[$i]))
			));

			$vl_service += $price[0]["price"];

		}

		$fct_buy = 1 + ($this->formatPriceDot($this->getfct_buy()) / 100);
		$fct_risk = 1 + ($this->formatPriceDot($this->getfct_risk()) / 100);

		$vl_material_buy = $vl_material * $fct_buy;
		$vl_service_risk = $vl_service * $fct_risk;

		$vl_price_commercial = $vl_material_buy + $vl_service_risk;
		$vl_price_non_commercial = 1.35 * $vl_service_risk + $vl_material_buy;

		$results = $sql->select("CALL sp_proposalsupdate_save(:id_proposal, :des_client_name, :des_service, :dt_visit, :dt_emission, :vl_material, :vl_service, :fct_buy, :fct_risk, :vl_material_buy, :vl_service_risk, :vl_price_commercial, :vl_price_non_commercial)", array(
			":id_proposal"=>$this->getid_proposal(),
			":des_client_name"=>$this->getdes_client_name(),
			":des_service"=>$this->getdes_service(),
			":dt_visit"=>$this->getdt_visit(),
			":dt_emission"=>$this->getdt_emission(),
			":vl_material"=>$vl_material,
			":vl_service"=>$vl_service,
			":fct_buy"=>$fct_buy,
			":fct_risk"=>$fct_risk,
			":vl_material_buy"=>$vl_material_buy,
			":vl_service_risk"=>$vl_service_risk,
			":vl_price_commercial"=>$vl_price_commercial,
			":vl_price_non_commercial"=>$vl_price_non_commercial
		));

		$this->setData($results[0]);
		/* -------------------------------------------------------- */
		$sql->select("DELETE FROM tb_proposal_materials WHERE id_proposal = :id_proposal;", array(
			":id_proposal"=>$this->getid_proposal()
		));

		$productsCount = count($this->getdes_products_description());
		$productsNames = $this->getdes_products_description();
		$productsQtd = $this->getqtd_material();

		$results[0]["des_products_description"] = [];
		$results[0]["qtd_material"] = [];

		for ($i = 0; $i < $productsCount; $i++) {

			
			$materials = $sql->select("CALL sp_proposal_materials_save(:id_proposal, :des_products_description, :qtd_material)", array(
				":id_proposal"=>$this->getid_proposal(),
				":des_products_description"=>$productsNames[$i],
				":qtd_material"=>$this->formatPriceDot($productsQtd[$i])
			));

			if (!empty($docs[$i]) ) {
				array_push($results[0]["des_products_description"], $materials[$i]["des_products_description"]);
				array_push($results[0]["qtd_material"], $materials[$i]["qtd_material"]);
			}

		}
		/* -------------------------------------------------------- */
		$sql->select("DELETE FROM tb_proposal_services WHERE id_proposal = :id_proposal;", array(
			":id_proposal"=>$this->getid_proposal()
		));

		$servicesCount = count($this->getdes_services_description());
		$servicesNames = $this->getdes_services_description();
		$servicesQtd = $this->getqtd_service();

		$results[0]["des_services_description"] = [];
		$results[0]["qtd_service"] = [];

		for ($i = 0; $i < $servicesCount; $i++) {

			$services = $sql->select("CALL sp_proposal_services_save(:id_proposal, :des_services_description, :qtd_service)", array(
				":id_proposal"=>$this->getid_proposal(),
				":des_services_description"=>$servicesNames[$i],
				":qtd_service"=>$this->formatPriceDot($servicesQtd[$i])
			));

			if (!empty($docs[$i]) ) {
				array_push($results[0]["des_services_description"], $services[$i]["des_services_description"]);
				array_push($results[0]["qtd_service"], $services[$i]["qtd_service"]);
			}

		}
		/* -------------------------------------------------------- */
		
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_proposals WHERE id_proposal = :id_proposal;", array(
			":id_proposal"=>$this->getid_proposal()
		));
		
	}

	public static function setError($msg)
	{

		$_SESSION[Proposal::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[Proposal::ERROR]) && $_SESSION[Proposal::ERROR]) ? $_SESSION[Proposal::ERROR] : '';

		Proposal::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[Proposal::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Proposal::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Proposal::SUCCESS]) && $_SESSION[Proposal::SUCCESS]) ? $_SESSION[Proposal::SUCCESS] : '';

		Proposal::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Proposal::SUCCESS] = NULL;

	}

}

 ?>