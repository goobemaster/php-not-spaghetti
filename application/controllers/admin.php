<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
  public $meta_data, $content_data, $content_view, $panel_data, $panel_view;

  public function __construct() {
    parent::__construct();
    if (!$this->config->item('installed')) return;

    $this->load->helper('url');
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
    if (!$this->config->item('installed')) return;

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

      // Action : update post
      if (isset($_GET['update'])) {
        if (isset($_POST['id'])) $id = $_POST['id']; else $id = false;
        if (isset($_POST['featured'])) $featured = true; else $featured = false;
        if (isset($_POST['published'])) $published = true; else $published = false;
        if (isset($_POST['title'])) $title = $_POST['title']; else $title = '';
        if (isset($_POST['tags'])) $tags = $_POST['tags']; else $tags = '';
        if (isset($_POST['ckeditor_content'])) $content = $_POST['ckeditor_content']; else $content = '';

        if ($id) {
          if ($this->Blog->update_post($id, $title, $published, $featured, $tags, $content)) {
            $this->content_data['ok_message'] = 'Blog post "' . $title . '" has been updated!';
          } else {
            $this->content_data['error_message'] = 'Blog post hasn\'t been updated, due to missing or incorrect data!';
          }
        } else {
          $this->content_data['error_message'] = 'Blog post with such identifier cannot be found!';
        }
      }

      // Action : update appearance settings
      if (isset($_GET['appearance'])) {
        $settings = extract_post_values(array('header_background', 'header_font', 'header_font_size', 'panel_background', 'panel_font', 'content_background', 'page_background', 'footer_background', 'footer_font', 'footer_font_size', 'aside_background', 'aside_font', 'aside_font_size', 'tag_background', 'tag_color', 'link_color'), 'appearance');
        if ($this->Configuration->update_batch($settings)) {
          $this->content_data['ok_message'] = 'Appearance settings has been updated!';
          refresh_page(2, 'admin');
        } else {
          $this->content_data['ok_error'] = 'Errors while updating appearance settings!';
        }
      }

      // Action : update widget settings
      if (isset($_GET['widgets'])) {
        $settings = extract_post_values(array('post_list_displayed', 'post_list_ordering', 'search_displayed', 'tags_displayed', 'tag_size_max', 'tags_max'), 'widgets');
        if ($this->Configuration->update_batch($settings)) {
          $this->content_data['ok_message'] = 'Widget settings has been updated!';
        } else {
          $this->content_data['ok_error'] = 'Errors while updating widget settings!';
        }
      }

      // Action : update general settings
      if (isset($_GET['general'])) {
        $settings = extract_post_values(array('title', 'lang', 'keywords', 'description', 'author', 'author_email'), false);
        if ($this->Configuration->update_batch($settings)) {
          $this->content_data['ok_message'] = 'General settings has been updated!';
        } else {
          $this->content_data['ok_error'] = 'Errors while updating general settings!';
        }
      }

    }

    $this->load->view('header', $this->meta_data);
    $this->load->view('admin/' . $this->panel_view, $this->panel_data);
    $this->load->view('admin/' . $this->content_view, $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }

  public function create() {
    if (!$this->config->item('installed')) return;

    if ($this->session->userdata('username')) {
      $this->content_view = 'content_create';
      $this->meta_data['ckeditor'] = true;
    }

    $this->load->view('header', $this->meta_data);
    $this->load->view('admin/' . $this->panel_view, $this->panel_data);
    $this->load->view('admin/' . $this->content_view, $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }

  public function edit($id) {
    if (!$this->config->item('installed')) return;

    if ($this->session->userdata('username')) {
      $this->content_view = 'content_edit';
      $this->content_data['post'] = $this->Blog->get_by_id($id);
      $this->meta_data['ckeditor'] = true;
    }

    $this->load->view('header', $this->meta_data);
    $this->load->view('admin/' . $this->panel_view, $this->panel_data);
    $this->load->view('admin/' . $this->content_view, $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }

  public function post() {
    if (!$this->config->item('installed')) return;

    if ($this->session->userdata('username')) {
      $this->content_view = 'content_list';
      $this->content_data['blog'] = $this->Blog->get_all();
    }

    $this->load->view('header', $this->meta_data);
    $this->load->view('admin/' . $this->panel_view, $this->panel_data);
    $this->load->view('admin/' . $this->content_view, $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }

  public function settings($section) {
    if (!$this->config->item('installed')) return;

    if ($this->session->userdata('username')) {
      if ($section == 'appearance') {
        $this->content_view = 'content_appearance';
        $this->content_data['config'] = $this->Configuration->get_all();
      } elseif ($section == 'widgets') {
        $this->content_view = 'content_widgets';
        $this->content_data['config'] = $this->Configuration->get_all();
      } elseif ($section == 'general') {
        $this->content_view = 'content_general';
        $this->content_data['config'] = $this->Configuration->get_all();
      } else {
        $this->content_view = 'content_home';
        $this->content_data['info_message'] = 'Unknown section!';
      }
    }

    $this->load->view('header', $this->meta_data);
    $this->load->view('admin/' . $this->panel_view, $this->panel_data);
    $this->load->view('admin/' . $this->content_view, $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }

  public function api($method) {
    if (!$this->config->item('installed')) return;

    if ($this->session->userdata('username')) {

      if ($method == 'publish') {
        if (isset($_POST['id'])) {
          if ($this->Blog->publish($_POST['id'])) http_response(200); else http_response(400);
        } else {
          http_response(400);
        }
      }

      if ($method == 'unpublish') {
        if (isset($_POST['id'])) {
          if ($this->Blog->unpublish($_POST['id'])) http_response(200); else http_response(400);
        } else {
          http_response(400);
        }
      }

      if ($method == 'feature') {
        if (isset($_POST['id'])) {
          if ($this->Blog->feature($_POST['id'])) http_response(200); else http_response(400);
        } else {
          http_response(400);
        }
      }

      if ($method == 'unfeature') {
        if (isset($_POST['id'])) {
          if ($this->Blog->unfeature($_POST['id'])) http_response(200); else http_response(400);
        } else {
          http_response(400);
        }
      }

      if ($method == 'delete') {
        if (isset($_POST['id'])) {
          if ($this->Blog->delete($_POST['id'])) http_response(200); else http_response(400);
        } else {
          http_response(400);
        }
      }

      http_response(405);

    } else {
      http_response(401);
    }
  }
}