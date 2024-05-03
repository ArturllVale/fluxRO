<?php if (!defined('FLUX_ROOT')) exit; ?>

<div class="container">
    <h2><?php echo htmlspecialchars(Flux::message('AccountCreateHeading')) ?></h2>
    <div class="row">
        <div class="col-md-6">
            <form action="<?php echo $this->url ?>" method="post" class="generic-form">
                <?php if (count($serverNames) === 1): ?>
                    <input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
                <?php endif ?>

                <table class="generic-form-table">
                    <?php if (count($serverNames) > 1): ?>
                        <tr>
                            <th><label for="register_server"><?php echo htmlspecialchars(Flux::message('AccountServerLabel')) ?></label></th>
                            <td>
                                <select name="server" id="register_server" class="form-select"<?php if (count($serverNames) === 1) echo ' disabled' ?>>
                                    <?php foreach ($serverNames as $serverName): ?>
                                        <option value="<?php echo htmlspecialchars($serverName) ?>"<?php if ($params->get('server') == $serverName) echo ' selected' ?>><?php echo htmlspecialchars($serverName) ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                    <?php endif ?>

                    <tr>
                        <th><label for="register_username"><?php echo htmlspecialchars(Flux::message('AccountUsernameLabel')) ?></label></th>
                        <td><input type="text" name="username" id="register_username" class="form-control" value="<?php echo htmlspecialchars($params->get('username') ?: '') ?>" /></td>
                    </tr>

                    <tr>
                        <th><label for="register_password"><?php echo htmlspecialchars(Flux::message('AccountPasswordLabel')) ?></label></th>
                        <td><input type="password" name="password" id="register_password" class="form-control" /></td>
                    </tr>

                    <tr>
                        <th><label for="register_confirm_password"><?php echo htmlspecialchars(Flux::message('AccountPassConfirmLabel')) ?></label></th>
                        <td><input type="password" name="confirm_password" id="register_confirm_password" class="form-control" /></td>
                    </tr>

                    <tr>
                        <th><label for="register_email_address"><?php echo htmlspecialchars(Flux::message('AccountEmailLabel')) ?></label></th>
                        <td><input type="text" name="email_address" id="register_email_address" class="form-control" value="<?php echo htmlspecialchars($params->get('email_address') ?: '') ?>" /></td>
                    </tr>

                    <tr>
                        <th><label for="register_email_address"><?php echo htmlspecialchars(Flux::message('AccountEmailLabel2')) ?></label></th>
                        <td><input type="text" name="email_address2" id="register_email_address2" class="form-control" value="<?php echo htmlspecialchars($params->get('email_address2') ?: '') ?>" /></td>
                    </tr>

                    <tr>
                        <th><label><?php echo htmlspecialchars(Flux::message('AccountGenderLabel')) ?></label></th>
                        <td>
                            <p>
                                <label class="form-check-label"><input type="radio" name="gender" id="register_gender_m" value="M"<?php if ($params->get('gender') === 'M') echo ' checked' ?>> <?php echo $this->genderText('M') ?></label>
                                <label class="form-check-label"><input type="radio" name="gender" id="register_gender_f" value="F"<?php if ($params->get('gender') === 'F') echo ' checked' ?>> <?php echo $this->genderText('F') ?></label>
                                <strong title="<?php echo htmlspecialchars(Flux::message('AccountCreateGenderInfo')) ?>">?</strong>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <th><label><?php echo htmlspecialchars(Flux::message('AccountBirthdateLabel')) ?></label></th>
                        <td><?php echo $this->dateField('birthdate', null, 0) ?></td>
                    </tr>

                    <?php if (Flux::config('UseCaptcha')): ?>
                        <tr>
                            <th><label for="register_security_code" class="form-label"><?php echo htmlspecialchars(Flux::message('AccountSecurityLabel')) ?></label></th>
                            <td>
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
                            </td>
                        </tr>
                    <?php endif ?>

                    <tr>
                        <td></td>
                        <td>
                            <div style="margin-bottom: 5px">
                                <?php printf(htmlspecialchars(Flux::message('AccountCreateInfo2')), '<a href="'.$this->url('service', 'tos').'">'.Flux::message('AccountCreateTerms').'</a>') ?>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary"><strong><?php echo htmlspecialchars(Flux::message('AccountCreateButton')) ?></strong></button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-6">
            <p><?php printf(htmlspecialchars(Flux::message('AccountCreateInfo')), '<a href="'.$this->url('service', 'tos').'">'.Flux::message('AccountCreateTerms').'</a>') ?></p>

            <?php if (Flux::config('RequireEmailConfirm')): ?>
                <p><strong>Note:</strong> You will need to provide a working e-mail address to confirm your account before you can log-in.</p>
            <?php endif ?>

            <p><strong>Note:</strong> <?php echo sprintf("Your password must be between %d and %d characters.", Flux::config('MinPasswordLength'), Flux::config('MaxPasswordLength')) ?></p>

            <!-- Restante das notas aqui -->

            <?php if (isset($errorMessage)): ?>
                <p class="red" style="font-weight: bold"><?php echo htmlspecialchars($errorMessage) ?></p>
            <?php endif ?>

            <?php if (Flux::config('UseCaptcha')): ?>
                <div class="mb-3">
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

            <div>
                <p><?php printf(htmlspecialchars(Flux::message('AccountCreateInfo2')), '<a href="'.$this->url('service', 'tos').'">'.Flux::message('AccountCreateTerms').'</a>') ?></p>
                <button type="submit" class="btn btn-primary"><strong><?php echo htmlspecialchars(Flux::message('AccountCreateButton')) ?></strong></button>
            </div>
        </div>
    </div>
</div>