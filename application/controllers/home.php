<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('session');
  }

  function index() {
    if($this->session->userdata('logged_in')) {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];

      $this->load->view('templates/header.php', $data);
      $this->load->view('home_view', $data);
      $this->load->view('templates/footer.php', $data);
    } else {
      //If no session, redirect to login page
      redirect('login', 'refresh');
    }
  }

  function logout() {
    $this->load->helper('url');
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('login', 'refresh');
  }

}
