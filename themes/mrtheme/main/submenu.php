<?php if (!defined('FLUX_ROOT')) exit; ?>

<?php 
    $subMenuItems = $this->getSubMenuItems(); 
    $breadcrumbs = array(); 
?>

<?php if (!empty($subMenuItems)): ?>
    <ul id="breadcrumb" class="breadcrumb">
        <li><a href="<?php echo $this->url('main', 'main'); ?>"><i class="fa-solid fa-house"></i></a></li>
        <?php foreach ($subMenuItems as $index => $menuItem): ?>
            <?php 
                $isActive = $params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action']; 
                $class = $isActive ? 'active' : '';
            ?>
            <li class="<?php echo $class; ?>">
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
<?php endif; ?>
