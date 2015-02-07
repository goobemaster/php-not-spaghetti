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
  <h2>Step 3 / 3</h2>
  <form id="install" action="home" method="post">
    <div class="fields"><div class="title">Thank you!</div>
      <p>Your blog is being configured, this might take some... err just joking. Its done!</p>

      <div class="buttons"><div class="outer"><input type="submit" value="Let's Start!"/></div></div>
    </div>
    <?php
    if (isset($_POST['db_hostname'])) $db_hostname = $_POST['db_hostname']; else $db_hostname = '';
    if (isset($_POST['db_username'])) $db_username = $_POST['db_username']; else $db_username = '';
    if (isset($_POST['db_password'])) $db_password = $_POST['db_password']; else $db_password = '';

    if (isset($_POST['full_name'])) $full_name = $_POST['full_name']; else $full_name = '';
    if (isset($_POST['email'])) $email = $_POST['email']; else $email = '';
    if (isset($_POST['username'])) $username = $_POST['username']; else $username = '';
    if (isset($_POST['password'])) $password = $_POST['password']; else $password = '';

    // TODO: Refactor...
    if (!test_mysql($db_hostname, $db_username, $db_password)) {
      refresh_page(0, '?step=1&e');
    } elseif (!strlen($full_name) || !strlen($email) || !strlen($username) || !strlen($password)) {
      refresh_page(0, '?step=2&e');
    } else {
      // Installation
      file_put_contents('application/config/php_simple_blog.php', '<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\'); $config[\'installed\']	= true;');

    }
    ?>
  </form>
</div>
</body>
</html>