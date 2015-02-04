window.apply_style = function(locator, style) {
  $(locator).each(function() {
    $(this).attr('style', style);
  });
}