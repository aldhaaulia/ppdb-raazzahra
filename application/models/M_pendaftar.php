<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendaftar extends CI_model {

  private $redirect = 'dashboard/pendaftar';

  public function get($id = null)
  {
    $this->db->from('pendaftar');
    if ($id != null) {
      $this->db->where('pendaftar_id',$id);
    }
    $this->db->order_by('pendaftar_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'nik' => $post['nik'],
      'nama_siswa' => $post['nama_siswa'],
      'panggilan_siswa' => $post['panggilan_siswa'],
      'no_kk' => $post['no_kk'],
      'tempat_lahir' => $post['tempat_lahir'],
      'tgl_lahir' => $post['tgl_lahir'],
      'anak' => $post['anak'],
      'jk' => $post['jk'],
      'agama' => $post['agama'],
      'alamat' => $post['alamat'],
      'tinggi_bdn' => $post['tinggi_bdn'],
      'berat_bdn' => $post['berat_bdn'],
      'penyakit' => $post['penyakit'],
      'hobi' => $post['hobi'],
      'baju' => $post['baju'],
      'kendaraan' => $post['kendaraan'],
      'nama_ayah' => $post['nama_ayah'],
      'nikayah' => $post['nikayah'],
      'pendidikan_ay' => $post['pendidikan_ay'],
      'pekerjaan_ay' => $post['pekerjaan_ay'],
      'penghasilan_ay' => $post['penghasilan_ay'],
      'agama_ay' => $post['agama_ay'],
      'no_hpay' => $post['no_hpay'],
      'nama_ibu' => $post['nama_ibu'],
      'nikibu' => $post['nikibu'],
      'pendidikan_ibu' => $post['pendidikan_ibu'],
      'pekerjaan_ibu' => $post['pekerjaan_ibu'],
      'penghasilan_ibu' => $post['penghasilan_ibu'],
      'agama_ibu' => $post['agama_ibu'],
      'no_hpibu' => $post['no_hpibu'],
      'nama_wali' => $post['nama_wali'],
      'alamat_org' => $post['alamat_org'],
      'foto3x4' => $post['foto3x4'],
      'created_at' => date('Y-m-d H:i:s')
    ];
    if (!empty($_FILES['scan_akte']['name'])) {
      $upload = $this->_do_uploadakte();
      $params['scan_akte'] = $upload;
    }
      if (!empty($_FILES['scan_kk']['name'])) {
      $upload = $this->_do_uploadkk();
      $params['scan_kk'] = $upload;
    }
    
    $this->db->insert('pendaftar', $params);
  }

  private function _do_uploadakte()
    {
    unset($config);
    $config['upload_path'] 		= './upload/pendaftar/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  204800;
    $config['file_name']    	=  'Scan Akte'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('scan_akte')) {
      $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
      redirect($this->redirect,'refresh');
    }
    return $this->upload->data('file_name');
    }

  private function _do_uploadkk()
    {
    unset($config);
    $config['upload_path'] 		= './upload/pendaftar/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size']    		=  204800;
    $config['file_name']    	=  'Scan Kartu Keluarga'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('scan_kk')) {
      $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
      redirect($this->redirect,'refresh');
    }
    return $this->upload->data('file_name');
    }

  public function edit($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'nik' => $post['nik'],
      'nama_siswa' => $post['nama_siswa'],
      'panggilan_siswa' => $post['panggilan_siswa'],
      'no_kk' => $post['no_kk'],
      'tempat_lahir' => $post['tempat_lahir'],
      'tgl_lahir' => $post['tgl_lahir'],
      'anak' => $post['anak'],
      'jk' => $post['jk'],
      'agama' => $post['agama'],
      'alamat' => $post['alamat'],
      'tinggi_bdn' => $post['tinggi_bdn'],
      'berat_bdn' => $post['berat_bdn'],
      'penyakit' => $post['penyakit'],
      'hobi' => $post['hobi'],
      'baju' => $post['baju'],
      'kendaraan' => $post['kendaraan'],
      'nama_ayah' => $post['nama_ayah'],
      'nikayah' => $post['nikayah'],
      'pendidikan_ay' => $post['pendidikan_ay'],
      'pekerjaan_ay' => $post['pekerjaan_ay'],
      'penghasilan_ay' => $post['penghasilan_ay'],
      'agama_ay' => $post['agama_ay'],
      'no_hpay' => $post['no_hpay'],
      'nama_ibu' => $post['nama_ibu'],
      'nikibu' => $post['nikibu'],
      'pendidikan_ibu' => $post['pendidikan_ibu'],
      'pekerjaan_ibu' => $post['pekerjaan_ibu'],
      'penghasilan_ibu' => $post['penghasilan_ibu'],
      'agama_ibu' => $post['agama_ibu'],
      'no_hpibu' => $post['no_hpibu'],
      'nama_wali' => $post['nama_wali'],
      'alamat_org' => $post['alamat_org'],
      'updated_at' => date('Y-m-d H:i:s')
    ];
    if (!empty($post['foto3x4'])) {
      $params['foto3x4'] = $post['foto3x4'];
    }
    if (!empty($_FILES['scan_akte']['name'])) {
    $upload = $this->_do_uploadakte();
    $params['scan_akte'] = $upload;
    unlink("./upload/pendaftar/".$this->input->post('scan_akte'));
    }
    if (!empty($_FILES['scan_kk']['name'])) {
    $upload = $this->_do_uploadkk();
    $params['scan_kk'] = $upload;
    unlink("./upload/pendaftar/".$this->input->post('scan_kk'));
    }
    $this->db->where('pendaftar_id', $post['pendaftar_id']);
    $this->db->update('pendaftar', $params);
    }

  function cek_user_id($code, $id = null)
  {
    $this->db->from('pendaftar');
    $this->db->where('user_id', $code);
    if($id != null){
      $this->db->where('pendaftar_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('pendaftar_id', $id);
    $this->db->delete('pendaftar');
	}

  public function daftar($id)
  {
    $this->db->where('user_id', $id);
    return $this->db->get('pendaftar')->row_array();
  }

  // Frontend

}
