<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
  public $meta_data, $content_data, $panel_data;

  public function __construct() {
    parent::__construct();

    $this->load->helper('url');
    $this->load->helper('common');
    $this->load->model('Configuration', '', TRUE);
    $this->load->model('Blog', '', TRUE);

    $style_override = query_style_overrides($this->Configuration);

    $this->meta_data = array('title' => $this->Configuration->get('title'),
                             'lang' => $this->Configuration->get('lang'),
                             'keywords' => $this->Configuration->get('keywords'),
                             'description' => $this->Configuration->get('description'),
                             'author' => $this->Configuration->get('author'),
                             'base_url' => base_url(),
                             'interface' => 'frontend',
                             'ckeditor' => false,
                             'style_override' => $style_override);

    $this->content_data = array('featured' => $this->Blog->get_all_featured(),
                                'author' => $this->Configuration->get('author'),
                                'author_email' => $this->Configuration->get('author_email'));

    $this->panel_data = array('blog_list' => $this->Blog->blog_list(),
                              'tag_list' => $this->Blog->get_most_used_tags(),
                              'tag_size_max' => $this->Configuration->get('tag_size_max'));
  }

	public function index()	{
		$this->load->view('header', $this->meta_data);
    $this->load->view('panel', $this->panel_data);
    $this->load->view('content_featured', $this->content_data);
    $this->load->view('footer', $this->meta_data);
	}

  public function post($id) {
    $post_id = false;
    preg_match('/^(\d+)/', $id, $post_id);

    $this->content_data = array('post' => $this->Blog->get_by_id($post_id[0]),
                                'author' => $this->Configuration->get('author'),
                                'author_email' => $this->Configuration->get('author_email'));

    if (!empty($this->content_data['post']) && $this->content_data['post'][0]->published) $this->Blog->update_hits($post_id[0], $this->content_data['post'][0]->hits + 1);

    $this->load->view('header', $this->meta_data);
    $this->load->view('panel', $this->panel_data);
    $this->load->view('content', $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }

  public function search() {
    $this->content_data = array('results' => $this->Blog->get_by_keyword($_GET['keyword'], isset($_GET['tags'])));

    $this->load->view('header', $this->meta_data);
    $this->load->view('panel', $this->panel_data);
    $this->load->view('search_results', $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }
}