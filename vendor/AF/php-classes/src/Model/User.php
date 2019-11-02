<?php 

namespace AF\Model;

use \AF\DB\Sql;
use \AF\Model;
use \AF\Mailer;

class User extends Model
{

	const SESSION = "User";
	const ERROR = "UserError";
	const SUCCESS = "UserSucess";
	const NAME = "UserName";

	public static function login($login, $password)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE des_login = :LOGIN", array(
			":LOGIN"=>$login
		));

		if (count($results) == 0)
		{
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}

		$data = $results[0];

		//if ($password === $data['des_password'])
		if (password_verify($password, $data['des_password']) === true)
		{

			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;

		} else {

			throw new \Exception("Usuário inexistente ou senha inválida.");

		}

	}

	public static function verifyLogin()
	{

		if (

			!isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["id_user"] > 0
		) {

			header("Location: /admin/login");
			exit();

		}

	}

	public static function verifyAdmin()
	{

		if (
			(int)$_SESSION[User::SESSION]["des_category"] != 0
		) {

			User::setError("Acesso Negado.");

			header("Location: /admin/users");
			exit();

		}

	}

	public static function verifyAdminOrUser($id_user)
	{

		if (
			((int)$_SESSION[User::SESSION]["id_user"] != $id_user && (int)$_SESSION[User::SESSION]["des_category"] != 0)
		) {

			User::setError("Acesso Negado.");

			header("Location: /admin/users");
			exit();

		}

	}

	public static function verifyAdminOrIntern()
	{

		if (
			((int)$_SESSION[User::SESSION]["des_category"] == 2)
		) {

			User::setError("Acesso Negado.");

			header("Location: /admin/users");
			exit();

		}

	}

	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;
	}

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_users");
	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_users_save(:des_name, :des_login, :des_password, :des_CPF, :des_RG, :des_RG_agency, :des_UF, :des_CNH, :des_CNH_category, :des_workID, :dt_admission, :des_civil_state, :des_bank, :des_agency, :des_account, :des_account_type, :des_address, :des_neighborhood, :des_city_state, :des_CEP, :des_cel_phone, :des_phone, :des_category)", array(

			":des_name"=>trim(preg_replace('/\s+/',' ', $this->getdes_name())),
			":des_login"=>$this->getdes_login(),
			":des_password"=>User::getPasswordHash($this->getdes_password()),
			":des_CPF"=>$this->getdes_CPF(),
			":des_RG"=>$this->getdes_RG(),
			":des_RG_agency"=>$this->getdes_RG_agency(),
			":des_UF"=>$this->getdes_UF(),
			":des_CNH"=>$this->getdes_CNH(),
			":des_CNH_category"=>$this->getdes_CNH_category(),
			":des_workID"=>$this->getdes_workID(),
			":dt_admission"=>$this->getdt_admission(),
			":des_civil_state"=>$this->getdes_civil_state(),
			":des_bank"=>$this->getdes_bank(),
			":des_agency"=>$this->getdes_agency(),
			":des_account"=>$this->getdes_account(),
			":des_account_type"=>$this->getdes_account_type(),
			":des_address"=>$this->getdes_address(),
			":des_neighborhood"=>$this->getdes_neighborhood(),
			":des_city_state"=>$this->getdes_city_state(),
			":des_CEP"=>$this->getdes_CEP(),
			":des_cel_phone"=>$this->getdes_cel_phone(),
			":des_phone"=>$this->getdes_phone(),
			":des_category"=>$this->getdes_category()

		));

		$this->setData($results[0]);

		$docsCount = count($this->getdes_doc_name());
		$docsNames = $this->getdes_doc_name();
		$dtsDues = $this->getdt_due();

		$results[0]["des_doc_name"] = [];
		$results[0]["dt_due"] = [];

		for ($i = 0; $i < $docsCount; $i++) {
			$docs = $sql->select("CALL sp_docs_save(:id_user, :des_doc_name, :dt_due)", array(
				":id_user"=>$this->getid_user(),
				":des_doc_name"=>$docsNames[$i],
				":dt_due"=>$dtsDues[$i]
			));

			if (!empty($docs[$i]) ) {
				array_push($results[0]["des_doc_name"], $docs[$i]["des_doc_name"]);
				array_push($results[0]["dt_due"], $docs[$i]["dt_due"]);
			}

		}

		if (!empty($results[0]) ) {
			$this->setData($results[0]);
			User::setSuccess("Usuário cadastrado com sucesso.");
		} else {
			User::setError("Erro no cadastro do usuário.");
		}

	}

	public function get($id_user)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE id_user = :id_user;", array(
			":id_user"=>$id_user
		));

		$docs = $sql->select("SELECT * FROM tb_documents_due WHERE id_user = :id_user;", array(
				":id_user"=>$id_user
		));

		$results[0]["des_doc_name"] = [];
		$results[0]["dt_due"] = [];

		for ($i = 0; $i < count($docs); $i++) {
			if (!empty($docs[$i]) ) {
				array_push($results[0]["des_doc_name"], $docs[$i]["des_doc_name"]);
				array_push($results[0]["dt_due"], $docs[$i]["dt_due"]);
			}
		}

		$this->setData($results[0]);

	}

	public function update()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_usersupdate_save(:id_user, :des_name, :des_login, :des_CPF, :des_RG, :des_RG_agency, :des_UF, :des_CNH, :des_CNH_category, :des_workID, :dt_admission, :des_civil_state, :des_bank, :des_agency, :des_account, :des_account_type, :des_address, :des_neighborhood, :des_city_state, :des_CEP, :des_cel_phone, :des_phone, :des_category)", array(

			":id_user"=>$this->getid_user(),
			":des_name"=>trim(preg_replace('/\s+/',' ', $this->getdes_name())),
			":des_login"=>$this->getdes_login(),
			":des_CPF"=>$this->getdes_CPF(),
			":des_RG"=>$this->getdes_RG(),
			":des_RG_agency"=>$this->getdes_RG_agency(),
			":des_UF"=>$this->getdes_UF(),
			":des_CNH"=>$this->getdes_CNH(),
			":des_CNH_category"=>$this->getdes_CNH_category(),
			":des_workID"=>$this->getdes_workID(),
			":dt_admission"=>$this->getdt_admission(),
			":des_civil_state"=>$this->getdes_civil_state(),
			":des_bank"=>$this->getdes_bank(),
			":des_agency"=>$this->getdes_agency(),
			":des_account"=>$this->getdes_account(),
			":des_account_type"=>$this->getdes_account_type(),
			":des_address"=>$this->getdes_address(),
			":des_neighborhood"=>$this->getdes_neighborhood(),
			":des_city_state"=>$this->getdes_city_state(),
			":des_CEP"=>$this->getdes_CEP(),
			":des_cel_phone"=>$this->getdes_cel_phone(),
			":des_phone"=>$this->getdes_phone(),
			":des_category"=>$this->getdes_category()

		));

		$this->setData($results[0]);

		$sql->select("DELETE FROM tb_documents_due WHERE id_user = :id_user;", array(
			":id_user"=>$this->getid_user()
		));

		$docsCount = count($this->getdes_doc_name());
		$docsNames = $this->getdes_doc_name();
		$dtsDues = $this->getdt_due();

		$results[0]["des_doc_name"] = [];
		$results[0]["dt_due"] = [];

		for ($i = 0; $i < $docsCount; $i++) {
			$docs = $sql->select("CALL sp_docs_save(:id_user, :des_doc_name, :dt_due)", array(
				":id_user"=>$this->getid_user(),
				":des_doc_name"=>$docsNames[$i],
				":dt_due"=>$dtsDues[$i]
			));

			if (!empty($docs[$i]) ) {
				array_push($results[0]["des_doc_name"], $docs[$i]["des_doc_name"]);
				array_push($results[0]["dt_due"], $docs[$i]["dt_due"]);
			}

		}

		$this->setData($results[0]);
	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_users WHERE id_user = :id_user;", array(
			":id_user"=>$this->getid_user()
		));
	}

	public static function getPasswordHash($password)
	{

		return password_hash($password, PASSWORD_DEFAULT, [
			'cost'=>12
		]);

	}

	public function setPassword($password)
	{

		$sql = new Sql();

		$sql->query("UPDATE tb_users SET des_password = :password WHERE id_user = :id_user", array(
			":password"=>$password,
			":id_user"=>$this->getid_user()
		));

	}

	public static function setError($msg)
	{

		$_SESSION[User::ERROR] = $msg;

	}

	public static function getError()
	{

		$msg = (isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR]) ? $_SESSION[User::ERROR] : '';

		User::clearError();

		return $msg;

	}

	public static function clearError()
	{

		$_SESSION[User::ERROR] = NULL;

	}

	public static function setSuccess($msg)
	{

		$_SESSION[User::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[User::SUCCESS]) && $_SESSION[User::SUCCESS]) ? $_SESSION[User::SUCCESS] : '';

		User::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[User::SUCCESS] = NULL;

	}

	public static function setName($msg)
	{

		$_SESSION[User::NAME] = explode(' ', trim($msg))[0];

	}

	public static function getName()
	{

		$msg = (isset($_SESSION[User::NAME]) && $_SESSION[User::NAME]) ? $_SESSION[User::NAME] : '';

		User::clearName();

		return $msg;

	}

	public static function clearName()
	{

		$_SESSION[User::NAME] = NULL;

	}

	public static function getFromSession()
	{

		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['id_user'] > 0) {

			$user->setData($_SESSION[User::SESSION]);

		}

		return $user;

	}

	public static function sendEmailDocs($id_user) {

		$sql = new Sql();

		$user = $sql->select("SELECT * FROM tb_users WHERE id_user = :id_user;", array(
			":id_user"=>$id_user
		));

		if ($user[0]["des_name"] == "Juliana Pereira de Sousa") {
			
			$docs = $sql->select("
				SELECT des_name, des_doc_name, dt_due, DATEDIFF(dt_due, curdate()) AS dt_remaining FROM tb_documents_due
				INNER JOIN tb_users
				ON tb_documents_due.id_user = tb_users.id_user;");

			$mailer = new Mailer("docs", array(
				"docs"=>$docs
			));

			$mailer->CharSet = "utf-8";

			$mailer->send();

		} else {

			return;

		}

	}

}

?>