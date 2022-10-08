<?php
/**
 * Block styles.
 *
 * @package gsmtc
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function gsmtc_register_block_styles() {

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/template-part',
		array(
			'name'  => 'gsmtc-sticky',
			'label' => __( 'Sticky header', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'gsmtc-flat-button',
			'label' => __( 'Flat button', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'gsmtc-button-shadow',
			'label' => __( 'Button with shadow', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/navigation',
		array(
			'name'  => 'gsmtc-navigation-button',
			'label' => __( 'Button style', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/navigation',
		array(
			'name'  => 'gsmtc-navigation-button-shadow',
			'label' => __( 'Button with shadow', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/list',
		array(
			'name'  => 'gsmtc-list-underline',
			'label' => __( 'Underlined list items', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/group',
		array(
			'name'  => 'gsmtc-box-shadow',
			'label' => __( 'Box shadow', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/column',
		array(
			'name'  => 'gsmtc-box-shadow',
			'label' => __( 'Box shadow', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/columns',
		array(
			'name'  => 'gsmtc-box-shadow',
			'label' => __( 'Box shadow', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/site-title',
		array(
			'name'  => 'gsmtc-text-shadow',
			'label' => __( 'Text shadow', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/post-title',
		array(
			'name'  => 'gsmtc-text-shadow',
			'label' => __( 'Text shadow', 'gsmtc' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/heading',
		array(
			'name'  => 'gsmtc-text-shadow',
			'label' => __( 'Text shadow', 'gsmtc' ),
		)
	);
}
add_action( 'init', 'gsmtc_register_block_styles' );

/**
 * This is an example of how to unregister a core block style.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-styles/
 * @see https://github.com/WordPress/gutenberg/pull/37580
 *
 * @since 1.0.0
 *
 * @return void
 */
function gsmtc_unregister_block_style() {
	wp_enqueue_script(
		'gsmtc-unregister',
		get_stylesheet_directory_uri() . '/assets/js/unregister.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		GSMTC_VERSION,
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'gsmtc_unregister_block_style' );
