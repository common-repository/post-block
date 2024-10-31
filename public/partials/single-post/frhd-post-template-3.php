<?php
wp_head();
// Getting Admin Options.
$fpblock_admin_opt_root      = get_option( '_fpblock_options' );
$fpblock_smooth_scroll_show  = isset( $fpblock_admin_opt_root['fpblock_smooth_scroll_show'] ) ? $fpblock_admin_opt_root['fpblock_smooth_scroll_show'] : '';
$fpblock_email_nl_show       = isset( $fpblock_admin_opt_root['fpblock_email_nl_show'] ) ? $fpblock_admin_opt_root['fpblock_email_nl_show'] : '';
$fpblock_email_shortcode     = isset( $fpblock_admin_opt_root['fpblock_email_shortcode'] ) ? $fpblock_admin_opt_root['fpblock_email_shortcode'] : '';
$fpblock_css_for_single_page = isset( $fpblock_admin_opt_root['fpblock_css_for_single_page'] ) ? $fpblock_admin_opt_root['fpblock_css_for_single_page'] : '';
$fpblock_toc_counter         = isset( $fpblock_admin_opt_root['fpblock_toc_counter'] ) ? $fpblock_admin_opt_root['fpblock_toc_counter'] : '';

/**
 * Get Theme Name.
 * Roar individual theme name.
 */
$frhd_theme_obj  = wp_get_theme();
$frhd_theme_name = $frhd_theme_obj->get( 'Name' );
if ( 'Twenty Twenty-Four' !== $frhd_theme_name ) {

  get_header();
}
echo '<!-- FancyPost Developed by WP Forhad - https://forhad.net/ -->';
// wp_enqueue_style( 'single-post-template-2' );
if ( 'on-posts' === $fpblock_smooth_scroll_show ) {

  wp_enqueue_style( 'smooth-scroll-style' );
  wp_enqueue_script( 'smooth-scroll-script' );
}
wp_enqueue_script( 'single-post-template' );
wp_enqueue_style( 'fpblock-fa5', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css', array(), '5.15.5', 'all' );
wp_enqueue_style( 'fpblock-fa5-v4-shims', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/v4-shims.min.css', array(), '5.15.5', 'all' );

// Getting Post Data.
$frhd_post_id       = get_the_ID();
$frhd_category_name = get_the_category( get_the_ID() );
$frhd_auth_id       = get_post_field( 'post_author', $frhd_post_id );
$frhd_author_name   = get_the_author_meta('display_name', get_post_field('post_author', $frhd_post_id));
$frhd_author_slug   = get_the_author_meta('user_nicename', get_post_field('post_author', $frhd_post_id));
$frhd_author_desc   = get_the_author_meta('description', get_post_field('post_author', $frhd_post_id));
$frhd_post_tags     = get_the_terms(get_the_ID(), 'post_tag');

// Getting Post Meta.
$frhd_post_opt_root     = get_post_meta( get_the_ID(), '_frhd_fp_post_options', true );
$frhd_post_opt_user     = isset( $frhd_post_opt_root['frhd_fp_user'] ) ? $frhd_post_opt_root['frhd_fp_user'] : '';
$frhd_post_opt_badge    = isset( $frhd_post_opt_root['frhd_fp_badge'] ) ? $frhd_post_opt_root['frhd_fp_badge'] : '';
$frhd_post_opt_role     = isset( $frhd_post_opt_root['frhd_fp_role'] ) ? $frhd_post_opt_root['frhd_fp_role'] : '';
$frhd_post_opt_name     = get_the_author_meta( 'display_name', $frhd_post_opt_user );
$frhd_post_opt_slag     = get_the_author_meta( 'user_nicename', $frhd_post_opt_user );

// Getting User Meta.
$frhd_user_meta_root      = get_user_meta( $frhd_auth_id, '_frhd_fp_user_options', true );
$frhd_pb_profile_img_from = isset( $frhd_user_meta_root['frhd_pb_profile_img_from'] ) ? $frhd_user_meta_root['frhd_pb_profile_img_from'] : '' ;
$frhd_pb_profile_img      = isset( $frhd_user_meta_root['frhd_pb_profile_img'] ) ? $frhd_user_meta_root['frhd_pb_profile_img'] : '' ;
$frhd_pb_auth_name_from   = isset( $frhd_user_meta_root['frhd_pb_auth_name_from'] ) ? $frhd_user_meta_root['frhd_pb_auth_name_from'] : '' ;
$frhd_pb_auth_name        = isset( $frhd_user_meta_root['frhd_pb_auth_name'] ) ? $frhd_user_meta_root['frhd_pb_auth_name'] : '' ;
$frhd_pb_auth_designation = isset( $frhd_user_meta_root['frhd_pb_auth_designation'] ) ? $frhd_user_meta_root['frhd_pb_auth_designation'] : '' ;
$frhd_pb_auth_bio_from    = isset( $frhd_user_meta_root['frhd_pb_auth_bio_from'] ) ? $frhd_user_meta_root['frhd_pb_auth_bio_from'] : '' ;
$frhd_pb_auth_bio         = isset( $frhd_user_meta_root['frhd_pb_auth_bio'] ) ? $frhd_user_meta_root['frhd_pb_auth_bio'] : '' ;
$frhd_pb_auth_bio_limit_count = isset( $frhd_user_meta_root['frhd_pb_auth_bio_limit_count'] ) ? $frhd_user_meta_root['frhd_pb_auth_bio_limit_count'] : '' ;
$frhd_pb_socials          = isset( $frhd_user_meta_root['frhd_pb_socials'] ) ? $frhd_user_meta_root['frhd_pb_socials'] : '' ;

/**
 * Execute Custom CSS
 * Must use html_entity_decode()
 * So that HTML entities not being converted
 * For example: ">" converted into "&gt;"
 */
if ( ! empty( $fpblock_css_for_single_page ) ) {

  echo '<style type="text/css">' . html_entity_decode( $fpblock_css_for_single_page ) . '</style>';
}
?>
<scrollbar>
  <style>
    *,:after,:before {
     box-sizing: content-box;
   }
    /* Article Banner */
    #frhd-fp-article-main .frhd-fp-article-banner{
      background: linear-gradient(180deg, #fffeff 0, #d7fffe 100%);
    }
    #frhd-fp-article-main .frhd-fp-article-banner-content{
      max-width: 1400px;
      padding: 50px 10px;
      display: flex;
      align-items: center;
      gap: 70px;
      margin: 0 auto;
    }
    #frhd-fp-article-main .frhd-fp-article-banner-right{
      max-width: 500px;
    }
    #frhd-fp-article-main .frhd-fp-article-banner-right img{
      border-radius: 15px;
      box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
      width: 100%;
      height: auto;
    }
    #frhd-fp-article-main .frhd-fp-article-author{
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 15px 0px;
    }
    #frhd-fp-article-main .frhd-fp-article-images{
      display: flex;
    }
    #frhd-fp-article-main .frhd-fp-article-images img{
      height: auto;
      width: 32px;
      border-radius: 200px;
      border: 2px solid rgb(255 255 255 / 1);
    }
    #frhd-fp-article-main .frhd-fp-article-images img:last-child{
      margin-left: -10px;
    }
    #frhd-fp-article-main .frhd-fp-article-banner a{
      text-decoration: none;
      font-size: 16px;
      transition: 0.4s;
      color: #111111;
      font-weight: 600;
    }
    #frhd-fp-article-main .frhd-fp-article-meta a:hover{
      color: #006757;
    }
    #frhd-fp-article-main .frhd-fp-article-meta-inner{
      margin-left: -5px;
    }
    #frhd-fp-article-main .frhd-fp-article-time{
      color: #60646C;
      font-size: 14px;
    }
    #frhd-fp-article-main .frhd-fp-article-main-head{
      margin: 8px 0 16px;
      font-size: 40px;
      font-weight: 700;
      max-width: 600px;
      line-height: 48px;
    }
    #frhd-fp-article-main .frhd-fp-article-categories{
      display: inline-block;
    }
    #frhd-fp-article-main .frhd-fp-article-categories a{
      background-color: #3b00ff0d;
      padding: 8px 10px;
      border-radius: 5px;
      font-size: 14px;
      line-height: 20px;
      margin-right: 5px;
      transition: 0.4s;
    }
    #frhd-fp-article-main .frhd-fp-article-categories a:hover{
      background-color: #2e02f416;
    }
    #frhd-fp-article-main .frhd-fp-article-socials{
      display: flex;
      align-items: center;
      gap: 10px;
      margin: 32px 0;
    }
    #frhd-fp-article-main .frhd-fp-article-socials p{
      font-size: 14px;
      color: #60646C;
      margin: 0;
    }
    #frhd-fp-article-main .frhd-fp-article-socials-inner{
      display: flex;
      gap: 15px;
    }
    #frhd-fp-article-main .frhd-fp-article-socials-inner a{
      transform: scale(1);
      transition: 0.2s;
      height: 8px;
      width: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #111111;
      color: #fff;
      padding: 8px;
      border-radius: 100px;
    }
    #frhd-fp-article-main .frhd-fp-article-socials-inner a:hover{
      transform: scale(1.2);
    }
    #frhd-fp-article-main .frhd-fp-article-socials-inner a i{
      font-size: 14px;
    } 
    /* Table of Content */
    #frhd-fp-article-toc li.toc-h3 a:before {width: 20px;left: -30px;}
    #frhd-fp-article-toc li.toc-h4 a:before {width: 30px;left: -40px;}
    #frhd-fp-article-toc li.toc-h5 a:before {width: 40px;left: -50px;}
    #frhd-fp-article-toc li.toc-h6 a:before {width: 50px;left: -60px;}
    #frhd-fp-article-toc li.toc-h3 a {
      margin-left: 10px;
    }
    #frhd-fp-article-toc li.toc-h4 a {
      margin-left: 20px;
    }
    #frhd-fp-article-toc li.toc-h5 a {
      margin-left: 30px;
    }
    #frhd-fp-article-toc li.toc-h6 a {
      margin-left: 40px;
    }
    /* Inner Article Typo Reset */
    #frhd-fp-article-get-content h1 {
      font-size: 36px;
      line-height: 44px;
      margin-bottom: 10px !important;
    }
    #frhd-fp-article-get-content h2 {
      font-size: 32px;
      line-height: 38px;
      margin-bottom: 10px !important;
    }
    #frhd-fp-article-get-content h3 {
      font-size: 28px;
      line-height: 34px;
      margin-bottom: 10px !important;
    }
    #frhd-fp-article-get-content h4 {
      font-size: 22px;
      line-height: 28px;
      margin-bottom: 10px !important;
    }
    #frhd-fp-article-get-content h5 {
      font-size: 20px;
      line-height: 26px;
      margin-bottom: 10px !important;
    }
    #frhd-fp-article-get-content h6,
    #frhd-fp-article-get-content p {
      font-size: 18px;
      line-height: 28px;
      margin-bottom: 18px !important;
    }
    #frhd-fp-article-content-inner{
      max-width: 1400px;
      margin: 0 auto;
      padding: 30px 10px;
    } 
    #frhd-fp-article-toc h2{
      font-size: 16px;
      font-weight: 700;
    }
    /* Article Left Side Table Of Contents */
    #frhd-fp-article-toc .frhd-fp-socials-left{
      display: flex;
      gap: 10px;
      border-left: 1px solid #828282;
    } 
    #frhd-fp-article-toc .frhd-fp-socials-left a{
      color: #828282;
      width: 32px;
      height: 32px;
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      transition: 0.4s;
    } 
    #frhd-fp-article-toc .frhd-fp-socials-left a:hover{
      color: #006757;
    }
    #frhd-fp-article-content-inner{
      display: flex;
      justify-content: space-between;
      gap: 40px;
    }
    #frhd-fp-article-toc{
      flex-basis: 25%;
      position: sticky;
      top: 50px;
      max-height: calc(-100px + 100vh);
    }
    #frhd-fp-article-toc ul{
      padding: 0!important;
      border-left: 1px solid #bdbdbd;
      max-height: 50vh!important;
      margin: 10px 0;
    }
    #frhd-fp-article-toc ul a{
      text-decoration: none;
      font-size: 14px;
      position: relative;
      left: -1px;
      display: block;
      padding: 0 16px 0 10px;
      margin-bottom: 10px;
      color: #111111;
    }
    #frhd-fp-article-toc ul a:hover,
    #frhd-fp-article-toc ul li.active a{
      color: #006757;
      border-left: 1px solid #bdbdbd;
    }
    #frhd-fp-article-toc p{
      font-size: 14px;
      line-height: 20px;
      color: #333;
      margin: 14px 0;
    }
    #frhd-fp-article-toc-inner{
      position: relative;
    }
    #frhd-fp-article-toc p:not(#frhd-fp-article-toc-inner p){
      position: absolute;
      top: 25px;
    }
    #frhd-fp-article-content-inner .frhd-fp-article-toc-socials{
      position: absolute;
      bottom: -80px;
    }
    /* Article Content Body */
    #frhd-fp-article-body{
      flex-basis: 60%;
    }
    #frhd-fp-article-body .frhd-fp-about-author{
      display: flex;
      align-items: center;
      gap: 55px;
      border-top: 1px solid #e0e0e0;
      padding: 50px 0;
      margin-top: 50px;
    }
    #frhd-fp-article-body .frhd-fp-about-author img{
      border-radius: 50%;
      width: 150px;
      height: 150px;
      object-fit: cover;
    }
    #frhd-fp-article-body .frhd-fp-about-author p{
      font-size: 14px;
    }
    #frhd-fp-article-body h3{
      margin: 0;
      color: #113a54;
      font-size: 30px;
      font-weight: 700;
    }
    #frhd-fp-article-body h5{
      margin: 5px 0 5px;
      color: #113a54;
      line-height: 32px;
      font-weight: 700;
    }
    #frhd-fp-article-body p{
      margin: 0;
    }
    #frhd-fp-article-body .frhd-fp-about-author-bio{
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    #frhd-fp-article-body .frhd-fp-author-socials{
      display: flex;
      gap: 10px;
    }
    #frhd-fp-article-body .frhd-fp-author-socials a{
      background-color: #cccccc;
      color: #111111;
      padding: 8px;
      height: 8px;
      width: 8px;
      font-size: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      border-radius: 50%;
    }
    /* Article Right Side Content */
    #frhd-fp-article-right{
      flex-basis: 15%;
      position: sticky;
      top: 50px;
      max-height: calc(-100px + 100vh);
    }
    /* Article Right CTA */
    #frhd-fp-article-right .frhd-fp-article-cta{
      padding: 32px 24px;
      background-color: #def5ff;
      border-radius: 10px;
      text-align: center;
      margin-bottom: 30px;
    }
    #frhd-fp-article-right h2{
      font-size: 26px;
      line-height: 32px;
      color: #113a54;
      font-weight: 700;
      margin-bottom: 10px;
    }
    #frhd-fp-article-right p{
      color: #4f4f4f;
      font-size: 16px;
    }
    #frhd-fp-article-right a{
      color: #113a54;
      border: 1px solid #113a54;
      border-radius: 10px;
      padding: 5px;
      width: fit-content;
      min-width: 200px;
      display: block;
      font-weight: 700;
      line-height: 32px;
      margin: auto;
      transition: all .3s ease-in-out;
      text-decoration: none;
    }
    /* Article Right Newsletter */
    #frhd-fp-article-right a:hover{
      color: #fff;
      background: #113a54;
    }
    #frhd-fp-article-right .frhd-fp-newsletter{
      padding: 32px 24px;
      background-color: #006757;
      border-radius: 10px;
      text-align: center;
    }
    #frhd-fp-article-right .frhd-fp-newsletter h2{
      color: #fff;
      font-size: 16px;
    }
    /* Top Progress bar */
    #frhd-fp-top-progress-bar{
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 5px;
      z-index: 99999;
      pointer-events: none;
      display: block;
    }
    #frhd-fp-progress-bar-thumb{
      height: 5px;
      background-color: rgb(255, 100, 45);
      border-radius: 5px;
      width: 0px;
      transition: width 0.3s;
    }

    /* Theme Check */
    #content .ast-container,
    .site.grid-container{
      padding: 0;
      max-width: 100%;
    }
    .site-content .ast-container,
    .site-content{
      display: block;
    }
    .ast-container #frhd-fp-article-toc ul{
      margin: 10px 0!important;
    }
  
  /* Responsive */
  @media (max-width: 1024px){
    #frhd-fp-article-toc{
      position: static!important;
    }
    #frhd-fp-article-content-inner{
      display: flex;
      flex-direction: column;
    }
    #frhd-fp-article-body{
      padding-top: 50px;
    }
  }
  @media (max-width: 920px){
    #frhd-fp-article-main .frhd-fp-article-banner-content{
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
  }
  @media (max-width: 599px){
    #frhd-fp-article-main .frhd-fp-article-main-head{
      font-size: 26px;
    }
    #frhd-fp-article-main .frhd-fp-article-socials,
    #frhd-fp-article-body .frhd-fp-about-author,
    #frhd-fp-article-main .frhd-fp-article-author{
      display: flex;
      flex-direction: column;
    }
    #frhd-fp-article-main .frhd-fp-article-socials,
    #frhd-fp-article-main .frhd-fp-article-author{
      align-items: flex-start;
    }
  }

  </style>
    <div id="frhd-fp-article-main" class="toc-type-<?php echo $fpblock_toc_counter; ?>">
        <div class="frhd-fp-article-content">
            <div class="frhd-fp-article-banner">
              <div class="frhd-fp-article-banner-content">
                 <div class="frhd-fp-article-banner-left">
                    <div class="frhd-fp-article-author">
                      <div class="frhd-fp-article-images">
                          <img src="https://uploads.sitepoint.com/wp-content/uploads/2018/10/1539663963Sam-Deering-150x150.jpg" alt="Sam Deering">
                          <img src="https://uploads.sitepoint.com/wp-content/uploads/2018/10/1539663963Sam-Deering-150x150.jpg" alt="Sam Deering">
                      </div>
                      <div class="frhd-fp-article-meta">
                          <span>
                            <a href="#">Ritesh Kumar</a>
                            <span class="frhd-fp-article-meta-inner">, </span>
                          </span>
                          <span>
                            <a href="#">Sam Deering</a>
                          </span>
                      </div>
                    </div>
                    <time datetime="2016-03-31" class="frhd-fp-article-time">March 31, 2016</time>
                    <h1 class="frhd-fp-article-main-head">10 jQuery Horizontal Scroll Demos & Plugins</h1>
                    <div class="frhd-fp-article-categories">
                      <a href="#">JavaScript</a>
                      <a href="#">jQuery</a>
                    </div>
                    <div class="frhd-fp-article-socials">
                      <p>Share this article</p>
                      <div class="frhd-fp-article-socials-inner">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                      </div>
                    </div>
                 </div>
                 <div class="frhd-fp-article-banner-right">
                   <img src="https://videoters.com/wp-content/uploads/2024/04/Best-SaaS-Explainer-Video-Companies.png" alt="banner_image">
                 </div>
              </div>
            </div>
            <div id="frhd-fp-article-content-inner">
              <div id="frhd-fp-article-toc">
                <div id="frhd-fp-article-toc-inner">
                  <h2>Table of contents</h2>
                  <ul id="toc-list"></ul>
                  <div class="frhd-fp-article-toc-socials">
                    <p>Share this article</p>
                      <div class="frhd-fp-socials-left">
                          <a href="#"><i class="fab fa-facebook-f"></i></a>
                          <a href="#"><i class="fab fa-twitter"></i></a>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                          <a href="#" class="frhd-fp-copy-container" onclick="copyToClipboard()">
                            <i class="fas fa-link" id="linkIcon"></i>
                        </a>
                      </div>
                  </div>
                </div>
              </div>
              <div id="frhd-fp-article-body">
                <div id="frhd-fp-article-get-content" class="frhd-fp-article-the-content">
                    <?php
                    $frhdfp_blocks = parse_blocks( get_the_content() );
                    $frhdfp_content_markup = '';
                    foreach ( $frhdfp_blocks as $block ) {

                      $frhdfp_content_markup .= render_block( $block );
                    }
                    echo $frhdfp_content_markup;
                    ?>
                </div>
                <div class="frhd-fp-about-author">
                    <img src="https://secure.gravatar.com/avatar/c7d0c633a9d1f77788eaace22306a999?s=400&d=identicon&r=g" alt="avatar">
                    <div class="frhd-fp-about-author-inner">
                      <div class="frhd-fp-about-author-bio">
                          <h3>Alkeo Taga</h3>
                          <div class="frhd-fp-author-socials">
                              <a href="#"><i class="fab fa-facebook-f"></i></a>
                              <a href="#"><i class="fab fa-linkedin-in"></i></a>
                              <a href="#"><i class="fab fa-twitter"></i></a>
                          </div>
                      </div>
                      <h5>A Marketer & an Everyday Publer User</h5>
                      <p>Talks about marketing and all things social. Always on the look out for the next big thing, and always overly excited about #PublerUpdates.</p>
                    </div>
                </div>
              </div>
              <div id="frhd-fp-article-right">
                <div class="frhd-fp-article-cta">
                    <h2>Schedule Facebook Profile Posts with Publer </h2>
                    <p>Start Building Your Own Personal Branding on Facebook with Publer </p>
                    <a href="#">Connect Profile</a>
                </div>
                <div class="frhd-fp-newsletter">
                    <h2>Subscribe to our newsletter</h2>
                    <?php echo do_shortcode( $fpblock_email_shortcode ); ?>
                </div>
              </div>
            </div>
        </div>
    </div>
</scrollbar>
<div id="frhd-fp-top-progress-bar">
	<div id="frhd-fp-progress-bar-thumb"></div>
</div>
<?php
// Footer
wp_footer();
if ( 'Twenty Twenty-Four' !== $frhd_theme_name ) {

  get_footer();
}
