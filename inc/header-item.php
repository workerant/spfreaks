    <p><a href="/">home</a> / <a href="/<?php get_post_type(); ?>/">collections</a><p>

    <h1 class="pagetitle">Collections</h1>

    <div class="row bgblack">
      <div class="columns large-offset-2 large-10">
        <div class="row">
          <div class="columns large-2"><h6>Item</h6></div>
          <div class="columns large-7"><h6>Item Details</h6></div>
          <div class="columns large-3"><h6>My Collection</h6></div>
        </div>
      </div>
    </div>
    <div class="row bggrey">  
      <div class="columns large-2"><p>&nbsp;</p></div>
      <div class="columns large-8">
        <p>Showing <?php echo $wp_query->post_count; ?> of out <?php echo $wp_query->found_posts; ?> results</p>
      </div>
      <div class="columns large-2">
        <select id="sortby">
          <option value="-1">Sort by</option>
          <option value="orderby=date&order=ASC">Recently Added</option>
          <option value="orderby=modified&order=ASC">Recently Modifield</option>
          <option value="orderby=title&order=ASC">Title (A-Z)</option>
          <option value="orderby=title&order=DSC">Title (Z-A)</option>
        </select>
      </div>
    </div>