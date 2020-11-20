<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_all() {
		$this->db->select('a.*,b.role');
		$this->db->join('user_role b', 'a.role_id = b.id', 'left');

		$this->db->order_by('a.id', 'asc');

		return $this->db->get('user a');
	}

	public function get_row($id) {
		$this->db->select('a.*,b.role');
		$this->db->join('user_role b', 'a.role_id = b.id', 'left');

		$this->db->where('a.id', $id);

		return $this->db->get('user a');
	}

	public function getUser() {
		return $this->db->get_where('user', ['user_pn' => $this->session->userdata('user_pn')]);
	}

	public function getRole() {
		$this->db->select('*');
		$this->db->order_by('id', 'asc');

		return $this->db->get('user_role');
	}

	public function rowRole($id) {
		$this->db->select('*');
		$this->db->where('id', $id);

		return $this->db->get('user_role');
	}

	public function add($data = array()) {
		$this->db->insert('user', $data);

		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function update($id, $data = array()) {
		$this->db->where('id', $id);
		$this->db->update('user', $data);

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('user');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
