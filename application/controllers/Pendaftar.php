<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {

	private $folder   = "backend/pendaftar/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_pendaftar','M_user']);
		$this->load->library(['pdf']);
  }

	public function index()
	{
		belum_login();
		cek_admin();
    $data = array(
      'page' => 'Pendaftar',
      'row'  => $this->M_pendaftar->get(),
	);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
		belum_login();
		cek_admin();
		$pendaftar = new stdClass();
		$pendaftar->pendaftar_id = null;
		$pendaftar->user_id = null;
		$pendaftar->nik = null;
		$pendaftar->nama_siswa = null;
		$pendaftar->panggilan_siswa = null;
		$pendaftar->no_kk = null;
		$pendaftar->tempat_lahir = null;
		$pendaftar->tgl_lahir = null;
		$pendaftar->anak = null;
		$pendaftar->jk = null;
		$pendaftar->agama = null;
		$pendaftar->alamat = null;
		$pendaftar->tinggi_bdn = null;
		$pendaftar->berat_bdn = null;
		$pendaftar->penyakit = null;
		$pendaftar->hobi = null;
		$pendaftar->baju = null;
		$pendaftar->kendaraan = null;
		$pendaftar->nama_ayah = null;
		$pendaftar->nikayah = null;
		$pendaftar->pendidikan_ay = null;
		$pendaftar->pekerjaan_ay = null;
		$pendaftar->penghasilan_ay = null;
		$pendaftar->agama_ay = null;
		$pendaftar->no_hpay = null;
		$pendaftar->nama_ibu = null;
		$pendaftar->nikibu = null;
		$pendaftar->pendidikan_ibu = null;
		$pendaftar->pekerjaan_ibu = null;
		$pendaftar->penghasilan_ibu = null;
		$pendaftar->agama_ibu = null;
		$pendaftar->no_hpibu = null;
		$pendaftar->nama_wali = null;
		$pendaftar->alamat_org = null;
		$pendaftar->foto3x4 = null;
		$pendaftar->scan_akte = null;
		$pendaftar->scan_kk = null;
		
		$data = array(
      'page' => 'Pendaftar',
			'subpage' => 'Add',
			'row' => $pendaftar,
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}

	public function edit($id)
	{
		belum_login();
		cek_admin();
		$query = $this->M_pendaftar->get($id);
		if ($query->num_rows() > 0) {
			$pendaftar = $query->row();

			$data = array(
        'page' => 'Pendaftar',
				'subpage' => 'Edit',
				'row' => $pendaftar,
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('pendaftar');
		}

	}

	public function process()
	{
		belum_login();
		cek_admin();
		$config['upload_path'] 		= './upload/pendaftar/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|pdf';
		$config['max_size']    		=  204800;
		$config['file_name']    	=  'Foto3x4-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) { //1
			if($this->M_pendaftar->cek_user_id($post['user_id'])->num_rows() > 0){ //2
				$this->session->set_flashdata('error', "User id $post[user_id] sudah dipakai , silahkan ganti dengan yang berbeda");
				redirect('pendaftar/form');
			}else { //2 /3
				if(@$_FILES['foto3x4']['name'] != null){ // 4
					if($this->upload->do_upload('foto3x4')){ //5
						$post['foto3x4'] = $this->upload->data('file_name');
						$this->M_pendaftar->add($post);
						if ($this->db->affected_rows() > 0) { //6
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						} //6
							redirect('pendaftar');
					} else { //5 /7
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pendaftar/form');
					} //7
				}	else { //4 /8
						$post['foto3x4'] = null;
						$this->M_pendaftar->add($post);
						if ($this->db->affected_rows() > 0) { //9
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						} //10
							redirect('pendaftar');
				} //8
			} //3
		}else if (isset($_POST['Edit'])) { //11
			if($this->M_pendaftar->cek_user_id($post['user_id'], $post['pendaftar_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "User Id $post[user_id] sudah dipakai, silahkan ganti dengan yang berbeda");
				redirect('pendaftar/edit/'.$post['pendaftar_id']);
			}else {
				if(@$_FILES['foto3x4']['name'] != null){
					if($this->upload->do_upload('foto3x4')){
						$pendaftar = $this->M_pendaftar->get($post['pendaftar_id']) -> row();
						if($pendaftar->foto3x4 != null) {
							$target_file = './upload/pendaftar/'.$pendaftar->foto3x4;
							unlink($target_file);
						}
						$post['foto3x4'] = $this->upload->data('file_name');
							$this->M_pendaftar->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pendaftar');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pendaftar/form');
					}
				}	else {
						$post['foto'] = null;
							$this->M_pendaftar->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('pendaftar');
				}
			}
		}
		}

		public function cetak_formulir_adm($id)
			{
				belum_login();
				ob_start();
				$pdf = new FPDF('P','mm',array(215,330));
						 // membuat halaman baru
						 $pdf->AddPage();
						 $pdf->Image('./assets/backend/assets/images/kopazzahra.jpg',0,0,-165);
						 // setting jenis font yang akan digunakan
						 $pdf->Cell(10,45,'',0,1);
						 $pdf->SetFont('Times','B',14);
						 // mencetak string
						 $pdf->Cell(200,6,'FORMULIR PENDAFTARAN',0,1,'C');
						 $pdf->Cell(200,6,'PENERIMAAN PESERTA DIDIK BARU (PPDB)',0,1,'C');
						 $pdf->Cell(200,6,'TAHUN PELAJARAN '.date('Y').'/'.(date('Y')+1),0,1,'C');
						 $pdf->SetFont('Times','B',12);
						 // $pdf->Cell(190,6,'Tanggal Cetak : '.date('d-m-Y H:i'),0,1,'C');

						 // Memberikan space kebawah agar tidak terlalu rapat
						 $pdf->Cell(10,8,'',0,1);
						 $pdf->SetFont('Times','B',12);

						 $id  = $this->uri->segment(3);
						 $data= $this->M_pendaftar->daftar($id);

						 //$pdf->SetY(75);
						 //$pdf->Cell(7,7,'');
						 //$pdf->Cell(70,7,'NOMOR PENDAFTARAN');
						 //$pdf->Cell(7,7,':');
						 //$pdf->Cell(65,7,$data['id_jurusan'].'-'.date("d-m-Y", strtotime($data['created_at'])).'-'.$data['pendaftar_id'].'-'.$data['user_id']);
						 //jurusan-hari-bulan-tahun-id_pendaftar-user_id
						 $pdf->SetY(80);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'A. IDENTITAS CALON SISWA');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(85);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. NIK');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['nik']);

						 $pdf->SetY(90);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'2. Nama Lengkap Siswa');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_siswa']));

						 $pdf->SetY(95);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Nama Panggilan Siswa');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['panggilan_siswa']));

						 $pdf->SetY(100);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'4. No. Kartu Keluarga');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,($data['no_kk']));

						 $pdf->SetY(105);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'5. Tempat, Tanggal Lahir');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['tempat_lahir']).','.$data['tgl_lahir']);

						 $pdf->SetY(110);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'6. Anak Ke');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['anak']));

						 $pdf->SetY(115);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'7. Jenis Kelamin');
						 $pdf->Cell(7,7,':');
						 if ($data['jk'] == "L") {
							 $pdf->Cell(65,7,'LAKI-LAKI');
						 }else{
							 $pdf->Cell(65,7,'PEREMPUAN');
						 }

						 $pdf->SetY(120);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'8. Agama');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['agama']));

						 $pdf->SetY(125);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'9. Alamat Siswa');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['alamat']));

						 $pdf->SetY(130);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'10. Tinggi, Berat Badan');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['tinggi_bdn']).','.$data['berat_bdn']);

						 $pdf->SetY(135);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'11. Kelainan/Penyakit');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['penyakit'].'/'.$data['penyakit']);

						 $pdf->SetY(140);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'12. Hobi');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['hobi']));

						 $pdf->SetY(145);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'13. Ukuran Baju');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['baju']));

						 $pdf->SetY(150);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'14. Kendaraan Ke Sekolah');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['kendaraan']));
						
						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(160);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'B. IDENTITAS ORANG TUA/WALI');

						 $pdf->SetY(165);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Ayah');

						 $pdf->SetY(170);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Nama Ayah ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_ayah']));

						 $pdf->SetY(175);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. NIK ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nikayah']));

						 $pdf->SetY(180);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'c. Pendidikan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['pendidikan_ay']));

						 $pdf->SetY(185);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'d. Pekerjaan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['pekerjaan_ay']));

						 $pdf->SetY(190);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'d. Penghasilan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['penghasilan_ay']));

						 $pdf->SetY(195);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'e. Agama');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['agama_ay']));

						 $pdf->SetY(200);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'f. No. Hp');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['no_hpay']));

						 $pdf->SetY(205);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'2. Ibu');

						 $pdf->SetY(210);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Nama Ibu');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_ibu']));

						 $pdf->SetY(215);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. NIK ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nikibu']));

						 $pdf->SetY(220);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'c. Pendidikan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['pendidikan_ibu']));

						 $pdf->SetY(225);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'c. Pekerjaan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['pekerjaan_ibu']));

						 $pdf->SetY(230);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'d. Penghasilan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['penghasilan_ibu']));

						 $pdf->SetY(235);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'e. Agama');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['agama_ibu']));

						 $pdf->SetY(240);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'f. No. Hp');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['no_hpibu']));

						 $pdf->SetY(245);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Wali');

						 $pdf->SetY(250);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Nama Wali');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_wali']));

						 $pdf->SetY(255);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. Alamat Orang Tua/Wali Murid');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['alamat_org']));

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(265);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'Bersedia mengikuti Tata Tertib / Aturan yang berlaku di Raudhatul Athfal Az Zahra.');

						 if ($data['foto3x4'] != null) {
							 $pdf->Image('./upload/pendaftar/'.$data['foto3x4'],170,70,28,38);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b> Edit dan Upload Foto 3x4</b>, Terimakasih");
				 			redirect('pendaftar');
						 }

						 $pdf->SetY(280);
						 $pdf->SetX(25);
						 $pdf->Cell(100,7,'Petugas Pendaftar');

						 $pdf->SetY(300);
						 $pdf->SetX(25);
						 $pdf->Cell(100,7,'(............................)');

						 $pdf->SetY(280);
						 $pdf->SetX(125);
						 $pdf->Cell(50,7,'Orang Tua/Wali');

						 $pdf->SetY(300);
						 $pdf->SetX(125);
						 $pdf->Cell(50,7,$data['nama_ayah']);

						 $pdf->AddPage();
						 if ($data['scan_akte'] != null) {
							 $pdf->Image('./upload/pendaftar/'.$data['scan_akte'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Akte</b>, Terimakasih");
 				 			redirect('pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_kk'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_kk'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Kartu Keluarga</b>, Terimakasih");
							redirect('pendaftar');
						 }

						 $pdf->Output('Data Pendaftar tgl:'.date('Y-m-d H:i:s').'.pdf','D');
						// I: send the file inline to the browser. The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
						// D: send to the browser and force a file download with the name given by name.
						// F: save to a local file with the name given by name (may include a path).
						// S: return the document as a string. name is ignored.
				// 		 $this->redirect('refresh');
			}


	public function del($id)
	{
		belum_login();
		cek_admin();
		$pendaftar = $this->M_pendaftar->get($id) -> row();

		unlink('./upload/pendaftar/'.$pendaftar->foto3x4);
		unlink('./upload/pendaftar/'.$pendaftar->scan_akte);
		unlink('./upload/pendaftar/'.$pendaftar->scan_kk);

		$this->M_pendaftar->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('pendaftar');
	}


	// frontend
	public function edit_usr($id)
	{
		belum_login();
		$query = $this->M_user->get($id);
		if ($query->num_rows() > 0) {
			$user = $query->row();
			$data = array(
        'page' => 'User',
				'subpage' => 'Edit',
				'row' => $user,
				'img'  => $this->M_pendaftar->get(),
			);
			$this->template->load($this->foldertemplate.'template2',$this->folder.'edit_usr', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('dashboard/pendaftar');
		}
	}

		public function process_edit_usr()
		{
			belum_login();
			$post = $this->input->post(null, TRUE);
			if (isset($_POST['Edit'])) {
				$this->M_user->edit($post);
			}
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
			}
			redirect('dashboard/pendaftar');
			}


	public function form_reg()
	{
		belum_login();
		$pendaftar = new stdClass();
		$pendaftar->pendaftar_id = null;
		$pendaftar->user_id = null;
		$pendaftar->nik = null;
		$pendaftar->nama_siswa = null;
		$pendaftar->panggilan_siswa = null;
		$pendaftar->no_kk = null;
		$pendaftar->tempat_lahir = null;
		$pendaftar->tgl_lahir = null;
		$pendaftar->anak = null;
		$pendaftar->jk = null;
		$pendaftar->agama = null;
		$pendaftar->alamat = null;
		$pendaftar->tinggi_bdn = null;
		$pendaftar->berat_bdn = null;
		$pendaftar->penyakit = null;
		$pendaftar->hobi = null;
		$pendaftar->baju = null;
		$pendaftar->kendaraan = null;
		$pendaftar->nama_ayah = null;
		$pendaftar->nikayah = null;
		$pendaftar->pendidikan_ay = null;
		$pendaftar->pekerjaan_ay = null;
		$pendaftar->penghasilan_ay = null;
		$pendaftar->agama_ay = null;
		$pendaftar->no_hpay = null;
		$pendaftar->nama_ibu = null;
		$pendaftar->nikibu = null;
		$pendaftar->pendidikan_ibu = null;
		$pendaftar->pekerjaan_ibu = null;
		$pendaftar->penghasilan_ibu = null;
		$pendaftar->agama_ibu = null;
		$pendaftar->no_hpibu = null;
		$pendaftar->nama_wali = null;
		$pendaftar->alamat_org = null;
		$pendaftar->foto3x4 = null;
		$pendaftar->scan_akte = null;
		$pendaftar->scan_kk = null;

		$data = array(
      'page' => 'Pendaftar',
			'subpage' => 'Add',
			'row' => $pendaftar,
			'img'  => $this->M_pendaftar->get(),
		);
		$this->template->load($this->foldertemplate.'template2',$this->folder.'form_reg', $data);
	}

	public function daftar_edit($id)
	{
		belum_login();
		$query = $this->M_pendaftar->get($id);
		if ($query->num_rows() > 0) {
			$pendaftar = $query->row();

			$data = array(
        'page' => 'Pendaftar',
				'subpage' => 'Edit',
				'row' => $pendaftar,
				'img'  => $this->M_pendaftar->get(),
			);
			$this->template->load($this->foldertemplate.'template2',$this->folder.'form_reg', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('dashboard/pendaftar');
		}

	}

	public function daftar()
	{
		belum_login();
		$config['upload_path'] 		= './upload/pendaftar/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg|pdf';
		$config['max_size']    		=  204800;
		$config['file_name']    	=  'Foto3x4-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) { //1
			if($this->M_pendaftar->cek_user_id($post['user_id'])->num_rows() > 0){ //2
				$this->session->set_flashdata('error', "Kamu sudah terdaftar, silahkan lakukan pengeditan apabila ada data yang belum lengkap");
				redirect('pendaftar/form_reg');
			}else { //2 /3
				if(@$_FILES['foto3x4']['name'] != null){ // 4
					if($this->upload->do_upload('foto3x4')){ //5
						$post['foto3x4'] = $this->upload->data('file_name');
						$this->M_pendaftar->add($post);
						if ($this->db->affected_rows() > 0) { //6
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						} //6
							redirect('dashboard/pendaftar');
					} else { //5 /7
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pendaftar/form_reg');
					} //7
				}	else { //4 /8
						$post['foto3x4'] = null;
						$this->M_pendaftar->add($post);
						if ($this->db->affected_rows() > 0) { //9
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						} //10
							redirect('dashboard/pendaftar');
				} //8
			} //3
		}else if (isset($_POST['Edit'])) { //11
				if(@$_FILES['foto3x4']['name'] != null){
					if($this->upload->do_upload('foto3x4')){
						$pendaftar = $this->M_pendaftar->get($post['pendaftar_id']) -> row();
						if($pendaftar->foto3x4 != null) {
							$target_file = './upload/pendaftar/'.$pendaftar->foto3x4;
							unlink($target_file);
						}
						$post['foto3x4'] = $this->upload->data('file_name');
							$this->M_pendaftar->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('dashboard/pendaftar');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('pendaftar/form_reg');
					}
				}	else {
						$post['foto'] = null;
							$this->M_pendaftar->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('dashboard/pendaftar');
				}
			}
		}


	public function cetak_formulir()
      {
		belum_login();
        ob_start();
        $pdf = new FPDF('P','mm',array(215,330));
             // membuat halaman baru
             $pdf->AddPage();
             $pdf->Image('./assets/backend/assets/images/kopazzahra.jpg',0,0,-160);
             // setting jenis font yang akan digunakan
             $pdf->Cell(10,45,'',0,1);
             $pdf->SetFont('Times','B',14);
             // mencetak string
             $pdf->Cell(200,6,'FORMULIR PENDAFTARAN',0,1,'C');
						 $pdf->Cell(200,6,'PENERIMAAN PESERTA DIDIK BARU (PPDB)',0,1,'C');
						 $pdf->Cell(200,6,'TAHUN PELAJARAN '.date('Y').'/'.(date('Y')+1),0,1,'C');
             $pdf->SetFont('Times','B',12);
             // $pdf->Cell(190,6,'Tanggal Cetak : '.date('d-m-Y H:i'),0,1,'C');

             // Memberikan space kebawah agar tidak terlalu rapat
             $pdf->Cell(10,8,'',0,1);
             $pdf->SetFont('Times','B',12);

             $id  = $this->fungsi->user_login()->id;
             $data= $this->M_pendaftar->daftar($id);

						// $pdf->SetY(75);
						 //$pdf->Cell(7,7,'');
						 //$pdf->Cell(70,7,'NOMOR PENDAFTARAN');
						 //$pdf->Cell(7,7,':');
						 //$pdf->Cell(65,7,$data['id_jurusan'].'-'.date("d-m-Y", strtotime($data['created_at'])).'-'.$data['pendaftar_id'].'-'.$data['user_id']);
						 //jurusan-hari-bulan-tahun-id_pendaftar-user_id
						 $pdf->SetY(80);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'A. IDENTITAS CALON SISWA');

						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(85);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. NIK');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['nik']);

						 $pdf->SetY(90);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'2. Nama Lengkap Siswa');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_siswa']));

						 $pdf->SetY(95);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Nama Panggilan Siswa');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['panggilan_siswa']));

						 $pdf->SetY(100);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'4. No. Kartu Keluarga');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,($data['no_kk']));

						 $pdf->SetY(105);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'5. Tempat, Tanggal Lahir');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['tempat_lahir']).','.$data['tgl_lahir']);

						 $pdf->SetY(110);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'6. Anak Ke');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['anak']));

						 $pdf->SetY(115);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'7. Jenis Kelamin');
						 $pdf->Cell(7,7,':');
						 if ($data['jk'] == "L") {
							 $pdf->Cell(65,7,'LAKI-LAKI');
						 }else{
							 $pdf->Cell(65,7,'PEREMPUAN');
						 }

						 $pdf->SetY(120);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'8. Agama');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['agama']));

						 $pdf->SetY(125);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'9. Alamat Siswa');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['alamat']));

						 $pdf->SetY(130);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'10. Tinggi, Berat Badan');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['tinggi_bdn']).','.$data['berat_bdn']);

						 $pdf->SetY(135);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'11. Kelainan/Penyakit');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,$data['penyakit'].'/'.$data['penyakit']);

						 $pdf->SetY(140);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'12. Hobi');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['hobi']));

						 $pdf->SetY(145);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'13. Ukuran Baju');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['baju']));

						 $pdf->SetY(150);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'14. Kendaraan Ke Sekolah');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['kendaraan']));
						
						 $pdf->SetFont('Times','',12);
						 $pdf->SetY(160);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'B. IDENTITAS ORANG TUA/WALI');

						 $pdf->SetY(165);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'1. Ayah');

						 $pdf->SetY(170);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Nama Ayah ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_ayah']));

						 $pdf->SetY(175);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. NIK ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nikayah']));

						 $pdf->SetY(180);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'c. Pendidikan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['pendidikan_ay']));

						 $pdf->SetY(185);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'d. Pekerjaan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['pekerjaan_ay']));

						 $pdf->SetY(190);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'d. Penghasilan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['penghasilan_ay']));

						 $pdf->SetY(195);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'e. Agama');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['agama_ay']));

						 $pdf->SetY(200);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'f. No. Hp');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['no_hpay']));

						 $pdf->SetY(205);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'2. Ibu');

						 $pdf->SetY(210);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Nama Ibu');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_ibu']));

						 $pdf->SetY(215);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. NIK ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nikibu']));

						 $pdf->SetY(220);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'c. Pendidikan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['pendidikan_ibu']));

						 $pdf->SetY(225);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'c. Pekerjaan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['pekerjaan_ibu']));

						 $pdf->SetY(230);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'d. Penghasilan ');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['penghasilan_ibu']));

						 $pdf->SetY(235);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'e. Agama');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['agama_ibu']));

						 $pdf->SetY(240);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'f. No. Hp');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['no_hpibu']));

						 $pdf->SetY(245);
						 $pdf->Cell(12,7,'');
						 $pdf->Cell(65,7,'3. Wali');

						 $pdf->SetY(250);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'a. Nama Wali');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['nama_wali']));

						 $pdf->SetY(255);
						 $pdf->Cell(16,7,'');
						 $pdf->Cell(61,7,'b. Alamat Orang Tua/Wali Murid');
						 $pdf->Cell(7,7,':');
						 $pdf->Cell(65,7,strtoupper($data['alamat_org']));

						 $pdf->SetFont('Times','B',12);
						 $pdf->SetY(265);
						 $pdf->Cell(7,7,'');
						 $pdf->Cell(65,7,'Bersedia mengikuti Tata Tertib / Aturan yang berlaku di Raudhatul Athfal Az Zahra.');

						 if ($data['foto3x4'] != null) {
							 $pdf->Image('./upload/pendaftar/'.$data['foto3x4'],170,70,28,38);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b> Edit dan Upload Foto 3x4</b>, Terimakasih");
				 			redirect('pendaftar');
						 }

						 $pdf->SetY(280);
						 $pdf->SetX(25);
						 $pdf->Cell(100,7,'Petugas Pendaftar');

						 $pdf->SetY(300);
						 $pdf->SetX(25);
						 $pdf->Cell(100,7,'(............................)');

						 $pdf->SetY(280);
						 $pdf->SetX(125);
						 $pdf->Cell(50,7,'Orang Tua/Wali');

						 $pdf->SetY(300);
						 $pdf->SetX(125);
						 $pdf->Cell(50,7,$data['nama_ayah']);

						 $pdf->AddPage();
						 if ($data['scan_akte'] != null) {
							 $pdf->Image('./upload/pendaftar/'.$data['scan_akte'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Akte</b>, Terimakasih");
 				 			redirect('dashboard/pendaftar');
						 }

						 $pdf->AddPage();
						 if ($data['scan_kk'] != null) {
						 $pdf->Image('./upload/pendaftar/'.$data['scan_kk'],5,5,200,0);
						 }else{
							$this->session->set_flashdata('error', "Silahkan lengkapi Data Pendaftaran anda lakukan <b>Edit dan Upload Scan Kartu Keluarga</b>, Terimakasih");
							redirect('dashboard/pendaftar');
						 }

						 $pdf->Output('Data Pendaftar tgl:'.date('Y-m-d H:i:s').'.pdf','D');
						// I: send the file inline to the browser. The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
						// D: send to the browser and force a file download with the name given by name.
						// F: save to a local file with the name given by name (may include a path).
						// S: return the document as a string. name is ignored.
				// 		 $this->redirect('refresh');
      }
}
