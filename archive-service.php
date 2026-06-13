<?php
// Template Name: Service
get_header();
?>

	<main id="primary" class="site-main ">



		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				<?php custom_breadcrumb(); ?>
			</header><!-- .page-header -->

			<div class="service-archive-wrapper layout-padding pt-lg-100 pt-50 pb-lg-100 pb-50">
			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'inc/service', get_post_type() );

			endwhile;


			the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => '←',
				'next_text' => '→',
			) );

		else :

			get_template_part( 'inc/service', 'none' );

		endif;
		?>
		</div>
        
        

	</main><!-- #main -->

<?php
get_footer();
