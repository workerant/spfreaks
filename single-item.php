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

      <p><a href="/">home</a> / <a href="/item/">collections</a> / item details<p>

      <h1 class="pagetitle">Item Details</h1>

  		<?php if ( have_posts() ) : ?>

  			<?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
            <div class="columns large-12">

            <h4 class="red"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'foundation' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><em><?php the_title(); ?></em></a></h4>
            <div class="row">
              <div class="columns large-6">
                <h4 class="uppercase border-bottom">Information</h4>
                <?php
                  $releaseDate         = get_post_meta($post->ID, 'spf_release-date', true);
                  $package             = get_post_meta($post->ID, 'spf_package', true);
                  $releaseCode         = get_post_meta($post->ID, 'spf_release-code', true);
                  $upc                 = get_post_meta($post->ID, 'spf_upc', true);
                  $matrixCode          = get_post_meta($post->ID, 'spf_maxtix-codes', true);
                  $otherCode           = get_post_meta($post->ID, 'spf_other-code', true);
                  $rpm                 = get_post_meta($post->ID, 'spf_rpm', true);
                  $amountPressed       = get_post_meta($post->ID, 'spf_amount-pressed', true);
                  $label               = get_post_meta($post->ID, 'spf_label', true);
                  $countryManufactured = get_post_meta($post->ID, 'spf_country-manufactured', true);
                ?>
                <div class="row information thin-bottom-border">
                  <div class="columns large-6">
                    <p><strong>Artist:</strong> <?php the_terms( $post->ID, 'artist', '', ', ', ' ' ); ?></p>
                    <p><strong>Item Category:</strong> <?php the_terms( $post->ID, 'itemcategory', '', ', ', ' ' ); ?></p>
                    <p><strong>Format:</strong> <?php the_terms( $post->ID, 'format', '', ', ', ' ' ); ?></p>
                    <p><strong>Release Type:</strong> <?php the_terms( $post->ID, 'releasetype', '', ', ', ' ' ); ?></p>
                    <p><strong>Release Date:</strong> <?php echo $releaseDate; ?></p>
                    <p><strong>Country Released:</strong> <?php the_terms( $post->ID, 'country', '', ', ', ' ' ); ?></p>
                    <p><strong>Country Manufactured:</strong> <?php if($countryManufactured): ?><?php echo $countryManufactured; ?></p><?php endif; ?>
                    <p><strong>Package:</strong> <?php if($package):?><?php echo $package; ?></p><?php endif; ?>
                  </div>
                  <div class="columns large-6">
                    <p><strong>Label:</strong> <?php if($label): ?><?php echo $label; ?></p><?php endif; ?>
                    <p><strong>Release Code:</strong>  <?php if($releaseCode): ?><?php echo $releaseCode; ?></p><?php endif; ?>                  
                    <p><strong>UPC:</strong>  <?php if($upc): ?><?php echo $upc; ?></p><?php endif; ?>
                    <p><strong>Matrix Code:</strong>  <?php if($matrixCode): ?><?php echo $matrixCode; ?></p><?php endif; ?>
                    <p><strong>Other Code:</strong>  <?php if($otherCode): ?><?php echo $otherCode; ?></p><?php endif; ?>
                    <p><strong>RPM:</strong>  <?php if($rpm):?><?php echo $rpm; ?></p><?php endif; ?>
                    <p><strong>Amount Pressed:</strong>  <?php if($amountPressed): ?><?php echo $amountPressed; ?></p><?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="columns large-6">
                <h4 class="uppercase border-bottom">Additional Information</h4>
                <?php the_content(); ?>
              </div>
            </div>
            <div class="row hide-for-small">
              <div class="columns large-6"><hr class="thin"></div>
              <div class="columns large-6"><hr class="thin"></div>
            </div>
            <div class="row">
              <div class="columns large-6">
                <h4 class="uppercase border-bottom">Item Art</h4>
                <?php
                $attachments = get_posts( array(
                   'post_type' => 'attachment',
                   'numberposts' => -1,
                   'post_status' => null,
                   'post_parent' => $post->ID
                  )
                ); ?>
                <?php if ( $attachments ): ?>
                  <div class="row">
                    <?php foreach ( $attachments as $attachment ): ?>
                      <div class="columns large-3">
                        <?php echo wp_get_attachment_image( $attachment->ID, 'thumbnail' ); ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
              <div class="columns large-6">
                <h4 class="uppercase border-bottom">My Collection</h4>
              </div>
            </div>
            <div class="row hide-for-small">
              <div class="columns large-6"><hr class="thin"></div>
              <div class="columns large-6"><hr class="thin"></div>
            </div>

            <div class="row tracks">
              <div class="columns large-3">                
                <?php $connected = new WP_Query( array( 'connected_type' => 'track_to_item', 'connected_items' => get_queried_object(), 'nopaging' => true, ) ); ?>
                <?php if ( $connected->have_posts() ) : ?>
                <h5 class="uppercase">Tracks</h5>
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