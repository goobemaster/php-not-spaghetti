  <div id="content">
    <?php if (empty($featured)) {
      echo '<p>There are no featured blog entries at this time.</p>';
    } else {
      foreach ($featured as $blog) $this->view('blog', array('blog' => $blog, 'author' => $author, 'author_email' => $author_email));
    } ?>
  </div>