<?php 

use \AF\PageAdmin;
use \AF\PageSPED;
use \AF\Model\User;
use \AF\Model\Product;
use \AF\Model\Toolbox;
use \AF\Model\Movement;
use \AF\Model\Vehicle;
use \AF\Model\Order;
use \AF\Model\Inspection;

$app->get('/admin/warehouse/products', function() {

	User::verifyLogin();

	$products = Product::listAll();

	$page = new PageAdmin();

	$page->setTpl("warehouse-products", array(
		"products"=>$products,
		"msgError"=>Product::getError(),
		"msgSuccess"=>Product::getSuccess()
	));

});

$app->get('/admin/warehouse/products/create', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$page = new PageAdmin();

	$page->setTpl("warehouse-products-create");

});

$app->post("/admin/warehouse/products/create", function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$product = new Product();

	$product->setData($_POST);

	$product->save();

	header("Location: /admin/warehouse/products");
	exit;

});

$app->get('/admin/warehouse/products/:id_product/delete', function($id_product) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$product = new Product();

	$product->get((int) $id_product);

	$product->delete();

	header("Location: /admin/warehouse/products");
	exit();

});
/* -------------------- */
$app->get('/admin/warehouse/products/in', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$products = Product::listAll();

	$page = new PageAdmin();

	$page->setTpl("warehouse-products-in", array(
		"products"=>$products
	));

});

$app->post('/admin/warehouse/products/in', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$movement = new Movement();

	$movement->setData($_POST);

	$movement->saveIn();

	header("Location: /admin/warehouse/reports/entries");
	exit;

});
/* -------------------- */
$app->get('/admin/warehouse/products/out', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$products = Product::listAll();

	$vehicles = Vehicle::listAll();

	$toolboxes = Toolbox::listAll();

	$orders = Order::listAll();

	$page = new PageAdmin();

	$page->setTpl("warehouse-products-out", array(
		"products"=>$products,
		"vehicles"=>$vehicles,
		"toolboxes"=>$toolboxes,
		"orders"=>$orders
	));

});

$app->post('/admin/warehouse/products/out', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$movement = new Movement();

	$movement->setData($_POST);

	$movement->saveOut();

	header("Location: /admin/warehouse/reports/entries");
	exit;

});
/* -------------------- */
$app->get('/admin/warehouse/products/return', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$products = Product::listAll();

	$vehicles = Vehicle::listAll();

	$toolboxes = Toolbox::listAll();

	$orders = Order::listAll();

	$page = new PageAdmin();

	$page->setTpl("warehouse-products-return", array(
		"products"=>$products,
		"vehicles"=>$vehicles,
		"toolboxes"=>$toolboxes,
		"orders"=>$orders
	));

});

$app->post('/admin/warehouse/products/return', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$movement = new Movement();

	$movement->setData($_POST);

	$movement->saveReturn();

	header("Location: /admin/warehouse/reports/entries");
	exit;

});
/* -------------------- */
$app->get('/admin/warehouse/products/:id_product', function($id_product) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$product = new Product();

	$product->get((int) $id_product);

	$page = new PageAdmin();

	$page->setTpl("warehouse-products-update", array(
		"product"=>$product->getValues()
	));

});

$app->post('/admin/warehouse/products/:id_product', function($id_product) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$product = new Product();

	$product->get((int) $id_product);

	$product->setData($_POST);

	$product->update();

	header("Location: /admin/warehouse/products");
	exit;

});
/* -------------------- */
$app->get('/admin/warehouse/reports', function() {

	$page = new PageAdmin();

	$page->setTpl("warehouse-reports");

});
/* -------------------- */
$app->get('/admin/warehouse/reports/entries', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$movements = Movement::listAll();

	$page = new PageAdmin();

	$page->setTpl("warehouse-reports-entries", array(
		"movements"=>$movements,
		"msgError"=>Movement::getError(),
		"msgSuccess"=>Movement::getSuccess()
	));

});
/* -------------------- */
$app->get('/admin/warehouse/reports/SPED', function() {

	$page = new PageAdmin();

	$page->setTpl("warehouse-reports-SPED");

});

$app->post('/admin/warehouse/reports/SPED', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$dates = $_POST;
	$dates["dt_start"] = date("d-m-Y", strtotime($dates["dt_start"]));
	$dates["dt_start"] = str_replace("-", "", $dates["dt_start"]);
	$dates["dt_finish"] = date("d-m-Y", strtotime($dates["dt_finish"]));
	$dates["dt_finish"] = str_replace("-", "", $dates["dt_finish"]);

	$units = Product::getSPEDUnits();

	$total_units = Product::getTotalSPEDUnits()[0]["total_units"];

	$products = Product::getSPEDProducts();

	$qtd_block = 5 + count($units) + count($products);

	$totalPrice = Product::getSPEDTotal()[0]["total"];

	$qtd_inventory = 3 + count($products);

	$totalLines = (2 * count($products)) + $total_units + 56;

	$page = new PageSPED();

	$page->setTpl("sped", array(
		"dates"=>$dates,
		"units"=>$units,
		"products"=>$products,
		"qtd_block"=>$qtd_block,
		"totalPrice"=>$totalPrice,
		"qtd_inventory"=>$qtd_inventory,
		"total_units"=>$total_units,
		"total_products"=>count($products),
		"totalLines"=>$totalLines
	));

});
/* -------------------- */
$app->get('/admin/warehouse/toolboxes', function() {

	User::verifyLogin();

	$toolboxes = Toolbox::listAll();

	$page = new PageAdmin();

	$page->setTpl("warehouse-toolboxes", array(
		"toolboxes"=>$toolboxes,
		"msgError"=>Toolbox::getError(),
		"msgSuccess"=>Toolbox::getSuccess()
	));

});

$app->get('/admin/warehouse/toolboxes/create', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("warehouse-toolboxes-create", array(
		"users"=>$users
	));

});

$app->post('/admin/warehouse/toolboxes/create', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$toolbox = new Toolbox();

	$toolbox->setData($_POST);

	$toolbox->save();

	header("Location: /admin/warehouse/toolboxes");
	exit;

});

$app->get('/admin/warehouse/toolboxes/:id_toolbox/delete', function($id_toolbox) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$toolbox = new Toolbox();

	$toolbox->get((int) $id_toolbox);

	$toolbox->delete();

	header("Location: /admin/warehouse/toolboxes");
	exit();

});

$app->get('/admin/warehouse/toolboxes/:id_toolbox', function($id_toolbox) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$toolbox = new Toolbox();

	$toolbox->get((int) $id_toolbox);

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("warehouse-toolboxes-update", array(
		"toolbox"=>$toolbox->getValues(),
		"users"=>$users
	));

});

$app->post('/admin/warehouse/toolboxes/:id_toolbox', function($id_toolbox) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$toolbox = new Toolbox();

	$toolbox->get((int) $id_toolbox);

	$toolbox->setData($_POST);

	$toolbox->update();

	header("Location: /admin/warehouse/toolboxes");
	exit;

});
/* -------------------- */
$app->get('/admin/warehouse/toolboxes/:id_toolbox/inspections', function($id_toolbox) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$toolbox = new Toolbox();

	$toolbox->get((int) $id_toolbox);

	$inspections = Inspection::listAllT($id_toolbox);

	$page = new PageAdmin();

	$page->setTpl("warehouse-toolboxes-inspections", array(
		"toolbox"=>$toolbox->getValues(),
		"inspections"=>$inspections,
		"msgError"=>Inspection::getError(),
		"msgSuccess"=>Inspection::getSuccess()
	));

});

$app->get('/admin/warehouse/toolboxes/:id_toolbox/inspections/create', function($id_toolbox) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$toolbox = new Toolbox();

	$toolbox->get((int) $id_toolbox);

	$des_destination = $toolbox->getValues()["des_description"];

	$tools = Movement::findToolboxTools($id_toolbox, $des_destination);

	$num_tools = Movement::findQtdToolsT($id_toolbox, $des_destination)[0]['num_tools'];

	$page = new PageAdmin();

	$page->setTpl("warehouse-toolboxes-inspections-create", array(
		"toolbox"=>$toolbox->getValues(),
		"tools"=>$tools,
		"num_tools"=>$num_tools
	));

});

$app->post('/admin/warehouse/toolboxes/:id_toolbox/inspections/create', function($id_toolbox) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$toolbox = new Toolbox();

	$toolbox->get((int) $id_toolbox);

	if (!isset($_POST['tool_verification'])) {
		$_POST['tool_verification'] = NULL;
	}

	$inspection = new Inspection();

	$inspection->setData($_POST);

	$inspection->saveT();

	header("Location: /admin/warehouse/toolboxes/$id_toolbox/inspections");
	exit;

});

?>