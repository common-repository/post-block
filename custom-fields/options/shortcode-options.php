<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Metabox of the POST
// Set a unique slug-like ID
//
$frhd_fp_shortcode_prefix = '_frhd_shortcode_block_opt';

//
// Create a metabox
//
FPBLOCK::createMetabox(
  $frhd_fp_shortcode_prefix,
  array(
    'title'     => '<img src="' . FPPB_URL . '/admin/img/plugin-logo.png">Block Shortcode :',
    'post_type' => 'frhdfp_blocks',
    'class'     => 'frhdfp-shortcode-postbox',
  )
);

//
// Create a section
//
FPBLOCK::createSection( $frhd_fp_shortcode_prefix, array(
  'fields' => array(
    array(
      'id'         => 'frhd_fp_single_post_styles',
      'type'       => 'content',
      'content'    => '<style>
      .fpblock-field.frhd_fp_single_post_styles,
      #_frhd_shortcode_block_opt button.handlediv,
      #nri-slug-wrapper {
        display: none;
      }
      #_frhd_shortcode_block_opt .postbox-header {
        background-image: linear-gradient(240.75deg,#e9def0 -7.54%,#fcfdfd 55.54%,#dde8fc 101.81%);
        padding: 20px;
      }
      #_frhd_shortcode_block_opt .inside {
        background-image: linear-gradient(240.75deg,#e9def0 -7.54%,#fcfdfd 55.54%,#dde8fc 101.81%);
      }
      #_frhd_shortcode_block_opt .postbox-header h2 {
        display: flex;
        justify-content: left;
        gap: 20px;
        font-size: 24px;
        font-weight: bold !important;
        pointer-events: none;
      }
      #_frhd_shortcode_block_opt .postbox-header h2 img {
        max-width: 40px;
        filter: drop-shadow(1px 1px 1px black);
      }
      /* Shortcode */
      .fpblock-shortcode-btn svg {
          width: 12px;
          height: auto;
          padding: 3px;
          display: inline-block;
      }
      .fpblock-shortcode-input-group {
          display: flex;
          align-items: center;
          gap: 5px;
      }
      span.fpblock-shortcode-input-group-button {
          display: flex;
          align-items: center;
          gap: 5px;
      }
      .fpblock-shortcode-btn {
          display: flex;
          align-items: center;
          gap: 2px;
      }
      .fpblock-shortcode-btn:hover {
          cursor: pointer;
      }
      </style>',
      'class'       => 'frhd_fp_single_post_styles',
    ),
    array(
      'type'  => 'shortcode',
      'class' => 'frhdfp-shortcode-field',
    ),
  )
) );
