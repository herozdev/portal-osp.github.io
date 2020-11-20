<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function get_user() {
		return $this->db->get_where('user', ['user_pn' => $this->session->userdata('user_pn')]);
	}

	public function get_row($id) {
		$this->db->select('*');
		$this->db->where('id', $id);

		return $this->db->get('user');
	}

	public function get_all() {
		$this->db->select('*');

		return $this->db->get('user');
	}

	public function add($data = array()) {
		$this->db->insert('user', $data);

		if ($this->dbd->affected_rows() > 0) {
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

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
