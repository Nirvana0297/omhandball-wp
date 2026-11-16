<?php
/**
 * Carte d'article utilisée dans les grilles.
 *
 * @package omhb
 */

?>
<article class="omhb-carte">
	<a class="omhb-carte-image" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'omhb-carte' ); ?>
		<?php endif; ?>
	</a>
	<div class="omhb-carte-corps">
		<span class="omhb-carte-date"><?php echo esc_html( get_the_date() ); ?></span>
		<h3 class="omhb-carte-titre"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="omhb-carte-extrait"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
		<a class="omhb-carte-lire" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Lire la suite →', 'omhb' ); ?></a>
	</div>
</article>
