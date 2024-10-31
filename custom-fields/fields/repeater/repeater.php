<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: repeater
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'FPBLOCK_Field_repeater' ) ) {
  class FPBLOCK_Field_repeater extends FPBLOCK_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'max'          => 0,
        'min'          => 0,
        'button_title' => '<i class="fas fa-plus-circle"></i>',
      ) );

      if ( preg_match( '/'. preg_quote( '['. $this->field['id'] .']' ) .'/', $this->unique ) ) {

        echo '<div class="fpblock-notice fpblock-notice-danger">'. esc_html__( 'Error: Field ID conflict.', 'fpblock' ) .'</div>';

      } else {

        echo $this->field_before();

        echo '<div class="fpblock-repeater-item fpblock-repeater-hidden" data-depend-id="'. esc_attr( $this->field['id'] ) .'">';
        echo '<div class="fpblock-repeater-content">';
        foreach ( $this->field['fields'] as $field ) {

          $field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
          $field_unique  = ( ! empty( $this->unique ) ) ? $this->unique .'['. $this->field['id'] .'][0]' : $this->field['id'] .'[0]';

          FPBLOCK::field( $field, $field_default, '___'. $field_unique, 'field/repeater' );

        }
        echo '</div>';
        echo '<div class="fpblock-repeater-helper">';
        echo '<div class="fpblock-repeater-helper-inner">';
        echo '<i class="fpblock-repeater-sort fas fa-arrows-alt"></i>';
        echo '<i class="fpblock-repeater-clone far fa-clone"></i>';
        echo '<i class="fpblock-repeater-remove fpblock-confirm fas fa-times" data-confirm="'. esc_html__( 'Are you sure to delete this item?', 'fpblock' ) .'"></i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '<div class="fpblock-repeater-wrapper fpblock-data-wrapper" data-field-id="['. esc_attr( $this->field['id'] ) .']" data-max="'. esc_attr( $args['max'] ) .'" data-min="'. esc_attr( $args['min'] ) .'">';

        if ( ! empty( $this->value ) && is_array( $this->value ) ) {

          $num = 0;

          foreach ( $this->value as $key => $value ) {

            echo '<div class="fpblock-repeater-item">';
            echo '<div class="fpblock-repeater-content">';
            foreach ( $this->field['fields'] as $field ) {

              $field_unique = ( ! empty( $this->unique ) ) ? $this->unique .'['. $this->field['id'] .']['. $num .']' : $this->field['id'] .'['. $num .']';
              $field_value  = ( isset( $field['id'] ) && isset( $this->value[$key][$field['id']] ) ) ? $this->value[$key][$field['id']] : '';

              FPBLOCK::field( $field, $field_value, $field_unique, 'field/repeater' );

            }
            echo '</div>';
            echo '<div class="fpblock-repeater-helper">';
            echo '<div class="fpblock-repeater-helper-inner">';
            echo '<i class="fpblock-repeater-sort fas fa-arrows-alt"></i>';
            echo '<i class="fpblock-repeater-clone far fa-clone"></i>';
            echo '<i class="fpblock-repeater-remove fpblock-confirm fas fa-times" data-confirm="'. esc_html__( 'Are you sure to delete this item?', 'fpblock' ) .'"></i>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            $num++;

          }

        }

        echo '</div>';

        echo '<div class="fpblock-repeater-alert fpblock-repeater-max">'. esc_html__( 'You cannot add more.', 'fpblock' ) .'</div>';
        echo '<div class="fpblock-repeater-alert fpblock-repeater-min">'. esc_html__( 'You cannot remove more.', 'fpblock' ) .'</div>';
        echo '<a href="#" class="button button-primary fpblock-repeater-add">'. $args['button_title'] .'</a>';

        echo $this->field_after();

      }

    }

    public function enqueue() {

      if ( ! wp_script_is( 'jquery-ui-sortable' ) ) {
        wp_enqueue_script( 'jquery-ui-sortable' );
      }

    }

  }
}
