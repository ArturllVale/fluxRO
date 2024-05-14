<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?php echo htmlspecialchars(Flux::message('ServerInfoHeading')) ?></h2>
            <p><?php echo htmlspecialchars(Flux::message('ServerInfoText')) ?></p>

            <h3><?php echo htmlspecialchars(sprintf(Flux::message('ServerInfoSubHeading'), $server->serverName)) ?></h3>
            <div class="generic-form-div">
                <table class="table">
                    <tr>
                        <th><?php echo htmlspecialchars(Flux::message('ServerInfoAccountLabel')) ?></th>
                        <td><?php echo number_format($info['accounts']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo htmlspecialchars(Flux::message('ServerInfoCharLabel')) ?></th>
                        <td><?php echo number_format($info['characters']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo htmlspecialchars(Flux::message('ServerInfoGuildLabel')) ?></th>
                        <td><?php echo number_format($info['guilds']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo htmlspecialchars(Flux::message('ServerInfoPartyLabel')) ?></th>
                        <td><?php echo number_format($info['parties']) ?></td>
                    </tr>
                    <tr>
                        <th><?php echo htmlspecialchars(Flux::message('ServerInfoZenyLabel')) ?></th>
                        <td><?php echo number_format($info['zeny']) ?></td>
                    </tr>
                </table>
            </div>

            <h3><?php echo htmlspecialchars(sprintf(Flux::message('ServerInfoSubHeading2'), $server->serverName)) ?></h3>
            <div class="generic-form-div">
                <table class="table job-classes">
                    <tr>
                        <?php $i = 1; $x = 5 ?>
                        <?php foreach ($info['classes'] as $class => $total): ?>
                            <th><?php echo htmlspecialchars($class) ?></th>
                            <td><p class="important"><?php echo number_format($total) ?></p></td>
                            <?php if ($i++ % $x === 0): ?>
                    </tr>
                    <tr>
                        <?php endif ?>
                        <?php endforeach ?>
                        <?php --$i ?>
                        <?php while (($i++) % $x): ?>
                            <th>&nbsp;</th>
                            <td>&nbsp;</td>
                        <?php endwhile ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
