<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('User_model', 'user');
		$this->load->model('Inv_model', 'inv');
		$this->load->model('Expl_model', 'expl');
		$this->load->model('Pengadaan_model', 'pengadaan');
	}

	public function index()
	{
		error_reporting(0);
		$data['title'] = "Dashboard User";

		$data['user'] = $this->user->get_user()->row_array();
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
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
	}

	public function search_inv()
	{
		error_reporting(0);
		$keyword = $this->input->post('keyword');
		$data['title'] = "Hasil Pencarian Pengadaan Investasi";
		$data['user'] = $this->user->get_user()->row_array();
		$data['key'] = $this->pengadaan->get_keyword_inv($keyword);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/search_inv', $data);
		$this->load->view('templates/footer');
	}

	public function search_expl()
	{
		error_reporting(0);
		$keyword = $this->input->post('keyword');
		$data['title'] = "Hasil Pencarian Pengadaan Eksploitasi";
		$data['user'] = $this->user->get_user()->row_array();
		$data['key'] = $this->pengadaan->get_keyword_expl($keyword);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/search_expl', $data);
		$this->load->view('templates/footer');
	}

	public function search_expl_nonit()
	{
		error_reporting(0);
		$keyword = $this->input->post('keyword');
		$data['title'] = "Hasil Pencarian Pengadaan Eksploitasi";
		$data['user'] = $this->user->get_user()->row_array();
		$data['key'] = $this->pengadaan->get_keyword_expl_nonit($keyword);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/search_expl_nonit', $data);
		$this->load->view('templates/footer');
	}

	public function list_kategori_expl()
	{
		$kode_jenis = $this->input->post('kode_jenis');

		$kategori = $this->pengadaan->viewbyjenis_expl($kode_jenis);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Select</option>";

		foreach ($kategori as $data) {
			$lists .= "<option value='" . $data->kode_kategori . "'>" . $data->kategori . '</option>'; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_kategori' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function list_kegiatan_expl()
	{
		$kode_kategori = $this->input->post('kode_kategori');

		$kegiatan = $this->pengadaan->viewbykategori_expl($kode_kategori);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Select</option>";

		foreach ($kegiatan as $data) {
			$lists .= "<option value='" . $data->kode_kegiatan . "'>" . $data->kegiatan . '</option>'; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_kegiatan' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function pengadaan_inv($id = '')
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('user/pengadaan_inv'); //site url
		$config['total_rows'] = $this->db->count_all('pengadaan'); //total row
		$config['per_page'] = 5; //show record per halaman
		$config['uri_segment'] = 3; // uri parameter
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
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

		$data['title'] = "Pengadaan Investasi";

		$data['user'] = $this->user->get_user()->row_array();
		$data['list'] = $this->pengadaan->get_all_pengadaan_inv($config['per_page'], $data['page'])->result_array();
		$data['anggaran'] = $this->pengadaan->get_anggaran_inv($id);
		$data['jenis'] = $this->pengadaan->get_all_sub_inv()->result_array();

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/pengadaan_inv', $data);
		$this->load->view('templates/footer');
	}

	public function pengadaan_expl()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('user/pengadaan_expl'); //site url
		$config['total_rows'] = $this->db->count_all('pengadaan_expl'); //total row
		$config['per_page'] = 5; //show record per halaman
		$config['uri_segment'] = 3; // uri parameter
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
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

		$data['title'] = "Pengadaan Eksploitasi";
		$data['user'] = $this->user->get_user()->row_array();
		$data['list'] = $this->pengadaan->get_all_pengadaan_expl($config['per_page'], $data['page'])->result_array();
		$data['jenis'] = $this->pengadaan->get_all_sub_expl()->result_array();

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/pengadaan_expl', $data);
		$this->load->view('templates/footer');
	}

	public function peng_expl_nonit()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('user/peng_expl_nonit'); //site url
		$config['total_rows'] = $this->db->count_all('peng_expl_non_it'); //total row
		$config['per_page'] = 5; //show record per halaman
		$config['uri_segment'] = 3; // uri parameter
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
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

		$data['title'] = "Pengadaan Eksploitasi Non IT";
		$data['user'] = $this->user->get_user()->row_array();
		$data['list'] = $this->pengadaan->get_all_pengadaan_expl_nonit($config['per_page'], $data['page'])->result_array();
		$data['jenis'] = $this->pengadaan->get_all_expl_nonit()->result_array();

		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/peng_expl_nonit', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit_pengadaan_inv($id = '')
	{
		$data['title'] = "Edit Pengadaan Investasi";

		$data['row'] = $this->pengadaan->get_row_inv($id)->row_array();
		$data['yoyo'] = $this->pengadaan->get_row_inv($id);
		$data['user'] = $this->user->get_user()->row_array();
		//$data['list'] = $this->pengadaan->get_all_pengadaan_inv()->result_array();
		$data['jenis'] = $this->pengadaan->get_all_sub_inv()->result_array();

		$this->fitur = "Ubah";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/edit_inv', $data);
		$this->load->view('templates/footer');
	}

	public function edit_pengadaan_expl($id = '')
	{
		$data['title'] = "Edit Pengadaan Eksploitasi";

		$data['row'] = $this->pengadaan->get_row_expl($id)->row_array();
		$data['yoyo'] = $this->pengadaan->get_row_expl($id);
		$data['user'] = $this->user->get_user()->row_array();
		//$data['list'] = $this->pengadaan->get_all_pengadaan_expl()->result_array();
		$data['jenis'] = $this->pengadaan->get_all_sub_expl()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/edit_expl', $data);
		$this->load->view('templates/footer');
	}

	public function edit_pengadaan_expl_nonit($id = '')
	{
		$data['title'] = "Edit Pengadaan Eksploitasi Non IT";

		$data['row'] = $this->pengadaan->get_row_expl_nonit($id)->row_array();
		$data['yoyo'] = $this->pengadaan->get_row_expl_nonit($id);
		$data['user'] = $this->user->get_user()->row_array();
		//$data['list'] = $this->pengadaan->get_all_pengadaan_expl_nonit()->result_array();
		$data['jenis'] = $this->pengadaan->get_all_expl_nonit()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/edit_expl_nonit', $data);
		$this->load->view('templates/footer');
	}

	public function submit_inv()
	{
		error_reporting(0);
		if ($this->input->post()) {
			$id = $this->input->post('id');
			$pemutus = $this->input->post('pemutus');
			$uker = $this->input->post('uker');
			$no_ip = $this->input->post('no_ip');
			$tgl_ip = $this->input->post('tgl_ip');
			$kode_jenis = $this->input->post('kode_jenis');
			$kode = $this->input->post('kode_kegiatan');
			$rincian = $this->input->post('rincian');
			$nilai_ip = $this->input->post('nilai_ip');
			$year_now = $this->input->post('year_now');
			$jangka_waktu_awal = $this->input->post('jangka_waktu_awal');
			$jangka_waktu_akhir = $this->input->post('jangka_waktu_akhir');
			$nodin_pbj = $this->input->post('nodin_pbj');
			$tgl_nodin_pbj = $this->input->post('tgl_nodin_pbj');
			$no_spk = $this->input->post('no_spk');
			$tgl_spk = $this->input->post('tgl_spk');
			$vendor = $this->input->post('vendor');
			$nilai_spk = $this->input->post('nilai_spk');
			$spk_now = $this->input->post('spk_now');
			$jangka_awal_spk = $this->input->post('jangka_awal_spk');
			$jangka_akhir_spk = $this->input->post('jangka_akhir_spk');

			$nilai_ip_fix = str_replace('.', '', $nilai_ip);
			$year_now_fix = str_replace('.', '', $year_now);
			$nilai_spk_fix = str_replace('.', '', $nilai_spk);
			$spk_now_fix = str_replace('.', '', $spk_now);

			$this->form_validation->set_rules('no_ip', 'No. IP', 'required');
			$this->form_validation->set_rules('kode_jenis', 'Jenis Anggaran', 'required');
			$this->form_validation->set_rules('kode_kegiatan', 'Kegiatan', 'required');
			$this->form_validation->set_rules('nilai_ip', 'Nilai IP', 'required');

			$this->form_validation->set_error_delimiters('<li>', '</li>');

			if ($this->form_validation->run() == true) {
				$alokasi = $this->pengadaan->get_alokasi_inv($kode)->result_array();
				$alokasi_baru = $alokasi[0]['sisa_alokasi_baru'];
				$alokasi_carry_over = $alokasi[0]['sisa_alokasi_carry_over'];

				if (!empty($alokasi_baru)) {
					$hasil = ($alokasi_baru - $year_now_fix - $spk_now_fix);
					$data_hasil = array('sisa_alokasi_baru' => $hasil);
					//writelog('success', 'Pengadaan Berhasil');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Pengadaan Berhasil!</div>');
				} elseif (!empty($alokasi_carry_over)) {
					$hasil = ($alokasi_carry_over - $year_now_fix - $spk_now_fix);
					$data_hasil = array('sisa_alokasi_carry_over' => $hasil);
					//writelog('success', 'Pengadaan Berhasil');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Pengadaan Berhasil!</div>');
				}

				$this->pengadaan->updateGO('investasi', 'kode_kegiatan', $kode, $data_hasil);
			} else {
				//writelog('error', 'Tambah Data Baru Gagal. ' . validation_errors());
				//redirect(base_url($this->cname).'/add');
			}
			$data_pengadaan = array(
				'id' => $id,
				'pemutus' => $pemutus,
				'uker' => $uker,
				'no_ip' => $no_ip,
				'tgl_ip' => $tgl_ip,
				'kode_jenis' => $kode_jenis,
				'kode_kegiatan' => $kode,
				'rincian' => $rincian,
				'nilai_ip' => $nilai_ip_fix,
				'year_now' => $year_now_fix,
				'jangka_waktu_awal' => $jangka_waktu_awal,
				'jangka_waktu_akhir' => $jangka_waktu_akhir,
				'nodin_pbj' => $nodin_pbj,
				'tgl_nodin_pbj' => $tgl_nodin_pbj,
				'no_spk' => $no_spk,
				'tgl_spk' => $tgl_spk,
				'nilai_spk' => $nilai_spk_fix,
				'spk_now' => $spk_now_fix,
				'jangka_awal_spk' => $jangka_awal_spk,
				'jangka_akhir_spk' => $jangka_akhir_spk,
				'vendor' => $vendor,
				'user_pn' => $this->session->userdata('user_pn'),
				'files' => 'default.pdf',
			);

			$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : $_POST['tahun'];
			$anggaran = isset($_POST['anggaran']) ? $_POST['anggaran'] : $_POST['anggaran'];

			$this->pengadaan->add_inv($data_pengadaan);

			//$caridata = $this->pengadaan_inv->get_id_pengadaan($kode)->result_array();
			//$dataid = $caridata[0]['id'];

			foreach ($tahun as $key => $tahun) {
				$data_tahun_anggaran = array(
					'id' => uniqid(),
					'id_pengadaan_fk' => $id,
					'tahun' => $tahun,
					'anggaran' => $anggaran[$key],
				);

				$this->pengadaan->add_tahun_anggaran($data_tahun_anggaran);
			}

			$tahun_spk = isset($_POST['tahun_spk']) ? $_POST['tahun_spk'] : $_POST['tahun_spk'];
			$anggaran_spk = isset($_POST['anggaran_spk']) ? $_POST['anggaran_spk'] : $_POST['anggaran_spk'];

			foreach ($tahun_spk as $key => $tahun_spk) {
				$data_tahun_spk = array(
					'id' => uniqid(),
					'id_pengadaan_fk' => $id,
					'tahun_spk' => $tahun_spk,
					'anggaran_spk' => $anggaran_spk[$key],
				);

				$this->pengadaan->add_tahun_spk($data_tahun_spk);
			}
		}

		redirect('user/pengadaan_inv', 'refresh');
	}

	public function submit_expl()
	{
		error_reporting(0);
		if ($this->input->post()) {
			$id = $this->input->post('id');
			$pemutus = $this->input->post('pemutus');
			$uker = $this->input->post('uker');
			$no_ip = $this->input->post('no_ip');
			$tgl_ip = $this->input->post('tgl_ip');
			$kode_jenis = $this->input->post('kode_jenis');
			$kode_kategori = $this->input->post('kode_kategori');
			$kode = $this->input->post('kode_kegiatan');
			$rincian = $this->input->post('rincian');
			$nilai_ip = $this->input->post('nilai_ip');
			$year_now = $this->input->post('year_now');
			$jangka_waktu_awal = $this->input->post('jangka_waktu_awal');
			$jangka_waktu_akhir = $this->input->post('jangka_waktu_akhir');
			$nodin_pbj = $this->input->post('nodin_pbj');
			$tgl_nodin_pbj = $this->input->post('tgl_nodin_pbj');
			$no_spk = $this->input->post('no_spk');
			$tgl_spk = $this->input->post('tgl_spk');
			$vendor = $this->input->post('vendor');
			$nilai_spk = $this->input->post('nilai_spk');
			$spk_now = $this->input->post('spk_now');
			$jangka_awal_spk = $this->input->post('jangka_awal_spk');
			$jangka_akhir_spk = $this->input->post('jangka_akhir_spk');

			$nilai_ip_fix = str_replace('.', '', $nilai_ip);
			$year_now_fix = str_replace('.', '', $year_now);
			$nilai_spk_fix = str_replace('.', '', $nilai_spk);
			$spk_now_fix = str_replace('.', '', $spk_now);

			$this->form_validation->set_rules('no_ip', 'No. IP', 'required');
			$this->form_validation->set_rules('kode_jenis', 'Jenis Anggaran', 'required');
			$this->form_validation->set_rules('kode_kegiatan', 'Kegiatan', 'required');
			$this->form_validation->set_rules('nilai_ip', 'Nilai IP', 'required');

			$this->form_validation->set_error_delimiters('<li>', '</li>');

			if ($this->form_validation->run() == true) {
				$alokasi = $this->pengadaan->get_alokasi_expl($kode)->result_array();
				$alokasi_baru = $alokasi[0]['sisa_alokasi_baru'];
				$alokasi_carry_over = $alokasi[0]['sisa_alokasi_carry_over'];

				if (!empty($alokasi_baru)) {
					$hasil = ($alokasi_baru - $year_now_fix - $spk_now_fix);
					$data_hasil = array('sisa_alokasi_baru' => $hasil);
					//writelog('success', 'Pengadaan Berhasil');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Pengadaan Berhasil!</div>');
					//flash_succ('Proses Pengadaan Berhasil');
				} elseif (!empty($alokasi_carry_over)) {
					$hasil = ($alokasi_carry_over - $year_now_fix - $spk_now_fix);
					$data_hasil = array('sisa_alokasi_carry_over' => $hasil);
					//writelog('success', 'Pengadaan Berhasil');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Pengadaan Berhasil!</div>');
				}

				$this->pengadaan->updateGO('eksploitasi', 'kode_kegiatan', $kode, $data_hasil);
			} else {
				//writelog('error', 'Tambah Data Baru Gagal. ' . validation_errors());
				//flash_err('Tambah Data Baru Gagal. <ul>' . validation_errors() . '</ul>');
				//redirect(base_url($this->cname).'/add');
			}

			$data_pengadaan = array(
				'id' => $id,
				'pemutus' => $pemutus,
				'uker' => $uker,
				'no_ip' => $no_ip,
				'tgl_ip' => $tgl_ip,
				'kode_jenis' => $kode_jenis,
				'kode_kategori' => $kode_kategori,
				'kode_kegiatan' => $kode,
				'rincian' => $rincian,
				'nilai_ip' => $nilai_ip_fix,
				'year_now' => $year_now_fix,
				'jangka_waktu_awal' => $jangka_waktu_awal,
				'jangka_waktu_akhir' => $jangka_waktu_akhir,
				'nodin_pbj' => $nodin_pbj,
				'tgl_nodin_pbj' => $tgl_nodin_pbj,
				'no_spk' => $no_spk,
				'tgl_spk' => $tgl_spk,
				'vendor' => $vendor,
				'nilai_spk' => $nilai_spk_fix,
				'spk_now' => $spk_now_fix,
				'jangka_awal_spk' => $jangka_awal_spk,
				'jangka_akhir_spk' => $jangka_akhir_spk,
				'user_pn' => $this->session->userdata('user_pn'),
				'files' => 'default.pdf',
			);

			$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : $_POST['tahun'];
			$anggaran = isset($_POST['anggaran']) ? $_POST['anggaran'] : $_POST['anggaran'];

			$idPengadaan = $this->pengadaan->add_expl($data_pengadaan);

			//$caridata = $this->pengadaan_inv->get_id_pengadaan($kode)->result_array();
			//$dataid = $caridata[0]['id'];

			foreach ($tahun as $key => $tahun) {
				$data_tahun_anggaran = array(
					'id' => uniqid(),
					'id_pengadaan_expl_fk' => $id,
					'tahun' => $tahun,
					'anggaran' => $anggaran[$key],
				);

				$this->pengadaan->add_tahun_anggaran_expl($data_tahun_anggaran);
			}

			$tahun_spk = isset($_POST['tahun_spk']) ? $_POST['tahun_spk'] : $_POST['tahun_spk'];
			$anggaran_spk = isset($_POST['anggaran_spk']) ? $_POST['anggaran_spk'] : $_POST['anggaran_spk'];

			foreach ($tahun_spk as $key => $tahun_spk) {
				$data_tahun_spk = array(
					'id' => uniqid(),
					'id_pengadaan_expl_fk' => $id,
					'tahun_spk' => $tahun_spk,
					'anggaran_spk' => $anggaran_spk[$key],
				);

				$this->pengadaan->add_tahun_spk_expl($data_tahun_spk);
			}
		}

		redirect('user/pengadaan_expl', 'refresh');
	}

	public function submit_expl_nonit()
	{
		error_reporting(0);
		if ($this->input->post()) {
			$id = $this->input->post('id');
			$no_ip = $this->input->post('no_ip');
			$tgl_ip = $this->input->post('tgl_ip');
			$no_gl = $this->input->post('no_gl');
			$rincian = $this->input->post('rincian');
			$nilai_ip = $this->input->post('nilai_ip');
			$year_now = $this->input->post('year_now');
			$nilai_memo = $this->input->post('nilai_memo');
			$jngka_waktu_awal = $this->input->post('jngka_waktu_awal');
			$jngka_waktu_akhir = $this->input->post('jngka_waktu_akhir');
			$no_spk = $this->input->post('no_spk');
			$tgl_spk = $this->input->post('tgl_spk');
			$vendor = $this->input->post('vendor');
			$nilai_spk = $this->input->post('nilai_spk');
			$spk_now = $this->input->post('spk_now');
			$nilai_memo_spk = $this->input->post('nilai_memo_spk');
			$jngka_awal_spk = $this->input->post('jngka_awal_spk');
			$jngka_akhir_spk = $this->input->post('jngka_akhir_spk');

			$nilai_ip_fix = str_replace('.', '', $nilai_ip);
			$year_now_fix = str_replace('.', '', $year_now);
			$nilai_memo_fix = str_replace('.', '', $nilai_memo);
			$nilai_spk_fix = str_replace('.', '', $nilai_spk);
			$spk_now_fix = str_replace('.', '', $spk_now);
			$nilai_memo_spk_fix = str_replace('.', '', $nilai_memo_spk);

			$this->form_validation->set_rules('no_ip', 'No IP', 'required');
			$this->form_validation->set_rules('no_gl', 'No GL', 'required');

			$this->form_validation->set_error_delimiters('<li>', '</li>');


			if ($this->form_validation->run() == TRUE) {
				$alokasi = $this->pengadaan->get_alokasi_expl_nonit($no_gl)->result_array();
				$sisa_alokasi = $alokasi[0]['sisa_alokasi'];

				if (!empty($sisa_alokasi)) {
					$hasil = ($sisa_alokasi - $year_now_fix - $spk_now_fix);
					$data_hasil = array('sisa_alokasi' => $hasil);
					//writelog('success', 'Pengadaan Berhasil');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Pengadaan Berhasil!</div>');
				}
				$this->pengadaan->updateGO('expl_non_it', 'no_gl', $no_gl, $data_hasil);
			} else {

				redirect('user/peng_expl_nonit', 'refresh');
			}

			$post = array(
				'id' => $id,
				'no_ip' => $no_ip,
				'tgl_ip' => $tgl_ip,
				'no_gl' => $no_gl,
				'rincian' => $rincian,
				'nilai_ip' => $nilai_ip_fix,
				'year_now' => $year_now_fix,
				'nilai_memo' => $nilai_memo_fix,
				'jngka_waktu_awal' => $jngka_waktu_awal,
				'jngka_waktu_akhir' => $jngka_waktu_akhir,
				'no_spk' => $no_spk,
				'tgl_spk' => $tgl_spk,
				'vendor' => $vendor,
				'nilai_spk' => $nilai_spk_fix,
				'spk_now' => $spk_now_fix,
				'nilai_memo_spk' => $nilai_memo_spk_fix,
				'jngka_awal_spk' => $jngka_awal_spk,
				'jngka_akhir_spk' => $jngka_akhir_spk,
				'user_pn' => $this->session->userdata('user_pn'),
				'files' => 'default.pdf',
			);

			$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : $_POST['tahun'];
			$anggaran = isset($_POST['anggaran']) ? $_POST['anggaran'] : $_POST['anggaran'];

			$this->pengadaan->add_expl_nonit($post);

			foreach ($tahun as $key => $tahun) {
				$data_tahun_anggaran = array(
					'id' => uniqid(),
					'id_pengadaan_fk' => $id,
					'tahun' => $tahun,
					'anggaran' => $anggaran[$key],
				);
				$this->pengadaan->add_tahun_anggaran_expl_nonit($data_tahun_anggaran);
			}

			$tahun_spk = isset($_POST['tahun_spk']) ? $_POST['tahun_spk'] : $_POST['tahun_spk'];
			$anggaran_spk = isset($_POST['anggaran_spk']) ? $_POST['anggaran_spk'] : $_POST['anggaran_spk'];

			foreach ($tahun_spk as $key => $tahun_spk) {
				$data_tahun_spk = array(
					'id' => uniqid(),
					'id_pengadaan_fk' => $id,
					'tahun_spk' => $tahun_spk,
					'anggaran_spk' => $anggaran_spk[$key],
				);

				$this->pengadaan->add_tahun_spk_expl_nonit($data_tahun_spk);
			}
		}
		redirect('user/peng_expl_nonit', 'refresh');
	}

	public function update_inv()
	{
		error_reporting(0);
		if ($this->input->post()) {
			$id = $this->input->post('id');
			$pemutus = $this->input->post('pemutus');
			$uker = $this->input->post('uker');
			$no_ip = $this->input->post('no_ip');
			$tgl_ip = $this->input->post('tgl_ip');
			$kode_jenis = $this->input->post('kode_jenis');
			$kode = $this->input->post('kode_kegiatan');
			$rincian = $this->input->post('rincian');
			$nilai_ip = $this->input->post('nilai_ip');
			$year_now = $this->input->post('year_now');
			$jangka_waktu_awal = $this->input->post('jangka_waktu_awal');
			$jangka_waktu_akhir = $this->input->post('jangka_waktu_akhir');
			$nodin_pbj = $this->input->post('nodin_pbj');
			$tgl_nodin_pbj = $this->input->post('tgl_nodin_pbj');
			$no_spk = $this->input->post('no_spk');
			$tgl_spk = $this->input->post('tgl_spk');
			$nilai_spk = $this->input->post('nilai_spk');
			$spk_now = $this->input->post('spk_now');
			$jangka_awal_spk = $this->input->post('jangka_awal_spk');
			$jangka_akhir_spk = $this->input->post('jangka_akhir_spk');
			$vendor = $this->input->post('vendor');

			$nilai_ip_fix = str_replace('.', '', $nilai_ip);
			$year_now_fix = str_replace('.', '', $year_now);
			$nilai_spk_fix = str_replace('.', '', $nilai_spk);
			$spk_now_fix = str_replace('.', '', $spk_now);

			/*$data['pengadaan'] = $this->db->get_where('pengadaan', ['id' => $id])->row_array();

			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '5120';
			$config['upload_path'] = './assets/files/documents/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('files')) {

				$old_image = $data['pengadaan']['files'];
				if ($old_image != 'default.pdf') {
					unlink(FCPATH . 'assets/files/documents/' . $old_image);
				}

				$newimg = $this->upload->data('file_name');

				$this->db->set('files', $newimg);
			} else {
				echo $this->upload->display_errors();
			}
			$this->db->where('id', $id);
			$this->db->update('pengadaan');*/

			$post = array(
				'pemutus' => $pemutus,
				'uker' => $uker,
				'no_ip' => $no_ip,
				'tgl_ip' => $tgl_ip,
				'kode_jenis' => $kode_jenis,
				'kode_kegiatan' => $kode,
				'rincian' => $rincian,
				'nilai_ip' => $nilai_ip_fix,
				'year_now' => $year_now_fix,
				'jangka_waktu_awal' => $jangka_waktu_awal,
				'jangka_waktu_akhir' => $jangka_waktu_akhir,
				'nodin_pbj' => $nodin_pbj,
				'tgl_nodin_pbj' => $tgl_nodin_pbj,
				'no_spk' => $no_spk,
				'tgl_spk' => $tgl_spk,
				'nilai_spk' => $nilai_spk_fix,
				'spk_now' => $spk_now_fix,
				'jangka_awal_spk' => $jangka_awal_spk,
				'jangka_akhir_spk' => $jangka_akhir_spk,
				'vendor' => $vendor,
			);

			$kode = $post['kode_kegiatan'];

			$this->form_validation->set_rules('no_ip', 'No IP', 'trim|required');
			$this->form_validation->set_rules('kode_kegiatan', 'Kegiatan', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit Breakdown failed!</div>');
				redirect('user/edit_pengadaan_inv', 'refresh');
			} else {
				$no_fiat = isset($_POST['no_fiat']) ? $_POST['no_fiat'] : $_POST['no_fiat'];
				$tgl_fiat = isset($_POST['tgl_fiat']) ? $_POST['tgl_fiat'] : $_POST['tgl_fiat'];
				$total = isset($_POST['total']) ? $_POST['total'] : $_POST['total'];
				$status_rc = isset($_POST['status_rc']) ? $_POST['status_rc'] : $_POST['status_rc'];
				$tgl_rc = isset($_POST['tgl_rc']) ? $_POST['tgl_rc'] : $_POST['tgl_rc'];

				$tahun = isset($_POST['tahun']) ? $_POST['tahun'] : $_POST['tahun'];
				$anggaran = isset($_POST['anggaran']) ? $_POST['anggaran'] : $_POST['anggaran'];

				$tahun_spk = isset($_POST['tahun_spk']) ? $_POST['tahun_spk'] : $_POST['tahun_spk'];
				$anggaran_spk = isset($_POST['anggaran_spk']) ? $_POST['anggaran_spk'] : $_POST['anggaran_spk'];

				$sum = array_sum($total);

				if ($sum >= $nilai_spk_fix) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Total Fiat lebih besar dari total SPK!!!</div>');

					redirect('user/pengadaan_inv', 'refresh');
				} else {
					foreach ($tahun as $key => $tahun) {
						$data_tahun_anggaran = array(
							'id' => uniqid(),
							'id_pengadaan_fk' => $id,
							'tahun' => $tahun,
							'anggaran' => $anggaran[$key],
						);

						$this->pengadaan->add_tahun_anggaran($data_tahun_anggaran);
					}

					foreach ($tahun_spk as $key => $tahun_spk) {
						$data_tahun_spk = array(
							'id' => uniqid(),
							'id_pengadaan_fk' => $id,
							'tahun_spk' => $tahun_spk,
							'anggaran_spk' => $anggaran_spk[$key],
						);

						$this->pengadaan->add_tahun_spk($data_tahun_spk);
					}

					foreach ($no_fiat as $key => $no_fiat) {
						$data_fiat = array(
							'id' => uniqid(),
							'id_pengadaan_fk' => $id,
							'no_fiat' => $no_fiat,
							'tgl_fiat' => $tgl_fiat[$key],
							'total' => $total[$key],
							'status_rc' => $status_rc[$key],
							'tgl_rc' => $tgl_rc[$key],
						);
						$this->pengadaan->add_fiat_inv($data_fiat);
					}

					foreach ($data_fiat as $a) {
						$data_fiat['total'] = $a;
					}

					$alokasi = $this->pengadaan->get_alokasi_inv($kode)->result_array();
					$alokasi_baru = $alokasi[0]['sisa_alokasi_baru'];
					$alokasi_carry_over = $alokasi[0]['sisa_alokasi_carry_over'];

					if (!empty($alokasi_baru)) {
						$hasil = ($alokasi_baru - $sum);
						$data_hasil = array('sisa_alokasi_baru' => $hasil);
						//writelog('success', 'Pengadaan Berhasil');
						//flash_succ('Proses Pengadaan Berhasil');
					} elseif (!empty($alokasi_carry_over)) {
						$hasil = ($alokasi_carry_over - $sum);
						$data_hasil = array('sisa_alokasi_carry_over' => $hasil);
						//writelog('success', 'Pengadaan Berhasil');
						//flash_succ('Proses Pengadaan Berhasil');
					}
					$this->pengadaan->updateGO('investasi', 'kode_kegiatan', $kode, $data_hasil);

					$go = $this->pengadaan->update_inv($id, $post);

					if ($go) {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
						redirect('user/pengadaan_inv', 'refresh');
					} else {
						redirect('user/pengadaan_inv', 'refresh');
					}
				}
				//print_r($total);

			}
		}
	}

	public function update_expl()
	{
		error_reporting(0);
		if ($this->input->post()) {
			$id = $this->input->post('id');
			$pemutus = $this->input->post('pemutus');
			$uker = $this->input->post('uker');
			$no_ip = $this->input->post('no_ip');
			$tgl_ip = $this->input->post('tgl_ip');
			$kode_jenis = $this->input->post('kode_jenis');
			$kode_kategori = $this->input->post('kode_kategori');
			$kode = $this->input->post('kode_kegiatan');
			$rincian = $this->input->post('rincian');
			$nilai_ip = $this->input->post('nilai_ip');
			$year_now = $this->input->post('year_now');
			$jangka_waktu_awal = $this->input->post('jangka_waktu_awal');
			$jangka_waktu_akhir = $this->input->post('jangka_waktu_akhir');
			$nodin_pbj = $this->input->post('nodin_pbj');
			$tgl_nodin_pbj = $this->input->post('tgl_nodin_pbj');
			$no_spk = $this->input->post('no_spk');
			$nilai_spk = $this->input->post('nilai_spk');
			$spk_now = $this->input->post('spk_now');
			$tgl_spk = $this->input->post('tgl_spk');
			$vendor = $this->input->post('vendor');

			$nilai_ip_fix = str_replace('.', '', $nilai_ip);
			$year_now_fix = str_replace('.', '', $year_now);
			$nilai_spk_fix = str_replace('.', '', $nilai_spk);
			$spk_now_fix = str_replace('.', '', $spk_now);

			$data['pengadaan_expl'] = $this->db->get_where('pengadaan_expl', ['id' =>
			$id])->row_array();

			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '5120';
			$config['upload_path'] = './assets/files/documents/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('files')) {

				$old_image = $data['pengadaan_expl']['files'];
				if ($old_image != 'default.pdf') {
					unlink(FCPATH . 'assets/files/documents/' . $old_image);
				}

				$newimg = $this->upload->data('file_name');

				$this->db->set('files', $newimg);
			} else {
				echo $this->upload->display_errors();
			}
			$this->db->where('id', $id);
			$this->db->update('pengadaan_expl');

			$post = array(
				'pemutus' => $pemutus,
				'uker' => $uker,
				'no_ip' => $no_ip,
				'tgl_ip' => $tgl_ip,
				'kode_jenis' => $kode_jenis,
				'kode_kategori' => $kode_kategori,
				'kode_kegiatan' => $kode,
				'rincian' => $rincian,
				'nilai_ip' => $nilai_ip_fix,
				'year_now' => $year_now_fix,
				'jangka_waktu_awal' => $jangka_waktu_awal,
				'jangka_waktu_akhir' => $jangka_waktu_akhir,
				'nodin_pbj' => $nodin_pbj,
				'tgl_nodin_pbj' => $tgl_nodin_pbj,
				'no_spk' => $no_spk,
				'nilai_spk' => $nilai_spk_fix,
				'spk_now' => $spk_now_fix,
				'tgl_spk' => $tgl_spk,
				'vendor' => $vendor,
			);

			$id = $this->input->post('id');
			$kode = $post['kode_kegiatan'];

			$this->form_validation->set_rules('no_ip', 'NO. IP', 'required');
			$this->form_validation->set_rules('kode_kegiatan', 'Kode Kegiatan', 'required');

			$this->form_validation->set_error_delimiters('<li>', '</li>');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit Breakdown failed!</div>');
				redirect('user/edit_pengadaan_expl', 'refresh');
			} else {
				$no_fiat = isset($_POST['no_fiat']) ? $_POST['no_fiat'] : $_POST['no_fiat'];
				$tgl_fiat = isset($_POST['tgl_fiat']) ? $_POST['tgl_fiat'] : $_POST['tgl_fiat'];
				$total = isset($_POST['total']) ? $_POST['total'] : $_POST['total'];
				$status_rc = isset($_POST['status_rc']) ? $_POST['status_rc'] : $_POST['status_rc'];
				$tgl_rc = isset($_POST['tgl_rc']) ? $_POST['tgl_rc'] : $_POST['tgl_rc'];

				$sum = array_sum($total);

				if ($sum >= $nilai_spk_fix) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Total Fiat lebih besar dari total SPK!!!</div>');

					redirect('user/pengadaan_expl', 'refresh');
				} else {
					foreach ($no_fiat as $key => $no_fiat) {
						$data_fiat = array(
							'id' => uniqid(),
							'id_pengadaan_expl_fk' => $id,
							'no_fiat' => $no_fiat,
							'tgl_fiat' => $tgl_fiat[$key],
							'total' => $total[$key],
							'status_rc' => $status_rc[$key],
							'tgl_rc' => $tgl_rc[$key],
						);

						$this->pengadaan->add_fiat_expl($data_fiat);
					}

					foreach ($data_fiat as $a) {
						$data_fiat['total'] = $a;
					}

					$alokasi = $this->pengadaan->get_alokasi_expl($kode)->result_array();
					$alokasi_baru = $alokasi[0]['sisa_alokasi_baru'];
					$alokasi_carry_over = $alokasi[0]['sisa_alokasi_carry_over'];

					if (!empty($alokasi_baru)) {
						$hasil = ($alokasi_baru - $sum);
						$data_hasil = array('sisa_alokasi_baru' => $hasil);
						//writelog('success', 'Pengadaan Berhasil');
						//flash_succ('Proses Pengadaan Berhasil');
					} elseif (!empty($alokasi_carry_over)) {
						$hasil = ($alokasi_carry_over - $sum);
						$data_hasil = array('sisa_alokasi_carry_over' => $hasil);
						//writelog('success', 'Pengadaan Berhasil');
						//flash_succ('Proses Pengadaan Berhasil');
					}
					$this->pengadaan->updateGO('eksploitasi', 'kode_kegiatan', $kode, $data_hasil);

					$go = $this->pengadaan->updateexpl($id, $post);

					if ($go) {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
						redirect('user/pengadaan_expl', 'refresh');
					} else {
						redirect('user/pengadaan_expl', 'refresh');
					}
				}
			}
		}
	}

	public function update_expl_nonit()
	{
		if ($this->input->post()) {
			$id = $this->input->post('id');
			$no_ip = $this->input->post('no_ip');
			$tgl_ip = $this->input->post('tgl_ip');
			$no_gl = $this->input->post('no_gl');
			$rincian = $this->input->post('rincian');
			$nilai_ip = $this->input->post('nilai_ip');
			$year_now = $this->input->post('year_now');
			$nilai_memo = $this->input->post('nilai_memo');
			$jngka_waktu_awal = $this->input->post('jngka_waktu_awal');
			$jngka_waktu_akhir = $this->input->post('jngka_waktu_akhir');
			$no_spk = $this->input->post('no_spk');
			$tgl_spk = $this->input->post('tgl_spk');
			$vendor = $this->input->post('vendor');
			$nilai_spk = $this->input->post('nilai_spk');
			$spk_now = $this->input->post('spk_now');
			$nilai_memo_spk = $this->input->post('nilai_memo_spk');
			$jngka_awal_spk = $this->input->post('jngka_awal_spk');
			$jngka_akhir_spk = $this->input->post('jngka_akhir_spk');

			$nilai_ip_fix = str_replace('.', '', $nilai_ip);
			$year_now_fix = str_replace('.', '', $year_now);
			$nilai_memo_fix = str_replace('.', '', $nilai_memo);
			$nilai_spk_fix = str_replace('.', '', $nilai_spk);
			$spk_now_fix = str_replace('.', '', $spk_now);
			$nilai_memo_spk_fix = str_replace('.', '', $nilai_memo_spk);

			$data['peng_expl_nonit'] = $this->db->get_where('peng_expl_non_it', ['id' =>
			$id])->row_array();

			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '5120';
			$config['upload_path'] = './assets/files/documents/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('files')) {

				$old_image = $data['peng_expl_nonit']['files'];
				if ($old_image != 'default.pdf') {
					unlink(FCPATH . 'assets/files/documents/' . $old_image);
				}

				$newimg = $this->upload->data('file_name');

				$this->db->set('files', $newimg);
			} else {
				echo $this->upload->display_errors();
			}
			$this->db->where('id', $id);
			$this->db->update('peng_expl_non_it');

			$post = array(
				'no_ip' => $no_ip,
				'tgl_ip' => $tgl_ip,
				'no_gl' => $no_gl,
				'rincian' => $rincian,
				'nilai_ip' => $nilai_ip_fix,
				'year_now' => $year_now_fix,
				'nilai_memo' => $nilai_memo_fix,
				'jngka_waktu_awal' => $jngka_waktu_awal,
				'jngka_waktu_akhir' => $jngka_waktu_akhir,
				'no_spk' => $no_spk,
				'tgl_spk' => $tgl_spk,
				'vendor' => $vendor,
				'nilai_spk' => $nilai_spk_fix,
				'spk_now' => $spk_now_fix,
				'nilai_memo_spk' => $nilai_memo_spk_fix,
				'jngka_awal_spk' => $jngka_awal_spk,
				'jngka_akhir_spk' => $jngka_akhir_spk,
			);

			$id = $this->input->post('id');
			$no_gl = $post['no_gl'];

			$this->form_validation->set_rules('no_ip', 'No IP', 'required');
			$this->form_validation->set_rules('no_gl', 'No GL', 'required');

			$this->form_validation->set_error_delimiters('<li>', '</li>');


			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit Breakdown failed!</div>');
				redirect('user/edit_pengadaan_expl_nonit', 'refresh');
			} else {
				$no_fiat = isset($_POST['no_fiat']) ? $_POST['no_fiat'] : $_POST['no_fiat'];
				$tgl_fiat = isset($_POST['tgl_fiat']) ? $_POST['tgl_fiat'] : $_POST['tgl_fiat'];
				$total = isset($_POST['total']) ? $_POST['total'] : $_POST['total'];
				$nilai_tabanan = isset($_POST['nilai_tabanan']) ? $_POST['nilai_tabanan'] : $_POST['nilai_tabanan'];
				$status_rc = isset($_POST['status_rc']) ? $_POST['status_rc'] : $_POST['status_rc'];
				$tgl_rc = isset($_POST['tgl_rc']) ? $_POST['tgl_rc'] : $_POST['tgl_rc'];

				$sum = array_sum($total);
				$sum_tabanan = array_sum($nilai_tabanan);

				if ($sum >= $nilai_spk_fix) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Total Fiat lebih besar dari total SPK!!!</div>');

					redirect('user/peng_expl_nonit', 'refresh');
				} else {
					foreach ($no_fiat as $key => $no_fiat) {
						$data_fiat = array(
							'id' => uniqid(),
							'id_pengadaan_fk' => $id,
							'no_fiat' => $no_fiat,
							'tgl_fiat' => $tgl_fiat[$key],
							'total' => $total[$key],
							'nilai_tabanan' => $nilai_tabanan[$key],
							'status_rc' => $status_rc[$key],
							'tgl_rc' => $tgl_rc[$key],
						);

						$this->pengadaan->add_fiat_expl_nonit($data_fiat);
					}

					foreach ($data_fiat as $a) {
						$data_fiat['total'] = $a;
					}

					$alokasi = $this->pengadaan->get_alokasi_expl_nonit($no_gl)->result_array();
					$sisa_alokasi = $alokasi[0]['sisa_alokasi'];

					if (!empty($sisa_alokasi)) {
						$hasil = ($sisa_alokasi - $sum);
						$data_hasil = array('sisa_alokasi' => $hasil);
						//writelog('success', 'Pengadaan Berhasil');
						//flash_succ('Proses Pengadaan Berhasil');
					}
					$this->pengadaan->updateGO('expl_non_it', 'no_gl', $no_gl, $data_hasil);

					$go = $this->pengadaan->update_expl_nonit($id, $post);

					if ($go) {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
						redirect('user/peng_expl_nonit', 'refresh');
					} else {
						redirect('user/peng_expl_nonit', 'refresh');
					}
				}
			}
		}
	}

	public function list_kegiatan()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$kode_jenis = $this->input->post('kode_jenis');

		$kegiatan = $this->pengadaan->viewbyjenis($kode_jenis);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>-SELECT-</option>";

		foreach ($kegiatan as $data) {
			$lists .= "<option value='" . $data['kode_kegiatan'] . "'>" . $data['kegiatan'] . '</option>'; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_kegiatan' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON

	}

	public function delete_inv($id)
	{
		$this->pengadaan->get_row_inv($id);

		$this->pengadaan->delete_inv($id);

		redirect('user/pengadaan_inv', 'refresh');
	}

	public function delete_expl($id)
	{
		$this->pengadaan->get_row_expl($id);

		$this->pengadaan->delete_expl($id);

		redirect('user/pengadaan_expl', 'refresh');
	}

	public function delete_expl_nonit($id)
	{
		$this->pengadaan->get_row_expl_nonit($id);

		$this->pengadaan->delete_expl_nonit($id);


		redirect('user/peng_expl_nonit', 'refresh');
	}

	public function edit_profile()
	{
		$data['title'] = "Edit Profile";

		$data['user'] = $this->db->get_where('user', ['user_pn' =>
		$this->session->userdata('user_pn')])->row_array();

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/footer');
		} else {
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');

			//cek jika ada foto
			$upload = $_FILES['image']['name'];

			if ($upload) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {

					$old_image = $data['user']['image'];
					if ($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$newimg = $this->upload->data('file_name');

					$this->db->set('image', $newimg);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->db->set('firstname', $firstname);
			$this->db->set('lastname', $lastname);
			$this->db->where('email', $this->input->post('email'));
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update data success!</div>');
			redirect('user', 'refresh');
		}
	}

	public function change_password()
	{
		$data['title'] = "Change Password";

		$data['user'] = $this->db->get_where('user', ['user_pn' =>
		$this->session->userdata('user_pn')])->row_array();

		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
		$this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[5]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Repeat Password', 'trim|required|min_length[5]|matches[new_password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/change_password', $data);
			$this->load->view('templates/footer');
		} else {
			$current_password = $this->input->post('current_password');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Wrong current password!</div>');
				redirect('user/change_password', 'refresh');
			} else {
				if ($current_password == $this->input->post('new_password1')) {
					$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">New password cannot be the same as current password!</div>');
					redirect('user/change_password', 'refresh');
				} else {
					$password_hash = password_hash($this->input->post('new_password1'), PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Change password success!</div>');
					redirect('user/change_password', 'refresh');
				}
			}
		}
	}

	public function export_excel_inv()
	{
		$data = array(
			'title' => "Pengadaan Investasi",
			'peng_inv' => $this->pengadaan->get_all_data_peng_inv(),
		);

		$this->load->view('user/excel_peng_inv', $data);
	}

	public function export_excel_expl()
	{
		$data = array(
			'title' => "Pengadaan Eksploitasi",
			'peng_expl' => $this->pengadaan->get_all_data_peng_expl(),
		);

		$this->load->view('user/excel_peng_expl', $data);
	}

	public function export_expl_nonit()
	{
		$data = array(
			'title' => "Pengadaan Non IT Eksploitasi",
			'expl_nonit' => $this->pengadaan->get_all_data_expl_nonit(),
		);

		$this->load->view('user/excel_expl_nonit', $data);
	}

	public function export_filter_inv()
	{
		$data = array(
			'title' => "Pengadaan Investasi",
		);

		$this->load->view('user/excel_filter_inv', $data);
	}

	public function export_filter_expl()
	{
		$data = array(
			'title' => "Pengadaan Eksploitasi",
		);

		$this->load->view('user/excel_filter_expl', $data);
	}

	public function export_filter_expl_nonit()
	{
		$data = array(
			'title' => "Pengadaan Non IT Eksploitasi",
		);

		$this->load->view('user/excel_filter_nonit', $data);
	}

	public function view_inv($id = '')
	{
		error_reporting(0);
		$data['title'] = 'Detail Beban Pengadaan';
		$data['active'] = 'pengadaan';
		$this->fitur = 'Lihat';
		$data['data_inv'] = $this->pengadaan->get_anggaran_inv($id);
		$data['view'] = $this->pengadaan->get_anggaran_inv($id)->row();
		$data['spk_inv'] = $this->pengadaan->get_spk_inv($id);
		$data['fiat_inv'] = $this->pengadaan->get_fiat_inv($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/view_inv', $data);
		$this->load->view('templates/footer');
	}

	public function view_expl($id = '')
	{
		error_reporting(0);
		$data['title'] = 'Detail Beban Pengadaan Eksploitasi';
		$data['active'] = 'pengadaan_expl';
		$this->fitur = 'Lihat';
		$data['data_expl'] = $this->pengadaan->get_anggaran_expl($id);
		$data['view'] = $this->pengadaan->get_anggaran_expl($id)->row();
		$data['spk_expl'] = $this->pengadaan->get_spk_expl($id);
		$data['fiat_expl'] = $this->pengadaan->get_fiat_expl($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/view_expl', $data);
		$this->load->view('templates/footer');
	}

	public function view_expl_nonit($id = '')
	{
		error_reporting(0);
		$data['title'] = "Detail Beban Pengadaan Non IT Eksploitasi";
		$data['active'] = 'peng_expl_non_it';
		$this->fitur = 'Lihat';
		$data['data_nonit'] = $this->pengadaan->get_anggaran_nonit($id);
		$data['view'] = $this->pengadaan->get_anggaran_nonit($id)->row();
		$data['spk_nonit'] = $this->pengadaan->get_spk_nonit($id);
		$data['fiat_nonit'] = $this->pengadaan->get_fiat_nonit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/view_expl_nonit', $data);
		$this->load->view('templates/footer');
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

		$this->load->view('user/excel_monitoring_inv', $data);
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

		$this->load->view('user/excel_monitoring_expl', $data);
	}

	public function upload_pdf($id = "")
	{
		$data['title'] = "Upload File PDF";

		$data['pengadaan'] = $this->db->get_where('pengadaan', ['id' => $id])->row_array();

		$this->form_validation->set_rules('id', 'ID', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('user/upload', $data);
			$this->load->view('templates/footer');
		} else {
			$upload = $_FILES['files']['name'];

			if ($upload) {
				$config['allowed_types'] = 'pdf';
				$config['max_size'] = '5120';
				$config['upload_path'] = './assets/files/documents/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('files')) {

					$old_image = $data['pengadaan']['files'];
					if ($old_image != 'default.pdf') {
						unlink(FCPATH . 'assets/files/documents/' . $old_image);
					}

					$newimg = $this->upload->data('file_name');

					$this->db->set('files', $newimg);
				} else {
					echo $this->upload->display_errors();
				}
			}
			$this->db->where('id', $id);
			$this->db->update('pengadaan');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Upload data success!</div>');
			redirect('pengadaan', 'refresh');
		}
	}
}

/* End of file User.php */
