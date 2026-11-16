<?php
/**
 * Gabarit par défaut : liste des articles, recherche, archives.
 *
 * @package omhb
 */

get_header();
?>

<div class="omhb-page-entete">
	<div class="omhb-conteneur">
		<?php omhb_fil_ariane(); ?>
		<h1>
			<?php
			if ( is_home() && ! is_front_page() ) {
				single_post_title();
			} elseif ( is_search() ) {
				printf( esc_html__( 'Résultats pour « %s »', 'omhb' ), esc_html( get_search_query() ) );
			} elseif ( is_archive() ) {
				the_archive_title();
			} else {
				esc_html_e( 'Actualités', 'omhb' );
			}
			?>
		</h1>
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
				<div><?php previous_posts_link( esc_html__( '← Actualités récentes', 'omhb' ) ); ?></div>
				<div><?php next_posts_link( esc_html__( 'Actualités précédentes →', 'omhb' ) ); ?></div>
			</nav>
		<?php else : ?>
			<div class="omhb-message-info">
				<p>
					<?php
					if ( is_search() ) {
						esc_html_e( 'Aucun résultat. Essayez avec d\'autres mots-clés.', 'omhb' );
					} else {
						esc_html_e( 'Aucun article publié pour le moment.', 'omhb' );
					}
					?>
				</p>
				<?php get_search_form(); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
