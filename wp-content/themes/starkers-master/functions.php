<?php

  function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
  global $post;         // load details about this page
  if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
  else 
               return false;  // we're elsewhere
};

  add_editor_style('style.css');
  /**
   * Starkers functions and definitions
   *
   * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
   *
   * @package   WordPress
   * @subpackage  Starkers
   * @since     Starkers 4.0
   */

  /* ========================================================================================================================
  
  Required external files
  
  ======================================================================================================================== */

  require_once( 'external/starkers-utilities.php' );

  /* ========================================================================================================================
  
  Theme specific settings

  Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
  
  ======================================================================================================================== */

  add_theme_support('post-thumbnails');
  
  // register_nav_menus(array('primary' => 'Primary Navigation'));

  /* ========================================================================================================================
  
  Actions and Filters
  
  ======================================================================================================================== */

  add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

  add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

  /* ========================================================================================================================
  
  Custom Post Types - include custom post types and taxonimies here e.g.

  e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
  
  ======================================================================================================================== */



  /* ========================================================================================================================
  
  Scripts
  
  ======================================================================================================================== */

  /**
   * Add scripts via wp_head()
   *
   * @return void
   * @author Keir Whitaker
   */

  function starkers_script_enqueuer() {
    wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
    wp_enqueue_script( 'site' );

    wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
  } 

  /* ========================================================================================================================
  
  Comments
  
  ======================================================================================================================== */

  /**
   * Custom callback for outputting comments 
   *
   * @return void
   * @author Keir Whitaker
   */
  function starkers_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; 
    ?>
    <?php if ( $comment->comment_approved == '1' ): ?>  
    <li>
      <article id="comment-<?php comment_ID() ?>">
        <?php echo get_avatar( $comment ); ?>
        <h4><?php comment_author_link() ?></h4>
        <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
        <?php comment_text() ?>
      </article>
    <?php endif;
  }

  function my_myme_types($mime_types){
    $mime_types['zip'] = 'application/x-compressed';
    $mime_types['zip'] = 'application/x-zip-compressed';
    $mime_types['zip'] = 'application/zip';
    $mime_types['zip'] = 'multipart/x-zip';
    return $mime_types;
  }
  add_filter('upload_mimes', 'my_myme_types', 1, 1);


  add_filter('mce_css', 'tuts_mcekit_editor_style');
  function tuts_mcekit_editor_style($url) {
   
      if ( !empty($url) )
          $url .= ',';
   
      // Retrieves the plugin directory URL
      // Change the path here if using different directories
      $url .= trailingslashit( plugin_dir_url(__FILE__) ) . '/editor-styles.css';
   
      return $url;
  }
   
  /**
   * Add "Styles" drop-down
   */
  add_filter( 'mce_buttons_2', 'tuts_mce_editor_buttons' );
   
  function tuts_mce_editor_buttons( $buttons ) {
      array_unshift( $buttons, 'styleselect' );
      return $buttons;
  }
   
  /**
   * Add styles/classes to the "Styles" drop-down
   */
  add_filter( 'tiny_mce_before_init', 'tuts_mce_before_init' );
   
  function tuts_mce_before_init( $settings ) {
   
      $style_formats = array(
          array(
              'title' => 'Link with Ensenda leaf',
              'selector' => 'a',
              'classes' => 'leaf'
              ),
          array(
              'title' => 'Quote',
              'selector' => 'p',
              'classes' => 'quote',
          )
      );
   
      $settings['style_formats'] = json_encode( $style_formats );
   
      return $settings;
   
  }
   
  /* Learn TinyMCE style format options at http://www.tinymce.com/wiki.php/Configuration:formats */
   
  /*
   * Add custom stylesheet to the website front-end with hook 'wp_enqueue_scripts'
   */
  add_action('wp_enqueue_scripts', 'tuts_mcekit_editor_enqueue');
   
  /*
   * Enqueue stylesheet, if it exists.
   */
  function tuts_mcekit_editor_enqueue() {
    $StyleUrl = get_stylesheet_directory_uri().'/editor-styles.css'; // Customstyle.css is relative to the current file
    wp_enqueue_style( 'myCustomStyles', $StyleUrl );
  }
  ?>