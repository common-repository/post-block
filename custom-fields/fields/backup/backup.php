<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'FPBLOCK_Field_backup' ) ) {
  class FPBLOCK_Field_backup extends FPBLOCK_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $unique = $this->unique;
      $nonce  = wp_create_nonce( 'fpblock_backup_nonce' );
      $export = add_query_arg( array( 'action' => 'fpblock-export', 'unique' => $unique, 'nonce' => $nonce ), admin_url( 'admin-ajax.php' ) );

      echo $this->field_before();

      echo '<textarea name="fpblock_import_data" class="fpblock-import-data"></textarea>';
      echo '<button type="submit" class="button button-primary fpblock-confirm fpblock-import" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Import', 'fpblock' ) .'</button>';
      echo '<hr />';
      echo '<textarea readonly="readonly" class="fpblock-export-data">'. esc_attr( json_encode( get_option( $unique ) ) ) .'</textarea>';
      echo '<a href="'. esc_url( $export ) .'" class="button button-primary fpblock-export" target="_blank">'. esc_html__( 'Export & Download', 'fpblock' ) .'</a>';
      echo '<hr />';
      echo '<button type="submit" name="fpblock_transient[reset]" value="reset" class="button fpblock-warning-primary fpblock-confirm fpblock-reset" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Reset', 'fpblock' ) .'</button>';

      echo $this->field_after();

    }

  }
}
