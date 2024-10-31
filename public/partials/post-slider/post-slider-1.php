<?php
// Data Attributes.
$frhd_slider_data_params = array(
    'start'        => $frhd_sl_init_index,
    'perPage'      => $frhd_sl_per_page,
    'gap'          => $frhd_sl_col_gap,
    'perMove'      => $frhd_sl_per_move,
    'autoplay'     => $frhd_sl_autoplay,
    'speed'        => $frhd_sl_speed,
    'interval'     => $frhd_sl_interval,
    'rewind'       => $frhd_sl_rewind,
    'arrows'       => $frhd_sl_show_arrows,
    'pagination'   => $frhd_sl_show_pagin,
    'drag'         => $frhd_sl_draggable,
    'pauseOnHover' => $frhd_sl_pause_on_hover,
    'direction'    => $frhd_sl_direction,
);
echo '<style>
section.frhd-sl-block-main {
    max-width: ' . $frhd_fp_slider_width . ' !important;
}
#frhd-sl-block-' . $frhd_fp_slider_id . ' .example--example {width: ' . $frhd_fp_slider_width . ';}



section.frhd-sl-block-main .splide__list {
    padding: 4px 0 !important;
}
article.frhd__slider-inner-wrap a {
    text-decoration: none !important;
}
article.frhd__slider-inner-wrap {
    text-align: center;
    height: 100%;
    box-shadow: rgb(50 50 93 / 25%) 0px 2px 5px -1px, rgb(0 0 0 / 30%) 0px 1px 3px -1px;
    position: relative;
}
.frhd__post-slider-image img {
    display: block;
    width: 100%;
    max-height: 220px;
    object-fit: cover;
}
article.frhd__slider-inner-wrap .frhd__cat-wrap a {
    display: inline-block;
    background: #f1f1f1;
    padding: 7px 17px;
    border-radius: 50px;
    color: #222;
    font-size: 16px;
    line-height: 16px;
    transition: .3s;
}
article.frhd__slider-inner-wrap .frhd__cat-wrap {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
article.frhd__slider-inner-wrap .frhd__cat-wrap a:hover {
    background: #FFC107;
}
.frhd__sl-post-title {
    font-size: 22px !important;
    line-height: 28px !important;
    font-weight: bold;
    margin: 15px 0 10px !important;
}
.frhd__sl-post-title a {
    color: #3B4856;
}
.frhd__slider-content {
    padding: 20px 20px 50px;
}
.frhd__slider-content .frhd__post-slider-rmbtn {
    display: inline-block;
    border: 1px solid #000;
    padding: 5px 20px;
    color: #000;
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
}
.frhd__slider-content .frhd__post-slider-rmbtn:hover {
    background: #000;
    color: #fff;
}
.frhd-sl-block-main .splide__arrow svg {
    fill: #000;
    height: 18px;
    width: 18px;
    padding: 2px;
}
.frhd-sl-block-main .splide__arrow:hover,
.frhd-sl-block-main .splide__arrow:focus,
.frhd-sl-block-main .splide__pagination__page:hover,
.frhd-sl-block-main .splide__pagination__page.is-active {
    background: #000;
}
.frhd-sl-block-main .splide__arrow:hover svg,
.frhd-sl-block-main .splide__arrow:focus svg {
    fill: #fff;
}
.frhd-sl-block-main .splide__pagination {
    bottom: -55px;
}
</style>
<section class="frhd-sl-block-main" data-side="front" data-params="' . htmlspecialchars(json_encode($frhd_slider_data_params), ENT_QUOTES, 'UTF-8') . '">
    <div id="frhd-sl-block-' . $frhd_fp_slider_id . '" class="splide" aria-label="' . $frhd_sl_aria_label . '">
        <div class="splide__track">
            <ul class="splide__list">';
            while ( $frhd_post_query_slider->have_posts() ) {

                $frhd_post_query_slider->the_post();

                // Getting feature images.
                $frhd_thumb_id     = get_post_thumbnail_id( get_the_ID() );
                $frhd_thumb_attach = wp_get_attachment_image_src( $frhd_thumb_id, 'full' );
                $frhd_thumb_alt    = empty( get_post_meta( $frhd_thumb_id, '_wp_attachment_image_alt', true ) ) ? get_the_title() : get_post_meta( $frhd_thumb_id, '_wp_attachment_image_alt', true );

                // Getting Categories
                $frhd_post_slider_cat_name = get_the_category( get_the_ID() );

                // Getting trimed excerpt.
                $frhd_excerpt_trimed = wp_trim_words( get_the_excerpt(), 30, '...' );

                echo '<li class="splide__slide">';
                
                echo '<article class="frhd__slider-inner-wrap">';
                
                if ( $frhd_thumb_attach ) {

                    echo '<div class="frhd__post-slider-image">
                        <img width="' . esc_attr( $frhd_thumb_attach[1] ) . '" height="' . esc_attr( $frhd_thumb_attach[2] ) . '" src="' . esc_url( $frhd_thumb_attach[0] ) . '" alt="' . esc_attr( $frhd_thumb_alt ) . '" loading="lazy">
                    </div>';
                }

                echo '<div class="frhd__slider-content">
                <div class="frhd__cat-wrap">';
                foreach ( $frhd_post_slider_cat_name as $frhd_category ) {

                    if ( strtolower( $frhd_category->cat_name ) !== 'uncategorized' ) {

                        echo '<span class="frhd__slider-cat-name">
                            <a href="' . esc_url( get_category_link( $frhd_category->cat_ID ) ) . '">' . esc_html( $frhd_category->cat_name ) . '</a>
                        </span>';
                    }
                }
                echo '</div>';

                echo '<' . $frhd_post_title_tag . ' class="frhd__sl-post-title"><a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></' . $frhd_post_title_tag . '>';

                echo '<div class="frhd__post-slider-excerpt">' . wpautop( $frhd_excerpt_trimed ) . '</div>';

                echo '<a class="frhd__post-slider-rmbtn" href="' . esc_url( get_the_permalink() ) . '">' . $frhd_readmore_btn_txt . '</a>';
                
                echo '</div>
                    </article>
                </li>';
            }
            wp_reset_postdata();
            ?>
            </ul>
        </div>
    </div>
</section>
