<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

/* Job controller for applicant */
class Job extends CI_Controller {

  private $data;

  public function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('form');
    $this->load->model('region_model', '', TRUE);
    $this->load->model('category_model', '', TRUE);
    $this->load->model('job_level_model', '', TRUE);
    $this->load->model('job_model', '', TRUE);
    $this->load->model('user_model', '', TRUE);
    $this->load->model('cv_model', '', TRUE);

    $sess_data = $this->session->userdata('logged_in');
    $this->data['uid'] = $sess_data['uid'];
    $this->data['username'] = $sess_data['username'];
    $this->data['type'] = $sess_data['type'];

    $this->data['regions'] = $this->region_model->get_regions();
    $this->data['categories'] = $this->category_model->get_categories();
    $this->data['levels'] = $this->job_level_model->get_levels();
    $this->data['job'] = NULL;
    $this->data['employer'] = NULL;
  }

  public function view($jid) {
    $query = $this->job_model->get_job($jid);
    if ($query) {
      foreach ($query as $row) {
        $this->data['job'] = $row;
      }

      $query = $this->user_model->get_user($this->data['job']['UID']);
      if ($query) {
        foreach ($query as $row) {
          $this->data['employer'] = $row;
        }
      }
    }

    $this->data['title'] = 'View Job';

    $this->_show_view('job_view');
  }

  public function apply($jid) {
    $query = $this->job_model->get_job($jid);
    if ($query) {
      foreach ($query as $row) {
        $this->data['job'] = $row;
      }

      $query = $this->user_model->get_user($this->data['job']['UID']);
      if ($query) {
        foreach ($query as $row) {
          $this->data['employer'] = $row;
        }
      }

      $this->data['cvs'] = $this->cv_model->get_cvs($this->data['uid']);
    }

    $this->data['title'] = 'Apply Job';

    if ($this->data['job'] != NULL) {
      $this->_show_view('apply_job_view');
    } else {
      redirect('home', 'refresh');
    }
  }

  private function _show_view($view) {
      $this->load->view('templates/header.php', $this->data);
      $this->load->view('acc_view', $this->data);
      $this->load->view('applicant/nav_view', $this->data);

      $this->load->view('applicant/'.$view, $this->data);

      $this->load->view('templates/footer.php', $this->data);
  }

}
