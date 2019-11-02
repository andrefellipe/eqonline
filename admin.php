<?php 

use \AF\PageAdmin;
use \AF\DB\Sql;
use \AF\Model\User;

$app->get('/admin', function() {

	User::verifyLogin();

	$page = new PageAdmin();

	$user = User::getFromSession();

	User::setName($user->getValues()["des_name"]);

	$page->setTpl("index", [
		"msgName"=>User::getName()
	]);

});

$app->get('/', function() {	

	User::verifyLogin();

	header("Location: /admin");
	exit;

});

$app->get('/admin/login', function() {

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function() {

	User::login($_POST['login'], $_POST['password']);

	header("Location: /admin");
	exit;

});

$app->get('/admin/logout', function() {

	User::logout();

	header("Location: /admin/login");
	exit;

});

 ?>