<?php
//	INITIAL HEADERS
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE); 
header('Pragma: no-cache');
//	DISABLE ERRORS
//error_reporting(0);
//	SESSION COOKIES
function clean_url ($url) {
	if ($url == '') return;
	$url = str_replace("http://", "", strtolower($url));
	$url = str_replace("https://", "", $url );
	if (substr($url, 0, 4) == 'www.')  $url = substr($url, 4);
	$url = explode('/', $url);
	$url = reset($url);
	$url = explode(':', $url);
	$url = reset($url);
	return $url;
}

$domain_cookie = explode (".", clean_url( $_SERVER['HTTP_HOST'] ));
$domain_cookie_count = count($domain_cookie);
$domain_allow_count = -2;
if ( $domain_cookie_count > 2 ) {
	if ( in_array($domain_cookie[$domain_cookie_count-2], array('com', 'net', 'org') ))
		$domain_allow_count = -3;
	if ( $domain_cookie[$domain_cookie_count-1] == 'ua' )
		$domain_allow_count = -3;
	$domain_cookie = array_slice($domain_cookie, $domain_allow_count);
}
$domain_cookie = "." . implode (".", $domain_cookie);
if (ip2long($_SERVER['HTTP_HOST']) != -1 && ip2long($_SERVER['HTTP_HOST']) !== false )
	define( 'DOMAIN', null );
else
	define( 'DOMAIN', $domain_cookie );
$params = session_get_cookie_params();
if (DOMAIN)
	$params['domain'] = DOMAIN;
if (version_compare(PHP_VERSION, '5.2', '<')) {
	session_set_cookie_params($params['lifetime'], "/", $params['domain'], $params['secure']);
} else {
	session_set_cookie_params($params['lifetime'], "/", $params['domain'], $params['secure'], true);
}
@session_start();
//	SECRET KEY CHECKING
$session_secret_key = '';
if (isset($_REQUEST['secret'])) {
	$session_secret_key = $_REQUEST['secret'].'';
	if (strlen($session_secret_key) < 10)
		die("Forbidden");
} else
	die("Forbidden");
//	KEY CREATING
$key = array(rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9), rand(0, 9));
$key_as_string = $key[0] . $key[1] . $key[2] . $key[3] . $key[4];
$numbers = imagecreatefrompng(__DIR__ . '/numbers.png');
//	KEY COOKING
$_SESSION['captcha'][$session_secret_key] = $key_as_string;
//	IMAGING CAPTCHA
$image = imagecreate(75 + 6, 30 + 6);
for ($i=0; $i<5; $i++) {
	imagecopy($image, $numbers, 3 + $i * 15 + rand(-2, 2), 3 + 0 + rand(-2, 2), $key[$i] * 15, 0, 15, 30);
}
header("Content-Type: image/x-png");
imagepng($image);