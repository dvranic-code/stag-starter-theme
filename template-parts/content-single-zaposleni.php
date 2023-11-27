<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

use stag_theme\ThemeSettings\STAG_Template_Tags;

$zvanje   = get_field( 'zvanje' );
$pozicija = get_field( 'pozicija' );
$odsek    = get_field( 'odsek' );
$email    = get_field( 'email' );
$telefon  = get_field( 'telefon' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-wrap">
		<div class="container">
			<div class="row row-inverse-mob">
				<div class="col-lg-8">
					<div class="entry-content">
						<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php STAG_Template_Tags::stag_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
				
				<div class="col-lg-4">

					<div class="single-widget">
						<div class="single-widget__employee">
							<div class="single-widget__employee__image">
								<?php if ( has_post_thumbnail() ) : ?>
									<img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php the_title(); ?>">
								<?php endif; ?>
							</div>
							<div class="single-widget__employee__info">
							<h1><?php the_title(); ?></h1>
							<?php
							$employee_filds = array( $zvanje, $pozicija, $odsek, $email, $telefon );
							foreach ( $employee_filds as $field ) {
								if ( $field ) {
									echo '<p>' . esc_html( $field ) . '</p>';
								}
							}
							?>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
