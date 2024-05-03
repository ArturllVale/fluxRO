<?php if (!defined('FLUX_ROOT')) exit; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container-fluid">
		<!-- <a class="navbar-brand" href="./"><?php echo Flux::config('SiteTitle'); ?></a> -->
		<a class="navbar-brand" href="./">Nome do Site</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<?php $menuItems = $this->getMenuItems(); ?>
				<?php if (!empty($menuItems)): ?>
					<?php foreach ($menuItems as $menuCategory => $menus): ?>
						<?php if (!empty($menus)): ?>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
						<a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Admin Menu
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
	</div>
</nav>
