<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

namespace OneDevGroup\OneFramework;

class OneModule {

	public $controller;
	public $bootstrap;

	public function __construct($controller)
	{
		$this->controller = $controller;
		$this->bootstrap = $controller->bootstrap;
		$this->init();
	}

	public function init()
	{
		// Do nothing ...
	}
}