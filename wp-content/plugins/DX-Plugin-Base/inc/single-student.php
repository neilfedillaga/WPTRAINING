<?php
/**
 * The simple template for displaying all single posts and attachments for cpt students
 *
 */

get_header(); ?>

<div class="wrap">

	<main id="main" class="site-main" role="main">

    	<?php 
	    	// Start the loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'student', 'single' ); 
				$student_year = get_post_meta( get_the_ID(), 'student_year', true );			
				$student_section = get_post_meta( get_the_ID(), 'student_section', true );
				$student_address = get_post_meta( get_the_ID(), 'student_address', true );
				$student_id = get_post_meta( get_the_ID(), 'student_id', true );
			?>
				<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?> 
				<h2>Name:<?php the_title(); ?></h2>
				<p>About:<?php the_content(); ?></p>
				<p>Year:<?php echo "$student_year"; ?></p>
				<p>Section:<?php echo "$student_section"; ?></p>
				<p>Address:<?php echo "$student_address"; ?></p>
				<p>ID:<?php echo "$student_id"; ?></p>
					
			<?php endwhile;  ?>
    </main><!-- #main -->
      <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
