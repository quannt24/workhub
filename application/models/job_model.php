<?php
class Job_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  /* Search jobs by region, category, job level and keyword. Return fields
     of job and employer name as Emp_Name. */
  public function search_jobs($rid = 0, $caid = 0, $jlid = 0, $keyword = NULL) {
    $this->db->select('Job.*, Job.Name as Job_Name, User.Name as Emp_Name, JobLevel.Name as JobLevel_Name, Category.Name as Category_Name, Region.Name as Region_Name');
    $this->db->from('Job');
    $this->db->join('User', 'Job.UID = User.UID');
    $this->db->join('JobLevel', 'Job.JLID = JobLevel.JLID');
    $this->db->join('Category', 'Job.CAID = Category.CAID');
    $this->db->join('Region', 'Job.RID = Region.RID');

    $where = array();
    if ($rid > 0) $where['Job.RID'] = $rid;
    if ($caid > 0) $where['Job.CAID'] = $caid;
    if ($jlid > 0) $where['Job.JLID'] = $jlid;
    $this->db->where($where);

    if ($keyword != NULL && strlen($keyword) > 0) {
      $keyword = str_replace('%20', ' ', $keyword);
      $split = preg_split('/[ \.]/', $keyword);

      foreach ($split as $seg) {
        $this->db->or_like('Job.Name', $seg);
      }
    }

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return NULL;
    }
  }

  /* Get array of jobs of a specific employer */
  public function get_jobs($uid) {
    $this->db->where('UID', $uid);
    $query = $this->db->get('Job');
    return $query->result_array();
  }

  /* Get specific job. Use foreach to retrieve job from query. */
  public function get_job($jid) {
    $where = array('JID' => $jid);
    $this->db->where($where);
    $query = $this->db->get('Job');

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return NULL;
    }
  }

  /* Save new or update job. If $jid <= 0, job will be newly created.
     The array $jobdata MUST NOT have index 'JID'. */
  public function save_job($jid, $uid, $jobdata) {
    if ($jid > 0) {
      $where = array('JID' => $jid, 'UID' => $uid);
      $this->db->where($where);
      $this->db->update('Job', $jobdata);
    } else {
      $jobdata['UID'] = $uid;
      $this->db->insert('Job', $jobdata);
    }

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  /* Set status of a job to ACTIVE, INACTIVE or DISABLED */
  public function set_status($jid, $uid, $status) {
    $data = array('Status' => $status);

    if ($jid > 0) {
      $where = array('JID' => $jid, 'UID' => $uid);
      $this->db->where($where);
      $this->db->update('Job', $data);
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
