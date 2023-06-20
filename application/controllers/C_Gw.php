<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Gw extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() {
        parent::__construct();

        $this->load->model('M_Login_Admin');
        $this->load->library('form_validation');
    }

	public function index()
	{
		//akses model
		$this -> load -> Model ('M_Produk');

		//memanggil fungsi getAll pada M_Mitra
		$dt = $this -> M_Produk -> getAllShow ();

		//menampung data pada temp
		$temp['data'] = $dt;
		$tempheader['id'] = 0;

		//akses v_mitra beserta data
		$this->load->view('V_HeaderHome', $tempheader);
		$this->load->view('V_Home', $temp);
	}

	public function linkbeli($id)
	{
			//akses model
			$this -> load -> Model ('M_Produk');
			$this -> load -> Model ('M_Nominal');
			$this -> load -> Model ('M_Metode_Pembayaran');

			//memanggil fungsi getAll pada M_Mitra
			$dtp = $this -> M_Produk -> getById ($id);
			$dtjp = $this -> M_Produk -> getJenis ($id);
			$dtn = $this -> M_Nominal -> getByProdukShow ($id);
			$dtmp = $this -> M_Metode_Pembayaran -> getAllShow ();

			//menampung data pada temp
			$temp['dtp'] = $dtp;
			$temp['dtjp'] = $dtjp;
			$temp['dtn'] = $dtn;
			$temp['dtmp'] = $dtmp;
			$temp['id'] = $id;
			$tempheader['id'] = 0;

			//akses v_mitra beserta data
			$this->load->view('V_HeaderHome', $tempheader);
			$this->load->view('V_Beli', $temp);
	}

	public function beliAction($id){
		$this->form_validation->set_rules('uid','UID/No.Telepon', 'required|trim');

		if($this->form_validation->run() == FALSE){
			$this->linkbeli($id);
		} else {
		
			$uid = $this->input->post('uid');
			$nominal = $this->input->post('nominal');
			$metode = $this->input->post('metode');

			//menyiapkan array
			$pembelianbaru = array(
				'no_pembeli' => $uid,
				'id_nominal' => $nominal,
				'id_metode_pembayaran' => $metode
			);

			$this->M_Pembelian->insertPembelian($pembelianbaru);
			

			$this ->M_Produk->updateterjual($id);
			$this->session->set_flashdata('swal_icon', 'success');
			$this->session->set_flashdata('swal_title', 'Produk berhasil dibeli');
			$this->session->set_flashdata('swal_text', 'Terimakasih telah berbelanja di toko kami');

			redirect (base_url('/index.php/C_Gw/linkbeli/'. $id));
		}
	}

	public function login()
	{
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}

		$blnthn = date('Y-m');

		$this-> load -> Model ('M_Pembelian');
		$this-> load -> Model ('M_login');

		$dp = $this -> M_Pembelian -> getAllJoin();
		$sh = $this -> M_Pembelian -> getSumJoin();
		$shg = $this -> M_Pembelian -> getSumProduk(1, $blnthn);
		$shp = $this -> M_Pembelian -> getSumProduk(2, $blnthn);
		$sha = $this -> M_Pembelian -> getSumProduk(3, $blnthn);
		$ppg = $this -> M_Pembelian -> getpopulerProduk(1, $blnthn);
		$ppa = $this -> M_Pembelian -> getpopulerProduk(2, $blnthn);
		$ppp = $this -> M_Pembelian -> getpopulerProduk(3, $blnthn);
		// $dt = $this -> M_login -> getById($id);
		$user = $this->session->userdata('username');
		// $hak = $this->session->userdata('hak_akses');
		$admin = $this ->db->get_where('t_admin', ['username' => $user])->row_array();
		$role = $this ->db->get_where('t_role', ['id_role' => $admin['id_role']])->row_array();
		$jk = $this ->db->get_where('t_jenis_kelamin', ['id_jenis_kelamin' => $admin['id_jenis_kelamin']])->row_array();

		// $this->M_Login_Admin->getAdmin($user);
		$temp['dp'] = $dp;
		$temp['sh'] = $sh;
		$temp['shg'] = $shg;
		$temp['shp'] = $shp;
		$temp['sha'] = $sha;
		$temp['ppg'] = $ppg;
		$temp['ppa'] = $ppa;
		$temp['ppp'] = $ppp;
		$headertemp['data_admin'] = $admin;
		$headertemp['role'] = $role;
		$headertemp['jk'] = $jk;

		$data['info'] = 'login-info-box';

		$this->load-> view('V_HeaderAdmin', $headertemp);
		$this->load-> view('V_Login', $temp);

	}

	public function login_admin()
	{
		
		$this-> load -> Model ('M_Login');

		$dt = $this -> M_Login -> getAll();
		$dr = $this-> M_Login->getRole(1);
		$dtjk = $this-> M_Login->getJK(1);

		$temp['data'] = $dt;
		$temp['data'] = $dr;
		$temp['data'] = $dtjk;


		$temp['info'] = 'login-info-box';
		$temp['show'] = 'login-show';
		$reg = 0;
		$temp['reg'] = $reg;
		

		$this->load-> view('V_Login_Admin', $temp);


	}

	public function t_produk()
	{
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Produk');

		$dp = $this ->M_Produk -> getAll();

		$user = $this->session->userdata('username');
		$admin = $this ->db->get_where('t_admin', ['username' => $user])->row_array();
		$role = $this ->db->get_where('t_role', ['id_role' => $admin['id_role']])->row_array();
		$jk = $this ->db->get_where('t_jenis_kelamin', ['id_jenis_kelamin' => $admin['id_jenis_kelamin']])->row_array();
		
		$headertemp['data_admin'] = $admin;
		$headertemp['role'] = $role;
		$headertemp['jk'] = $jk;
		$temp['dp'] = $dp;
		
		$this->load-> view('V_HeaderAdmin', $headertemp);
		$this->load-> view('V_Produk', $temp);
	}

	public function t_nominal($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Nominal');

		$title = $this->M_Produk->getById($id);
		$dn = $this ->M_Nominal -> getByProduk($id);

		$user = $this->session->userdata('username');
		$admin = $this ->db->get_where('t_admin', ['username' => $user])->row_array();
		$role = $this ->db->get_where('t_role', ['id_role' => $admin['id_role']])->row_array();
		$jk = $this ->db->get_where('t_jenis_kelamin', ['id_jenis_kelamin' => $admin['id_jenis_kelamin']])->row_array();
		
		$headertemp['data_admin'] = $admin;
		$headertemp['role'] = $role;
		$headertemp['jk'] = $jk;
		
		$temp['id'] = $id;
		$temp['title'] = $title;
		$temp['dn'] = $dn;
		
		$this->load-> view('V_HeaderAdmin', $headertemp);
		$this->load-> view('V_Nominal', $temp);
	}

	public function t_metodePembayaran(){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Metode_Pembayaran');

		$dmp = $this ->M_Metode_Pembayaran -> getAll();
		$user = $this->session->userdata('username');
		
		$admin = $this ->db->get_where('t_admin', ['username' => $user])->row_array();
		$role = $this ->db->get_where('t_role', ['id_role' => $admin['id_role']])->row_array();
		$jk = $this ->db->get_where('t_jenis_kelamin', ['id_jenis_kelamin' => $admin['id_jenis_kelamin']])->row_array();
		
		
		$headertemp['data_admin'] = $admin;
		$headertemp['role'] = $role;
		$headertemp['jk'] = $jk;
		
		$temp['dmp'] = $dmp;
		
		
		$this->load-> view('V_HeaderAdmin', $headertemp);
		$this->load-> view('V_Metode_Pembayaran', $temp);
	}


	public function addProduk(){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$lj = $this ->M_Produk -> getAllJenis();
		$temp['lj'] = $lj;
		$this->load->view('V_HeaderCRUD');
		$this->load->view('V_AddProduk', $temp);
	}

	public function addProdukAction(){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}

		$this->form_validation->set_rules('nama_produk','Nama Produk', 'required');
		$this->form_validation->set_rules('deskripsi_produk','Deskripsi Produk', 'required');

		if($this->form_validation->run() == FALSE){
			$this->addProduk();
		} else {

			
			$nama_produk = $this->input->post('nama_produk');
			$id_jenis_produk = $this->input->post('jenis_produk');
			$deskripsi_produk = $this->input->post('deskripsi_produk');
			$terjual_produk = 0;
			$status_produk = 1;
			
			$config['upload_path'] = './assets/bs/assets/images/';
			$config['allowed_types'] = 'JPG|PNG|gif|JPEG|jpg|jpeg|png';
			$config['max_size'] = 20000;
			$config['max_width'] = 20000;
			$config['max_height'] = 20000;
			
			
			$this->load->library('upload', $config);
			
			if( ! $this->upload->do_upload('userfile')){
				$this->session->set_flashdata('flashfoto', 'Foto di set default');
				$foto_produk = "profile.jpg";
			} else{
				$foto_produk = $this->upload->data('file_name');
			}
			
			$addProdukAction = array(
				'nama_produk' => $nama_produk,
				'id_jenis_produk' => $id_jenis_produk,
				'foto_produk' => $foto_produk,
				'terjual_produk' => $terjual_produk,
				'status_produk' => $status_produk,
				'deskripsi_produk' => $deskripsi_produk
			);

			$this->M_Produk->insertProduk($addProdukAction);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			redirect (base_url('/index.php/C_Gw/t_produk/'));
		}
		

	}

	public function updateProduk($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$createProduk = $this->M_Produk->getById($id);
		$lj = $this ->M_Produk -> getAllJenis();
		
		$temp['dataProduk'] = $createProduk;
		$temp['lj'] = $lj;
		$this->load->view('V_HeaderCRUD');
		$this->load->view('V_UpdateProduk', $temp);
	}


	public function updateProdukAction($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}

		$this->form_validation->set_rules('nama_produk','Nama Produk', 'required');

		if($this->form_validation->run() == FALSE){
			$this->updateProduk($id);
		} else {

			$id_produk = $this->input->post('id_produk');
			$nama_produk = $this->input->post('nama_produk');
			$id_jenis_produk = $this->input->post('jenis_produk');
			$terjual_produk = $this->input->post('terjual_produk');
			$status_produk = $this->input->post('status_produk');
			$deskripsi_produk = $this->input->post('deskripsi_produk');

			$config['upload_path'] = './assets/bs/assets/images/';
			$config['allowed_types'] = 'JPG|PNG|gif|JPEG|jpg|jpeg|png';
			$config['max_size'] = 20000;
			$config['max_width'] = 20000;
			$config['max_height'] = 20000;


			$this->load->library('upload', $config);

			if( ! $this->upload->do_upload('userfile')){
				$foto_produk = $this->input->post('temp_foto');
			} else{
				if($this->input->post('temp_foto') != 'profile.jp'){
					unlink(FCPATH . 'assets/bs/assets/images/' . $this->input->post('temp_foto'));
				}
				$foto_produk = $this->upload->data('file_name');
			}
			
			$addProdukAction = array(
				'id_produk' => $id_produk,
				'nama_produk' => $nama_produk,
				'id_jenis_produk' => $id_jenis_produk,
				'foto_produk' => $foto_produk,
				'terjual_produk' => $terjual_produk,
				'status_produk' => $status_produk,
				'deskripsi_produk' => $deskripsi_produk
			);
			$this->M_Produk->editProduk($addProdukAction, $id);
			$this->session->set_flashdata('flash', 'DiUpdate');
			redirect (base_url('/index.php/C_Gw/t_produk/'));
		}
	}

	public function addNominal($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$lp = $this ->M_Produk -> getById($id);
		$temp['lp'] = $lp;
		$temp['id'] = $id;
		$this->load->view('V_HeaderCRUD');
		$this->load->view('V_AddNominal', $temp);
	}

	public function AddNominalAction($id) {
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this->form_validation->set_rules('nama_nominal','Nama Nominal', 'required');
		$this->form_validation->set_rules('harga','Harga Nominal', 'required');

		if($this->form_validation->run() == FALSE){
			$this->addNominal($id);
		} else {
			$this-> load -> Model ('M_Nominal');

			$nama_nominal= $this->input->post('nama_nominal');
			$harga_nominal = $this->input->post('harga');
			$id_produk = $id;
			$status_nominal = 1;

			$addNominalAction = array(
				'nama_nominal' => $nama_nominal,
				'harga_nominal' => $harga_nominal,
				'id_produk' => $id_produk,
				'status_nominal' => $status_nominal
			);
			$this->M_Nominal->insertNominal($addNominalAction);
			$this->session->set_flashdata('flash', 'DiTambah');
			redirect (base_url('/index.php/C_Gw/t_nominal/'). $id);
		}
	}

	public function updateNominal($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Nominal');

		$ln = $this->M_Nominal -> getById($id);
		// $lp = $this ->M_Produk -> getById($id);
		$temp['ln'] = $ln;
		// $temp['lp'] = $lp;
		$temp['id'] = $id;
		$this->load->view('V_HeaderCRUD');
		$this->load->view('V_UpdateNominal', $temp);
	}

	public function updateNominalAction($id) {
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this->form_validation->set_rules('nama_nominal','Nama Nominal', 'required');
		$this->form_validation->set_rules('harga','Harga Nominal', 'required');

		if($this->form_validation->run() == FALSE){
			$this->updateNominal($id);
		} else {
			$this-> load -> Model ('M_Nominal');
			
			$id_nominal = $this->input->post('id_nominal');
			$nama_nominal= $this->input->post('nama_nominal');
			$harga_nominal = $this->input->post('harga');
			$id_produk = $this->input->post('id_produk');
			$status_nominal = $this->input->post('status_nominal');

			$updateNominalAction = array(
				'id_nominal' => $id_nominal,
				'nama_nominal' => $nama_nominal,
				'harga_nominal' => $harga_nominal,
				'id_produk' => $id_produk,
				'status_nominal' => $status_nominal
			);
			$this->M_Nominal->updateNominal($updateNominalAction, $id);
			$this->session->set_flashdata('flash', 'DiUpdate');
			redirect (base_url('/index.php/C_Gw/t_nominal/'). $id_produk);
		}
	}

	public function addPembayaran(){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this->load->view('V_HeaderCRUD');
		$this->load->view('V_AddPembayaran');
	}

	public function addPembayaranAction(){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this->form_validation->set_rules('nama_metode','Nama Metode Pembayaran', 'required');

		if($this->form_validation->run() == FALSE){
			$this->addPembayaran();
		} else {
			$this-> load -> Model ('M_Metode_Pembayaran');

			$nama_metode = $this->input->post('nama_metode');
			$status_metode = 1;

			$addPembayaranAction = array(
				'nama_metode' => $nama_metode,
				'status_metode' => $status_metode
			);

			$this->M_Metode_Pembayaran->insertPembayaran($addPembayaranAction);
			$this->session->set_flashdata('flash', 'DiTambahkan');
			redirect (base_url('/index.php/C_Gw/t_metodePembayaran/'));
		}
	}

	public function updatePembayaran($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Metode_Pembayaran');

		$lmp = $this ->M_Metode_Pembayaran -> getById($id);
		$temp['lmp'] = $lmp;
		$this->load->view('V_HeaderCRUD');
		$this->load->view('V_UpdatePembayaran', $temp);
	}

	public function updatePembayaranAction($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this->form_validation->set_rules('nama_metode','Nama Metode Pembayaran', 'required');

		if($this->form_validation->run() == FALSE){
			$this->updatePembayaran($id);
		} else {

			$this-> load -> Model ('M_Metode_Pembayaran');
			
			$id_metode = $this->input->post('id_metode');
			$nama_metode = $this->input->post('nama_metode');
			$status_metode = $this->input->post('status_metode');
			
			$updatePembayaranAction = array(
				'id_metode_pembayaran' => $id_metode,
				'nama_metode' => $nama_metode,
				'status_metode' => $status_metode
			);
			
			$this->M_Metode_Pembayaran->updatePembayaran($updatePembayaranAction, $id);
			$this->session->set_flashdata('flash', 'DiUpdate');
			redirect (base_url('/index.php/C_Gw/t_metodePembayaran/'));
		}
	}

	public function hideStatusProduk($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		
		$this->M_Produk->changeStatusHide($id);
		
		$this->session->set_flashdata('flash', 'Disembunyikan');
		redirect (base_url('/index.php/C_Gw/t_produk/'));
	}

	public function showStatusProduk($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		
		$this->M_Produk->changeStatusShow($id);

		$this->session->set_flashdata('flash', 'Ditampilkan');
		redirect (base_url('/index.php/C_Gw/t_produk/'));
	}

	public function hideStatusNominal($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Nominal');
		
		$this->M_Nominal->changeStatusHide($id);
		
		$this->session->set_flashdata('flash', 'Disembunyikan');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function showStatusNominal($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Nominal');
		
		$this->M_Nominal->changeStatusShow($id);
		
		$this->session->set_flashdata('flash', 'DiTampilkan');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function hideStatusPembayaran($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Metode_Pembayaran');
		
		$this->M_Metode_Pembayaran->changeStatusHide($id);
		
		$this->session->set_flashdata('flash', 'Disembunyikan');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function showStatusPembayaran($id){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Metode_Pembayaran');
		
		$this->M_Metode_Pembayaran->changeStatusShow($id);

		$this->session->set_flashdata('flash', 'DiTampilkan');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function index_login()
	{
		$data['show'] = 'login-show';
		$this->load->view('V_Login_Admin', $data);
	}

	public function login_aksi()
	{
		$user = $this->input->post('username', true);
		$pass = $this->input->post('password', true);

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() != FALSE) 
		{
			$where = array(

					'username' => $user

			);

			$ceklogin = $this->M_Login_Admin->cek_login($where)->row_array();

			if ($ceklogin > 0) {

				// $datauser = $this->db->get_where('t_admin', ['username' => $user])->row_array();
				



				if(password_verify($pass, $ceklogin['password'])){
					
					$data_admin = $this->M_Login_Admin->getAdmin($user);
					$sess_data = array(
						// 'id_admin' => $data_admin['id_admin'],
						'username' => $user,
						// 'moto_admin' => $data_admin['moto_admin'],
						// 'Role' => $data_admin['id_role'],
						// 'jenis_kelamin' => $data_admin['id_jenis_kelamin'],
						// 'email' => $data_admin['email'],
						'login' => 'OK'
					);
					
					$this->session->set_userdata($sess_data);
					redirect (base_url('/index.php/C_Gw/login'));
				} else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password salah.</div>');
					redirect (base_url('/index.php/C_Gw/login_admin/'));
				}


			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Username tidak ditemukan</div>');
				redirect (base_url('/index.php/C_Gw/login_admin/'));
			}
		}else 
		{
			$data['info'] = 'login-info-box';
			$data['show'] = 'login-show';
			$data['reg'] = 0;
			$this->load->view('V_Login_Admin', $data);
		}
	}

	public function logout_aksi()
	{
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Berhasil Logout</div>');

		redirect (base_url('/index.php/C_Gw/index'));
	}

	public function registrasi(){

		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[t_admin.username]',
		[
			'is_unique' => 'Username has been registered'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[confirm]',
		['matches' => 'Password dont match!',
		'min_length' => 'Password too short!'
		]);
		
		$this->form_validation->set_rules('confirm', 'Confirm', 'required|trim|matches[password]');
		
		
		if($this->form_validation->run() == false){
			$data['reg'] = 1;
			$this->load->view('V_Login_Admin', $data);
		} else{
			
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'moto_admin' => 'selamat datang',
				'id_role' => 2,
				'id_jenis_kelamin' => 1,
				'email' => 'gw_admin@gmail.com',
				'hak_akses' => 'O'
			];

			$this->M_Admin->insertAdmin($data);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Akun terdaftar! Silahkan login.</div>');
			redirect (base_url('/index.php/C_Gw/login_admin/'));
		}
	}


	public function editprofil(){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$user = $this->session->userdata('username');
		$admin = $this ->db->get_where('t_admin', ['username' => $user])->row_array();
		$role = $this->db->get('t_role')->result();
		$jk = $this->db->get('t_jenis_kelamin')->result();

		$temp['data'] = $admin;
		$temp['role'] = $role;
		$temp['jk'] = $jk;
		$this->load->view('V_HeaderCRUD');
		$this->load->view('V_EditProfil', $temp);
	}

	public function editProfilAction(){
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this-> load -> Model ('M_Admin');
			
			$id_admin = $this->input->post('id_admin');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$moto_admin = $this->input->post('moto_admin');
			$id_role = $this->input->post('id_role');
			$id_jenis_kelamin = $this->input->post('id_jenis_kelamin');
			$email = $this->input->post('email');
			$hak_akses = $this->input->post('hak_akses');
			
			$editProfilAction = array(
				'id_admin' => $id_admin,
				'username' => $username,
				'password' => $password,
				'moto_admin' => $moto_admin,
				'id_role' => $id_role,
				'id_jenis_kelamin' => $id_jenis_kelamin,
				'email' => $email,
				'hak_akses' => $hak_akses
				
			);
			
			$this->M_Admin->updateAdmin($editProfilAction, $id_admin);
			redirect (base_url('/index.php/C_Gw/login/'));
	}

	public function t_admin()
	{
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$this->load->model('M_Data_Admin');

		$dp = $this->M_Data_Admin->getAll();


		$user = $this->session->userdata('username');
		$admin = $this->db->get_where('t_admin', ['username' => $user])->row_array();
		$role = $this->db->get_where('t_role', ['id_role' => $admin['id_role']])->row_array();
		$jk = $this->db->get_where('t_jenis_kelamin', ['id_jenis_kelamin' => $admin['id_jenis_kelamin']])->row_array();

		$temp['dp'] = $dp;
		$headertemp['data_admin'] = $admin;
		$headertemp['role'] = $role;
		$headertemp['jk'] = $jk;

		$this->load->view('V_HeaderAdmin', $headertemp);
		$this->load->view('V_Data_Admin', $temp);
	}

	// public function addAdmin()
	// {
	// 	$lj = $this->M_Data_Admin->getAllRole();
	// 	$jk = $this->M_Data_Admin->getAllJenisKelamin();
	// 	$temp['lj'] = $lj;
	// 	$temp['jk'] = $jk;
	// 	$this->load->view('V_HeaderCRUD');
	// 	$this->load->view('V_AddAdmin', $temp);
	// }

	// public function addAdminAction()
	// {
	// 	$this->form_validation->set_rules('username', 'Username', 'required');
	// 	$this->form_validation->set_rules('password', 'Password', 'required');
	// 	$this->form_validation->set_rules('id_role', 'Role', 'required');
	// 	$this->form_validation->set_rules('id_jenis_kelamin', 'Jenis Kelamin', 'required');

	// 	if ($this->form_validation->run() == FALSE) 
	// 	{

	// 		$this->addAdmin();

	// 	} else {
	// 		$username = $this->input->post('username');
	// 		$password = $this->input->post('password');
	// 		$id_role = $this->input->post('id_role');
	// 		$id_jenis_kelamin = $this->input->post('id_jenis_kelamin');
	// 		$moto_admin = $this->input->post('moto_admin');

	// 		$addAdminAction = array(
	// 			'username' => $username,
	// 			'password' => $password,
	// 			'id_role' => $id_role,
	// 			'id_jenis_kelamin' => $id_jenis_kelamin,
	// 			'moto_admin' => $moto_admin
	// 		);

	// 		$this->M_Admin->insertAdmin($addAdminAction);
	// 		$this->session->set_flashdata('flash', 'Ditambahkan');
	// 		redirect(base_url('/index.php/C_Gw/t_admin/'));
	// 	}
	// }

	// public function updateAdmin($id)
	// {
	// 	$createAdmin = $this->M_Admin->getById($id);
	// 	$lj = $this->M_Admin->getAllRole();
	// 	$jk = $this->M_Admin->getAllJenisKelamin();

	// 	$temp['dataAdmin'] = $createAdmin;
	// 	$temp['lj'] = $lj;
	// 	$temp['jk'] = $jk;
	// 	$this->load->view('V_HeaderCRUD');
	// 	$this->load->view('V_UpdateAdmin', $temp);
	// }

	// public function updateAdminAction($id)
	// {
	// 	$this->form_validation->set_rules('username', 'Username', 'required');
	// 	$this->form_validation->set_rules('password', 'Password', 'required');
	// 	$this->form_validation->set_rules('id_role', 'Role', 'required');
	// 	$this->form_validation->set_rules('id_jenis_kelamin', 'Jenis Kelamin', 'required');

	// 	if ($this->form_validation->run() == FALSE) {
	// 		$this->updateAdmin($id);
	// 	} else {
	// 		$username = $this->input->post('username');
	// 		$password = $this->input->post('password');
	// 		$id_role = $this->input->post('id_role');
	// 		$id_jenis_kelamin = $this->input->post('id_jenis_kelamin');
	// 		$moto_admin = $this->input->post('moto_admin');

	// 		$updateAdminAction = array(
	// 			'username' => $username,
	// 			'password' => $password,
	// 			'id_role' => $id_role,
	// 			'id_jenis_kelamin' => $id_jenis_kelamin,
	// 			'moto_admin' => $moto_admin
	// 		);

	// 		$this->M_Admin->editAdmin($updateAdminAction, $id);
	// 		$this->session->set_flashdata('flash', 'DiUpdate');
	// 		redirect(base_url('/index.php/C_Gw/t_admin/'));
	// 	}
	// }

	public function updateHakAkses($id_admin) {
		if(empty($this->session->userdata('login'))){
			redirect(base_url('/index.php/C_Gw/login_admin/'));
		}
		$hak_akses = $this->input->post('hak_akses');

		// Lakukan update hak akses admin di database sesuai dengan $id_admin
		$this->load->model('M_Data_Admin');
		$this->M_Data_Admin->updateHakAkses($id_admin, $hak_akses);

		// Setelah berhasil melakukan update, Anda dapat menampilkan pesan sukses atau melakukan redirect ke halaman lain
		$this->session->set_flashdata('flash', 'diperbarui.');
		redirect(base_url('/index.php/C_Gw/t_admin/'));
		
	}
	
	public function byJenisProduk($id){
		//akses model
		$this -> load -> Model ('M_Produk');

		//memanggil fungsi getAll pada M_Mitra
		$dt = $this -> M_Produk -> getByjenis($id);
		
		if($id == 2){
			$temp['title'] = 'Pulsa';
		} else if($id == 3){
			$temp['title'] = 'Apk';
		} else if($id == 1){
			$temp['title'] = 'Game';
		} 

		//menampung data pada temp
		$temp['data'] = $dt;
		$tempheader['id'] = $id;

		//akses v_mitra beserta data
		$this->load->view('V_HeaderHome', $tempheader);
		$this->load->view('V_ByJenisProduk', $temp);
	}

	public function about(){
		//akses model
		$this -> load -> Model ('M_Produk');
		$this -> load -> Model ('M_Metode_Pembayaran');

		//memanggil fungsi getAll pada M_Mitra
		$dt = $this -> M_Produk -> getAllShow();

		$dmp = $this -> M_Metode_Pembayaran -> getAllShow();

		//menampung data pada temp
		$temp['data'] = $dt;
		$temp['dmp'] = $dmp;
		$tempheader['id'] = 4;

		//akses v_mitra beserta data
		$this->load->view('V_HeaderHome', $tempheader);
		$this->load->view('V_About', $temp);
	}

}
