        <div id="filters">
          
          <h6><a href="/concerts/">Clear Filters</a></h6>

          <h6>Search</h6>
          <form method="get" id="searchform" action="http://spfreaks.lunaroja.org/">
            <input type="search" name="s" id="s">
            <input type="hidden" name="post_type" value="item" />
          </form>

          <h6>Country</h6>
          <?php echo get_terms_chekboxes('country', $args = array('hide_empty'=>true)); ?>

          <h6>Type</h6>
          <?php echo get_terms_chekboxes('eventtype', $args = array('hide_empty'=>true)); ?>

          <h6>Year</h6>
          <?php echo get_terms_chekboxes('concertyear', $args = array('hide_empty'=>true)); ?>

        </div>
