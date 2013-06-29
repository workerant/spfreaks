<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <div class="columns large-2">
      <?php if ( has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
      <?php endif; ?>
    </div>
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
    <div class="columns large-4">
      <p><strong>Title:</strong> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
      <p><strong>Category:</strong> <?php the_terms( $post->ID, 'itemcategory', '', ', ', ' ' ); ?></p>
      <p><strong>Release Type:</strong> <?php the_terms( $post->ID, 'releasetype', '', ', ', ' ' ); ?></p>
      <p><strong>Release Date:</strong> <?php if($releaseDate): ?><?php echo $releaseDate; ?><?php endif; ?></p>
    </div>
    <div class="columns large-3">
      <p><strong>Country:</strong> <?php the_terms( $post->ID, 'country', '', ', ', ' ' ); ?></p>
      <p><strong>Label:</strong> <?php if($label): ?><?php echo $releaseDate; ?><?php endif; ?></p>
      <p><strong>Format:</strong> <?php the_terms( $post->ID, 'format', '', ', ', ' ' ); ?></p>
      <p><strong>Package:</strong> <?php if($package):  ?><?php echo $package; ?><?php endif; ?></p>
    </div>
    <div class="columns large-2 signin">
      <p>To access My Collections<br> <a href="/login">Sign In</a> or <a href="/register">Register</a></p>
    </div>
    <div class="columns large-1">
      <p>&nbsp;</p>
    </div>
</article>