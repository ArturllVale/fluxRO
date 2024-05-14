<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title"><?php echo htmlspecialchars(Flux::message('ResetPassTitle')) ?></h2>
                    <?php if (!empty($errorMessage)): ?>
                        <p class="text-danger"><?php echo htmlspecialchars($errorMessage) ?></p>
                    <?php endif ?>
                    <p><?php echo htmlspecialchars(Flux::message('ResetPassInfo')) ?></p>
                    <p><?php echo htmlspecialchars(Flux::message('ResetPassInfo2')) ?></p>
                    <form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form2">
                        <div class="mb-3">
                            <?php if (count($serverNames) > 1): ?>
                                <label for="login" class="form-label"><?php echo htmlspecialchars(Flux::message('ResetPassServerLabel')) ?></label>
                                <select name="login" id="login" class="form-select"<?php if (count($serverNames) === 1) echo ' disabled' ?>>
                                    <?php foreach ($serverNames as $serverName): ?>
                                        <option value="<?php echo htmlspecialchars($serverName) ?>"<?php if ($params->get('server') == $serverName) echo ' selected' ?>><?php echo htmlspecialchars($serverName) ?></option>
                                    <?php endforeach ?>
                                </select>
                                <p class="form-text"><?php echo htmlspecialchars(Flux::message('ResetPassServerInfo')) ?></p>
                            <?php endif ?>
                        </div>
                        <div class="mb-3">
                            <label for="userid" class="form-label"><?php echo htmlspecialchars(Flux::message('ResetPassAccountLabel')) ?></label>
                            <input type="text" name="userid" id="userid" class="form-control">
                            <p class="form-text"><?php echo htmlspecialchars(Flux::message('ResetPassAccountInfo')) ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><?php echo htmlspecialchars(Flux::message('ResetPassEmailLabel')) ?></label>
                            <input type="text" name="email" id="email" class="form-control">
                            <p class="form-text"><?php echo htmlspecialchars(Flux::message('ResetPassEmailInfo')) ?></p>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"><?php echo htmlspecialchars(Flux::message('ResetPassButton')) ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
