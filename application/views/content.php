<div id="content">
  <?php if (empty($post)) {
    echo '<p>This post is unpublished currently.</p>';
  } else {
    $this->view('blog', array('blog' => $post[0], 'author' => $author, 'author_email' => $author_email));
  } ?>
</div>