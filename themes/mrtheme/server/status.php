<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><?php echo htmlspecialchars(Flux::message('ServerStatusHeading')) ?></h2>
            <p><?php echo htmlspecialchars(Flux::message('ServerStatusInfo')) ?></p>
            <?php foreach ($serverStatus as $privServerName => $gameServers): ?>
            <h3>Server Status for <?php echo htmlspecialchars($privServerName) ?></h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th><?php echo htmlspecialchars(Flux::message('ServerStatusServerLabel')) ?></th>
                            <th><?php echo htmlspecialchars(Flux::message('ServerStatusLoginLabel')) ?></th>
                            <th><?php echo htmlspecialchars(Flux::message('ServerStatusCharLabel')) ?></th>
                            <th><?php echo htmlspecialchars(Flux::message('ServerStatusMapLabel')) ?></th>
                            <th><?php echo htmlspecialchars(Flux::message('ServerStatusOnlineLabel')) ?></th>
                            <?php if(Flux::config('EnablePeakDisplay')): ?>
                            <th><?php echo htmlspecialchars(Flux::message('ServerStatusPeakLabel')) ?></th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gameServers as $serverName => $gameServer): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($serverName) ?></td>
                            <td><?php echo $this->serverUpDown($gameServer['loginServerUp']) ?></td>
                            <td><?php echo $this->serverUpDown($gameServer['charServerUp']) ?></td>
                            <td><?php echo $this->serverUpDown($gameServer['mapServerUp']) ?></td>
                            <td><?php echo $gameServer['playersOnline'] ?></td>
                            <?php if(Flux::config('EnablePeakDisplay')): ?>
                            <td><?php echo $gameServer['playersPeak'] ?></td>
                            <?php endif ?>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
