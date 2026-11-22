<?php
/**
 * Archives (catégories, étiquettes, auteurs, dates).
 *
 * @package omhb
 */

get_header();
?>

<div class="omhb-page-entete<?php echo omhb_banniere_aleatoire() ? ' omhb-page-entete-image' : ''; ?>">
	<?php echo omhb_banniere_aleatoire_html(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
	<div class="omhb-conteneur">
		<?php omhb_fil_ariane(); ?>
		<h1><?php the_archive_title(); ?></h1>
	</div>
</div>

<div class="omhb-contenu-page">
	<div class="omhb-conteneur">
		<?php if ( have_posts() ) : ?>
			<div class="omhb-grille-articles">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/card', 'post' );
				endwhile;
				?>
			</div>

			<nav class="omhb-navigation-articles">
				<div><?php previous_posts_link( esc_html__( '← Page précédente', 'omhb' ) ); ?></div>
				<div><?php next_posts_link( esc_html__( 'Page suivante →', 'omhb' ) ); ?></div>
			</nav>
		<?php else : ?>
			<div class="omhb-message-info">
				<p><?php esc_html_e( 'Aucun article dans cette archive.', 'omhb' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
