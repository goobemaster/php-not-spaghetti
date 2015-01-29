<?php
  if ($blog->published) {
    if ($year) echo '<h1>' . $year . '</h1><div class="break"></div>';
    if ($month) echo '<h2>' . $month . '</h2>';
    echo '<p><a href="">' . $blog->title . '</a></p>';
  }
?>