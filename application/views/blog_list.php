<?php
  if ($blog->published) {
    if ($year) echo '<h1><img src="media/images/calendar-icon.png" alt="' . $year . '" title="Blog posts from ' . $year . '"/>' . $year . '</h1><div class="break"></div>';
    if ($month) echo '<h2>' . $month . '</h2>';
    echo '<p><a href="' . link_to_post($blog->id, $blog->title) . '">' . $blog->title . '</a></p>';
  }
?>