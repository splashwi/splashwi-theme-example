<?php
/**
 * Sample layout.
 */
use Helpers\Url;
use Helpers\Assets;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();
$um = new \Models\User_model();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<?php
	//hook for plugging in meta tags
	$hooks->run('meta');
	?>
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>

	<!-- CSS -->
	<?php
	Assets::css([
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
		'//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
		Url::templatePath().'css/theme.css',
		Url::templatePath().'css/bootstrap-wysihtml5.css',
		Url::templatePath().'css/wysiwyg-color.css',
		Url::templatePath().'css/login.css'
	]);

	//hook for plugging in css
	$hooks->run('css');

	Assets::js([
		Url::templatePath().'js/jquery.js',
		Url::templatePath().'js/wysihtml5-0.3.0.js',
		Url::templatePath().'js/bootstrap-wysihtml5.js',
	]);

	//hook for plugging in javascript
	$hooks->run('js');
	?>

</head>
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="logomodal">
				<img class="logo" src="<?=Url::templatePath()?>images/logo.png" alt="Logo">
			</div>
			<div class="loginmodal-container">
				<h1><?=$data['lang_resetpassword']?></h1><br>

				<form class="" action="reset" method="post">
					<?php if(isset($_POST['submit'])) { ?>
						<div class="alert alert-success">Instructions have been sent to your specified email address!</div>
					<?php } ?>
					<p><input class="form-control" type='text' name='username' placeholder="<?=$data['lang_username']?>"></p>
					<p><button class="login loginmodal-submit" type='submit' name='submit'><?=$data['lang_resetpassword']?></button></p>
					<div class="login-help">
						<a href="login"><?=$data['lang_rememberpassword']?>?</a> - <a href="register"><?=$data['lang_createaccount']?></a>
					</div><br>
                    <p class="text-center"><?=$data['lang_yourip']?>: <?=$um->getIP();?></p>
				</form>
			</div>
			<!--
				<div class="loginmodal-container">
					<center><a class="login loginmodal-submit" style="width: 100%;" href="index.php?page=index"><?=BACKTOHP?></a></center>
				</div>
				-->
		</div>
	</div>
</div>
<?php
Assets::js([
	'//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
]);

//hook for plugging in javascript
$hooks->run('js');
?>
<!-- JS -->
<script type="text/javascript">
	$('#editor').wysihtml5({
		"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
		"emphasis": true, //Italics, bold, etc. Default true
		"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
		"html": false, //Button which allows you to edit the generated HTML. Default false
		"link": true, //Button to insert a link. Default true
		"image": true, //Button to insert an image. Default true,
		"color": true //Button to change color of font
	});
</script>
<?php

//hook for plugging in code into the footer
$hooks->run('footer');
?>

</body>
</html>
