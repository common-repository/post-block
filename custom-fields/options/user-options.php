<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$fpblock_prefix = '_frhd_fp_user_options';

//
// Create profile options
//
FPBLOCK::createProfileOptions(
	$fpblock_prefix,
	array(
		'data_type' => 'serialize',
	)
);

//
// Create a section
//
FPBLOCK::createSection(
	$fpblock_prefix,
	array(
		'title'  => '<img src="' . FPPB_URL . '/admin/img/plugin-logo.png">Custom Profile Options :',
		'fields' => array(

			/**
			 * Styles for this page only.
			 */
			array(
				'type'    => 'content',
				'content' => '<style>.frhd-pb-profile-opt-styles{display:none;}
				.fpblock.fpblock-profile-options h2 {
					background-image: linear-gradient(240.75deg,#e9def0 -7.54%,#fcfdfd 55.54%,#dde8fc 101.81%);
					display: flex;
					align-items: center;
					gap: 20px;
					font-size: 22px;
					font-weight: bold;
					padding: 20px;
					color: #484848;
					text-shadow: 1px 1px 1px #c9c9c9;
				}
				.fpblock.fpblock-profile-options h2 img {
					max-width: 40px;
					height: auto;
					filter: drop-shadow(1px 1px 1px gray);
				}</style>',
				'class'   => 'frhd-pb-profile-opt-styles',
			),

			/**
			 * Fields.
			 */
			array(
				'id'       => 'frhd_pb_profile_img_from',
				'type'     => 'button_set',
				'before'   => '<span id="frhd-fp-targeted-to-scroll"></span>',
				'title'    => __( 'Author Profile Picture From', 'post-block' ),
				'subtitle' => __( 'Set the author profile picture image source from.', 'post-block' ),
				'options'  => array(
					'default'       => 'Default',
					'media_library' => 'Media Library',
				),
				'default'  => 'default',
			),
			array(
				'id'         => 'frhd_pb_profile_img',
				'type'       => 'media',
				'title'      => __( 'Set The Image.', 'post-block' ),
				'subtitle'   => __( 'Set the author profile picture image from media library.<br>Maximum Width and Height is 60x60', 'post-block' ),
				'library'    => 'image',
				'url'        => false,
				'dependency' => array( 'frhd_pb_profile_img_from', '==', 'media_library' ),
			),

			array(
				'id'       => 'frhd_pb_auth_name_from',
				'type'     => 'button_set',
				'title'    => __( 'Author Name From', 'post-block' ),
				'subtitle' => __( 'Set the author name from.', 'post-block' ),
				'options'  => array(
					'default' => 'Default',
					'custom'  => 'Custom',
				),
				'default'  => 'default',
			),
			array(
				'id'         => 'frhd_pb_auth_name',
				'type'       => 'text',
				'title'      => __( 'Author Name', 'post-block' ),
				'subtitle'   => __( 'Set an custom author name.', 'post-block' ),
				'dependency' => array( 'frhd_pb_auth_name_from', '==', 'custom' ),
			),

			array(
				'id'            => 'frhd_pb_auth_designation',
				'type'          => 'wp_editor',
				'before'        => '<span id="frhd-targeted-des-to-scroll"></span>',
				'title'         => __( 'Author Designation', 'post-block' ),
				'subtitle'      => __( 'Set author designation.', 'post-block' ),
				'media_buttons' => false,
				'height'        => '50px',
				'tinymce'       => false,
				'default'       => 'Content Writer',
			),

			array(
				'id'       => 'frhd_pb_auth_bio_from',
				'type'     => 'button_set',
				'title'    => __( 'Author Bio From', 'post-block' ),
				'subtitle' => __( 'Set the author bio from.', 'post-block' ),
				'options'  => array(
					'default' => 'Default',
					'custom'  => 'Custom',
				),
				'default'  => 'default',
			),
			array(
				'id'         => 'frhd_pb_auth_bio',
				'type'       => 'wp_editor',
				'title'      => __( 'Author Bio', 'post-block' ),
				'subtitle'   => __( 'Set custom author bio.', 'post-block' ),
				'dependency' => array( 'frhd_pb_auth_bio_from', '==', 'custom' ),
			),

			array(
				'id'       => 'frhd_pb_auth_bio_limit_count',
				'type'     => 'number',
				'title'    => __( 'Author Bio Word Limit', 'post-block' ),
				'subtitle' => __( 'Set word limit of the author bio.', 'post-block' ),
				'default'  => 25,
			),
			array(
				'id'       => 'frhd_pb_socials',
				'type'     => 'repeater',
				'title'    => __( 'Author Socials', 'author-on-hover' ),
				'subtitle' => __( 'Set author socials and links.', 'author-on-hover' ),
				'fields'   => array(
					array(
						'id'   => 'frhd_pb_social_icon',
						'type' => 'icon',
					),

					array(
						'id'   => 'frhd_pb_social_link',
						'type' => 'text',
					),
				),
				'default'  => array(
					array(
						'frhd_pb_social_icon' => 'fas fa-globe',
						'frhd_pb_social_link' => 'https://forhad.net/',
					),
					array(
						'frhd_pb_social_icon' => 'fab fa-facebook-f',
						'frhd_pb_social_link' => 'https://facebook.com/pluginic/',
					),
					array(
						'frhd_pb_social_icon' => 'fab fa-linkedin-in',
						'frhd_pb_social_link' => 'https://www.linkedin.com/company/pluginic/',
					),
				),
			),
		),
	)
);
