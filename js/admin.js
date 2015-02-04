function update_preview(locator, style) {
  document.getElementById("preview").contentWindow.apply_style(locator, style);
}

function get_color(id) {
  return '#' + $("#" + id).val();
}

function get_font(id) {
  return $("#" + id).val();
}

function get_font_size(id) {
  return $("#" + id).val() + 'px';
}

// TODO: Trigger relevant event(s) to update the input box background and the preview.
// Might need to remove inline defs and attach jquery handlers.
function apply_theme(name) {
  switch(name) {
    case "jungle_boogie":
      $("#header_background").val('2E8B57');
      $("#header_font").val('');
      $("#header_font_size").val('');
      $("#panel_background").val('D2B48C');
      $("#panel_font").val('');
      $("#content_background").val('F5F5DC');
      $("#page_background").val('F5F5DC');
      $("#footer_background").val('2E8B57');
      $("#footer_font").val('');
      $("#footer_font_size").val('');
      $("#aside_background").val('2E8B57');
      $("#aside_font").val('');
      $("#aside_font_size").val('');
      $("#tag_background").val('2E8B57');
      $("#tag_color").val('FFFFFF');
      $("#link_color").val('A0522D');
      break;
    case "provence":
      $("#header_background").val('CCB23A');
      $("#header_font").val('');
      $("#header_font_size").val('');
      $("#panel_background").val('997893');
      $("#panel_font").val('');
      $("#content_background").val('FFF8A2');
      $("#page_background").val('FFF8A2');
      $("#footer_background").val('CCB23A');
      $("#footer_font").val('');
      $("#footer_font_size").val('');
      $("#aside_background").val('CCB23A');
      $("#aside_font").val('');
      $("#aside_font_size").val('');
      $("#tag_background").val('CCB23A');
      $("#tag_color").val('FFFFFF');
      $("#link_color").val('462561');
      break;
    case "in_the_navy":
      $("#header_background").val('6A5ACD');
      $("#header_font").val('');
      $("#header_font_size").val('');
      $("#panel_background").val('778899');
      $("#panel_font").val('');
      $("#content_background").val('E6E6FA');
      $("#page_background").val('E6E6FA');
      $("#footer_background").val('6A5ACD');
      $("#footer_font").val('');
      $("#footer_font_size").val('');
      $("#aside_background").val('778899');
      $("#aside_font").val('');
      $("#aside_font_size").val('');
      $("#tag_background").val('6A5ACD');
      $("#tag_color").val('FFFFFF');
      $("#link_color").val('000080');
      break;
    case "vice_city":
      $("#header_background").val('ED7BAC');
      $("#header_font").val('');
      $("#header_font_size").val('');
      $("#panel_background").val('12A2DE');
      $("#panel_font").val('');
      $("#content_background").val('B3B3C2');
      $("#page_background").val('000000');
      $("#footer_background").val('ED7BAC');
      $("#footer_font").val('');
      $("#footer_font_size").val('');
      $("#aside_background").val('12A2DE');
      $("#aside_font").val('');
      $("#aside_font_size").val('');
      $("#tag_background").val('FFF295');
      $("#tag_color").val('000000');
      $("#link_color").val('FCCCDA');
      break;
  }
}