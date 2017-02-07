<?php
$main_nav_options = array(
  'theme_location'    => 'main_menu',
  'depth'             => 2,
  'container'         => '',
  'container_class'   => '',
  'menu_class'        => 'nav navbar-nav',
  'fallback_cb'       => 'appstrap_wp_navwalker::fallback',
  'walker'            => new appstrap_wp_navwalker()
);
?>

<?php if ( has_nav_menu( 'main_menu' ) ) : ?>
  <nav class="navbar navbar-light bg-faded">
    <div class="container">
      <div class="row">
        <div class="navbar-left pull-left col-xs-9 col-md-8 col-lg-5">
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" />
          </a>
        </div>
          <div class="navbar-header navbar-default pull-right navbar-right col-xs-3 col-sm-3 col-md-4 hidden-lg-up">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#bd-main-nav" aria-controls="bd-main-nav" aria-expanded="false" aria-label="Toggle navigation"></button>
          </div>
          <div class="collapse navbar-toggleable-md pull-right navbar-right col-xs-12 col-sm-12 col-md-12 col-lg-7" id="bd-main-nav">
            <?php wp_nav_menu( $main_nav_options ); ?>
            <div class="clearfix"></div>
          </div>
      </div><!-- .row -->
    </div><!-- .container -->
  </nav>
<?php endif; ?>