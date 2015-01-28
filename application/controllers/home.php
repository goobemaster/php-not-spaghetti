<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
    $this->load->helper('url');

    $style_override = array('apply' => false,
                            'header_background' => 'SeaGreen',
                            'header_font' => false,
                            'header_font_size' => false,
                            'panel_background' => 'Tan',
                            'content_background' => false,
                            'page_background' => 'beige',
                            'footer_background' => 'SeaGreen',
                            'footer_font' => false,
                            'footer_font_size' => false);

    foreach ($style_override as $key => $value) {
      if ($value) {
        $style_override['apply'] = true;
        break;
      }
    }

    $meta_data = array('title' => 'Blog',
                       'lang' => 'en-US',
                       'keywords' => 'gabor major tech blog php ruby rails codeigniter',
                       'description' => 'Gabor\'s personal blog',
                       'author' => 'Gabor Major',
                       'base_url' => base_url(),
                       'style_override' => $style_override);

		$this->load->view('header', $meta_data);
    $this->load->view('panel');
    $this->load->view('content');
    $this->load->view('footer', $meta_data);
	}
}