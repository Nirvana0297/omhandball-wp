<?php
/**
 * Article seul.
 *
 * @package omhb
 */

get_header();
?>

<div class="omhb-page-entete">
	<div class="omhb-conteneur">
		<?php omhb_fil_ariane(); ?>
		<h1><?php the_title(); ?></h1>
	</div>
</div>

<div class="omhb-contenu-page">
	<div class="omhb-conteneur">
		<div class="omhb-contenu-colonne">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<p class="omhb-article-metas">
					<?php
					printf(
						/* translators: 1 : date, 2 : auteur */
						esc_html__( 'Publié le %1$s par %2$s', 'omhb' ),
						esc_html( get_the_date() ),
						esc_html( get_the_author() )
					);
					?>
				</p>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large', array( 'class' => 'omhb-image-mise-en-avant' ) ); ?>
				<?php endif; ?>
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
				<nav class="omhb-navigation-articles">
					<div><?php previous_post_link( '%link', '← %title' ); ?></div>
					<div><?php next_post_link( '%link', '%title →' ); ?></div>
				</nav>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
