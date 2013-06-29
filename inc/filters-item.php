        <div id="filters">
          
          <h6><a href="/item/">Clear Filters</a></h6>

          <h6>Search</h6>
          <form method="get" id="searchform" action="http://spfreaks.lunaroja.org/">
            <input type="search" name="s" id="s">
            <input type="hidden" name="post_type" value="item" />
          </form>
<!--      <label for="has-offer"><input type="checkbox" id="has-offer"> Has Offers</label>
          <label for="items-i-want"><input type="checkbox" id="items-i-want"> Items I want</label> -->
          
          <h6>Category</h6>
          <?php echo get_terms_chekboxes('itemcategory', $args = array('hide_empty'=>true)); ?>

          <h6>Release Type</h6>
          <?php echo get_terms_chekboxes('releasetype', $args = array('hide_empty'=>true)); ?>

          <h6>Format</h6>
          <?php echo get_terms_chekboxes('format', $args = array('hide_empty'=>true)); ?>

          <h6>Country</h6>
          <?php echo get_terms_chekboxes('country', $args = array('hide_empty'=>true)); ?>
        </div>
