<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Installation</title>
  <meta name="generator" content="PHP-Simple-Blog">
  <base href="<?php echo $base_url; ?>" target="_self">
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <link rel="license" href="https://github.com/goobemaster/php-simple-blog/blob/master/LICENSE">
  <link rel="help" href="https://github.com/goobemaster/php-simple-blog">
  <link rel="shortcut icon" href="media/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="media/images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/install.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
  <div class="center">
    <h1>PHP-Simple-Blog - Installation</h1>
    <h2>Step 1 / 3</h2>
    <form id="install" action="?step=2" method="post" style="display:none;">
    <div class="fields"><div class="title">MySQL Database</div>
      <?php if (isset($_GET['e'])) { echo '<p style="color:red;">Failed to connect to the server</p>'; } ?>
      <p>Your hosting provider or system administrator can give you these details.</p>

      <div class="cell label">Hostname:</div>
      <div class="cell"><input type="text" id="db_hostname" name="db_hostname" value="localhost"/></div><br/>

      <div class="cell label">Username:</div>
      <div class="cell"><input type="text" id="db_username" name="db_username" value="root"/></div><br/>

      <div class="cell label">Password:</div>
      <div class="cell"><input type="text" id="db_password" name="db_password" value=""/></div><br/>

      <div class="buttons"><div class="outer"><input type="submit" value="Next"/></div></div>
    </div>
    </form>
  </div>
<script>$("#install").fadeIn(3000);</script>
</body>
</html>