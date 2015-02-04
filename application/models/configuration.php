<?php

class Configuration extends CI_Model {
  public $key = '';
  public $value = '';

  function __construct()
  {
    parent::__construct();
  }

  function get($key) {
    $this->db->select('value');
    $this->db->where('key', $key);
    $this->db->from('configuration');
    $value = $this->db->get()->result()[0]->value;

    if (preg_match('/%([a-z]+)%/', $value, $reference_key)) {
      $value = preg_replace('/(%[a-z0-9\-_]+%)/', $this->get($reference_key[1]), $value);
    }

    return $value;
  }

  function get_all() {
    $all = array();
    foreach($this->db->get('configuration')->result() as $config) { $all[$config->key] = $config->value; }
    return $all;
  }

  function update_batch($list) {
    if (count($list)) {
      foreach($list as $key => $value) {
        if (count($this->get($key)) == 1) {
          $this->db->where('key', $key);
          if (!$this->db->update('configuration', array('value' => $value))) return false;
        } else {
          return false;
        }
      }
    } else {
      return false;
    }
    return true;
  }

}