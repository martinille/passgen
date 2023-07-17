<?php

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



?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="author" content="Martin Ille; http://www.brown.sk" />
		<meta name="description" content="Simple online random password generator." />
		<meta name="keywords" content="password, pwd, generator, pass gen, generate password" />
		<meta name="robots" content="index,follow,all" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
		<meta http-equiv="Expires" content="Fri, 22 December 2006 15:40:19 GMT" />
		<meta http-equiv="Last-Modified" content="Fri, 22 December 2006 15:40:19 GMT" />
		
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet">
		
		<link href="style.css?<?=filemtime('style.css')?>" type="text/css" rel="stylesheet">
		
		
		<script
		  src="https://code.jquery.com/jquery-2.2.4.min.js"
		  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
		  crossorigin="anonymous"></script>		
		
		<script src="clipboard.min.js"></script>
		<script>
var copytoclipboard = function() {
	var text = $("#password").val();
	
	clipboard.copy(text);
	
	$("#copy,#ok").toggle();
}
			
			
		</script>
			
		
		<title>Password Generator Online</title>
	</head>
 <body>

	<form action="" method="get">
	<div>
	
	
		<h1><a href="/">Password Generator</a></h1>
	
	
		
		<div id="passcont">
			<input 
				id="password"
				onclick="this.focus();this.select();"
				value="<?=htmlspecialchars(generateNewPassword($length, $numbers, $upperchars, $lowerchars, $specialchars))?>"
			/>
			<button type="button" onclick="copytoclipboard();" id="copy" class="btn btn-default"><span class="glyphicon glyphicon-copy"></span> copy</button>
			<span id="ok" class="label label-default"><span class="glyphicon glyphicon-ok"></span></span>
			<div class="cleaner"></div>
		</div>
		
		
		
		
		
		<div id="t">
		
			<table style="">
				<tr>
					<th>Length:</th>
					<td>
						<input type="number" name="length" value="<?=htmlspecialchars($length)?>" />
					</td>
				</tr> 
				<tr>
					<th>Numbers 2-9:</th>
					<td>
						<input type="checkbox" name="numbers" <?if($numbers):?>checked="checked"<?endif;?>  />
					</td>
				</tr> 
				<tr>
					<th>Chars A-Z:</th>
					<td>
						<input type="checkbox" name="upperchars" <?if($upperchars):?>checked="checked"<?endif;?> />
					</td>
				</tr> 
				<tr>
					<th>Chars a-z:</th>
					<td>
						<input type="checkbox" name="lowerchars" <?if($lowerchars):?>checked="checked"<?endif;?> />
					</td>
				</tr> 
				<tr>
					<th>Special chars (%@!., etc.):</th>
					<td>
						<input type="checkbox" name="specialchars" <?if($specialchars):?>checked="checked"<?endif;?> />
					</td>
				</tr> 
		 	</table>
			
			<input type="hidden" name="u" value="<?=mt_rand()?>" />
			<button type="submit" style="padding: 10px 15px; cursor: pointer;">Generate new password!</button>
		
		</div>
		
		
	</div>
	</form>
	



		<? /* Google Analyics ID:    UA-560115-20 */ ?>
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-560115-20']);
		  _gaq.push(['_trackPageview']);
		  (function() {
			 var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			 ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
	

	</body>
</html>





