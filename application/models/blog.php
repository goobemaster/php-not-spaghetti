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

  function get_all_published($fields = '*') {
    if ($fields != '*') $this->db->select($fields);
    return $this->db->get_where('blog', array('published' => '1'))->result();
  }

  function get_by_id($id) {
    return $this->db->get_where('blog', array('id' => $id))->result();
  }

  function get_by_keyword($keyword) {
    if ($keyword != '') {
      $this->db->like('content', $keyword);
      $this->db->or_like('title', $keyword);
      $this->db->distinct();
      return $this->db->get('blog')->result();
    } else {
      return null;
    }
  }

  function get_most_used_tags($limit = 15) {
    $all_tags = array();
    foreach ($this->get_all_published('tags') as $post) $all_tags = array_merge(explode(',', $post->tags), $all_tags);
    $tags = array_count_values($all_tags);
    arsort($tags, SORT_NUMERIC);
    return array_slice($tags, 0, $limit);
  }

  function update_hits($id, $hits) {
    $this->db->where('id', $id);
    $this->db->update('blog', array('hits' => $hits));
  }
}