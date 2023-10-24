<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

use stag_theme\ThemeSettings\STAG_Template_Tags;
$single_page_widgets = get_field( 'single_page_widgets', 'option' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'test' ); ?>>
	<?php STAG_Template_Tags::stag_post_thumbnail(); ?>
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="<?php echo $single_page_widgets ? 'col-lg-8' : 'col-lg-12'; ?>">
					<?php STAG_Template_Tags::stag_entry_tags(); ?>
					<header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'post' === get_post_type() ) :
							?>
							<div class="entry-meta">
								<?php STAG_Template_Tags::stag_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->

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
				<?php if ( have_rows( 'single_page_widgets', 'option' ) ) : ?>
				<div class="col-lg-4">
					<?php
					while ( have_rows( 'single_page_widgets', 'option' ) ) :
								the_row();
								$widget_title        = get_sub_field( 'widget_title' );
								$widget_image        = get_sub_field( 'widget_image' );
								$widget_text         = get_sub_field( 'widget_text' );
								$widget_buttton_text = get_sub_field( 'widget_buttton_text' );
								$widget_buttton_url  = get_sub_field( 'widget_buttton_url' );
						?>
						<div class="single-widget">
						<?php if ( $widget_title ) : ?>
							<h3 class="single-widget__title">
								<?php echo esc_html( $widget_title ); ?>
							</h3>
							<?php endif; ?>
						<?php if ( $widget_image ) : ?>
							<figure class="single-widget__image">
								<?php echo wp_get_attachment_image( $widget_image, 'full' ); ?>
							</figure>
							<?php endif; ?>
						<?php if ( $widget_text ) : ?>
							<p class="single-widget__text">
								<?php echo esc_html( $widget_text ); ?>
							</p>
							<?php endif; ?>
						<?php if ( $widget_buttton_text && $widget_buttton_url ) : ?>
							<a href="<?php echo esc_url( $widget_buttton_url ); ?>" class="btn btn--sm">
								<?php echo esc_html( $widget_buttton_text ); ?>
							</a>
						<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
