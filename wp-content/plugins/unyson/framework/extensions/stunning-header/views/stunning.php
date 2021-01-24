<?php
/**
 * @var $bg_image
 * @var $bg_animate
 * @var $title_show
 * @var $title_text
 * @var $breadcrumbs_show
 * @var $text
 * @var $bottom_image
 * @var $classes
 * @var $bg_animate_type
 */
?>

<?php
$ext = fw_ext( 'stunning-header' );
?>

<section id="stunning-header" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"
         data-animate-type="<?php echo $bg_animate_type; ?>">
	<?php
	if ( $bg_image && $bg_image !== 'none' ) {
		$bg_classes = array( 'crumina-heading-background' );
		?>
        <div class="<?php echo esc_attr( implode( ' ', $bg_classes ) ); ?>"></div>
	<?php } ?>

    <div class="container">

        <div class="stunning-header-content-wrap">
			<?php if ( $title_show === 'yes' ) {
				echo '<div class="stunning-content-item">';

				echo $ext->get_view( 'title', array(
					'title_text' => $title_text
				) );
				echo '</div>';
			}

			if ( ! empty( $text ) ) { ?>
                <div class="stunning-content-item">
                    <div class="stunning-header-text">
						<?php if ( ! empty( $text ) ) {
							global $allowedtags;
							echo wp_kses( do_shortcode( $text ), $allowedtags );
						} else if ( is_category() ) {
							echo category_description();
						}
						?>
                    </div>
                </div>
			<?php }

			if ( 'yes' === $breadcrumbs_show && function_exists( 'fw_ext_breadcrumbs' ) && !is_search() ) {
				echo '<div class="stunning-content-item">';
				fw_ext_breadcrumbs( '/' );
				echo '</div>';
			}
			?>

        </div>
        <?php 
        	if( is_search() ){
				$s_query = filter_input( INPUT_GET, 's', FILTER_SANITIZE_STRING );
			?>
				<section class="search-page-panel">
					<div class="container">
						<div class="row">
							<div class="col col-xl-12 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
								<form class="form-inline search-form" action="<?php echo home_url(); ?>" method="GET">
									<div class="form-group label-floating">
										<label class="control-label" for="s"><?php esc_html_e( 'What do you search?', 'olympus' ); ?></label>
										<input class="form-control bg-white" name="s" type="text"
											value="<?php echo esc_attr( $s_query ); ?>">
									</div>
	
									<button class="btn btn-purple btn-lg" type="submit"><?php esc_html_e( 'Search', 'olympus' ); ?></button>
								</form>
							</div>
						</div>
					</div>
			</section>
		<?php }
		if ( $bottom_image ) { ?>
            <div class="stunning-header-img-bottom">
                <img src="<?php echo esc_attr( $bottom_image ); ?>"
                     alt="<?php esc_attr_e( 'Bottom image', 'crum-ext-stunning-header' ); ?>" loading="lazy">
            </div>
		<?php } ?>

    </div>
</section>