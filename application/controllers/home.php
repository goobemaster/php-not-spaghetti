<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
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
                            'aside_font_size' => $this->Configuration->get('aside_font_size'));

    foreach ($style_override as $key => $value) {
      if ($value) {
        $style_override['apply'] = true;
        break;
      }
    }

    $meta_data = array('title' => $this->Configuration->get('title'),
                       'lang' => $this->Configuration->get('lang'),
                       'keywords' => $this->Configuration->get('keywords'),
                       'description' => $this->Configuration->get('description'),
                       'author' => $this->Configuration->get('author'),
                       'base_url' => base_url(),
                       'style_override' => $style_override);

    $content_data = array('featured' => $this->Blog->get_all_featured(),
                          'author' => $this->Configuration->get('author'),
                          'author_email' => $this->Configuration->get('author_email'));

    $panel_data = array('blog_list' => $this->Blog->blog_list());

		$this->load->view('header', $meta_data);
    $this->load->view('panel', $panel_data);
    $this->load->view('content', $content_data);
    $this->load->view('footer', $meta_data);
	}
}