<?php

define("DIR_ROOT", realpath(dirname(__FILE__)) . '/');
const DIR_ASSETS = DIR_ROOT . 'assets/';




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


/*
function generateNewPassword($long,$numbers,$upperchars,$lowerchars,$specialchars) {
	$chars = $newPwd = '';
	if ($numbers) $chars .= "23456789";
	if ($upperchars) $chars .= "QWERTUPASDFGHJKCVBNM";
	if ($lowerchars) $chars .= "qwertuipasdfghjkxcvbnm";
	if ($specialchars) $chars .= ';@#$%^&*(){}"?:></-+,.';

	for (;strlen($newPwd)<$long;) {
		$newPwd .= $chars{mt_rand(0,strlen($chars)-1)};
	}
	return $newPwd;
}
*/

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



require_once DIR_ASSETS . 'template.php';




