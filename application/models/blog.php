<?php

class Blog extends CI_Model {
  public $title = '';
  public $created = '';
  public $modified = '';
  public $published = '';
  public $content = '';

  function __construct()
  {
    parent::__construct();
  }

  function get_all() {
    return $this->db->get('blog')->result();
  }

  function get_all_featured() {
    return $this->db->get_where('blog', array('featured' => '1'))->result();
  }

}