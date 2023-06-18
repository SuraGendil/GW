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
	public function index()
	{
		//akses model
		$this -> load -> Model ('M_Produk');

		//memanggil fungsi getAll pada M_Mitra
		$dt = $this -> M_Produk -> getAll ();

		//menampung data pada temp
		$temp['data'] = $dt;

		//akses v_mitra beserta data
		$this->load->view('V_Home', $temp);
	}

	public function linkbeli($id)
	{
		//akses model
		$this -> load -> Model ('M_Produk');
		$this -> load -> Model ('M_Nominal');
		$this -> load -> Model ('M_Metode_Pembayaran');

		//memanggil fungsi getAll pada M_Mitra
		$dtp = $this -> M_Produk -> getByJenis ($id);
		$dtjp = $this -> M_Produk -> getJenis ($id);
		$dtn = $this -> M_Nominal -> getByProduk ($id);
		$dtmp = $this -> M_Metode_Pembayaran -> getAll ();

		//menampung data pada temp
		$temp['dtp'] = $dtp;
		$temp['dtjp'] = $dtjp;
		$temp['dtn'] = $dtn;
		$temp['dtmp'] = $dtmp;
		$temp['id'] = $id;

		//akses v_mitra beserta data
		$this->load->view('V_Beli', $temp);
	}

	public function beliAction($id){
		//mengambil semua variabel yang berasal dari form
		// $no_reg = $this->input->post('no_reg');
		$uid = $this->input->post('uid');
		$nominal = $this->input->post('nominal');
		$metode = $this->input->post('metode');
		// $status = $this->input->post('status');

		// $nominal = NULL;
		// echo " nominal " . is_null($nominal) . "<br>";

		// if($nominal == NULL){

		// }

		//menyiapkan array
		$pembelianbaru = array(
			'no_pembeli' => $uid,
			'id_nominal' => $nominal,
			'id_metode_pembayaran' => $metode
		);

		//memanggil fungsi insert mitra dengan membawa parameter array
		$this->M_Pembelian->insertPembelian($pembelianbaru);
		// $this->load->view('V_NewDetail', $id);


		// $this -> load -> Model ('M_Nominal');
		// $this -> load -> Model ('M_Produk');
		// $terjual = $this ->M_Nominal -> sumterjual($id);
		// $dtp = $this -> M_Produk -> getById ($id);
		

		$this ->M_Produk->updateterjual($id);

		redirect (base_url('/index.php/C_Gw/linkbeli/'. $id));
	}

	public function login()
	{

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
		$dt = $this -> M_login -> getAll();
		$dr = $this -> M_login -> getRole(1);
		$djk = $this -> M_login -> getJK(1);

		$temp['dp'] = $dp;
		$temp['sh'] = $sh;
		$temp['shg'] = $shg;
		$temp['shp'] = $shp;
		$temp['sha'] = $sha;
		$temp['ppg'] = $ppg;
		$temp['ppa'] = $ppa;
		$temp['ppp'] = $ppp;
		$temp['data'] = $dt;
		$temp['dr'] = $dr;
		$temp['djk'] = $djk;
		
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
	
		$this->load-> view('V_Login_Admin', $temp);

	}

	public function t_produk(){
		$this-> load -> Model ('M_Produk');
		$this-> load -> Model ('M_Login');

		$dp = $this ->M_Produk -> getAll();
		$dt = $this -> M_Login -> getAll();
		$dr = $this -> M_Login -> getRole(1);
		$djk = $this -> M_Login -> getJK(1);

		$temp['dp'] = $dp;
		$temp['data'] = $dt;
		$temp['dr'] = $dr;
		$temp['djk'] = $djk;

		
		$this->load-> view('V_Produk', $temp);
	}

	public function t_nominal($id){
		$this-> load -> Model ('M_Nominal');
		$this-> load -> Model ('M_Login');

		$title = $this->M_Produk->getById($id);
		$dn = $this ->M_Nominal -> getByProduk($id);
		$dt = $this -> M_Login -> getAll();
		$dr = $this -> M_Login -> getRole(1);
		$djk = $this -> M_Login -> getJK(1);

		$temp['id'] = $id;
		$temp['title'] = $title;
		$temp['dn'] = $dn;
		$temp['data'] = $dt;
		$temp['dr'] = $dr;
		$temp['djk'] = $djk;

		
		$this->load-> view('V_Nominal', $temp);
	}

	public function t_metodePembayaran(){
		$this-> load -> Model ('M_Metode_Pembayaran');
		$this-> load -> Model ('M_Login');

		$dmp = $this ->M_Metode_Pembayaran -> getAll();
		$dt = $this -> M_Login -> getAll();
		$dr = $this -> M_Login -> getRole(1);
		$djk = $this -> M_Login -> getJK(1);

		$temp['dmp'] = $dmp;
		$temp['data'] = $dt;
		$temp['dr'] = $dr;
		$temp['djk'] = $djk;

		
		$this->load-> view('V_Metode_Pembayaran', $temp);
	}


	public function addProduk(){
		$lj = $this ->M_Produk -> getAllJenis();
		$temp['lj'] = $lj;
		$this->load->view('V_AddProduk', $temp);
	}

	public function addProdukAction(){
		$nama_produk = $this->input->post('nama_produk');
		$id_jenis_produk = $this->input->post('jenis_produk');
		$terjual_produk = 0;

		$config['upload_path'] = './assets/bs/assets/images/';
		$config['allowed_types'] = 'JPG|PNG|gif|JPEG|jpg|jpeg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 20000;
		$config['max_height'] = 20000;


		$this->load->library('upload', $config);

		if( ! $this->upload->do_upload('userfile')){
			$foto_produk = "profile.jpg";
		} else{
			$foto_produk = $this->upload->data('file_name');
		}
		
		$addProdukAction = array(
			'nama_produk' => $nama_produk,
			'id_jenis_produk' => $id_jenis_produk,
			'foto_produk' => $foto_produk,
			'terjual_produk' => $terjual_produk
		);
		$this->M_Produk->insertProduk($addProdukAction);
		redirect (base_url('/index.php/C_Gw/t_produk/'));


	}

	public function updateProduk($id){
		$createProduk = $this->M_Produk->getById($id);
		$lj = $this ->M_Produk -> getAllJenis();
		
		$temp['dataProduk'] = $createProduk;
		$temp['lj'] = $lj;
		$this->load->view('V_UpdateProduk', $temp);
	}


	public function updateProdukAction($id){
		$id_produk = $this->input->post('id_produk');
		$nama_produk = $this->input->post('nama_produk');
		$id_jenis_produk = $this->input->post('jenis_produk');
		$terjual_produk = $this->input->post('terjual_produk');

		$config['upload_path'] = './assets/bs/assets/images/';
		$config['allowed_types'] = 'JPG|PNG|gif|JPEG|jpg|jpeg|png';
		$config['max_size'] = 20000;
		$config['max_width'] = 20000;
		$config['max_height'] = 20000;


		$this->load->library('upload', $config);

		if( ! $this->upload->do_upload('userfile')){
			$foto_produk = $this->input->post('temp_foto');
		} else{
			$foto_produk = $this->upload->data('file_name');
		}
		
		$addProdukAction = array(
			'id_produk' => $id_produk,
			'nama_produk' => $nama_produk,
			'id_jenis_produk' => $id_jenis_produk,
			'foto_produk' => $foto_produk,
			'terjual_produk' => $terjual_produk
		);
		$this->M_Produk->editProduk($addProdukAction, $id);
		redirect (base_url('/index.php/C_Gw/t_produk/'));
	}

	public function addNominal($id){
		$lp = $this ->M_Produk -> getById($id);
		$temp['lp'] = $lp;
		$temp['id'] = $id;
		$this->load->view('V_AddNominal', $temp);
	}

	public function AddNominalAction($id) {
		$this-> load -> Model ('M_Nominal');

		$nama_nominal= $this->input->post('nama_nominal');
		$harga_nominal = $this->input->post('harga');
		$id_produk = $id;

		$addNominalAction = array(
			'nama_nominal' => $nama_nominal,
			'harga_nominal' => $harga_nominal,
			'id_produk' => $id_produk,
		);
		$this->M_Nominal->insertNominal($addNominalAction);
		redirect (base_url('/index.php/C_Gw/t_nominal/'). $id);
	}

	public function updateNominal($id){
		$this-> load -> Model ('M_Nominal');

		$ln = $this->M_Nominal -> getById($id);
		// $lp = $this ->M_Produk -> getById($id);
		$temp['ln'] = $ln;
		// $temp['lp'] = $lp;
		$temp['id'] = $id;
		$this->load->view('V_UpdateNominal', $temp);
	}

	public function updateNominalAction($id) {
		$this-> load -> Model ('M_Nominal');
		
		$id_nominal = $this->input->post('id_nominal');
		$nama_nominal= $this->input->post('nama_nominal');
		$harga_nominal = $this->input->post('harga');
		$id_produk = $this->input->post('id_produk');

		$updateNominalAction = array(
			'id_nominal' => $id_nominal,
			'nama_nominal' => $nama_nominal,
			'harga_nominal' => $harga_nominal,
			'id_produk' => $id_produk,
		);
		$this->M_Nominal->updateNominal($updateNominalAction, $id);
		redirect (base_url('/index.php/C_Gw/t_nominal/'). $id_produk);
	}

	public function addPembayaran(){
		$this->load->view('V_AddPembayaran');
	}

	public function addPembayaranAction(){
		$this-> load -> Model ('M_Metode_Pembayaran');

		$nama_metode = $this->input->post('nama_metode');

		$addPembayaranAction = array(
			'nama_metode' => $nama_metode,
		);

		$this->M_Metode_Pembayaran->insertPembayaran($addPembayaranAction);
		redirect (base_url('/index.php/C_Gw/t_metodePembayaran/'));
	}

	public function updatePembayaran($id){
		$this-> load -> Model ('M_Metode_Pembayaran');

		$lmp = $this ->M_Metode_Pembayaran -> getById($id);
		$temp['lmp'] = $lmp;
		$this->load->view('V_UpdatePembayaran', $temp);
	}

	public function updatePembayaranAction($id){
		$this-> load -> Model ('M_Metode_Pembayaran');

		$id_metode = $this->input->post('id_metode');
		$nama_metode = $this->input->post('nama_metode');

		$updatePembayaranAction = array(
			'id_metode_pembayaran' => $id_metode,
			'nama_metode' => $nama_metode,
		);
		
		$this->M_Metode_Pembayaran->updatePembayaran($updatePembayaranAction, $id);
		redirect (base_url('/index.php/C_Gw/t_metodePembayaran/'));
	}


	public function __construct() {
        parent::__construct();
        $this->load->model('M_Login_Admin');
        $this->load->library('form_validation');
    }

    public function index_login()
    {
        if ($this->input->post('submit')) {
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            
            if ($this->form_validation->run()) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                
                $login_success = $this->M_Login_Admin->login_admin($username, $password);

                if ($login_success) {
                    
                    redirect('V_Home');
                } else {
                    
                    $data['error'] = 'Invalid username or password';
                    $this->load->view('V_Login_Admin', $data);
                }
            } else {
                
                $this->load->view('V_Login_Admin');
            }
        } else {
            
            $this->load->view('V_Login_Admin');
        }
    }


}
