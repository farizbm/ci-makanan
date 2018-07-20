<?php 
	class Data extends CI_Controller {
		function __construct()
		{
			parent::__construct();
			$this->load->model('data_model');
		}

		function index()
		{
			$this->load->view('common');
			$this->load->view('makanan');
		}

		function pesanan()
		{
			$this->load->view('common');
			$this->load->view('pesanan');
		}

		function makanan_list() {
			$data = $this->data_model->makanan_list();
			echo json_encode($data);
		}

		function makanan_list_detail() {
			$data = $this->data_model->makanan_list_detail();
			echo json_encode($data);
		}

		function transaksi_list() {
			$data = $this->data_model->transaksi_list();
			echo json_encode($data);
		}

		function makanan_save() {
			$data = $this->data_model->makanan_save();
			echo json_encode($data);
		}

		function transaksi_save() {
			$data = $this->data_model->transaksim_save();
			echo json_encode($data);
		}

		function makanan_edit(){
			$data=$this->data_model->makanan_edit();
			echo json_encode($data);
		}

		function makanan_delete(){
			$data=$this->data_model->makanan_delete();
			echo json_encode($data);
		}

		function makanan_flag(){
			$data=$this->data_model->makanan_flag();
			echo json_encode($data);
		}
		function getbykat_makanan(){
			$data=$this->data_model->getbykat_makanan();
			echo json_encode($data);
		}

		function kategori_makanan() {
			$data = $this->data_model->kategori_makanan();
			echo json_encode($data);
		}
	}
 ?>