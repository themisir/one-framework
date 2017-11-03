<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

include 'system.php';
include 'bootstrap/router.php';
include 'bootstrap/controller.php';
include 'bootstrap/model.php';
include 'bootstrap/module.php';
include 'bootstrap/medoo.php';

if (!session_id()) {
	session_start();
}

include SYS_DIR . '/bootstrap/bootstrap.php';