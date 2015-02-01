<?php

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