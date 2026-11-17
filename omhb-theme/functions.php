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

/**
 * Affiche le logo officiel d'un réseau social (SVG inline, sans dépendance externe).
 *
 * @param string $reseau 'facebook' ou 'instagram'.
 */
function omhb_icone_reseau( $reseau ) {
	if ( 'facebook' === $reseau ) {
		echo '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M13.5 21.5v-7.8h2.62l.39-3.04H13.5V8.72c0-.88.24-1.48 1.5-1.48h1.6V4.53c-.28-.04-1.23-.12-2.34-.12-2.32 0-3.9 1.41-3.9 4.01v2.24H7.5v3.04h2.86v7.8h3.14z"/></svg>';
	} elseif ( 'instagram' === $reseau ) {
		echo '<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.72 3.72 0 0 1-1.38-.9 3.72 3.72 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41 1.27-.06 1.65-.07 4.85-.07M12 0C8.74 0 8.33.01 7.05.07 5.78.13 4.9.33 4.14.63c-.79.31-1.46.72-2.13 1.38A5.88 5.88 0 0 0 .63 4.14C.33 4.9.13 5.78.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.06 1.27.26 2.15.56 2.91.31.79.72 1.46 1.38 2.13a5.88 5.88 0 0 0 2.13 1.38c.76.3 1.64.5 2.91.56 1.28.06 1.69.07 4.95.07s3.67-.01 4.95-.07c1.27-.06 2.15-.26 2.91-.56a5.88 5.88 0 0 0 2.13-1.38 5.88 5.88 0 0 0 1.38-2.13c.3-.76.5-1.64.56-2.91.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95c-.06-1.27-.26-2.15-.56-2.91a5.88 5.88 0 0 0-1.38-2.13A5.88 5.88 0 0 0 19.86.63c-.76-.3-1.64-.5-2.91-.56C15.67.01 15.26 0 12 0zm0 5.84A6.16 6.16 0 1 0 12 18.16 6.16 6.16 0 0 0 12 5.84zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm7.85-10.4a1.44 1.44 0 1 1-2.88 0 1.44 1.44 0 0 1 2.88 0z"/></svg>';
	}
}

/**
 * Nettoie la liste « équipes / liens FFHB » saisie dans le Customizer
 * (une équipe par ligne, format « Nom | URL »).
 *
 * @param string $valeur Valeur brute.
 * @return string Valeur nettoyée.
 */
function omhb_sanitize_equipes_ffhb( $valeur ) {
	$omhb_lignes = explode( "\n", (string) $valeur );
	$omhb_sortie = array();
	foreach ( $omhb_lignes as $omhb_ligne ) {
		$omhb_ligne = trim( $omhb_ligne );
		if ( '' === $omhb_ligne ) {
			continue;
		}
		$omhb_parts = array_map( 'trim', explode( '|', $omhb_ligne, 2 ) );
		$omhb_nom   = isset( $omhb_parts[0] ) ? sanitize_text_field( $omhb_parts[0] ) : '';
		$omhb_url   = isset( $omhb_parts[1] ) ? esc_url_raw( $omhb_parts[1] ) : '';
		if ( $omhb_nom && $omhb_url ) {
			$omhb_sortie[] = $omhb_nom . ' | ' . $omhb_url;
		} elseif ( $omhb_nom ) {
			$omhb_sortie[] = $omhb_nom;
		}
	}
	return implode( "\n", $omhb_sortie );
}

/**
 * Liste par défaut des équipes et de leurs pages FFHB (saison 2026-2027).
 *
 * @return string Lignes au format « Nom | URL ».
 */
function omhb_equipes_ffhb_defaut() {
	return implode( "\n", array(
		'EDM – Seniors M (départemental) | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/championnat-seniors-m-26-27-32905/',
		'EDF – Seniors F (1ʳᵉ div. territoriale 16 F) | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/1ere-division-territoriale-16-feminine-32962/',
		'R3M – Honneur régional M | https://www.ffhandball.fr/competitions/saison-2026-2027-22/regional/honneur-regional-masculin-26-27-32351/',
		'PNF – Pré-Nationale F | https://www.ffhandball.fr/competitions/saison-2026-2027-22/regional/prenationale-feminine-26-27-32353/',
		'U11 M | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/cd36-18-championnat-u11-mixte-2026-2027-33753/poule-200733/',
		'U11 F | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/cd36-18-championnat-u11-mixte-2026-2027-33753/poule-200740/',
		'U15 M | https://www.ffhandball.fr/competitions/saison-2026-2027-22/departemental/cd36-championnat-u15m-2026-2027-33681/',
	) );
}

/**
 * Retourne la liste des équipes saisies dans le Customizer.
 *
 * @return array[] Tableau de tableaux : nom (string), url (string, vide possible).
 */
function omhb_equipes_ffhb_liste() {
	$omhb_brut   = (string) get_theme_mod( 'omhb_equipes_ffhb', omhb_equipes_ffhb_defaut() );
	$omhb_lignes = explode( "\n", $omhb_brut );
	$omhb_liste  = array();
	foreach ( $omhb_lignes as $omhb_ligne ) {
		$omhb_ligne = trim( $omhb_ligne );
		if ( '' === $omhb_ligne ) {
			continue;
		}
		$omhb_parts    = array_map( 'trim', explode( '|', $omhb_ligne, 2 ) );
		$omhb_liste[] = array(
			'nom' => $omhb_parts[0],
			'url' => isset( $omhb_parts[1] ) ? esc_url_raw( $omhb_parts[1] ) : '',
		);
	}
	return $omhb_liste;
}

/**
 * Affiche la grille des équipes avec liens vers les pages FFHB.
 *
 * @return string HTML de la grille (vide si aucune équipe configurée).
 */
function omhb_equipes_ffhb_html() {
	$omhb_equipes = omhb_equipes_ffhb_liste();
	if ( ! $omhb_equipes ) {
		return '';
	}

	$omhb_liens = array();
	foreach ( $omhb_equipes as $omhb_equipe ) {
		$omhb_liens[] = sprintf(
			'<a class="omhb-equipe-lien" href="%1$s"%2$s><span class="omhb-equipe-nom">%3$s</span><span class="omhb-equipe-suite">Résultats &amp; classement <span aria-hidden="true">→</span></span></a>',
			esc_url( $omhb_equipe['url'] ),
			$omhb_equipe['url'] ? ' target="_blank" rel="noopener"' : '',
			esc_html( $omhb_equipe['nom'] )
		);
	}

	return '<div class="omhb-grille-equipes">' . implode( "\n", $omhb_liens ) . '</div>';
}

/**
 * Shortcode [omhb_equipes_ffhb] : grille des équipes cliquables (pages FFHB)
 * pour les pages « Calendrier & résultats », « Équipes »…
 *
 * @return string HTML de la grille.
 */
function omhb_shortcode_equipes_ffhb() {
	return omhb_equipes_ffhb_html();
}
add_shortcode( 'omhb_equipes_ffhb', 'omhb_shortcode_equipes_ffhb' );

require get_template_directory() . '/inc/customizer.php';
