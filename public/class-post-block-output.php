<?php

/**
 * The block-facing functionality of the plugin.
 *
 * @link       https://pluginic.com
 * @since      1.0.0
 *
 * @package    Post_Block
 * @subpackage Post_Block/public
 */

/**
 * The block-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the block-facing stylesheet and JavaScript.
 *
 * @package    Post_Block
 * @subpackage Post_Block/public
 * @author     Pluginic <hellopluginic@gmail.com>
 */
class Post_Block_Public_Output {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    /**
     * Register blocks and facing output.
     */
	public function frhd_render_block_core() {

        $asset_file = include( POST_BLOCK_DIR . 'build/index.asset.php' );
    
        wp_register_script( 'post-block-esnext', FPPB_URL . 'build/index.js', $asset_file['dependencies'], $asset_file['version'] );
    
        // Stylesheet for editor page.
        wp_register_style( 'post-block-editor', FPPB_URL . 'admin/css/post-grid-editor.css', array( 'wp-edit-blocks' ), POST_BLOCK_VERSION );

        // Splide Slider.
        wp_enqueue_style( 'frhd-pb-splide-min', FPPB_URL . 'public/css/splide.min.css', array(), POST_BLOCK_VERSION, false );

        // Post Trisect.
        wp_enqueue_style( 'frhd-post-trisect', FPPB_URL . 'public/css/post-trisec.css', array(), POST_BLOCK_VERSION, false );

        // Post  Postlist.
        wp_enqueue_style( 'frhd-postlist', FPPB_URL . 'public/css/post-list-1.css', array(), POST_BLOCK_VERSION, false );

        // Ajax Filter.
        wp_register_script('ajax-filter', FPPB_URL . 'public/js/ajax-filter.js', array('jquery'), POST_BLOCK_VERSION);
        wp_localize_script('ajax-filter', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
        wp_enqueue_script('ajax-filter');
    
        $blocks = array(
            'fancypost/post-heading' => array(
                'title'           => 'Post Heading',
                'attributes'      => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'blockHeading' => array(
                        'type'     => 'string',
                        array(
                            'source'   => 'text',
                            'selector' => 'h2',
                        ),
                        'default'  => 'The Rise of Artificial Intelligence 🚀',
                    ),
                    'headingmaxWidth' => array(
                        'type' => 'string',
                        'default' => '1200px',
                    ),
                    'subheadingmaxWidth' => array(
                        'type' => 'string',
                        'default' => '700px',
                    ),
                    'blockHeadingBorderWidth' => array(
                        'type' => 'number',
                        'default' => 150,
                    ),
                    'blockHeadingTag' => array(
                        'type' => 'string',
                        'default' => 'h2',
                    ),
                    'blockHeadingStyle' => array(
                        'type' => 'string',
                        'default' => 'frhd__heading-style-1'
                    ),
                    'textHoverAnimationStyle' => array(
                        'type' => 'string',
                        'default' => 'frhd__animation-style-1'
                    ),
                    'blockHeadingPrefixColor' => array(
                        'type' => 'string',
                        'default' => '#ff6347',
                    ),
                    'blockHeadingPrefixBackgroundColor' => array(
                        'type' => 'string',
                        'default' => '#FFE6D9',
                    ),
                    'blockHeadingColor' => array(
                        'type' => 'string',
                        'default' => '#1E293B',
                    ),
                    'blockHeadingBGColor' => array(
                        'type' => 'string',
                        'default' => '#d8613c42',
                    ),
                    'blockHeadingBorderColor' => array(
                        'type' => 'string',
                        'default' => '#d8613c',
                    ),
                    'headingWithSeparatorSpace' => array(
                        'type' => 'number',
                        'default' => 20,
                    ),
                    'headingSpace' => array(
                        'type' => 'number',
                        'default' => 10,
                    ),
                    'mainHeadingSpace' => array(
                        'type' => 'number',
                        'default' => 10,
                    ),
                    'blockHeadingseparatorColor' => array(
                        'type' => 'string',
                        'default' => '#1E293B'
                    ),
                    'blockHeading4separatorColor' => array(
                        'type' => 'string',
                        'default' => '#5e30cc'
                    ),
                    'blockHeadingseparatorMiddleColor' => array(
                        'type' => 'string',
                        'default' => '#b80000'
                    ),
                    'blockHeadingIconHeight' => array(
                        'type' => 'string',
                        'default' => '#000'
                    ),
                    'blockHeadingIconWidth' => array(
                        'type' => 'string',
                        'default' => '#000'
                    ),
                    'blockheadingPrefix' => array(
                        'type'     => 'string',
                        array(
                            'source'   => 'text',
                            'selector' => 'p',
                        ),
                        'default'  => 'FancyPost',
                    ),
                    'blockSubheading' => array(
                        'type'     => 'string',
                        array(
                            'source'   => 'text',
                            'selector' => 'p',
                        ),
                        'default'  => 'Discover the latest breakthroughs, ethical considerations, and societal implications as we navigate this exciting journey...',
                    ),
                    'blockSubheadingTypo' => array(
                        'type' => 'object',                     
                    ),
                    'blockHeadingTypo' => array(
                        'type' => 'object',                     
                    ),
                    'blockHeadingPrefixTypo' => array(
                        'type' => 'object',                     
                    ),
                    'isBlockSubheading' => array(
                        'type'     => 'boolean',
                        'default' => true,
                    ),
                    'isBlockheadingPrefix' => array(
                        'type'     => 'boolean',
                        'default' => true,
                    ),
                    'blockSubheadingColor' => array(
                        'type' => 'string',
                        'default' => '#546275',
                    ),
                    'headingAlign' => array(
                        'type'    => 'string',
                        'default' => 'center',
                    ),
                ),
            ),
            'fancypost/post-grid' => array(
                'title'           => 'Post Grid',
                'render_callback' => array($this, 'frhd_render_block_post_grid'),
                'attributes'      => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'thePostType' => array(
                        'type'    => 'string',
                        'default' => 'posts',
                    ),
                    'theCategories' => array(
                        'type'    => 'array',
                    ),
                    'selectedCats' => array(
                        'type'    => 'array',
                    ),
                    'postsPerPage' => array(
                        'type'    => 'string',
                        'default' => '6',
                    ),
                    'postsPerCol' => array(
                        'type'    => 'string',
                        'default' => '3',
                    ),
                    'grid7postsPerCol' => array(
                        'type'    => 'string',
                        'default' => '2',
                    ),
                    'grid6postsPerCol' => array(
                        'type'    => 'string',
                        'default' => '2',
                    ),
                    'totalPost' => array(
                        'type'    => 'string',
                        'default' => '30',
                    ),
                    'hasCurrentPost' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'postOrderBy' => array(
                        'type'    => 'string',
                        'default' => 'date',
                    ),
                    'postOrder' => array(
                        'type'    => 'string',
                        'default' => 'desc',
                    ),
                    'postThumbSize' => array(
                        'type'    => 'string',
                        'default' => 'medium_large',
                    ),
                    'hasCompLinked' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasLinkNewTab' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasLinkInimage' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasNofollowLink' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'postTitleTag' => array(
                        'type'    => 'string',
                        'default' => 'h2',
                    ),
                    'readMoreBtnText' => array(
                        'type'    => 'string',
                        'default' => 'Read More!',
                    ),
                    'postLayout' => array(
                        'type'    => 'string',
                        'default' => 'grid1',
                    ),
                    'maxWidth' => array(
                        'type'    => 'string',
                        'default' => '1200px',
                    ),
                    'contentAlign' => array(
                        'type'    => 'string',
                        'default' => 'left',
                    ),
                    'columnGap' => array(
                        'type'    => 'string',
                        'default' => '15',
                    ),
                    'rowGap' => array(
                        'type'    => 'string',
                        'default' => '20',
                    ),
                    'hasEqualHeight' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'equalHeight' => array(
                        'type'    => 'string',
                        'default' => '220px',
                    ),
                    'roundedCornerSize' => array(
                        'type'    => 'string',
                        'default' => '5px',
                    ),
                    'excerptWordCount' => array(
                        'type'    => 'string',
                        'default' => '19',
                    ),
                    'paginationType' => array(
                        'type'    => 'string',
                        'default' => 'number',
                    ),
                    'paginAlign' => array(
                        'type'    => 'string',
                        'default' => 'center',
                    ),
                    'paginationLimit' => array(
                        'type'    => 'string',
                    ),
                    'hasPagination' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'hasPagPrevNextBtn' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'pagPrevBtnText' => array(
                        'type'    => 'string',
                        'default' => '«',
                    ),
                    'pagNextBtnText' => array(
                        'type'    => 'string',
                        'default' => '»',
                    ),
                    'onLoadPagin' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'showPostImg' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'showPostTitle' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'showPostAuth' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'showPostDate' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'showPostComment' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'showPostViewCount' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'showPostTaxonomy' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'showPostExcerpt' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'showPostButton' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'showPostReadTime' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'showPostLoveReact' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'postBodyColor' => array(
                        'type'    => 'string',
                        'default' => '#f5f5f5',
                    ),
                    'postBodyBorderColor' => array(
                        'type'    => 'string',
                        'default' => '#FF6347',
                    ),
                    'OverlayColor' => array(
                        'type'    => 'string',
                        'default' => '#5a64d0',
                    ),
                    'OverlayOpacity' => array(
                        'type'    => 'number',
                        'default' => 0.7,
                    ),
                    'taxonomyColor' => array(
                        'type'    => 'string',
                        'default' => '#000000',
                    ),
                    'taxonomyBGcolor' => array(
                        'type'    => 'string',
                        'default' => '#ffc107',
                    ),
                    'taxonomyPrecolor' => array(
                        'type'    => 'string',
                        'default' => '#5a64d0',
                    ),
                    'postTitleColor' => array(
                        'type'    => 'string',
                        'default' => '#371f0e',
                    ),
                    'postMetaColor' => array(
                        'type'    => 'string',
                        'default' => '#424242',
                    ),
                    'postDateBGColor' => array(
                        'type'    => 'string',
                        'default' => '#ffc107',
                    ),
                    'postMetaIconColor' => array(
                        'type'    => 'string',
                        'default' => '#ff798e',
                    ),
                    'postDescColor' => array(
                        'type'    => 'string',
                        'default' => '#4b4f58',
                    ),
                    'postAuthorColor' => array(
                        'type'    => 'string',
                        'default' => '#5a64d0',
                    ),
                    'postBtnTextColor' => array(
                        'type'    => 'string',
                        'default' => '#ffffff',
                    ),
                    'postBtnColor' => array(
                        'type'    => 'string',
                        'default' => '#5a64d0',
                    ),
                    'hoverBtnTextColor' => array(
                        'type'    => 'string',
                        'default' => '#ffffff',
                    ),
                    'hoverBtnColor' => array(
                        'type'    => 'string',
                        'default' => '#ff798e',
                    ),
                    'readingTimeColor' => array(
                        'type'    => 'string',
                        'default' => '#ff798e',
                    ),
                    'readingTimeIconColor' => array(
                        'type'    => 'string',
                        'default' => '#ff798e',
                    ),
                    'paginationNumColor' => array(
                        'type'    => 'string',
                        'default' => '#ffffff',
                    ),
                    'paginationBGColor' => array(
                        'type'    => 'string',
                        'default' => '#5a64d0',
                    ),
                    'pagiActiveNumColor' => array(
                        'type'    => 'string',
                        'default' => '#ffffff',
                    ),
                    'pagiActiveBGColor' => array(
                        'type'    => 'string',
                        'default' => '#ff798e',
                    ),
                    'PostTitleTypo' => array(
                        'type' => 'object', 
                    ),
                    'PostDescriptionTypo' => array(
                        'type' => 'object',
                    ),
                    'PostMetaTypo' => array(
                        'type' => 'object',
                    ),
                    'PostCategoryTypo' => array(
                        'type' => 'object',
                    ),
                    'PostButtonTypo' => array(
                        'type' => 'object',
                    ),
                    'PostAuthorTypo' => array(
                        'type' => 'object',
                    ),
                    'PostPaginationTypo' => array(
                        'type' => 'object',
                    ),
                    'PostFontFamilyCommon' => array(
                        'type' => 'array',
                        'default' => 'Josefin Sans'  
                    ),
                    'PostFontSize' => array(
                        'type' => 'string',
                        'default' => '',
                    ),
                    'PostFontHeight' => array(
                        'type' => 'number',
                        'default' => '',
                    ),
                    'PostFontWeight' => array(
                        'type' => 'number',
                        'default' => '',
                    ),
                    'PostLetterSpacing' => array(
                        'type' => 'number',
                        'default' => '',
                    ),
                    'PostTextDecorationStyle' => array(
                        'type' => 'string',
                        'default' => '',
                    ),
                    'PostTextTransform' => array(
                        'type' => 'string',
                        'default' => '',
                    ),
                    'PostTextStyle' => array(
                        'type' => 'string',
                        'default' => '',
                    ),
                    'postItemAnimation' => array(
                        'type' => 'string',
                        'default' => '',
                    ),
                    'postImageAnimation' => array(
                        'type' => 'string',
                        'default' => '',
                    ),
                    'postButtonAnimation' => array(
                        'type' => 'string',
                        'default' => '',
                    ),
                ),
            ),
            'fancypost/post-list' => array(
                'title'           => 'Post List',
                'render_callback' => array($this, 'frhd_render_block_post_list'),
                'attributes'      => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'posts' => array(
                        'type' => 'array',
                    ),
                    'postLayout' => array(
                        'type'    => 'string',
                        'default' => 'grid1',
                    ),
                    'maxWidth' => array(
                        'type'    => 'string',
                        'default' => '1200px',
                    ),
                    'thePostType' => array(
                        'type'    => 'string',
                        'default' => 'posts',
                    ),
                    'postsPerPage' => array(
                        'type'    => 'string',
                        'default' => '6',
                    ),
                    'theCategories' => array(
                        'type'    => 'array',
                    ),
                    'selectedCats' => array(
                        'type'    => 'array',
                    ),
                    'totalPost' => array(
                        'type'    => 'string',
                        'default' => '30',
                    ),
                    'hasCurrentPost' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'postOrderBy' => array(
                        'type'    => 'string',
                        'default' => 'date',
                    ),
                    'postOrder' => array(
                        'type'    => 'string',
                        'default' => 'desc',
                    ),
                    'postThumbSize' => array(
                        'type'    => 'string',
                        'default' => 'medium_large',
                    ),
                    'hasCompLinked' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasLinkNewTab' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasLinkInimage' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasNofollowLink' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'postTitleTag' => array(
                        'type'    => 'string',
                        'default' => 'h2',
                    ),
                ),
            ),
            'fancypost/post-group' => array(
                'title'           => 'Post Group',
                'render_callback' => array($this, 'frhd_render_block_post_group'),
                'attributes'      => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'groupImage'       => array(
                        'type'    => 'string',
                        'default' => 'https://via.placeholder.com/300',
                    ),
                    'groupImageObj'    => array(
                        'type' => 'object',
                    ),
                    'groupImageSize'   => array(
                        'type'    => 'string',
                        'default' => 'full',
                    ),
                    'isEqualHeight'    => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'groupImageHeight' => array(
                        'type'    => 'string',
                        'default' => '300px',
                    ),
                    'theCategories' => array(
                        'type'    => 'array',
                    ),
                    'selectedCats' => array(
                        'type'    => 'array',
                    ),
                    'groupTitle'       => array(
                        'type'    => 'string',
                        'default' => 'Group Title',
                    ),
                    'postsPerPage'     => array(
                        'type'    => 'string',
                        'default' => '5',
                    ),
                    'titleWordCount'   => array(
                        'type'    => 'string',
                        'default' => '3',
                    ),
                ),
            ),
            'fancypost/post-trisec' => array(
                'title'           => 'Post Trisect',
                'render_callback' => array($this, 'frhd_render_block_post_trisect'),
                'attributes'      => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'triPostSet'          => array(
                        'type'    => 'string',
                        'default' => '3',
                    ),
                    'theCategories' => array(
                        'type'    => 'array',
                    ),
                    'selectedCats' => array(
                        'type'    => 'array',
                    ),
                    'postsPerPage'     => array(
                        'type'    => 'string',
                        'default' => '5',
                    ),
                    'triIsFeaturedCenter' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'isReversePostSetCol' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'isTriCustomHeight'   => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'triCustomHeight'     => array(
                        'type'    => 'string',
                        'default' => '570px',
                    ),
                    'triColGap'           => array(
                        'type'    => 'string',
                        'default' => '15',
                    ),
                    'triRowGap'           => array(
                        'type'    => 'string',
                        'default' => '15',
                    ),
                    'triRoundedCorner'    => array(
                        'type'    => 'string',
                        'default' => '5',
                    ),
                    'triExcerptSize'      => array(
                        'type'    => 'string',
                        'default' => '30',
                    ),
                    'triFeatThumbSize'    => array(
                        'type'    => 'string',
                        'default' => 'medium_large',
                    ),
                    'triAsdThumbSize'     => array(
                        'type'    => 'string',
                        'default' => 'medium',
                    ),
                    'featureColumnbgColor'     => array(
                        'type'    => 'string',
                        'default' => '#808080',
                    ),
                    'besideColumnbgColor'     => array(
                        'type'    => 'string',
                        'default' => '#f5f5f5',
                    ),
                    'postOverlayColor'     => array(
                        'type'    => 'string',
                        'default' => '#191c20',
                    ),
                    'featuredCategoryColor'     => array(
                        'type'    => 'string',
                        'default' => '#fff',
                    ),
                    'featuredCategorybgColor'     => array(
                        'type'    => 'string',
                        'default' => '#00B552',
                    ),
                    'besidetopCategoryColor'     => array(
                        'type'    => 'string',
                        'default' => '#fff',
                    ),
                    'besidetopCategorybgColor'     => array(
                        'type'    => 'string',
                        'default' => '#ff6552',
                    ),
                    'besidebottomCategoryColor'     => array(
                        'type'    => 'string',
                        'default' => '#fff',
                    ),
                    'besidebottomCategorybgColor'     => array(
                        'type'    => 'string',
                        'default' => '#1a8cb2',
                    ),
                    'titleColor'     => array(
                        'type'    => 'string',
                        'default' => '#fff',
                    ),
                    'exerptColor'     => array(
                        'type'    => 'string',
                        'default' => '#fff',
                    ),
                    'metaColor'     => array(
                        'type'    => 'string',
                        'default' => '#fff',
                    ),
                    'metaIconColor'     => array(
                        'type'    => 'string',
                        'default' => '',
                    ),
                    'featuredTextDecorationColor'     => array(
                        'type'    => 'string',
                        'default' => '#fff',
                    ),
                    'besidetopTextDecorationColor'     => array(
                        'type'    => 'string',
                        'default' => '#ff6552',
                    ),
                    'besidebottomTextDecorationColor'     => array(
                        'type'    => 'string',
                        'default' => '#1a8cb2',
                    ),
                ),
            ),
            'fancypost/post-slider' => array(
                'title'           => 'Post Slider',
                'render_callback' => array($this, 'frhd_render_block_post_slider'),
                'attributes'      => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'thePostType' => array(
                        'type'    => 'string',
                        'default' => 'posts',
                    ),
                    'theCategories' => array(
                        'type'    => 'array',
                    ),
                    'selectedCats' => array(
                        'type'    => 'array',
                    ),
                    'totalPost' => array(
                        'type'    => 'string',
                        'default' => '30',
                    ),
                    'hasCurrentPost' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'postOrderBy' => array(
                        'type'    => 'string',
                        'default' => 'date',
                    ),
                    'postOrder' => array(
                        'type'    => 'string',
                        'default' => 'desc',
                    ),
                    'postThumbSize' => array(
                        'type'    => 'string',
                        'default' => 'medium_large',
                    ),
                    'postTitleTag' => array(
                        'type'    => 'string',
                        'default' => 'h2',
                    ),
                    'readMoreBtnText' => array(
                        'type'    => 'string',
                        'default' => 'Read More!',
                    ),
                    'slWidth'        => array(
                        'type'    => 'string',
                        'default' => '1200px',
                    ),
                    'slInitIndex'        => array(
                        'type'    => 'string',
                        'default' => '0',
                    ),
                    'slPerPage'      => array(
                        'type'    => 'string',
                        'default' => '3',
                    ),
                    'colGap'          => array(
                        'type'    => 'number',
                        'default' => '20',
                    ),
                    'slPerMove'      => array(
                        'type'    => 'string',
                        'default' => '1',
                    ),
                    'slAutoplay'     => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'slSpeed'        => array(
                        'type'    => 'string',
                        'default' => '400',
                    ),
                    'slInterval'     => array(
                        'type'    => 'string',
                        'default' => '5000',
                    ),
                    'slRewind'       => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'slShowArrows'       => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'slShowPagination'   => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'slDraggable'         => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'slPauseOnHover' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'slAriaLabel' => array(
                        'type'    => 'string',
                        'default' => 'My Favorite Posts',
                    ),
                    'slLazyLoad'     => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'slPreloadPages' => array(
                        'type'    => 'string',
                        'default' => '1',
                    ),
                    'slWheel'        => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'slKeyboard'     => array(
                        'type'    => 'string',
                        'default' => 'global',
                    ),
                    'slDirection'    => array(
                        'type'    => 'string',
                        'default' => 'ltr',
                    ),
                ),
            ),
            'fancypost/ajax-filter' => array(
                'title'           => 'Ajax & Filter',
                'render_callback' => array($this, 'frhd_render_ajax_filter'),
                'attributes'      => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'maxWidth' => array(
                        'type'    => 'string',
                        'default' => '1200px',
                    ),
                    'paginAlign' => array(
                        'type'    => 'string',
                        'default' => 'center',
                    ),
                    'thePostType' => array(
                        'type'    => 'string',
                        'default' => 'posts',
                    ),
                    'postsPerCol' => array(
                        'type'    => 'string',
                        'default' => '3',
                    ),
                    'columnGap' => array(
                        'type'    => 'string',
                        'default' => '30px',
                    ),
                    'rowGap' => array(
                        'type'    => 'string',
                        'default' => '60px',
                    ),
                    'roundedCornerSize' => array(
                        'type'    => 'string',
                        'default' => '16px',
                    ),
                    'hasEqualHeight' => array(
                        'type'    => 'boolean',
                        'default' => 'true',
                    ),
                    'equalHeight' => array(
                        'type'    => 'string',
                        'default' => '240px',
                    ),
                    'theCategories' => array(
                        'type'    => 'array',
                    ),
                    'selectedCats' => array(
                        'type'    => 'array',
                    ),
                    'totalPost' => array(
                        'type'    => 'string',
                        'default' => '30',
                    ),
                    'hasCurrentPost' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'postOrderBy' => array(
                        'type'    => 'string',
                        'default' => 'date',
                    ),
                    'postOrder' => array(
                        'type'    => 'string',
                        'default' => 'desc',
                    ),
                    'postsPerPage' => array(
                        'type'    => 'string',
                        'default' => '6',
                    ),
                    'postOrder' => array(
                        'type'    => 'string',
                        'default' => 'desc',
                    ),
                    'postThumbSize' => array(
                        'type'    => 'string',
                        'default' => 'medium_large',
                    ),
                    'postTitleTag' => array(
                        'type'    => 'string',
                        'default' => 'h2',
                    ),
                    'filterButtonBorderColor' => array(
                        'type'    => 'string',
                        'default' => '#BFC3CF',
                    ),
                    'filterButtonBgColor' => array(
                        'type'    => 'string',
                        'default' => '#F35D36',
                    ),
                    'filterActivebtnColor' => array(
                        'type'    => 'string',
                        'default' => '#fff',
                    ),
                    'postButtonTextColor' => array(
                        'type'    => 'string',
                        'default' => '#F35D36',
                    ),
                    'postColumnBorderColor' => array(
                        'type'    => 'string',
                        'default' => '#D4D7DF',
                    ),
                    'postTitleColor' => array(
                        'type'    => 'string',
                        'default' => '#15151E',
                    ),
                    'postMetaColor' => array(
                        'type'    => 'string',
                        'default' => '#6A738E',
                    ),
                    'hasCompLinked' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasLinkNewTab' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasLinkInimage' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasNofollowLink' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                ),
            ),
            'fancypost/notice-box' => array(
                'title'           => 'Notice Box',
                'attributes'      => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'noticeTitle' => array(
                        'type'     => 'string',
                        array(
                            'source'   => 'text',
                            'selector' => 'h4',
                        ),
                        'default'  => 'Notice box title',
                    ),
                    'noticeContent' => array(
                        'type'     => 'string',
                        array(
                            'source'   => 'text',
                            'selector' => 'p',
                        ),
                        'default'  => 'Attention all employees: Kindly note that there will be a team meeting tomorrow at 10:00 AM in the conference room. Your attendance is greatly appreciated. Thank you.',
                    ),
                    'titleTag' => array(
                        'type' => 'string',
                        'default' => 'h4',
                    ),
                    'maxWidth' => array(
                        'type'    => 'string',
                        'default' => '1200px',
                    ),
                    'noticeTopBgColor' => array(
                        'type' => 'string',
                        'default' => '#667eea',
                    ),
                    'titleColor' => array(
                        'type' => 'string',
                        'default' => '#fff',
                    ),
                    'contentColor' => array(
                        'type' => 'string',
                        'default' => '#000',
                    ),
                    'contentBgColor' => array(
                        'type' => 'string',
                        'default' => '#fff',
                    ),
                    'borderColor' => array(
                        'type' => 'string',
                        'default' => '#eae8e8',
                    ),
                    'iconColor' => array(
                        'type' => 'string',
                        'default' => '#fff',
                    ),
                    'roundedCornerSize' => array(
                        'type' => 'string',
                        'default' => '10px',
                    ),
                    'noticContentAlign' => array(
                        'type'    => 'string',
                        'default' => 'center',
                    ),
                    'paginAlign' => array(
                        'type'    => 'string',
                        'default' => 'center',
                    ),
                    'hasCompLinked' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasLinkNewTab' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasLinkInimage' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasNofollowLink' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'contIcon'       => array(
                        'type'    => 'string',
                        'default' => 'alert-bell',
                    ),
                    'iconShow'       => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'iconSize'       => array(
                        'type'    => 'number',
                        'default' => 22,
                    ),
                ),
            ),
            'fancypost/author-bio' => array(
                'title'            => 'Author Bio',
                'attributes'       => array(
                    'id'           => array(
                        'type'         => 'string',
                    ),
                    'selectedAuthorId' => array(
                        'type'        => 'number',
                        'default'     => 1,
                    ),
                    'username' => array(
                        'type'        => 'string',
                        'default'     => 'John Dou',
                    ),
                    'avatarUrl' => array(
                        'type'        => 'string',
                        'default'     =>  FPPB_URL . 'public/images/author-bio-avatar.png',
                    ),
                    'description' => array(
                        'type'        => 'string',
                        'selector' => 'p',
                        'default'     => 'Lorem ipsum dolor sit amet consectetur adipiscing elit in, vel volutpat dis cursus porttitor et mattis per, dictumst magna lobortis convallis non urna arcu.',
                    ),
                    'link' => array(
                        'type'        => 'string',
                        'default'     => 'https://google.com',
                    ),
                    'isFromGallery' => array(
                        'type'        => 'boolean',
                        'default'     => false,
                    ),
                    'isEditBio' => array(
                        'type'        => 'boolean',
                        'default'     => false,
                    ),
                    'isRound' => array(
                        'type'        => 'boolean',
                        'default'     => false,
                    ),
                    'authorBioDesignation' => array(
                        'type'     => 'string',
                        array(
                            'source'   => 'text',
                            'selector' => 'p',
                        ),
                        'default'  => 'WordPress Developer at Microters',
                    ),
                    'headingColor' => array(
                        'type'        => 'string',
                        'default'     => '#FD7272',
                    ),
                    'sectionWidth' => array(
                        'type'        => 'string',
                        'default'     => '900px',
                    ),
                    'descriptionSize' => array(
                        'type'        => 'string',
                        'default'     => '20px',
                    ),
                    'descriptionLineHeight' => array(
                        'type'        => 'string',
                        'default'     => '30px',
                    ),
                    'iconSize' => array(
                        'type'        => 'string',
                        'default'     => '24px',
                    ),
                    'HeadingSize' => array(
                        'type'        => 'string',
                        'default'     => '26px',
                    ),
                    'HeadingLineHeight' => array(
                        'type'        => 'string',
                        'default'     => '26px',
                    ),
                    'designationSize' => array(
                        'type'        => 'string',
                        'default'     => '16px',
                    ),
                    'designationLineHeight' => array(
                        'type'        => 'string',
                        'default'     => '24px',
                    ),
                    'iconColor' => array(
                        'type'        => 'string',
                        'default'     => '#353839',
                    ),
                    'deviderColor' => array(
                        'type'        => 'string',
                        'default'     => '#b5bdb73b',
                    ),
                    'sectionBackgroundColor' => array(
                        'type'        => 'string',
                        'default'     => '#F8F8FF',
                    ),
                    'iconBackgroundColor' => array(
                        'type'        => 'string',
                        'default'     => 'transparent',
                    ),
                ),
            ),
            'fancypost/flip-card' => array(
                'title'            => 'Flip Card',
                'attributes'       => array(
                    'id'           => array(
                        'type'         => 'string',
                    ),
                    'splitCard'       => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'flipCardWidth'       => array(
                        'type'    => 'string',
                        'default' => "400px",
                    ),
                    'flipCardHeight'       => array(
                        'type'    => 'string',
                        'default' => "300px",
                    ),
                    'flipCardFrontPicture'       => array(
                        'type'    => 'string',
                        'default' => FPPB_URL . 'public/images/flip-card-bg.jpg',
                    ),
                    'flipCardFrontPicAlt'       => array(
                        'type'    => 'string',
                    ),
                    'backBackgroundColor' => array(
                        'type'        => 'string',
                        'default'     => '#1F2833',
                    ),
                    'backHeadingColor' => array(
                        'type'        => 'string',
                        'default'     => '#fff',
                    ),
                    'backDescriptionColor' => array(
                        'type'        => 'string',
                        'default'     => '#C5C6C7',
                    ),
                    'backLinkColor' => array(
                        'type'        => 'string',
                        'default'     => '#5b97d3',
                    ),
                    'flipCardBorderColor' => array(
                        'type'        => 'string',
                        'default'     => '#88a0a8',
                    ),
                    'frontHeadingColor' => array(
                        'type'        => 'string',
                        'default'     => '#FFFFFF',
                    ),
                    'frontPicureOpacity' => array(
                        'type'        => 'number',
                        'default'     => 50,
                    ),
                    'objectPosition' => array(
                        'type'        => 'string',
                        'default'     => 'center center',
                    ),
                    'flipCardBackHeadingSize' => array(
                        'type'        => 'string',
                        'default'     => '32px',
                    ),
                    'flipCardBackHeadingLineHeight' => array(
                        'type'        => 'string',
                        'default'     => '38px',
                    ),
                    'flipCardFrontHeadingSize' => array(
                        'type'        => 'string',
                        'default'     => '37px',
                    ),
                    'flipCardFrontLineHeight' => array(
                        'type'        => 'string',
                        'default'     => '40px',
                    ),
                    'flipCardFrontHeading' => array(
                        'type'     => 'string',
                        array(
                            'source'   => 'text',
                            'selector' => 'h4',
                        ),
                        'default'  => 'Web Development',
                    ),
                    'flipCardHeading' => array(
                        'type'     => 'string',
                        array(
                            'source'   => 'text',
                            'selector' => 'h4',
                        ),
                        'default'  => 'Build Your Idea',
                    ),
                    'flipCardDescription' => array(
                        'type'     => 'string',
                        array(
                            'source'   => 'text',
                            'selector' => 'p',
                        ),
                        'default'  => 'Lorem ipsum dolor sit amet consectetur adipiscing elit, ultrices nulla aptent enim porttitor. Massa porttitor platea rutrum justo quisque urna lacus duis<br><a href="#" target="_blank" rel="noreferrer noopener">Read more →</a>',
                    ),    
                ),
            ),
            'fancypost/instagram-feed' => array(
                'title'            => 'Instagram-Feed',
                'attributes'       => array(
                    'id'           => array(
                        'type'         => 'string',
                    ),
                    'media'       => array(
                        'type'    => 'array',
                        'default' => [],
                    ),
                    'loader'       => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'token'       => array(
                        'type'    => 'string',
                        'default' => "",
                    ),
                    'instaId'       => array(
                        'type'    => 'string',
                        'default' => "",
                    ),
                    'gridGap'       => array(
                        'type'    => 'string',
                        'default' => "20px",
                    ),
                    'gridColumns'       => array(
                        'type'    => 'string',
                        'default' => "6",
                    ),
                    'containerMaxWidth'       => array(
                        'type'    => 'string',
                        'default' => "1200px",
                    ),
                    'instaUserName'       => array(
                        'type'    => 'string',
                        'default' => "",
                    ),
                    'instaTagLine'       => array(
                        'type'    => 'string',
                        'default' => "We become what we think about!",
                    ),
                ),
            ),
            'fancypost/info-box' => array(
                'title'           => 'Info Box',
                'attributes'      => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'containerMaxWidth'   => array(
                        'type'    => 'string',
                        'default' => "1200px",
                    ),
                    'boxMinHeight'   => array(
                        'type'    => 'string',
                        'default' => "280px",
                    ),
                    'mobileBreakPoint'   => array(
                        'type'    => 'string',
                        'default' => "599px",
                    ),
                    'tabletBreakPoint'   => array(
                        'type'    => 'string',
                        'default' => "920px",
                    ),
                    'boxPadding'   => array(
                        'type'    => 'string',
                        'default' => "40px",
                    ),
                    'perRowColumns'   => array(
                        'type'    => 'number',
                        'default' => 3,
                    ),
                    'counterBackgroundColor' => array(
                        'type'    => 'string',
                        'default' => "#1BC2E4",
                    ),
                    'infoBoxBackgroundColor' => array(
                        'type'    => 'string',
                        'default' => "#FFFFFF",
                    ),
                    'infoBoxHoverColor' => array(
                        'type'    => 'string',
                        'default' => "#cad0ff",
                    ),
                    'headingColor'  => array(
                        'type'    => 'string',
                        'default' => "#003285",
                    ),
                    'descriptionColor'=> array(
                        'type'    => 'string',
                        'default' => "#2A629A",
                    ),
                    'brandColor'=> array(
                        'type'    => 'string',
                        'default' => "#FF7900",
                    ),
                    'iconWidth'=> array(
                        'type'    => 'string',
                        'default' => "60px",
                    ),
                    'iconHeight'=> array(
                        'type'    => 'string',
                        'default' => "60px",
                    ),
                    'headingSize'=> array(
                        'type'    => 'string',
                        'default' => "25px",
                    ),
                    'descriptionSize'=> array(
                        'type'    => 'string',
                        'default' => "17px",
                    ),
                    'animation'=> array(
                        'type'    => 'string',
                        'default' => "",
                    ),
                    'boxUrl'=> array(
                        'type'    => 'string',
                    ),
                    'isBrandColor'=> array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                ),
            ),
            'fancypost/accordion' => array(
                'title'            => 'Info-Box',
                'attributes'       => array(
                    'id'           => array(
                        'type'         => 'string',
                    ),
                    'isVisible'       => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'sectionMaxWidth'       => array(
                        'type'    => 'string',
                        'default' => '750px',
                    ),
                    'accordionHeading'       => array(
                        'type'    => 'string',
                        'default' => '',
                    ),
                    'headingColor'       => array(
                        'type'    => 'string',
                        'default' => '#000000',
                    ),
                    'sectionBg'       => array(
                        'type'    => 'string',
                        'default' => '#d2e4df',
                    ),
                    'itemBg'       => array(
                        'type'    => 'string',
                        'default' => '#FFFFFF',
                    ),
                ),
            ),
            'fancypost/tabs' => array(
                'title'            => 'Tabs',
                'attributes'       => array(
                    'id'           => array(
                        'type'         => 'string',
                    ),
                    'tabTitle'       => array(
                        'type'    => 'string',
                        'default' => 'Tab Title',
                    ),
                    'isVisible'       => array(
                        'type'    => 'boolean',
                        'default' => 'true',
                    ),
                    'sectionMaxWidth'       => array(
                        'type'    => 'string',
                        'default' => '750px',
                    ),
                    'tabHeaderColor'       => array(
                        'type'    => 'string',
                        'default' => '#e5e5e5',
                    ),
                    'titleColor'       => array(
                        'type'    => 'string',
                        'default' => '#7f7f7f',
                    ),
                    'titleHoverColor'       => array(
                        'type'    => 'string',
                        'default' => '#777',
                    ),
                    'titleActiveColor'       => array(
                        'type'    => 'string',
                        'default' => '#00bfff',
                    ),                  
                ),
            ),
            'fancypost/team-member' => array(
                'title'            => 'Team Members',
                'attributes'       => array(
                    'id'           => array(
                        'type'         => 'string',
                    ),
                    'sectionMaxWidth'       => array(
                        'type'    => 'string',
                        'default' => '1200px',
                    ),
                    'headingColor'       => array(
                        'type'    => 'string',
                        'default' => '#334155',
                    ),                 
                    'descriptionColor'       => array(
                        'type'    => 'string',
                        'default' => '#5c6b8d',
                    ),                 
                    'boxBackgroundColor'       => array(
                        'type'    => 'string',
                        'default' => '#ffffff',
                    ),                              
                    'headingSize'       => array(
                        'type'    => 'string',
                        'default' => '50px',
                    ),                              
                    'headingLineHeight'       => array(
                        'type'    => 'string',
                        'default' => '60px',
                    ),                              
                    'descriptionSize'       => array(
                        'type'    => 'string',
                        'default' => '23px',
                    ),                              
                    'descriptionLineHeight'       => array(
                        'type'    => 'string',
                        'default' => '36px',
                    ),                              
                    'btnBgAndOutlineColor'       => array(
                        'type'    => 'string',
                        'default' => '#343090',
                    ),                                                           
                ),
            ),
            'fancypost/image-slider' => array(
                'title'        => 'Image Slider',
                'attributes'   => array(
                    'id'           => array(
                        'type' => 'string',
                    ),
                    'slImages'     => array(
                        'type'    => 'array',
                        'default' => array(),
                    ),
                    'width'        => array(
                        'type'    => 'string',
                        'default' => '1200px',
                    ),
                    'height'       => array(
                        'type'    => 'string',
                    ),
                    'logoHeightMax'       => array(
                        'type'    => 'string',
                    ),
                    'sType'         => array(
                        'type'    => 'string',
                        'default' => 'slide',
                    ),
                    'start'        => array(
                        'type'    => 'string',
                        'default' => '1',
                    ),
                    'perPage'      => array(
                        'type'    => 'string',
                        'default' => '3',
                    ),
                    'gap'          => array(
                        'type'    => 'string',
                        'default' => '20',
                    ),
                    'perMove'      => array(
                        'type'    => 'string',
                        'default' => '1',
                    ),
                    'autoplay'     => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'speed'        => array(
                        'type'    => 'string',
                        'default' => '400',
                    ),
                    'interval'     => array(
                        'type'    => 'string',
                        'default' => '5000',
                    ),
                    'rewind'       => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'padding'      => array(
                        'type'    => 'string',
                        'default' => '0',
                    ),
                    'arrows'       => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'tooltip'       => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'hasBorderCorner' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'pagination'   => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'drag'         => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'pauseOnHover' => array(
                        'type'    => 'boolean',
                        'default' => true,
                    ),
                    'autoScrollVar' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'ariaLabel' => array(
                        'type'    => 'string',
                        'default' => 'FancyPost - Image Slider',
                    ),
                    'lazyLoad'     => array(
                        'type'    => 'sequential',
                        'default' => '0',
                    ),
                    'preloadPages' => array(
                        'type'    => 'string',
                        'default' => '1',
                    ),
                    'wheel'        => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'keyboard'     => array(
                        'type'    => 'string',
                        'default' => 'global',
                    ),
                    'direction'    => array(
                        'type'    => 'string',
                        'default' => 'ltr',
                    ),
                    'title'        => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'caption'      => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'desc'         => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'button'       => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                ),
            ),
            'fancypost/cta-media' => array(
                'title'            => 'CTA & Media',
                'attributes'       => array(
                    'id'           => array(
                        'type'         => 'string',
                    ),
                    'sectionMaxWidth'       => array(
                        'type'    => 'string',
                        'default' => '1200px',
                    ),
                    'headingColor'       => array(
                        'type'    => 'string',
                        'default' => '#334155',
                    ),                 
                    'descriptionColor'       => array(
                        'type'    => 'string',
                        'default' => '#5c6b8d',
                    ),                 
                    'boxBackgroundColor'       => array(
                        'type'    => 'string',
                        'default' => '#ffffff',
                    ),                              
                    'headingSize'       => array(
                        'type'    => 'string',
                        'default' => '47px',
                    ),                              
                    'headingLineHeight'       => array(
                        'type'    => 'string',
                        'default' => '57px',
                    ),                              
                    'descriptionSize'       => array(
                        'type'    => 'string',
                        'default' => '23px',
                    ),                              
                    'descriptionLineHeight'       => array(
                        'type'    => 'string',
                        'default' => '36px',
                    ),                              
                    'btnBgAndOutlineColor'       => array(
                        'type'    => 'string',
                        'default' => '#343090',
                    ),                                                           
                ),
            ),
            'fancypost/progress-circle' => array(
                'title'            => 'Progress Circle',
                'attributes'       => array(
                    'id'           => array(
                        'type'         => 'string',
                    ),
                    'initialProgress'       => array(
                        'type'    => 'number',
                        'default' => 79,
                    ),                                                                           
                ),
            ),
            'fancypost/progress-bar' => array(
                'title'            => 'Progress Bar',
                'attributes'       => array(
                    'id'           => array(
                        'type'         => 'string',
                    ),
                    'sectionMaxWidth'       => array(
                        'type'    => 'string',
                        'default' => '800px',
                    ),                                                                                        
                    'barFillColor'       => array(
                        'type'    => 'string',
                        'default' => '#c5a453',
                    ),                                                                           
                    'sectionTitle'       => array(
                        'type'    => 'string',
                        'default' => 'Breakdown',
                    ),                                                                           
                ),
            ),
            'fancypost/pros-cons' => array(
				'title'        => 'Pros Cons',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'maxWidth' => array(
						'type'    => 'string',
						'default' => '900px',
					),
					'pcBrandColor' => array(
						'type'    => 'string',
						'default' => '#000000',
					),
					'iconColor' => array(
						'type'    => 'string',
						'default' => '#667eea',
					),
					'itemGap' => array(
						'type'    => 'string',
						'default' => '2px',
					),
					'itemDivider' => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
					'dividerColor' => array(
						'type'    => 'string',
						'default' => '#eaeaea',
					),
					'respBreakPoint' => array(
						'type'    => 'string',
						'default' => '781px',
					),
				),
			),
            'fancypost/modal-popup' => array(
                'title'        => 'Modal Popup',
				'attributes'   => array(
					'id'          => array(
						'type' => 'string',
					),
					'modalSectionMaxWidth' => array(
						'type'    => 'string',
						'default' => '1200px',
					),
					'isModalOpen' => array(
						'type'    => 'boolean',
						'default' => 'false',
					),
					'modalText' => array(
						'type'    => 'string',
						'default' => '',
					),
					'buttonText' => array(
						'type'    => 'string',
						'default' => 'Open Modal',
					),
					'contentMaxWidth' => array(
						'type'    => 'string',
						'default' => '700px',
					),
					'contentBackgroundColor' => array(
						'type'    => 'string',
						'default' => ' #fefefe',
					),
					'headingColor' => array(
						'type'    => 'string',
						'default' => ' #1e293b',
					),
					'descriptionColor' => array(
						'type'    => 'string',
						'default' => '#334155',
					),
					'actionButtonBackground' => array(
						'type'    => 'string',
						'default' => '#55555e',
					),
					'actionButtonTextColor' => array(
						'type'    => 'string',
						'default' => '#ffffff',
					),
					'btnPosition' => array(
						'type'    => 'string',
						'default' => 'left',
					),
				),
			),
        );

        foreach ( $blocks as $block_name => $block_data ) {
            register_block_type(
                $block_name,
                array(
                    'api_version'     => 3,
                    'editor_script'   => 'post-block-esnext',
                    'attributes'      => $block_data['attributes'],
                    'editor_style'    => 'post-block-editor',
                    'render_callback' => isset($block_data['render_callback']) ? $block_data['render_callback'] : null,
                )
            );
        }
    }

    /**
     * Post Grid.
     *
     * @param Mixed $frhd_attributes Get attributes from block settings.
     * @return HTML
     */
    public function frhd_render_block_post_grid( $frhd_attributes ) {

        $frhd_this_post_id = get_the_ID();
        $frhd_block_id = isset( $frhd_attributes['id'] ) ? $frhd_attributes['id'] : '';
        $frhd_block_heading = isset( $frhd_attributes['blockHeading'] ) ? $frhd_attributes['blockHeading'] : '';
        $frhd_block_subheading = isset( $frhd_attributes['blockSubheading'] ) ? $frhd_attributes['blockSubheading'] : '';
        $frhd_post_type = isset( $frhd_attributes['thePostType'] ) ? $frhd_attributes['thePostType'] : '';
        $frhd_post_categories = isset( $frhd_attributes['selectedCats'] ) ? $frhd_attributes['selectedCats'] : '';
        $frhd_posts_per_page = isset( $frhd_attributes['postsPerPage'] ) ? $frhd_attributes['postsPerPage'] : '';
        $frhd_post_column = isset( $frhd_attributes['postsPerCol'] ) ? $frhd_attributes['postsPerCol'] : '';
        $frhd_post_grid7_column = isset( $frhd_attributes['grid7postsPerCol'] ) ? $frhd_attributes['grid7postsPerCol'] : '';
        $frhd_post_grid6_column = isset( $frhd_attributes['grid6postsPerCol'] ) ? $frhd_attributes['grid7postsPerCol'] : '';
        $totalPost = isset( $frhd_attributes['totalPost'] ) ? $frhd_attributes['totalPost'] : '';
        $frhd_has_current_post = isset( $frhd_attributes['hasCurrentPost'] ) ? $frhd_attributes['hasCurrentPost'] : '';
        $frhd_post_order_by = isset( $frhd_attributes['postOrderBy'] ) ? $frhd_attributes['postOrderBy'] : '';
        $frhd_post_order = isset( $frhd_attributes['postOrder'] ) ? $frhd_attributes['postOrder'] : '';
        $frhd_post_thumb_size = isset( $frhd_attributes['postThumbSize'] ) ? $frhd_attributes['postThumbSize'] : '';
        $frhd_post_title_html_tag = isset( $frhd_attributes['postTitleTag'] ) ? $frhd_attributes['postTitleTag'] : '';
        $frhd_readmore_btn_txt = isset( $frhd_attributes['readMoreBtnText'] ) ? $frhd_attributes['readMoreBtnText'] : '';
        $frhd_has_col_linked = isset( $frhd_attributes['hasCompLinked'] ) ? $frhd_attributes['hasCompLinked'] : '';
        $frhd_has_linked_img = isset( $frhd_attributes['hasLinkInimage'] ) ? $frhd_attributes['hasLinkInimage'] : '';
        $frhd_has_link_new_tab = isset( $frhd_attributes['hasLinkNewTab'] ) ? $frhd_attributes['hasLinkNewTab'] : '';
        $frhd_has_no_follow_link = isset( $frhd_attributes['hasNofollowLink'] ) ? $frhd_attributes['hasNofollowLink'] : '';
        $frhd_post_layout = isset( $frhd_attributes['postLayout'] ) ? $frhd_attributes['postLayout'] : '';
        $frhd_block_max_width = isset( $frhd_attributes['maxWidth'] ) ? $frhd_attributes['maxWidth'] : '';
        $contentAlign = isset( $frhd_attributes['contentAlign'] ) ? $frhd_attributes['contentAlign'] : '';
        $frhd_posts_col_gap = isset( $frhd_attributes['columnGap'] ) ? $frhd_attributes['columnGap'] : '';
        $rowGap = isset( $frhd_attributes['rowGap'] ) ? $frhd_attributes['rowGap'] : '';
        $frhd_post_thumb_equal_show = isset( $frhd_attributes['hasEqualHeight'] ) ? $frhd_attributes['hasEqualHeight'] : '';
        $frhd_post_thumb_equal_size = isset( $frhd_attributes['equalHeight'] ) ? $frhd_attributes['equalHeight'] : '';
        $roundedCornerSize = isset( $frhd_attributes['roundedCornerSize'] ) ? $frhd_attributes['roundedCornerSize'] : '';
        $frhd_posts_excerpt_word_count = isset( $frhd_attributes['excerptWordCount'] ) ? $frhd_attributes['excerptWordCount'] : '';
        $frhd_post_pagination = isset( $frhd_attributes['hasPagination'] ) ? $frhd_attributes['hasPagination'] : '';
        $frhd_post_pagination_limit = isset( $frhd_attributes['paginationLimit'] ) ? $frhd_attributes['paginationLimit'] : '';
        $paginationType = isset( $frhd_attributes['paginationType'] ) ? $frhd_attributes['paginationType'] : '';
        $frhd_post_pagination_align = isset( $frhd_attributes['paginAlign'] ) ? $frhd_attributes['paginAlign'] : '';
        $frhd_has_prev_next_btn = isset( $frhd_attributes['hasPagPrevNextBtn'] ) ? $frhd_attributes['hasPagPrevNextBtn'] : '';
        $frhd_prev_btn_text = isset( $frhd_attributes['pagPrevBtnText'] ) ? $frhd_attributes['pagPrevBtnText'] : '';
        $frhd_next_btn_text = isset( $frhd_attributes['pagNextBtnText'] ) ? $frhd_attributes['pagNextBtnText'] : '';
        $onLoadPagin = isset( $frhd_attributes['onLoadPagin'] ) ? $frhd_attributes['onLoadPagin'] : '';
        $frhd_post_thumb_show = isset( $frhd_attributes['showPostImg'] ) ? $frhd_attributes['showPostImg'] : '';
        $frhd_post_title_show = isset( $frhd_attributes['showPostTitle'] ) ? $frhd_attributes['showPostTitle'] : '';
        $frhd_post_author_show = isset( $frhd_attributes['showPostAuth'] ) ? $frhd_attributes['showPostAuth'] : '';
        $frhd_post_date_show = isset( $frhd_attributes['showPostDate'] ) ? $frhd_attributes['showPostDate'] : '';
        $frhd_post_comment_show = isset( $frhd_attributes['showPostComment'] ) ? $frhd_attributes['showPostComment'] : '';
        $frhd_post_view_count = isset( $frhd_attributes['showPostViewCount'] ) ? $frhd_attributes['showPostViewCount'] : '';
        $frhd_post_taxonomy_show = isset( $frhd_attributes['showPostTaxonomy'] ) ? $frhd_attributes['showPostTaxonomy'] : '';
        $frhd_post_excerpt_show = isset( $frhd_attributes['showPostExcerpt'] ) ? $frhd_attributes['showPostExcerpt'] : '';
        $frhd_post_btn_show = isset( $frhd_attributes['showPostButton'] ) ? $frhd_attributes['showPostButton'] : '';
        $showPostReadTime = isset( $frhd_attributes['showPostReadTime'] ) ? $frhd_attributes['showPostReadTime'] : '';
        $frhd_post_love_react = isset( $frhd_attributes['showPostLoveReact'] ) ? $frhd_attributes['showPostLoveReact'] : '';
        $postBodyColor = isset( $frhd_attributes['postBodyColor'] ) ? $frhd_attributes['postBodyColor'] : '';
        $postBodyBorderColor = isset( $frhd_attributes['postBodyBorderColor'] ) ? $frhd_attributes['postBodyBorderColor'] : '';
        $post_overlay_color = isset( $frhd_attributes['OverlayColor'] ) ? $frhd_attributes['OverlayColor'] : '';
        $post_opacity = isset( $frhd_attributes['OverlayOpacity'] ) ? $frhd_attributes['OverlayOpacity'] : '';
        $taxonomyColor = isset( $frhd_attributes['taxonomyColor'] ) ? $frhd_attributes['taxonomyColor'] : '';
        $frhd_post_taxonomy_bg_color = isset( $frhd_attributes['taxonomyBGcolor'] ) ? $frhd_attributes['taxonomyBGcolor'] : '';
        $taxonomyPrecolor = isset( $frhd_attributes['taxonomyPrecolor'] ) ? $frhd_attributes['taxonomyPrecolor'] : '';
        $frhd_post_title_color = isset( $frhd_attributes['postTitleColor'] ) ? $frhd_attributes['postTitleColor'] : '';
        $frhd_posts_meta_color = isset( $frhd_attributes['postMetaColor'] ) ? $frhd_attributes['postMetaColor'] : '';
        $postDateBGColor = isset( $frhd_attributes['postDateBGColor'] ) ? $frhd_attributes['postDateBGColor'] : '';
        $frhd_posts_meta_icon_color = isset( $frhd_attributes['postMetaIconColor'] ) ? $frhd_attributes['postMetaIconColor'] : '';
        $frhd_post_desc_color = isset( $frhd_attributes['postDescColor'] ) ? $frhd_attributes['postDescColor'] : '';
        $postAuthorColor = isset( $frhd_attributes['postAuthorColor'] ) ? $frhd_attributes['postAuthorColor'] : '';
        $frhd_post_btn_txt_color = isset( $frhd_attributes['postBtnTextColor'] ) ? $frhd_attributes['postBtnTextColor'] : '';
        $frhd_post_btn_color = isset( $frhd_attributes['postBtnColor'] ) ? $frhd_attributes['postBtnColor'] : '';
        $hoverBtnTextColor = isset( $frhd_attributes['hoverBtnTextColor'] ) ? $frhd_attributes['hoverBtnTextColor'] : '';
        $frhd_post_btn_hover_color = isset( $frhd_attributes['hoverBtnColor'] ) ? $frhd_attributes['hoverBtnColor'] : '';
        $readingTimeColor = isset( $frhd_attributes['readingTimeColor'] ) ? $frhd_attributes['readingTimeColor'] : '';
        $readingTimeIconColor = isset( $frhd_attributes['readingTimeIconColor'] ) ? $frhd_attributes['readingTimeIconColor'] : '';
        $frhd_post_pagination_num_color = isset( $frhd_attributes['paginationNumColor'] ) ? $frhd_attributes['paginationNumColor'] : '';
        $paginationBGColor = isset( $frhd_attributes['paginationBGColor'] ) ? $frhd_attributes['paginationBGColor'] : '';
        $frhd_post_pagi_active_num_color = isset( $frhd_attributes['pagiActiveNumColor'] ) ? $frhd_attributes['pagiActiveNumColor'] : '';
        $frhd_post_pagi_active_bg_color = isset( $frhd_attributes['pagiActiveBGColor'] ) ? $frhd_attributes['pagiActiveBGColor'] : '';

        // Animations
        $frhd_post_item_animation = isset( $frhd_attributes['postItemAnimation'] ) ? $frhd_attributes['postItemAnimation'] : '';
        $frhd_post_img_animation  = isset( $frhd_attributes['postImageAnimation'] ) ? $frhd_attributes['postImageAnimation'] : '';
        $frhd_post_btn_animation  = isset( $frhd_attributes['postButtonAnimation'] ) ? $frhd_attributes['postButtonAnimation'] : '';

        /**
         * Font-Families
         */
        $frhd_post_sec_heading_ff = isset( $frhd_attributes['SectionHeading']['PostFontFamilyCommon'][0] ) ? $frhd_attributes['SectionHeading']['PostFontFamilyCommon'][0] : '';
        $frhd_post_sec_subheading_ff = isset( $frhd_attributes['SectionSubHeading']['PostFontFamilyCommon'][0] ) ? $frhd_attributes['SectionSubHeading']['PostFontFamilyCommon'][0] : '';
        $frhd_post_title_font_family = isset( $frhd_attributes['PostTitleTypo']['PostFontFamilyCommon'][0] ) ? $frhd_attributes['PostTitleTypo']['PostFontFamilyCommon'][0] : '';
        $frhd_post_desc_font_family = isset( $frhd_attributes['PostDescriptionTypo']['PostFontFamilyCommon'][0] ) ? $frhd_attributes['PostDescriptionTypo']['PostFontFamilyCommon'][0] : '';
        $frhd_post_meta_font_family = isset( $frhd_attributes['PostMetaTypo']['PostFontFamilyCommon'][0] ) ? $frhd_attributes['PostMetaTypo']['PostFontFamilyCommon'][0] : '';
        $frhd_post_cat_font_family = isset( $frhd_attributes['PostCategoryTypo']['PostFontFamilyCommon'][0] ) ? $frhd_attributes['PostCategoryTypo']['PostFontFamilyCommon'][0] : '';
        $frhd_post_button_font_family = isset( $frhd_attributes['PostButtonTypo']['PostFontFamilyCommon'][0] ) ? $frhd_attributes['PostButtonTypo']['PostFontFamilyCommon'][0] : '';
        $frhd_post_auth_ff = isset( $frhd_attributes['PostAuthorTypo']['PostFontFamilyCommon'][0] ) ? $frhd_attributes['PostAuthorTypo']['PostFontFamilyCommon'][0] : '';
        $frhd_post_pagin_font_family = isset( $frhd_attributes['PostPaginationTypo']['PostFontFamilyCommon'][0] ) ? $frhd_attributes['PostPaginationTypo']['PostFontFamilyCommon'][0] : '';

        /**
         * Other Typographies.
         */
        $frhd_post_title_font_size = isset( $frhd_attributes['PostTitleTypo']['PostFontSize'] ) ? $frhd_attributes['PostTitleTypo']['PostFontSize'] : '';
        $frhd_post_title_font_weight = isset( $frhd_attributes['PostTitleTypo']['PostFontWeight'] ) ? $frhd_attributes['PostTitleTypo']['PostFontWeight'] : '';
        $frhd_post_title_line_height = isset( $frhd_attributes['PostTitleTypo']['PostFontHeight'] ) ? $frhd_attributes['PostTitleTypo']['PostFontHeight'] : '';
        $frhd_post_title_letter_spacing = isset( $frhd_attributes['PostTitleTypo']['PostLetterSpacing'] ) ? $frhd_attributes['PostTitleTypo']['PostLetterSpacing'] : '';
        $frhd_post_title_text_transform = isset( $frhd_attributes['PostTitleTypo']['PostTextTransform'] ) ? $frhd_attributes['PostTitleTypo']['PostTextTransform'] : '';
        $frhd_post_title_font_style = isset( $frhd_attributes['PostTitleTypo']['PostTextStyle'] ) ? $frhd_attributes['PostTitleTypo']['PostTextStyle'] : '';
        $frhd_post_title_text_decoration = isset( $frhd_attributes['PostTitleTypo']['PostTextDecorationStyle'] ) ? $frhd_attributes['PostTitleTypo']['PostTextDecorationStyle'] : '';
        // Meta Typos.
        $frhd_post_meta_font_size = isset( $frhd_attributes['PostMetaTypo']['PostFontSize'] ) ? $frhd_attributes['PostMetaTypo']['PostFontSize'] : '';
        $frhd_post_meta_font_weight = isset( $frhd_attributes['PostMetaTypo']['PostFontWeight'] ) ? $frhd_attributes['PostMetaTypo']['PostFontWeight'] : '';
        $frhd_post_meta_line_height = isset( $frhd_attributes['PostMetaTypo']['PostFontHeight'] ) ? $frhd_attributes['PostMetaTypo']['PostFontHeight'] : '';
        $frhd_post_meta_letter_spacing = isset( $frhd_attributes['PostMetaTypo']['PostLetterSpacing'] ) ? $frhd_attributes['PostMetaTypo']['PostLetterSpacing'] : '';
        $frhd_post_meta_text_transform = isset( $frhd_attributes['PostMetaTypo']['PostTextTransform'] ) ? $frhd_attributes['PostMetaTypo']['PostTextTransform'] : '';
        $frhd_post_meta_font_style = isset( $frhd_attributes['PostMetaTypo']['PostTextStyle'] ) ? $frhd_attributes['PostMetaTypo']['PostTextStyle'] : '';
        $frhd_post_meta_text_decoration = isset( $frhd_attributes['PostMetaTypo']['PostTextDecorationStyle'] ) ? $frhd_attributes['PostMetaTypo']['PostTextDecorationStyle'] : '';
        $frhd_post_meta_icon_size = isset( $frhd_attributes['PostMetaTypo']['PostFontSize'] ) ? $frhd_attributes['PostMetaTypo']['PostFontSize'] : '';
        // Description Typos.
        $frhd_post_desc_font_size = isset( $frhd_attributes['PostDescriptionTypo']['PostFontSize'] ) ? $frhd_attributes['PostDescriptionTypo']['PostFontSize'] : '';
        $frhd_post_desc_font_weight = isset( $frhd_attributes['PostDescriptionTypo']['PostFontWeight'] ) ? $frhd_attributes['PostDescriptionTypo']['PostFontWeight'] : '';
        $frhd_post_desc_line_height = isset( $frhd_attributes['PostDescriptionTypo']['PostFontHeight'] ) ? $frhd_attributes['PostDescriptionTypo']['PostFontHeight'] : '';
        $frhd_post_desc_letter_spacing = isset( $frhd_attributes['PostDescriptionTypo']['PostLetterSpacing'] ) ? $frhd_attributes['PostDescriptionTypo']['PostLetterSpacing'] : '';
        $frhd_post_desc_text_transform = isset( $frhd_attributes['PostDescriptionTypo']['PostTextTransform'] ) ? $frhd_attributes['PostDescriptionTypo']['PostTextTransform'] : '';
        $frhd_post_desc_font_style = isset( $frhd_attributes['PostDescriptionTypo']['PostTextStyle'] ) ? $frhd_attributes['PostDescriptionTypo']['PostTextStyle'] : '';
        $frhd_post_desc_text_decoration = isset( $frhd_attributes['PostDescriptionTypo']['PostTextDecorationStyle'] ) ? $frhd_attributes['PostDescriptionTypo']['PostTextDecorationStyle'] : '';
        // Button Typos.
        $frhd_post_btn_font_size = isset( $frhd_attributes['PostButtonTypo']['PostFontSize'] ) ? $frhd_attributes['PostButtonTypo']['PostFontSize'] : '';
        $frhd_post_btn_font_weight = isset( $frhd_attributes['PostButtonTypo']['PostFontWeight'] ) ? $frhd_attributes['PostButtonTypo']['PostFontWeight'] : '';
        $frhd_post_btn_line_height = isset( $frhd_attributes['PostButtonTypo']['PostFontHeight'] ) ? $frhd_attributes['PostButtonTypo']['PostFontHeight'] : '';
        $frhd_post_btn_letter_spacing = isset( $frhd_attributes['PostButtonTypo']['PostLetterSpacing'] ) ? $frhd_attributes['PostButtonTypo']['PostLetterSpacing'] : '';
        $frhd_post_btn_text_transform = isset( $frhd_attributes['PostButtonTypo']['PostTextTransform'] ) ? $frhd_attributes['PostButtonTypo']['PostTextTransform'] : '';
        $frhd_post_btn_font_style = isset( $frhd_attributes['PostButtonTypo']['PostTextStyle'] ) ? $frhd_attributes['PostButtonTypo']['PostTextStyle'] : '';
        $frhd_post_btn_text_decoration = isset( $frhd_attributes['PostButtonTypo']['PostTextDecorationStyle'] ) ? $frhd_attributes['PostButtonTypo']['PostTextDecorationStyle'] : '';
        // Pagination Typos.
        $frhd_post_pagi_font_size = isset( $frhd_attributes['PostPaginationTypo']['PostFontSize'] ) ? $frhd_attributes['PostPaginationTypo']['PostFontSize'] : '';
        $frhd_post_pagi_font_weight = isset( $frhd_attributes['PostPaginationTypo']['PostFontWeight'] ) ? $frhd_attributes['PostPaginationTypo']['PostFontWeight'] : '';
        $frhd_post_pagi_line_height = isset( $frhd_attributes['PostPaginationTypo']['PostFontHeight'] ) ? $frhd_attributes['PostPaginationTypo']['PostFontHeight'] : '';
        $frhd_post_pagi_letter_spacing = isset( $frhd_attributes['PostPaginationTypo']['PostLetterSpacing'] ) ? $frhd_attributes['PostPaginationTypo']['PostLetterSpacing'] : '';
        $frhd_post_pagi_text_transform = isset( $frhd_attributes['PostPaginationTypo']['PostTextTransform'] ) ? $frhd_attributes['PostPaginationTypo']['PostTextTransform'] : '';
        $frhd_post_pagi_font_style = isset( $frhd_attributes['PostPaginationTypo']['PostTextStyle'] ) ? $frhd_attributes['PostPaginationTypo']['PostTextStyle'] : '';
        $frhd_post_pagi_text_decoration = isset( $frhd_attributes['PostPaginationTypo']['PostTextDecorationStyle'] ) ? $frhd_attributes['PostPaginationTypo']['PostTextDecorationStyle'] : '';
        /**
         * Plugin Settings Global.
         */
        $fpost_plugin_options_root  = get_option( '_fpblock_options' );
        $frhd_heart_react_attr      = '';

        /**
         * Font family rendering.
         */
        $frhd_font_family_render          = array( $frhd_post_sec_heading_ff, $frhd_post_sec_subheading_ff, $frhd_post_title_font_family, $frhd_post_desc_font_family, $frhd_post_meta_font_family, $frhd_post_cat_font_family, $frhd_post_button_font_family, $frhd_post_auth_ff, $frhd_post_pagin_font_family );
        $frhd_font_family_render_no_empty = array_filter(
            $frhd_font_family_render,
            function( $ff_value ) {

                return ! is_null( $ff_value ) && '' !== $ff_value;
            }
        );
        $frhd_font_family_render_imploded = implode( '&family=', $frhd_font_family_render_no_empty );
        $frhd_font_family_render_import   = '';
        if ( ! empty( $frhd_font_family_render_imploded ) ) {

            $frhd_font_family_render_url    = str_replace( ' ', '+', 'url("https://fonts.googleapis.com/css2?family=' . $frhd_font_family_render_imploded . '&display=swap");' );
            $frhd_font_family_render_import = '@import ' . $frhd_font_family_render_url;
        }

        /**
         * Thumbnail Equal Size.
         */
        $frhd_post_thumb_equal_size_render = '';
        if ( $frhd_post_thumb_equal_show ) {

            $frhd_post_thumb_equal_size_render = 'max-height:' . $frhd_post_thumb_equal_size . ';';
        }

        // Protect against arbitrary paged values.
        if ( is_front_page() ) {

            $frhd_paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
        } else {

            $frhd_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        }

        // Pagination working with offset.
        // $frhd_post_query_offset_rend = ( $frhd_paged - 1 ) * $frhd_posts_per_page + $frhd_post_query_offset;
        $frhd_post_query_offset_rend = ( $frhd_paged - 1 ) * (int) $frhd_posts_per_page + 0;

        if ( 'posts' === $frhd_post_type || 'pages' === $frhd_post_type ) {

            $frhd_post_type = rtrim( $frhd_post_type, 's' );
        }
        
        $frhd_query_args = array(
            'posts_per_page' => $frhd_posts_per_page,
            'post_status'    => 'publish',
            'post_type'      => $frhd_post_type,
            'cat'            => $frhd_post_categories,
            'order'          => $frhd_post_order,
            'orderby'        => $frhd_post_order_by,
            'paged'          => $frhd_paged,
            'offset'         => $frhd_post_query_offset_rend,
            'post__not_in'   => $frhd_has_current_post ? array( get_the_ID() ) : '',
        );

        $frhd_post_query = new WP_Query( $frhd_query_args );

        if ( $frhd_post_query->have_posts() ) {

            ob_start();

            require POST_BLOCK_DIR . 'public/partials/post-grid/post-grid-1.php';
            wp_enqueue_style( 'post-grid-1' );

            // Pagination.
            if ( $frhd_post_pagination ) {

                $frhd_big = 999999999; // Need an unlikely integer.

                if ( $frhd_post_pagination_limit ) {

                    $frhd_page_limit = min( $frhd_post_pagination_limit, $frhd_post_query->max_num_pages );
                } else {

                    $frhd_page_limit = max( 1, $frhd_post_query->max_num_pages );
                }
                $frhd_page_limit = isset( $frhd_page_limit ) ? $frhd_page_limit : $frhd_posts_per_page;

                echo '<div class="frhd__paginate">';
                $frhd_arg = array(
                    'base'      => str_replace( $frhd_big, '%#%', esc_url( get_pagenum_link( $frhd_big ) ) ),
                    'format'    => '?paged=%#%',
                    'current'   => $frhd_paged,
                    'total'     => $frhd_page_limit,
                    'prev_next' => $frhd_has_prev_next_btn,
                    'prev_text' => $frhd_prev_btn_text,
                    'next_text' => $frhd_next_btn_text,
                );
                echo wp_kses_post( paginate_links( $frhd_arg ) );
                echo '</div>'; // frhd__paginate.
            }

            echo '</div>'; // frhd__post-block-wrapper.

            return ob_get_clean();
        } else {

            return '<p>' . __( 'No posts found!', 'post-block' ) . '</p>';
        }
    }

    /**
     * Post List.
     *
     * @param Mixed $frhd_attributes Get attributes from block settings.
     * @return HTML
     */
    public function frhd_render_block_post_list( $frhd_attributes ) {

        $frhd_postlist_block_id = isset( $frhd_attributes['id'] ) ? $frhd_attributes['id'] : '0';
        $frhd_post_type         = isset( $frhd_attributes['thePostType'] ) ? $frhd_attributes['thePostType'] : '';

        if ( 'posts' === $frhd_post_type || 'pages' === $frhd_post_type ) {

            $frhd_post_type = rtrim( $frhd_post_type, 's' );
        }

        $frhd_args_post_list = array(
            'post_type'      => $frhd_post_type,
            'posts_per_page' => 6,
            'order'          => 'DESC',
        );

        $frhd_post_query = new WP_Query( $frhd_args_post_list );

        ob_start();

        if ( $frhd_post_query->have_posts() ) {

            require POST_BLOCK_DIR . 'public/partials/post-list/post-list-1.php';

        } else {

            return '<p>No posts found!</p>';
        }
        return ob_get_clean();
    }

    /**
     * Post Trisect.
     *
     * @param Mixed $frhd_attributes Get attributes from block settings.
     * @return HTML
     */
    public function frhd_render_block_post_trisect( $frhd_attributes ) {

        $frhd_tri_block_id            = isset( $frhd_attributes['id'] ) ? $frhd_attributes['id'] : '0';
        $frhd_tri_post_set            = isset( $frhd_attributes['triPostSet'] ) ? $frhd_attributes['triPostSet'] : '3';
        $frhd_tri_cats                = isset( $frhd_attributes['triCategories'] ) ? $frhd_attributes['triCategories'] : 'random';
        $frhd_tri_is_custom_height    = isset( $frhd_attributes['isTriCustomHeight'] ) ? $frhd_attributes['isTriCustomHeight'] : true;
        $frhd_tri_is_reverse_post_col = isset( $frhd_attributes['isReversePostSetCol'] ) ? $frhd_attributes['isReversePostSetCol'] : false;
        $frhd_tri_is_featured_center  = isset( $frhd_attributes['triIsFeaturedCenter'] ) ? $frhd_attributes['triIsFeaturedCenter'] : false;
        $frhd_tri_custom_height       = isset( $frhd_attributes['triCustomHeight'] ) ? $frhd_attributes['triCustomHeight'] : '570px';
        $frhd_tri_col_gap             = isset( $frhd_attributes['triColGap'] ) ? $frhd_attributes['triColGap'] : '15';
        $frhd_tri_row_gap             = isset( $frhd_attributes['triRowGap'] ) ? $frhd_attributes['triRowGap'] : '15';
        $frhd_tri_rounded_size        = isset( $frhd_attributes['triRoundedCorner'] ) ? $frhd_attributes['triRoundedCorner'] : '5';
        $frhd_tri_excerpt_size        = isset( $frhd_attributes['triExcerptSize'] ) ? $frhd_attributes['triExcerptSize'] : '30';
        $frhd_tri_feat_thumb_size     = isset( $frhd_attributes['triFeatThumbSize'] ) ? $frhd_attributes['triFeatThumbSize'] : 'medium_large';
        $frhd_tri_asd_thumb_size      = isset( $frhd_attributes['triAsdThumbSize'] ) ? $frhd_attributes['triAsdThumbSize'] : 'medium';
    
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


        $frhd_args_post_list = array(
            'post_type'      => 'post',
            'posts_per_page' => $frhd_tri_post_set,
            'cat'            => $frhd_tri_cats,
            'order'          => 'DESC',
        );

        $frhd_post_query = new WP_Query( $frhd_args_post_list );

        ob_start();

        if ( $frhd_post_query->have_posts() ) {

            require POST_BLOCK_DIR . 'public/partials/post-trisect/post-trisect-1.php';

        } else {

            return '<p>No posts found!</p>';
        }

        return ob_get_clean();
    }

    /**
     * Post Slider.
     *
     * @param Mixed $frhd_attributes Get attributes from block settings.
     * @return HTML
     */
    public function frhd_render_block_post_slider( $frhd_attributes ) {

        $frhd_fp_slider_id      = isset( $frhd_attributes['id'] ) ? $frhd_attributes['id'] : '';
        $frhd_fps_post_type     = isset( $frhd_attributes['thePostType'] ) ? $frhd_attributes['thePostType'] : '';
        $frhd_fps_selected_cats = isset( $frhd_attributes['selectedCats'] ) ? $frhd_attributes['selectedCats'] : '';
        $frhd_total_post        = isset( $frhd_attributes['totalPost'] ) ? $frhd_attributes['totalPost'] : '';
        $frhd_hasCurrentPost = isset( $frhd_attributes['hasCurrentPost'] ) ? $frhd_attributes['hasCurrentPost'] : '';
        $frhd_fps_order_by      = isset( $frhd_attributes['postOrderBy'] ) ? $frhd_attributes['postOrderBy'] : '';
        $frhd_fps_post_order    = isset( $frhd_attributes['postOrder'] ) ? $frhd_attributes['postOrder'] : '';
        $frhd_postThumbSize = isset( $frhd_attributes['postThumbSize'] ) ? $frhd_attributes['postThumbSize'] : '';
        $frhd_post_title_tag    = isset( $frhd_attributes['postTitleTag'] ) ? $frhd_attributes['postTitleTag'] : '';
        $frhd_readmore_btn_txt  = isset( $frhd_attributes['readMoreBtnText'] ) ? $frhd_attributes['readMoreBtnText'] : '';
        $frhd_fp_slider_width = isset( $frhd_attributes['slWidth'] ) ? $frhd_attributes['slWidth'] : '';
        $frhd_fp_slider_height  = isset( $frhd_attributes['slHeight'] ) ? $frhd_attributes['slHeight'] : '';
        $frhd_sl_init_index     = isset( $frhd_attributes['slInitIndex'] ) ? $frhd_attributes['slInitIndex'] : '';
        $frhd_sl_per_page = isset( $frhd_attributes['slPerPage'] ) ? $frhd_attributes['slPerPage'] : '';
        $frhd_sl_col_gap        = isset( $frhd_attributes['colGap'] ) ? $frhd_attributes['colGap'] : '';
        $frhd_sl_per_move       = isset( $frhd_attributes['slPerMove'] ) ? $frhd_attributes['slPerMove'] : '';
        $frhd_sl_autoplay       = isset( $frhd_attributes['slAutoplay'] ) ? $frhd_attributes['slAutoplay'] : '';
        $frhd_sl_speed          = isset( $frhd_attributes['slSpeed'] ) ? $frhd_attributes['slSpeed'] : '';
        $frhd_sl_interval       = isset( $frhd_attributes['slInterval'] ) ? $frhd_attributes['slInterval'] : '';
        $frhd_sl_rewind         = isset( $frhd_attributes['slRewind'] ) ? $frhd_attributes['slRewind'] : '';
        $frhd_sl_show_arrows    = isset( $frhd_attributes['slShowArrows'] ) ? $frhd_attributes['slShowArrows'] : '';
        $frhd_sl_show_pagin     = isset( $frhd_attributes['slShowPagination'] ) ? $frhd_attributes['slShowPagination'] : '';
        $frhd_sl_draggable      = isset( $frhd_attributes['slDraggable'] ) ? $frhd_attributes['slDraggable'] : '';
        $frhd_sl_pause_on_hover = isset( $frhd_attributes['slPauseOnHover'] ) ? $frhd_attributes['slPauseOnHover'] : '';
        $frhd_sl_aria_label     = isset( $frhd_attributes['slAriaLabel'] ) ? $frhd_attributes['slAriaLabel'] : '';
        $frhd_slPreloadPages    = isset( $frhd_attributes['slPreloadPages'] ) ? $frhd_attributes['slPreloadPages'] : '';
        $frhd_slWheel           = isset( $frhd_attributes['slWheel'] ) ? $frhd_attributes['slWheel'] : '';
        $frhd_slKeyboard        = isset( $frhd_attributes['slKeyboard'] ) ? $frhd_attributes['slKeyboard'] : '';
        $frhd_sl_direction      = isset( $frhd_attributes['slDirection'] ) ? $frhd_attributes['slDirection'] : '';
        
        // Post type naming.
        if ( 'posts' === $frhd_fps_post_type || 'pages' === $frhd_fps_post_type ) {

            $frhd_fps_post_type = rtrim( $frhd_fps_post_type, 's' );
        }

        // Arguments.
        $frhd_query_slider_args = array(
            'post_status'    => 'publish',
            'post_type'      => $frhd_fps_post_type,
            'cat'            => $frhd_fps_selected_cats,
            'order'          => $frhd_fps_post_order,
            'orderby'        => $frhd_fps_order_by,
            'posts_per_page' => $frhd_total_post,
            // 'post__not_in'   => $frhd_has_current_post ? array( get_the_ID() ) : '',
        );

        $frhd_post_query_slider = new WP_Query( $frhd_query_slider_args );

        if ( $frhd_post_query_slider->have_posts() ) {

            ob_start();

            // Including the templates.
		    require POST_BLOCK_DIR . 'public/partials/post-slider/post-slider-1.php';

            return ob_get_clean();
        } else {

            return '<p>' . __( 'No posts found!', 'post-block' ) . '</p>';
        }

    }

    /**
	 * Unregister blocks with switcher.
	 */
	public function fpblock_global_unset_blocks( $allowed_blocks ) {

		// Get all the registered blocks.
		$blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
	
		/**
		 * Plugin Settings Global.
		 */
        $frhd_admin_opt_root              = get_option( '_fpblock_options' );
        $fpblock_allowed_post_grid        = isset( $frhd_admin_opt_root['fpblock_block_post_grid'] ) ? $frhd_admin_opt_root['fpblock_block_post_grid'] : '';
        $fpblock_allowed_interactive      = isset( $frhd_admin_opt_root['fpblock_block_post_grid_interactive'] ) ? $frhd_admin_opt_root['fpblock_block_post_grid_interactive'] : '';
        $fpblock_allowed_post_list        = isset( $frhd_admin_opt_root['fpblock_block_post_list'] ) ? $frhd_admin_opt_root['fpblock_block_post_list'] : '';
        $fpblock_allowed_post_trisect     = isset( $frhd_admin_opt_root['fpblock_block_post_trisect'] ) ? $frhd_admin_opt_root['fpblock_block_post_trisect'] : '';
        $fpblock_allowed_post_slider      = isset( $frhd_admin_opt_root['fpblock_block_post_slider'] ) ? $frhd_admin_opt_root['fpblock_block_post_slider'] : '';
        $fpblock_allowed_ajax_and_filter  = isset( $frhd_admin_opt_root['fpblock_block_ajax_and_filter'] ) ? $frhd_admin_opt_root['fpblock_block_ajax_and_filter'] : '';
        $fpblock_allowed_heading          = isset( $frhd_admin_opt_root['fpblock_block_heading'] ) ? $frhd_admin_opt_root['fpblock_block_heading'] : '';
        $fpblock_allowed_heading_effect   = isset( $frhd_admin_opt_root['fpblock_block_heading_effect'] ) ? $frhd_admin_opt_root['fpblock_block_heading_effect'] : '';
        $fpblock_allowed_post_group       = isset( $frhd_admin_opt_root['fpblock_block_post_group'] ) ? $frhd_admin_opt_root['fpblock_block_post_group'] : '';
        $fpblock_allowed_info_box         = isset( $frhd_admin_opt_root['fpblock_block_info_box'] ) ? $frhd_admin_opt_root['fpblock_block_info_box'] : '';
        $fpblock_allowed_notice_box       = isset( $frhd_admin_opt_root['fpblock_block_notice_box'] ) ? $frhd_admin_opt_root['fpblock_block_notice_box'] : '';
        $fpblock_allowed_author_bio       = isset( $frhd_admin_opt_root['fpblock_block_author_bio'] ) ? $frhd_admin_opt_root['fpblock_block_author_bio'] : '';
        $fpblock_allowed_pros_cons        = isset( $frhd_admin_opt_root['fpblock_block_pros_cons'] ) ? $frhd_admin_opt_root['fpblock_block_pros_cons'] : '';
        $fpblock_allowed_advanced_button  = isset( $frhd_admin_opt_root['fpblock_block_advanced_button'] ) ? $frhd_admin_opt_root['fpblock_block_advanced_button'] : '';
        $fpblock_allowed_editorial_rating = isset( $frhd_admin_opt_root['fpblock_block_editorial_rating'] ) ? $frhd_admin_opt_root['fpblock_block_editorial_rating'] : '';
        $fpblock_allowed_video_popup      = isset( $frhd_admin_opt_root['fpblock_block_video_popup'] ) ? $frhd_admin_opt_root['fpblock_block_video_popup'] : '';
        $fpblock_allowed_image_comparison = isset( $frhd_admin_opt_root['fpblock_block_image_comparison'] ) ? $frhd_admin_opt_root['fpblock_block_image_comparison'] : '';
        $fpblock_allowed_table_of_content = isset( $frhd_admin_opt_root['fpblock_block_table_of_content'] ) ? $frhd_admin_opt_root['fpblock_block_table_of_content'] : '';
        $fpblock_allowed_image_slider     = isset( $frhd_admin_opt_root['fpblock_block_image_slider'] ) ? $frhd_admin_opt_root['fpblock_block_image_slider'] : '';
        $fpblock_allowed_team_member      = isset( $frhd_admin_opt_root['fpblock_block_team_member'] ) ? $frhd_admin_opt_root['fpblock_block_team_member'] : '';
        $fpblock_allowed_flip_card        = isset( $frhd_admin_opt_root['fpblock_block_flip_card'] ) ? $frhd_admin_opt_root['fpblock_block_flip_card'] : '';
        $fpblock_allowed_instagram_feed   = isset( $frhd_admin_opt_root['fpblock_block_instagram_feed'] ) ? $frhd_admin_opt_root['fpblock_block_instagram_feed'] : '';

		// Set/Unset blocks through global settings.
		if ( ! $fpblock_allowed_post_grid ) {
			unset( $blocks['fancypost/post-grid'] );
		}
	
		// Return the new list of allowed blocks.
		return array_keys( $blocks );
	
	}
}
