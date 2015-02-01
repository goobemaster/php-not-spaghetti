<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
  public $meta_data, $content_data, $content_view, $panel_data, $panel_view;

  public function __construct() {
    parent::__construct();

    $this->load->helper('url');
    $this->load->helper('common');
    $this->load->model('Configuration', '', TRUE);
    $this->load->model('Blog', '', TRUE);
    $this->load->model('User', '', TRUE);

    $style_override = query_style_overrides($this->Configuration);

    $this->meta_data = array('title' => $this->Configuration->get('title'),
                             'lang' => $this->Configuration->get('lang'),
                             'keywords' => $this->Configuration->get('keywords'),
                             'description' => $this->Configuration->get('description'),
                             'author' => $this->Configuration->get('author'),
                             'base_url' => base_url(),
                             'interface' => 'backend',
                             'ckeditor' => false,
                             'style_override' => $style_override);

    $this->panel_data = array();
    $this->content_data = array();

    // Authentication chunk

    if (isset($_POST['username']) && isset($_POST['password'])) {
      $user = $this->User->authenticate($_POST['username'], $_POST['password'], '1');
      if ($user) $this->session->set_userdata('username', $user->username);
    }

    if (isset($_GET['logout'])) $this->session->set_userdata('username', null);

    if (!$this->session->userdata('username')) {
      $this->panel_view = 'panel_empty';
      $this->content_view = 'content_login';
    } else {
      $this->panel_view = 'panel';
      $this->content_view = 'content_home';
      $this->panel_data['username'] = $this->session->userdata('username');
    }
  }

  public function index()	{
    $this->load->view('header', $this->meta_data);
    $this->load->view('admin/' . $this->panel_view, $this->panel_data);
    $this->load->view('admin/' . $this->content_view, $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }

  public function create() {
    if ($this->session->userdata('username')) {
      $this->content_view = 'content_create';
    }

    $this->meta_data['ckeditor'] = true;

    $this->load->view('header', $this->meta_data);
    $this->load->view('admin/' . $this->panel_view, $this->panel_data);
    $this->load->view('admin/' . $this->content_view, $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }
}