<?php 

	class User_auth extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('login_model');
		}
		function index(){
			$this->load->view('login');
		}
		function login_process(){

			$data = $this->login_model->login();

			if($data){
				$this->session->set_userdata('username', $this->input->post('username'));
				echo 1;
			}else{
				echo 0;
			}

		}
		function logout(){
			$this->session->unset_userdata('username');
			redirect('user_auth','refresh');
		}
	}
 ?>