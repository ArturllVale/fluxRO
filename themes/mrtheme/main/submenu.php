<?php if (!defined('FLUX_ROOT')) exit; ?>

<?php 
    $subMenuItems = $this->getSubMenuItems(); 
    $breadcrumbs = array(); 
?>

<?php if (!empty($subMenuItems)): ?>
    <nav aria-label="breadcrumb">
        <ul id="breadcrumb">
            <li><a href="<?php echo $this->url('index', 'index'); ?>">Home</a></li>
            <?php foreach ($subMenuItems as $index => $menuItem): ?>
                <?php 
                    $isActive = $params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action']; 
                ?>
                <li class="breadcrumb-item <?php echo $isActive ? 'active' : ''; ?>" aria-current="<?php echo $isActive ? 'page' : ''; ?>">
                    <?php if (!$isActive): ?>
                        <a href="<?php echo $this->url($menuItem['module'], $menuItem['action']); ?>">
                            <?php echo htmlspecialchars($menuItem['name']); ?>
                        </a>
                    <?php else: ?>
                        <?php echo htmlspecialchars($menuItem['name']); ?>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
		</ul>
    </nav>
<?php endif; ?>
