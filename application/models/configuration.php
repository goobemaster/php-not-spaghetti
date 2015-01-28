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

}