<?php
/**
 * Formulaire de recherche.
 *
 * @package omhb
 */

?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="omhb-lien-evitement" for="omhb-champ-recherche"><?php esc_html_e( 'Rechercher', 'omhb' ); ?></label>
	<input type="search" id="omhb-champ-recherche" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Rechercher…', 'omhb' ); ?>">
</form>
