<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
		<h1><?php _e( 'Not Found', 'office' ); ?></h1>
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'office' ); ?></p>
		<?php get_search_form(); ?>

<?php endif; ?>

<!--loop starts here-->

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="post-head">
	
			<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'office' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php if ( get_the_title() == '' ) { _e( '(No title)', 'office' ); } else { the_title(); } ?></a></h1>
			
			</div><!--post-heading end-->
			
			<div class="meta-data">
			
			<?php office_posted_on(); ?> <?php _e('in', 'office'); ?> <?php the_category(', '); ?> | <?php comments_popup_link( __( 'Leave a comment', 'office' ), __( '1 Comment', 'office' ), __( '% Comments', 'office' ) ); ?>
			
			</div><!--meta data end-->
			<div class="clear"></div>

<div class="post-entry">

	<?php if ( is_archive() || is_search() ) :  ?>
		
			<?php the_content( __( '<span class="read-more">Read More</span>', 'office' ) ); ?>
			<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'office' ), 'after' => '' ) ); ?>
			
	<?php else : ?>
	
 	<?php if ( has_post_thumbnail() ) { ?> <div class="entry-thumbnail"> <?php the_post_thumbnail(array(620,240)); ?> </div> <?php } ?>
	
	
			<?php the_content( '<span class="read-more">'.__('Read More', 'office').'</span>' ); ?>
			<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'office' ), 'after' => '' ) ); ?>
	<?php endif; ?>
	
	<!--clear float--><div class="clear"></div>
				
				
				</div><!--post-entry end-->


		<?php comments_template( '', true ); ?>

</div> <!--post end-->

<?php endwhile; // End the loop. Whew. ?>

<!--pagination-->
	<div class="navigation">
		<div class="alignleft"><?php next_posts_link( __( '&larr; Older posts', 'office' ) ); ?></div>
		<div class="alignright"><?php previous_posts_link( __( 'Newer posts &rarr;', 'office' ) ); ?></div>
	</div>