<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expl_nonit_model extends CI_Model
{

  public function get_all_data($start, $limit)
  {
    $this->db->select('*');
    $this->db->order_by('no_gl', 'asc');

    return $this->db->get('expl_non_it', $start, $limit);
  }

  public function get_nonit_all()
  {
    $this->db->select('*');
    $this->db->order_by('no_gl', 'asc');

    return $this->db->get('expl_non_it');
  }

  public function get_keyword($keyword)
  {
    $this->db->select('*');
    $this->db->like('no_gl', $keyword);
    $this->db->or_like('mata_anggaran', $keyword);

    return $this->db->get('expl_non_it');
  }

  public function sum_all()
  {
    $this->db->select('SUM(alokasi) as alokasi, SUM(sisa_alokasi) as sisa_alokasi');

    return $this->db->get('expl_non_it');
  }

  public function get_row_expl_nonit($id)
  {
    $this->db->select('*');
    $this->db->where('no_gl', $id);

    return $this->db->get('expl_non_it');
  }

  public function add_data($data = array())
  {
    $this->db->insert('expl_non_it', $data);
    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function update_data($id, $data = array())
  {
    $this->db->where('no_gl', $id);
    $this->db->update('expl_non_it', $data);

    $err = $this->db->error();
    if ($err['code'] !== 0) {
      return false;
    } else {
      return $this->db->affected_rows();
    }
  }

  public function delete_data($id)
  {
    $this->db->where('no_gl', $id);
    $this->db->delete('expl_non_it');

    $err = $this->db->error();
    if ($err['code'] !== 0) {
      return false;
    } else {
      return $this->db->affected_rows();
    }
  }
}

/* End of file Expl_nonit_model.php */
