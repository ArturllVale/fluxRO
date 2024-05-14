<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Castles</h2>
            <p>This page shows what castles are activated and which guilds own them.</p>
            <?php if ($castles): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Castle ID</th>
                            <th>Castle</th>
                            <th>Guild</th>
                            <th>Economy</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($castles as $castle): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($castle->castle_id) ?></td>
                            <td><?php echo htmlspecialchars($castleNames[$castle->castle_id]) ?></td>
                            <?php if ($castle->guild_name): ?>
                                <?php if ($castle->emblem): ?>
                                    <td><img src="<?php echo $this->emblem($castle->guild_id) ?>" width="24" height="24" /></td>
                                    <td>
                                        <?php if ($auth->actionAllowed('guild', 'view') && $auth->allowedToViewGuild): ?>
                                            <?php echo $this->linkToGuild($castle->guild_id, $castle->guild_name) ?>
                                        <?php else: ?>
                                            <?php echo htmlspecialchars($castle->guild_name) ?>
                                        <?php endif ?>
                                    </td>
                                    <td><?php echo $castle->economy; ?></td>
                                <?php else: ?>
                                    <td colspan="3"><?php echo htmlspecialchars($castle->guild_name) ?></td>
                                <?php endif ?>
                            <?php else: ?>
                                <td colspan="4"><span class="not-applicable"><?php echo htmlspecialchars(Flux::message('NoneLabel')) ?></span></td>
                            <?php endif ?>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <p>No castles found. <a href="javascript:history.go(-1)">Go back</a>.</p>
            <?php endif ?>
        </div>
    </div>
</div>
