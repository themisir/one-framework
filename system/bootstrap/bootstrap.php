<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

namespace OneDevGroup\OneFramework;

use Medoo\Medoo;

class OneBootstrap {

	public $database;
	public $router;
	public $controller;
	public $config;

	public $uri;

	public function __construct($config, $uri)
	{
		$this->uri = $uri;

		$this->config = json_decode(json_encode($config), FALSE);
		$this->database = new Medoo($config['database']['default']);
		$this->router = new OneRouter($uri, $this);
	}

	public function route()
	{
		$fpath = $this->config->dirs->application . '/controller/' . $this->router->controller . '.php';
		if (file_exists($fpath))
		{
			include $fpath;
			$class = $this->router->controller_class . '_controller';
			$this->controller = new $class($this);
		} else {
			$fpath = htmlspecialchars($fpath);
			$this->do404("File \"$fpath\" not found on our webserver");
		}

		$fname = $this->router->controller_method;
		if (method_exists($this->controller, $fname))
		{
			$this->controller->$fname($this->router->controller_param);
		} else {
			$this->controller->main($this->router->controller_param);
		}
	}

	public function redirect($to)
	{
		header('Location: ' . $this->config->path->home . $to, 301);
		exit('redirecting ...');
	}

	public function reload()
	{
		header('Location: ?', 301);
		exit('redirecting ...');
	}

	public function do404($custom_message = '')
	{
		header($_SERVER['SERVER_PROTOCOL']." 404 Not Found", true);
		die ('Not found');
	}
}