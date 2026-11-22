<?php
/**
 * Page introuvable.
 *
 * @package omhb
 */

get_header();
?>

<div class="omhb-page-entete<?php echo omhb_banniere_aleatoire() ? ' omhb-page-entete-image' : ''; ?>">
	<?php echo omhb_banniere_aleatoire_html(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
	<div class="omhb-conteneur">
		<h1><?php esc_html_e( 'Page introuvable', 'omhb' ); ?></h1>
	</div>
</div>

<div class="omhb-contenu-page">
	<div class="omhb-conteneur">
		<div class="omhb-contenu-colonne">
			<p><?php esc_html_e( 'La page que vous cherchez n\'existe pas ou a été déplacée. Utilisez la recherche :', 'omhb' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
