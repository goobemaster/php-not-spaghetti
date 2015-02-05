<?php

function sql_now() {
  return strftime('%Y-%m-%d %H:%M:%S', now());
}

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

class FormValidatorClient {
  public $id, $script;
  private $fields;

  function __construct($id) {
    $this->id = $id;
    $this->fields = array();
  }

  function field($id, $type = 'text', $min_length = 1, $max_length = 256, $pattern = '/.*/') {
    array_push($this->fields, new FormValidatorField($id, $type, $min_length, $max_length, $pattern));
  }

  function script() {
    $this->script = '<script>document.getElementById("' . $this->id . '").onsubmit = function() {';

    if (count($this->fields)) {
      foreach($this->fields as $field) {
        if ($field->type == 'text') {
          $this->script .= 'var ' . $field->id . ' = $("#' . $field->id . '");';
          $this->script .= 'var ' . $field->id . '_length = parseInt(' . $field->id . '.val().length);';
          if ($field->pattern) $regexp = '|| !/' . $field->pattern . '/.test(' . $field->id . '.val())'; else $regexp = '';
          $this->script .= 'if (' . $field->id . '_length < ' . $field->min_length . ' || ' . $field->id . '_length > ' . $field->max_length . ' ' . $regexp . ') { ' . $field->id . '.attr("style", "border:1px solid red;background-color:lightsalmon;"); return false; };';
        }
      }
      $this->script .= 'return true; };';

      // TODO: This could be done in one loop
      foreach($this->fields as $field) {
        $this->script .= '$("#' . $field->id . '").click(function() { $(this).removeAttr("style"); });';
      }
    } else {
      $this->script .= 'return true; };';
    }

    $this->script .= '</script>';

    return $this->script;
  }
}

class FormValidatorServer {
  private $fields;

  function __construct() {
    $this->fields = array();
  }

  function field($id, $type = 'text', $min_length = 1, $max_length = 256, $pattern = '/.*/') {
    array_push($this->fields, new FormValidatorField($id, $type, $min_length, $max_length, $pattern));
  }

  function validate($input_fields) {
    if (count($this->fields)) {
      foreach($this->fields as $field) {
        $input = $input_fields[$field->id];
        if ($field->type == 'text') {
//          if ($field->pattern && !preg_match($field->pattern, $input)) return false;
          if (strlen($input) < $field->min_length || strlen($input) > $field->max_length) return false;
        }
      }
    } else {
      return false;
    }
    return true;
  }
}

class FormValidatorField {
  public $id, $type, $min_length, $max_length, $pattern;

  function __construct($id, $type, $min_length, $max_length, $pattern) {
    $this->id = $id;
    $this->type = $type;
    $this->min_length = $min_length;
    $this->max_length = $max_length;
    $this->pattern = $pattern;
  }
}

function http_response($code = 200) {
  switch ($code) {
    case '200':
      echo 'OK';
      http_response_code(200);
      break;
    case '400':
      echo '400 Bad Request';
      http_response_code(400);
      break;
    case '401':
      echo '401 Unauthorized';
      http_response_code(401);
      break;
  }
  die;
}

function refresh_page($in, $to) {
  header("Refresh: $in; url=$to");
}

function extract_post_values($list, $process = false) {
  $values = array();
  foreach ($list as $field) {
    if (isset($_POST[$field])) $values[$field] = $_POST[$field]; else $values[$field] = '';

    if ($process == 'appearance') {
      // TODO: Use 1-2 regexp instead of patching...
      if (strpos($field, 'font_size') && $values[$field] != '') $values[$field] .= 'px';
      if ((strpos($field, 'background') || strpos($field, 'color')) && $values[$field] != '') $values[$field] = '#' . $values[$field];
    } elseif ($process == 'widgets') {
      if (strpos($field, 'displayed') && $values[$field] == '') $values[$field] = '0';
      if (strpos($field, 'displayed') && $values[$field] == 'on') $values[$field] = '1';
    }
  }
  return $values;
}