<?php
  function excerpt($content, $keyword) {
    $content = strip_tags($content);
    $pos = strpos($content, $keyword);
    return '... ' . highlight_keyword(substr($content, $pos - 25 < 0 ? 0 : $pos - 25, 100), $keyword) . ' ...';
  }
  function highlight_keyword($content, $keyword) {
    return str_replace($keyword, '<strong>' . $keyword . '</strong>', $content);
  }
?>

<div id="content">
  <?php
    $search_type = isset($_GET['tags']) ? 'tag' : 'keyword';

    if (!isset($results) || empty($results)) {
      echo '<p>Your ' . $search_type  . ' <strong>"' . $_GET['keyword'] . '"</strong> did not yield any result.</p>';
    } else {
      echo '<p>Your ' . $search_type . ' <strong>"' . $_GET['keyword'] . '"</strong> yielded the following results:</p>';
      foreach ($results as $result) $this->view($search_type . '_result', array('result' => $result));
    }
  ?>
</div>