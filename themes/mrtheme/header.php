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
	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
			<div class="sky">
				<div class="stars"></div>
				<div class="stars1"></div>
				<div class="stars2"></div>
				<div class="shooting-stars"></div>
			</div>
				<div class="row mrspaco">
					<div class="col-md-6">
					
					<h1 class="mrtitle">Junte-se a mais de <span class="mrnumber">1.248</span> Jogadores online e
							venha
							se divertir!</h1>
						<p class="mrsubtitle">Crie sua conta rápido e fácil</p>
						<button type="button" class="btn btn-primary mrbutton">Criar Agora!</button>

					</div>	

					<div class="col-md-6 center">

					<div class="content">
					  <a class="card-flip" href="#!">
					    <div class="front-flip" style="background-image: url(https://i.imgur.com/ReFbw9v.png)">
					    </div>
					    <div class="back-flip">
					      <div>
					        <p>Crie uma conta rápido e fácil sem burocracia, e com segurança!</p>
					        <button class="button-flip">Nova Conta</button>
					      </div>
					    </div>
					  </a>
					  <a class="card-flip" href="#!">
					    <div class="front-flip" style="background-image: url(https://i.imgur.com/eyU13S2.png)">
					    </div>
					    <div class="back-flip">
					      <div>
					        <p>Baixe o jogo completo em diversos servidores de Download, escolha o que melhor lhe agradar.</p>
					        <button class="button-flip">Downloads</button>
					      </div>
					    </div>
					  </a>
					  <a class="card-flip" href="#!">
					    <div class="front-flip" style="background-image: url(https://i.imgur.com/wfwwANs.png)">
					    </div>
					    <div class="back-flip">
					      <div>
					        <p>Converse, busque informações, troque idéias e faça novos amigos!</p>
					        <button class="button-flip">Discord</button>
					      </div>
					    </div>
					  </a>
					</div>
						
					</div>
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