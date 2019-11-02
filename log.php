<?php 

use \AF\PageAdmin;
use \AF\Model\User;
use \AF\Model\Record;
use \AF\Model\Absence;

$app->get('/admin/log/register', function() {

	User::verifyLogin();

	$user = User::getFromSession();

	$page = new PageAdmin();

	$page->setTpl("log-register", [
		"user"=>$user->getValues()
	]);

});

$app->get('/admin/log/in/:id_user', function($id_user) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$id_user);

	$page = new PageAdmin();

	$page->setTpl("log-in", [
		"user"=>$user->getValues(),
		"msgError"=>Record::getError(),
		"msgSuccess"=>Record::getSuccess()
	]);

});

$app->post('/admin/log/in/:id_user', function($id_user) {

	User::verifyLogin();

	$_POST["id_user"] = $id_user;

	$record = new Record();

	$record->setData($_POST);

	$record->saveBegin();

	header("Location: /admin/log/in/$id_user");
	exit;

});

$app->get('/admin/log/out/:id_user', function($id_user) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$id_user);

	$page = new PageAdmin();

	$page->setTpl("log-out", [
		"user"=>$user->getValues(),
		"msgError"=>Record::getError(),
		"msgSuccess"=>Record::getSuccess()
	]);

});

$app->post('/admin/log/out/:id_user', function($id_user) {

	User::verifyLogin();

	$_POST["id_user"] = $id_user;

	$record = new Record();

	$record->setData($_POST);

	$record->saveEnd();

	header("Location: /admin/log/out/$id_user");
	exit;

});

$app->get('/admin/log/out/lunch/:id_user', function($id_user) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$id_user);

	$page = new PageAdmin();

	$page->setTpl("log-out-lunch", [
		"user"=>$user->getValues(),
		"msgError"=>Record::getError(),
		"msgSuccess"=>Record::getSuccess()
	]);

});

$app->post('/admin/log/out/lunch/:id_user', function($id_user) {

	User::verifyLogin();

	$_POST["id_user"] = $id_user;

	$record = new Record();

	$record->setData($_POST);

	$record->saveBegin();

	header("Location: /admin/log/out/lunch/$id_user");
	exit;

});

$app->get('/admin/log/in/lunch/:id_user', function($id_user) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$id_user);

	$page = new PageAdmin();

	$page->setTpl("log-in-lunch", [
		"user"=>$user->getValues(),
		"msgError"=>Record::getError(),
		"msgSuccess"=>Record::getSuccess()
	]);

});

$app->post('/admin/log/in/lunch/:id_user', function($id_user) {

	User::verifyLogin();

	$_POST["id_user"] = $id_user;

	$record = new Record();

	$record->setData($_POST);

	$record->saveEnd();

	header("Location: /admin/log/in/lunch/$id_user");
	exit;

});

$app->get('/admin/log/records', function() {

	User::verifyLogin();

	$user = User::getFromSession();

	$page = new PageAdmin();

	$page->setTpl("log-records", [
		"user"=>$user->getValues()
	]);

});

$app->get('/admin/log/records/users', function() {

	User::verifyLogin();

	User::verifyAdmin();

	$records = Record::listAll();

	$page = new PageAdmin();

	$page->setTpl("log-records-users", array(
		"records"=>$records,
		"msgError"=>Record::getError(),
		"msgSuccess"=>Record::getSuccess()
	));

});

$app->get('/admin/log/records/:id_user', function($id_user) {

	User::verifyLogin();

	$records = Record::listUserRecords($id_user);

	$page = new PageAdmin();

	$page->setTpl("log-records-user", array(
		"records"=>$records
	));

});

$app->get('/admin/users/:id_user/log/:id_record', function($id_user, $id_record) {

	User::verifyLogin();

	User::verifyAdmin();

	$record = new Record();

	$record->get((int) $id_record);

	$page = new PageAdmin();

	$page->setTpl("log-records-user-update", array(
		"record"=>$record->getValues(),
		"msgError"=>Record::getError(),
		"msgSuccess"=>Record::getSuccess()
	));

});

$app->post('/admin/users/:id_user/log/:id_record', function($id_user, $id_record) {

	User::verifyLogin();

	User::verifyAdmin();

	$record = new Record();

	$record->get((int) $id_record);

	$record->setData($_POST);

	$record->update();

	Record::setSuccess("Registro alterado com sucesso.");

	header("Location: /admin/log/records/users");
	exit();

});

$app->get('/admin/users/:id_user/log/:id_record/delete', function($id_user, $id_record) {

	User::verifyLogin();

	User::verifyAdmin();

	$record = new Record();

	$record->get((int) $id_record);

	$record->delete();

	Record::setSuccess("Registro excluído.");

	header("Location: /admin/log/records/users");
	exit();

});

$app->get('/admin/log/absences', function() {

	User::verifyLogin();

	$user = User::getFromSession();

	$page = new PageAdmin();

	$page->setTpl("log-absences", [
		"user"=>$user->getValues()
	]);

});

$app->get('/admin/log/absences/create/:id_user', function($id_user) {

	User::verifyLogin();

	$user = new User();

	$user->get((int)$id_user);

	$page = new PageAdmin();

	$page->setTpl("log-absences-create", [
		"user"=>$user->getValues()
	]);

});

$app->post('/admin/log/absences/create/:id_user', function($id_user) {

	User::verifyLogin();

	$_POST["id_user"] = $id_user;

	$absence = new Absence();

	$absence->setData($_POST);

	$absence->save();

	header("Location: /admin/log/absences/$id_user");
	exit;

});

$app->get('/admin/log/absences/users', function() {

	User::verifyLogin();

	User::verifyAdmin();

	$absences = Absence::listAll();

	$page = new PageAdmin();

	$page->setTpl("log-absences-users", array(
		"absences"=>$absences,
		"msgError"=>Absence::getError(),
		"msgSuccess"=>Absence::getSuccess()
	));

});

$app->get('/admin/log/absences/:id_user', function($id_user) {

	User::verifyLogin();

	$absences = Absence::listUserAbsences($id_user);

	$page = new PageAdmin();

	$page->setTpl("log-absences-user", array(
		"absences"=>$absences,
		"msgError"=>Absence::getError(),
		"msgSuccess"=>Absence::getSuccess()
	));

});

$app->get('/admin/users/:id_user/absence/:id_absence', function($id_user, $id_absence) {

	User::verifyLogin();

	User::verifyAdmin();

	$absence = new Absence();

	$absence->get((int) $id_absence);

	$page = new PageAdmin();

	$page->setTpl("log-absences-user-update", array(
		"absence"=>$absence->getValues(),
		"msgError"=>Absence::getError(),
		"msgSuccess"=>Absence::getSuccess()
	));

});

$app->post('/admin/users/:id_user/absence/:id_absence', function($id_user, $id_absence) {

	User::verifyLogin();

	User::verifyAdmin();

	$absence = new Absence();

	$absence->get((int) $id_absence);

	$absence->setData($_POST);

	$absence->update();

	Absence::setSuccess("Falta alterada com sucesso.");

	header("Location: /admin/log/absences/users");
	exit();

});

$app->get('/admin/users/:id_user/absence/:id_record/delete', function($id_user, $id_absence) {

	User::verifyLogin();

	User::verifyAdmin();

	$absence = new Absence();

	$absence->get((int) $id_absence);

	$absence->delete();

	Absence::setSuccess("Falta excluída.");

	header("Location: /admin/log/absences/users");
	exit();

});

 ?>