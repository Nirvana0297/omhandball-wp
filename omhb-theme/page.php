<?php
/**
 * Page statique.
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
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'large', array( 'class' => 'omhb-image-mise-en-avant' ) );
				}
				the_content();
				wp_link_pages();
			endwhile;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
