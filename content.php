<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
    // Post thumbnail.
    // the_post_thumbnail();
  ?>

  <header class="entry-header">
    <?php
      if ( is_singular() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
      else :
        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
      endif;
    ?>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php
      /* translators: %s: Name of current post */
      the_content( sprintf(
        __( 'Continue reading %s', 'appstrap' ),
        the_title( '<span class="screen-reader-text">', '</span>', false )
      ) );?>

      <div id="commentSection" class="collapse"> <?php comments_template(); ?></div>

      <?php get_template_part( 'postmeta' );

      if ( comments_open() && is_single()) :
?>

        <div class="clearfix"></div>
        <p class="text-right">
            <a href="#commentSection" class="btn btn-primary" data-toggle="collapse"><?php comments_number( __( 'Leave a Comment', 'appstrap' ), __( 'One Comment', 'appstrap' ), '%' . __( ' Comments', 'appstrap' ) );?> <span class="fa fa-comments"></span></a>
        </p>
<?php
      endif;

      wp_link_pages( array(
        'before'      => '<ul class="pagination">',
        'after'       => '</ul>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'appstrap' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ) );

    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
  
  </footer><!-- .entry-footer -->

</article><!-- #post-## -->
