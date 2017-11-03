<?php

/*

Name:		OneFramework
Author:		OneDev Group (https://onedevgroup.com/)
License:	Apache 2.0 license

Created by developers for developers with our <3

*/

function set_ifnull($val, $ifnull){
	if ($val == null || @strlen($val) == 0 || @count($val) == 0)
		return $ifnull;
	else
		return $val;
}

function current_host($include_backslash = true){
	return 'http' . ('on' === @$_SERVER['HTTPS'] ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . ($include_backslash ? '/' : '');
}

function current_url($include_query = false){
	$return = [];
	if ($include_query) {
		$return[0] = $_SERVER['REQUEST_URI'];
	} else {
		preg_match('/^[^\?]+/', $_SERVER['REQUEST_URI'], $return);
	}
	return 'http' . ('on' === @$_SERVER['HTTPS'] ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $return[0];
}

function validate_values($values){

	function validate_value($name, $value){
		switch ($name) {
			case 'email':
				return filter_var($value, FILTER_VALIDATE_EMAIL);
				break;

			case ['country', 'city']:
				return strlen($value) > 3 && strlen($value) < 30;
				break;

			case 'phone':
				return (strlen($value) > 6 && strlen($value) < 15) || ($value == '');
				break;

			case 'captcha':
				return (strlen($value) == 5 && isset($_SESSION['captcha']) && isset($_REQUEST['captcha-key']) && isset($_SESSION['captcha'][$_REQUEST['captcha-key']]) && $_SESSION['captcha'][$_REQUEST['captcha-key']] == $value);
				break;

			case 'description':
				return strlen($value) > 10 && strlen($value) < 1025;
				break;

			case 'username':
				$username_abc = 'abcdefghijklmnopqrstuvwxyz0123456789.-';
				$only_abc = true;
				for ($i = 0; $i < strlen($value); $i++) {
					$only_abc = $only_abc && (strpos($username_abc, $value[$i]) !== false);
				}
				return strlen($value) > 3 && strlen($value) < 20 && $only_abc;
				break;

			case 'password':
				return strlen($value) > 4 && strlen($value) < 40;
				break;

			case 'fullname':
				return strlen($value) > 3 && strlen($value) < 50;
				break;
			
			default:
				if (is_string($name))
					return strlen($value) > 0 && strlen($value) < 50;
				else
					return true;
				break;
		}
	}

	$errors = [];
	foreach ($values as $name => $value){
		if (!validate_value($name, $value))
			$errors[] = $name;
	}
	if (count($errors) == 0)
		return true;
	else
		return $errors;
}

function num_range($number, $low, $high) {
	if ($number < $low) {
		$number = $low;
	}
	if ($number > $high) {
		$number = $high;
	}
	return $number;
}

function random_deciminals($len) {
	$s = '';
	while (strlen($s) < $len) {
		$s .=  rand(0, 9);
	}
	return $s;
}