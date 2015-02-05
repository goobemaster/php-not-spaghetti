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
      document.getElementById("header_background").color.fromString('2E8B57');
      $("#header_font").val('');
      $("#header_font_size").val('');
      document.getElementById("panel_background").color.fromString('D2B48C');
      $("#panel_font").val('');
      document.getElementById("content_background").color.fromString('F5F5DC');
      document.getElementById("page_background").color.fromString('F5F5DC');
      document.getElementById("footer_background").color.fromString('2E8B57');
      $("#footer_font").val('');
      $("#footer_font_size").val('');
      document.getElementById("aside_background").color.fromString('2E8B57');
      $("#aside_font").val('');
      $("#aside_font_size").val('');
      document.getElementById("tag_background").color.fromString('2E8B57');
      document.getElementById("tag_color").color.fromString('FFFFFF');
      document.getElementById("link_color").color.fromString('A0522D');
      break;
    case "provence":
      document.getElementById("header_background").color.fromString('CCB23A');
      $("#header_font").val('');
      $("#header_font_size").val('');
      document.getElementById("panel_background").color.fromString('997893');
      $("#panel_font").val('');
      document.getElementById("content_background").color.fromString('FFF8A2');
      document.getElementById("page_background").color.fromString('FFF8A2');
      document.getElementById("footer_background").color.fromString('CCB23A');
      $("#footer_font").val('');
      $("#footer_font_size").val('');
      document.getElementById("aside_background").color.fromString('CCB23A');
      $("#aside_font").val('');
      $("#aside_font_size").val('');
      document.getElementById("tag_background").color.fromString('CCB23A');
      document.getElementById("tag_color").color.fromString('FFFFFF');
      document.getElementById("link_color").color.fromString('462561');
      break;
    case "in_the_navy":
      document.getElementById("header_background").color.fromString('6A5ACD');
      $("#header_font").val('');
      $("#header_font_size").val('');
      document.getElementById("panel_background").color.fromString('778899');
      $("#panel_font").val('');
      document.getElementById("content_background").color.fromString('E6E6FA');
      document.getElementById("page_background").color.fromString('E6E6FA');
      document.getElementById("footer_background").color.fromString('6A5ACD');
      $("#footer_font").val('');
      $("#footer_font_size").val('');
      document.getElementById("aside_background").color.fromString('778899');
      $("#aside_font").val('');
      $("#aside_font_size").val('');
      document.getElementById("tag_background").color.fromString('6A5ACD');
      document.getElementById("tag_color").color.fromString('FFFFFF');
      document.getElementById("link_color").color.fromString('000080');
      break;
    case "vice_city":
      document.getElementById("header_background").color.fromString("ED7BAC");
      $("#header_font").val('');
      $("#header_font_size").val('');
      document.getElementById("panel_background").color.fromString('12A2DE');
      $("#panel_font").val('');
      document.getElementById("content_background").color.fromString('B3B3C2');
      document.getElementById("page_background").color.fromString('000000');
      document.getElementById("footer_background").color.fromString('ED7BAC');
      $("#footer_font").val('');
      $("#footer_font_size").val('');
      document.getElementById("aside_background").color.fromString('12A2DE');
      $("#aside_font").val('');
      $("#aside_font_size").val('');
      document.getElementById("tag_background").color.fromString('FFF295');
      document.getElementById("tag_color").color.fromString('000000');
      document.getElementById("link_color").color.fromString('FCCCDA');
      break;
  }
  $(".settings input").trigger("onchange");

}