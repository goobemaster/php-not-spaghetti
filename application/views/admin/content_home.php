<div id="content">
  <div class="admin">
    <?php
      if (isset($ok_message)) echo '<div class="ok message"><img src="media/images/ok-icon.png" alt="Ok" title="Ok"/>' . $ok_message . '</div>';
      if (isset($error_message)) echo '<div class="error message"><img src="media/images/error-icon.png" alt="Error" title="Error"/>' . $error_message . '</div>';
      if (isset($info_message)) echo '<div class="info message"><img src="media/images/info-icon.png" alt="Info" title="Info"/>' . $info_message . '</div>';
    ?>
    <p>Welcome to the admin panel!</p>
  </div>
</div>