<?php

function query_style_overrides($config) {
  $style_override = array('apply' => false,
                          'header_background' => $config->get('header_background'),
                          'header_font' => $config->get('header_font'),
                          'header_font_size' => $config->get('header_font_size'),
                          'panel_background' => $config->get('panel_background'),
                          'content_background' => $config->get('content_background'),
                          'page_background' => $config->get('page_background'),
                          'footer_background' => $config->get('footer_background'),
                          'footer_font' => $config->get('footer_font'),
                          'footer_font_size' => $config->get('footer_font_size'),
                          'aside_background' => $config->get('aside_background'),
                          'aside_font' => $config->get('aside_font'),
                          'aside_font_size' => $config->get('aside_font_size'),
                          'panel_font' => $config->get('panel_font'),
                          'tag_background' => $config->get('tag_background'),
                          'tag_color' => $config->get('tag_color'),
                          'link_color' => $config->get('link_color'));

  foreach ($style_override as $key => $value) {
    if ($value) {
      $style_override['apply'] = true;
      break;
    }
  }

  return $style_override;
}

function link_to_post($id, $title) {
  return 'home/post/' . $id . '-' . url_title($title);
}

function tag_weight($count, $max_size = 24) {
  $weight = 12 + $count;
  return $weight <= 24 ? $weight : $max_size;
}

function tag_list($tags, $outer_element = 'dd') {
  $list = '<' . $outer_element . ' class="tags">';
  foreach(explode(',', $tags) as $tag) $list = $list . '<div class="tag"><a href="home/search?keyword=' . urlencode($tag) . '&tags">' . $tag . '</a></div>';
  return $list . '</' . $outer_element . '>';
}

function fb_share_button($href, $layout = 'box_count') {
  return '<div class="fb-share-button" data-href="' . $href . '" data-layout="' . $layout . '"></div>';
}

function twitter_share_button($href) {
  return '<a href="https://twitter.com/share" class="twitter-share-button" data-url="' . $href . '">Tweet</a>';
}