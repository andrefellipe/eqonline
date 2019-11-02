<?php 

use \AF\PageAdmin;
use \AF\PageOrder;
use \AF\Model\User;
use \AF\Model\Order;
use \AF\Model\Client;
use \AF\Model\Movement;

$app->get('/admin/orders', function() {

	User::verifyLogin();

	$orders = Order::listAll();

	$page = new PageAdmin();

	$page->setTpl("orders", array(
		"orders"=>$orders,
		"msgError"=>Order::getError(),
		"msgSuccess"=>Order::getSuccess()
	));

});

$app->get('/admin/orders/create', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$clients = Client::listAll();

	$page = new PageAdmin();

	$page->setTpl("orders-create", array(
		"clients"=>$clients
	));

});

$app->post('/admin/orders/create', function() {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$order = new Order();

	$order->setData($_POST);

	$order->save();

	header("Location: /admin/orders");
	exit;

});

$app->get('/admin/orders/:id_order/delete', function($id_order) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$order = new Order();

	$order->get((int) $id_order);

	$order->delete();

	header("Location: /admin/orders");
	exit();

});

$app->get('/admin/orders/:id_order/generate', function($id_order) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$order = new Order();

	$order->get((int) $id_order);

	$client = new Client();

	$client->get((int) $order->getValues()["id_client"]);

	$page = new PageAdmin();

	$page->setTpl("orders-generate", array(
		"order"=>$order->getValues(),
		"client"=>$client->getValues()
	));

});

$app->post('/admin/orders/:id_order/generate', function($id_order) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$order = $_POST;

	if($order["dt_start"] != "") {
		$order["dt_start"] = date("d/m/Y", strtotime($order["dt_start"]));
	}

	if($order["dt_finish"] != "") {
		$order["dt_finish"] = date("d/m/Y", strtotime($order["dt_finish"]));
	}

	$page = new PageOrder();

	$page->setTpl("order", array(
		"order"=>$order
	));

});

$app->get('/admin/orders/:id_order/list', function($id_order) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$order = new Order();

	$order->get((int) $id_order);

	$client = new Client();

	$client->get((int) $order->getValues()["id_client"]);

	$page = new PageAdmin();

	$page->setTpl("orders-list", array(
		"order"=>$order->getValues(),
		"client"=>$client->getValues()
	));

});

$app->post('/admin/orders/:id_order/list', function($id_order) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$order = $_POST;

	if($order["dt_start"] != "") {
		$order["dt_start"] = date("d/m/Y", strtotime($order["dt_start"]));
	}

	if($order["dt_finish"] != "") {
		$order["dt_finish"] = date("d/m/Y", strtotime($order["dt_finish"]));
	}

	$movements = Movement::findOrderMovements($order["des_description"]);

	$total = Movement::findOrderMovementsT($order["des_description"])[0];

	$page = new PageOrder();

	$page->setTpl("order-list", array(
		"order"=>$order,
		"movements"=>$movements,
		"total"=>$total
	));

});

$app->get('/admin/orders/:id_order', function($id_order) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$order = new Order();

	$order->get((int) $id_order);

	$clients = Client::listAll();

	$page = new PageAdmin();

	$page->setTpl("orders-update", array(
		"order"=>$order->getValues(),
		"clients"=>$clients
	));

});

$app->post('/admin/orders/:id_order', function($id_order) {

	User::verifyLogin();

	User::verifyAdminOrIntern();

	$order = new Order();

	$order->get((int) $id_order);

	$order->setData($_POST);

	$order->update();

	header("Location: /admin/orders");
	exit;

});

 ?>