<?php
/**
 * Fonctions du thème OMHB.
 *
 * @package omhb
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'OMHB_VERSION', '1.0.0' );

/**
 * Configuration de base du thème.
 */
function omhb_setup() {
	load_theme_textdomain( 'omhb', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	add_image_size( 'omhb-carte', 640, 360, true );
	add_image_size( 'omhb-hero', 1920, 900, true );

	register_nav_menus( array(
		'principal' => __( 'Menu principal', 'omhb' ),
		'pied'      => __( 'Menu pied de page', 'omhb' ),
	) );
}
add_action( 'after_setup_theme', 'omhb_setup' );

/**
 * Styles et scripts.
 */
function omhb_scripts() {
	wp_enqueue_style( 'omhb-style', get_stylesheet_uri(), array(), OMHB_VERSION );
	wp_enqueue_script( 'omhb-script', get_template_directory_uri() . '/assets/js/main.js', array(), OMHB_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'omhb_scripts' );

/**
 * Couleurs personnalisées injectées en CSS (Customizer > Couleurs du club).
 */
function omhb_couleurs_inline() {
	$rouge      = get_theme_mod( 'omhb_couleur_rouge', '#cc1517' );
	$anthracite = get_theme_mod( 'omhb_couleur_anthracite', '#16181d' );

	$rouge_fonce = omhb_assombrir( $rouge, 0.22 );

	$css = sprintf(
		':root{--omhb-rouge:%1$s;--omhb-rouge-fonce:%2$s;--omhb-anthracite:%3$s;--omhb-anthracite-2:%4$s;}',
		$rouge,
		$rouge_fonce,
		$anthracite,
		omhb_eclaircir( $anthracite, 0.08 )
	);

	wp_add_inline_style( 'omhb-style', $css );
}
add_action( 'wp_enqueue_scripts', 'omhb_couleurs_inline', 20 );

/**
 * Assombrit une couleur hexadécimale.
 *
 * @param string $hex    Couleur au format #rrggbb.
 * @param float  $taux   Taux d'assombrissement (0 à 1).
 * @return string
 */
function omhb_assombrir( $hex, $taux ) {
	$rgb = omhb_hex_vers_rgb( $hex );
	return sprintf( '#%02x%02x%02x', round( $rgb[0] * ( 1 - $taux ) ), round( $rgb[1] * ( 1 - $taux ) ), round( $rgb[2] * ( 1 - $taux ) ) );
}

/**
 * Éclaircit une couleur hexadécimale.
 *
 * @param string $hex    Couleur au format #rrggbb.
 * @param float  $taux   Taux d'éclaircissement (0 à 1).
 * @return string
 */
function omhb_eclaircir( $hex, $taux ) {
	$rgb = omhb_hex_vers_rgb( $hex );
	return sprintf( '#%02x%02x%02x', round( $rgb[0] + ( 255 - $rgb[0] ) * $taux ), round( $rgb[1] + ( 255 - $rgb[1] ) * $taux ), round( $rgb[2] + ( 255 - $rgb[2] ) * $taux ) );
}

/**
 * Convertit #rrggbb en tableau RGB.
 *
 * @param string $hex Couleur hexadécimale.
 * @return int[]
 */
function omhb_hex_vers_rgb( $hex ) {
	$hex = ltrim( (string) $hex, '#' );
	if ( 3 === strlen( $hex ) ) {
		$hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
	}
	if ( 6 !== strlen( $hex ) ) {
		return array( 204, 21, 23 );
	}
	return array(
		hexdec( substr( $hex, 0, 2 ) ),
		hexdec( substr( $hex, 2, 2 ) ),
		hexdec( substr( $hex, 4, 2 ) ),
	);
}

/**
 * Classes de body.
 *
 * @param array $classes Classes existantes.
 * @return array
 */
function omhb_classes_body( $classes ) {
	$classes[] = 'omhb';
	return $classes;
}
add_filter( 'body_class', 'omhb_classes_body' );

/**
 * Longueur des extraits.
 *
 * @return int
 */
function omhb_longueur_extrait() {
	return 24;
}
add_filter( 'excerpt_length', 'omhb_longueur_extrait' );

/**
 * Suffixe des extraits.
 *
 * @return string
 */
function omhb_suffixe_extrait() {
	return '…';
}
add_filter( 'excerpt_more', 'omhb_suffixe_extrait' );

/**
 * Fils d'Ariane simple.
 */
function omhb_fil_ariane() {
	if ( is_front_page() ) {
		return;
	}
	echo '<nav class="omhb-fil-ariane" aria-label="' . esc_attr__( 'Fil d\'Ariane', 'omhb' ) . '">';
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Accueil', 'omhb' ) . '</a>';
	if ( is_singular( 'post' ) ) {
		$categorie = get_the_category();
		if ( ! empty( $categorie ) ) {
			echo ' &rsaquo; ' . esc_html( $categorie[0]->name );
		}
		echo ' &rsaquo; ' . esc_html( get_the_title() );
	} elseif ( is_page() ) {
		$parent_id = wp_get_post_parent_id( get_the_ID() );
		if ( $parent_id ) {
			echo ' &rsaquo; ' . esc_html( get_the_title( $parent_id ) );
		}
		echo ' &rsaquo; ' . esc_html( get_the_title() );
	} elseif ( is_category() || is_tag() ) {
		echo ' &rsaquo; ' . single_term_title( '', false );
	} elseif ( is_search() ) {
		echo ' &rsaquo; ' . esc_html__( 'Recherche', 'omhb' );
	} elseif ( is_archive() ) {
		echo ' &rsaquo; ' . esc_html( get_the_archive_title() );
	}
	echo '</nav>';
}

require get_template_directory() . '/inc/customizer.php';
