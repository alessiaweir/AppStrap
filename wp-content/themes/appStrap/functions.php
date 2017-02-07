<?php

include_once 'lib/appstrap-wp-navwalker.php';

global $appstrap_version;

$appstrap_version = '1.0.0';

// Le sigh...
if ( ! isset( $content_width ) ) $content_width = 837;


if ( ! function_exists( 'appstrap_widgets_init' ) ) :
  function appstrap_widgets_init() {
    register_sidebar( array(
      'name'          => __( 'Right Sidebar', 'appstrap' ),
      'id'            => 'right-sidebar',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
      'name'          => __( 'Footer Sidebar', 'appstrap' ),
      'id'            => 'footer_sidebar',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>',
   ) );
  }
endif;
add_action( 'widgets_init', 'appstrap_widgets_init' );


if ( ! function_exists( 'appstrap_setup' ) ) :
  function appstrap_setup() {

    add_theme_support( 'custom-background', array(
      'default-color' => 'ffffff',
    ) );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    register_nav_menus( array(
      'main_menu' => __( 'Main Menu', 'appstrap' ),
      // 'footer_menu' => 'Footer Menu'
    ) );

    add_editor_style( 'scss/vendor/bootstrap-4.0.0/bootstrap.min.css' );

    add_theme_support('post-thumbnails');
  }
endif; // appstrap_setup
add_action( 'after_setup_theme', 'appstrap_setup' );


if ( ! function_exists( 'appstrap_theme_styles' ) ) :
  function appstrap_theme_styles() {
    global $appstrap_version;
    wp_enqueue_style( 'appstrap-font-awesome', 'https://use.fontawesome.com/3e744b35c0.css', array(), '4.4.0' );
    wp_enqueue_style( 'appstrap-styles', get_stylesheet_uri(), array(), '1' );
  }
endif;
add_action('wp_enqueue_scripts', 'appstrap_theme_styles');


if ( ! function_exists( 'appstrap_theme_scripts' ) ) :
  function appstrap_theme_scripts() {
    global $appstrap_version;
    wp_enqueue_script( 'appstrap-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), $appstrap_version, true );
  }
endif;
add_action('wp_enqueue_scripts', 'appstrap_theme_scripts');


function appstrap_nav_li_class( $classes, $item ) {
  $classes[] .= ' nav-item';
  return $classes;
}
add_filter( 'nav_menu_css_class', 'appstrap_nav_li_class', 10, 2 );


function appstrap_nav_anchor_class( $atts, $item, $args ) {
  $atts['class'] .= ' nav-link';
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'appstrap_nav_anchor_class', 10, 3 );


function appstrap_comment_form_before() {
  echo '<div class="card"><div class="card-block">';
}
add_action( 'comment_form_before', 'appstrap_comment_form_before', 10, 5 );


function appstrap_comment_form( $fields ) {
  $fields['fields']['author'] = '
  <fieldset class="form-group comment-form-email">
    <label for="author">' . __( 'Name *', 'appstrap' ) . '</label>
    <input type="text" class="form-control" name="author" id="author" placeholder="' . __( 'Name', 'appstrap' ) . '" aria-required="true" required>
  </fieldset>';
  $fields['fields']['email'] ='
  <fieldset class="form-group comment-form-email">
    <label for="email">' . __( 'Email address *', 'appstrap' ) . '</label>
    <input type="email" class="form-control" id="email" placeholder="' . __( 'Enter email', 'appstrap' ) . '" aria-required="true" required>
    <small class="text-muted">' . __( 'Your email address will not be published.', 'appstrap' ) . '</small>
  </fieldset>';
  $fields['fields']['url'] = '
  <fieldset class="form-group comment-form-email">
    <label for="url">' . __( 'Website *', 'appstrap' ) . '</label>
    <input type="text" class="form-control" name="url" id="url" placeholder="' . __( 'http://example.org', 'appstrap' ) . '">
  </fieldset>';
  $fields['comment_field'] = '
  <fieldset class="form-group">
    <label for="comment">' . __( 'Comment *', 'appstrap' ) . '</label>
    <textarea class="form-control" id="comment" name="comment" rows="3" aria-required="true" required></textarea>
  </fieldset>';
  $fields['comment_notes_before'] = '';
  $fields['class_submit'] = 'btn btn-primary';
  return $fields;
}
add_filter( 'comment_form_defaults', 'appstrap_comment_form', 10, 5 );


function appstrap_comment_form_after() {
  echo '</div><!-- .card-block --></div><!-- .card -->';
}
add_action( 'comment_form_after', 'appstrap_comment_form_after', 10, 5 );


/* * * * * * * * * * * * * * *
 * BS4 Utility Functions
 * * * * * * * * * * * * * * */

function appstrap_get_posts_pagination( $args = '' ) {
  global $wp_query;
  $pagination = '';

  if ( $GLOBALS['wp_query']->max_num_pages > 1 ) :

    $defaults = array(
      'total'     => isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1,
      'current'   => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
      'type'      => 'array',
      'prev_text' => '&laquo;',
      'next_text' => '&raquo;',
    );

    $params = wp_parse_args( $args, $defaults );

    $paginate = paginate_links( $params );

    if( $paginate ) :
      $pagination .= "<nav class='page-navigation' aria-label='Page Navigation'><ul class='pagination'>";
      foreach( $paginate as $page ) :
        if( strpos( $page, 'current' ) ) :
          $pagination .= "<li class='page-item active'>$page</li>";
        else :
          $pagination .= "<li class='page-item'>$page</li>";
        endif;
      endforeach;
      $pagination .= "</ul></nav>";
    endif;

  endif;

  return $pagination;
}

/* * * * * * * * * * * * * * *
 *    AppStrap Functions
 * * * * * * * * * * * * * * */


function appstrap_the_posts_pagination( $args = '' ) {
  echo appstrap_get_posts_pagination( $args );
}

function appstrap_home_address() {
  $path = get_home_path();
  return $path;
}

$defaults = array(
  'default-image'          => '',
  'width'                  => 0,
  'height'                 => 0,
  'flex-height'            => false,
  'flex-width'             => false,
  'uploads'                => true,
  'random-default'         => false,
  'header-text'            => true,
  'default-text-color'     => '',
  'wp-head-callback'       => '',
  'admin-head-callback'    => '',
  'admin-preview-callback' => '',
);

add_theme_support( 'custom-header', $defaults );

