<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Guild Ranking</h2>
            <h3>
                Top <?php echo number_format($limit = (int) Flux::config('GuildRankingLimit')) ?> Guilds
                on <?php echo htmlspecialchars($server->serverName) ?>
            </h3>
            <?php if ($guilds): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th colspan="2">Guild Name</th>
                            <th>Guild Level</th>
                            <th>Castles Owned</th>
                            <th>Members</th>
                            <th>Average Level</th>
                            <th>Experience</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < $limit; ++$i): ?>
                        <tr<?php if (!isset($guilds[$i])) echo ' class="empty-row"'; if ($i === 0) echo ' class="top-ranked" title="<strong>'.htmlspecialchars($guilds[$i]->name).'</strong> is the top ranked guild!"' ?>>
                            <td align="right"><?php echo number_format($i + 1) ?></td>
                            <?php if (isset($guilds[$i])): ?>
                            <td<?php if ($guilds[$i]->emblem) echo ' width="24"'; ?>>
                                <?php if ($guilds[$i]->emblem): ?>
                                <img src="<?php echo $this->emblem($guilds[$i]->guild_id) ?>" class="img-fluid" />
                                <?php endif ?>
                            </td>
                            <td<?php if (!$guilds[$i]->emblem) echo ' colspan="2"'; ?>>
                                <strong>
                                    <?php if ($auth->actionAllowed('guild', 'view') && $auth->allowedToViewGuild): ?>
                                    <?php echo $this->linkToGuild($guilds[$i]->guild_id, $guilds[$i]->name) ?>
                                    <?php else: ?>
                                    <?php echo htmlspecialchars($guilds[$i]->name) ?>
                                    <?php endif ?>
                                </strong>
                            </td>
                            <td><?php echo number_format($guilds[$i]->guild_lv) ?></td>
                            <td><?php echo number_format($guilds[$i]->castles) ?></td>
                            <td><?php echo number_format($guilds[$i]->members) ?></td>
                            <td><?php echo number_format($guilds[$i]->average_lv) ?></td>
                            <td><?php echo number_format($guilds[$i]->exp) ?></td>
                            <?php else: ?>
                            <td colspan="8"></td>
                            <?php endif ?>
                        </tr>
                        <?php endfor ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <p>No guilds found. <a href="javascript:history.go(-1)">Go back</a>.</p>
            <?php endif ?>
        </div>
    </div>
</div>
