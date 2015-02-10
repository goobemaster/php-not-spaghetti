<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| PHP-Simple-Blog
|--------------------------------------------------------------------------
|
| Indicates whether the system is installed and configured correctly or not.
|
| The system won't load unless the user has properly installed it upon the
| first run.
|
*/
$config['installed'] = false;

$config['debug'] = false;

error_reporting(E_ALL);

if($config['debug']) {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  ini_set('log_errors', 0);
} else {
  ini_set('display_errors', 0);
  ini_set('display_startup_errors', 0);
  ini_set('log_errors', 1);
}


/* End of file config.php */
/* Location: ./application/config/config.php */