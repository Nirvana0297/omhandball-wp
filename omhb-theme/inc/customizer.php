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
		'label'   => __( 'Couleur des titres (texte foncé)', 'omhb' ),
		'section' => 'omhb_couleurs',
	) ) );

	$wp_customize->add_section( 'omhb_accueil', array(
		'title'       => __( 'Page d\'accueil', 'omhb' ),
		'description' => __( 'Contenu de la grande bannière et des coordonnées affichées sur le site.', 'omhb' ),
		'priority'    => 25,
	) );

	$omhb_champs_texte = array(
		'omhb_hero_badge'    => array( __( 'Slogan du club (sous le logo, si aucun logo défini)', 'omhb' ), __( 'Club de handball', 'omhb' ) ),
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

	$wp_customize->add_setting( 'omhb_equipes_ffhb', array(
		'default'           => omhb_equipes_ffhb_defaut(),
		'sanitize_callback' => 'omhb_sanitize_equipes_ffhb',
	) );

	$wp_customize->add_control( 'omhb_equipes_ffhb', array(
		'label'       => __( 'Équipes et liens FFHB (résultats & classements)', 'omhb' ),
		'description' => __( "Une équipe par ligne, au format : Nom de l'équipe | URL de sa page FFHB. Exemple : EDM | https://www.ffhandball.fr/... Les équipes en entente avec d'autres clubs ont chacune leur propre lien. Les 7 équipes de la saison 2026-2027 sont déjà préremplies ; videz le champ pour masquer la section de la page d'accueil.", 'omhb' ),
		'section'     => 'omhb_accueil',
		'type'        => 'textarea',
	) );

	$wp_customize->add_setting( 'omhb_hero_image', array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'omhb_hero_image', array(
		'label'     => __( 'Image de fond de la bannière', 'omhb' ),
		'section'   => 'omhb_accueil',
		'mime_type' => 'image',
	) ) );

	$wp_customize->add_section( 'omhb_bannieres', array(
		'title'       => __( 'Bannières — fond aléatoire', 'omhb' ),
		'description' => __( 'Affiche une image de fond différente (tirée au hasard dans votre sélection) sur la grande bannière de l\'accueil et sur le bandeau de chaque page. Astuce : Médiathèque → cliquez sur une image → « Copier l\'URL dans le presse-papier », puis collez-la ici (une URL par ligne). Utilisez des images larges (1920×900 env.) et horizontales.', 'omhb' ),
		'priority'    => 26,
	) );

	$wp_customize->add_setting( 'omhb_bannieres_aleatoires', array(
		'default'           => false,
		'sanitize_callback' => 'wp_validate_boolean',
	) );

	$wp_customize->add_control( 'omhb_bannieres_aleatoires', array(
		'label'   => __( 'Activer le fond aléatoire des bannières', 'omhb' ),
		'section' => 'omhb_bannieres',
		'type'    => 'checkbox',
	) );

	$wp_customize->add_setting( 'omhb_bannieres_images', array(
		'default'           => '',
		'sanitize_callback' => 'omhb_sanitize_bannieres_images',
	) );

	$wp_customize->add_control( 'omhb_bannieres_images', array(
		'label'       => __( 'Sélection d\'images (une URL par ligne)', 'omhb' ),
		'description' => __( 'Chaque visite (ou changement de page) affichera une de ces images au hasard en fond de bannière. Quand cette option est activée, elle remplace l\'image de fond de l\'accueil et les images mises en avant des pages.', 'omhb' ),
		'section'     => 'omhb_bannieres',
		'type'        => 'textarea',
	) );
}
add_action( 'customize_register', 'omhb_personnaliser' );
