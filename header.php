<?php
	$site_logo     		= get_field( 'site_logo', 'option' ); 			// ACF File Field : Sitelogo
	$show_button   		= get_field( 'show_button', 'option' );			// ACF True/False Field : Show Button
	$header_cta_item    = get_field( 'header_cta_item', 'option' );		// ACF Text Field : Header CTA



?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'nexora' ); ?></a>

	<header id="masthead" class="site-header layout-padding">
		<div class="header-left">
			<div class="site-branding">
				<?php
					if ( $site_logo ) :

						$file_path = get_attached_file( $site_logo['ID'] );
						$extension = strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) );

						if ( $extension === 'svg' && file_exists( $file_path ) ) {

							echo file_get_contents( $file_path );

						} else {

							echo '<img src="' . esc_url( $site_logo['url'] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';

						}

					endif;
				?>
			</div><!-- .site-branding -->
		</div>

		<div class="navigation-menu">
			<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location'    => 'mainMenu',
						'container'         => 'div',
						'container_class'   => 'main-menu',
					) );
				?>
			</nav><!-- #site-navigation -->
		</div>

		<?php if ( $show_button ) : ?>
		<div class="header-right">
			
			<?php if ( $header_cta_item ) : ?>
				<?php foreach ( $header_cta_item as $item ) :
					$header_btn 		= $item['header_btn'];
					$show_button_color  = $item['show_button_color'];
					$bg_class 			= $show_button_color ? 'has-bg-color' : '';
					$btn_bg       		= $item['btn_bg'];


					?>
				<a href="<?php echo esc_attr($header_btn['url']); ?>" class="button <?php echo esc_attr($bg_class); ?>" target="<?php echo esc_attr($header_btn['target']); ?>" <?php if (!empty($show_button_color)) { echo 'style="background: ' . esc_attr($btn_bg) .';"';}  ?>>
					<?php echo esc_html($header_btn['title']); ?>
				</a>
			<?php endforeach; ?>
			<?php endif;?>
		</div>
		<?php endif;?>
	</header><!-- #masthead -->
