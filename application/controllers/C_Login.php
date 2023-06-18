<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();

		$this->load->model('M_Login_a');
	}

	public function index(){

		$this->load->view('V_Login_Admin');

	}

	public function login_aksi(){
		$user = $this->input->post('username',true);
		$pass = md5($this->input->post('password', true));

		//rule validasi
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != FALSE){
			$where = array(
				'nama_admin' => $user,
				'pass_admin' => $pass
			);

			$cekLogin = $this->M_Login_a->cek_login($where)->num_rows();

			if($cekLogin > 0){
				$sess_data = array(
					'username' => $user,
					'login' => 'OK'
				);

				$this->session->set_userdata($sess_data);

				redirect(base_url());

			}else{
				redirect(base_url('C_Login'));
			}

		}else{
			$this->load->view('V_Login_Admin');
		}

	}

	public function logout(){

		$this->session->sess_destroy();
		redirect(base_url('C_Login'));

	}
}
?>