<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright		Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @copyright		Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");

    if (!$this->config->item('installed')) $this->install();
	}

	public static function &get_instance()
	{
		return self::$instance;
	}

  public function install() {
    $this->load->helper('url');

    if (isset($_GET['step'])) {
      if ($_GET['step'] > 1 && $_GET['step'] <= 3) $step = $_GET['step']; else $step = 1;
    } else {
      $step = 1;
    }

    if (!is_writable('installation/php-simple-blog.sql') || !is_writable('application/config/database.php') || !is_writable('application/config/php_simple_blog.php')) {
      try {
        chmod('installation/php-simple-blog.sql', 775);
        chmod('application/config/database.php', 775);
        chmod('application/config/php_simple_blog.php', 775);
        $permission = true;
        $step = 1;
      } catch (Exception $e) {
        $permission = false;
        $step = 1;
      }
    } else {
      $permission = true;
    }

    $this->load->view('install/step_' . $step, array('base_url' => base_url(), 'file_permission' => $permission));
  }

}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */