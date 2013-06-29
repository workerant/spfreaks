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

<?php if ( have_posts() ) : ?>
    <!-- Main Content -->
    <div class="large-12 columns" role="main">

    <?php get_template_part( 'inc/header', get_post_type() ); ?>

    <div class="row">
      <div class="columns large-2">

          <?php get_template_part( 'inc/filters', get_post_type() ); ?>
  
      </div>
      <div class="columns large-10">
        
        <div id="results">

          	<?php while ( have_posts() ) : the_post(); ?>

              <?php get_template_part( 'inc/loop', get_post_type() ) ?>
              
          	<?php endwhile; ?>
        </div>

        <div class="navigation row">
          <div class="columns small-2"><h6><?php previous_posts_link('<span class="carrot"><</span> Previous'); ?></h6></div>
          <div class="columns small-2 text-right"><h6><?php next_posts_link('Next <span class="carrot">></span>'); ?></h6></div>
        </div>

      </div>
    </div>

    </div>
    <!-- End Main Content -->
<?php endif; ?>

<?php get_footer(); ?>