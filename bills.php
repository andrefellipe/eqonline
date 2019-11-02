<?php 

use \AF\PageAdmin;
use \AF\PageBills;
use \AF\Model\User;
use \AF\Model\CC;
use \AF\Model\BillToPay;
use \AF\Model\BillToReceive;
use \AF\Model\Supplier;
use \AF\Model\Client;
use \AF\Model\Order;

$app->get('/admin/bills/ccs', function() {

	User::verifyLogin();

	$ccs = CC::listAll();

	$page = new PageAdmin();

	$page->setTpl("ccs", array(
		"ccs"=>$ccs,
		"msgError"=>CC::getError(),
		"msgSuccess"=>CC::getSuccess()
	));

});

$app->get('/admin/bills/ccs/create', function() {

	User::verifyLogin();

	User::verifyAdmin();

	$page = new PageAdmin();

	$page->setTpl("ccs-create");

});

$app->post("/admin/bills/ccs/create", function() {

	User::verifyLogin();

	User::verifyAdmin();

	$cc = new CC();

	$cc->setData($_POST);

	$cc->save();

	header("Location: /admin/bills/ccs");
	exit;

});

$app->get('/admin/bills/ccs/:id_cc/delete', function($id_cc) {

	User::verifyLogin();

	User::verifyAdmin();

	$cc = new CC();

	$cc->get((int) $id_cc);

	$cc->delete();

	header("Location: /admin/bills/ccs");
	exit();

});

$app->get('/admin/bills/ccs/:id_cc', function($id_cc) {

	User::verifyLogin();

	User::verifyAdmin();

	$cc = new CC();

	$cc->get((int) $id_cc);

	$page = new PageAdmin();

	$page->setTpl("ccs-update", array(
		"cc"=>$cc->getValues()
	));

});

$app->post('/admin/bills/ccs/:id_cc', function($id_cc) {

	User::verifyLogin();

	User::verifyAdmin();

	$cc = new CC();

	$cc->get((int) $id_cc);

	$cc->setData($_POST);

	$cc->update();

	header("Location: /admin/bills/ccs");
	exit;

});
/*
-------------------------------------------------------
*/
$app->get('/admin/bills/to-pay', function() {

	User::verifyLogin();

	$bills = BillToPay::listAll();

	$page = new PageAdmin();

	$page->setTpl("bills-to-pay", array(
		"bills"=>$bills,
		"msgError"=>BillToPay::getError(),
		"msgSuccess"=>BillToPay::getSuccess()
	));

});

$app->get('/admin/bills/to-pay/create', function() {

	User::verifyLogin();

	User::verifyAdmin();

	$suppliers = Supplier::listAll();

	$ccs = CC::listAll();

	$orders = Order::listAll();

	$page = new PageAdmin();

	$page->setTpl("bills-to-pay-create", array(
		"suppliers"=>$suppliers,
		"ccs"=>$ccs,
		"orders"=>$orders
	));

});

$app->post('/admin/bills/to-pay/create', function() {

	User::verifyLogin();

	User::verifyAdmin();

	$bill = new BillToPay();

	$bill->setData($_POST);

	$bill->save();

	header("Location: /admin/bills/to-pay");
	exit;

});

$app->get('/admin/bills/to-pay/report', function() {

	User::verifyLogin();

	$suppliers = Supplier::listAll();

	$page = new PageAdmin();

	$page->setTpl("bills-to-pay-report", array(
		"suppliers"=>$suppliers
	));

});

$app->post('/admin/bills/to-pay/report', function() {

	User::verifyLogin();

	$infos = $_POST;

	if ($infos["des_description"] == "Total") {

		$toPay = BillToPay::listTotalBillsToPay($infos);

		$totalPay = BillToPay::findTotalToPay($infos)[0]["total"];

		$paid = BillToPay::listTotalBillsPaid($infos);

		$totalPaid = BillToPay::findTotalPaid($infos)[0]["total"];

	} else {

		$toPay = BillToPay::listSupplierBillsToPay($infos);

		$totalPay = BillToPay::findSupplierTotalToPay($infos)[0]["total"];

		$paid = BillToPay::listSupplierBillsPaid($infos);

		$totalPaid = BillToPay::findSupplierTotalPaid($infos)[0]["total"];

	}

	$page = new PageBills();

	$page->setTpl("bills-report-pay", array(
		"infos"=>$infos,
		"toPay"=>$toPay,
		"totalPay"=>$totalPay,
		"paid"=>$paid,
		"totalPaid"=>$totalPaid
	));

});

$app->get('/admin/bills/to-pay/:id_bill/delete', function($id_bill) {

	User::verifyLogin();

	User::verifyAdmin();

	$bill = new BillToPay();

	$bill->get((int) $id_bill);

	$bill->delete();

	header("Location: /admin/bills/to-pay");
	exit();

});

$app->get('/admin/bills/to-pay/:id_bill', function($id_bill) {

	User::verifyLogin();

	User::verifyAdmin();

	$bill = new BillToPay();

	$bill->get((int) $id_bill);

	$suppliers = Supplier::listAll();

	$ccs = CC::listAll();

	$orders = Order::listAll();

	$page = new PageAdmin();

	$page->setTpl("bills-to-pay-update", array(
		"bill"=>$bill->getValues(),
		"suppliers"=>$suppliers,
		"ccs"=>$ccs,
		"orders"=>$orders
	));

});

$app->post('/admin/bills/to-pay/:id_bill', function($id_bill) {

	User::verifyLogin();

	User::verifyAdmin();

	$bill = new BillToPay();

	$bill->get((int) $id_bill);

	$bill->setData($_POST);

	$bill->update();

	header("Location: /admin/bills/to-pay");
	exit;

});
/*
-------------------------------------------------------
*/
$app->get('/admin/bills/to-receive', function() {

	User::verifyLogin();

	$bills = BillToReceive::listAll();

	$page = new PageAdmin();

	$page->setTpl("bills-to-receive", array(
		"bills"=>$bills,
		"msgError"=>BillToReceive::getError(),
		"msgSuccess"=>BillToReceive::getSuccess()
	));

});

$app->get('/admin/bills/to-receive/create', function() {

	User::verifyLogin();

	User::verifyAdmin();

	$clients = Client::listAll();

	$ccs = CC::listAll();

	$orders = Order::listAll();

	$page = new PageAdmin();

	$page->setTpl("bills-to-receive-create", array(
		"clients"=>$clients,
		"ccs"=>$ccs,
		"orders"=>$orders
	));

});

$app->post('/admin/bills/to-receive/create', function() {

	User::verifyLogin();

	User::verifyAdmin();

	$bill = new BillToReceive();

	$bill->setData($_POST);

	$bill->save();

	header("Location: /admin/bills/to-receive");
	exit;

});

$app->get('/admin/bills/to-receive/report', function() {

	User::verifyLogin();

	$clients = Client::listAll();

	$page = new PageAdmin();

	$page->setTpl("bills-to-receive-report", array(
		"clients"=>$clients
	));

});

$app->post('/admin/bills/to-receive/report', function() {

	User::verifyLogin();

	$infos = $_POST;

	if ($infos["des_description"] == "Total") {

		$toReceive = BillToReceive::listTotalBillsToReceive($infos);

		$totalReceive = BillToReceive::findTotalToReceive($infos)[0]["total"];

		$received = BillToReceive::listTotalBillsReceived($infos);

		$totalReceived = BillToReceive::findTotalReceived($infos)[0]["total"];

	} else {

		$toReceive = BillToReceive::listClientBillsToReceive($infos);

		$totalReceive = BillToReceive::findClientTotalToReceive($infos)[0]["total"];

		$received = BillToReceive::listClientBillsReceived($infos);

		$totalReceived = BillToReceive::findClientTotalReceived($infos)[0]["total"];

	}

	$page = new PageBills();

	$page->setTpl("bills-report-receive", array(
		"infos"=>$infos,
		"toReceive"=>$toReceive,
		"received"=>$received,
		"totalReceive"=>$totalReceive,
		"totalReceived"=>$totalReceived
	));

});

$app->get('/admin/bills/to-receive/:id_bill/delete', function($id_bill) {

	User::verifyLogin();

	User::verifyAdmin();

	$bill = new BillToReceive();

	$bill->get((int) $id_bill);

	$bill->delete();

	header("Location: /admin/bills/to-receive");
	exit();

});

$app->get('/admin/bills/to-receive/:id_bill', function($id_bill) {

	User::verifyLogin();

	User::verifyAdmin();

	$bill = new BillToReceive();

	$bill->get((int) $id_bill);

	$clients = Client::listAll();

	$ccs = CC::listAll();

	$orders = Order::listAll();

	$page = new PageAdmin();

	$page->setTpl("bills-to-receive-update", array(
		"bill"=>$bill->getValues(),
		"clients"=>$clients,
		"ccs"=>$ccs,
		"orders"=>$orders
	));

});

$app->post('/admin/bills/to-receive/:id_bill', function($id_bill) {

	User::verifyLogin();

	User::verifyAdmin();

	$bill = new BillToReceive();

	$bill->get((int) $id_bill);

	$bill->setData($_POST);

	$bill->update();

	header("Location: /admin/bills/to-receive");
	exit;

});

 ?>