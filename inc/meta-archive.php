<div class="columns large-12">
  <?php $post = $posts[0]; ?>
  <?php if (is_category()) : ?>
    <h1 class="pagetitle"><?php single_cat_title(); ?> <?php echo $pageNumber = (get_query_var('paged')) ? '&raquo; Page '.get_query_var('paged') : ''; ?></h1>
  <?php elseif( is_tag() ): ?>
    <h1 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>
  <?php elseif (is_author()): ?>
    <?php get_template_part('inc/meta' , 'author'); ?>
  <?php elseif (is_day()): ?>
    <h1 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h1>
  <?php elseif (is_month()): ?>
    <h1 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h1>
  <?php elseif (is_year()): ?>
    <h1 class="pagetitle">Archive for <?php the_time('Y'); ?></h1>
  <?php endif; ?>
  <hr>
</div>