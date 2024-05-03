<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="container">
    <h2><?php echo htmlspecialchars(Flux::message('AccountCreateHeading')) ?></h2>
    <p><?php printf(htmlspecialchars(Flux::message('AccountCreateInfo')), '<a href="'.$this->url('service', 'tos').'">'.Flux::message('AccountCreateTerms').'</a>') ?></p>

    <?php if (Flux::config('RequireEmailConfirm')): ?>
        <p><strong>Note:</strong> You will need to provide a working e-mail address to confirm your account before you can log-in.</p>
    <?php endif ?>

    <p><strong>Note:</strong> <?php echo sprintf("Your password must be between %d and %d characters.", Flux::config('MinPasswordLength'), Flux::config('MaxPasswordLength')) ?></p>

    <?php if (Flux::config('PasswordMinUpper') > 0): ?>
        <p><strong>Note:</strong> <?php echo sprintf(Flux::message('PasswordNeedUpper'), Flux::config('PasswordMinUpper')) ?></p>
    <?php endif ?>

    <?php if (Flux::config('PasswordMinLower') > 0): ?>
        <p><strong>Note:</strong> <?php echo sprintf(Flux::message('PasswordNeedLower'), Flux::config('PasswordMinLower')) ?></p>
    <?php endif ?>

    <?php if (Flux::config('PasswordMinNumber') > 0): ?>
        <p><strong>Note:</strong> <?php echo sprintf(Flux::message('PasswordNeedNumber'), Flux::config('PasswordMinNumber')) ?></p>
    <?php endif ?>

    <?php if (Flux::config('PasswordMinSymbol') > 0): ?>
        <p><strong>Note:</strong> <?php echo sprintf(Flux::message('PasswordNeedSymbol'), Flux::config('PasswordMinSymbol')) ?></p>
    <?php endif ?>

    <?php if (!Flux::config('AllowUserInPassword')): ?>
        <p><strong>Note:</strong> <?php echo Flux::message('PasswordContainsUser') ?></p>
    <?php endif ?>

    <?php if (isset($errorMessage)): ?>
        <p class="red" style="font-weight: bold"><?php echo htmlspecialchars($errorMessage) ?></p>
    <?php endif ?>

    <form action="<?php echo $this->url ?>" method="post" class="generic-form">
        <?php if (count($serverNames) === 1): ?>
            <input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
        <?php endif ?>

        <div class="row">
            <?php if (count($serverNames) > 1): ?>
                <div class="col-md-6 mb-3">
                    <label for="register_server" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountServerLabel')) ?></label>
                    <select name="server" id="register_server" class="form-select"<?php if (count($serverNames) === 1) echo ' disabled' ?>>
                        <?php foreach ($serverNames as $serverName): ?>
                            <option value="<?php echo htmlspecialchars($serverName) ?>"<?php if ($params->get('server') == $serverName) echo ' selected' ?>><?php echo htmlspecialchars($serverName) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            <?php endif ?>

            <div class="col-md-6 mb-3">
                <label for="register_username" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountUsernameLabel')) ?></label>
                <input type="text" name="username" id="register_username" class="form-control" value="<?php echo htmlspecialchars($params->get('username') ?: '') ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="register_password" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountPasswordLabel')) ?></label>
                <input type="password" name="password" id="register_password" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label for="register_confirm_password" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountPassConfirmLabel')) ?></label>
                <input type="password" name="confirm_password" id="register_confirm_password" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
                <label for="register_email_address" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountEmailLabel')) ?></label>
                <input type="text" name="email_address" id="register_email_address" class="form-control" value="<?php echo htmlspecialchars($params->get('email_address') ?: '') ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label for="register_email_address2" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountEmailLabel2')) ?></label>
                <input type="text" name="email_address2" id="register_email_address2" class="form-control" value="<?php echo htmlspecialchars($params->get('email_address2') ?: '') ?>">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><?php echo htmlspecialchars(Flux::message('AccountGenderLabel')) ?></label>
                <div>
                    <label class="form-check-label"><input type="radio" name="gender" id="register_gender_m" value="M"<?php if ($params->get('gender') === 'M') echo ' checked' ?>> <?php echo $this->genderText('M') ?></label>
                    <label class="form-check-label"><input type="radio" name="gender" id="register_gender_f" value="F"<?php if ($params->get('gender') === 'F') echo ' checked' ?>> <?php echo $this->genderText('F') ?></label>
                    <strong title="<?php echo htmlspecialchars(Flux::message('AccountCreateGenderInfo')) ?>">?</strong>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label"><?php echo htmlspecialchars(Flux::message('AccountBirthdateLabel')) ?></label>
                <div><?php echo $this->dateField('birthdate', null, 0) ?></div>
            </div>

            <?php if (Flux::config('UseCaptcha')): ?>
                <div class="col-md-12 mb-3">
                    <label for="register_security_code" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label>
                    <?php if (Flux::config('ReCaptchaPublicKey') === '...' || Flux::config('ReCaptchaPrivateKey') === '...'): ?>
                        <div class="no-recaptcha" style="color: red"><?php echo htmlspecialchars(Flux::message('AccountRecaptchaKey')) ?></div>
                    <?php else: ?>
                        <?php if (Flux::config('EnableReCaptcha')): ?>
                            <div class="g-recaptcha" data-theme="<?php echo $theme ?>" data-sitekey="<?php echo $recaptcha ?>"></div>
                        <?php else: ?>
                            <div class="security-code">
                                <img src="<?php echo $this->url('captcha') ?>" alt="Captcha">
                            </div>
                            <input type="text" name="security_code" id="register_security_code" class="form-control">
                            <div style="font-size: smaller;" class="action">
                                <strong><a href="javascript:refreshSecurityCode('.security-code img')"><?php echo htmlspecialchars(Flux::message('RefreshSecurityCode')) ?></a></strong>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div style="margin-bottom: 5px">
                    <?php printf(htmlspecialchars(Flux::message('AccountCreateInfo2')), '<a href="'.$this->url('service', 'tos').'">'.Flux::message('AccountCreateTerms').'</a>') ?>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary"><strong><?php echo htmlspecialchars(Flux::message('AccountCreateButton')) ?></strong></button>
                </div>
            </div>
        </div>
    </form>
</div>
