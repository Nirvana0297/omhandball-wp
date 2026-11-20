<?php
/**
 * Pied de page.
 *
 * @package omhb
 */

?>
<footer class="omhb-pied">
	<div class="omhb-conteneur">
		<div class="omhb-pied-labels">
			<p class="omhb-pied-labels-titre"><?php esc_html_e( 'Club affilié à la FFHB', 'omhb' ); ?></p>
			<div class="omhb-labels">
				<?php
				$omhb_labels_dir = get_template_directory_uri() . '/assets/img/labels/';
				$omhb_labels = array(
					'label-club-affilie' => __( 'Label Club affilié FFHB', 'omhb' ),
					'label-babyhand'     => __( 'Label Babyhand FFHB', 'omhb' ),
					'label-handloisir'   => __( 'Label Handloisir FFHB', 'omhb' ),
					'label-arbitrage'    => __( 'Label Arbitrage FFHB', 'omhb' ),
				);
				foreach ( $omhb_labels as $omhb_fichier => $omhb_alt ) :
					?>
					<img src="<?php echo esc_url( $omhb_labels_dir . $omhb_fichier . '.png' ); ?>" alt="<?php echo esc_attr( $omhb_alt ); ?>" loading="lazy">
				<?php endforeach; ?>
			</div>
		</div>
		<div class="omhb-pied-colonnes">
			<div>
				<h3><?php bloginfo( 'name' ); ?></h3>
				<p><?php echo esc_html( get_theme_mod( 'omhb_hero_titre', __( 'La Passion du Hand depuis 1968', 'omhb' ) ) ); ?></p>
				<p><?php echo esc_html( get_theme_mod( 'omhb_adresse', 'Gymnase Pierre de Coubertin, Boulevard de la Liberté, 18500 Mehun-sur-Yèvre' ) ); ?></p>
			</div>
			<div>
				<h3><?php esc_html_e( 'Navigation', 'omhb' ); ?></h3>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'pied',
					'container'      => false,
					'fallback_cb'    => false,
					'depth'          => 1,
				) );
				?>
			</div>
			<div>
				<h3><?php esc_html_e( 'Nous suivre', 'omhb' ); ?></h3>
				<ul>
					<?php
					$omhb_facebook  = get_theme_mod( 'omhb_facebook', 'https://www.facebook.com/OlympiqueMehunHandball' );
					$omhb_instagram = get_theme_mod( 'omhb_instagram', 'https://www.instagram.com/om_hb18/' );
					if ( $omhb_facebook ) :
						?>
						<li><a class="omhb-icone-reseau" href="<?php echo esc_url( $omhb_facebook ); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php omhb_icone_reseau( 'facebook' ); ?></a></li>
					<?php endif; ?>
					<?php if ( $omhb_instagram ) : ?>
						<li><a class="omhb-icone-reseau" href="<?php echo esc_url( $omhb_instagram ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><?php omhb_icone_reseau( 'instagram' ); ?></a></li>
					<?php endif; ?>
					<?php
					$omhb_email = get_theme_mod( 'omhb_email', '5418002@cvl.ffhandball.net' );
					if ( $omhb_email ) :
						?>
						<li><a href="mailto:<?php echo esc_attr( $omhb_email ); ?>"><?php echo esc_html( $omhb_email ); ?></a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<div class="omhb-pied-bas">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> — <?php esc_html_e( 'Tous droits réservés', 'omhb' ); ?></span>
			<span><?php esc_html_e( 'Club affilié à la FFHB', 'omhb' ); ?></span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
