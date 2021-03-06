<div id="content">
  <div class="admin">
    <form id="appearance" action="admin?appearance" method="post">
      <h1>Custom</h1>
      <p style="font-style:italic;">If you leave a field empty, the system will revert to a default value.</p>
      <div class="settings">
        <div class="preview"><h1>Preview</h1><iframe src="home" id="preview"></iframe></div>

        <div class="cell label long">Header Background:</div>
        <div class="cell"><input type="text" class="color" id="header_background" name="header_background" value="<?php echo $config['header_background']; ?>" onchange="update_preview('header', 'background-color:' + get_color('header_background'));"/></div><br/>

        <div class="cell label long">Header Font:</div>
        <div class="cell"><input type="text" id="header_font" name="header_font" value="<?php echo $config['header_font'] ?>" onchange="update_preview('header h1', 'font-family:' + get_color('header_font') + ';font-size:' + get_color('header_font_size'));"/></div><br/>

        <div class="cell label long">Header Font Size:</div>
        <div class="cell"><input type="text" id="header_font_size" name="header_font_size" value="<?php echo str_replace('px', '', $config['header_font_size']); ?>" onchange="update_preview('header h1', 'font-family:' + get_font('header_font') + ';font-size:' + get_font_size('header_font_size'));"/></div><br/>

        <div class="cell label long">Panel Background:</div>
        <div class="cell"><input type="text" class="color" id="panel_background" name="panel_background" value="<?php echo $config['panel_background']; ?>" onchange="update_preview('nav', 'background-color:' + get_color('panel_background') + ';font-family:' + get_font('panel_font'));"/></div><br/>

        <div class="cell label long">Panel Font:</div>
        <div class="cell"><input type="text" id="panel_font" name="panel_font" value="<?php echo $config['panel_font'] ?>" onchange="update_preview('nav h1', 'font-family:' + get_font('panel_font'));update_preview('nav h2', 'font-family:' + get_font('panel_font'));update_preview('nav', 'background-color:' + get_color('panel_background') + ';font-family:' + get_font('panel_font'));"/></div><br/>

        <div class="cell label long">Content Background:</div>
        <div class="cell"><input type="text" class="color" id="content_background" name="content_background" value="<?php echo $config['content_background']; ?>" onchange="update_preview('#content', 'background-color:' + get_color('content_background'));"/></div><br/>

        <div class="cell label long">Page Background:</div>
        <div class="cell"><input type="text" class="color" id="page_background" name="page_background" value="<?php echo $config['page_background']; ?>" onchange="update_preview('body', 'background-color:' + get_color('page_background'));"/></div><br/>

        <div class="cell label long">Footer Background:</div>
        <div class="cell"><input type="text" class="color" id="footer_background" name="footer_background" value="<?php echo $config['footer_background']; ?>" onchange="update_preview('#footer', 'background-color:' + get_color('footer_background'));"/></div><br/>

        <div class="cell label long">Footer Font:</div>
        <div class="cell"><input type="text" id="footer_font" name="footer_font" value="<?php echo $config['footer_font']; ?>" onchange="update_preview('#footer h1', 'font-family:' + get_font('footer_font') + ';font-size:' + get_font_size('footer_font_size'));update_preview('#footer h2', 'font-family:' + get_font('footer_font') + ';font-size:' + get_font_size('footer_font_size'));"/></div><br/>

        <div class="cell label long">Footer Font Size:</div>
        <div class="cell"><input type="text" id="footer_font_size" name="footer_font_size" value="<?php echo str_replace('px', '', $config['footer_font_size']); ?>" onchange="update_preview('#footer h1', 'font-family:' + get_font('footer_font') + ';font-size:' + get_font_size('footer_font_size'));update_preview('#footer h2', 'font-family:' + get_font('footer_font') + ';font-size:' + get_font_size('footer_font_size'));"/></div><br/>

        <div class="cell label long">Aside Background:</div>
        <div class="cell"><input type="text" class="color" id="aside_background" name="aside_background" value="<?php echo $config['aside_background']; ?>" onchange="update_preview('.blog aside div', 'border:1px solid' + get_color('aside_background')); update_preview('.blog aside div time', 'background-image:linear-gradient(60deg, ' + get_color('aside_background') + ', ' + get_color('aside_background') + ');')"/></div><br/>

        <div class="cell label long">Aside Font:</div>
        <div class="cell"><input type="text" id="aside_font" name="aside_font" value="<?php echo $config['aside_font']; ?>" onchange="update_preview('.blog aside', 'font-family:' + get_font('aside_font') + ';font-size:' + get_font_size('aside_font_size'))"/></div><br/>

        <div class="cell label long">Aside Font Size:</div>
        <div class="cell"><input type="text" id="aside_font_size" name="aside_font_size" value="<?php echo str_replace('px', '', $config['aside_font_size']); ?>" onchange="update_preview('.blog aside', 'font-family:' + get_font('aside_font') + ';font-size:' + get_font_size('aside_font_size'))"/></div><br/>

        <div class="cell label long">Link Color:</div>
        <div class="cell"><input type="text" class="color" id="link_color" name="link_color" value="<?php echo $config['link_color'] ?>" onchange="update_preview('a, a:visited', 'color:' + get_color('link_color'));"/></div><br/>

        <div class="cell label long">Tag Background:</div>
        <div class="cell"><input type="text" class="color" id="tag_background" name="tag_background" value="<?php echo $config['tag_background'] ?>" onchange="update_preview('.tags .tag', 'background-color:' + get_color('tag_background'));"/></div><br/>

        <div class="cell label long">Tag Font Color:</div>
        <div class="cell"><input type="text" class="color" id="tag_color" name="tag_color" value="<?php echo $config['tag_color'] ?>" onchange="update_preview('.tag a', 'color:' + get_color('tag_color'));"/></div><br/>

        <div class="cell label">&nbsp;</div>
        <div class="cell"><input type="submit" value="Save"/></div>
      </div>
    </form>
    <h1>Theme</h1>
    <p>You can select a predefined appearance from the list below.</p>
    <p style="font-style:italic;">Please note, that by doing so, all your customization will be lost!</p>
    <select id="theme" name="theme">
      <option value="jungle_boogie">Jungle Boogie</option>
      <option value="provence">Provence</option>
      <option value="in_the_navy">In The Navy</option>
      <option value="vice_city">Vice City</option>
    </select>
    <button onclick="apply_theme($('#theme').val());">Apply</button>
    <?php
      $validator = new FormValidatorClient('appearance');
      $validator->field('header_background', 'text', '6', '6', '^[0-9A-F]{6}$');
      $validator->field('header_font', 'text', '0', '255', false);
      $validator->field('header_font_size', 'text', '0', '3', '^([1-9]{1}[0-9]{0,2}|)$'); // See argument: http://stackoverflow.com/questions/750594/maximum-font-size-a-page-can-render
      $validator->field('panel_background', 'text', '6', '6', '^[0-9A-F]{6}$');
      $validator->field('panel_font', 'text', '0', '255', false);
      $validator->field('content_background', 'text', '6', '6', '^[0-9A-F]{6}$');
      $validator->field('page_background', 'text', '6', '6', '^[0-9A-F]{6}$');
      $validator->field('footer_background', 'text', '6', '6', '^[0-9A-F]{6}$');
      $validator->field('footer_font', 'text', '0', '255', false);
      $validator->field('footer_font_size', 'text', '0', '3', '^([1-9]{1}[0-9]{0,2}|)$');
      $validator->field('aside_background', 'text', '6', '6', '^[0-9A-F]{6}$');
      $validator->field('aside_font', 'text', '0', '255', false);
      $validator->field('aside_font_size', 'text', '0', '3', '^([1-9]{1}[0-9]{0,2}|)$');
      $validator->field('link_color', 'text', '6', '6', '^[0-9A-F]{6}$');
      $validator->field('tag_background', 'text', '6', '6', '^[0-9A-F]{6}$');
      $validator->field('tag_color', 'text', '6', '6', '^[0-9A-F]{6}$');
      echo $validator->script();
    ?>
  </div>
</div>