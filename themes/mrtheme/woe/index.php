<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?php echo htmlspecialchars(Flux::message('WoeHeading')) ?></h2>
            <?php if ($woeTimes): ?>
            <p><?php echo htmlspecialchars(sprintf(Flux::message('WoeInfo'), $session->loginAthenaGroup->serverName)) ?></p>
            <p><?php echo htmlspecialchars(Flux::message('WoeServerTimeInfo')) ?> <strong class="important"><?php echo $server->getServerTime('Y-m-d H:i:s (l)') ?></strong>.</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped woe-table">
                    <thead>
                        <tr>
                            <th><?php echo htmlspecialchars(Flux::message('WoeServerLabel')) ?></th>
                            <th colspan="3"><?php echo htmlspecialchars(Flux::message('WoeTimesLabel')) ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($woeTimes as $serverName => $times): ?>
                        <tr>
                            <td class="server" rowspan="<?php echo count($times)+1 ?>">
                                <?php echo htmlspecialchars($serverName)  ?>
                            </td>
                        </tr>
                        <?php foreach ($times as $time): ?>
                        <tr>
                            <td class="time">
                                <?php echo htmlspecialchars($time['startingDay']) ?>
                                @ <?php echo htmlspecialchars($time['startingHour']) ?>
                            </td>
                            <td>~</td>
                            <td class="time">
                                <?php echo htmlspecialchars($time['endingDay']) ?>
                                @ <?php echo htmlspecialchars($time['endingHour']) ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <p><?php echo htmlspecialchars(Flux::message('WoeNotScheduledInfo')) ?></p>
            <?php endif ?>
        </div>
    </div>
</div>
