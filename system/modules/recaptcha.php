<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

use OneDevGroup\OneFramework\OneModule;

class reCaptcha extends OneModule {

	public function check()
	{
		if (!isset($_POST['g-recaptcha-response'])) {
			return false;
		}

		$captcha = $_POST['g-recaptcha-response'];
		$privatekey = $this->bootstrap->config->api->recaptcha;

		$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$privatekey}&response={$captcha}&remoteip={$_SERVER['REMOTE_ADDR']}"), true);
		return $response['success'] == true;
	}
}