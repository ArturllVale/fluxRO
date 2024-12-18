<?php if (!defined('FLUX_ROOT')) exit; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-mr mrbordernav">
	<div class="container-fluid d-flex justify-content-between">
		<a class="navbar-brand" href="./"><img src="themes/mrtheme/img/logo.png" alt="" srcset=""></a>
		<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<?php $menuItems = $this->getMenuItems(); ?>
				<?php if (!empty($menuItems)): ?>
					<?php foreach ($menuItems as $menuCategory => $menus): ?>
						<?php if (!empty($menus)): ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle mrrounded" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									<?php echo htmlspecialchars(Flux::message($menuCategory)) ?>
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<?php foreach ($menus as $menuItem):  ?>
										<li><a class="dropdown-item" href="<?php echo $menuItem['url'] ?>"><?php echo htmlspecialchars(Flux::message($menuItem['name'])) ?></a></li>
									<?php endforeach ?>
								</ul>
							</li>
						<?php endif ?>
					<?php endforeach ?>
				<?php endif ?>

				<?php $adminMenuItems = $this->getAdminMenuItems(); ?>
				<?php if (!empty($adminMenuItems) && Flux::config('AdminMenuNewStyle')): ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle mrrounded" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Admin
						</a>
						<ul class="dropdown-menu" aria-labelledby="adminDropdown">
							<?php foreach ($adminMenuItems as $menuItem): ?>
								<li><a class="dropdown-item" href="<?php echo $this->url($menuItem['module'], $menuItem['action']) ?>"><?php echo htmlspecialchars(Flux::message($menuItem['name'])) ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
				<?php endif ?>
			</ul>
		</div>
		<div class="d-flex">
			<ul class="navbar-nav">
				<?php if (empty($adminMenuItems) || !Flux::config('AdminMenuNewStyle')): ?>
				<li class="nav-item"><a class="nav-link mrrounded mrentrar" href="/?module=account&action=login">Entrar</a></li>
				<li class="nav-item"><a class="nav-link mrrounded mrdestak" href="/?module=account&action=create">Registrar</a></li>
				<?php endif; ?>
				<?php if (!empty($adminMenuItems) && Flux::config('AdminMenuNewStyle')): ?>
				<li class="nav-item"><a class="nav-link mrrounded mrsair" href="/?module=account&action=logout">Deslogar</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>