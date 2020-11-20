<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('Admin_model', 'admin');
		$this->load->model('Menu_model', 'menu');
		$this->load->model('Inv_model', 'inv');
		$this->load->model('Expl_model', 'expl');
		$this->load->model('Expl_nonit_model', 'expl_nonit');
		$this->load->model('Pengadaan_model', 'pengadaan');
	}

	public function list_user()
	{
		$data['title'] = "List User";

		$data['user'] = $this->admin->getUser()->row_array();

		$data['users'] = $this->admin->get_all()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/list_user', $data);
		$this->load->view('templates/footer');
	}

	public function edit_user($id)
	{
		$data['title'] = "Edit User";

		$data['user'] = $this->admin->getUser()->row_array();

		$data['users'] = $this->admin->get_row($id)->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/edit_user', $data);
		$this->load->view('templates/footer');
	}

	public function index()
	{
		error_reporting(0);
		$data['title'] = "Dashboard Admin";

		$data['user'] = $this->admin->getUser()->row_array();
		$data['list'] = $this->pengadaan->get_all_data_peng_inv()->result_array();
		$data['inv'] = $this->pengadaan->get_monitoring_hw()->result_array();
		$data['hw'] = $this->inv->get_hardware_inv()->result_array();
		$data['sw'] = $this->inv->get_software_inv()->result_array();
		$data['sum_inv'] = $this->inv->sum_all_inv()->result_array();
		$data['soft'] = $this->pengadaan->get_monitoring_sw()->result_array();
		$data['it1'] = $this->expl->get_it1()->result_array();
		$data['it2'] = $this->expl->get_it2()->result_array();
		$data['it3'] = $this->expl->get_it3()->result_array();
		$data['it4'] = $this->expl->get_it4()->result_array();
		$data['it5'] = $this->expl->get_it5()->result_array();
		$data['it6'] = $this->expl->get_it6()->result_array();
		$data['it7'] = $this->expl->get_it7()->result_array();
		$data['mon_it1'] = $this->expl->get_mon_it1()->result_array();
		$data['mon_it2'] = $this->expl->get_mon_it2()->result_array();
		$data['mon_it3'] = $this->expl->get_mon_it3()->result_array();
		$data['mon_it4'] = $this->expl->get_mon_it4()->result_array();
		$data['mon_it5'] = $this->expl->get_mon_it5()->result_array();
		$data['mon_it6'] = $this->expl->get_mon_it6()->result_array();
		$data['mon_it7'] = $this->expl->get_mon_it7()->result_array();
		$data['nonit'] = $this->expl->get_nonit()->result_array();
		$data['monit1'] = $this->expl->get_monitoring_nonit()->result_array();
		$data['sum_expl'] = $this->expl->sum_all();

		$data['anggaran'] = $this->pengadaan->get_anggaran_inv();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function search_inv()
	{
		error_reporting(0);
		$keyword = $this->input->post('keyword');
		$data['title'] = "Hasil Pencarian Breakdown RKA";
		$data['user'] = $this->admin->getUser()->row_array();
		$data['key'] = $this->inv->get_keyword_inv($keyword);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('investasi/search_inv', $data);
		$this->load->view('templates/footer');
	}

	public function search_expl()
	{
		error_reporting(0);
		$keyword = $this->input->post('keyword');
		$data['title'] = "Hasil Pencarian Breakdown RKA";
		$data['user'] = $this->admin->getUser()->row_array();
		$data['key'] = $this->expl->get_keyword_expl($keyword);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('eksploitasi/search_expl', $data);
		$this->load->view('templates/footer');
	}

	public function search_expl_nonit()
	{
		error_reporting(0);
		$keyword = $this->input->post('keyword');
		$data['title'] = "Hasil Pencarian Breakdown RKA";
		$data['user'] = $this->admin->getUser()->row_array();
		$data['key'] = $this->expl_nonit->get_keyword($keyword);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/search_expl_nonit', $data);
		$this->load->view('templates/footer');
	}

	public function inv()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('admin/inv');
		$config['total_rows'] = $this->db->count_all('investasi');

		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';

		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';

		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span>Next</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';

		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;

		$data['title'] = "Breakdown RKA Investasi";

		$data['user'] = $this->admin->getUser()->row_array();
		$data['inv'] = $this->inv->get_all_inv($config['per_page'], $data['page'])->result_array();
		$data['hw'] = $this->inv->get_hardware_inv()->result_array();
		$data['sw'] = $this->inv->get_software_inv()->result_array();
		$data['sum'] = $this->inv->sum_all_inv();
		$data['kode'] = $this->inv->create_id_inv();
		$data['jenis'] = $this->inv->get_all_sub_inv()->result_array();

		$data['pagination'] = $this->pagination->create_links();

		$post = [
			'id' => uniqid(),
			'kode_rka' => $this->input->post('kode_rka'),
			'kode_jenis' => $this->input->post('kode_jenis'),
			'kode_kegiatan' => $this->input->post('kode_kegiatan'),
			'kegiatan' => $this->input->post('kegiatan'),
			'alokasi_baru' => str_replace('.', '', $this->input->post('alokasi_baru')),
			'alokasi_carry_over' => str_replace('.', '', $this->input->post('alokasi_carry_over')),
			'sisa_alokasi_baru' => str_replace('.', '', $this->input->post('sisa_alokasi_baru')),
			'sisa_alokasi_carry_over' => str_replace('.', '', $this->input->post('sisa_alokasi_carry_over')),
			'keterangan' => $this->input->post('keterangan'),
		];

		$this->form_validation->set_rules('kode_rka', 'Kode RKA', 'trim|required');
		$this->form_validation->set_rules('kode_kegiatan', 'Kode Kegiatan', 'trim|required');
		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('investasi/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->inv->add_inv($post);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">A new breakdown has been added!</div>');

			redirect('admin/inv', 'refresh');
		}
	}

	public function expl()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('admin/expl');
		$config['total_rows'] = $this->db->count_all('eksploitasi');
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['title'] = "Breakdown RKA Eksploitasi";

		$data['user'] = $this->admin->getUser()->row_array();
		$data['expl'] = $this->expl->get_all_expl($config['per_page'], $data['page'])->result_array();
		$data['it'] = $this->expl->get_it1()->result_array();
		$data['nonit'] = $this->expl->get_nonit()->result_array();
		$data['sum'] = $this->expl->sum_all();
		$data['kode'] = $this->expl->buat_kode();
		$data['kodekat'] = $this->expl->buat_kode_kategori();
		$data['jenis'] = $this->expl->get_all_sub_expl()->result_array();
		$data['kategori'] = $this->expl->get_all_sub_expl_kategori()->result_array();
		$data['pagination'] = $this->pagination->create_links();

		$post = [
			'id' => uniqid(),
			'kode_rka' => $this->input->post('kode_rka'),
			'kode_jenis' => $this->input->post('kode_jenis'),
			'kode_kategori' => $this->input->post('kode_kategori'),
			'kode_kegiatan' => $this->input->post('kode_kegiatan'),
			'kegiatan' => $this->input->post('kegiatan'),
			'alokasi_baru' => str_replace('.', '', $this->input->post('alokasi_baru')),
			'alokasi_carry_over' => str_replace('.', '', $this->input->post('alokasi_carry_over')),
			'sisa_alokasi_baru' => str_replace('.', '', $this->input->post('sisa_alokasi_baru')),
			'sisa_alokasi_carry_over' => str_replace('.', '', $this->input->post('sisa_alokasi_carry_over')),
			'keterangan' => $this->input->post('keterangan'),
		];

		$this->form_validation->set_rules('kode_rka', 'Kode RKA', 'trim|required');
		$this->form_validation->set_rules('kode_kegiatan', 'Kode Kegiatan', 'trim|required');
		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('eksploitasi/index', $data);
			$this->load->view('templates/footer');
		} else {
			$this->expl->add_expl($post);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">A new breakdown has been added!</div>');

			redirect('admin/expl', 'refresh');
		}
	}

	public function expl_nonit()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('admin/expl_nonit');
		$config['total_rows'] = $this->db->count_all('expl_non_it');
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close'] = '</span>Next</li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['title'] = "Breakdown RKA Eksploitasi Non IT";

		$data['user'] = $this->admin->getUser()->row_array();
		$data['expl_nonit'] = $this->expl_nonit->get_all_data($config['per_page'], $data['page'])->result_array();
		//$data['it'] = $this->expl->get_it()->result_array();
		//$data['nonit'] = $this->expl->get_nonit()->result_array();
		$data['sum'] = $this->expl_nonit->sum_all();
		//$data['kode'] = $this->expl->buat_kode();
		//$data['kodekat'] = $this->expl->buat_kode_kategori();
		//$data['jenis'] = $this->expl->get_all_sub_expl()->result_array();
		//$data['kategori'] = $this->expl->get_all_sub_expl_kategori()->result_array();
		$data['pagination'] = $this->pagination->create_links();

		$post = [
			'no_gl' => $this->input->post('no_gl'),
			'mata_anggaran' => $this->input->post('mata_anggaran'),
			'alokasi' => str_replace('.', '', $this->input->post('alokasi')),
			'sisa_alokasi' => str_replace('.', '', $this->input->post('sisa_alokasi')),
		];

		$this->form_validation->set_rules('no_gl', 'No GL', 'trim|required');
		$this->form_validation->set_rules('mata_anggaran', 'Mata Anggaran', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/expl_nonit', $data);
			$this->load->view('templates/footer');
		} else {
			$this->expl_nonit->add_data($post);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">A new breakdown has been added!</div>');

			redirect('admin/expl_nonit', 'refresh');
		}
	}

	public function edit_form_inv($id)
	{
		$data['title'] = "Edit Data Breakdown";

		$data['user'] = $this->admin->getUser()->row_array();

		$data['row'] = $this->inv->get_row_inv($id)->row_array();
		$data['jenis'] = $this->inv->get_all_sub_inv()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('investasi/edit_form', $data);
		$this->load->view('templates/footer');
	}

	public function edit_form_expl($id)
	{
		$data['title'] = "Edit Data Breakdown";

		$data['user'] = $this->admin->getUser()->row_array();

		$data['row'] = $this->expl->get_row_expl($id)->row_array();
		$data['jenis'] = $this->expl->get_all_sub_expl()->result_array();
		$data['kategori'] = $this->expl->get_all_sub_expl_kategori()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('eksploitasi/edit_form', $data);
		$this->load->view('templates/footer');
	}

	public function edit_form_expl_nonit($id)
	{
		$data['title'] = "Edit Data Breakdown Non IT";

		$data['user'] = $this->admin->getUser()->row_array();

		$data['row'] = $this->expl_nonit->get_row_expl_nonit($id)->row_array();
		//$data['jenis'] = $this->expl->get_all_sub_expl()->result_array();
		//$data['kategori'] = $this->expl->get_all_sub_expl_kategori()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/edit_form_expl_nonit', $data);
		$this->load->view('templates/footer');
	}

	public function updateInv()
	{
		if ($this->input->post()) {
			$kode_rka = $this->input->post('kode_rka');
			$kode_jenis = $this->input->post('kode_jenis');
			$kode_kegiatan = $this->input->post('kode_kegiatan');
			$kegiatan = $this->input->post('kegiatan');
			$alokasi_baru = $this->input->post('alokasi_baru');
			$alokasi_carry_over = $this->input->post('alokasi_carry_over');
			$sisa_alokasi_baru = $this->input->post('sisa_alokasi_baru');
			$sisa_alokasi_carry_over = $this->input->post('sisa_alokasi_carry_over');
			$keterangan = $this->input->post('keterangan');

			$alokasi_baru_fix = str_replace('.', '', $alokasi_baru);
			$alokasi_carry_over_fix = str_replace('.', '', $alokasi_carry_over);
			$sisa_alokasi_baru_fix = str_replace('.', '', $sisa_alokasi_baru);
			$sisa_alokasi_carry_over_fix = str_replace('.', '', $sisa_alokasi_carry_over);

			$post = array(
				'kode_rka' => $kode_rka,
				'kode_jenis' => $kode_jenis,
				'kode_kegiatan' => $kode_kegiatan,
				'kegiatan' => $kegiatan,
				'alokasi_baru' => $alokasi_baru_fix,
				'alokasi_carry_over' => $alokasi_carry_over_fix,
				'sisa_alokasi_baru' => $sisa_alokasi_baru_fix,
				'sisa_alokasi_carry_over' => $sisa_alokasi_carry_over_fix,
				'keterangan' => $keterangan,
			);

			$this->form_validation->set_rules('kode_rka', 'Kode RKA', 'trim|required');
			$this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'trim|required');
			$this->form_validation->set_rules('kode_kegiatan', 'Kode Kegiatan', 'trim|required');
			$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');

			$id = $this->input->post('id');
			$kode_kegiatan = $post['kode_kegiatan'];

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit Breakdown failed!</div>');
				redirect('admin/edit_form_inv', 'refresh');
			} else {
				$go = $this->inv->update_inv($id, $post);

				if ($go) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
					redirect('admin/inv', 'refresh');
				} else {
					redirect('admin/inv', 'refresh');
				}
			}
		}
	}

	public function updateExpl()
	{
		if ($this->input->post()) {
			$kode_rka = $this->input->post('kode_rka');
			$kode_jenis = $this->input->post('kode_jenis');
			$kode_kategori = $this->input->post('kode_kategori');
			$kode_kegiatan = $this->input->post('kode_kegiatan');
			$kegiatan = $this->input->post('kegiatan');
			$alokasi_baru = $this->input->post('alokasi_baru');
			$alokasi_carry_over = $this->input->post('alokasi_carry_over');
			$sisa_alokasi_baru = $this->input->post('sisa_alokasi_baru');
			$sisa_alokasi_carry_over = $this->input->post('sisa_alokasi_carry_over');
			$keterangan = $this->input->post('keterangan');

			$alokasi_baru_fix = str_replace('.', '', $alokasi_baru);
			$alokasi_carry_over_fix = str_replace('.', '', $alokasi_carry_over);
			$sisa_alokasi_baru_fix = str_replace('.', '', $sisa_alokasi_baru);
			$sisa_alokasi_carry_over_fix = str_replace('.', '', $sisa_alokasi_carry_over);

			$post = array(
				'kode_rka' => $kode_rka,
				'kode_jenis' => $kode_jenis,
				'kode_kategori' => $kode_kategori,
				'kode_kegiatan' => $kode_kegiatan,
				'kegiatan' => $kegiatan,
				'alokasi_baru' => $alokasi_baru_fix,
				'alokasi_carry_over' => $alokasi_carry_over_fix,
				'sisa_alokasi_baru' => $sisa_alokasi_baru_fix,
				'sisa_alokasi_carry_over' => $sisa_alokasi_carry_over_fix,
				'keterangan' => $keterangan,
			);

			$this->form_validation->set_rules('kode_rka', 'Kode RKA', 'trim|required');
			$this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'trim|required');
			$this->form_validation->set_rules('kode_kegiatan', 'Kode Kegiatan', 'trim|required');
			$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');

			$id = $this->input->post('id');
			$kode_kegiatan = $post['kode_kegiatan'];

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit Breakdown failed!</div>');
				redirect('admin/edit_form_expl', 'refresh');
			} else {
				$go = $this->expl->update_expl($id, $post);

				if ($go) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
					redirect('admin/expl', 'refresh');
				} else {
					redirect('admin/expl', 'refresh');
				}
			}
		}
	}

	public function updateNonit()
	{
		if ($this->input->post()) {
			$mata_anggaran = $this->input->post('mata_anggaran');
			$alokasi = $this->input->post('alokasi');
			$sisa_alokasi = $this->input->post('sisa_alokasi');

			$alokasiFix = str_replace('.', '', $alokasi);
			$sisaFix = str_replace('.', '', $sisa_alokasi);

			$post = array(
				'mata_anggaran' => $mata_anggaran,
				'alokasi' => $alokasiFix,
				'sisa_alokasi' => $sisaFix,
			);

			$this->form_validation->set_rules('no_gl', 'No GL', 'required');

			$no_gl = $this->input->post('no_gl');


			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit Breakdown failed!</div>');
				redirect('admin/edit_form_expl_nonit', 'refresh');
			} else {
				$go = $this->expl_nonit->update_data($no_gl, $post);

				if ($go) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
					redirect('admin/expl_nonit', 'refresh');
				} else {
					redirect('admin/expl_nonit', 'refresh');
				}
			}
		}
	}

	public function role()
	{
		$data['title'] = "Role Admin";

		$data['user'] = $this->admin->getUser()->row_array();

		$data['role'] = $this->admin->getRole()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}

	public function role_access($role_id)
	{
		$data['title'] = "Role Access";

		$data['user'] = $this->admin->getUser()->row_array();

		$data['role'] = $this->admin->rowRole($role_id)->row_array();

		$data['menu'] = $this->menu->getMenu()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role_access', $data);
		$this->load->view('templates/footer');
	}

	public function change_access()
	{
		$menu_ID = $this->input->post('menuID');
		$role_ID = $this->input->post('roleID');

		$data = [
			'role_id' => $role_ID,
			'menu_id' => $menu_ID,
		];

		$akses = $this->db->get_where('user_access_menu', $data);

		if ($akses->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed!</div>');
	}

	public function update()
	{
		if ($this->input->post()) {
			$post = $this->input->post();

			$id = $post['id'];

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit menu failed!</div>');
				redirect('admin/edit_user', 'refresh');
			} else {
				$go = $this->admin->update($id, $post);

				if ($go) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
					redirect('admin/list_user', 'refresh');
				} else {
					redirect('admin/list_user', 'refresh');
				}
			}
		}
	}

	public function delete($id)
	{
		$this->admin->get_row($id);

		$this->admin->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete menu success</div>');

		redirect('admin/list_user', 'refresh');
	}

	public function deleteInv($id)
	{
		$this->inv->get_row_inv($id);

		$this->inv->delete_inv($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete breakdown success</div>');

		redirect('admin/inv', 'refresh');
	}

	public function delete_expl($id)
	{
		$this->expl->get_row_expl($id);

		$this->expl->delete_expl($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete breakdown success</div>');

		redirect('admin/expl', 'refresh');
	}

	public function delete_expl_nonit($id)
	{
		$this->expl_nonit->get_row_expl_nonit($id);

		$this->expl_nonit->delete_data($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete breakdown success</div>');


		redirect('admin/expl_nonit', 'refresh');
	}

	public function excel_inv()
	{
		$data = array(
			'title' => "Daftar Breakdown RKA",
			'inv' => $this->inv->get_inv_all(),
		);

		$this->load->view('investasi/excel_inv', $data);
	}

	public function excel_expl()
	{
		$data = array(
			'title' => "Daftar Breakdown RKA",
			'expl' => $this->expl->get_expl_all(),
		);

		$this->load->view('eksploitasi/excel_expl', $data);
	}

	public function excel_expl_nonit()
	{
		$data = array(
			'title' => "Daftar Breakdown Non IT",
			'nonit' => $this->expl_nonit->get_nonit_all(),
		);

		$this->load->view('admin/excel_nonit', $data);
	}

	public function excel_filter_inv()
	{
		$data = array(
			'title' => "Daftar Breakdown RKA",
		);

		$this->load->view('investasi/excel_filter_inv', $data);
	}

	public function excel_filter_expl()
	{
		$data = array(
			'title' => "Daftar Breakdown RKA",
		);

		$this->load->view('eksploitasi/excel_filter_expl', $data);
	}

	public function excel_filter_nonit()
	{
		$data = array(
			'title' => "Daftar Breakdown RKA",
		);

		$this->load->view('admin/excel_filter_nonit', $data);
	}

	public function excel_monitoring_inv()
	{
		error_reporting(0);
		$data = array(
			'title' => "Daftar Monitoring RKA Investasi",
			'inv' => $this->pengadaan->get_monitoring_hw()->result_array(),
			'hw' => $this->inv->get_hardware_inv()->result_array(),
			'sw' => $this->inv->get_software_inv()->result_array(),
		);

		$this->load->view('admin/excel_monitoring_inv', $data);
	}

	public function excel_monitoring_expl()
	{
		error_reporting(0);
		$data = array(
			'title' => "Daftar Monitoring RKA Eksploitasi",
			'nonit' => $this->expl->get_nonit()->result_array(),
			'monit1' => $this->expl->get_monitoring_nonit()->result_array(),
			'it1' => $this->expl->get_it1()->result_array(),
			'it2' => $this->expl->get_it2()->result_array(),
			'it3' => $this->expl->get_it3()->result_array(),
			'it4' => $this->expl->get_it4()->result_array(),
			'it5' => $this->expl->get_it5()->result_array(),
			'it6' => $this->expl->get_it6()->result_array(),
			'it7' => $this->expl->get_it7()->result_array(),
			'mon_it1' => $this->expl->get_mon_it1()->result_array(),
			'mon_it2' => $this->expl->get_mon_it2()->result_array(),
			'mon_it3' => $this->expl->get_mon_it3()->result_array(),
			'mon_it4' => $this->expl->get_mon_it4()->result_array(),
			'mon_it5' => $this->expl->get_mon_it5()->result_array(),
			'mon_it6' => $this->expl->get_mon_it6()->result_array(),
			'mon_it7' => $this->expl->get_mon_it7()->result_array(),
		);

		$this->load->view('admin/excel_monitoring_expl', $data);
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
