<?php
/**
 * Title: Footer links
 * Slug: gsmtc/footer-links
 * Categories: text
 * Inserter: no
 *
 * @package gsmtc
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
<div class="wp-block-group alignfull"><!-- wp:group {"layout":{"type":"flex","allowOrientation":false}} --><div class="wp-block-group">
<!-- wp:paragraph {"fontSize":"extra-small"} --><p class="has-extra-small-font-size">
<?php esc_html_e( 'Copyright', 'gsmtc' ) . ' ' . date_i18n( _x( 'Y', 'copyright date format', 'gsmtc' ) ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:site-title {"level":0, "fontSize":"extra-small"} /-->
<?php echo gsmtc_privacy(); ?>
</div><!-- /wp:group -->
<!-- wp:social-links {"className":"is-style-logos-only"} -->
<ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"https://wordpress.org","service":"wordpress"} /--></ul>
<!-- /wp:social-links -->
</div><!-- /wp:group -->