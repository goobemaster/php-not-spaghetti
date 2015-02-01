<?php

class User extends CI_Model {
  public $id = '';
  public $username = '';
  public $password = '';
  public $email = '';
  public $admin = '';

  function __construct()
  {
    parent::__construct();
  }

  function authenticate($username, $password, $admin = '0') {
    // TODO: use openssl_encrypt()
    $stored_password = base64_encode($password);

    $user = $this->db->get_where('user', array('username' => $username, 'password' => $stored_password, 'admin' => $admin))->result();
    if (count($user) == 1) return $user[0]; else return false;
  }

}