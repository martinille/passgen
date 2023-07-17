<?php

define("DIR_ROOT", realpath(dirname(__FILE__)) . '/');
const DIR_ASSETS     = DIR_ROOT . 'assets/';
const DIR_CUSTOM_CSS = DIR_ASSETS . 'custom_css/';
const DIR_CUSTOM_JS  = DIR_ASSETS . 'custom_js/';

define('URL_ROOT', rtrim(($_SERVER['REQUEST_SCHEME'] ?? 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . ltrim(pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME), '/'),'/') . '/');
const URL_ASSETS     = URL_ROOT . 'assets/';
const URL_CUSTOM_CSS = URL_ASSETS . 'custom_css/';
const URL_CUSTOM_JS  = URL_ASSETS . 'custom_js/';

// length
$length = !empty($_REQUEST['length']) && preg_match('/^[0-9]+$/', $_REQUEST['length']) ? $_REQUEST['length'] : 10;

// numbers
$numbers = !(!empty($_REQUEST['u']) && empty($_REQUEST['numbers']));

// upperchars
$upperchars = !(!empty($_REQUEST['u']) && empty($_REQUEST['upperchars']));

// lowerchars
$lowerchars = !(!empty($_REQUEST['u']) && empty($_REQUEST['lowerchars']));

// specialchars
$specialchars = !empty($_REQUEST['specialchars']);



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




