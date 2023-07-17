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
	<meta name="author" content="Martin Ille; http://www.brown.sk">
	<meta name="description" content="Simple online random password generator.">
	<meta name="keywords" content="password generator, pwd, generator, pass gen, generate password">
	<meta name="robots" content="index,follow,all">
	<meta http-equiv="cache-control" content="no-store, no-cache, max-age=0, must-revalidate">


	<script
		src="https://code.jquery.com/jquery-2.2.4.min.js"
		integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
		crossorigin="anonymous"></script>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">

	<link href="style.css?<?=filemtime('style.css')?>" type="text/css" rel="stylesheet">



	<script src="clipboard.min.js"></script>


	<title>Password Generator Online</title>
</head>
<body>

<form action="" method="get">
	<div>


		<h1><a href="./">Password Generator</a></h1>



		<div id="passcont">
			<input
				id="password"
				onclick="this.focus();this.select();"
				value="<?=htmlspecialchars(generateNewPassword($length, $numbers, $upperchars, $lowerchars, $specialchars))?>">
			<button type="button" onclick="copytoclipboard();" id="copy" class="btn btn-default"><span class="glyphicon glyphicon-copy"></span> copy</button>
			<span id="ok" class="label label-default"><span class="glyphicon glyphicon-ok"></span></span>
			<div class="clearfix"></div>
		</div>





		<div id="t">

			<table style="">
				<tr>
					<th>Length:</th>
					<td>
						<label><input type="number" name="length" value="<?=htmlspecialchars($length)?>"></label>
					</td>
				</tr>
				<tr>
					<th>Numbers 2-9:</th>
					<td>
						<label><input type="checkbox" name="numbers" <?if($numbers):?>checked="checked"<?endif;?>></label>
					</td>
				</tr>
				<tr>
					<th>Chars A-Z:</th>
					<td>
						<label><input type="checkbox" name="upperchars" <?if($upperchars):?>checked="checked"<?endif;?>></label>
					</td>
				</tr>
				<tr>
					<th>Chars a-z:</th>
					<td>
						<label><input type="checkbox" name="lowerchars" <?if($lowerchars):?>checked="checked"<?endif;?>></label>
					</td>
				</tr>
				<tr>
					<th>Special chars (%@!., etc.):</th>
					<td>
						<label>
							<input type="checkbox" name="specialchars" <?if($specialchars):?>checked="checked"<?endif;?>>
						</label>
					</td>
				</tr>
			</table>

			<input type="hidden" name="u" value="<?=mt_rand()?>">
			<button type="submit" style="padding: 10px 15px; cursor: pointer;">Generate new password!</button>

		</div>


	</div>
</form>






</body>
</html>