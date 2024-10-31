<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_fpblock_features';

//
// Create options
//
FPBLOCK::createOptions(
	$prefix,
	array(
		'menu_title'         => '🎁 Upgrade to PRO',
		'menu_slug'          => 'fancypost_features',
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
			
			array(
				'type'     => 'callback',
				'function' => 'fpblock_features_callback',
			),
		),
	),
);

function fpblock_features_callback() {
	?>
	<style>
	/* Hide all notices & other sections except the framework body && Display none */
	div#wpbody-content > *:not(.fpblock.fpblock-options),
	[id*="notice"], [class*="notice"], [class*="error"] {
		display: none !important;
	}
	.fpblock-option-body {
		margin-bottom: 50px;
	}
	.frhdgs-option-body p {
		font-size: 16px;
		margin: 2px;
	}
	.frhdgs-option-body {
		position: relative;
		display: block;
	}
	.frhdgs-hero-upgrade {
		position: relative;
		background: rgb(245 255 246 / 50%);
		padding: 30px;
	}
	/* Feature list */
	.frhdgs-hero-upgrade h2 {
		font-size: 36px;
		font-weight: 100;
		margin: 0;
		padding-bottom: 40px;
		color: #002000;
		text-shadow: 1px 1px 10px #d3ffa0;
	}
	.frhdgs-hero-upgrade h2 span {
		padding-right: 44px;
	}
	.frhdgs-hero-upgrade h2 span:before {
		color: #FF007A;
		font-size: 58px;
		line-height: 20px;
	}
	.frhdgs-hero-upgrade li {
		color: #000;
		background: rgb(231 231 231 / 50%);
		padding: 6px 28px 10px;
		font-size: 19px;
		line-height: 26px;
		position: relative;
		margin-bottom: 13px;
		text-shadow: 0 1px 0 rgb(1 108 82 / 50%);
	}
	.frhdgs-hero-upgrade li:before {
		position: absolute;
		left: -7px;
		top: 8px;
		width: 30px;
		height: 30px;
		content: "";
		background-repeat: no-repeat;
		background-size: cover;
		background-image: url("data:image/svg+xml,%3Csvg fill='darkgreen' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' viewBox='0 0 700 700'%3E%3Cg%3E%3Cpath d='m283.89 373.55s0-108.52-104.79-134.72l78.59-48.66 67.367 82.336s157.18-145.95 209.57-149.7c0 0 48.652 11.234 67.355 52.398 0.011719 0-187.1 52.395-318.1 198.34z'/%3E%3Cpath d='m457.26 126.97v-26.602h-359.27v359.27h359.27l-0.003906-186.99c-19.504 11.43-39.699 24.652-59.871 39.387v87.707h-239.52v-239.51h239.52v10.434c19.672-15.57 40.195-30.836 59.867-43.699z'/%3E%3Cuse x='70' y='644' xlink:href='%23w'/%3E%3Cuse x='90.550781' y='644' xlink:href='%23d'/%3E%3Cuse x='104.359375' y='644' xlink:href='%23b'/%3E%3Cuse x='123.347656' y='644' xlink:href='%23a'/%3E%3Cuse x='142.242188' y='644' xlink:href='%23c'/%3E%3Cuse x='155.628906' y='644' xlink:href='%23b'/%3E%3Cuse x='174.617188' y='644' xlink:href='%23o'/%3E%3Cuse x='204.410156' y='644' xlink:href='%23n'/%3E%3Cuse x='224.453125' y='644' xlink:href='%23m'/%3E%3Cuse x='252.453125' y='644' xlink:href='%23l'/%3E%3Cuse x='272.726562' y='644' xlink:href='%23a'/%3E%3Cuse x='291.621094' y='644' xlink:href='%23k'/%3E%3Cuse x='320.796875' y='644' xlink:href='%23f'/%3E%3Cuse x='330.394531' y='644' xlink:href='%23j'/%3E%3Cuse x='350.328125' y='644' xlink:href='%23f'/%3E%3Cuse x='369.671875' y='644' xlink:href='%23v'/%3E%3Cuse x='391.34375' y='644' xlink:href='%23i'/%3E%3Cuse x='411.277344' y='644' xlink:href='%23h'/%3E%3Cuse x='420.875' y='644' xlink:href='%23g'/%3E%3Cuse x='440.808594' y='644' xlink:href='%23u'/%3E%3Cuse x='466.675781' y='644' xlink:href='%23a'/%3E%3Cuse x='485.570312' y='644' xlink:href='%23h'/%3E%3Cuse x='495.167969' y='644' xlink:href='%23f'/%3E%3Cuse x='504.765625' y='644' xlink:href='%23a'/%3E%3Cuse x='70' y='672' xlink:href='%23t'/%3E%3Cuse x='82.183594' y='672' xlink:href='%23d'/%3E%3Cuse x='95.992188' y='672' xlink:href='%23e'/%3E%3Cuse x='115.226562' y='672' xlink:href='%23k'/%3E%3Cuse x='154.152344' y='672' xlink:href='%23c'/%3E%3Cuse x='167.535156' y='672' xlink:href='%23i'/%3E%3Cuse x='187.46875' y='672' xlink:href='%23b'/%3E%3Cuse x='216.207031' y='672' xlink:href='%23s'/%3E%3Cuse x='239.640625' y='672' xlink:href='%23e'/%3E%3Cuse x='258.878906' y='672' xlink:href='%23g'/%3E%3Cuse x='278.8125' y='672' xlink:href='%23j'/%3E%3Cuse x='308.492188' y='672' xlink:href='%23r'/%3E%3Cuse x='329.015625' y='672' xlink:href='%23d'/%3E%3Cuse x='342.820312' y='672' xlink:href='%23e'/%3E%3Cuse x='362.058594' y='672' xlink:href='%23q'/%3E%3Cuse x='371.65625' y='672' xlink:href='%23b'/%3E%3Cuse x='390.648438' y='672' xlink:href='%23p'/%3E%3Cuse x='407.242188' y='672' xlink:href='%23c'/%3E%3C/g%3E%3C/svg%3E");
	}
	a.frhdgs-hero-btn-pro {
		display: inline-block;
		margin-top: 5px;
		text-decoration: none;
		background: #e91e63;
		padding: 16px 24px 18px;
		border-radius: 4px;
		color: #fff;
		font-size: 19px;
		font-weight: bold;
		box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
		text-shadow: 1px 1px 8px rgb(0 0 0 / 50%);
		border: 1px solid transparent;
		transition: .3s;
	}
	a.frhdgs-hero-btn-pro:hover {
		box-shadow: rgb(0 0 0 / 44%) 0px 3px 8px;
	}
	a.frhdgs-hero-btn-pro span {
		transition: .3s;
	}
	a.frhdgs-hero-btn-pro:hover span {
		display: inline-block;
		transform: translateX(6px);
	}

	.frhdgs-upgrade-feature-list {
		display: flex;
		gap: 30px;
	}
	.frhdgs-upgrade-feature-list ul {
		flex-basis: 100%;
		padding-left: 10px;
	}

	/* Testimonials */
	.frhdgs-testimonial {
		padding: 30px;
	}
	.frhdgs-testimonial-stars:before {
		position: absolute;
		left: 22px;
		top: 22px;
		width: 91px;
		height: 17px;
		content: "";
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='16' viewBox='0 0 18 16' fill='none'%3E%3Cscript xmlns=''/%3E%3Cpath d='M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z' fill='%23FBB040'/%3E%3C/svg%3E");
	}
	.frhdgs-testimonial-column {
		position: relative;
		flex-basis: calc(50% - 62px);
		border: 1px solid rgb(103 58 183 / 15%);
		background: rgb(103 58 183 / 5%);
		padding: 25px;
		padding-top: 50px;
	}
	.frhdgs-testimonial-columns {
		display: flex;
		flex-wrap: wrap;
		gap: 20px;
	}

	.frhdgs-testimonial-client {
		display: flex;
		justify-content: left;
		align-items: center;
		gap: 15px;
	}

	.frhdgs-testimonial-client-ghost h4 {
		font-size: 17px;
		font-weight: bold;
		line-height: 20px;
		margin: 0;
	}

	.frhdgs-testimonial-client img {
		border-radius: 10px;border: 1px solid rgb(158 158 158 / 50%);
		box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
	}

	/* Responsive */
	@media (max-width: 960px) {
		.frhdgs-container-hero,
		.frhdgs-upgrade-feature-list {flex-wrap: wrap;}
		.frhdgs-container-ad {flex-basis: 100%;}
	}
    </style>
	<div class="frhdgs-option-body">
		<div class="frhdgs-container-wrap">
			<div class="frhdgs-hero-upgrade">
				<h2><span class="dashicons dashicons-superhero-alt"></span>Pro Feature List :</h2>
				<div class="frhdgs-upgrade-feature-list">
					<ul>
						<li>Fully responsive, SEO-friendly & optimized.</li>
						<li>Advanced Shortcode Generator.</li>
						<li>Advanced Shortcode Generator.</li>
						<li>Slide Anything (e.g. Image, Post, Product, Content, Video, Text, HTML, Shortcodes, etc.)</li>
						<li>Display posts from multiple Categories, Tags, Formats, or Types. (e.g. Latest, Taxonomies, Specific, etc.).</li>
						<li>Multiple Functions on the same page.</li>
						<li>Multiple Functions on the same page.</li>
						<li>100+ Visual Customization options.</li>
						<li>Drag & Drop Function builder (image, content, video, etc.).</li>
						<li>Drag & Drop Function builder (image, content, video, etc.).</li>
						<li>Image Function with internal and external links.</li>
						<li>Image Function with caption and description.</li>
					</ul>
					<ul>
						<li>Image Content Position (Bottom, Top, Right, and Overlay).</li>
						<li>Show/hide image caption and description.</li>
						<li>Post Function with Title, image, excerpt, read more, category, date, author, tags, comments, etc.).</li>
						<li>Post excerpt, full content, and content with the limit.</li>
						<li>WooCommerce Product Function.</li>
						<li>Show/hide the standard product contents (product name, image, price, excerpt, read more, rating, add to cart, etc.).</li>
						<li>Supported YouTube, Vimeo, Dailymotion, mp4, WebM, and even self-hosted video.</li>
						<li>Add Custom Video Thumbnails (for self-hosted) and video icon.</li>
						<li>Function Mode (standard, center, ticker).</li>
						<li>8+ Different navigation positions.</li>
						<li>Typography & Styling options (840+ Google fonts).</li>
					</ul>
				</div>
				<a class="frhdgs-hero-btn-pro" href="https://pluginic.com/plugins/gutenberg-post-blocks/?ref=100" target="_blank">Upgrade to Pro <span>→</span></a>
			</div>
			<div class="frhdgs-spacer" style="height: 20px;"></div>
			<div class="frhdgs-testimonial">
				<div class="frhdgs-testimonial-columns">
					<div class="frhdgs-testimonial-column">
						<span class="frhdgs-testimonial-stars"></span>
						<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
						<div class="frhdgs-testimonial-client">
							<img width="50" height="50" src="<?php echo esc_url( FPPB_URL . 'admin/img/client-1.jpg' ); ?>" alt="" class="wp-image-3273">
							<div class="frhdgs-testimonial-client-ghost">
								<h4>Roman Rybakov</h4>
								<p>Frontend Engineer</p>
							</div>
						</div>
					</div>
					<div class="frhdgs-testimonial-column">
						<span class="frhdgs-testimonial-stars"></span>
						<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
						<div class="frhdgs-testimonial-client">
							<img width="50" height="50" src="<?php echo esc_url( FPPB_URL . 'admin/img/client-2.jpg' ); ?>" alt="" class="wp-image-3273">
							<div class="frhdgs-testimonial-client-ghost">
								<h4>Roman Rybakov</h4>
								<p>Frontend Engineer</p>
							</div>
						</div>
					</div>
					<div class="frhdgs-testimonial-column">
						<span class="frhdgs-testimonial-stars"></span>
						<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
						<div class="frhdgs-testimonial-client">
							<img width="50" height="50" src="<?php echo esc_url( FPPB_URL . 'admin/img/client-3.jpg' ); ?>" alt="" class="wp-image-3273">
							<div class="frhdgs-testimonial-client-ghost">
								<h4>Roman Rybakov</h4>
								<p>Frontend Engineer</p>
							</div>
						</div>
					</div>
					<div class="frhdgs-testimonial-column">
						<span class="frhdgs-testimonial-stars"></span>
						<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
						<div class="frhdgs-testimonial-client">
							<img width="50" height="50" src="<?php echo esc_url( FPPB_URL . 'admin/img/client-4.jpg' ); ?>" alt="" class="wp-image-3273">
							<div class="frhdgs-testimonial-client-ghost">
								<h4>Roman Rybakov</h4>
								<p>Frontend Engineer</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
