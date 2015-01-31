<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
  public $meta_data, $content_data, $panel_data;

  public function __construct() {
    parent::__construct();

    $this->load->helper('url');
    $this->load->model('Configuration', '', TRUE);
    $this->load->model('Blog', '', TRUE);

    $style_override = array('apply' => false,
                            'header_background' => $this->Configuration->get('header_background'),
                            'header_font' => $this->Configuration->get('header_font'),
                            'header_font_size' => $this->Configuration->get('header_font_size'),
                            'panel_background' => $this->Configuration->get('panel_background'),
                            'content_background' => $this->Configuration->get('content_background'),
                            'page_background' => $this->Configuration->get('page_background'),
                            'footer_background' => $this->Configuration->get('footer_background'),
                            'footer_font' => $this->Configuration->get('footer_font'),
                            'footer_font_size' => $this->Configuration->get('footer_font_size'),
                            'aside_background' => $this->Configuration->get('aside_background'),
                            'aside_font' => $this->Configuration->get('aside_font'),
                            'aside_font_size' => $this->Configuration->get('aside_font_size'),
                            'panel_font' => $this->Configuration->get('panel_font'),
                            'tag_background' => $this->Configuration->get('tag_background'),
                            'tag_color' => $this->Configuration->get('tag_color'));

    foreach ($style_override as $key => $value) {
      if ($value) {
        $style_override['apply'] = true;
        break;
      }
    }

    $this->meta_data = array('title' => $this->Configuration->get('title'),
                             'lang' => $this->Configuration->get('lang'),
                             'keywords' => $this->Configuration->get('keywords'),
                             'description' => $this->Configuration->get('description'),
                             'author' => $this->Configuration->get('author'),
                             'base_url' => base_url(),
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
    $this->content_data = array('results' => $this->Blog->get_by_keyword($_GET['keyword'], isset($_GET['tag'])));

    $this->load->view('header', $this->meta_data);
    $this->load->view('panel', $this->panel_data);
    $this->load->view('search_results', $this->content_data);
    $this->load->view('footer', $this->meta_data);
  }
}