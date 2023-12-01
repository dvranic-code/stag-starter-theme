<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

use stag_theme\ThemeSettings\STAG_Template_Tags;
use stag_theme\ThemeSettings\STAG_Extra_Functions;

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
							<div class="single-widget__employee--image">
								<?php if ( has_post_thumbnail() ) : ?>
									<img src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?php the_title(); ?>">
								<?php else : ?>
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholder-image.jpg" alt="<?php the_title(); ?>" />
								<?php endif; ?>
							</div>
							<div class="single-widget__employee--info">
								<?php the_title( '<h1>', '</h1>' ); ?>
								<?php if ( $zvanje ) : ?>
								<span><?php echo esc_html( $zvanje ); ?></span>
								<?php endif; ?>
								<?php if ( $pozicija || $odsek ) : ?>
								<p>
									<span><?php echo esc_html( $pozicija ); ?></span>
									<span><?php echo esc_html( $odsek ); ?></span>
								</p>
								<?php endif; ?>
								<?php if ( $email ) : ?>
								<p class="d-f">
									<?php STAG_Extra_Functions::fetch_icon( 'icon-envelope' ); ?> <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
								</p>
								<?php endif; ?>
								<?php if ( $telefon ) : ?>
								<p class="d-f">
									<?php STAG_Extra_Functions::fetch_icon( 'icon-phone' ); ?> <a href="tel:<?php echo esc_attr( $telefon ); ?>"><?php echo esc_html( $telefon ); ?></a>
								</p>
								<?php endif; ?>
								<?php if ( have_rows( 'mreze_i_linkovi' ) ) : ?>
								<ul class="single-widget__employee--info--socials">
									<?php
									while ( have_rows( 'mreze_i_linkovi' ) ) :
										the_row();
										$mreza = get_sub_field( 'mreza' );
										?>
										<li>
											<a href="<?php the_sub_field( 'link' ); ?>" target="_blank">
												<?php echo wp_get_attachment_image( $mreza, 'full' ); ?>
											</a>
										</li>
									<?php endwhile; ?>
								</ul>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
