<?php
/**
 * Install all supports
 *
 * @package photolab
 */

return [
	'title-tag',
	// Add default posts and comments RSS feed links to head.
	'automatic-feed-links', 
	// Enable support for Post Formats.
	'post-formats' => [ 'aside', 'image', 'gallery', 'video', 'quote', 'link' ],
	// Setup the WordPress core custom background feature.
	'custom-background' => apply_filters( 
		'photolab_custom_background_args', 
		[
			'default-color' => 'ffffff',
			'default-image' => '',
		] 
	),
	// Enable support for HTML5 markup.
	'html5' => [
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	],
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	'post-thumbnails',
	/**
	 * Jetpack
	 */
	'infinite-scroll' => [
		'container' => 'main',
		'footer'    => 'page',
	],
	/**
	 * Custom header setup
	 */
	'custom-header' => [
		'default-image'          => \Core\Utils::assets_url() . '/images/header.jpg',
		'random-default'         => false,
		'width'                  => 1920,
		'height'                 => 585,
		'flex-height'            => true,
		'flex-width'             => true,
		'header-text'            => false,
		'uploads'                => true,
		'wp-head-callback'       => '',
		'admin-head-callback'    => ['\\Modules\\Custom\\Custom_Header', 'style'],
		'admin-preview-callback' => ['\\Modules\\Custom\\Custom_Header', 'image'],
	],
];
