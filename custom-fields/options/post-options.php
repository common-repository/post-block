<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Metabox of the POST
// Set a unique slug-like ID
//
$frhd_fp_post_opts = '_frhd_fp_post_options';

//
// Create a metabox
//
FPBLOCK::createMetabox( $frhd_fp_post_opts, array(
  'title'        => '<img src="' . FPPB_URL . '/admin/img/plugin-logo.png">Single Template Settings',
  'post_type'    => 'post',
  'context'      => 'side',
  'show_restore' => false,
) );

//
// Create a section
//
FPBLOCK::createSection( $frhd_fp_post_opts, array(
  'fields' => array(
    array(
      'id'         => 'frhd_fp_single_post_styles',
      'type'       => 'content',
      'content'    => '<style>
      .fpblock-field.frhd_fp_single_post_styles {
          display: none;
      }
      #_frhd_fp_post_options h2.hndle {
          display: flex;
          gap: 8px;
          padding: 0 !IMPORTANT;
          justify-content: center;
      }
      #_frhd_fp_post_options h2.hndle img {
          max-width: 20px;
          height: auto;
          filter: drop-shadow(0px 0px 1px gray);
      }
      #_frhd_fp_post_options .postbox-header {
          background-image: linear-gradient(240.75deg,#e9def0 -7.54%,#fcfdfd 55.54%,#dde8fc 101.81%);
      }
      </style>',
      'class'       => 'frhd_fp_single_post_styles',
    ),
    array(
      'id'          => 'frhd_fp_user',
      'type'        => 'select',
      'title'       => 'Select a Reviewer',
      'placeholder' => 'Type an user name',
      'chosen'      => true,
      'ajax'        => true,
      'options'     => 'users',
    ),
    array(
      'id'         => 'frhd_fp_badge',
      'type'       => 'text',
      'title'      => 'Badge Text',
      'default'    => 'REVIEWED',
      'dependency' => array( 'frhd_fp_user', '!=', '' ),
    ),
    array(
      'id'         => 'frhd_fp_role',
      'type'       => 'text',
      'title'      => 'User Role in This Content',
      'after'      => '<span style="color: #a3a3a3;">Leave this field empty to show designation from user edit admin area.</span>',
      'default'    => 'Content Team Lead',
      'dependency' => array( 'frhd_fp_user', '!=', '' ),
    ),
    array(
      'id'         => 'frhd_fp_crown_on',
      'type'       => 'checkbox',
      'label'      => 'Wearing a crown',
      'default'    => false,
      'dependency' => array( 'frhd_fp_user', '!=', '' ),
    ),
    array(
      'id'      => 'frhd_fp_show_featured_image',
      'type'    => 'checkbox',
      'label'   => 'Show featured image in the posts lists only, but hide it in the single post view.',
      'default' => false,
    ),
  )
) );
