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
  <h2>Step 2 / 3</h2>
  <form id="install" action="?step=3" method="post">
    <div class="fields"><div class="title">Personal Details</div>
      <?php if (isset($_GET['e'])) { echo '<p style="color:red;">Please fill in all the fields</p>'; } ?>
      <p>Who's going to be the owner of this blog?</p>

      <div class="cell label">Full Name:</div>
      <div class="cell"><input type="text" id="full_name" name="full_name" value=""/></div><br/>

      <div class="cell label">Email:</div>
      <div class="cell"><input type="text" id="email" name="email" value=""/></div><br/>

      <div class="cell label">Username:</div>
      <div class="cell"><input type="text" id="username" name="username" value="admin"/></div><br/>

      <div class="cell label">Password:</div>
      <div class="cell"><input type="password" id="password" name="password" value=""/></div><br/>

      <div class="buttons"><div class="outer"><input type="submit" value="Next"/></div></div>
    </div>
    <?php
    if (isset($_POST['db_hostname'])) $db_hostname = $_POST['db_hostname']; else $db_hostname = '';
    if (isset($_POST['db_username'])) $db_username = $_POST['db_username']; else $db_username = '';
    if (isset($_POST['db_password'])) $db_password = $_POST['db_password']; else $db_password = '';

    if (!test_mysql($db_hostname, $db_username, $db_password)) {
      refresh_page(0, '?step=1&e');
    } else {
      echo '<input type="hidden" id="db_hostname" name="db_hostname" value="' . $db_hostname . '"/>';
      echo '<input type="hidden" id="db_username" name="db_username" value="' . $db_username . '"/>';
      echo '<input type="hidden" id="db_password" name="db_password" value="' . $db_password . '"/>';
    }
    ?>
  </form>
  <?php
  $validator = new FormValidatorClient('install');
  $validator->field('full_name', 'text', '1', '255', false);
  $validator->field('email', 'text', '1', '255', false);
  $validator->field('username', 'text', '1', '255', false);
  $validator->field('password', 'text', '1', '255', false);
  echo $validator->script();
  ?>
</div>
</body>
</html>