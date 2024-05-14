<?php if (!defined('FLUX_ROOT')) exit; ?>

<?php 
    $subMenuItems = $this->getSubMenuItems(); 
    $menus = array(); 
?>

<?php if (!empty($subMenuItems)): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-text">Menu:</span>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach ($subMenuItems as $menuItem): ?>
                        <?php 
                            $isActive = $params->get('module') == $menuItem['module'] && $params->get('action') == $menuItem['action']; 
                            $menuClass = $isActive ? 'nav-item active' : 'nav-item'; 
                        ?>
                        <li class="<?php echo $menuClass; ?>">
                            <a class="nav-link" href="<?php echo $this->url($menuItem['module'], $menuItem['action']); ?>">
                                <?php echo htmlspecialchars($menuItem['name']); ?>
                                <?php if ($isActive): ?>
                                    <span class="visually-hidden">(current)</span>
                                <?php endif; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
