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