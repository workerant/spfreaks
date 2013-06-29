<?php
/**
 * Index
 *
 * Standard loop for the front-page
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

get_header(); ?>

    <?php get_template_part( 'inc/meta', 'archive'); ?>

    <!-- Main Content -->
    <div class="large-9 columns" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
      
      <?php get_template_part( 'inc/loop', get_post_type()); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<h2><?php _e('No posts.', 'foundation' ); ?></h2>
			<p class="lead"><?php _e('Sorry about this, I couldn\'t seem to find what you were looking for.', 'foundation' ); ?></p>
			
		<?php endif; ?>

    <div class="row">
      <div class="columns large-12 headline">
        <?php foundation_pagination(); ?>
      </div>
    </div>
    </div>
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>