<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Logistico
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$logistico_archive_sidebar      = "no_sidebar";
$logistico_post_default_sidebar = "no_sidebar";
$logistico_page_default_sidebar = "no_sidebar";
$logistico_product_default_sidebar = "no_sidebar";
$product_singlet_sidebar = "no_sidebar";

if ( is_woocommerce_active() && is_product() ) {
	if ( 'no_sidebar' === $product_singlet_sidebar ) {
		return;
	}
}  elseif ( is_single() ) {
	if ( 'no_sidebar' === $logistico_post_default_sidebar ) {
		return;
	}
} elseif ( is_page() ) {
	if ( 'no_sidebar' === $logistico_page_default_sidebar ) {
		return;
	}
} elseif ( is_woocommerce_active() && is_shop() ) {
	if ( 'no_sidebar' === $logistico_product_default_sidebar ) {
		return;
	}
} else {
	if ( 'no_sidebar' === $logistico_archive_sidebar ) {
		return;
	}
}
?>

<aside id="secondary" class="<?php echo esc_attr( logistico_sidebar_class() ); ?>">
	<div class="logistico-sidebar-wrap">
		<?php 
			if( is_woocommerce_active() && (is_shop() || is_product()) )
				dynamic_sidebar( 'product-sidebar' );
			else 
				dynamic_sidebar( 'sidebar-1' );
		?>
	</div>
</aside><!-- #secondary -->
