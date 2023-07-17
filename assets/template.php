<!doctype html>
<html dir="ltr" lang="en">
<head>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-F187EQ6CTX"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-F187EQ6CTX');
	</script>

	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta http-equiv="cache-control" content="no-store, no-cache, max-age=0, must-revalidate">
	<meta name="author" content="Martin Ille; https://www.brown.sk">
	<meta name="description" content="Simple online random password generator.">
	<meta name="keywords" content="password generator, pwd, generator, pass gen, generate password">
	<meta name="robots" content="index,follow,all">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
	<script src="<?=URL_ASSETS?>clipboard.js/clipboard.min.js"></script>

	<link href="<?=URL_CUSTOM_CSS?>general.min.css?_<?=filemtime(DIR_CUSTOM_CSS . 'general.min.css')?>" rel="stylesheet">
	<script src="<?=URL_CUSTOM_JS?>general.min.js?_<?=filemtime(DIR_CUSTOM_JS . 'general.min.js')?>"></script>


	<title>Simple Password Generator</title>
</head>
<body>

<form action="" method="get">
	<div>


		<h1><a href="<?=URL_ROOT?>">Simple Password Generator</a></h1>



		<div id="passcont">
			<input
				id="password"
				onclick="this.focus();this.select();"
				value="<?=htmlspecialchars($password)?>"
				readonly
			>
			<button type="button" onclick="copytoclipboard();" id="copy" class="btn btn-default"><span class="glyphicon glyphicon-copy"></span>&nbsp;copy</button>
			<span id="ok" class="label label-default"><span class="glyphicon glyphicon-ok"></span></span>
			<div class="clearfix"></div>
		</div>





		<div id="t">

			<table>
				<tr>
					<th><label for="length">Length:</label></th>
					<td><input type="number" name="length" id="length" step="1" min="1" max="32" value="<?=(int)trim($length)?>"></td>
				</tr>
				<tr>
					<th><label for="numbers">Numbers 2-9:</label></th>
					<td><input type="checkbox" name="numbers" id="numbers" <? if ($numbers) { ?>checked="checked"<? } ?>></td>
				</tr>
				<tr>
					<th><label for="upperchars">Chars A-Z:</label></th>
					<td><input type="checkbox" name="upperchars" id="upperchars" <? if ($upperchars) { ?>checked="checked"<? } ?>></td>
				</tr>
				<tr>
					<th><label for="lowerchars">Chars a-z:</label></th>
					<td><input type="checkbox" name="lowerchars" id="lowerchars" <? if ($lowerchars) { ?>checked="checked"<? } ?>></td>
				</tr>
				<tr>
					<th><label for="specialchars">Special chars (%@!., etc.):</label></th>
					<td><input type="checkbox" name="specialchars" id="specialchars" <? if ($specialchars) { ?>checked="checked"<? } ?>></td>
				</tr>
			</table>

			<input type="hidden" name="u" value="<?=mt_rand()?>">
			<button type="submit" class="btn btn-lg btn-primary">Generate new password!</button>

		</div>


	</div>
</form>



<footer>
	<a href="https://github.com/martinille/passgen" target="_blank">Source code of this website on Github</a>
</footer>


</body>
</html>