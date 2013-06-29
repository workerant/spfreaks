<?php
/**
 * Searchform
 *
 * Custom template for search form
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>


	<div class="row">
		<div class="large-12 columns">
			<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" name="s" id="s" />
				<button type="submit" class="button" id="searchsubmit">Search</button>
			</form>
		</div>
	</div>
