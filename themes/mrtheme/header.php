<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Lumen#0110">

	<?php if (isset($metaRefresh)): ?>
	<meta http-equiv="refresh"
		content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
	<?php endif ?>
	<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
	<link rel="icon" type="image/x-icon" href="./favicon.ico" />
	<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title=""
		charset="utf-8" />
	<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen"
		title="" charset="utf-8" />
	<?php if (Flux::config('EnableReCaptcha')): ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<?php endif ?>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link href="<?php echo $this->themePath('css/sticky-footer-navbar.css') ?>" rel="stylesheet">
</head>

<body>

	<!-- Fixed navbar -->
	<div class="container mrnavbarcontrol">
		<?php include $this->themePath('main/navbar.php', true) ?>
	</div>

	<?php if ($_SERVER['REQUEST_URI'] == '/index.php' || $_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/?module=main'): ?>
	<div class="wrapper">
		<div class="mroverflow">
			<header class="container">
				<div class="row">
					<div class="col-md-4">
						
<div class="content">
  <h1 class="heading">Card Flip</h1>
  <p class="description">Hover over a card to flip it.</p><a class="card" href="#!">
    <div class="front" style="background-image: url(//source.unsplash.com/300x401)">
      <p>Lorem ipsum dolor sit amet consectetur adipisi.</p>
    </div>
    <div class="back">
      <div>
        <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p>
        <button class="button">Click Here</button>
      </div>
    </div></a><a class="card" href="#!">
    <div class="front" style="background-image: url(//source.unsplash.com/300x402)">
      <p>Lorem ipsum dolor sit amet consectetur adipisi.</p>
    </div>
    <div class="back">
      <div>
        <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p>
        <button class="button">Click Here</button>
      </div>
    </div></a><a class="card" href="#!">
    <div class="front" style="background-image: url(//source.unsplash.com/300x403)">
      <p>Lorem ipsum dolor sit amet consectetur adipisi.</p>
    </div>
    <div class="back">
      <div>
        <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p>
        <button class="button">Click Here</button>
      </div>
    </div></a><a class="card" href="#!">
    <div class="front" style="background-image: url(//source.unsplash.com/300x404)">
      <p>Lorem ipsum dolor sit amet consectetur adipisi.</p>
    </div>
    <div class="back">
      <div>
        <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p>
        <button class="button">Click Here</button>
      </div>
    </div></a><a class="card" href="#!">
    <div class="front" style="background-image: url(//source.unsplash.com/300x405)">
      <p>Lorem ipsum dolor sit amet consectetur adipisi.</p>
    </div>
    <div class="back">
      <div>
        <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p>
        <button class="button">Click Here</button>
      </div>
    </div></a><a class="card" href="#!">
    <div class="front" style="background-image: url(//source.unsplash.com/300x406)">
      <p>Lorem ipsum dolor sit amet consectetur adipisi.</p>
    </div>
    <div class="back">
      <div>
        <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p>
        <button class="button">Click Here</button>
      </div>
    </div></a>
</div>
					</div>
					<div class="col-md-4 center">
					<h1 class="mrtitle">Junte-se a mais de <span class="mrnumber">1.248</span> Jogadores online e venha
						se divertir!</h1>
					<p class="mrsubtitle">Crie sua conta rápido e fácil</p>
					<button type="button" class="btn btn-primary mrbutton">Criar Agora!</button>
					</div>
					<div class="col-md-4"></div>
				</div>
			</header>
		</div>
	</div>
	<?php endif; ?>

	<div class="mroverflow2">
		<?php //include 'main/sidebar.php' ?>
		<?php //include 'main/loginbox.php' ?>
		<?php if (Flux::config('DebugMode') && @gethostbyname(Flux::config('ServerAddress')) == '127.0.0.1'): ?>
		<p class="notice">Please change your <strong>ServerAddress</strong> directive in your application config to your
			server's real address (e.g., myserver.com).</p>
		<?php endif ?>

		<!-- Messages -->
		<?php if ($message=$session->getMessage()): ?>
		<p class="message"><?php echo htmlspecialchars($message) ?></p>
		<?php endif ?>

		<!-- Sub menu -->
		<div class="container">
			<?php include $this->themePath('main/submenu.php', true) ?>
		</div>

		<!-- Page menu -->
		<?php include $this->themePath('main/pagemenu.php', true) ?>

		<!-- Credit balance -->
		<?php //if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>