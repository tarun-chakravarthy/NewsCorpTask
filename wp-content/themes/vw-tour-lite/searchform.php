<?php
/**
 * The template for displaying search forms in VW Tour Lite
 *
 * @package VW Tour Lite
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'vw-tour-lite' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'vw-tour-lite' ); ?>" value="<?php echo get_search_query() ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'vw-tour-lite' ); ?>">
</form>