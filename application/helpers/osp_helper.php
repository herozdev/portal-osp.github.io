<?php

function is_logged_in() {
	$CI = &get_instance();

	if (!$CI->session->userdata('user_pn')) {
		$CI->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You must login first!</div>');
		redirect('auth', 'refresh');
	} else {
		$role_id = $CI->session->userdata('role_id');
		$menu = $CI->uri->segment(1);

		$query = $CI->db->get_where('user_menu', ['menu' => $menu])->row_array();

		$menu_id = $query['id'];

		$user_akses = $CI->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

		if ($user_akses->num_rows() < 1) {
			redirect('auth/blocked', 'refresh');
		}
	}
}

function check_access($role_id, $menu_id) {
	$CI = &get_instance();

	$CI->db->where('role_id', $role_id);
	$CI->db->where('menu_id', $menu_id);

	$result = $CI->db->get('user_access_menu');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}
