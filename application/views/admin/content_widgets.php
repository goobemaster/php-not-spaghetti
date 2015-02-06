<div id="content">
  <div class="admin">
    <form id="widgets" action="admin?widgets" method="post">
      <p>Fine tune the behavior of the widgets on the left panel.</p>
      <h1>Post List</h1>
      <div class="settings">
        <div class="cell label long">Displayed:</div>
        <div class="cell"><input type="checkbox" name="post_list_displayed" id="post_list_displayed" <?php if ($config['post_list_displayed']) echo 'checked';?>/></div><br/>

        <div class="cell label long">Ordering:</div>
        <div class="cell"><select id="post_list_ordering" name="post_list_ordering"><option value="chronological" <?php if ($config['post_list_ordering'] == 'chronological') echo 'selected';?>>Chronological</option><option value="reverse" <?php if ($config['post_list_ordering'] == 'reverse') echo 'selected';?>>Reverse Chronological</option></select></div>
      </div>

      <h1>Search</h1>
      <div class="settings">
        <div class="cell label long">Displayed:</div>
        <div class="cell"><input type="checkbox" name="search_displayed" id="search_displayed" <?php if ($config['search_displayed']) echo 'checked';?>/></div><br/>
      </div>

      <h1>Tags</h1>
      <div class="settings">
        <div class="cell label long">Displayed:</div>
        <div class="cell"><input type="checkbox" name="tags_displayed" id="tags_displayed" <?php if ($config['tags_displayed']) echo 'checked';?>/></div><br/>

        <div class="cell label long">Max. Tag Size:</div>
        <div class="cell"><input type="text" class="short" id="tag_size_max" name="tag_size_max" value="<?php echo $config['tag_size_max']; ?>" title="Text size cannot be larger than this value."/></div><br/>

        <div class="cell label long">Max. Tags Shown:</div>
        <div class="cell"><input type="text" class="short" id="tags_max" name="tags_max" value="<?php echo $config['tags_max']; ?>"/></div><br/>
      </div>

      <input type="submit" value="Save All"/></div>
    </form>
    <?php
      $validator = new FormValidatorClient('widgets');
      $validator->field('tag_size_max', 'text', '0', '2', '^([1-9]{1}[0-9]{0,1}?|)$');
      $validator->field('tags_max', 'text', '0', '3', '^([1-9]{1}[0-9]{0,2}|)$');
      echo $validator->script();
    ?>
  </div>
</div>