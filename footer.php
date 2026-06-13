<?php
	$footer_logo				= get_field('footer_logo', 'option');				// ACF Image Field : Site Logo
	$industry_insights			= get_field('industry_insights', 'option');			// ACF Textarea Field : Company Info
	$news_latter_short_code		= get_field('news_latter_short_code', 'option')		// ACF Text Field : News Newsletter

?>

	<footer id="colophon" class="site-footer layout-padding">
		<div class="site-info pt-lg-100 pt-50 pb-lg-100 pb-50">
			<div class="footer-left">
				<div class="site-branding">
					<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php
						if ( $footer_logo ) :

							$file_path = get_attached_file( $footer_logo['ID'] );
							$extension = strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) );

							if ( $extension === 'svg' && file_exists( $file_path ) ) {

								echo file_get_contents( $file_path );

							} else {

								echo '<img src="' . esc_url( $footer_logo['url'] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';

							}

						endif;
					?>
					</a>
				</div>
				<div class="industry-insight">
					<?php if ( $industry_insights ) : ?>
						<p><?php echo esc_html($industry_insights); ?></p>

					<?php endif; ?>
				</div>

				<div class="newsletter">
					<?php if ( $news_latter_short_code ) : ?>
						<span><?php echo do_shortcode($news_latter_short_code); ?></span>

					<?php endif; ?>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
