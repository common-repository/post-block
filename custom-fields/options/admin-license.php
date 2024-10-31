<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_fpblock_license';

//
// Create options
//
FPBLOCK::createOptions(
	$prefix,
	array(
		'menu_title'         => 'License',
		'menu_slug'          => 'fancypost_license',
		'menu_type'          => 'submenu',
		'menu_parent'        => 'fancypost-init',
		'sticky_header'      => false,
		'show_bar_menu'      => false,
		'show_search'        => false,
		'show_network_menu'  => false,
		'show_reset_section' => false,
		'show_reset_all'     => false,
		'save_defaults'      => false,
		'menu_position'      => 5,
		'theme'              => 'light',
		'footer_credit'      => '',
		'show_footer'        => false,
	)
);

//
// Global Settings.
//
FPBLOCK::createSection(
	$prefix,
	array(
		'fields' => array(
			//
			// Custom CSS for this page.
			//
			array(
				'type'     => 'callback',
				'function' => 'fpblock_license_callback',
				'function' => ( 'PRESTIGE' === FPPB_COPY ) ? 'fpblock_license_callback' : 'fpblock_nolicense_callback',
			),
		),
	),
);

function fpblock_license_callback() {
	require_once POST_BLOCK_DIR . 'admin/class-fancy-post-base.php';
	class FancyPostPRO {
		public $plugin_file = __FILE__;
		public $responseObj;
		public $licenseMessage;
		public $showMessage = false;
		public $slug = "fancypost_license";

		function __construct() {
			$licenseKey = get_option("FancyPostPRO_lic_Key", "");
			$liceEmail = get_option("FancyPostPRO_lic_email", "");
			Fancy_Post_P_R_O_Base::addOnDelete(function() {
				delete_option("FancyPostPRO_lic_Key");
			});
			if (Fancy_Post_P_R_O_Base::check_wp_plugin($licenseKey, $liceEmail, $this->licenseMessage, $this->responseObj, __FILE__)) {
				add_action('admin_menu', [$this, 'active_admin_menu'], 99999);
				add_action('admin_post_FancyPostPRO_el_deactivate_license', [$this, 'action_deactivate_license']);
				$this->activated();
			} else {
				if (!empty($licenseKey) && !empty($this->licenseMessage)) {
					$this->showMessage = true;
				}
				update_option("FancyPostPRO_lic_Key", "") || add_option("FancyPostPRO_lic_Key", "");
				add_action('admin_post_FancyPostPRO_el_activate_license', [$this, 'action_activate_license']);
				add_action('admin_menu', [$this, 'inactive_menu']);
				$this->license_form();
			}
		}

		function action_activate_license() {
			check_admin_referer('el-license');
			$licenseKey = !empty($_POST['el_license_key']) ? $_POST['el_license_key'] : "";
			$licenseEmail = !empty($_POST['el_license_email']) ? $_POST['el_license_email'] : "";
			update_option("FancyPostPRO_lic_Key", $licenseKey) || add_option("FancyPostPRO_lic_Key", $licenseKey);
			update_option("FancyPostPRO_lic_email", $licenseEmail) || add_option("FancyPostPRO_lic_email", $licenseEmail);
			update_option('_site_transient_update_plugins', '');
			wp_safe_redirect(admin_url('admin.php?page=' . $this->slug));
		}

		function action_deactivate_license() {
			check_admin_referer('el-license');
			$message = "";
			if (Fancy_Post_P_R_O_Base::RemoveLicenseKey(__FILE__, $message)) {
				update_option("FancyPostPRO_lic_Key", "") || add_option("FancyPostPRO_lic_Key", "");
				update_option('_site_transient_update_plugins', '');
			}
			wp_safe_redirect(admin_url('admin.php?page=' . $this->slug));
		}

		function activated() {
			?>
			<style>
				/* Hide all notices & other sections except the framework body && Display none */
				div#wpbody-content > *:not(.fpblock.fpblock-options),
				[id*="notice"], [class*="notice"], [class*="error"] {
					display: none !important;
				}
			</style>
			<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="FancyPostPRO_el_deactivate_license"/>
				<div class="el-license-container">
					<h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i> <?php _e("FancyPost PRO License Info", $this->slug);?> </h3>
					<hr>
					<ul class="el-license-info">
					<li>
						<div>
							<span class="el-license-info-title"><?php _e("Status", $this->slug);?></span>
							<?php if ($this->responseObj->is_valid) : ?>
								<span class="el-license-valid"><?php _e("Valid", $this->slug);?></span>
							<?php else : ?>
								<span class="el-license-valid"><?php _e("Invalid", $this->slug);?></span>
							<?php endif; ?>
						</div>
					</li>
					<li>
						<div>
							<span class="el-license-info-title"><?php _e("License Type", $this->slug);?></span>
							<?php echo $this->responseObj->license_title; ?>
						</div>
					</li>
					<li>
						<div>
							<span class="el-license-info-title"><?php _e("License Expired on", $this->slug);?></span>
							<?php echo $this->responseObj->expire_date;
							if (!empty($this->responseObj->expire_renew_link)) {
								?>
								<a target="_blank" class="el-blue-btn" href="<?php echo $this->responseObj->expire_renew_link; ?>">Renew</a>
								<?php
							}
							?>
						</div>
					</li>
					<li>
						<div>
							<span class="el-license-info-title"><?php _e("Support Expired on", $this->slug);?></span>
							<?php
								echo $this->responseObj->support_end;
							if (!empty($this->responseObj->support_renew_link)) {
								?>
								<a target="_blank" class="el-blue-btn" href="<?php echo $this->responseObj->support_renew_link; ?>">Renew</a>
								<?php
							}
							?>
						</div>
					</li>
					<li>
						<div>
							<span class="el-license-info-title"><?php _e("Your License Key", $this->slug);?></span>
							<span class="el-license-key"><?php echo esc_attr(substr($this->responseObj->license_key, 0, 9) . "XXXXXXXX-XXXXXXXX" . substr($this->responseObj->license_key, -9)); ?></span>
						</div>
					</li>
					</ul>
					<div class="el-license-active-btn">
						<?php wp_nonce_field('el-license'); ?>
						<?php submit_button('Deactivate'); ?>
					</div>
				</div>
			</form>
			<?php
		}

		function license_form() {
			?>
			<style>
				/* Custom styles here */
			</style>
			<form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
				<input type="hidden" name="action" value="FancyPostPRO_el_activate_license"/>
				<div class="el-license-container">
					<h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i> <?php _e("FancyPost PRO Licensing", $this->slug);?></h3>
					<hr>
					<?php
					if (!empty($this->showMessage) && !empty($this->licenseMessage)) {
						?>
						<div class="notice notice-error is-dismissible">
							<p><?php echo _e($this->licenseMessage, $this->slug); ?></p>
						</div>
						<?php
					}
					?>
					<p><?php _e("Enter your license key here to activate the product and receive full feature updates and premium support:", $this->slug);?></p>
					<ol>
						<li><?php _e("Copy the license key from your email", $this->slug);?></li>
						<li><?php _e("Paste the license key here", $this->slug);?></li>
						<li><?php _e("Press the 'Activate' button", $this->slug);?></li>
						<li><?php _e("Enjoy!", $this->slug);?></li>
					</ol>
					<div class="el-license-field">
						<label for="el_license_key"><?php _e("License code", $this->slug);?></label>
						<input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
					</div>
					<div class="el-license-field">
						<label for="el_license_key"><?php _e("Email Address", $this->slug);?></label>
						<?php
							$purchaseEmail = get_option("FancyPostPRO_lic_email", get_bloginfo('admin_email'));
						?>
						<input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo $purchaseEmail; ?>" placeholder="" required="required">
						<div><small><?php _e("We will send update news of this product by this email address, don't worry, we hate spam", $this->slug);?></small></div>
					</div>
					<div class="el-license-active-btn">
						<?php wp_nonce_field('el-license'); ?>
						<?php submit_button('Activate'); ?>
					</div>
				</div>
			</form>
			<?php
		}
	}

	new FancyPostPRO();
}

function fpblock_nolicense_callback() {

	echo '<div class="el-license-container">
			<h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i> FancyPost PRO Licensing</h3>
			<hr>
			<p>In the world of WordPress plugins, licensing can sometimes be a complicated matter, especially when dealing with free versions. At Pluginic, we\'ve chosen a different approach to streamline the user experience and ensure that our free version remains accessible and easy to use. Here\'s why we don\'t require a license key for the free version of our plugin:</p>
			<ol>
				<li>Ease of Use</li>
				<li>Focus on Accessibility</li>
				<li>Streamlined Installation and Activation</li>
				<li>Encouraging Exploration and Feedback</li>
				<li>Building Trust and Transparency</li>
				<li>Encouraging Upgrades to Pro Versions</li>
			</ol>
			<div style="pointer-events: none;opacity: .5;">
				<div class="el-license-field">
					<label for="el_license_key">License code</label>
					<input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
				</div>
				<br>
				<div class="el-license-field">
					<label for="el_license_key">Email Address</label>
					<input type="text" class="regular-text code" name="el_license_email" size="50" value="' . get_bloginfo( 'admin_email' ) . '" placeholder="" required="required">
					<div><small style="color: #4CAF50;">We will send update news of this product by this email address, don\'t worry, we hate spam</small></div>
				</div>
				<div class="el-license-active-btn">
					<input type="hidden" id="_wpnonce" name="_wpnonce" value="8735062a14"><input type="hidden" name="_wp_http_referer" value="/wp-admin/edit.php?post_type=wpas_review&amp;page=wpas_license"><p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Activate"></p>
				</div>
			</div>
		</div>';
}
