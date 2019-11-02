<?php 

use \AF\PageAdmin;
use \AF\PageProposal;
use \AF\PageLists;
use \AF\Model\User;
use \AF\Model\Service;
use \AF\Model\Proposal;
use \AF\Model\Client;
use \AF\Model\Product;

$app->get('/admin/proposals/services', function() {

	User::verifyLogin();

	$services = Service::listAll();

	$page = new PageAdmin();

	$page->setTpl("proposals-services", array(
		"services"=>$services,
		"msgError"=>Service::getError(),
		"msgSuccess"=>Service::getSuccess()
	));

});

$app->get('/admin/proposals/services/create', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$page = new PageAdmin();

	$page->setTpl("proposals-services-create");

});

$app->post('/admin/proposals/services/create', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$service = new Service();

	$service->setData($_POST);

	$service->save();

	header("Location: /admin/proposals/services");
	exit;

});

$app->get('/admin/proposals/services/:id_service/delete', function($id_service) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$service = new Service();

	$service->get((int) $id_service);

	$service->delete();

	header("Location: /admin/proposals/services");
	exit();

});

$app->get('/admin/proposals/services/:id_service', function($id_service) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$service = new Service();

	$service->get((int) $id_service);

	$page = new PageAdmin();

	$page->setTpl("proposals-services-update", array(
		"service"=>$service->getValues()
	));

});

$app->post('/admin/proposals/services/:id_service', function($id_service) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$service = new Service();

	$service->get((int) $id_service);

	$service->setData($_POST);

	$service->update();

	header("Location: /admin/proposals/services");
	exit;

});
/* ----------------------- */
$app->get('/admin/proposals', function() {

	User::verifyLogin();

	$proposals = Proposal::listAll();

	$page = new PageAdmin();

	$page->setTpl("proposals", array(
		"proposals"=>$proposals,
		"msgError"=>Proposal::getError(),
		"msgSuccess"=>Proposal::getSuccess()
	));

});

$app->get('/admin/proposals/create', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$clients = Client::listAll();

	$products = Product::listAll();

	$services = Service::listAll();

	$page = new PageAdmin();

	$page->setTpl("proposals-create", array(
		"clients"=>$clients,
		"products"=>$products,
		"services"=>$services
	));

});

$app->post('/admin/proposals/create', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$proposal = new Proposal();

	$proposal->setData($_POST);

	$proposal->save();

	header("Location: /admin/proposals");
	exit;

});

$app->get('/admin/proposals/:id_proposal/delete', function($id_proposal) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$proposal = new Proposal();

	$proposal->get((int) $id_proposal);

	$proposal->delete();

	header("Location: /admin/proposals");
	exit();

});

$app->get('/admin/proposals/:id_proposal', function($id_proposal) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$clients = Client::listAll();

	$products = Product::listAll();

	$services = Service::listAll();

	$proposal = new Proposal();

	$proposal->get((int) $id_proposal);

	$materialName = $proposal->getValues()["des_products_description"];

	$materialQtd = $proposal->getValues()["qtd_material"];

	$materialPrices = $proposal->getValues()["vl_sell_price"];

//	$materialData = array_combine($materialName, $materialQtd);

	$materials = [];

	for ($i = 0; $i < count($materialName); $i++) {
		
		$materials["material_" . $i]["des_products_description"] = $materialName[$i];
		$materials["material_" . $i]["qtd_material"] = $materialQtd[$i];
		$materials["material_" . $i]["vl_sell_price"] = $materialPrices[$i];

	}

	$materialEmpty = 0;

	if (empty($materials)) {
		$materialEmpty = 1;
	}

	$serviceName = $proposal->getValues()["des_services_description"];

	$serviceQtd = $proposal->getValues()["qtd_service"];

	$servicePrices = $proposal->getValues()["vl_price"];

	//$serviceData = array_combine($serviceName, $serviceQtd);

	$servicesp = [];

	for ($i = 0; $i < count($serviceName); $i++) {
		
		$servicesp["service_" . $i]["des_services_description"] = $serviceName[$i];
		$servicesp["service_" . $i]["qtd_service"] = $serviceQtd[$i];
		$servicesp["service_" . $i]["vl_price"] = $servicePrices[$i];

	}

	$serviceEmpty = 0;

	if (empty($servicesp)) {
		$serviceEmpty = 1;
	}

	$page = new PageAdmin();

	$page->setTpl("proposals-update", array(
		"proposal"=>$proposal->getValues(),
		"materials"=>$materials,
		"materialEmpty"=>$materialEmpty,
		"servicesp"=>$servicesp,
		"serviceEmpty"=>$serviceEmpty,
		"clients"=>$clients,
		"products"=>$products,
		"services"=>$services
	));

});

$app->post('/admin/proposals/:id_proposal', function($id_proposal) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$proposal = new Proposal();

	$proposal->get((int) $id_proposal);

	$proposal->setData($_POST);

	$proposal->update();

	header("Location: /admin/proposals/$id_proposal");
	exit;

});

$app->get('/admin/proposals/:id_proposal/generate', function($id_proposal) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$proposal = new Proposal();

	$proposal->get((int) $id_proposal);

	$page = new PageAdmin();

	$page->setTpl("proposals-generate", array(
		"proposal"=>$proposal->getValues()
	));

});

$app->post('/admin/proposals/:id_proposal/generate', function($id_proposal) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$proposal = $_POST;

	$proposal["dt_emission"] = date("d/m/Y", strtotime($proposal["dt_emission"]));

	$items = [];

	for ($i = 0; $i < count($proposal["item"]); $i++) {
		
		$items["item_" . $i]["item"] = $proposal["item"][$i];
		$items["item_" . $i]["des_description"] = $proposal["des_description"][$i];
		$items["item_" . $i]["qtd"] = $proposal["qtd"][$i];
		$items["item_" . $i]["unit"] = $proposal["unit"][$i];
		$items["item_" . $i]["price"] = $proposal["price"][$i];
		$items["item_" . $i]["total_price"] = $proposal["total_price"][$i];

	}

	$page = new PageProposal();

	$page->setTpl("proposal", array(
		"proposal"=>$proposal,
		"items"=>$items
	));

});

$app->get('/admin/proposals/:id_proposal/duplicate', function($id_proposal) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$clients = Client::listAll();

	$products = Product::listAll();

	$services = Service::listAll();

	$proposal = new Proposal();

	$proposal->get((int) $id_proposal);

	$materialName = $proposal->getValues()["des_products_description"];

	$materialQtd = $proposal->getValues()["qtd_material"];

	$materialPrices = $proposal->getValues()["vl_sell_price"];

	$materials = [];

	for ($i = 0; $i < count($materialName); $i++) {
		
		$materials["material_" . $i]["des_products_description"] = $materialName[$i];
		$materials["material_" . $i]["qtd_material"] = $materialQtd[$i];
		$materials["material_" . $i]["vl_sell_price"] = $materialPrices[$i];

	}

	$materialEmpty = 0;

	if (empty($materials)) {
		$materialEmpty = 1;
	}

	$serviceName = $proposal->getValues()["des_services_description"];

	$serviceQtd = $proposal->getValues()["qtd_service"];

	$servicePrices = $proposal->getValues()["vl_price"];

	$servicesp = [];

	for ($i = 0; $i < count($serviceName); $i++) {
		
		$servicesp["service_" . $i]["des_services_description"] = $serviceName[$i];
		$servicesp["service_" . $i]["qtd_service"] = $serviceQtd[$i];
		$servicesp["service_" . $i]["vl_price"] = $servicePrices[$i];

	}

	$serviceEmpty = 0;

	if (empty($servicesp)) {
		$serviceEmpty = 1;
	}

	$page = new PageAdmin();

	$page->setTpl("proposals-duplicate", array(
		"proposal"=>$proposal->getValues(),
		"materials"=>$materials,
		"materialEmpty"=>$materialEmpty,
		"servicesp"=>$servicesp,
		"serviceEmpty"=>$serviceEmpty,
		"clients"=>$clients,
		"products"=>$products,
		"services"=>$services
	));

});
/* ----------------------- */
$app->get('/admin/proposals/:id_proposal/list', function($id_proposal) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$list = Proposal::listPricelessMaterials($id_proposal);

	$page = new PageAdmin();

	$page->setTpl("proposals-list", array(
		"id_proposal"=>$list[0]["id_proposal"],
		"des_client_name"=>$list[0]["des_client_name"],
		"des_service"=>$list[0]["des_service"],
		"dt_emission"=>$list[0]["dt_emission"]
	));

});

$app->post('/admin/proposals/:id_proposal/list', function($id_proposal) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$info = $_POST;

	$info["dt_emission"] = date("d/m/Y", strtotime($info["dt_emission"]));

	$materials = Proposal::listPricelessMaterials($id_proposal);

	$materialPricesM = Proposal::listMaterials($id_proposal);

	$services = Proposal::listServices($id_proposal);

	$proposal = new Proposal();

	$proposal->get((int) $id_proposal);

	$page = new PageLists();

	$page->setTpl("lists", array(
		"info"=>$info,
		"materials"=>$materials,
		"materialsM"=>$materialPricesM,
		"services"=>$services,
		"proposal"=>$proposal->getValues()
	));

});

 ?>