<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kegiatan extends CI_model {

  public function get($id = null)
  {
    $this->db->from('kegiatan');
    if ($id != null) {
      $this->db->where('kegiatan_id',$id);
    }
    $this->db->order_by('kegiatan_id', 'asc');
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'foto' => $post['foto'],
      'created' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('kegiatan', $params);
  }

  public function edit($post)
  {
    $params = [
      'judul' => $post['judul'],
      'isi' => $post['isi'],
      'updated' => date('Y-m-d H:i:s')
    ];
    if($post['foto'] != null) {
      $params['foto'] = $post['foto'];
    }
    $this->db->where('kegiatan_id', $post['kegiatan_id']);
    $this->db->update('kegiatan', $params);
  }

  function cek_judul($code, $id = null)
  {
    $this->db->from('kegiatan');
    $this->db->where('kegiatan', $code);
    if($id != null){
      $this->db->where('kegiatan_id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('kegiatan_id', $id);
    $this->db->delete('kegiatan');
	}

  // Frontend

	function jrs_detail($kegiatan_id)
  {
		$this->db->where('kegiatan_id', $kegiatan_id);
		return $this->db->get('kegiatan');
	}

}
