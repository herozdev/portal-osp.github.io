<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

  public function getSubmenu()
  {
    $this->db->select('a.*,b.menu');
    $this->db->join('user_menu b', 'a.menu_id = b.id', 'left');

    return $this->db->get('user_sub_menu a');
  }

  public function getMenu()
  {
    $this->db->select('*');
    $this->db->order_by('menu_order', 'asc');

    return $this->db->get('user_menu');
  }

  public function get_row($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);

    return $this->db->get('user_menu');
  }

  public function rowSub($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);

    return $this->db->get('user_sub_menu');
  }

  public function addSubMenu($data = array())
  {
    $this->db->insert('user_sub_menu', $data);

    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function updateSubMenu($id, $data = array())
  {
    $this->db->where('id', $id);
    $this->db->update('user_sub_menu', $data);

    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function deleteSub($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_sub_menu');

    $err = $this->db->error();
    if ($err['code'] !== 0) {
      return false;
    } else {
      return $this->db->affected_rows();
    }
  }

  public function add($data = array())
  {
    $this->db->insert('user_menu', $data);

    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  public function update($id, $data = array())
  {
    $this->db->where('id', $id);
    $this->db->update('user_menu', $data);

    $err = $this->db->error();
    if ($err['code'] !== 0) {
      return false;
    } else {
      return $this->db->affected_rows();
    }
  }

  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_menu');

    $err = $this->db->error();
    if ($err['code'] !== 0) {
      return false;
    } else {
      return $this->db->affected_rows();
    }
  }



}

/* End of file Menu_model.php */
/* Location: ./application/models/M_menu.php */
