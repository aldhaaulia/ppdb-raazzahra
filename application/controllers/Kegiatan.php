<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	private $folder   = "backend/kegiatan/";
  private $foldertemplate   = "backend/";

	function __construct()
  {
    parent::__construct();
    $this->load->model(['M_kegiatan']);
  }

	public function index()
	{
		belum_login();
		cek_admin();
    $data = array(
      'page' => 'Kegiatan',
      'row'  => $this->M_kegiatan->get(),
    );
		$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
	}

	public function form()
	{
		belum_login();
		cek_admin();
		$kegiatan = new stdClass();
		$kegiatan->kegiatan_id = null;
		$kegiatan->judul = null;
		$kegiatan->isi = null;
		$kegiatan->foto = null;

		$data = array(
      'page' => 'Kegiatan',
			'subpage' => 'Add',
			'row' => $kegiatan
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
	}

	public function edit($id)
	{
		belum_login();
		cek_admin();
		$query = $this->M_kegiatan->get($id);
		if ($query->num_rows() > 0) {
			$kegiatan = $query->row();

			$data = array(
        'page' => 'Kegiatan',
				'subpage' => 'Edit',
				'row' => $kegiatan,
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('kegiatan');
		}

	}

	public function process()
	{
		belum_login();
		cek_admin();
		$config['upload_path'] 		= './upload/kegiatan/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  2048;
		$config['file_name']    	=  'kegiatan-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Add'])) {
			if($this->M_kegiatan->cek_judul($post['judul'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai , silahkan ganti dengan yang berbeda");
				redirect('kegiatan/form');
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){
						$post['foto'] = $this->upload->data('file_name');
						$this->M_kegiatan->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('kegiatan');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('kegiatan/form');
					}
				}	else {
						$post['kegiatan'] = null;
						$this->M_kegiatan->add($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('kegiatan');
				}
			}
		}else if (isset($_POST['Edit'])) {
			if($this->M_kegiatan->cek_judul($post['judul'], $post['kegiatan_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Judul $post[judul] sudah dipakai, silahkan ganti dengan yang berbeda");
				redirect('kegiatan/edit/'.$post['galeri_id']);
			}else {
				if(@$_FILES['foto']['name'] != null){
					if($this->upload->do_upload('foto')){

						$kegiatan = $this->M_kegiatan->get($post['kegiatan_id']) -> row();
						if($kegiatan->foto != null) {
							$target_file = './upload/kegiatan/'.$kegiatan->foto;
							unlink($target_file);
						}

						$post['foto'] = $this->upload->data('file_name');
							$this->M_kegiatan->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('kegiatan');
					} else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						redirect('kegiatan/form');
					}
				}	else {
						$post['foto'] = null;
							$this->M_kegiatan->edit($post);
						if ($this->db->affected_rows() > 0) {
							$this->session->set_flashdata('success', 'Data berhasil disimpan');
						}
							redirect('kegiatan');
				}
			}
		}
		}

	public function del($id)
	{
		belum_login();
		cek_admin();
		$kegiatan = $this->M_kegiatan->get($id) -> row();
		if($kegiatan->foto != null) {
			$target_file = './upload/kegiatan/'.$kegiatan->foto;
			unlink($target_file);
		}
		$this->M_kegiatan->del($id);
		if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
    }
	    redirect('kegiatan');
	}


	// frontend
	private $frontend   = "frontend/kegiatan/";
  private $frontendtemplate   = "frontend/";

  public function foto()
  {
    $data['kegiatan_foto'] = $this->M_kegiatan->kegiatan_foto();
		$data['page'] = 'Kegiatan Foto';
    $this->template->load($this->frontendtemplate.'template',$this->frontend.'foto', $data);
  }

}
