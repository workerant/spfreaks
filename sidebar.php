<?php
/**
 * Sidebar
 *
 * Content for our sidebar, provides prompt for logged in users to create widgets
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */
?>

<!-- Sidebar -->
<aside class="large-4 columns sidebar">

<h4 class="uppercase border-bottom">&nbsp;</h4>

<h6 class="border-bottom">Recently Added Items</h6>
<div class="row">
<?php $the_query = new WP_Query(array( 'post_type' => 'item', 'posts_per_page' => 3 ));
  while ($the_query->have_posts()) : $the_query->the_post(); ?>
  <?php if ( has_post_thumbnail()) : ?>
    <div class="columns small-4">
      <a href="<?php the_permalink(); ?>" class="item-thumbnail"> 
        <?php the_post_thumbnail('thumbnail'); ?>
      </a>
    </div>
  <?php endif; ?>
<?php endwhile; ?>
</div>

<?php if ( dynamic_sidebar('Sidebar Right') ) : elseif( current_user_can( 'edit_theme_options' ) ) : ?> <?php endif; ?>

</aside>
<!-- End Sidebar -->