<?php 
	class Data_model extends CI_Model {
		function makanan_list() {
			$result = $this->db->get('pesanan');
			return $result->result();
		}
		function makanan_list_detail() {
			$idnota = $this->input->post('nota');
			//$idnota = 2;
			//$this->db->where('nota', $idnota);
			//$result = $this->db->get('dtransaksi');
			$result = $this->db->query("SELECT dtransaksi.nota, dtransaksi.jumlah, dtransaksi.id_mkn, pesanan.id_mkn, pesanan.nama FROM dtransaksi, pesanan WHERE dtransaksi.nota = ".$idnota." AND dtransaksi.id_mkn = pesanan.id_mkn");
			return $result->result();
		}

		function pesanan_list() {
			$result = $this->db->get('transaksi');
			return $result->result();
		}

		function makanan_save(){
			$data = array(
					'nama' => $this->input->post('nama'),
					'hrg' => $this->input->post('harga'),
					'status' => $this->input->post('status'),
					'id_kategori' => $this->input->post('kategori'),
				);
			$result = $this->db->insert('pesanan', $data);
			return $result;
		}

		function transaksim_save(){
			$data = array(
					'nota' => $this->input->post('nota'),
					'id_mkn' => $this->input->post('nama'),
					'jumlah' => $this->input->post('jumlah'),
				);
			$result = $this->db->insert('dtransaksi', $data);
			return $result;
		}

		function makanan_edit() {
			$id=$this->input->post('id');
			$nama=$this->input->post('nama');
			$harga=$this->input->post('harga');
	
			$this->db->set('nama', $nama);
			$this->db->set('hrg', $harga);
			$this->db->where('id_mkn', $id);
			$result=$this->db->update('pesanan');
			return $result;
		}

		function makanan_delete(){
			$id=$this->input->post('id_mkn');
			$this->db->where('id_mkn', $id);
			$result=$this->db->delete('pesanan');
			return $result;
		}

		function makanan_flag() {
			$id =$this->input->post('id');
			$flag =$this->input->post('status');

			if($flag == 'Tersedia'){
				$this->db->set('status', 0);
			}else{
				$this->db->set('status', 1);
			}
	
			$this->db->where('id_mkn', $id);
			$result=$this->db->update('pesanan');
			return $result;
		}
		function getbykat_makanan(){
			$id=$this->input->post('id');

		    $this->db->where('id_mkn', $id );
			$result = $this->db->get('pesanan');
			return $result->result();
		}

		
	}
 ?>