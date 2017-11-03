<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

namespace OneDevGroup\OneFramework;

class OneModel {

	public $controller;

	public function __construct($controller)
	{
		$this->controller = $controller;
	}

	public function main()
	{
		// Do nothing ...
	}
}