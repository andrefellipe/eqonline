<?php 

namespace AF;

// The PageOrder class extends the Page class and changes the directory where the Tpl looks for the parts of the template.
class PageOrder extends Page {

	// We only need to specify the new path with the parts of the order page.
	public function __construct($opts = array(), $tpl_dir = "/views/order/")
	{

		parent::__construct($opts, $tpl_dir);

	}
}

 ?>