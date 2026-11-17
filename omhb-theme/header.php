<?php
/**
 * En-tête du site.
 *
 * @package omhb
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="omhb-lien-evitement" href="#omhb-contenu"><?php esc_html_e( 'Aller au contenu', 'omhb' ); ?></a>

<div class="omhb-topbar">
	<div class="omhb-conteneur">
		<div>
			<?php
			$omhb_tel = get_theme_mod( 'omhb_tel', '06 71 65 75 33' );
			if ( $omhb_tel ) :
				?>
				<a href="tel:<?php echo esc_attr( preg_replace( '/[^+\d]/', '', $omhb_tel ) ); ?>">📞 <?php echo esc_html( $omhb_tel ); ?></a>
				&nbsp;·&nbsp;
			<?php endif; ?>
			<?php
			$omhb_email = get_theme_mod( 'omhb_email', '5418002@cvl.ffhandball.net' );
			if ( $omhb_email ) :
				?>
				<a href="mailto:<?php echo esc_attr( $omhb_email ); ?>">✉️ <?php echo esc_html( $omhb_email ); ?></a>
			<?php endif; ?>
		</div>
		<div class="omhb-topbar-reseaux">
			<?php
			$omhb_facebook  = get_theme_mod( 'omhb_facebook', 'https://www.facebook.com/OlympiqueMehunHandball' );
			$omhb_instagram = get_theme_mod( 'omhb_instagram', 'https://www.instagram.com/om_hb18/' );
			if ( $omhb_facebook ) :
				?>
				<a class="omhb-icone-reseau" href="<?php echo esc_url( $omhb_facebook ); ?>" target="_blank" rel="noopener" aria-label="Facebook"><?php omhb_icone_reseau( 'facebook' ); ?></a>
			<?php endif; ?>
			<?php if ( $omhb_instagram ) : ?>
				<a class="omhb-icone-reseau" href="<?php echo esc_url( $omhb_instagram ); ?>" target="_blank" rel="noopener" aria-label="Instagram"><?php omhb_icone_reseau( 'instagram' ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>

<header class="omhb-entete">
	<div class="omhb-conteneur">
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php elseif ( file_exists( get_template_directory() . '/assets/img/logo-club.png' ) ) : ?>
			<a class="omhb-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo-club.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="1254" height="1254">
			</a>
		<?php else : ?>
			<a class="omhb-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div>
					<?php bloginfo( 'name' ); ?>
					<span class="omhb-logo-slogan"><?php echo esc_html( get_theme_mod( 'omhb_hero_badge', __( 'Club de handball', 'omhb' ) ) ); ?></span>
				</div>
			</a>
		<?php endif; ?>

		<button class="omhb-burger" aria-expanded="false" aria-controls="omhb-menu-principal" aria-label="<?php esc_attr_e( 'Ouvrir le menu', 'omhb' ); ?>">
			<span></span><span></span><span></span>
		</button>

		<nav class="omhb-navigation" id="omhb-menu-principal" aria-label="<?php esc_attr_e( 'Menu principal', 'omhb' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'principal',
				'container'      => false,
				'fallback_cb'    => false,
				'depth'          => 2,
			) );
			?>
		</nav>
	</div>
</header>
