<?php
/**
 * Index Template
 *
 *
 * @file           index.php
 * @package        Bootstrap Parallax 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 2.3.1
 * @link           http://codex.wordpress.org/Theme_Development#Index_.28index.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>


<!-- Section #1 -->
	<section id="intro" data-speed="6" data-type="background">
		<div class="container">
			<?php query_posts('page_id=' . of_get_option('home_page_1', 'no entry' )); while (have_posts()) : the_post(); ?>
				<?php global $more;   
				$more = 0;
				the_content(""); ?>
			<?php endwhile; ?>
	    </div>
	</section>

	<!-- Section #2 -->
	<section id="middle" data-speed="4" data-type="background">
		<div class="container">
			<?php query_posts('page_id=' . of_get_option('home_page_2', 'no entry' )); while (have_posts()) : the_post(); ?>
				<?php global $more;   
				$more = 0;
				the_content(""); ?>
			<?php endwhile; ?>
	    </div>
	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>