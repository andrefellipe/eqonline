<?php 

use \AF\PageAdmin;
use \AF\Model\User;

$app->get('/admin/users', function() {

	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users"=>$users,
		"msgError"=>User::getError(),
		"msgSuccess"=>User::getSuccess()
	));

});

$app->get('/admin/users/create', function() {

	User::verifyLogin();

	User::verifyAdmin();

	$page = new PageAdmin();

	$page->setTpl("users-create");

});

$app->post("/admin/users/create", function() {

	User::verifyLogin();

	User::verifyAdmin();

	$user = new User();

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");
	exit;

});

$app->get('/admin/users/:id_user/delete', function($id_user) {

	User::verifyLogin();

	User::verifyAdmin();

	$user = new User();

	$user->get((int) $id_user);

	$user->delete();

	header("Location: /admin/users");
	exit();

});

$app->get('/admin/users/:id_user', function($id_user) {

	User::verifyLogin();

	User::verifyAdmin();

	$user = new User();

	$user->get((int) $id_user);

	$docDate = $user->getValues()["dt_due"];

	$docName = $user->getValues()["des_doc_name"];

	$docData = array_combine($docName, $docDate);

	$docEmpty = 0;

	if(empty($docData)) {
		$docEmpty = 1;
	}

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"user"=>$user->getValues(),
		"docData"=>$docData,
		"docEmpty"=>$docEmpty
	));

});

$app->post('/admin/users/:id_user', function($id_user) {

	User::verifyLogin();

	User::verifyAdmin();

	$user = new User();

	$user->get((int) $id_user);

	$user->setData($_POST);

	$user->update();

	header("Location: /admin/users");
	exit;

});

$app->get('/admin/users/:id_user/password', function($id_user) {

	User::verifyLogin();

	User::verifyAdminOrUser((int) $id_user);

	$user = new User();

	$user->get((int)$id_user);

	$page = new PageAdmin();

	$page->setTpl("users-password", [
		"user"=>$user->getValues(),
		"msgError"=>User::getError(),
		"msgSuccess"=>User::getSuccess()
	]);

});

$app->post("/admin/users/:id_user/password", function($id_user){

	User::verifyLogin();

	User::verifyAdminOrUser((int) $id_user);

	if (!isset($_POST['des_password']) || $_POST['des_password']==='') {

		User::setError("Preencha a nova senha.");
		header("Location: /admin/users/$id_user/password");
		exit;
	}

	if (!isset($_POST['des_password-confirm']) || $_POST['des_password-confirm']==='') {

		User::setError("Preencha a confirmação da nova senha.");
		header("Location: /admin/users/$id_user/password");
		exit;

	}

	if ($_POST['des_password'] !== $_POST['des_password-confirm']) {

		User::setError("Confirme corretamente as senhas.");
		header("Location: /admin/users/$id_user/password");
		exit;

	}

	$user = new User();

	$user->get((int)$id_user);

	$user->setPassword(User::getPasswordHash($_POST['des_password']));

	User::setSuccess("Senha alterada com sucesso.");

	header("Location: /admin/users");
	exit;

});

?>