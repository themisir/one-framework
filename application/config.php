<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

$config = [
	'debug'		=> false,

	'database'	=> [
		'default'	=> [

			// Fill with your database info
			
			'database_type' => 'mysql',
			'database_name' => 'test',
			'server' => 'localhost',
			'username' => 'root',
			'password' => '',
			'debug_mode' => true
		]
	],

	'path'		=> [
		'static' => 'http://site_host_here/assets/',
		'home' => 'http://site_host_here/'
	],

	'api'		=> [
		'recaptcha' => '6LdPrBkUAAAAAF0rSHxV4AlHujF16SaNe9ARaHq3'
	]
];