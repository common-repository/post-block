<?php
    require_once POST_BLOCK_DIR . 'admin/class-fancy-post-base.php';
	class FancyPostPRO {
		public $plugin_file=__FILE__;
		public $responseObj;
		public $licenseMessage;
		public $show_message=false;
		public $slug="fancypost_license";
		function __construct() {

			$licenseKey=get_option("FancyPostPRO_lic_Key","");
			$liceEmail=get_option( "FancyPostPRO_lic_email","");
			Fancy_Post_P_R_O_Base::addOnDelete(function(){
			delete_option("FancyPostPRO_lic_Key");
			});
			if(Fancy_Post_P_R_O_Base::check_wp_plugin($licenseKey,$liceEmail,$this->licenseMessage,$this->responseObj,__FILE__)){
				add_action( 'admin_menu', [$this,'active_admin_menu'],99999);
				add_action( 'admin_post_FancyPostPRO_el_deactivate_license', [ $this, 'action_deactivate_license' ] );
				// activated() function should be here..

			}else{
				if(!empty($licenseKey) && !empty($this->licenseMessage)){
				$this->showMessage=true;
				}
				update_option("FancyPostPRO_lic_Key","") || add_option("FancyPostPRO_lic_Key","");
				add_action( 'admin_post_FancyPostPRO_el_activate_license', [ $this, 'action_activate_license' ] );
				add_action( 'admin_menu', [$this,'inactive_menu']);
				// license_form() function should be here..

			}
		}
		function action_activate_license(){
			check_admin_referer( 'el-license' );
			$licenseKey=!empty($_POST['el_license_key'])?$_POST['el_license_key']:"";
			$licenseEmail=!empty($_POST['el_license_email'])?$_POST['el_license_email']:"";
			update_option("FancyPostPRO_lic_Key",$licenseKey) || add_option("FancyPostPRO_lic_Key",$licenseKey);
			update_option("FancyPostPRO_lic_email",$licenseEmail) || add_option("FancyPostPRO_lic_email",$licenseEmail);
			update_option('_site_transient_update_plugins','');
			wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
		}
		function action_deactivate_license() {
			check_admin_referer( 'el-license' );
			$message="";
			if(Fancy_Post_P_R_O_Base::RemoveLicenseKey(__FILE__,$message)){
				update_option("FancyPostPRO_lic_Key","") || add_option("FancyPostPRO_lic_Key","");
				update_option('_site_transient_update_plugins','');
			}
			wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
		}
		function activated(){
			?>
			<style>.el-license-container{margin:20px;padding:35px;background:#fff;border-radius:4px}.el-license-container .el-license-field{display:block;margin-bottom:15px}.el-license-container .el-license-field input{font-size:200%;padding:8px 10px 10px}.el-license-container .notice-error,.el-license-container div.error{background:rgba(220,50,50,0.11);margin:0}.el-license-container .el-license-title{margin-top:0;font-size:30px}.el-license-container .el-license-info li{list-style:none;padding:0}.el-license-container .el-license-info-title{width:150px;display:inline-block;position:relative;padding-right:5px}.el-license-container .el-license-info-title:after{content:":";position:absolute;right:2px}.el-license-container .el-license-valid,.el-license-container .el-license-invalid{padding:0 5px 2px;color:#fff;background-color:#8fcc77;border-radius:3px}.el-license-container .el-license-invalid{background-color:#f44336}.el-license-container .el-license-key{font-weight:700;opacity:.8}.el-license-container .el-green-btn{padding:0 5px 2px;color:#fff;background-color:#8fcc77;border-radius:3px;text-decoration:none;-webkit-box-shadow:0 0 3px -1px rgba(0,0,0,0.38);-moz-box-shadow:0 0 3px -1px rgba(0,0,0,0.38);box-shadow:0 0 3px -1px rgba(0,0,0,0.38)}.el-license-container .el-green-btn:hover{color:#fff;background-color:#84bc6c}.el-license-container .el-blue-btn{padding:0 5px 2px;color:#fff;background-color:#20b1d2;border-radius:3px;text-decoration:none;-webkit-box-shadow:0 0 3px -1px rgba(0,0,0,0.38);-moz-box-shadow:0 0 3px -1px rgba(0,0,0,0.38);box-shadow:0 0 3px -1px rgba(0,0,0,0.38)}.el-license-container .el-blue-btn:hover{color:#fff;background-color:#219dbf}.el-license-container .el-license-field label{display:block;margin-bottom:5px}.el-license-container .el-license-active-btn{margin-top:25px}</style>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="FancyPostPRO_el_deactivate_license"/>
				<div class="el-license-container">
					<h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i> <?php _e("FancyPost PRO License Info",$this->slug);?> </h3>
					<hr>
					<ul class="el-license-info">
					<li>
						<div>
							<span class="el-license-info-title"><?php _e("Status",$this->slug);?></span>
	
							<?php if ( $this->responseObj->is_valid ) : ?>
								<span class="el-license-valid"><?php _e("Valid",$this->slug);?></span>
							<?php else : ?>
								<span class="el-license-valid"><?php _e("Invalid",$this->slug);?></span>
							<?php endif; ?>
						</div>
					</li>
	
					<li>
						<div>
							<span class="el-license-info-title"><?php _e("License Type",$this->slug);?></span>
							<?php echo $this->responseObj->license_title; ?>
						</div>
					</li>
	
				   <li>
					   <div>
						   <span class="el-license-info-title"><?php _e("License Expired on",$this->slug);?></span>
						   <?php echo $this->responseObj->expire_date;
						   if(!empty($this->responseObj->expire_renew_link)){
							   ?>
							   <a target="_blank" class="el-blue-btn" href="<?php echo $this->responseObj->expire_renew_link; ?>">Renew</a>
							   <?php
						   }
						   ?>
					   </div>
				   </li>
	
				   <li>
					   <div>
						   <span class="el-license-info-title"><?php _e("Support Expired on",$this->slug);?></span>
						   <?php
							   echo $this->responseObj->support_end;
							if(!empty($this->responseObj->support_renew_link)){
								?>
								   <a target="_blank" class="el-blue-btn" href="<?php echo $this->responseObj->support_renew_link; ?>">Renew</a>
								<?php
							}
						   ?>
					   </div>
				   </li>
					<li>
						<div>
							<span class="el-license-info-title"><?php _e("Your License Key",$this->slug);?></span>
							<span class="el-license-key"><?php echo esc_attr( substr($this->responseObj->license_key,0,9)."XXXXXXXX-XXXXXXXX".substr($this->responseObj->license_key,-9) ); ?></span>
						</div>
					</li>
					</ul>
					<div class="el-license-active-btn">
						<?php wp_nonce_field( 'el-license' ); ?>
						<?php submit_button('Deactivate'); ?>
					</div>
				</div>
			</form>
		<?php
		}
		function license_form() {
			?>
			<style>.el-license-container{margin:20px;padding:35px;background:#fff;border-radius:4px}.el-license-container .el-license-field{display:block;margin-bottom:15px}.el-license-container .el-license-field input{font-size:200%;padding:8px 10px 10px}.el-license-container .notice-error,.el-license-container div.error{background:rgba(220,50,50,0.11);margin:0}.el-license-container .el-license-title{margin-top:0;font-size:30px}.el-license-container .el-license-info li{list-style:none;padding:0}.el-license-container .el-license-info-title{width:150px;display:inline-block;position:relative;padding-right:5px}.el-license-container .el-license-info-title:after{content:":";position:absolute;right:2px}.el-license-container .el-license-valid,.el-license-container .el-license-invalid{padding:0 5px 2px;color:#fff;background-color:#8fcc77;border-radius:3px}.el-license-container .el-license-invalid{background-color:#f44336}.el-license-container .el-license-key{font-weight:700;opacity:.8}.el-license-container .el-green-btn{padding:0 5px 2px;color:#fff;background-color:#8fcc77;border-radius:3px;text-decoration:none;-webkit-box-shadow:0 0 3px -1px rgba(0,0,0,0.38);-moz-box-shadow:0 0 3px -1px rgba(0,0,0,0.38);box-shadow:0 0 3px -1px rgba(0,0,0,0.38)}.el-license-container .el-green-btn:hover{color:#fff;background-color:#84bc6c}.el-license-container .el-blue-btn{padding:0 5px 2px;color:#fff;background-color:#20b1d2;border-radius:3px;text-decoration:none;-webkit-box-shadow:0 0 3px -1px rgba(0,0,0,0.38);-moz-box-shadow:0 0 3px -1px rgba(0,0,0,0.38);box-shadow:0 0 3px -1px rgba(0,0,0,0.38)}.el-license-container .el-blue-btn:hover{color:#fff;background-color:#219dbf}.el-license-container .el-license-field label{display:block;margin-bottom:5px}.el-license-container .el-license-active-btn{margin-top:25px}</style>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="FancyPostPRO_el_activate_license"/>
				<div class="el-license-container">
					<h3 class="el-license-title"><i class="dashicons-before dashicons-star-filled"></i> <?php _e("FancyPost PRO Licensing",$this->slug);?></h3>
					<hr>
					<?php
					if(!empty($this->showMessage) && !empty($this->licenseMessage)){
						?>
						<div class="notice notice-error is-dismissible">
							<p><?php echo _e($this->licenseMessage,$this->slug); ?></p>
						</div>
						<?php
					}
					?>
					<p><?php _e("Enter your license key here to activate the product and receive full feature updates and premium support:",$this->slug);?></p>
					<ol>
						<li><?php _e("Copy the license key from your email",$this->slug);?></li>
						<li><?php _e("Paste the license key here",$this->slug);?></li>
						<li><?php _e("Press the 'Activate' button",$this->slug);?></li>
						<li><?php _e("Enjoy!",$this->slug);?></li>
					</ol>
					<div class="el-license-field">
						<label for="el_license_key"><?php _e("License code",$this->slug);?></label>
						<input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
					</div>
					<div class="el-license-field">
						<label for="el_license_key"><?php _e("Email Address",$this->slug);?></label>
						<?php
							$purchaseEmail   = get_option( "FancyPostPRO_lic_email", get_bloginfo( 'admin_email' ));
						?>
						<input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo $purchaseEmail; ?>" placeholder="" required="required">
						<div><small><?php _e("We will send update news of this product by this email address, don't worry, we hate spam",$this->slug);?></small></div>
					</div>
					<div class="el-license-active-btn">
						<?php wp_nonce_field( 'el-license' ); ?>
						<?php submit_button('Activate'); ?>
					</div>
				</div>
			</form>
			<?php
		}
	}
