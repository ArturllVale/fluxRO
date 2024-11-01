<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Quem está Online?</h2>
            <h3>Mostrar players Online no <?php echo htmlspecialchars($server->serverName) ?>.</h3>
            <?php if ($auth->allowedToSearchWhosOnline): ?>
            <p class="toggler"><a href="javascript:toggleSearchForm()">Search...</a></p>
            <form action="<?php echo $this->url ?>" method="get" class="search-form">
                <?php echo $this->moduleActionFormInputs($params->get('module'), $params->get('action')) ?>
                <div class="mb-3">
                    <label for="char_name" class="form-label">Nome:</label>
                    <input type="text" name="char_name" id="char_name" class="form-control" value="<?php echo htmlspecialchars($params->get('char_name') ?: '') ?>" />
                    <!-- Job Class input -->
                    <label for="char_class" class="form-label">Classe:</label>
                    <input type="text" name="char_class" id="char_class" class="form-control" value="<?php echo htmlspecialchars($params->get('char_class') ?: '') ?>" />
                    <!-- Guild input -->
                    <label for="guild_name" class="form-label">Guilda:</label>
                    <input type="text" name="guild_name" id="guild_name" class="form-control" value="<?php echo htmlspecialchars($params->get('guild_name') ?: '') ?>" />
                </div>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
                <button type="button" class="btn btn-secondary" onclick="reload()">Reset</button>
            </form>
            <?php endif ?>
            <?php if ($chars): ?>
            <p><?php echo $paginator->infoText() ?></p>
            <?php if ($hiddenCount): ?>
            <p><?php echo number_format($hiddenCount) ?> <?php echo ((int)$hiddenCount === 1) ? 'person has' : 'people have' ?> chosen to hide themselves from this list.</p>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo $paginator->sortableColumn('char_name', 'Character Name') ?></th>
                            <th>Classe</th>
                            <th><?php echo $paginator->sortableColumn('base_level', 'Base Level') ?></th>
                            <th><?php echo $paginator->sortableColumn('job_level', 'Job Level') ?></th>
                            <th colspan="2"><?php echo $paginator->sortableColumn('guild_name', 'Guild') ?></th>
                            <?php if ($auth->allowedToViewOnlinePosition): ?>
                            <th><?php echo $paginator->sortableColumn('last_map', 'Map') ?></th>
                            <?php else: ?>
                            <th>Mapa</th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chars as $char): ?>
                        <tr>
                            <td align="right">
                                <?php if ($auth->actionAllowed('character', 'view') && $auth->allowedToViewCharacter): ?>
                                <?php echo $this->linkToCharacter($char->char_id, $char->char_name) ?>
                                <?php else: ?>
                                <?php echo htmlspecialchars($char->char_name) ?>
                                <?php endif ?>
                            </td>
                            <td><?php echo $this->jobClassText($char->char_class) ?></td>
                            <td><?php echo number_format($char->base_level) ?></td>
                            <td><?php echo number_format($char->job_level) ?></td>
                            <?php if ($char->guild_name): ?>
                            <?php if ($char->emblem): ?>
                            <td width="20"><img src="<?php echo $this->emblem($char->guild_id) ?>" /></td>
                            <?php endif ?>
                            <td<?php if (!$char->emblem) echo ' colspan="2"' ?>>
                                <?php if ($auth->actionAllowed('guild', 'view') && $auth->allowedToViewGuild): ?>
                                <?php echo $this->linkToGuild($char->guild_id, $char->guild_name) ?>
                                <?php else: ?>
                                <?php echo htmlspecialchars($char->guild_name) ?>
                                <?php endif ?>
                            </td>
                            <?php else: ?>
                            <td colspan="2"><span class="not-applicable">- x -</span></td>
                            <?php endif ?>
                            <td>
                                <?php if (!$char->hidemap && $auth->allowedToViewOnlinePosition): ?>
                                <?php echo htmlspecialchars(basename($char->last_map, '.gat')) ?>
                                <?php else: ?>
                                <span class="not-applicable">Escondido</span>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php echo $paginator->getHTML() ?>
            <?php else: ?>
            <p>Não encontramos personagens online no <?php echo htmlspecialchars($server->serverName) ?>. <a href="javascript:history.go(-1)">Retornar</a>.</p>
            <?php endif ?>
        </div>
    </div>
</div>
