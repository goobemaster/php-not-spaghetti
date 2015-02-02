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
    if ($this->session->userdata('username')) {

      // Action : new post
      if (isset($_GET['create'])) {
        if (isset($_POST['featured'])) $featured = true; else $featured = false;
        if (isset($_POST['published'])) $published = true; else $published = false;
        if (isset($_POST['title'])) $title = $_POST['title']; else $title = '';
        if (isset($_POST['tags'])) $tags = $_POST['tags']; else $tags = '';
        if (isset($_POST['ckeditor_content'])) $content = $_POST['ckeditor_content']; else $content = '';

        if ($this->Blog->insert_post($title, $published, $featured, $tags, $content)) {
          $this->content_data['ok_message'] = 'New blog post "' . $title . '" has been saved!';
        } else {
          $this->content_data['error_message'] = 'Blog post hasn\'t been saved, due to missing or incorrect data!';
        }
      }

    }

    $this->load->view('header', $this->meta_data);
    $this->load->view('admin/' . $this->panel_view, $this->panel_data);
    $this->load->view('admin/' . $this->content_view, $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }

  public function create() {
    if ($this->session->userdata('username')) {
      $this->content_view = 'content_create';
      $this->meta_data['ckeditor'] = true;
    }

    $this->load->view('header', $this->meta_data);
    $this->load->view('admin/' . $this->panel_view, $this->panel_data);
    $this->load->view('admin/' . $this->content_view, $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }
}