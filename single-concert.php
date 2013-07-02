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
    <div class="large-12 columns" role="main">

      <p><a href="/">home</a> / <a href="/item/">tour &amp; recording</a> / details<p>

      <h1 class="pagetitle">Tour &amp; Recording Details</h1>

  		<?php if ( have_posts() ) : ?>

  			<?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
            <div class="columns large-12">

              <h4 class="red"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><em><?php the_title(); ?></em></a></h4>
              
              <div class="row">
                <div class="columns large-12">
                  <h4 class="uppercase border-bottom">Information</h4>
                  <?php $startDate = get_post_meta($post->ID, 'spf_start-date', true); ?>
                  <div class="row information">
                    <div class="columns large-2">
                        <img src="<?php bloginfo('template_url'); ?>\img\icon-concerts-detail.png" alt="concerts">
                    </div>
                    <div class="columns large-4">
                      <p><strong>Date:</strong> <?php if($startDate): ?><?php echo $startDate; ?><?php endif; ?></p>
                      <p><strong>Location:</strong> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                      <p><strong>Country:</strong> <?php the_terms( $post->ID, 'country', '', ', ', ' ' ); ?></p>
                      <p><strong>Type:</strong> <?php the_terms( $post->ID, 'eventtype', '', ', ', ' ' ); ?></p>
                      <p><strong>Attended:</strong> <input type="checkbox"></p>
                    </div>
                    <div class="columns large-3">
                      <p><strong>Details:</strong></p>
                      <?php the_content(); ?>
                    </div>
                    <div class="columns large-3">
                      <p><strong>Other Attendees:</strong></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row hide-for-small">
                <div class="columns large-6"><hr class="thin"></div>
                <div class="columns large-6"><hr class="thin"></div>
              </div>
            <div class="row tracks">
              <div class="columns large-3">                
                <?php $connected = new WP_Query( array( 'connected_type' => 'track_to_concert', 'connected_items' => get_queried_object(), 'nopaging' => true, ) ); ?>
                <?php if ( $connected->have_posts() ) : ?>
                <h5 class="uppercase">Setlist</h5>
                <ol>
                  <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                    <li>
                      <a href="#"><?php the_title(); ?></a>
                      <?php
                        $trackLength    = get_post_meta($post->ID, 'spf_track-length', true);
                        $writtenBy      = get_post_meta($post->ID, 'spf_written-by', true);
                        $bmiNumber      = get_post_meta($post->ID, 'spf_bmi-number', true);
                        $additionalInfo = get_post_meta($post->ID, 'spf_additional-information', true);
                      ?>
                      <!-- 
                      <?php if($trackLength):    ?><strong>Track Length:</strong> <?php echo $trackLength; ?> | <?php endif; ?>
                      <?php if($writtenBy):      ?><strong>Written By:</strong> <?php echo $writtenBy; ?> | <?php endif; ?>
                      <?php if($bmiNumber):      ?><strong>BMI Number:</strong> <?php echo $bmiNumber; ?> <?php endif; ?>
                      <?php if($additionalInfo): ?><strong>Additional Track Info:</strong> <?php echo $additionalInfo; ?><br><?php endif; ?> -->

                  </li>
                  <?php endwhile; ?>
                </ol>

                <?php wp_reset_postdata(); ?>

                <?php endif; ?>

              </div>
              <div class="columns large-3">
                <h5 class="uppercase">Track Detail</h5>
                <p><strong>Track Length:</strong> 3:17</p>
                <p><strong>Location:</strong> Some Location Information</p>
              </div>
              <div class="columns large-3">
                <h5 class="uppercase">Lyrics</h5>

                  <p>I am one as you are three<br>
                                  Try to find messiah in your trinity<br>
                                  Your city to burn<br>
                                  Your city to burn<br>
                                  Try to look for something<br>
                                  In your city to burn, you'll burn<br>
                                  Am I as I seem?<br>
                                  I'm down<br>
                                  Down, so down </p>
              </div>
              <div class="columns large-3">
                <h5 class="uppercase">Also Available On</h5>
              </div>
            </div>

            </div>

          </article>
          <hr />
          
  			<?php endwhile; ?>
  		<?php endif; ?>

    </div>
    <!-- End Main Content -->

<?php get_footer(); ?>