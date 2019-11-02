<?php 

namespace AF;

use Rain\Tpl;

class Mailer {
	
	const USERNAME = "engquali20@gmail.com";
	const PASSWORD = "fake_password";
	const NAME_FROM = "E&Q Online";
	const ADDRESS_01 = "gustavo@engenhariaequalidade.com.br";
	const NAME_01 = "Gustavo";
	const ADDRESS_02 = "fabio@engenhariaequalidade.com.br";
	const NAME_02 = "Fábio";

	private $mail;

	public function __construct($tplName, $data = array())
	{

		$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/email/",
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"         => false
	    );

		Tpl::configure( $config );

		$tpl = new Tpl;

		foreach ($data as $key => $value) {
			$tpl->assign($key, $value);
		}

		$html = $tpl->draw($tplName, true);

		$this->mail = new \PHPMailer;

		$this->mail->isSMTP();

		$this->mail->SMTPDebug = 0;

		$this->mail->Debugoutput = 'html';

		$this->mail->Host = 'smtp.gmail.com';

		$this->mail->Port = 587;

		$this->mail->SMTPSecure = 'tls';

		$this->mail->SMTPAuth = true;

		$this->mail->Username = Mailer::USERNAME;

		$this->mail->Password = Mailer::PASSWORD;

		$this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);

		$this->mail->addAddress(Mailer::ADDRESS_01, Mailer::NAME_01);
		$this->mail->addAddress(Mailer::ADDRESS_02, Mailer::NAME_02);

		$this->mail->Subject = "Vencimento dos Documentos: E&Q (" . date("d-m-Y") . ")";

		$this->mail->msgHTML($html);

	}

	public function send()
	{

		return $this->mail->send();

	}

}

 ?>
