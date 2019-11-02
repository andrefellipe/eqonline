<?php 

namespace AF;

// The PageAdmin class extends the Page class and changes the directory where the Tpl looks for the parts of the template.
class PageAdmin extends Page {

	// We only need to specify the new path with the parts of the admin page.
	public function __construct($opts = array(), $tpl_dir = "/views/admin/")
	{

		parent::__construct($opts, $tpl_dir);

	}
}

 ?>