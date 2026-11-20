<?php
/**
 * Page d'accueil.
 *
 * @package omhb
 */

get_header();

$omhb_hero_image_id = get_theme_mod( 'omhb_hero_image' );
$omhb_style_fond    = '';
if ( $omhb_hero_image_id ) {
	$omhb_style_fond = ' style="background-image:url(' . esc_url( wp_get_attachment_image_url( $omhb_hero_image_id, 'omhb-hero' ) ) . ');"';
}
?>

<section class="omhb-hero">
	<div class="omhb-hero-fond"<?php echo $omhb_style_fond; // phpcs:ignore WordPress.Security.EscapeOutput ?>"></div>
	<div class="omhb-conteneur">
		<div class="omhb-hero-contenu">
			<h1 class="omhb-hero-titre"><?php echo esc_html( get_theme_mod( 'omhb_hero_titre', __( 'La Passion du Hand depuis 1968', 'omhb' ) ) ); ?></h1>
			<p class="omhb-hero-texte"><?php echo esc_html( get_theme_mod( 'omhb_hero_texte', __( 'BabyHand, jeunes, seniors, loisirs : le club de Mehun-sur-Yèvre accueille tous les passionnés de handball.', 'omhb' ) ) ); ?></p>
			<div class="omhb-hero-actions">
				<a class="omhb-bouton" href="<?php echo esc_url( home_url( get_theme_mod( 'omhb_hero_bouton_url', '/adhesion/' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'omhb_hero_bouton', __( 'Adhérer au club', 'omhb' ) ) ); ?></a>
				<a class="omhb-bouton-secondaire" href="#omhb-actualites"><?php esc_html_e( 'Voir les actualités', 'omhb' ); ?></a>
			</div>
		</div>
	</div>
</section>

<div class="omhb-infos">
	<div class="omhb-conteneur">
		<div class="omhb-infos-item">
			<div>
				<p class="omhb-infos-titre"><?php esc_html_e( 'Où nous trouver', 'omhb' ); ?></p>
				<p><?php echo esc_html( get_theme_mod( 'omhb_adresse', 'Gymnase Pierre de Coubertin, Boulevard de la Liberté, 18500 Mehun-sur-Yèvre' ) ); ?></p>
			</div>
		</div>
		<div class="omhb-infos-item">
			<div>
				<p class="omhb-infos-titre"><?php esc_html_e( 'Nous contacter', 'omhb' ); ?></p>
				<p>
					<?php
					$omhb_tel   = get_theme_mod( 'omhb_tel', '06 71 65 75 33' );
					$omhb_email = get_theme_mod( 'omhb_email', '5418002@cvl.ffhandball.net' );
					if ( $omhb_tel ) {
						echo '<a href="tel:' . esc_attr( preg_replace( '/[^+\d]/', '', $omhb_tel ) ) . '">' . esc_html( $omhb_tel ) . '</a> · ';
					}
					if ( $omhb_email ) {
						echo '<a href="mailto:' . esc_attr( $omhb_email ) . '">' . esc_html( $omhb_email ) . '</a>';
					}
					?>
				</p>
			</div>
		</div>
		<div class="omhb-infos-item">
			<div>
				<p class="omhb-infos-titre"><?php esc_html_e( 'Toute l\'actu sur les réseaux', 'omhb' ); ?></p>
				<p>
					<?php
					$omhb_facebook  = get_theme_mod( 'omhb_facebook', 'https://www.facebook.com/OlympiqueMehunHandball' );
					$omhb_instagram = get_theme_mod( 'omhb_instagram', 'https://www.instagram.com/om_hb18/' );
					if ( $omhb_facebook ) {
						echo '<a class="omhb-icone-reseau" href="' . esc_url( $omhb_facebook ) . '" target="_blank" rel="noopener" aria-label="Facebook">';
						omhb_icone_reseau( 'facebook' );
						echo '</a> ';
					}
					if ( $omhb_instagram ) {
						echo '<a class="omhb-icone-reseau" href="' . esc_url( $omhb_instagram ) . '" target="_blank" rel="noopener" aria-label="Instagram">';
						omhb_icone_reseau( 'instagram' );
						echo '</a>';
					}
					?>
				</p>
			</div>
		</div>
	</div>
</div>

<section class="omhb-section" id="omhb-acces">
	<div class="omhb-conteneur">
		<div class="omhb-grille-acces">
			<a class="omhb-acces-carte" href="<?php echo esc_url( home_url( '/adhesion/' ) ); ?>">
				<div class="omhb-acces-icone">✋</div>
				<h2 class="omhb-acces-titre"><?php esc_html_e( 'Adhésion', 'omhb' ); ?></h2>
				<p><?php esc_html_e( 'Tarifs, réductions familiales, aides à la licence et documents à fournir.', 'omhb' ); ?></p>
			</a>
			<a class="omhb-acces-carte" href="<?php echo esc_url( home_url( '/equipes/' ) ); ?>">
				<div class="omhb-acces-icone">⏱️</div>
				<h2 class="omhb-acces-titre"><?php esc_html_e( 'Équipes & horaires', 'omhb' ); ?></h2>
				<p><?php esc_html_e( 'Du BabyHand aux loisirs : retrouvez les catégories et les créneaux d\'entraînement.', 'omhb' ); ?></p>
			</a>
			<a class="omhb-acces-carte" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<div class="omhb-acces-icone">📍</div>
				<h2 class="omhb-acces-titre"><?php esc_html_e( 'Contacts & accès', 'omhb' ); ?></h2>
				<p><?php esc_html_e( 'Le bureau (présidente, secrétaire, trésorière), le gymnase, le téléphone et le formulaire : tous les moyens de nous joindre.', 'omhb' ); ?></p>
			</a>
		</div>
	</div>
</section>

<section class="omhb-section omhb-section-grise" id="omhb-actualites">
	<div class="omhb-conteneur">
		<div class="omhb-section-entete">
			<h2 class="omhb-section-titre"><?php esc_html_e( 'Actualités du club', 'omhb' ); ?></h2>
			<a class="omhb-section-lien" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/actualites/' ) ); ?>"><?php esc_html_e( 'Toutes les actualités →', 'omhb' ); ?></a>
		</div>

		<?php
		$omhb_recents = new WP_Query( array(
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
		) );
		?>

		<?php if ( $omhb_recents->have_posts() ) : ?>
			<div class="omhb-grille-articles">
				<?php
				while ( $omhb_recents->have_posts() ) :
					$omhb_recents->the_post();
					get_template_part( 'template-parts/card', 'post' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<div class="omhb-message-info">
				<p><?php esc_html_e( 'Aucune actualité publiée pour le moment. Créez votre premier article dans Articles > Ajouter.', 'omhb' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php if ( omhb_equipes_ffhb_liste() ) : ?>
<section class="omhb-section" id="omhb-matchs">
	<div class="omhb-conteneur">
		<div class="omhb-section-entete">
			<h2 class="omhb-section-titre"><?php esc_html_e( 'Résultats & classements', 'omhb' ); ?></h2>
			<a class="omhb-section-lien" href="<?php echo esc_url( home_url( '/calendrier/' ) ); ?>"><?php esc_html_e( 'Page Calendrier →', 'omhb' ); ?></a>
		</div>
		<p class="omhb-section-texte"><?php esc_html_e( 'Suivez chaque équipe du club (y compris les équipes en entente) directement sur les pages officielles de la FFHB.', 'omhb' ); ?></p>
		<?php echo omhb_equipes_ffhb_html(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
	</div>
</section>
<?php endif; ?>

<section class="omhb-cta">
	<div class="omhb-conteneur">
		<h2><?php esc_html_e( 'Rejoignez l\'Olympique Mehun Handball !', 'omhb' ); ?></h2>
		<p><?php esc_html_e( 'Débutant ou confirmé, de 3 à 99 ans, il y a une place pour vous sur les terrains.', 'omhb' ); ?></p>
		<a class="omhb-bouton" href="<?php echo esc_url( home_url( '/adhesion/' ) ); ?>"><?php esc_html_e( 'J\'adhère maintenant', 'omhb' ); ?></a>
	</div>
</section>

<?php get_footer(); ?>
