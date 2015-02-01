<div id="content">
  <div class="admin" id="create">
    <div class="cell label">Title:</div>
    <div class="cell"><input type="text" class="title" id="title" name="title"/></div><br/>

    <div class="cell label">Tags:</div>
    <div class="cell"><input type="text" class="tags" id="tags" name="tags" title="Comma separated list
  ex. 'cool,awesome,topic'"/></div><br/>

    <div class="cell label">&nbsp;</div>
    <div class="cell"><textarea id="ckeditor_content"></textarea><script>CKEDITOR.replace('ckeditor_content');</script></div><br/>

    <div class="cell label">Published:</div>
    <div class="cell"><input type="checkbox" id="published" name="published" checked/></div><br/>

    <div class="cell label">Featured:</div>
    <div class="cell"><input type="checkbox" id="featured" name="featured"/></div><br/>

    <div class="cell label">&nbsp;</div>
    <div class="cell"><input type="submit" value="Save"/></div>
  </div>
</div>