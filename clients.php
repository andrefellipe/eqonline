<?php 

use \AF\PageAdmin;
use \AF\Model\User;
use \AF\Model\Client;

$app->get('/admin/clients', function() {

	User::verifyLogin();

	$clients = Client::listAll();

	$page = new PageAdmin();

	$page->setTpl("clients", array(
		"clients"=>$clients,
		"msgError"=>Client::getError(),
		"msgSuccess"=>Client::getSuccess()
	));

});

$app->get('/admin/clients/create', function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("clients-create");

});

$app->post("/admin/clients/create", function() {

	User::verifyLogin();

	$client = new Client();

	$client->setData($_POST);

	$client->save();

	header("Location: /admin/clients");
	exit;

});

$app->get('/admin/clients/:id_client/delete', function($id_client) {

	User::verifyLogin();

	$client = new Client();

	$client->get((int) $id_client);

	$client->delete();

	header("Location: /admin/clients");
	exit();

});

$app->get('/admin/clients/:id_client', function($id_client) {

	User::verifyLogin();

	$client = new Client();

	$client->get((int) $id_client);

	$page = new PageAdmin();

	$page->setTpl("clients-update", array(
		"client"=>$client->getValues()
	));

});

$app->post('/admin/clients/:id_client', function($id_client) {

	User::verifyLogin();

	$client = new Client();

	$client->get((int) $id_client);

	$client->setData($_POST);

	$client->update();

	header("Location: /admin/clients");
	exit;

});

 ?>