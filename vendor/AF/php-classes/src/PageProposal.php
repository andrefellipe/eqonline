<?php 

namespace AF;

// The PageProposal class extends the Page class and changes the directory where the Tpl looks for the parts of the template.
class PageProposal extends Page {

	// We only need to specify the new path with the parts of the proposal page.
	public function __construct($opts = array(), $tpl_dir = "/views/proposal/")
	{

		parent::__construct($opts, $tpl_dir);

	}
}

 ?>