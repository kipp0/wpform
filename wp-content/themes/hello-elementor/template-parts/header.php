<?php
/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$header_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-1',
	'fallback_cb' => false,
	'echo' => false,
] );
?>
<a class="skip-link screen-reader-text" href="#content">
	<?php _e( 'Skip to content', 'hello-elementor' ); ?></a>

<header id="site-header" class="site-header" role="banner">
	<nav class="navbar bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<?php if (has_custom_logo()): ?>
					<?= the_custom_logo(); ?>
				<?php elseif ($site_name): ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'hello-elementor' ); ?>" rel="home">
							<?php echo esc_html( $site_name ); ?>
						</a>
					</h1>
					<p class="site-description">
						<?php
							if ( $tagline ): 
								echo esc_html( $tagline );
							endif;
						?>
					</p>
				<?php endif; ?>
			</a>
			<?php if ( $header_nav_menu ) : ?>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<?php echo $header_nav_menu; ?>
				</div>
			<?php endif; ?>
		</div>
	</nav>
</header>
