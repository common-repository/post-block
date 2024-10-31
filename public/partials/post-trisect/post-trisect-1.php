<?php
$frhd_tri_aside_font_size      = ( '3' == $frhd_tri_post_set ) ? '24px' : '21px';
$frhd_tri_custom_height_render = ( true !== $frhd_tri_is_custom_height ) ? 'max-content' : $frhd_tri_custom_height;
$frhd_tri_is_reverse_post_col  = ( true !== $frhd_tri_is_reverse_post_col ) ? 'row' : 'row-reverse';
$frhd_tri_is_featured_center   = $frhd_tri_is_featured_center ? '.frhd__trisec-wrapper .frhd__trisec-col:nth-child(1){order:2;}.frhd__trisec-wrapper .frhd__trisec-col:nth-child(2){order:1;}.frhd__trisec-wrapper .frhd__trisec-col:nth-child(3){order:3;}' : '';

$frhd_tri_feature_col_bg_color     = isset( $frhd_attributes['featureColumnbgColor'] ) ? $frhd_attributes['featureColumnbgColor'] : '';
$frhd_tri_beside_col_bg_color      = isset( $frhd_attributes['besideColumnbgColor'] ) ? $frhd_attributes['besideColumnbgColor'] : '';
$frhd_tri_feature_cat_color        = isset( $frhd_attributes['featuredCategoryColor'] ) ? $frhd_attributes['featuredCategoryColor'] : '';
$frhd_tri_feature_cat_bg_color     = isset( $frhd_attributes['featuredCategorybgColor'] ) ? $frhd_attributes['featuredCategorybgColor'] : '';
$frhd_tri_beside_top_cat_color     = isset( $frhd_attributes['besidetopCategoryColor'] ) ? $frhd_attributes['besidetopCategoryColor'] : '';
$frhd_tri_beside_top_cat_bg_color      = isset( $frhd_attributes['besidetopCategorybgColor'] ) ? $frhd_attributes['besidetopCategorybgColor'] : '';
$frhd_tri_beside_bottom_cat_color      = isset( $frhd_attributes['besidebottomCategoryColor'] ) ? $frhd_attributes['besidebottomCategoryColor'] : '';
$frhd_tri_beside_bottom_cat_bg_color   = isset( $frhd_attributes['besidebottomCategorybgColor'] ) ? $frhd_attributes['besidebottomCategorybgColor'] : '';
$frhd_tri_title_color              = isset( $frhd_attributes['titleColor'] ) ? $frhd_attributes['titleColor'] : '';
$frhd_tri_exerpt_color             = isset( $frhd_attributes['exerptColor'] ) ? $frhd_attributes['exerptColor'] : '';
$frhd_tri_meta_color               = isset( $frhd_attributes['metaColor'] ) ? $frhd_attributes['metaColor'] : '';
$frhd_tri_feature_title_hover_border_color          = isset( $frhd_attributes['featuredTextDecorationColor'] ) ? $frhd_attributes['featuredTextDecorationColor'] : '';
$frhd_tri_beside_top_title_hover_border_color       = isset( $frhd_attributes['besidetopTextDecorationColor'] ) ? $frhd_attributes['besidetopTextDecorationColor'] : '';
$frhd_tri_beside_bottom_title_hover_border_color    = isset( $frhd_attributes['besidebottomTextDecorationColor'] ) ? $frhd_attributes['besidebottomTextDecorationColor'] : '';
$frhd_tri_overlay_color      = isset( $frhd_attributes['postOverlayColor'] ) ? $frhd_attributes['postOverlayColor'] : '';


echo '<style>#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper{max-height: ' . esc_attr( $frhd_tri_custom_height_render ) . ';column-gap: ' . esc_attr( $frhd_tri_col_gap ) . 'px;flex-direction:' . esc_attr( $frhd_tri_is_reverse_post_col ) . ';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . ' .frhd__trisec-featured,.frhd__trisec-aside-top,.frhd__trisec-aside-bottom{border-radius: ' . esc_attr( $frhd_tri_rounded_size ) . 'px;}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . ' .frhd__trisec-aside{row-gap: ' . esc_attr( $frhd_tri_row_gap ) . 'px;}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . ' .frhd__trisec-aside .frhd__entry-title a{font-size: ' . esc_attr( $frhd_tri_aside_font_size ) . ';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . ' .frhd__trisec-featured{background-color: '.esc_attr($frhd_tri_feature_col_bg_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . ' .frhd__trisec-featured,#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . ' .frhd__trisec-col.frhd__trisec-aside{min-height:'.esc_attr($frhd_tri_custom_height).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-aside-top, .frhd__trisec-aside-bottom {background-color: '.esc_attr($frhd_tri_beside_col_bg_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__overlay-inner {background: linear-gradient(to top, '.esc_attr($frhd_tri_overlay_color).' 0, rgb(25 28 32 / 95%) calc(100% - 150px), rgb(25 28 32 / 0%) 100%);}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__entry-title a {color: '.esc_attr($frhd_tri_title_color).' !important;}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__overlay-inner p {color: '.esc_attr($frhd_tri_exerpt_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper time.frhd__post-date {color: '.esc_attr($frhd_tri_meta_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . ' .frhd__trisec-featured .frhd__categories a {color: '.esc_attr($frhd_tri_feature_cat_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . ' .frhd__trisec-featured .frhd__categories a:before {background-color: '.esc_attr($frhd_tri_feature_cat_bg_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__trisec-aside-top .frhd__categories a {color: '.esc_attr($frhd_tri_beside_top_cat_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__trisec-aside-top .frhd__categories a:before {background-color: '.esc_attr($frhd_tri_beside_top_cat_bg_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__trisec-aside-bottom .frhd__categories a {color: '.esc_attr($frhd_tri_beside_bottom_cat_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__trisec-aside-bottom .frhd__categories a:before {background-color: '.esc_attr($frhd_tri_beside_bottom_cat_bg_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__trisec-featured .frhd__entry-title a:hover {text-decoration-color: '.esc_attr($frhd_tri_feature_title_hover_border_color).' !important;}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__trisec-aside-top .frhd__entry-title a:hover {text-decoration-color: '.esc_attr($frhd_tri_beside_top_title_hover_border_color).'!important;}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper .frhd__trisec-aside-bottom .frhd__entry-title a:hover {text-decoration-color: '.esc_attr($frhd_tri_beside_bottom_title_hover_border_color).' !important;}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '.frhd__trisec-wrapper time.frhd__post-date svg {fill: '.esc_attr($frhd_tri_meta_color).';}#frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . esc_attr( $frhd_tri_is_featured_center ) . 
'</style>';

echo '<div id="frhd__block-id-' . esc_attr( $frhd_tri_block_id ) . '" class="frhd__trisec-wrapper">';

while ( $frhd_post_query->have_posts() ) {

    $frhd_post_query->the_post();

    /**
        * Thumbnail.
        */
    $frhd_thumb_id = get_post_thumbnail_id( get_the_ID() );
    if ( $frhd_thumb_id ) {

        $frhd_featured_thumb_attach = wp_get_attachment_image_src( $frhd_thumb_id, $frhd_tri_feat_thumb_size );
        $frhd_aside_thumb_attach    = wp_get_attachment_image_src( $frhd_thumb_id, $frhd_tri_asd_thumb_size );
        $frhd_thumb_alt             = get_post_meta( $frhd_thumb_id, '_wp_attachment_image_alt', true );
        if ( empty( $frhd_thumb_alt ) ) {

            $frhd_thumb_alt = get_the_title();
        }
    }

    /**
    * Get Category IDs.
    */
    $frhd_category_name = get_the_category( get_the_ID() );

    if ( 0 == $frhd_post_query->current_post ) {

        $frhd_excerpt_trimed = wp_trim_words( get_the_excerpt(), $frhd_tri_excerpt_size, '...' );

        echo '<div class="frhd__trisec-col frhd__trisec-featured">';
        if ( ! empty( $frhd_featured_thumb_attach ) ) {

            echo '<img class="frhd__tri-thumb" width="' . esc_attr( $frhd_featured_thumb_attach[1] ) . '" height="' . esc_attr( $frhd_featured_thumb_attach[2] ) . '" src="' . esc_url( $frhd_featured_thumb_attach[0] ) . '" alt="' . esc_attr( $frhd_thumb_alt ) . '" loading="lazy">';
        }
        echo '<div class="frhd__overlay-wrap">
                <div class="frhd__overlay-inner">
                    <div class="frhd__categories">';
                    foreach ( $frhd_category_name as $frhd_category ) {

                        echo '<a href="' . esc_url( get_category_link( $frhd_category->cat_ID ) ) . '" rel="category">' . esc_html( $frhd_category->cat_name ) . '</a>';
                    }
                    echo '</div>
                    <h2 class="frhd__entry-title">
                        <a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
                    </h2>
                    <p>' . esc_html( $frhd_excerpt_trimed ) . '</p>
                    <time class="frhd__post-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg>' . esc_html( get_the_date() ) . '</time>
                </div>
            </div>
        </div>
        <div class="frhd__trisec-col frhd__trisec-aside">';

    } elseif ( 1 == $frhd_post_query->current_post ) {

        echo '<div class="frhd__trisec-aside-top">';
        if ( ! empty( $frhd_aside_thumb_attach ) ) {
            echo '<img class="frhd__tri-thumb" width="' . esc_attr( $frhd_aside_thumb_attach[1] ) . '" height="' . esc_attr( $frhd_aside_thumb_attach[2] ) . '" src="' . esc_url( $frhd_aside_thumb_attach[0] ) . '" alt="' . esc_attr( $frhd_thumb_alt ) . '" loading="lazy">';
        }
        echo '<div class="frhd__overlay-wrap">
                <div class="frhd__overlay-inner">';
                if ( array_filter($frhd_category_name) ) {

                    echo '<div class="frhd__categories">
                        <a href="' . esc_url( get_category_link( $frhd_category_name[0]->cat_ID ) ) . '" rel="category">' . esc_html( $frhd_category_name[0]->cat_name ) . '</a>
                    </div>';
                }
                echo '<h2 class="frhd__entry-title">
                        <a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
                    </h2>
                    <time class="frhd__post-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg>' . esc_html( get_the_date() ) . '</time>
                </div>
            </div>
        </div>';

    } elseif ( 2 == $frhd_post_query->current_post ) {

        echo '<div class="frhd__trisec-aside-bottom">';
        if ( ! empty( $frhd_aside_thumb_attach ) ) {
            echo '<img class="frhd__tri-thumb" width="' . esc_attr( $frhd_aside_thumb_attach[1] ) . '" height="' . esc_attr( $frhd_aside_thumb_attach[2] ) . '" src="' . esc_url( $frhd_aside_thumb_attach[0] ) . '" alt="' . esc_attr( $frhd_thumb_alt ) . '" loading="lazy">';
        }
        echo '<div class="frhd__overlay-wrap">
                <div class="frhd__overlay-inner">';
                if ( array_filter($frhd_category_name) ) {

                    echo '<div class="frhd__categories">
                        <a href="' . esc_url( get_category_link( $frhd_category_name[0]->cat_ID ) ) . '" rel="category">' . esc_html( $frhd_category_name[0]->cat_name ) . '</a>
                    </div>';
                }
                echo '<h2 class="frhd__entry-title">
                        <a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
                    </h2>
                    <time class="frhd__post-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg>' . esc_html( get_the_date() ) . '</time>
                </div>
            </div>
        </div>
    </div>';

    } elseif ( 3 == $frhd_post_query->current_post ) {

        echo '<div class="frhd__trisec-col frhd__trisec-aside">
            <div class="frhd__trisec-aside-top">
                <img class="frhd__tri-thumb" width="' . esc_attr( $frhd_aside_thumb_attach[1] ) . '" height="' . esc_attr( $frhd_aside_thumb_attach[2] ) . '" src="' . esc_url( $frhd_aside_thumb_attach[0] ) . '" alt="' . esc_attr( $frhd_thumb_alt ) . '" loading="lazy">
                <div class="frhd__overlay-wrap">
                    <div class="frhd__overlay-inner">';
                    if ( ! empty( $frhd_category_name ) ) {
                        echo '<div class="frhd__categories">
                            <a href="' . esc_url( get_category_link( $frhd_category_name[0]->cat_ID ) ) . '" rel="category">' . esc_html( $frhd_category_name[0]->cat_name ) . '</a>
                        </div>';
                    }
                    echo '<h2 class="frhd__entry-title">
                            <a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
                        </h2>
                        <time class="frhd__post-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg>' . esc_html( get_the_date() ) . '</time>
                    </div>
                </div>
            </div>';

    } else {

        echo '<div class="frhd__trisec-aside-bottom">
            <img class="frhd__tri-thumb" width="' . esc_attr( $frhd_aside_thumb_attach[1] ) . '" height="' . esc_attr( $frhd_aside_thumb_attach[2] ) . '" src="' . esc_url( $frhd_aside_thumb_attach[0] ) . '" alt="' . esc_attr( $frhd_thumb_alt ) . '" loading="lazy">
            <div class="frhd__overlay-wrap">
                <div class="frhd__overlay-inner">';
                if ( $frhd_category_name ) {

                    echo '<div class="frhd__categories">
                        <a href="' . esc_url( get_category_link( $frhd_category_name[0]->cat_ID ) ) . '" rel="category">' . esc_html( $frhd_category_name[0]->cat_name ) . '</a>
                    </div>';
                }
                echo '<h2 class="frhd__entry-title">
                        <a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
                    </h2>
                    <time class="frhd__post-date" datetime="' . esc_attr( get_the_date( 'c' ) ) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg>' . esc_html( get_the_date() ) . '</time>
                </div>
            </div>
        </div>
        </div>';
    }
}

wp_reset_postdata();

echo '</div>'; // frhd__trisec-wrapper.
