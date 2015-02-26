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
		'figure_class' => 'effect-lily',
		'each_before' => '<div class="">',
		'each_after' => '</div>',
		
		//
	);
	
	$default_args = apply_filters( 'jbfj_project_filter', '' );	
	extract( wp_parse_args( $default_args, $defaults ) );
	
	$projects = new WP_Query( $args );

	if ( $projects -> have_posts() ) :
		while( $projects -> have_posts() ) : $projects -> the_post();
			
			ob_start(); ?>
	
				<figure class="<?php echo $figure_class; ?>">				
					<img src="img/1.jpg" alt="img01"/>
					<figcaption>
						<h2>Nice <span>Lily</span></h2>
						<p>Lily likes to play with crayons and pencils</p>
						<a href="#">View more</a>
					</figcaption>			
				</figure>
			
			<?php return ob_get_clean();

		endwhile; 
		
	else : ?> 
	
	<article class="no-projects">
		<p>There are currently no projects available at this time. Please check back again soon.</p>
	</article>
	
	
	<?php endif; wp_reset_postdata();
}

// single project loop
function jbfj_project() {
	
	$args = array(
		'post_type' => 'project'
	);
	
	$project = new WP_Query( $args );
	
	if ( $project -> have_posts() ) {
		while ( $project -> have_posts() ) : $project -> the_post();
		
			//output here
			the_content();
			
		endwhile;
	} wp_reset_postdata();
	
}