<?php
/**
 * Single
 *
 * Loop container for single post content
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

get_header(); ?>

    <!-- Main Content -->
    <div class="large-9 columns" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <h1 class="pagetitle"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
          <h6><?php the_time(get_option('date_format')); ?></h6>

          <?php the_content(); ?>

          <footer>

            <h6><?php _e('Posted Under:', 'foundation' );?> <?php the_category(', '); ?></h6>
            <?php the_tags('<span class="radius secondary label">','</span><span class="radius secondary label">','</span>'); ?>

            <?php get_template_part('author-box'); ?>
            <?php comments_template(); ?>

          </footer>

        </article>

        <hr />
        
			<?php endwhile; ?>
			
		<?php endif; ?>

    </div>
    <!-- End Main Content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>