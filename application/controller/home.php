<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

use OneDevGroup\OneFramework\OneController;

class Home_controller extends OneController
{

	public $welcome;

	public function main()
	{
		//	Execute main action

		$this->loadView('home', ['welcome'	=>	$this->welcome]);
	}

	public function init()
	{
		//	Initialize controller

		$homemodel = $this->loadModel('home');
		$this->welcome = $homemodel->getMessage();
	}

}