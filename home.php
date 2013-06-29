<?php get_header(); ?>
    <hr class="texture">
    <div class="large-12 columns" role="main">
      <div class="row">
        <div class="columns large-6">
          <h3 class="uppercase border-bottom">Recently Added Items</h3>
          <div class="row">
            <!-- 16 total, moving over 2 at at time not infinite -->
            <?php $the_query = new WP_Query(array( 'post_type' => 'item', 'posts_per_page' => 6 ));
              while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <?php if ( has_post_thumbnail()) : ?>
                <div class="columns large-4 small-4">
                  <a href="<?php the_permalink(); ?>" class="item-thumbnail"> 
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <span class="over">
                      <h6><?php the_title(); ?></h6>
                      <h6> <?php $terms_as_text = get_the_term_list( $post->ID, 'country', '', ', ', '' ) ; echo strip_tags($terms_as_text, '');?></h6>
                    </span> 
                  </a>
                </div>
              <?php endif; ?>
            <?php endwhile; ?>
          </div>
          <div class="row">
            <div class="columns large-12 text-right">
              <h6 class="caps"><a href="/item">Next <span class="carrot">></span></a></h6>
            </div>
          </div>
        </div>
        <div class="columns large-6 texture-left">
          <h3 class="uppercase border-bottom">In the News</h3>
          <?php $the_query = new WP_Query(array( 'category_name' => 'blog', 'posts_per_page' => 1 ));
            while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php if ( has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="news-thumbnail"> 
                  <?php the_post_thumbnail('large'); ?>
                  <span class="over">
                    <h5><?php the_title(); ?></h5>
                    <h5><?php the_date(); ?></h5>
                    <p><?php the_excerpt() ?></p>
                  </span>
                </a>
            <?php endif; ?>
          <?php endwhile; ?>
          <div class="row">
            <div class="columns large-12 text-right">
              <h6 class="caps"><a href="/blog">More <span class="carrot">+</span></a></h6>
            </div>
          </div>
        </div>
      <hr class="texture">
      </div>
    
    <h3 class="uppercase border-bottom like-to">I Would like to:</h3>
    <div class="row headline">
      <div class="columns large-3 small-6">
        <a href="/merch" class="panel">
          <h5>View Merchandise</h5>
          <img src="<?php bloginfo('template_url'); ?>\img\icon-merch.png" alt="merch">
        </a>
      </div>
      <div class="columns large-3 small-6">
        <a href="/item" class="panel">
          <h5>Build My Collection</h5>
          <img src="<?php bloginfo('template_url'); ?>\img\icon-collection.png" alt="collection">
        </a>
      </div>
      <div class="columns large-3 small-6">
        <a href="/concert" class="panel">
          <h5>Track My Concerts</h5>
          <img src="<?php bloginfo('template_url'); ?>\img\icon-concerts.png" alt="concerts">
        </a>
      </div>
      <div class="columns large-3 small-6">
        <a href="/forums" class="panel">
          <h5>Read the Forum</h5>
          <img src="<?php bloginfo('template_url'); ?>\img\icon-forum.png" alt="forum">
        </a>
      </div>
    </div>

  </div>

<?php get_footer(); ?>