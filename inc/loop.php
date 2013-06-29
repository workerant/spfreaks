<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>

  <?php if ( has_post_thumbnail()) : ?>
    <div class="columns large-4">
      <a href="<?php the_permalink(); ?>"> 
        <?php the_post_thumbnail(); ?>
      </a>
    </div>
  <?php endif; ?>
    <div class="columns <?php echo (has_post_thumbnail()) ? 'large-8' : 'large-12'; ?> ">
    <header>
      <hgroup>
        <h3><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
        <?php if ( is_sticky() ) : ?><span class="right radius secondary label"><?php _e( 'Sticky', 'foundation' ); ?></span><?php endif; ?>
        <h6><?php the_date(); ?></h6>
      </hgroup>
    </header>
    <?php the_excerpt(); ?>
    <h6 class="text-right caps"><a href="/blog">More <span class="carrot">+</span></a></h6>
    </div>      
  
  <div class="columns large-12"><hr class="thin"></div>
</article>
