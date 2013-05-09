<?php
class Cv_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  /* Search jobs by region and keyword */
  public function search_cvs($sex = -1, $rid = 0, $keyword = NULL) {
    $this->db->select('CV.*, CV.Status as CV_Status, User.*, User.Name as User_Name, User.Status as User_Status, Region.Name as Region_Name');
    $this->db->from('CV');
    $this->db->join('User', 'CV.UID = User.UID');
    $this->db->join('Region', 'CV.RID = Region.RID');

    $where = array();
    if ($sex >= 0) {
      if ($sex == MALE) {
        $where['User.Sex'] = MALE;
      } else {
        $where['User.Sex'] = FEMALE;
      }
    }
    if ($rid > 0) $where['CV.RID'] = $rid;
    $this->db->where($where);

    if ($keyword != NULL && strlen($keyword) > 0) {
      $keyword = str_replace('%20', ' ', $keyword);
      $split = preg_split('/[ \.]/', $keyword);

      foreach ($split as $seg) {
        $this->db->or_like('CV.EduLev', $seg);
        $this->db->or_like('CV.Skill', $seg);
        $this->db->or_like('CV.Language', $seg);
        $this->db->or_like('CV.Exp', $seg);
        $this->db->or_like('CV.AddInfo', $seg);
      }
    }

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return NULL;
    }
  }

  /* Get array of CVs of a specific applicant */
  public function get_cvs($uid) {
    $this->db->where('UID', $uid);
    $query = $this->db->get('CV');
    return $query->result_array();
  }

  /* Get specific CV. Use foreach to retrieve CV from query. */
  public function get_cv($cid) {
    $this->db->where('CID', $cid);
    $query = $this->db->get('CV');

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return NULL;
    }
  }

  /* Save new or update CV. If $cid <= 0, CV will be newly created.
     The array $cvdata MUST NOT have index 'CID'. */
  public function save_cv($cid, $uid, $cvdata) {
    if ($cid > 0) {
      $where = array('CID' => $cid, 'UID' => $uid);
      $this->db->where($where);
      $this->db->update('CV', $cvdata);
    } else {
      $cvdata['UID'] = $uid;
      $this->db->insert('CV', $cvdata);
    }

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  /* Set status of a job to ACTIVE, INACTIVE or DISABLED */
  public function set_status($cid, $uid, $status) {
    $data = array('Status' => $status);

    if ($cid > 0) {
      $where = array('CID' => $cid, 'UID' => $uid);
      $this->db->where($where);
      $this->db->update('CV', $data);
    } else {
      return FALSE;
    }

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

}
