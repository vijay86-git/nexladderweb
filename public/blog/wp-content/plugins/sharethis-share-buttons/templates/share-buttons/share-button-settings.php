<?php
/**
 * Share Button Settings Template
 *
 * The template wrapper for the share buttons settings page.
 *
 * @package ShareThisShareButtons
 */

?>
<hr class="wp-header-end" style="display:none;">
<div class="wrap sharethis-wrap">
	<?php echo wp_kses_post( $description ); ?>

	<form action="options.php" method="post">
		<?php
		settings_fields( $this->menu_slug . '-share-buttons' );
		do_settings_sections( $this->menu_slug . '-share-buttons' );
		submit_button( esc_html__( 'Update', 'sharethis-share-buttons' ) );
		?>
	</form>
</div>
