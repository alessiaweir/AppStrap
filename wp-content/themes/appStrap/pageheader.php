<div class="jumbotron jumbotron-fluid entry-title-jumbo">
  <div class="container">
    <h1><?php
      if ( is_singular() ) :
        the_title( '<h1 class="entry-title">', '</h1>' );
      else :
        echo ('<h1>'.bloginfo( 'name' ).'</h1>');
        echo ('<h1>'.bloginfo('description').'</h1>');
      endif;
    ?></h1>
  </div>
</div>