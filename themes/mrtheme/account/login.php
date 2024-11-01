<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="card-title"><?php echo htmlspecialchars(Flux::message('LoginHeading')) ?></h2>
                    <?php if (isset($errorMessage)): ?>
                        <p class="text-danger"><?php echo htmlspecialchars($errorMessage) ?></p>
                    <?php else: ?>
                        <?php if ($auth->actionAllowed('account', 'create')): ?>
                            <p><?php printf(Flux::message('LoginPageMakeAccount'), $this->url('account', 'create')); ?></p>
                        <?php endif ?>
                    <?php endif ?>
                    <form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
                        <?php if (count($serverNames) === 1): ?>
                            <input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
                        <?php endif ?>
                        <div class="mb-3">
                            <label for="login_username" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountUsernameLabel')) ?></label>
                            <input type="text" name="username" id="login_username" class="form-control" value="<?php echo htmlspecialchars($params->get('username') ?: '') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="login_password" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountPasswordLabel')) ?></label>
                            <input type="password" name="password" id="login_password" class="form-control">
                        </div>
                        <?php if (count($serverNames) > 1): ?>
                            <div class="mb-3">
                                <label for="login_server" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountServerLabel')) ?></label>
                                <select name="server" id="login_server" class="form-select"<?php if (count($serverNames) === 1) echo ' disabled' ?>>
                                    <?php foreach ($serverNames as $serverName): ?>
                                        <option value="<?php echo htmlspecialchars($serverName) ?>"><?php echo htmlspecialchars($serverName) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        <?php endif ?>
                        <?php if (Flux::config('UseLoginCaptcha')): ?>
                            <div class="mb-3">
                                <label for="register_security_code" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label>
                                <div class="security-code">
                                    <?php if (Flux::config('EnableReCaptcha')): ?>
                                        <div class="g-recaptcha" data-theme="<?php echo $theme;?>" data-sitekey="<?php echo $recaptcha ?>"></div>
                                    <?php else: ?>
                                        <img src="<?php echo $this->url('captcha') ?>" class="captcha-image">
                                        <input type="text" name="security_code" id="register_security_code" class="form-control">
                                        <div style="font-size: smaller;">
                                            <strong><a href="javascript:refreshSecurityCode('.captcha-image')"><?php echo htmlspecialchars(Flux::message('RefreshSecurityCode')) ?></a></strong>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"><?php echo htmlspecialchars(Flux::message('LoginButton')) ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
