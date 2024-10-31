<?php
wp_enqueue_style( 'fpgpb-getting-started', esc_url( FPPB_URL . 'admin/css/getting-started.css' ), array(), POST_BLOCK_VERSION );
?>
<div class="frhd-option-body">
    <div class="frhd-setting-header">
        <div class="frhd-setting-header-info">
            <div class="frhd-setting-header-info-content" style="background-image: url('<?php echo esc_url( FPPB_URL . 'admin/img/body_bg.png' ); ?>');">
                <img src="<?php echo esc_url( FPPB_URL . 'admin/img/plugin-logo.png' ); ?>" alt="Header Footer Customizer">
                <div class="frhd-plugin-about">
                    <h1>FancyPost<sup id="frhd-plugin-version"><?php echo POST_BLOCK_VERSION; ?></sup></h1>
                    <p>Thank You for Installing</p>
                    <p>The Most Powerful & Advanced WordPress Gutenberg Plugin!</p>
                </div>
            </div>
        </div>
        <div class="frhd-dashboard-nav">
          <nav>
            <a href="#" class="frhd-current"><span class="dashicons dashicons-admin-home"></span>Getting Started</a>
            <a href="<?php echo get_admin_url() . 'admin.php?page=fancypost_opt#tab=blocks'; ?>"><span class="dashicons dashicons-block-default"></span>Blocks</a>
            <a href="<?php echo get_admin_url() . 'admin.php?page=fancypost_opt#tab=single-post-settings'; ?>"><span class="dashicons dashicons-welcome-widgets-menus"></span>Post Template</a>
            <a href="<?php echo get_admin_url() . 'edit.php?post_type=frhdfp_blocks'; ?>"><span class="dashicons dashicons-shortcode"></span>Block to Shortcode<span class="frhd-nav-badge">&nbsp;NEW!</span></a>
            <a href="<?php echo get_admin_url() . 'admin.php?page=fancypost_opt'; ?>"><span class="dashicons dashicons-admin-generic"></span>Settings</a>
            <a href="<?php echo get_admin_url() . 'admin.php?page=fancypost_backup'; ?>"><span class="dashicons dashicons-backup"></span>Backup</a>
            <?php
            if ( 'ESSENTIAL' === FPPB_COPY ) {

                echo '<a class="frhd-live-effect" href="' . get_admin_url() . 'admin.php?page=fancypost_opt#tab=unlock-all-features" style="color: #E91E63;font-weight: 900;"><span class="dashicons dashicons-unlock"></span>Unlock All Features</a>';
            }
            ?>
          </nav>
        </div>
    </div>
    <div class="frhd-container-wrap">
        <div class="frhd-container-overview">
            <div class="frhd-container-hero">
                <div class="frhd-hero-video">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/3-XGJ3QSQaM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="frhd-hero-buttons">
                      <a href="<?php echo get_admin_url() . 'post-new.php?post_type=frhdfp_blocks'; ?>" target="_blank">Add a Block Shortcode</a>
                      <a href="https://demo.pluginic.com/post-block/?ref=100" target="_blank">Live Demo</a>
                      <a href="https://pluginic.com/documentation/?ref=100" target="_blank">Documentation</a>
                    </div>
                </div>
                <div class="frhd-container-ad">
                    <a href="https://pluginic.com/plugins/gutenberg-post-blocks/" target="_blank">
                        <picture>
                            <source media="(max-width:960px)" srcset="<?php echo esc_url( FPPB_URL . 'admin/img/banner-960x340.jpg' ); ?>">
                            <img style="max-height: 468px;" src="<?php echo esc_url( FPPB_URL . 'admin/img/banner-329x468.jpg' ); ?>">
                        </picture>
                    </a>
                </div>
            </div>
        </div>
        <div class="frhd-spacer" style="height: 30px;"></div>






        <div class="frhdgs-option-body">
    <div class="frhdgs-container-wrap">
        <div class="frhdgs-hero-upgrade">
            <h2><span class="dashicons dashicons-superhero-alt"></span>Pro Feature List :</h2>
            <div class="frhdgs-upgrade-feature-list">
                <ul>
                    <li>Fully responsive, SEO-friendly & optimized.</li>
                    <li>Advanced Shortcode Generator.</li>
                    <li>Advanced Shortcode Generator.</li>
                    <li>Slide Anything (e.g. Image, Post, Product, Content, Video, Text, HTML, Shortcodes, etc.)</li>
                    <li>Display posts from multiple Categories, Tags, Formats, or Types. (e.g. Latest, Taxonomies, Specific, etc.).</li>
                    <li>Multiple Functions on the same page.</li>
                    <li>Multiple Functions on the same page.</li>
                    <li>100+ Visual Customization options.</li>
                    <li>Drag & Drop Function builder (image, content, video, etc.).</li>
                    <li>Drag & Drop Function builder (image, content, video, etc.).</li>
                    <li>Image Function with internal and external links.</li>
                    <li>Image Function with caption and description.</li>
                </ul>
                <ul>
                    <li>Image Content Position (Bottom, Top, Right, and Overlay).</li>
                    <li>Show/hide image caption and description.</li>
                    <li>Post Function with Title, image, excerpt, read more, category, date, author, tags, comments, etc.).</li>
                    <li>Post excerpt, full content, and content with the limit.</li>
                    <li>WooCommerce Product Function.</li>
                    <li>Show/hide the standard product contents (product name, image, price, excerpt, read more, rating, add to cart, etc.).</li>
                    <li>Supported YouTube, Vimeo, Dailymotion, mp4, WebM, and even self-hosted video.</li>
                    <li>Add Custom Video Thumbnails (for self-hosted) and video icon.</li>
                    <li>Function Mode (standard, center, ticker).</li>
                    <li>8+ Different navigation positions.</li>
                    <li>Typography & Styling options (840+ Google fonts).</li>
                </ul>
            </div>
            <a class="frhdgs-hero-btn-pro" href="https://pluginic.com/plugins/gutenberg-post-blocks/?ref=100" target="_blank">Upgrade to Pro <span>→</span></a>
        </div>
        <div class="frhdgs-testimonial">
            <div class="frhdgs-testimonial-columns">
                <div class="frhdgs-testimonial-column">
                    <span class="frhdgs-testimonial-stars"></span>
                    <p style="font-size:18px;line-height:1.3;margin-bottom:15px">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
                    <div class="frhdgs-testimonial-client">
                        <img width="50" height="50" src="<?php echo esc_url( FPPB_URL . 'admin/img/client-1.jpg' ); ?>" alt="" class="wp-image-3273">
                        <div class="frhdgs-testimonial-client-ghost">
                            <h4>Roman Rybakov</h4>
                            <p>Frontend Engineer</p>
                        </div>
                    </div>
                </div>
                <div class="frhdgs-testimonial-column">
                    <span class="frhdgs-testimonial-stars"></span>
                    <p style="font-size:18px;line-height:1.3;margin-bottom:15px">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
                    <div class="frhdgs-testimonial-client">
                        <img width="50" height="50" src="<?php echo esc_url( FPPB_URL . 'admin/img/client-2.jpg' ); ?>" alt="" class="wp-image-3273">
                        <div class="frhdgs-testimonial-client-ghost">
                            <h4>Roman Rybakov</h4>
                            <p>Frontend Engineer</p>
                        </div>
                    </div>
                </div>
                <div class="frhdgs-testimonial-column">
                    <span class="frhdgs-testimonial-stars"></span>
                    <p style="font-size:18px;line-height:1.3;margin-bottom:15px">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
                    <div class="frhdgs-testimonial-client">
                        <img width="50" height="50" src="<?php echo esc_url( FPPB_URL . 'admin/img/client-3.jpg' ); ?>" alt="" class="wp-image-3273">
                        <div class="frhdgs-testimonial-client-ghost">
                            <h4>Roman Rybakov</h4>
                            <p>Frontend Engineer</p>
                        </div>
                    </div>
                </div>
                <div class="frhdgs-testimonial-column">
                    <span class="frhdgs-testimonial-stars"></span>
                    <p style="font-size:18px;line-height:1.3;margin-bottom:15px">“I have tried many plugins and this is the best. It is easy to use, has so many themes, and is free!</p>
                    <div class="frhdgs-testimonial-client">
                        <img width="50" height="50" src="<?php echo esc_url( FPPB_URL . 'admin/img/client-4.jpg' ); ?>" alt="" class="wp-image-3273">
                        <div class="frhdgs-testimonial-client-ghost">
                            <h4>Roman Rybakov</h4>
                            <p>Frontend Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="frhd-footer-promotion" style="display: block;text-align: center;">
          <p style="font-weight: 600;font-size: 14px;color: #607D8B;">Made with <span class="dashicons dashicons-heart"></span> by the Pluginic Team</p>
          <ul class="frhd-footer-pro-links">
              <li><a href="https://pluginic.com/support/" target="_blank">Support</a><span> /</span></li>
              <li><a href="https://pluginic.com/fancypost-docs/" target="_blank">Docs</a><span> /</span></li>
              <li><a href="https://www.facebook.com/pluginic/" target="_blank">VIP Circle</a><span> /</span></li>
              <li><a href="<?php echo get_admin_url() . 'admin.php?page=fancypost_opt#tab=recommended'; ?>">Free Plugins</a></li>
          </ul>
          <ul class="frhd-footer-pro-socials">
            <li><a href="https://www.facebook.com/pluginic/" target="_blank" rel="noopener noreferrer"><svg width="16" height="16" aria-hidden="true"><path fill="#A7AAAD" d="M16 8.05A8.02 8.02 0 0 0 8 0C3.58 0 0 3.6 0 8.05A8 8 0 0 0 6.74 16v-5.61H4.71V8.05h2.03V6.3c0-2.02 1.2-3.15 3-3.15.9 0 1.8.16 1.8.16v1.98h-1c-1 0-1.31.62-1.31 1.27v1.49h2.22l-.35 2.34H9.23V16A8.02 8.02 0 0 0 16 8.05Z"></path></svg><span class="screen-reader-text">Facebook</span></a></li>
            <li><a href="https://www.linkedin.com/company/pluginicofficial/" target="_blank" rel="noopener noreferrer"><svg width="16" height="16" aria-hidden="true"><path fill="#A7AAAD" d="M14 1H1.97C1.44 1 1 1.47 1 2.03V14c0 .56.44 1 .97 1H14a1 1 0 0 0 1-1V2.03C15 1.47 14.53 1 14 1ZM5.22 13H3.16V6.34h2.06V13ZM4.19 5.4a1.2 1.2 0 0 1-1.22-1.18C2.97 3.56 3.5 3 4.19 3c.65 0 1.18.56 1.18 1.22 0 .66-.53 1.19-1.18 1.19ZM13 13h-2.1V9.75C10.9 9 10.9 8 9.85 8c-1.1 0-1.25.84-1.25 1.72V13H6.53V6.34H8.5v.91h.03a2.2 2.2 0 0 1 1.97-1.1c2.1 0 2.5 1.41 2.5 3.2V13Z"></path></svg><span class="screen-reader-text">LinkedIn</span></a></li>
            <li><a href="https://twitter.com/pluginic" target="_blank" rel="noopener noreferrer"><svg width="17" height="16" aria-hidden="true"><path fill="#A7AAAD" d="M15.27 4.43A7.4 7.4 0 0 0 17 2.63c-.6.27-1.3.47-2 .53a3.41 3.41 0 0 0 1.53-1.93c-.66.4-1.43.7-2.2.87a3.5 3.5 0 0 0-5.96 3.2 10.14 10.14 0 0 1-7.2-3.67C.86 2.13.7 2.73.7 3.4c0 1.2.6 2.26 1.56 2.89a3.68 3.68 0 0 1-1.6-.43v.03c0 1.7 1.2 3.1 2.8 3.43-.27.06-.6.13-.9.13a3.7 3.7 0 0 1-.66-.07 3.48 3.48 0 0 0 3.26 2.43A7.05 7.05 0 0 1 0 13.24a9.73 9.73 0 0 0 5.36 1.57c6.42 0 9.91-5.3 9.91-9.92v-.46Z"></path></svg><span class="screen-reader-text">Twitter</span></a></li>
            <li><a href="https://www.youtube.com/@pluginic" target="_blank" rel="noopener noreferrer"><svg width="17" height="16" aria-hidden="true"><path fill="#A7AAAD" d="M16.63 3.9a2.12 2.12 0 0 0-1.5-1.52C13.8 2 8.53 2 8.53 2s-5.32 0-6.66.38c-.71.18-1.3.78-1.49 1.53C0 5.2 0 8.03 0 8.03s0 2.78.37 4.13c.19.75.78 1.3 1.5 1.5C3.2 14 8.51 14 8.51 14s5.28 0 6.62-.34c.71-.2 1.3-.75 1.49-1.5.37-1.35.37-4.13.37-4.13s0-2.81-.37-4.12Zm-9.85 6.66V5.5l4.4 2.53-4.4 2.53Z"></path></svg><span class="screen-reader-text">YouTube</span></a></li>
          </ul>
        </div>
    </div>
</div>
