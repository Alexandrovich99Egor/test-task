<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
</div> <!-- ast-container -->
</div><!-- #content -->
<div class="popup-form">
	<a class="popup-button"><?php echo get_field( 'button_text', 'options' ); ?></a>
	<div class="wrapper">
		<?php echo do_shortcode( get_field( 'contact_form', 'options' ) ); ?>
		<button class="popup-form-close">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35">
				<path fill="#fff"
					  d="M17.5 0A17.5 17.5 0 1 0 35 17.5 17.439 17.439 0 0 0 17.5 0Zm8.75 23.8-2.45 2.45-6.3-6.3-6.3 6.3-2.45-2.45 6.3-6.3-6.3-6.3 2.45-2.45 6.3 6.3 6.3-6.3 2.45 2.45-6.3 6.3Z"/>
			</svg>
		</button>
	</div>
</div>
<div class="download-form-wrapper popup">
	<div class="download-form-wrapper__inner">
		<?php echo do_shortcode(get_field('download_form', 'options')); ?>
		<button class="popup-form-close">
			<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35">
				<path d="M20.875,3.375a17.5,17.5,0,1,0,17.5,17.5A17.439,17.439,0,0,0,20.875,3.375Zm8.75,23.8-2.45,2.45-6.3-6.3-6.3,6.3-2.45-2.45,6.3-6.3-6.3-6.3,2.45-2.45,6.3,6.3,6.3-6.3,2.45,2.45-6.3,6.3Z"
					transform="translate(-3.375 -3.375)" fill="#fff"/>
			</svg>
		</button>
	</div>
</div>
<?php
astra_content_after();

astra_footer_before();

astra_footer();

astra_footer_after();
?>
</div><!-- #page -->
<?php
astra_body_bottom();
wp_footer();
?>
</body>
</html>
