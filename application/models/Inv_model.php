<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inv_model extends CI_Model
{

  function get_all_inv($start, $limit)
  {
    $this->db->select('a.*,b.jenis_investasi');
    $this->db->join('sub_inv b', 'a.kode_jenis = b.kode_jenis', 'left');

    $this->db->order_by('a.id', 'asc');


    return $this->db->get('investasi a', $start, $limit);
  }

  function get_inv_all()
  {
    $this->db->select('a.id,a.kode_rka,a.kode_kegiatan,a.kegiatan,a.alokasi_baru,a.sisa_alokasi_baru,a.alokasi_carry_over,a.sisa_alokasi_carry_over,a.keterangan,b.jenis_investasi');
    $this->db->join('sub_inv b', 'a.kode_jenis = b.kode_jenis', 'left');

    $this->db->order_by('a.id', 'asc');

    return $this->db->get('investasi a');
  }

  function get_keyword_inv($keyword)
  {
    $this->db->select('a.id,a.kode_rka,a.kode_jenis,a.kode_kegiatan,a.kegiatan,a.alokasi_baru,a.sisa_alokasi_baru,a.alokasi_carry_over,a.sisa_alokasi_carry_over,a.keterangan,b.jenis_investasi');
    $this->db->join('sub_inv b', 'a.kode_jenis = b.kode_jenis', 'left');

    $this->db->like('a.kegiatan', $keyword);
    $this->db->or_like('a.kode_rka', $keyword);
    $this->db->or_like('b.jenis_investasi', $keyword);

    return $this->db->get('investasi a');
  }

  function get_all_sub_inv()
  {
    $this->db->select('*');
    $this->db->order_by('id', 'asc');

    return $this->db->get('sub_inv');
  }

  function get_hardware_inv($id = 'JNS-001')
  {
    $this->db->select('SUM(alokasi_baru) AS alokasi_baru,SUM(alokasi_carry_over) AS alokasi_carry_over, SUM(sisa_alokasi_baru) as sisa_alokasi_baru,SUM(sisa_alokasi_carry_over) as sisa_alokasi_carry_over,');
    $this->db->where('kode_jenis', $id);

    return $this->db->get('investasi');
  }

  function get_software_inv($id = 'JNS-002')
  {
    $this->db->select('SUM(alokasi_baru) AS alokasi_baru,SUM(alokasi_carry_over) AS alokasi_carry_over, SUM(sisa_alokasi_baru) as sisa_alokasi_baru,SUM(sisa_alokasi_carry_over) as sisa_alokasi_carry_over');
    $this->db->where('kode_jenis', $id);

    return $this->db->get('investasi');
  }

  function sum_all_inv()
  {
    $this->db->select('SUM(alokasi_baru) AS alokasi_baru,SUM(alokasi_carry_over) AS alokasi_carry_over, SUM(sisa_alokasi_baru) as sisa_alokasi_baru,SUM(sisa_alokasi_carry_over) as sisa_alokasi_carry_over');

    return $this->db->get('investasi');
  }

  function create_id_inv()
  {
    $this->db->select('RIGHT(investasi.kode_kegiatan,3) as kode', false);
    $this->db->order_by('kode_kegiatan', 'desc');
    $this->db->limit(1);

    $query = $this->db->get('investasi');
    if ($query->num_rows() != 0) {
      $data = $query->row();
      $kode = intval($data->kode) + 1;
    } else {
      $kode = 1;
    }
    $idMax = str_pad($kode, 3, '0', STR_PAD_LEFT);
    $idFix = 'INV-' . $idMax;

    return $idFix;
  }

  function create_sub_inv()
  {
    $this->db->select('RIGHT(sub_inv.kode_jenis,3) as kode', false);
    $this->db->order_by('kode_jenis', 'desc');
    $this->db->limit(1);

    $query = $this->db->get('sub_inv');
    if ($query->num_rows() != 0) {
      $data = $query->row();
      $kode = intval($data->kode) + 1;
    } else {
      $kode = 1;
    }
    $idMax = str_pad($kode, 3, '0', STR_PAD_LEFT);
    $idFix = 'JNS-' . $idMax;

    return $idFix;
  }

  function get_row_inv($id)
  {
    $this->db->select('a.*,b.jenis_investasi');
    $this->db->join('sub_inv b', 'a.kode_jenis = b.kode_jenis', 'left');
    $this->db->where('a.id', $id);

    return $this->db->get('investasi a');
  }

  function get_row_sub_inv($id)
  {
    $this->db->select('*');
    $this->db->where('id', $id);

    return $this->db->get('sub_inv');
  }

  function add_inv($data = array())
  {
    $this->db->insert('investasi', $data);
    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  function add_sub_inv($data = array())
  {
    $this->db->insert('sub_inv', $data);
    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    } else {
      return false;
    }
  }

  function update_inv($id, $data = array())
  {
    $this->db->where('id', $id);
    $this->db->update('investasi', $data);

    $err = $this->db->error();
    if ($err['code'] !== 0) {
      return false;
    } else {
      return $this->db->affected_rows();
    }
  }

  function update_sub_inv($id, $data = array())
  {
    $this->db->where('id', $id);
    $this->db->update('sub_inv', $data);

    $err = $this->db->error();
    if ($err['code'] !== 0) {
      return false;
    } else {
      return $this->db->affected_rows();
    }
  }

  function delete_inv($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('investasi');

    $err = $this->db->error();
    if ($err['code'] !== 0) {
      return false;
    } else {
      return $this->db->affected_rows();
    }
  }

  function delete_sub_inv($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('sub_inv');

    $err = $this->db->error();
    if ($err['code'] !== 0) {
      return false;
    } else {
      return $this->db->affected_rows();
    }
  }
}

/* End of file Breakdown_model.php */
/* Location: ./application/models/Breakdown_model.php */
