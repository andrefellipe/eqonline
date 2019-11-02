<?php 

use \AF\PageAdmin;
use \AF\Model\User;
use \AF\Model\Supplier;

$app->get('/admin/suppliers', function() {

	User::verifyLogin();

	$suppliers = Supplier::listAll();

	$page = new PageAdmin();

	$page->setTpl("suppliers", array(
		"suppliers"=>$suppliers,
		"msgError"=>Supplier::getError(),
		"msgSuccess"=>Supplier::getSuccess()
	));

});

$app->get('/admin/suppliers/create', function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("suppliers-create");

});

$app->post("/admin/suppliers/create", function() {

	User::verifyLogin();

	$supplier = new Supplier();

	$supplier->setData($_POST);

	$supplier->save();

	header("Location: /admin/suppliers");
	exit;

});

$app->get('/admin/suppliers/:id_supplier/delete', function($id_supplier) {

	User::verifyLogin();

	$supplier = new Supplier();

	$supplier->get((int) $id_supplier);

	$supplier->delete();

	header("Location: /admin/suppliers");
	exit();

});

$app->get('/admin/suppliers/:id_supplier', function($id_supplier) {

	User::verifyLogin();

	$supplier = new Supplier();

	$supplier->get((int) $id_supplier);

	$page = new PageAdmin();

	$page->setTpl("suppliers-update", array(
		"supplier"=>$supplier->getValues()
	));

});

$app->post('/admin/suppliers/:id_supplier', function($id_supplier) {

	User::verifyLogin();

	$supplier = new Supplier();

	$supplier->get((int) $id_supplier);

	$supplier->setData($_POST);

	$supplier->update();

	header("Location: /admin/suppliers");
	exit;

});

 ?>