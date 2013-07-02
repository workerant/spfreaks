<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
  <?php $startDate  = get_post_meta($post->ID, 'spf_start-date', true); ?>
  <?php $detail     = get_the_excerpt();  ?>
  <div class="columns large-1">
    <p><?php if($startDate): ?><strong><?php echo $startDate; ?></strong><?php endif; ?></p>
  </div>
  <div class="columns large-3">
    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
  </div>
  <div class="columns large-2">
    <p><?php the_terms( $post->ID, 'country', '', ', ', ' ' ); ?></p>
  </div>
  <div class="columns large-1">
    <p><?php the_terms( $post->ID, 'eventtype', '', ', ', ' ' ); ?></p>
  </div>
  <div class="columns large-3">
    <p><?php if($detail): ?><?php echo substr($detail,0,75) .' &hellip;'; ?><?php endif; ?></p>
  </div>
  <div class="columns large-1 signin">
    <input type="checkbox">
  </div>
  <div class="columns large-1">
    <h6 class="caps"><a href="<?php the_permalink(); ?>">More <span class="carrot">></span></a></h6>
  </div>
</article>