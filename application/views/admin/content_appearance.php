<div id="content">
  <div class="admin">
    <form id="appearance" action="admin?create" method="post">
      <h1>Custom</h1>
      <p style="font-style:italic;">If you leave a field empty, the system will revert to a default value.</p>
      <div class="settings">
        <div class="preview"><h1>Preview</h1><iframe src="home" id="preview"></iframe></div>

        <form id="appearance" action="admin?appearance" method="post">
        <div class="cell label long">Header Background:</div>
        <div class="cell"><input type="text" class="color" id="header_background" name="header_background" value="<?php echo $config['header_background'] ?>" onchange="update_preview('header', 'background-color:' + get_color('header_background'));"/></div><br/>

        <div class="cell label long">Header Font:</div>
        <div class="cell"><input type="text" id="header_font" name="header_font" value="<?php echo $config['header_font'] ?>" onchange="update_preview('header h1', 'font-family:' + get_color('header_font') + ';font-size:' + get_color('header_font_size'));"/></div><br/>

        <div class="cell label long">Header Font Size:</div>
        <div class="cell"><input type="text" id="header_font_size" name="header_font_size" value="<?php echo $config['header_font_size'] ?>" onchange="update_preview('header h1', 'font-family:' + get_font('header_font') + ';font-size:' + get_font_size('header_font_size'));"/></div><br/>

        <div class="cell label long">Panel Background:</div>
        <div class="cell"><input type="text" class="color" id="panel_background" name="panel_background" value="<?php echo $config['panel_background'] ?>" onchange="update_preview('nav', 'background-color:' + get_color('panel_background') + ';font-family:' + get_font('panel_font'));"/></div><br/>

        <div class="cell label long">Panel Font:</div>
        <div class="cell"><input type="text" id="panel_font" name="panel_font" value="<?php echo $config['panel_font'] ?>" onchange="update_preview('nav h1', 'font-family:' + get_font('panel_font'));update_preview('nav h2', 'font-family:' + get_font('panel_font'));update_preview('nav', 'background-color:' + get_color('panel_background') + ';font-family:' + get_font('panel_font'));"/></div><br/>

        <div class="cell label long">Content Background:</div>
        <div class="cell"><input type="text" class="color" id="content_background" name="content_background" value="<?php echo $config['content_background'] ?>" onchange="update_preview('#content', 'background-color:' + get_color('content_background'));"/></div><br/>

        <div class="cell label long">Page Background:</div>
        <div class="cell"><input type="text" class="color" id="page_background" name="page_background" value="<?php echo $config['page_background'] ?>" onchange="update_preview('body', 'background-color:' + get_color('page_background'));"/></div><br/>

        <div class="cell label long">Footer Background:</div>
        <div class="cell"><input type="text" class="color" id="footer_background" name="footer_background" value="<?php echo $config['footer_background'] ?>" onchange="update_preview('#footer', 'background-color:' + get_color('footer_background'));"/></div><br/>

        <div class="cell label long">Footer Font:</div>
        <div class="cell"><input type="text" id="footer_font" name="footer_font" value="<?php echo $config['footer_font'] ?>" onchange="update_preview('#footer h1', 'font-family:' + get_font('footer_font') + ';font-size:' + get_font_size('footer_font_size'));update_preview('#footer h2', 'font-family:' + get_font('footer_font') + ';font-size:' + get_font_size('footer_font_size'));"/></div><br/>

        <div class="cell label long">Footer Font Size:</div>
        <div class="cell"><input type="text" id="footer_font_size" name="footer_font_size" value="<?php echo $config['footer_font_size'] ?>" onchange="update_preview('#footer h1', 'font-family:' + get_font('footer_font') + ';font-size:' + get_font_size('footer_font_size'));update_preview('#footer h2', 'font-family:' + get_font('footer_font') + ';font-size:' + get_font_size('footer_font_size'));"/></div><br/>

        <div class="cell label long">Aside Background:</div>
        <div class="cell"><input type="text" class="color" id="aside_background" name="aside_background" value="<?php echo $config['aside_background'] ?>" onchange="update_preview('.blog aside div', 'border:1px solid' + get_color('aside_background')); update_preview('.blog aside div time', 'background-image:linear-gradient(60deg, ' + get_color('aside_background') + ', ' + get_color('aside_background') + ');')"/></div><br/>

        <div class="cell label long">Aside Font:</div>
        <div class="cell"><input type="text" id="aside_font" name="aside_font" value="<?php echo $config['aside_font'] ?>" onchange="update_preview('.blog aside', 'font-family:' + get_font('aside_font') + ';font-size:' + get_font_size('aside_font_size'))"/></div><br/>

        <div class="cell label long">Aside Font Size:</div>
        <div class="cell"><input type="text" id="aside_font_size" name="aside_font_size" value="<?php echo $config['aside_font_size'] ?>" onchange="update_preview('.blog aside', 'font-family:' + get_font('aside_font') + ';font-size:' + get_font_size('aside_font_size'))"/></div><br/>

        <div class="cell label long">Tag Background:</div>
        <div class="cell"><input type="text" class="color" id="tag_background" name="tag_background" value="<?php echo $config['tag_background'] ?>" onchange="update_preview('.tags .tag', 'background-color:' + get_color('tag_background'));"/></div><br/>

        <div class="cell label long">Tag Font Color:</div>
        <div class="cell"><input type="text" class="color" id="tag_color" name="tag_color" value="<?php echo $config['tag_color'] ?>" onchange="update_preview('.tag', 'color:' + get_color('tag_color'));"/></div><br/>

        <div class="cell label long">Link Color:</div>
        <div class="cell"><input type="text" class="color" id="link_color" name="link_color" value="<?php echo $config['link_color'] ?>" onchange="update_preview('a, a:visited', 'color:' + get_color('link_color'));"/></div><br/>

        <div class="cell label">&nbsp;</div>
        <div class="cell"><input type="submit" value="Save"/></div>
        </form>
      </div>

      <h1>Theme</h1>
      <p>You can select a predefined appearance from the list below.</p>
      <p style="font-style:italic;">Please note, that by doing so, all your customization will be lost!</p>
    </form>
  </div>
</div>