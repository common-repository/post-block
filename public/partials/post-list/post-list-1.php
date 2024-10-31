<?php
echo '<style>
 
</style>';

echo '<div id="frhd__block-id-' .esc_attr($frhd_postlist_block_id). '" class="frhd__post-list-container">';
while ( $frhd_post_query->have_posts() ) {

    $frhd_post_query->the_post();

    /**
        * Thumbnail.
        */
    $frhd_thumb_id = get_post_thumbnail_id( get_the_ID() );
    if ( $frhd_thumb_id ) {

        $frhd_featured_thumb_attach = wp_get_attachment_image_src( $frhd_thumb_id, 'full' );
        $frhd_aside_thumb_attach    = wp_get_attachment_image_src( $frhd_thumb_id, 'thumbnail' );
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
        echo '<article class="frhd__post-list-1">';
            echo '<div class="frhd__featured-image-postlist details">';
            if (!empty($frhd_featured_thumb_attach)) {
                echo '<img class="frhd__postlist-thumb" width="' . esc_attr($frhd_featured_thumb_attach[1]) . '" height="' . esc_attr($frhd_featured_thumb_attach[2]) . '" src="' . esc_url($frhd_featured_thumb_attach[0]) . '" alt="' . esc_attr($frhd_thumb_alt) . '" loading="lazy">';
            }else echo '<span class="frhd__featured-image-postlist-missing"></span>';
            echo '<div class="postlist-overlay">';
               echo '</div>';
                 echo '<div class="postlist-content">';
                       echo '<div class="content-child">';
    
                            echo '<div class="frhd__post-title-postlist">';
                                  echo '<h2 class="frhd__entry-title-postlist">
                                  <a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
                                  </h2>';
                            echo '</div>';
    
                            echo '<div class="frhd__post-meta">';
    
		    					     echo '<span class="frhd__post-author"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path></svg>';
		    					     echo the_author_posts_link();
		    					     echo '</span>';
       
                                      echo '<time class="frhd__post-date" datetime="' . esc_attr(get_the_date('c')) . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg>' . esc_html(get_the_date()) . '</time>';
                                      echo '<span>';
                                      echo '</span>';
    
                            echo '</div>';
                        echo '</div>';
                 echo '</div>';
              echo '</div>';
         echo '</article>';
            
     } else {
      echo '<article class="frhd__post-list-1">';
      echo '<div class="frhd-blog-container">';
      echo '<div class="frhd-blog-content">';
      echo '<div class="frhd__featured-image-postlist blog-img">';
      if (!empty($frhd_aside_thumb_attach)) {
          echo '<img class="frhd__postlist-thumb" width="' . esc_attr($frhd_aside_thumb_attach[1]) . '" height="' . esc_attr($frhd_aside_thumb_attach[2]) . '" src="' . esc_url($frhd_featured_thumb_attach[0]) . '" alt="' . esc_attr($frhd_thumb_alt) . '" loading="lazy">';
      }else echo '<span class="frhd__featured-image-postlist-missing"></span>';
      echo '</div>';
      echo '<div class="frhd__post-title-postlist">';
      echo '<h4><a href="' . esc_url(get_the_permalink()) . '">' . esc_html(get_the_title()) . '</a></h4>';
      echo '<span>';
      echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path>
      </svg>';
      echo get_the_date();
      echo '</span>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</article>';
    }
}
wp_reset_postdata();
echo '</div>'; // frhd__post-list-wrapper.

?>