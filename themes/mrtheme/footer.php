<?php if (!defined('FLUX_ROOT')) exit; ?>

	</div>
<footer class="container py-4 text-center">
  <div class="row">
    <!-- Ícones das redes sociais -->
    <div class="col">
      <a href="#" class="text-decoration-none"><i class="fab fa-facebook social-icon facebook"></i></a>
      <a href="#" class="text-decoration-none"><i class="fab fa-instagram social-icon instagram"></i></a>
      <a href="#" class="text-decoration-none"><i class="fab fa-tiktok social-icon tiktok"></i></a>
      <a href="#" class="text-decoration-none"><i class="fab fa-discord social-icon discord"></i></a>
    </div>
  </div>
  <div class="row mt-3">
    <!-- Texto do rodapé -->
    <div class="col">
      Feito com <i class="fas fa-heart text-danger"></i> e Bootstrap 5 | MundoRag 2024-2025 &copy;
    </div>
  </div>
</footer>
	<!-- <div id="footer">
		<div class="container">
			<p class="text-muted">
				<?php if (Flux::config('ShowCopyright')): ?>
				Powered by <a href="https://github.com/rathena/FluxCP" target="_blank">FluxCP</a>
				<?php endif ?>
				<?php if (Flux::config('ShowRenderDetails')): ?>

					Page generated in <strong><?php echo round(microtime(true) - __START__, 5) ?></strong> second(s).
					Number of queries executed: <strong><?php echo (int)Flux::$numberOfQueries ?></strong>.
					<?php if (Flux::config('GzipCompressOutput')): ?>Gzip Compression: <strong>Enabled</strong>.<?php endif ?>

				<?php endif ?>
				<?php if (count(Flux::$appConfig->get('ThemeName', false)) > 1): ?>
					<span>Theme:
						<select name="preferred_theme" onchange="updatePreferredTheme(this)">
						<?php foreach (Flux::$appConfig->get('ThemeName', false) as $themeName): ?>
							<option value="<?php echo htmlspecialchars($themeName) ?>"<?php if ($session->theme == $themeName) echo ' selected="selected"' ?>><?php echo htmlspecialchars($themeName) ?></option>
						<?php endforeach ?>
						</select>
					</span>
				<?php endif ?>

				<span>Language:
					<select name="preferred_language" onchange="updatePreferredLanguage(this)">
					<?php foreach (Flux::getAvailableLanguages() as $lang_key => $lang): ?>
						<option value="<?php echo htmlspecialchars($lang_key) ?>"<?php if (!empty($_COOKIE['language']) && $_COOKIE['language'] == $lang_key) echo ' selected="selected"' ?>><?php echo htmlspecialchars($lang) ?></option>
					<?php endforeach ?>
					</select>
				</span>
			</p>
			<form action="<?php echo $this->urlWithQs ?>" method="post" name="preferred_theme_form" style="display: none">
				<input type="hidden" name="preferred_theme" value="" />
			</form>
		</div>
	</div> -->


		<!--[if lt IE 9]>
		<script src="<?php echo $this->themePath('js/ie9.js') ?>" type="text/javascript"></script>
		<![endif]-->

		<script type="text/javascript">
			function updatePreferredServer(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_server_form.preferred_server.value = preferred;
				document.preferred_server_form.submit();
			}

			function updatePreferredTheme(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_theme_form.preferred_theme.value = preferred;
				document.preferred_theme_form.submit();
			}

			function updatePreferredLanguage(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				setCookie('language', preferred);
				reload();
			}

			// Preload spinner image.
			var spinner = new Image();
			spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';

			function refreshSecurityCode(imgSelector){
				$(imgSelector).attr('src', spinner.src);

				// Load image, spinner will be active until loading is complete.
				var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
				var image = new Image();
				image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();

				$(imgSelector).attr('src', image.src);
			}
			function toggleSearchForm(){
				//$('.search-form').toggle();
				$('.search-form').slideToggle('fast');
			}

			function setCookie(key, value){
				var expires = new Date();
				expires.setTime(expires.getTime() + expires.getTime()); // never expires
				document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
			}
		</script>

		<?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
			<script type="text/javascript">
				var RecaptchaOptions = {
					theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
				};
			</script>
		<?php endif ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				var inputs = 'input[type=text],input[type=password],input[type=file]';
				$(inputs).focus(function(){
					$(this).css({
						'background-color': '#f9f5e7',
						'border-color': '#dcd7c7',
						'color': '#726c58'
					});
				});
				$(inputs).blur(function(){
					$(this).css({
						'backgroundColor': '#ffffff',
						'borderColor': '#dddddd',
						'color': '#444444'
					}, 500);
				});
				$('.menuitem a').hover(
					function(){
						$(this).fadeTo(200, 0.85);
						$(this).css('cursor', 'pointer');
					},
					function(){
						$(this).fadeTo(150, 1.00);
						$(this).css('cursor', 'normal');
					}
				);
				$('.money-input').keyup(function() {
					var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
					if (isNaN(creditValue))
						$('.credit-input').val('?');
					else
						$('.credit-input').val(creditValue);
				}).keyup();
				$('.credit-input').keyup(function() {
					var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
					if (isNaN(moneyValue))
						$('.money-input').val('?');
					else
						$('.money-input').val(moneyValue.toFixed(2));
				}).keyup();
			});

			function reload(){ window.location.href = '<?php echo $this->url ?>'; }
		</script>
	<script>
		document.documentElement.style.scrollBehavior = "smooth";
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<!-- Font Awesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
	</body>
</html>
