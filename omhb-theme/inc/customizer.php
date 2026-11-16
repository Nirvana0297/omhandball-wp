<?php
/**
 * Réglages du Customizer : couleurs du club et contenu de la page d'accueil.
 *
 * @package omhb
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enregistre les réglages.
 *
 * @param WP_Customize_Manager $wp_customize Gestionnaire du Customizer.
 */
function omhb_personnaliser( $wp_customize ) {

	$wp_customize->add_section( 'omhb_couleurs', array(
		'title'    => __( 'Couleurs du club', 'omhb' ),
		'priority' => 20,
	) );

	$wp_customize->add_setting( 'omhb_couleur_rouge', array(
		'default'           => '#cc1517',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'omhb_couleur_rouge', array(
		'label'   => __( 'Couleur principale (rouge du logo)', 'omhb' ),
		'section' => 'omhb_couleurs',
	) ) );

	$wp_customize->add_setting( 'omhb_couleur_anthracite', array(
		'default'           => '#16181d',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'omhb_couleur_anthracite', array(
		'label'   => __( 'Couleur foncée (fonds, en-tête, pied de page)', 'omhb' ),
		'section' => 'omhb_couleurs',
	) ) );

	$wp_customize->add_section( 'omhb_accueil', array(
		'title'       => __( 'Page d\'accueil', 'omhb' ),
		'description' => __( 'Contenu de la grande bannière et des coordonnées affichées sur le site.', 'omhb' ),
		'priority'    => 25,
	) );

	$omhb_champs_texte = array(
		'omhb_hero_badge'    => array( __( 'Petit libellé au-dessus du titre', 'omhb' ), __( 'Club de handball', 'omhb' ) ),
		'omhb_hero_titre'    => array( __( 'Titre de la bannière', 'omhb' ), __( 'La Passion du Hand depuis 1968', 'omhb' ) ),
		'omhb_hero_texte'    => array( __( 'Texte de la bannière', 'omhb' ), __( 'BabyHand, jeunes, seniors, loisirs : le club de Mehun-sur-Yèvre accueille tous les passionnés de handball, du débutant au compétiteur.', 'omhb' ) ),
		'omhb_hero_bouton'   => array( __( 'Texte du bouton principal', 'omhb' ), __( 'Adhérer au club', 'omhb' ) ),
		'omhb_hero_bouton_url' => array( __( 'Lien du bouton principal', 'omhb' ), '/adhesion/' ),
		'omhb_tel'           => array( __( 'Téléphone', 'omhb' ), '06 71 65 75 33' ),
		'omhb_email'         => array( __( 'E-mail', 'omhb' ), '5418002@cvl.ffhandball.net' ),
		'omhb_adresse'       => array( __( 'Adresse', 'omhb' ), 'Gymnase Pierre de Coubertin, Boulevard de la Liberté, 18500 Mehun-sur-Yèvre' ),
		'omhb_facebook'      => array( __( 'URL Facebook', 'omhb' ), 'https://www.facebook.com/OlympiqueMehunHandball' ),
		'omhb_instagram'     => array( __( 'URL Instagram', 'omhb' ), 'https://www.instagram.com/om_hb18/' ),
	);

	foreach ( $omhb_champs_texte as $omhb_id => $omhb_def ) {
		$wp_customize->add_setting( $omhb_id, array(
			'default'           => $omhb_def[1],
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( $omhb_id, array(
			'label'   => $omhb_def[0],
			'section' => 'omhb_accueil',
			'type'    => 'text',
		) );
	}

	$wp_customize->add_setting( 'omhb_hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'omhb_hero_image', array(
		'label'     => __( 'Image de fond de la bannière', 'omhb' ),
		'section'   => 'omhb_accueil',
		'mime_type' => 'image',
	) ) );
}
add_action( 'customize_register', 'omhb_personnaliser' );
