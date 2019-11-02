<?php 

use \AF\PageAdmin;
use \AF\PageRefuels;
use \AF\Model\User;
use \AF\Model\Vehicle;
use \AF\Model\Travel;
use \AF\Model\Refuel;
use \AF\Model\Supplier;
use \AF\Model\Maintenance;
use \AF\Model\Inspection;
use \AF\Model\Movement;

$app->get('/admin/transport/vehicles', function() {

	User::verifyLogin();

	$vehicles = Vehicle::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-vehicles", array(
		"vehicles"=>$vehicles,
		"msgError"=>Vehicle::getError(),
		"msgSuccess"=>Vehicle::getSuccess()
	));

});

$app->get('/admin/transport/vehicles/create', function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("transport-vehicles-create");

});

$app->post('/admin/transport/vehicles/create', function() {

	User::verifyLogin();

	$vehicle = new Vehicle();

	$vehicle->setData($_POST);

	$vehicle->save();

	header("Location: /admin/transport/vehicles");
	exit;

});

$app->get('/admin/transport/vehicles/:id_vehicle/delete', function($id_vehicle) {

	User::verifyLogin();

	$vehicle = new Vehicle();

	$vehicle->get((int) $id_vehicle);

	$vehicle->delete();

	header("Location: /admin/transport/vehicles");
	exit();

});

$app->get('/admin/transport/vehicles/:id_vehicle', function($id_vehicle) {

	User::verifyLogin();

	$vehicle = new Vehicle();

	$vehicle->get((int) $id_vehicle);

	$page = new PageAdmin();

	$page->setTpl("transport-vehicles-update", array(
		"vehicle"=>$vehicle->getValues()
	));

});

$app->post('/admin/transport/vehicles/:id_vehicle', function($id_vehicle) {

	User::verifyLogin();

	$vehicle = new Vehicle();

	$vehicle->get((int) $id_vehicle);

	$vehicle->setData($_POST);

	$vehicle->update();

	header("Location: /admin/transport/vehicles");
	exit();

});
/* ------------------------ */
$app->get('/admin/transport/travels', function() {

	User::verifyLogin();

	$travels = Travel::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-travels", array(
		"travels"=>$travels,
		"msgError"=>Travel::getError(),
		"msgSuccess"=>Travel::getSuccess()
	));

});

$app->get('/admin/transport/travels/create', function() {

	User::verifyLogin();

	$users = User::listAll();

	$vehicles = Vehicle::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-travels-create", array(
		"users"=>$users,
		"vehicles"=>$vehicles
	));

});

$app->post('/admin/transport/travels/create', function() {

	User::verifyLogin();

	$travel = new Travel();

	$travel->setData($_POST);

	$travel->save();

	header("Location: /admin/transport/travels");
	exit;

});

$app->get('/admin/transport/travels/:id_travel/delete', function($id_travel) {

	User::verifyLogin();

	$travel = new Travel();

	$travel->get((int) $id_travel);

	$travel->delete();

	header("Location: /admin/transport/travels");
	exit();

});

$app->get('/admin/transport/travels/:id_travel', function($id_travel) {

	User::verifyLogin();

	$travel = new Travel();

	$travel->get((int) $id_travel);

	$users = User::listAll();

	$vehicles = Vehicle::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-travels-update", array(
		"travel"=>$travel->getValues(),
		"users"=>$users,
		"vehicles"=>$vehicles
	));

});

$app->post('/admin/transport/travels/:id_travel', function($id_travel) {

	User::verifyLogin();

	$travel = new Travel();

	$travel->get((int) $id_travel);

	$travel->setData($_POST);

	$travel->update();

	header("Location: /admin/transport/travels");
	exit;

});
/* ------------------------ */
$app->get('/admin/transport/refuels', function() {

	User::verifyLogin();

	$refuels = Refuel::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-refuels", array(
		"refuels"=>$refuels,
		"msgError"=>Refuel::getError(),
		"msgSuccess"=>Refuel::getSuccess()
	));

});

$app->get('/admin/transport/refuels/create', function() {

	User::verifyLogin();

	$users = User::listAll();

	$vehicles = Vehicle::listAll();

	$suppliers = Supplier::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-refuels-create", array(
		"users"=>$users,
		"vehicles"=>$vehicles,
		"suppliers"=>$suppliers
	));

});

$app->post('/admin/transport/refuels/create', function() {

	User::verifyLogin();

	$refuel = new Refuel();

	$refuel->setData($_POST);

	$refuel->save();

	header("Location: /admin/transport/refuels");
	exit;

});

$app->get('/admin/transport/refuels/report', function() {

	User::verifyLogin();

	$vehicles = Vehicle::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-refuels-report", array(
		"vehicles"=>$vehicles
	));

});

$app->post('/admin/transport/refuels/report', function() {

	User::verifyLogin();

	$infos = $_POST;

	$data = Refuel::listReport($infos);
	$fuelTotal = Refuel::listFuelTotal($infos, $data[0]["id_vehicle"]);
	$priceTotal = Refuel::listPriceTotal($infos, $data[0]["id_vehicle"]);

	$infos["dt_rstart"] = date("d-m-Y", strtotime($infos["dt_rstart"]));
	$infos["dt_rfinish"] = date("d-m-Y", strtotime($infos["dt_rfinish"]));

	$page = new PageRefuels();

	$page->setTpl("refuels-report", array(
		"infos"=>$infos,
		"data"=>$data,
		"fuelTotal"=>$fuelTotal[0],
		"priceTotal"=>$priceTotal[0],
	));

});

$app->get('/admin/transport/refuels/:id_refuel/delete', function($id_refuel) {

	User::verifyLogin();

	$refuel = new Refuel();

	$refuel->get((int) $id_refuel);

	$refuel->delete();

	header("Location: /admin/transport/refuels");
	exit();

});

$app->get('/admin/transport/refuels/:id_refuel', function($id_refuel) {

	User::verifyLogin();

	$refuel = new Refuel();

	$refuel->get((int) $id_refuel);

	$users = User::listAll();

	$vehicles = Vehicle::listAll();

	$suppliers = Supplier::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-refuels-update", array(
		"refuel"=>$refuel->getValues(),
		"users"=>$users,
		"vehicles"=>$vehicles,
		"suppliers"=>$suppliers
	));

});

$app->post('/admin/transport/refuels/:id_refuel', function($id_refuel) {

	User::verifyLogin();

	$refuel = new Refuel();

	$refuel->get((int) $id_refuel);

	$refuel->setData($_POST);

	$refuel->update();

	header("Location: /admin/transport/refuels");
	exit;

});
/* ------------------------ */
$app->get('/admin/transport/maintenances', function() {

	User::verifyLogin();

	$maintenances = Maintenance::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-maintenances", array(
		"maintenances"=>$maintenances,
		"msgError"=>Maintenance::getError(),
		"msgSuccess"=>Maintenance::getSuccess()
	));

});

$app->get('/admin/transport/maintenances/create', function() {

	User::verifyLogin();

	$vehicles = Vehicle::listAll();

	$suppliers = Supplier::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-maintenances-create", array(
		"vehicles"=>$vehicles,
		"suppliers"=>$suppliers
	));

});

$app->post('/admin/transport/maintenances/create', function() {

	User::verifyLogin();

	$maintenance = new Maintenance();

	$maintenance->setData($_POST);

	$maintenance->save();

	header("Location: /admin/transport/maintenances");
	exit;

});

$app->get('/admin/transport/maintenances/:id_maintenance/delete', function($id_maintenance) {

	User::verifyLogin();

	$maintenance = new Maintenance();

	$maintenance->get((int) $id_maintenance);

	$maintenance->delete();

	header("Location: /admin/transport/maintenances");
	exit();

});

$app->get('/admin/transport/maintenances/:id_maintenance', function($id_maintenance) {

	User::verifyLogin();

	$maintenance = new Maintenance();

	$maintenance->get((int) $id_maintenance);

	$vehicles = Vehicle::listAll();

	$suppliers = Supplier::listAll();

	$page = new PageAdmin();

	$page->setTpl("transport-maintenances-update", array(
		"maintenance"=>$maintenance->getValues(),
		"vehicles"=>$vehicles,
		"suppliers"=>$suppliers
	));

});

$app->post('/admin/transport/maintenances/:id_maintenance', function($id_maintenance) {

	User::verifyLogin();

	$maintenance = new Maintenance();

	$maintenance->get((int) $id_maintenance);

	$maintenance->setData($_POST);

	$maintenance->update();

	header("Location: /admin/transport/maintenances");
	exit;

});
/* ------------------------ */
$app->get('/admin/transport/vehicles/:id_vehicle/inspections', function($id_vehicle) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$vehicle = new Vehicle();

	$vehicle->get((int) $id_vehicle);

	$inspections = Inspection::listAllV($id_vehicle);

	$page = new PageAdmin();

	$page->setTpl("transport-vehicles-inspections", array(
		"vehicle"=>$vehicle->getValues(),
		"inspections"=>$inspections,
		"msgError"=>Inspection::getError(),
		"msgSuccess"=>Inspection::getSuccess()
	));

});

$app->get('/admin/transport/vehicles/:id_vehicle/inspections/create', function($id_vehicle) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$vehicle = new Vehicle();

	$vehicle->get((int) $id_vehicle);

	$des_destination = $vehicle->getValues()["des_description"];

	$tools = Movement::findVehicleTools($id_vehicle, $des_destination);

	$num_tools = Movement::findQtdToolsV($id_vehicle, $des_destination)[0]['num_tools'];

	$page = new PageAdmin();

	$page->setTpl("transport-vehicles-inspections-create", array(
		"vehicle"=>$vehicle->getValues(),
		"tools"=>$tools,
		"num_tools"=>$num_tools
	));

});

$app->post('/admin/transport/vehicles/:id_vehicle/inspections/create', function($id_vehicle) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$vehicle = new Vehicle();

	$vehicle->get((int) $id_vehicle);

	if (!isset($_POST['tool_verification'])) {
		$_POST['tool_verification'] = NULL;
	}

	$inspection = new Inspection();

	$inspection->setData($_POST);

	$inspection->saveV();

	header("Location: /admin/transport/vehicles/$id_vehicle/inspections");
	exit;

});

 ?>