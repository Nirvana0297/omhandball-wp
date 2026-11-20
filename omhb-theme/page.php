<?php
/**
 * Page statique.
 *
 * @package omhb
 */

get_header();

while ( have_posts() ) :
	the_post();

	// Image mise en avant : utilisée en fond du bandeau de titre de la page.
	$omhb_fond_url = get_the_post_thumbnail_url( get_the_ID(), 'omhb-hero' );
	?>

	<div class="omhb-page-entete<?php echo $omhb_fond_url ? ' omhb-page-entete-image' : ''; ?>">
		<?php if ( $omhb_fond_url ) : ?>
			<div class="omhb-page-fond" style="background-image:url(<?php echo esc_url( $omhb_fond_url ); ?>);"></div>
		<?php endif; ?>
		<div class="omhb-conteneur">
			<?php omhb_fil_ariane(); ?>
			<h1><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="omhb-contenu-page">
		<div class="omhb-conteneur">
			<div class="omhb-contenu-colonne">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
		</div>
	</div>

<?php endwhile; ?>

<?php get_footer(); ?>
