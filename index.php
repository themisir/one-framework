<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

namespace OneDevGroup\OneFramework;

define('BASE_DIR', __DIR__);
define('APP_DIR', __DIR__ . '/application');
define('SYS_DIR', __DIR__ . '/system');

include APP_DIR . '/config.php';
include BASE_DIR . '/system/modules/func.php';
include BASE_DIR . '/system/init.php';

$config = array_merge($config, [
	'dirs'	=> [
		'system' => SYS_DIR,
		'application' => APP_DIR
	]
]);

$bootstrap = new OneBootstrap($config, @$_GET['uri']);
$bootstrap->route();