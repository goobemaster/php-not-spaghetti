<?php

function date_compare($a, $b)
{
  $t1 = strtotime($a->created);
  $t2 = strtotime($b->created);
  return $t1 - $t2;
}

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

  function blog_list() {
    $all_published = $this->get_all_published();
    usort($all_published, 'date_compare');
    return $all_published;
  }

  function get_all_featured() {
    return $this->db->get_where('blog', array('featured' => '1'))->result();
  }

  function get_all_published() {
    return $this->db->get_where('blog', array('published' => '1'))->result();
  }

  function get_by_id($id) {
    return $this->db->get_where('blog', array('id' => $id))->result();
  }

}