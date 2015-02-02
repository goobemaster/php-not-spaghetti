<div id="content">
  <div class="admin" id="create">
    <form id="create" action="admin?create" method="post">
      <div class="cell label">Title:</div>
      <div class="cell"><input type="text" class="title" id="title" name="title" value=""/></div><br/>

      <div class="cell label">Tags:</div>
      <div class="cell"><input type="text" class="tags" id="tags" name="tags" value="" title="Comma separated list
  ex. 'cool,awesome,topic'"/></div><br/>

      <div class="cell label">&nbsp;</div>
      <div class="cell"><textarea id="ckeditor_content"></textarea><script>CKEDITOR.replace('ckeditor_content');</script></div><br/>

      <div class="cell label">Published:</div>
      <div class="cell"><input type="checkbox" id="published" name="published" checked/></div><br/>

      <div class="cell label">Featured:</div>
      <div class="cell"><input type="checkbox" id="featured" name="featured"/></div><br/>

      <div class="cell label">&nbsp;</div>
      <div class="cell"><input type="submit" value="Save"/></div>
    </form>

    <?php
      $validator = new FormValidatorClient('create');
      $validator->field('title', 'text', '1', '255', false);
      $validator->field('tags', 'text', '-1', '256', '^(.+[^,]|(.+,)+[^,]|)$'); // TODO: Remove -1 hack, amend validator class to support zero length
      echo $validator->script();
    ?>
  </div>
</div>