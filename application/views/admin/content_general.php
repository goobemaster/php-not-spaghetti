<div id="content">
  <div class="admin">
    <form id="general" action="admin?general" method="post">
      <p>General settings, and meta data for the entire blog site.</p>
      <h1>Meta Data</h1>
      <div class="settings">
        <div class="cell label">Title:</div>
        <div class="cell"><input type="text" id="title" name="title" value="<?php echo $config['title']; ?>" title="Displayed on the browser's title bar and on tabs. So ideally it should be short."/></div><br/>

        <div class="cell label">Lang:</div>
        <div class="cell"><input type="text" id="lang" name="lang" value="<?php echo $config['lang']; ?>" title="Open the help link and scroll to the language ISO codes"/> <a href="http://www.w3schools.com/tags/ref_language_codes.asp" target="_blank">Help</a></div><br/>

        <div class="cell label">Keywords:</div>
        <div class="cell"><input type="text" id="keywords" name="keywords" value="<?php echo $config['keywords']; ?>" title="Comma separated list of *relevant* keywords. Max. 255 characters."/></div><br/>

        <div class="cell label" style="vertical-align:top;">Description:</div>
        <div class="cell"><textarea id="description" name="description" title="Search engines are preferring a short *highly relevant* summary. Max. 255 characters."><?php echo $config['description']; ?></textarea></div><br/>

        <div class="cell label">Author:</div>
        <div class="cell"><input type="text" id="author" name="author" value="<?php echo $config['author']; ?>" title="Full name recommended"/></div><br/>

        <div class="cell label">Author Email:</div>
        <div class="cell"><input type="text" id="author_email" name="author_email" value="<?php echo $config['author_email']; ?>" title="Displayed next to posts on the aside box"/></div>
      </div>

      <input type="submit" value="Save All"/></div><br/>

      <p style="font-style:italic;">Back-reference any field with the name enclosed in % sign. e.g. "%author%'s Blog"</p>
      <p style="font-style:italic;">The validation is less rigorous on this form for the sake of flexibility. Although please ensure you observe the recommendations, as site ranking and SEO is hugely affected by these values.</p>
  </form>
  <?php
  $validator = new FormValidatorClient('general');
  $validator->field('title', 'text', '0', '255', false);
  $validator->field('lang', 'text', '0', '255', false);
  $validator->field('keywords', 'text', '0', '255', false);
  $validator->field('description', 'text', '0', '255', false);
  $validator->field('author', 'text', '0', '255', false);
  $validator->field('author_email', 'text', '0', '255', false);
  echo $validator->script();
  ?>
</div>
</div>