<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _s
 */

get_header();

?>

<main id="primary" class="site-main">
	<div class="general-search__top">
		<div class="container">
			<?php get_search_form(); ?>
		</div>
	</div>
	<div class="container">
	<?php if ( have_posts() ) : ?>
		<div class="general-search__bottom">
			<div class="container">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Резултати претраге за: ', '_s' ); ?></h1>
					<h3 class="search-query"><?php echo esc_html( get_search_query() ); ?></h3>
				</header><!-- .page-header -->
			</div>
		</div>
		
		<?php
			/* Start the Loop */
		while ( have_posts() ) :
			the_post();
			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'posts-grid' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
