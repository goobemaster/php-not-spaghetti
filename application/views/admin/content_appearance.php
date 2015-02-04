<div id="content">
  <div class="admin">
    <form id="appearance" action="admin?create" method="post">
      <h1>Custom</h1>
      <div class="settings">
        <div class="cell label long">Header Background:</div>
        <div class="cell"><input type="text" class="color" id="header_background" name="header_background" value="<?php echo $config['header_background'] ?>"/></div><br/>

        <div class="cell label long">Panel Background:</div>
        <div class="cell"><input type="text" class="color" id="panel_background" name="panel_background" value="<?php echo $config['panel_background'] ?>"/></div><br/>

        <div class="cell label long">Page Background:</div>
        <div class="cell"><input type="text" class="color" id="page_background" name="page_background" value="<?php echo $config['page_background'] ?>"/></div><br/>

        <div class="cell label long">Footer Background:</div>
        <div class="cell"><input type="text" class="color" id="footer_background" name="footer_background" value="<?php echo $config['footer_background'] ?>"/></div><br/>

        <div class="cell label long">Aside Background:</div>
        <div class="cell"><input type="text" class="color" id="aside_background" name="aside_background" value="<?php echo $config['aside_background'] ?>"/></div><br/>

        <div class="cell label long">Tag Background:</div>
        <div class="cell"><input type="text" class="color" id="tag_background" name="tag_background" value="<?php echo $config['tag_background'] ?>"/></div><br/>

        <div class="cell label long">Tag Font Color:</div>
        <div class="cell"><input type="text" class="color" id="tag_color" name="tag_color" value="<?php echo $config['tag_color'] ?>"/></div><br/>

        <div class="cell label long">Link Color:</div>
        <div class="cell"><input type="text" class="color" id="link_color" name="link_color" value="<?php echo $config['link_color'] ?>"/></div><br/>
      </div>

      <h1>Theme</h1>
      <p>You can select a predefined appearance setting from the list below.</p>
      <p>Please note, that by doing so, all your customization will be lost!</p>
    </form>
  </div>
</div>