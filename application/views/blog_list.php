<?php
  if ($blog->published) {
    if ($year) echo '<h1>' . $year . '</h1>';
    if ($month) echo '<h2>' . $month . '</h2>';
    echo '<p><a href="">' . $blog->title . '</a></p>';
  }
?>