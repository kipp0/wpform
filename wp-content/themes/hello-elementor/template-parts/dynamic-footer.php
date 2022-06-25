<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$footer_class = did_action( 'elementor/loaded' ) ? esc_attr( hello_get_footer_layout_class() ) : '';
$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
] );
?>
<footer>
        <div class="top <?= $footer_class; ?>">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="content"><a id="emailus" href="mailto:support@ditcanada.com">support@ditcanada.com</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col">
						<?php if ( '' !== hello_elementor_get_setting( 'hello_footer_copyright_text' ) || $is_editor ) : ?>
							<div class="content right copyright <?php echo hello_show_or_hide( 'hello_footer_copyright_display' ); ?>">
								<p><?php echo hello_elementor_get_setting( 'hello_footer_copyright_text' ); ?></p>
							</div>
						<?php endif; ?>
                    </div>
                    <div class="col">
						<?php if ( $tagline || $is_editor ) : ?>
							<div>
								<p class="content left site-description <?php echo hello_show_or_hide( 'hello_footer_tagline_display' ); ?>">
									<?php echo esc_html( $tagline ); ?>
								</p>
							</div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>