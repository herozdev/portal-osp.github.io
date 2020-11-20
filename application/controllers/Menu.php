<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		is_logged_in();

		$this->load->model('User_model', 'user');
		$this->load->model('Menu_model', 'menu');
		$this->load->model('Inv_model', 'inv');
		$this->load->model('Expl_model', 'expl');
	}

	public function menu_order()
	{
		if ($this->input->post()) {

			$i = 1;
			$result = array();

			foreach ($_POST['order'] as $value) {
				$data = array(
					'menu_order' => $i

				);

				$result[] = $this->menu->update($value, $data);
				$i++;
			}

			if ($result === FALSE) {
				$this->session->set_flashdata('message', '');
			} else {
				if ($result > 0) {
				} else {
				}
			}
			redirect(base_url($this->cname . "/ordermenu"));
		}

		$data['title'] = "Order Menu";

		$data['user'] = $this->user->get_user()->row_array();

		$data['menu'] = $this->menu->getMenu()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/menu_order', $data);
		$this->load->view('templates/footer', $data);
	}

	public function index()
	{

		$data['title'] = "Menu Management";

		$data['user'] = $this->user->get_user()->row_array();

		$data['menu'] = $this->menu->getMenu()->result_array();

		$post = [
			'menu' => $this->input->post('menu'),
			'menu_order' => 1,
		];

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$this->menu->add($post);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> A simple success alert—check it out! </div>');

			redirect('menu', 'refresh');
		}
	}

	public function sub_inv()
	{
		$data['title'] = "Sub Investasi";

		$data['user'] = $this->user->get_user()->row_array();

		$data['sub_inv'] = $this->inv->get_all_sub_inv()->result_array();

		$data['kode'] = $this->inv->create_sub_inv();

		$this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'required');
		$this->form_validation->set_rules('jenis_investasi', 'Jenis Investasi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('investasi/sub_inv', $data);
			$this->load->view('templates/footer', $data);
		} else {

			$data = [
				'id' => uniqid(),
				'kode_jenis' => $this->input->post('kode_jenis'),
				'jenis_investasi' => $this->input->post('jenis_investasi')
			];

			$this->inv->add_sub_inv($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">A new sub menu has been added!</div>');

			redirect('menu/sub_inv', 'refresh');
		}
	}

	public function sub_expl()
	{
		$data['title'] = "Sub Eksploitasi";

		$data['user'] = $this->user->get_user()->row_array();

		$data['sub_expl'] = $this->expl->get_all_sub_expl()->result_array();

		$data['kode'] = $this->expl->kode_sub_jenis();

		$this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'required');
		$this->form_validation->set_rules('jenis_eksploitasi', 'Jenis Eksploitasi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('eksploitasi/sub_expl', $data);
			$this->load->view('templates/footer', $data);
		} else {

			$data = [
				'id' => uniqid(),
				'kode_jenis' => $this->input->post('kode_jenis'),
				'jenis_eksploitasi' => $this->input->post('jenis_eksploitasi')
			];

			$this->expl->add_sub_expl($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">A new sub menu has been added!</div>');

			redirect('menu/sub_expl', 'refresh');
		}
	}

	public function sub_expl_kat()
	{
		$data['title'] = "Sub Kategori Eksploitasi";

		$data['user'] = $this->user->get_user()->row_array();

		$data['kat_expl'] = $this->expl->get_all_sub_expl_kategori()->result_array();
		$data['jenis'] = $this->expl->get_all_sub_expl()->result_array();

		$data['kode'] = $this->expl->kode_sub_kategori();

		$this->form_validation->set_rules('kode_jenis', 'Kode Jenis', 'required');
		$this->form_validation->set_rules('kode_kategori', 'Kode Kategori', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('eksploitasi/sub_expl_kategori', $data);
			$this->load->view('templates/footer', $data);
		} else {

			$data = [
				'id' => uniqid(),
				'kode_jenis' => $this->input->post('kode_jenis'),
				'kode_kategori' => $this->input->post('kode_kategori'),
				'kategori' => $this->input->post('kategori')
			];

			$this->expl->add_sub_expl_kat($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">A new sub menu has been added!</div>');

			redirect('menu/sub_expl_kat', 'refresh');
		}
	}

	public function submenu()
	{
		$data['title'] = "Sub Menu Management";

		$data['user'] = $this->user->get_user()->row_array();

		$data['submenu'] = $this->menu->getSubmenu()->result_array();

		$data['menu'] = $this->menu->getMenu()->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer', $data);
		} else {

			$data = [
				'id' => uniqid(),
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];

			$this->menu->addSubMenu($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">A new sub menu has been added!</div>');

			redirect('menu/submenu', 'refresh');
		}
	}

	public function edit_sub_inv($id)
	{
		$data['title'] = "Edit Sub Investasi";

		$data['user'] = $this->user->get_user()->row_array();

		$data['row'] = $this->inv->get_row_sub_inv($id)->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('investasi/edit_sub_inv', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit_sub_expl($id)
	{
		$data['title'] = "Edit Sub Eksploitasi";

		$data['user'] = $this->user->get_user()->row_array();

		$data['row'] = $this->expl->get_row_sub_expl($id)->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('eksploitasi/edit_sub_expl', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit_sub_expl_kategori($id)
	{
		$data['title'] = "Edit Sub Kategori Eksploitasi";

		$data['user'] = $this->user->get_user()->row_array();

		$data['row'] = $this->expl->get_row_sub_expl_kategori($id)->row_array();
		$data['jenis'] = $this->expl->get_all_sub_expl()->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('eksploitasi/edit_sub_expl_kategori', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit_sub_form($id)
	{
		$data['title'] = "Sub Menu Management";

		$data['user'] = $this->user->get_user()->row_array();

		$data['submenu'] = $this->menu->getSubmenu()->result_array();

		$data['menu'] = $this->menu->getMenu()->result_array();

		$data['row'] = $this->menu->rowSub($id)->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/edit_sub_menu', $data);
		$this->load->view('templates/footer', $data);
	}

	public function edit_form($id)
	{
		$data['title'] = "Edit Menu Management";

		$data['user'] = $this->user->get_user()->row_array();

		$data['menu'] = $this->menu->getMenu()->result_array();

		$data['row'] = $this->menu->get_row($id)->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/edit_menu', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update()
	{
		if ($this->input->post()) {
			$post = $this->input->post();

			$id = $post['id'];

			$this->form_validation->set_rules('menu', 'Menu', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit menu failed!</div>');
				redirect('menu/edit_form', 'refresh');
			} else {
				$go = $this->menu->update($id, $post);

				if ($go) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
					redirect('menu', 'refresh');
				} else {
					redirect('menu', 'refresh');
				}
			}
		}
	}

	public function updateSubInv()
	{
		if ($this->input->post()) {
			$post = $this->input->post();

			$id = $post['id'];

			$this->form_validation->set_rules('jenis_investasi', 'Jenis Investasi', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit menu failed!</div>');
				redirect('menu/edit_sub_inv', 'refresh');
			} else {
				$go = $this->inv->update_sub_inv($id, $post);

				if ($go) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
					redirect('menu/sub_inv', 'refresh');
				} else {
					redirect('menu/sub_inv', 'refresh');
				}
			}
		}
	}

	public function updateSubExpl()
	{
		if ($this->input->post()) {
			$post = $this->input->post();

			$id = $post['id'];

			$this->form_validation->set_rules('jenis_eksploitasi', 'Jenis Eksploitasi', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit menu failed!</div>');
				redirect('menu/edit_sub_expl', 'refresh');
			} else {
				$go = $this->expl->update_sub_expl($id, $post);

				if ($go) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
					redirect('menu/sub_expl', 'refresh');
				} else {
					redirect('menu/sub_expl', 'refresh');
				}
			}
		}
	}

	public function updateSubExplKat()
	{
		if ($this->input->post()) {
			$post = $this->input->post();

			$id = $post['id'];

			$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit menu failed!</div>');
				redirect('menu/edit_sub_expl_kat', 'refresh');
			} else {
				$go = $this->expl->update_sub_expl_kat($id, $post);

				if ($go) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
					redirect('menu/sub_expl', 'refresh');
				} else {
					redirect('menu/sub_expl', 'refresh');
				}
			}
		}
	}

	public function updateSub()
	{
		if ($this->input->post()) {
			$post = $this->input->post();

			$id = $post['id'];

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('menu_id', 'Menu', 'required');
			$this->form_validation->set_rules('url', 'URL', 'trim|required');
			$this->form_validation->set_rules('icon', 'Icon', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Edit menu failed!</div>');
				redirect('menu/edit_sub_form', 'refresh');
			} else {
				$go = $this->menu->updateSubMenu($id, $post);

				if ($go) {
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit menu success!</div>');
					redirect('menu/submenu', 'refresh');
				} else {
					redirect('menu/submenu', 'refresh');
				}
			}
		}
	}

	public function delete($id)
	{
		$this->menu->get_row($id);

		$this->menu->delete($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete menu success</div>');

		redirect('menu', 'refresh');
	}

	public function delete_sub_inv($id)
	{
		$this->inv->get_row_sub_inv($id);

		$this->inv->delete_sub_inv($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete menu success</div>');

		redirect('menu/sub_inv', 'refresh');
	}

	public function delete_sub_expl($id)
	{
		$this->expl->get_row_sub_expl($id);

		$this->expl->delete_sub_expl($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete menu success</div>');

		redirect('menu/sub_expl', 'refresh');
	}

	public function delete_sub_expl_kategori($id)
	{
		$this->expl->get_row_sub_expl_kategori($id);

		$this->expl->delete_sub_expl_kat($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete menu success</div>');

		redirect('menu/sub_expl', 'refresh');
	}

	public function deleteSub($id)
	{
		$this->menu->rowSub($id);
		$this->menu->deleteSub($id);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete menu success</div>');

		redirect('menu/submenu', 'refresh');
	}
}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
