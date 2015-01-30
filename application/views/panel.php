  <nav>
    <div id="posts">
    <?php
      if (empty($blog_list)) {
        echo '<p>There are no blog entries yet.</p>';
      } else {
        $last_month = '';
        $last_year = '';
        foreach ($blog_list as $blog) {
          $current_month = date('F', strtotime($blog->created));
          $current_year = date('Y', strtotime($blog->created));

          $this->view('blog_list', array('blog' => $blog, 'year' => $current_year != $last_year ? $current_year : false, 'month' => $current_month != $last_month ? $current_month : false));
          $last_month = $current_month;
          $last_year = $current_year;
        }
      }
    ?>
    </div>

    <h1><img src="media/images/search-icon.png" alt="Search" title="Search the blog"/>Search</h1><div class="break"></div>
    <form action="home/search" method="GET">
      <input type="text" value="" name="keyword" id="keyword"/>
      <input type="submit" value="Go"/>
    </form>
  </nav>