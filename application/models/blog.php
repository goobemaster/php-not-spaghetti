<?php

function date_compare($a, $b)
{
  $t1 = strtotime($a->created);
  $t2 = strtotime($b->created);
  return $t1 - $t2;
}

class Blog extends CI_Model {
  public $id = '';
  public $title = '';
  public $created = '';
  public $modified = '';
  public $published = '';
  public $featured = '';
  public $tags = '';
  public $hits = '';
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

  function get_by_keyword($keyword, $tag = false) {
    if (isset($keyword) && $keyword != '') {
      if ($tag) {
        $this->db->like('tags', $keyword);
      } else {
        $this->db->like('content', $keyword);
        $this->db->or_like('title', $keyword);
      }
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

  function insert_post($title, $published, $featured, $tags, $content) {
    $validator = new FormValidatorServer();
    $validator->field('title', 'text', '1', '255', false);
    $validator->field('tags', 'text', '-1', '256', preg_quote('/^(.+[^,]|)$/')); // TODO: Remove -1 hack, amend validator class to support zero length

    if ($validator->validate(array('title' => $title, 'tags' => $tags))) {
      $this->db->insert('blog', array('title' => $title, 'published' => $published, 'featured' => $featured, 'tags' => $tags, 'content' => $content));
      return true;
    } else {
      return false;
    }
  }

  function publish($id) {
    if (count($this->get_by_id($id)) == 1) {
      $this->db->where('id', $id);
      $this->db->update('blog', array('published' => '1'));
      return true;
    } else {
      return false;
    }
  }

  function unpublish($id) {
    if (count($this->get_by_id($id)) == 1) {
      $this->db->where('id', $id);
      $this->db->update('blog', array('published' => '0'));
      return true;
    } else {
      return false;
    }
  }

  function feature($id) {
    if (count($this->get_by_id($id)) == 1) {
      $this->db->where('id', $id);
      $this->db->update('blog', array('featured' => '1'));
      return true;
    } else {
      return false;
    }
  }

  function unfeature($id) {
    if (count($this->get_by_id($id)) == 1) {
      $this->db->where('id', $id);
      $this->db->update('blog', array('featured' => '0'));
      return true;
    } else {
      return false;
    }
  }
}