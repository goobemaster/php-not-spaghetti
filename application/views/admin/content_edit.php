<div id="content">
  <div class="admin" id="edit">
    <?php if (empty($post)) { echo '<div class="error message"><img src="media/images/error-icon.png" alt="Error" title="Error"/>The requested blog post cannot be found!</div>'; } else { ?>
    <form id="create" action="admin?update" method="post">
      <div class="cell label">Title:</div>
      <div class="cell"><input type="text" class="title" id="title" name="title" value="<?php echo $post[0]->title; ?>"/></div><br/>

      <div class="cell label">Tags:</div>
      <div class="cell"><input type="text" class="tags" id="tags" name="tags" value="<?php echo $post[0]->tags; ?>" title="Comma separated list
  ex. 'cool,awesome,topic'"/></div><br/>

      <div class="cell label">&nbsp;</div>
      <div class="cell"><textarea id="ckeditor_content" name="ckeditor_content"><?php echo htmlspecialchars($post[0]->content); ?></textarea><script>CKEDITOR.replace('ckeditor_content');</script></div><br/>

      <div class="cell label">Published:</div>
      <div class="cell"><input type="checkbox" id="published" name="published" <?php echo $post[0]->published ? 'checked' : ''; ?>/></div><br/>

      <div class="cell label">Featured:</div>
      <div class="cell"><input type="checkbox" id="featured" name="featured" <?php echo $post[0]->featured ? 'checked' : ''; ?>/></div><br/>

      <div class="cell label">&nbsp;</div>
      <div class="cell"><input type="submit" value="Save"/></div>
      <input type="hidden" id="id" name="id" value="<?php echo $post[0]->id; ?>"/>
    </form>

    <?php
    $validator = new FormValidatorClient('edit');
    $validator->field('title', 'text', '1', '255', false);
    $validator->field('tags', 'text', '-1', '256', '^(.+[^,]|(.+,)+[^,]|)$'); // TODO: Remove -1 hack, amend validator class to support zero length
    echo $validator->script();

    }
    ?>
  </div>
</div>