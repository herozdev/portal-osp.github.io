<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('user_pn')) {
			redirect('user', 'refresh');
		}

		$this->form_validation->set_rules('user_pn', 'User Pn', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "PortalOSP | Login";

			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('templates/auth_footer', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		if ($this->input->post()) {
			$user_pn = $this->input->post('user_pn');
			$password = $this->input->post('password');
		}

		$user = $this->db->get_where('user', ['user_pn' => $user_pn])->row_array();

		if (!empty($user)) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = array(
						'user_pn' => $user['user_pn'],
						'role_id' => $user['role_id'],
					);

					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin', 'refresh');
					} else {
						redirect('user', 'refresh');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong email and password!</div>');

					redirect('auth', 'refresh');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been activated!</div>');

				redirect('auth', 'refresh');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');

			redirect('auth', 'refresh');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('user_pn')) {
			redirect('user', 'refresh');
		}

		$this->form_validation->set_rules('user_pn', 'User Pn', 'trim|required|min_length[4]|is_unique[user.user_pn]', [
			'is_unique' => "This personal number has been used, please use another number",
		]);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
			'is_unique' => "This Email has been used, try your another Email!",
			'valid_email' => "This Email is not valid! Use your valid Email!",
		]);
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]', [
			'matches' => "Password not match!",
			'min_length' => "Password too weak, use min 5 character!",
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = "PortalOSP Monitoring | Registration";

			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/register', $data);
			$this->load->view('templates/auth_footer', $data);
		} else {
			$data = array(
				'id' => uniqid(),
				'user_pn' => htmlspecialchars($this->input->post('user_pn', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'firstname' => htmlspecialchars($this->input->post('firstname', true)),
				'lastname' => htmlspecialchars($this->input->post('lastname', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time(),
			);

			//set token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'id' => uniqid(),
				'email' => $this->input->post('email'),
				'token' => $token,
				'date_created' => time(),
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Registration is successful! Please activate your account!</div>');

			redirect('auth', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_pn');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth', 'refresh');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}

	private function _sendEmail($token, $type)
	{

		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'portalospgti06@gmail.com',
			'smtp_pass' => 'ospgti06',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];

		$this->load->library('email', $config);

		$this->email->from('portalospgti06@gmail.com', 'Portal OSP');
		$this->email->to($this->input->post('email', TRUE));
		//$this->email->cc('another@example.com');
		//$this->email->bcc('and@another.com');
		if ($type == 'verify') {
			$this->email->subject('Verification User');
			$this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} elseif ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					//$this->db->update('user', $object);

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . 'has been activated. Please Login to access</div>');
					redirect('auth', 'refresh');
				} else {

					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token has expired!</div>');
					redirect('auth', 'refresh');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
				redirect('auth', 'refresh');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
			redirect('auth', 'refresh');
		}
	}

	public function forgot_password()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "PortalOSP | Forgot Password";

			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot_password', $data);
			$this->load->view('templates/auth_footer', $data);
		} else {
			$email = $this->input->post('email');

			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'id' => uniqid(),
					'email' => $email,
					'token' => $token,
					'date_created' => time(),
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
				redirect('auth/forgot_password', 'refresh');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered! Or not activated</div>');
				redirect('auth/forgot_password', 'refresh');
			}
		}
	}

	public function reset_password()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);

				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Failed!</div>');
				redirect('auth', 'refresh');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Failed!</div>');
			redirect('auth', 'refresh');
		}
	}

	public function changePassword()
	{

		if (!$this->session->userdata('reset_email')) {
			redirect('auth', 'refresh');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[5]|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "PortalOSP | Change Password";

			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change_password', $data);
			$this->load->view('templates/auth_footer', $data);
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been reset</div>');
			redirect('auth', 'refresh');
		}
	}
}

/* End of file Auth.php */
