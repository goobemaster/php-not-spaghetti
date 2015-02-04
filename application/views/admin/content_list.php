<div id="content">
  <div class="admin">
    <?php
      if (empty($blog)) {
        echo '<p>There are no blog posts yet!</p>';
      } else {
    ?>
    <table id="post">
    <thead>
    <tr><th>Title</th><th>Created</th><th>Published</th><th>Featured</th><th>Manage</th></tr>
    </thead>
    <tbody>
    <?php
        foreach($blog as $post) {
          echo '<tr id="post_' . $post->id . '">';
          if ($post->published) $p = 'checked'; else $p = '';
          if ($post->featured) $f = 'checked'; else $f = '';
          echo '<td>' . $post->title . '</td><td>' . $post->created . '</td><td><input type="checkbox" ' . $p . ' onchange="publish(' . $post->id. ', this.checked);"/></td><td><input type="checkbox" ' . $f . ' onchange="feature(' . $post->id. ', this.checked);"/></td><td><a href="admin/edit/' . $post->id . '"><img src="media/images/edit-icon.png" alt="Edit" title="Edit"/></a><img src="media/images/delete-icon.png" alt="Delete" title="Delete" onclick="remove_post(' . $post->id . ');"/></td>';
          echo '</tr>';
        }
    echo '</tbody>';
    echo '</table>';
      }
    ?>
  </div>
</div>