<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Character Ranking</h2>
            <h3>
                Top <?php echo number_format($limit = (int) Flux::config('CharRankingLimit')) ?> Characters
                <?php if (!is_null($jobClass)): ?>
                    (<?php echo htmlspecialchars($className = $this->jobClassText($jobClass)) ?>)
                <?php endif ?>
                on <?php echo htmlspecialchars($server->serverName) ?>
            </h3>
            <?php if ($chars): ?>
            <form action="" method="get" class="search-form2">
                <?php echo $this->moduleActionFormInputs('ranking', 'character') ?>
                <div class="mb-3">
                    <label for="jobclass" class="form-label">Filter by job class:</label>
                    <select name="jobclass" id="jobclass" class="form-select">
                        <option value=""<?php if (is_null($jobClass)) echo 'selected="selected"' ?>>All</option>
                        <?php foreach ($classes as $jobClassIndex => $jobClassName): ?>
                        <option value="<?php echo $jobClassIndex ?>"
                            <?php if (!is_null($jobClass) && $jobClass == $jobClassIndex) echo ' selected="selected"' ?>>
                            <?php echo htmlspecialchars($jobClassName) ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Filter" class="btn btn-primary">
                    <input type="button" value="Reset" onclick="reload()" class="btn btn-secondary">
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Character Name</th>
                            <th>Job Class</th>
                            <th colspan="2">Guild Name</th>
                            <th>Base Level</th>
                            <th>Job Level</th>
                            <th>Base Experience</th>
                            <th>Job Experience</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $topRankType = !is_null($jobClass) ? $className : 'character' ?>
                        <?php for ($i = 0; $i < $limit; ++$i): ?>
                        <tr<?php if (!isset($chars[$i])) echo ' class="empty-row"'; if ($i === 0) echo ' class="top-ranked" title="<strong>'.htmlspecialchars($chars[$i]->char_name).'</strong> is the top ranked '.$topRankType.'!"' ?>>
                            <td align="right"><?php echo number_format($i + 1) ?></td>
                            <?php if (isset($chars[$i])): ?>
                            <td><strong>
                                <?php if ($auth->actionAllowed('character', 'view') && $auth->allowedToViewCharacter): ?>
                                    <?php echo $this->linkToCharacter($chars[$i]->char_id, $chars[$i]->char_name) ?>
                                <?php else: ?>
                                    <?php echo htmlspecialchars($chars[$i]->char_name) ?>
                                <?php endif ?>
                            </strong></td>
                            <td><?php echo $this->jobClassText($chars[$i]->char_class) ?></td>
                            <?php if ($chars[$i]->guild_name): ?>
                            <?php if ($chars[$i]->emblem): ?>
                            <td width="24"><img src="<?php echo $this->emblem($chars[$i]->guild_id) ?>" /></td>
                            <?php endif ?>
                            <td<?php if (!$chars[$i]->emblem) echo ' colspan="2"' ?>>
                                <?php if ($auth->actionAllowed('guild', 'view') && $auth->allowedToViewGuild): ?>
                                    <?php echo $this->linkToGuild($chars[$i]->guild_id, $chars[$i]->guild_name) ?>
                                <?php else: ?>
                                    <?php echo htmlspecialchars($chars[$i]->guild_name) ?>
                                <?php endif ?>
                            </td>
                            <?php else: ?>
                            <td colspan="2"><span class="not-applicable">None</span></td>
                            <?php endif ?>
                            <td><?php echo number_format($chars[$i]->base_level) ?></td>
                            <td><?php echo number_format($chars[$i]->job_level) ?></td>
                            <td><?php echo number_format($chars[$i]->base_exp) ?></td>
                            <td><?php echo number_format($chars[$i]->job_exp) ?></td>
                            <?php else: ?>
                            <td colspan="8"></td>
                            <?php endif ?>
                        </tr>
                        <?php endfor ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <p>There are no characters. <a href="javascript:history.go(-1)">Go back</a>.</p>
            <?php endif ?>
        </div>
    </div>
</div>
