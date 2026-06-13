<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nexora
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="thumbnail media">
		<?php the_post_thumbnail(); ?>
	</div>

	<div class="category">
		<?php $categories   = get_the_category();
			if ( !empty($categories)) :
				foreach ( $categories as $category ) :
		?>
		<span>
			<?php echo esc_html( $category->name ); ?>
		</span>
		<?php endforeach; endif; ?>
	</div>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		
		?>
			
	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php 
		   $excerpt = get_the_excerpt();
		   $trim_excerpt = wp_trim_words( $excerpt , 50 ) ;
		   echo esc_html( $trim_excerpt ) ; ; 
		?>
	</div><!-- .entry-content -->

	<div class="box-footer">
		<span class="post-date">
			<?php echo get_the_date( 'M j, Y' ); ?>
		</span>
		<div class="read-time">
			<?php echo ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ) . ' min read'; ?>
		</div>
	</div>

	
</article><!-- #post-<?php the_ID(); ?> -->
