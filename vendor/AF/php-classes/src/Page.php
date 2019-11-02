<?php 

namespace AF;

use Rain\Tpl;

// The Page class is the basic building block to construct our pages in an efficient manner.
class Page {

	// Variable to hold the Tpl object.
	private $tpl;
	// Options to build the template.
	private $options = [];
	// Default options to build the template.
	private $defaults = [
		"header"=>true,
		"footer"=>true,
		"data"=>[]
	];

	// In this constructor, we set the configuration to the Rain Tpl and draw the header of the page on the screen.
	public function __construct($opts = array(), $tpl_dir = "/views/")	
	{
		// Adding the options inserted in the constructor to the defaults array.
		$this->options = array_merge($this->defaults, $opts);

		// Configuring the template.
		$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"         => false
		);

		Tpl::configure($config);

		// Create Tpl object
		$this->tpl = new Tpl;

		// Assigning the extra data to an adequate variable to be used in the page.
		$this->setData($this->options["data"]);

		// Drawing the header on the screen if there's one.
		if ($this->options["header"] === true) $this->tpl->draw("header");
	}

	// This method draws on the screen the body of the website.
	public function setTpl($name, $data = array(), $returnHTML = false)
	{

		$this->setData($data);

		return $this->tpl->draw($name, $returnHTML);

	}

	// When the reference to the class is finished, we draw the footer of the website on the screen.
	public function __destruct(){

		if ($this->options["footer"] === true) $this->tpl->draw("footer");

	}

	// This method assigns to an adequate variable the additional data to build the page.
	private function setData($data = array())
	{

		foreach ($data as $key => $value) {
			$this->tpl->assign($key, $value);
		}

	}

}

?>