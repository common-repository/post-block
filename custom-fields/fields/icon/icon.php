<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: icon
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'FPBLOCK_Field_icon' ) ) {
  class FPBLOCK_Field_icon extends FPBLOCK_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'button_title' => esc_html__( 'Add Icon', 'fpblock' ),
        'remove_title' => esc_html__( 'Remove Icon', 'fpblock' ),
      ) );

      echo $this->field_before();

      $nonce  = wp_create_nonce( 'fpblock_icon_nonce' );
      $hidden = ( empty( $this->value ) ) ? ' hidden' : '';

      echo '<div class="fpblock-icon-select">';
      echo '<span class="fpblock-icon-preview'. esc_attr( $hidden ) .'"><i class="'. esc_attr( $this->value ) .'"></i></span>';
      echo '<a href="#" class="button button-primary fpblock-icon-add" data-nonce="'. esc_attr( $nonce ) .'">'. $args['button_title'] .'</a>';
      echo '<a href="#" class="button fpblock-warning-primary fpblock-icon-remove'. esc_attr( $hidden ) .'">'. $args['remove_title'] .'</a>';
      echo '<input type="hidden" name="'. esc_attr( $this->field_name() ) .'" value="'. esc_attr( $this->value ) .'" class="fpblock-icon-value"'. $this->field_attributes() .' />';
      echo '</div>';

      echo $this->field_after();

    }

    public function enqueue() {
      add_action( 'admin_footer', array( 'FPBLOCK_Field_icon', 'add_footer_modal_icon' ) );
      add_action( 'customize_controls_print_footer_scripts', array( 'FPBLOCK_Field_icon', 'add_footer_modal_icon' ) );
    }

    public static function add_footer_modal_icon() {
    ?>
      <div id="fpblock-modal-icon" class="fpblock-modal fpblock-modal-icon hidden">
        <div class="fpblock-modal-table">
          <div class="fpblock-modal-table-cell">
            <div class="fpblock-modal-overlay"></div>
            <div class="fpblock-modal-inner">
              <div class="fpblock-modal-title">
                <?php esc_html_e( 'Add Icon', 'fpblock' ); ?>
                <div class="fpblock-modal-close fpblock-icon-close"></div>
              </div>
              <div class="fpblock-modal-header">
                <input type="text" placeholder="<?php esc_html_e( 'Search...', 'fpblock' ); ?>" class="fpblock-icon-search" />
              </div>
              <div class="fpblock-modal-content">
                <div class="fpblock-modal-loading"><div class="fpblock-loading"></div></div>
                <div class="fpblock-modal-load"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }

  }
}
