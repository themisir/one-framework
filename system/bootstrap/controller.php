<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

namespace OneDevGroup\OneFramework;

class OneController {

	public $bootstrap;
	public $modules;
	public $models;

	public function __construct($bootstrap)
	{
		$this->modules = (object) array();
		$this->models = (object) array();
		$this->bootstrap = $bootstrap;
		$this->init();
	}

	public function main()
	{
		//	Do nothing ...
	}

	public function init()
	{
		//	Do nothing ...
	}

	public function loadView($name, $vars = [])
	{
		$fpath = APP_DIR . '/view/' . $name . '.php';
		$model = json_decode(json_encode($vars, JSON_UNESCAPED_UNICODE), false);
		$bootstrap = $this->bootstrap;
		$controller = $this;

		if (file_exists($fpath))
		{
			$controller = $this;
			include $fpath;
		} else {
			$bootstrap->do404("File \"$fpath\" not found on our webserver");
		}
	}

	public function loadModule($name, $app = true)
	{
		$fpath = ($app ? APP_DIR : SYS_DIR) . '/modules/' . $name . '.php';

		if (file_exists($fpath))
		{
			include $fpath;
			return $this->modules->$name = new $name($this);
		} else {
			return false;
		}
	}

	public function loadModel($name, $app = true)
	{
		$fpath = ($app ? APP_DIR : SYS_DIR) . '/model/' . $name . '.php';
		$cname = $name . '_model';
		
		if (file_exists($fpath))
		{
			include $fpath;
			return $this->models->$name = new $cname($this);
		} else {
			return false;
		}
	}
}