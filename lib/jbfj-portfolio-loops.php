<?php
/* Portfolio Loops */

// projects loop
function jbfj_projects_grid( $max_posts = -1 ) {
	
	$args = array(
		'post_type' => 'project',
		'posts_per_page' => $max_posts,
	);
	
	// Defaults
	$defaults = array(
		// structure
		'list_before' => '<div class="clearfix">',
		'list_after' => '</div>',
		'each_before' => '<div class="col-sm-4">',
		'each_after' => '</div>',
		
		// content
		'figure_class' => 'effect-zoe',
		'icon_class' => 'fa fa-eye fa-fw'
	);
	
	$default_args = apply_filters( 'jbfj_project_filter', '' );	
	extract( wp_parse_args( $default_args, $defaults ) );
	
	$projects = new WP_Query( $args );

	if ( $projects -> have_posts() ) :
		
		echo $list_before;
		
			while( $projects -> have_posts() ) : $projects -> the_post();
				
				?>
					<?php echo $each_before; ?>
					<figure class="<?php echo $figure_class; ?>">				
						<a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						<figcaption>
							<?php the_title('<h3>', '</h3>'); ?>
							<p><?php get_post_meta( 'description' ); ?></p>
							<p class="icon-links"><a href="<?php echo get_permalink(); ?>"><i class="<?php echo $icon_class; ?>"></i></a></p>
						</figcaption>			
					</figure>
					<?php echo $each_after; ?>
				
				<?php
	
			endwhile; 
			
		echo $list_after;
		
	else : ?> 
	
	<article class="no-projects">
		<p>There are currently no projects available at this time. Please check back again soon.</p>
	</article>
	
	
	<?php endif; wp_reset_postdata();
}