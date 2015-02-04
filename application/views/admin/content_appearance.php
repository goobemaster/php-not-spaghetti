<div id="content">
  <div class="admin">
    <form id="appearance" action="admin?create" method="post">
      <h1>Custom</h1>
      <p style="font-style:italic;">If you leave a field empty, the system will revert to a default value.</p>
      <div class="settings">
        <div class="cell label long">Header Background:</div>
        <div class="cell"><input type="text" class="color" id="header_background" name="header_background" value="<?php echo $config['header_background'] ?>"/></div><br/>

        <div class="cell label long">Header Font:</div>
        <div class="cell"><input type="text" id="header_font" name="header_font" value="<?php echo $config['header_font'] ?>"/></div><br/>

        <div class="cell label long">Header Font Size:</div>
        <div class="cell"><input type="text" id="header_font_size" name="header_font_size" value="<?php echo $config['header_font_size'] ?>"/></div><br/>

        <div class="cell label long">Panel Background:</div>
        <div class="cell"><input type="text" class="color" id="panel_background" name="panel_background" value="<?php echo $config['panel_background'] ?>"/></div><br/>

        <div class="cell label long">Panel Font:</div>
        <div class="cell"><input type="text" id="panel_font" name="panel_font" value="<?php echo $config['panel_font'] ?>"/></div><br/>

        <div class="cell label long">Content Background:</div>
        <div class="cell"><input type="text" class="color" id="content_background" name="content_background" value="<?php echo $config['content_background'] ?>"/></div><br/>

        <div class="cell label long">Page Background:</div>
        <div class="cell"><input type="text" class="color" id="page_background" name="page_background" value="<?php echo $config['page_background'] ?>"/></div><br/>

        <div class="cell label long">Footer Background:</div>
        <div class="cell"><input type="text" class="color" id="footer_background" name="footer_background" value="<?php echo $config['footer_background'] ?>"/></div><br/>

        <div class="cell label long">Footer Font:</div>
        <div class="cell"><input type="text" id="footer_font" name="footer_font" value="<?php echo $config['footer_font'] ?>"/></div><br/>

        <div class="cell label long">Footer Font Size:</div>
        <div class="cell"><input type="text" id="footer_font_size" name="footer_font_size" value="<?php echo $config['footer_font_size'] ?>"/></div><br/>

        <div class="cell label long">Aside Background:</div>
        <div class="cell"><input type="text" class="color" id="aside_background" name="aside_background" value="<?php echo $config['aside_background'] ?>"/></div><br/>

        <div class="cell label long">Aside Font:</div>
        <div class="cell"><input type="text" id="aside_font" name="aside_font" value="<?php echo $config['aside_font'] ?>"/></div><br/>

        <div class="cell label long">Aside Font Size:</div>
        <div class="cell"><input type="text" id="aside_font_size" name="aside_font_size" value="<?php echo $config['aside_font_size'] ?>"/></div><br/>

        <div class="cell label long">Tag Background:</div>
        <div class="cell"><input type="text" class="color" id="tag_background" name="tag_background" value="<?php echo $config['tag_background'] ?>"/></div><br/>

        <div class="cell label long">Tag Font Color:</div>
        <div class="cell"><input type="text" class="color" id="tag_color" name="tag_color" value="<?php echo $config['tag_color'] ?>"/></div><br/>

        <div class="cell label long">Link Color:</div>
        <div class="cell"><input type="text" class="color" id="link_color" name="link_color" value="<?php echo $config['link_color'] ?>"/></div><br/>
      </div>

      <h1>Theme</h1>
      <p>You can select a predefined appearance from the list below.</p>
      <p style="font-style:italic;">Please note, that by doing so, all your customization will be lost!</p>
    </form>
  </div>
</div>