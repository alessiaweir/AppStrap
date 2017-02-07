<?php if( !is_page() ): ?>
	<p class="text-right">
	  <span class="fa fa-user"></span> <?php the_author_posts_link(); ?>
	  <span class="fa fa-clock-o"></span> <?php the_time( get_option( 'date_format' ) ); ?>
	<?php if( current_user_can( 'edit_others_posts' ) ) : ?>
	  <span class="fa fa-pencil-square-o"></span> <?php edit_post_link( __( 'Edit', 'appstrap' ) ); ?>
	<?php endif; ?>
	</p>
	<?php if( has_category() && !has_category('Uncategorised') ): ?>
	<p class="text-right"><span class="fa fa-chevron-circle-right"></span> <?php _e( 'Posted In', 'appstrap' ); ?>: <?php the_category( __( ', ', 'appstrap' ) ); ?></p>
	<?php endif; ?>
	<?php if( has_tag() ) : ?>
	  <p class="text-right"><span class="fa fa-tags"></span>
	  <?php the_tags(); ?>
	  </p>
	<?php endif; ?>
<?php endif; ?>
