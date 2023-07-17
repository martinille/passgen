<?php

define("DIR_ROOT", realpath(dirname(__FILE__)) . '/');
const DIR_ASSETS = DIR_ROOT . 'assets/';
const DIR_CUSTOM_CSS = DIR_ASSETS . 'custom_css/';
const DIR_CUSTOM_JS = DIR_ASSETS . 'custom_js/';

define('URL_ROOT', ($_SERVER['REQUEST_SCHEME'] ?? 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . ltrim(pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME), '/') . '/');
const URL_ASSETS = URL_ROOT . 'assets/';
const URL_CUSTOM_CSS = URL_ASSETS . 'custom_css/';
const URL_CUSTOM_JS = URL_ASSETS . 'custom_js/';



// length
if ( !empty($_REQUEST['length']) && preg_match('/^[0-9]+$/',$_REQUEST['length']) ) {
	$length = $_REQUEST['length'];
}
else {
	$length = 10;
}

// numbers
if ( !empty($_REQUEST['u']) and empty($_REQUEST['numbers']) ) {
	$numbers = false;
}
else {
	$numbers = true;
}


// upperchars
if ( !empty($_REQUEST['u']) and empty($_REQUEST['upperchars']) ) {
	$upperchars = false;
}
else {
	$upperchars = true;
}


// lowerchars
if ( !empty($_REQUEST['u']) and empty($_REQUEST['lowerchars']) ) {
	$lowerchars = false;
}
else {
	$lowerchars = true;
}



// specialchars
if ( !empty($_REQUEST['specialchars']) ) {
	$specialchars = true;
}
else {
	$specialchars = false;
}



/**
 * @param int $long
 * @param bool $numbers
 * @param bool $upperchars
 * @param bool $lowerchars
 * @param bool $specialchars
 * @return string
 */
function generateNewPassword(int $long, bool $numbers, bool $upperchars, bool $lowerchars, bool $specialchars): string {
	$chars = $newPwd = '';
	if ($numbers) $chars .= "23456789";
	if ($upperchars) $chars .= "QWERTUPASDFGHJKCVBNM";
	if ($lowerchars) $chars .= "qwertupasdfghjkxcvbnm";
	if ($specialchars) $chars .= ';@#$%^&*(){}"?:></-+,.';

	while (strlen($newPwd) < $long) {
		try {
			$randomIndex = random_int(0, strlen($chars) - 1);
		}
		catch (Exception $e) {
			// Handle the exception here (e.g., generate a fallback random index)
			$randomIndex = mt_rand(0, strlen($chars) - 1);
		}
		$newPwd .= $chars[$randomIndex];
	}
	return $newPwd;
}

$password = generateNewPassword($length, $numbers, $upperchars, $lowerchars, $specialchars);

require_once DIR_ASSETS . 'template.php';




