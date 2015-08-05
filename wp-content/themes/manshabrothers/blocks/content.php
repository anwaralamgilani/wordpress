			

<?php if ( is_single() ) :
	the_title( '<h1>', '</h1>' );
else :
	the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
endif; ?>		
<?php the_post_thumbnail('medium'); ?>
<?php if (is_single()) :
	the_content();
else:
	the_excerpt();
endif; ?>
		
