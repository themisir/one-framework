<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

namespace OneDevGroup\OneFramework;

class OneRouter {

	public $controller;
	public $controller_class;
	public $controller_method;
	public $controller_param;

	public $uri;
	public $bootstrap;

	public function __construct($uri, $bootstrap)
	{
		$this->uri = $uri;
		$this->bootstrap = $bootstrap;

		$uri = rtrim($uri, '/');
		$uri = explode('/', $uri);
		$final_uri = [];

		foreach ($uri as $value)
		{
			$value = str_replace('/', '', $value);

			if (strlen($value) > 0)
			{
				$final_uri[] = $value;
			}
		}

		$this->controller = @$final_uri[0];
		$this->controller_method = @$final_uri[1];
		$this->controller_param = @$final_uri[2];

		$this->controller = set_ifnull($this->controller, 'home');
		$this->controller_method = set_ifnull($this->controller_method, 'main');
		$this->controller_param = set_ifnull($this->controller_param, '');

		$this->controller_class = str_replace(['-', ' '], ['_', '_'], $this->controller);
	}
}