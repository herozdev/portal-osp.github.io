<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengadaan_model extends CI_Model
{

	public function get_all_pengadaan_inv($start, $limit)
	{
		$this->db->select('a.id,a.no_ip,b.kode_jenis,b.kode_kegiatan,a.rincian,a.nilai_ip,a.tgl_ip,a.nodin_pbj,a.no_spk,a.nilai_spk,a.spk_now,a.pemutus,a.vendor,a.year_now,a.tgl_nodin_pbj,a.tgl_spk,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.uker,a.jangka_awal_spk,a.jangka_akhir_spk,c.jenis_investasi,d.tahun,d.anggaran,e.tahun_spk,e.anggaran_spk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,b.kegiatan,g.firstname,a.files');
		$this->db->join('investasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_inv c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('tahun_anggaran d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('fiat_inv f', 'a.id = f.id_pengadaan_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->group_by('a.id', 'asc');

		return $this->db->get('pengadaan a', $start, $limit);
	}

	public function get_monitoring_hw($id = 'JNS-001')
	{
		$this->db->select('a.id,a.no_ip,b.kode_jenis,b.kode_kegiatan,a.rincian,a.nilai_ip,a.tgl_ip,a.nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.pemutus,a.vendor,SUM(a.year_now) as year_now,a.tgl_nodin_pbj,a.tgl_spk,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.uker,a.jangka_awal_spk,a.jangka_akhir_spk,c.jenis_investasi,d.tahun,d.anggaran,e.tahun_spk,e.anggaran_spk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,b.kegiatan,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('investasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_inv c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('tahun_anggaran d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('fiat_inv f', 'a.id = f.id_pengadaan_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $id);

		return $this->db->get('pengadaan a');
	}

	public function get_monitoring_sw($id = 'JNS-002')
	{
		$this->db->select('a.id,a.no_ip,b.kode_jenis,b.kode_kegiatan,a.rincian,a.nilai_ip,a.tgl_ip,a.nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.pemutus,a.vendor,SUM(a.year_now) as year_now,a.tgl_nodin_pbj,a.tgl_spk,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.uker,a.jangka_awal_spk,a.jangka_akhir_spk,c.jenis_investasi,d.tahun,d.anggaran,e.tahun_spk,e.anggaran_spk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,b.kegiatan,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('investasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_inv c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('tahun_anggaran d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('fiat_inv f', 'a.id = f.id_pengadaan_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $id);

		return $this->db->get('pengadaan a');
	}

	public function get_all_data_peng_inv()
	{
		$this->db->select('a.id,a.no_ip,b.kode_jenis,b.kode_kegiatan,a.rincian,a.nilai_ip,a.tgl_ip,a.nodin_pbj,a.no_spk,a.nilai_spk,a.spk_now,a.pemutus,a.vendor,a.year_now,a.tgl_nodin_pbj,a.tgl_spk,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.uker,a.jangka_awal_spk,a.jangka_akhir_spk,c.jenis_investasi,d.tahun,d.anggaran,e.tahun_spk,e.anggaran_spk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,b.kegiatan,g.firstname,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.files');
		$this->db->join('investasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_inv c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('tahun_anggaran d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('fiat_inv f', 'a.id = f.id_pengadaan_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->group_by('a.id', 'asc');

		return $this->db->get('pengadaan a');
	}

	public function get_anggaran_inv($id = '')
	{
		$this->db->select('a.id,b.id,a.tahun,a.anggaran,c.kode_rka,b.no_ip,b.uker,b.kode_jenis,b.rincian, b.kode_kegiatan,b.nilai_ip,b.year_now,b.tgl_ip,b.pemutus,b.jangka_waktu_awal,b.jangka_waktu_akhir,b.nodin_pbj,b.tgl_nodin_pbj,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jangka_awal_spk,b.jangka_akhir_spk,d.jenis_investasi,c.kegiatan');
		$this->db->join('pengadaan b', 'a.id_pengadaan_fk = b.id');
		$this->db->join('investasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_inv d', 'b.kode_jenis = d.kode_jenis');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_anggaran a');
	}

	public function get_anggaran_expl($id = '')
	{
		$this->db->select('a.id,b.id,a.tahun,a.anggaran,c.kode_rka,b.no_ip,b.uker,b.kode_jenis,b.rincian, b.kode_kegiatan,b.nilai_ip,b.year_now,b.tgl_ip,b.pemutus,b.jangka_waktu_awal,b.jangka_waktu_akhir,b.nodin_pbj,b.tgl_nodin_pbj,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jangka_awal_spk,b.jangka_akhir_spk,d.jenis_eksploitasi,c.kegiatan');
		$this->db->join('pengadaan_expl b', 'a.id_pengadaan_expl_fk = b.id');
		$this->db->join('eksploitasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_expl d', 'b.kode_jenis = d.kode_jenis');

		$this->db->where('a.id_pengadaan_expl_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_anggaran_expl a');
	}

	public function get_anggaran_nonit($id = '')
	{
		$this->db->select('a.id,b.id,a.tahun,a.anggaran,c.no_gl,b.no_ip,b.rincian,b.nilai_ip,b.year_now,b.nilai_memo,b.tgl_ip,b.jngka_waktu_awal,b.jngka_waktu_akhir,b.no_spk,b.nilai_spk,b.spk_now,b.nilai_memo_spk,b.tgl_spk,b.vendor,b.jngka_awal_spk,b.jngka_akhir_spk,c.kegiatan');
		$this->db->join('peng_expl_non_it b', 'a.id_pengadaan_expl_fk = b.id');
		$this->db->join('expl_non_it c', 'b.no_gl = c.no_gl');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_anggaran_expl_non_it a');
	}

	public function get_spk_inv($id = '')
	{
		$this->db->select('a.id,b.id,a.tahun_spk,a.anggaran_spk,c.kode_rka,b.no_ip,b.uker,b.kode_jenis,b.rincian,b.kode_kegiatan,b.nilai_ip,b.year_now,b.tgl_ip,b.pemutus,b.jangka_waktu_awal,b.jangka_waktu_akhir,b.nodin_pbj,b.tgl_nodin_pbj,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jangka_awal_spk,b.jangka_akhir_spk,d.jenis_investasi,c.kegiatan');
		$this->db->join('pengadaan b', 'a.id_pengadaan_fk = b.id');
		$this->db->join('investasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_inv d', 'b.kode_jenis = d.kode_jenis');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_spk a');
	}

	public function get_spk_expl($id = '')
	{
		$this->db->select('a.id,b.id,a.tahun_spk,a.anggaran_spk,c.kode_rka,b.no_ip,b.uker,b.kode_jenis,b.rincian,b.kode_kegiatan,b.nilai_ip,b.year_now,b.tgl_ip,b.pemutus,b.jangka_waktu_awal,b.jangka_waktu_akhir,b.nodin_pbj,b.tgl_nodin_pbj,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jangka_awal_spk,b.jangka_akhir_spk,d.jenis_eksploitasi,c.kegiatan');
		$this->db->join('pengadaan_expl b', 'a.id_pengadaan_expl_fk = b.id');
		$this->db->join('eksploitasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_expl d', 'b.kode_jenis = d.kode_jenis');

		$this->db->where('a.id_pengadaan_expl_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_spk_expl a');
	}

	public function get_spk_nonit($id = '')
	{
		$this->db->select('a.id,b.id,a.tahun_spk,a.anggaran_spk,c.mata_anggaran,b.no_ip,b.no_gl,b.rincian,b.nilai_ip,b.year_now,b.nilai_memo,b.nilai_memo_spk,b.tgl_ip,b.jngka_waktu_awal,b.jngka_waktu_akhir,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jngka_awal_spk,b.jngka_akhir_spk');
		$this->db->join('peng_expl_non_it b', 'a.id_pengadaan_expl_fk = b.id');
		$this->db->join('expl_non_it c', 'b.no_gl = c.no_gl');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_spk_non_it a');
	}

	public function get_fiat_inv($id = '')
	{
		$this->db->select('a.id,b.id,e.tahun,e.anggaran,a.no_fiat,a.tgl_fiat,SUM(a.total) as total,a.status_rc,a.tgl_rc,c.kode_rka,b.no_ip,b.uker,b.kode_jenis,b.rincian,b.kode_kegiatan,b.nilai_ip,b.year_now,b.tgl_ip,b.pemutus,b.jangka_waktu_awal,b.jangka_waktu_akhir,b.nodin_pbj,b.tgl_nodin_pbj,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jangka_awal_spk,b.jangka_akhir_spk,d.jenis_investasi,c.kegiatan');
		$this->db->join('pengadaan b', 'a.id_pengadaan_fk = b.id');
		$this->db->join('investasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_inv d', 'b.kode_jenis = d.kode_jenis', 'left');
		$this->db->join('tahun_anggaran e', 'b.id = e.id_pengadaan_fk');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('fiat_inv a');
	}

	public function get_fiat_expl($id = '')
	{
		$this->db->select('a.id,b.id,e.tahun,e.anggaran,a.no_fiat,a.tgl_fiat,SUM(a.total) as total,a.status_rc,a.tgl_rc,c.kode_rka,b.no_ip,b.uker,b.kode_jenis,b.rincian,b.kode_kegiatan,b.nilai_ip,b.year_now,b.tgl_ip,b.pemutus,b.jangka_waktu_awal,b.jangka_waktu_akhir,b.nodin_pbj,b.tgl_nodin_pbj,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jangka_awal_spk,b.jangka_akhir_spk,d.jenis_eksploitasi,c.kegiatan');
		$this->db->join('pengadaan_expl b', 'a.id_pengadaan_expl_fk = b.id');
		$this->db->join('eksploitasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_expl d', 'b.kode_jenis = d.kode_jenis', 'left');
		$this->db->join('tahun_anggaran_expl e', 'b.id = e.id_pengadaan_expl_fk');

		$this->db->where('a.id_pengadaan_expl_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('fiat_expl a');
	}

	public function get_fiat_nonit($id = '')
	{
		$this->db->select('a.id,b.id,e.tahun,e.anggaran,a.no_fiat,a.tgl_fiat,SUM(a.total) as total,SUM(a.nilai_tabanan) as nilai_tabanan,a.status_rc,a.tgl_rc,c.mata_anggaran,b.no_ip,b.rincian,b.nilai_ip,b.year_now,b.nilai_memo,b.nilai_memo_spk,b.tgl_ip,b.jngka_waktu_awal,b.jngka_waktu_akhir,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jngka_awal_spk,b.jngka_akhir_spk');
		$this->db->join('peng_expl_non_it b', 'a.id_pengadaan_expl_fk = b.id');
		$this->db->join('expl_non_it c', 'b.no_gl = c.no_gl');
		$this->db->join('tahun_anggaran_expl_non_it e', 'b.id = e.id_pengadaan_fk');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('fiat_expl_non_it a');
	}

	public function get_keyword_inv($keyword)
	{
		$this->db->select('a.id,a.no_ip,b.kode_jenis,b.kode_kegiatan,a.rincian,a.nilai_ip,a.tgl_ip,a.nodin_pbj,a.no_spk,a.nilai_spk,a.spk_now,a.pemutus,a.vendor,a.year_now,a.tgl_nodin_pbj,a.tgl_spk,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.uker,a.jangka_awal_spk,a.jangka_akhir_spk,c.jenis_investasi,d.tahun,d.anggaran,e.tahun_spk,e.anggaran_spk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,b.kegiatan,g.firstname');
		$this->db->join('investasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_inv c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('tahun_anggaran d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('fiat_inv f', 'a.id = f.id_pengadaan_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->like('b.kegiatan', $keyword);
		$this->db->or_like('c.jenis_investasi', $keyword);
		$this->db->or_like('a.no_ip', $keyword);
		$this->db->or_like('a.pemutus', $keyword);
		$this->db->or_like('a.rincian', $keyword);
		$this->db->or_like('a.uker', $keyword);
		$this->db->or_like('g.firstname', $keyword);

		return $this->db->get('pengadaan a');
	}

	public function get_keyword_expl($keyword)
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,h.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,a.year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,a.spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,d.tahun,d.anggaran,e.tahun_spk,e.anggaran_spk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('tahun_anggaran_expl d', 'a.id = d.id_pengadaan_expl_fk', 'left');
		$this->db->join('tahun_spk_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');
		$this->db->join('sub_expl_kategori h', 'a.kode_kategori = h.kode_kategori', 'left');

		$this->db->like('b.kegiatan', $keyword);
		$this->db->or_like('c.jenis_eksploitasi', $keyword);
		$this->db->or_like('a.no_ip', $keyword);
		$this->db->or_like('a.pemutus', $keyword);
		$this->db->or_like('a.rincian', $keyword);
		$this->db->or_like('a.uker', $keyword);
		$this->db->or_like('g.firstname', $keyword);

		return $this->db->get('pengadaan_expl a');
	}

	public function get_keyword_expl_nonit($keyword)
	{
		$this->db->select('a.id,a.no_ip,a.tgl_ip,b.no_gl,b.mata_anggaran,a.rincian,a.nilai_ip,a.year_now,a.nilai_memo,a.jngka_waktu_awal,a.jngka_waktu_akhir,a.no_spk,a.tgl_spk,a.nilai_spk,a.spk_now,a.nilai_memo_spk,a.vendor,a.jngka_awal_spk,a.jngka_akhir_spk,c.tahun,c.anggaran,d.tahun_spk,d.anggaran_spk,e.no_fiat,e.tgl_fiat,SUM(e.total) as total, SUM(e.nilai_tabanan) as nilai_tabanan,e.status_rc,e.tgl_rc,f.firstname');
		$this->db->join('expl_non_it b', 'a.no_gl = b.no_gl', 'left');
		$this->db->join('tahun_anggaran_expl_non_it c', 'a.id = c.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk_non_it d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('fiat_expl_non_it e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('user f', 'a.user_pn = f.user_pn', 'left');

		$this->db->like('a.no_ip', $keyword);
		$this->db->or_like('b.mata_anggaran', $keyword);
		$this->db->or_like('b.no_gl', $keyword);
		$this->db->or_like('a.rincian', $keyword);
		$this->db->or_like('a.vendor', $keyword);

		return $this->db->get('peng_expl_non_it a');
	}

	public function get_all_pengadaan_expl($start, $limit)
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,a.year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,a.spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->group_by('a.id', 'asc');

		return $this->db->get('pengadaan_expl a', $start, $limit);
	}

	public function get_all_data_peng_expl()
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,a.year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,a.spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->group_by('a.id', 'asc');

		return $this->db->get('pengadaan_expl a');
	}

	public function get_all_pengadaan_expl_nonit($start, $limit)
	{
		$this->db->select('a.id,a.no_ip,a.tgl_ip,b.no_gl,b.mata_anggaran,a.rincian,a.nilai_ip,a.year_now,a.nilai_memo,a.jngka_waktu_awal,a.jngka_waktu_akhir,a.no_spk,a.tgl_spk,a.nilai_spk,a.spk_now,a.nilai_memo_spk,a.vendor,a.jngka_awal_spk,a.jngka_akhir_spk,c.tahun,c.anggaran,d.tahun_spk,d.anggaran_spk,e.no_fiat,e.tgl_fiat,SUM(e.total) as total, SUM(e.nilai_tabanan) as nilai_tabanan,e.status_rc,e.tgl_rc,f.firstname,a.files');
		$this->db->join('expl_non_it b', 'a.no_gl = b.no_gl', 'left');
		$this->db->join('tahun_anggaran_expl_non_it c', 'a.id = c.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk_non_it d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('fiat_expl_non_it e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('user f', 'a.user_pn = f.user_pn', 'left');

		$this->db->group_by('a.id', 'asc');

		return $this->db->get('peng_expl_non_it a', $start, $limit);
	}

	public function get_all_data_expl_nonit()
	{
		$this->db->select('a.id,a.no_ip,a.tgl_ip,b.no_gl,b.mata_anggaran,a.rincian,a.nilai_ip,a.year_now,a.nilai_memo,a.jngka_waktu_awal,a.jngka_waktu_akhir,a.no_spk,a.tgl_spk,a.nilai_spk,a.spk_now,a.nilai_memo_spk,a.vendor,a.jngka_awal_spk,a.jngka_akhir_spk,c.tahun,c.anggaran,d.tahun_spk,d.anggaran_spk,e.no_fiat,e.tgl_fiat,SUM(e.total) as total, SUM(e.nilai_tabanan) as nilai_tabanan,e.status_rc,e.tgl_rc,f.firstname,a.files');
		$this->db->join('expl_non_it b', 'a.no_gl = b.no_gl', 'left');
		$this->db->join('tahun_anggaran_expl_non_it c', 'a.id = c.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk_non_it d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('fiat_expl_non_it e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('user f', 'a.user_pn = f.user_pn', 'left');

		$this->db->group_by('a.id', 'asc');

		return $this->db->get('peng_expl_non_it a');
	}

	public function get_data_anggaran_nonit($id = '')
	{
		$this->db->select('a.id,b.id,a.tahun,a.anggaran,c.no_gl,b.no_ip,b.rincian,b.nilai_ip,b.year_now,b.tgl_ip,b.jngka_waktu_awal,b.jngka_waktu_akhir,b.no_spk,b.tgl_spk,b.nilai_spk,b.spk_now,b.vendor,b.jngka_awal_spk,b.jngka_akhir_spk,c.mata_anggaran');
		$this->db->join('peng_expl_non_it b', 'a.id_pengadaan_fk = b.id');
		$this->db->join('expl_non_it c', 'b.no_gl = c.no_gl');
		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('a.id_pengadaan_fk', 'asc');

		return $this->db->get('tahun_anggaran_expl_non_it a');
	}

	public function get_row_expl_nonit($id)
	{
		$this->db->select('a.id,a.no_ip,a.tgl_ip,a.no_gl,a.rincian,a.nilai_ip,a.year_now,a.nilai_memo,a.jngka_waktu_awal,a.jngka_waktu_akhir,a.no_spk,a.tgl_spk,a.nilai_spk,a.spk_now,a.nilai_memo_spk,a.vendor,a.jngka_awal_spk,a.jngka_akhir_spk,b.mata_anggaran,c.tahun,c.anggaran,d.tahun_spk,d.anggaran_spk,e.total,e.status_rc,f.firstname,a.files');
		$this->db->join('expl_non_it b', 'a.no_gl = b.no_gl', 'left');
		$this->db->join('tahun_anggaran_expl_non_it c', 'a.id = c.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk_non_it d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('fiat_expl_non_it e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('user f', 'a.user_pn = f.user_pn', 'left');


		$this->db->where('a.id', $id);

		return $this->db->get('peng_expl_non_it a');
	}

	public function get_data_spk_nonit($id = '')
	{
		$this->db->select('a.id,b.id,a.tahun_spk,a.anggaran_spk,c.no_gl,b.no_ip,b.rincian,b.nilai_ip,b.year_now,b.tgl_ip,b.jngka_waktu_awal,b.jngka_waktu_akhir,b.no_spk,b.tgl_spk,b.nilai_spk,b.spk_now,b.vendor,b.jngka_awal_spk,b.jngka_akhir_spk');
		$this->db->join('peng_expl_non_it b', 'a.id_pengadaan_fk = b.id', 'left');
		$this->db->join('expl_non_it c', 'b.no_gl = c.no_gl');
		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('a.id_pengadaan_fk', 'asc');

		return $this->db->get('tahun_spk_non_it a');
	}

	public function get_data_fiat_nonit($id = '')
	{
		$this->db->select('a.id,b.id,a.no_fiat,a.tgl_fiat,a.total,a.status_rc,a.tgl_rc,c.no_gl,b.no_ip,b.rincian,b.nilai_ip,b.year_now,b.tgl_ip,b.jngka_waktu_awal,b.jngka_waktu_akhir,b.no_spk,b.tgl_spk,b.nilai_spk,b.spk_now,b.vendor,b.jngka_awal_spk,b.jngka_akhir_spk,d.tahun,d.anggaran');
		$this->db->join('peng_expl_non_it b', 'a.id_pengadaan_fk = b.id');
		$this->db->join('expl_non_it c', 'b.no_gl = c.no_gl');
		$this->db->join('tahun_anggaran_expl_non_it d', 'b.id = d.id_pengadaan_fk');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('a.id_pengadaan_fk', 'asc');

		return $this->db->get('fiat_expl_non_it a');
	}

	public function add_expl_nonit($data = array())
	{
		$this->db->insert('peng_expl_non_it', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		}
	}

	public function add_tahun_anggaran_expl_nonit($data)
	{
		$this->db->insert('tahun_anggaran_expl_non_it', $data);

		return $this->db->affected_rows();
	}

	public function add_tahun_spk_expl_nonit($data)
	{
		$this->db->insert('tahun_spk_non_it', $data);

		return $this->db->affected_rows();
	}

	public function add_fiat_expl_nonit($data)
	{
		$this->db->insert('fiat_expl_non_it', $data);

		return $this->db->affected_rows();
	}

	function get_alokasi_expl($kode)
	{
		$this->db->select('sisa_alokasi_baru, sisa_alokasi_carry_over');

		$this->db->where('kode_kegiatan', $kode);

		return $this->db->get('eksploitasi');
	}

	function get_alokasi_expl_nonit($kode)
	{
		$this->db->select('alokasi, sisa_alokasi');

		$this->db->where('no_gl', $kode);

		return $this->db->get('expl_non_it');
	}

	function get_row_expl($id)
	{
		$this->db->select('a.id,a.no_ip,b.kode_jenis,b.kegiatan,b.kode_kegiatan,a.rincian,a.nilai_ip,a.tgl_ip,a.nodin_pbj,a.tgl_nodin_pbj,a.tgl_spk,a.spk_now,a.no_spk,a.nilai_spk,a.pemutus,a.vendor,a.year_now,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.uker,a.jangka_awal_spk,a.jangka_akhir_spk,c.jenis_eksploitasi,d.kategori,e.tahun,e.anggaran,f.tahun_spk,f.anggaran_spk,g.no_fiat,g.tgl_fiat,SUM(g.total) as total,g.status_rc,g.tgl_rc,h.firstname,a.files');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('tahun_spk_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl g', 'a.id = g.id_pengadaan_expl_fk', 'left');
		$this->db->join('user h', 'a.user_pn = h.user_pn', 'left');

		$this->db->where('a.id', $id);

		return $this->db->get('pengadaan_expl a');
	}

	public function add_fiat_expl($data)
	{
		$this->db->insert('fiat_expl', $data);

		return $this->db->affected_rows();
	}

	public function add_fiat_inv($data)
	{
		$this->db->insert('fiat_inv', $data);

		return $this->db->affected_rows();
	}

	public function add_tahun_anggaran_expl($data)
	{
		$this->db->insert('tahun_anggaran_expl', $data);

		return $this->db->affected_rows();
	}

	public function add_tahun_spk_expl($data)
	{
		$this->db->insert('tahun_spk_expl', $data);

		return $this->db->affected_rows();
	}

	public function add_expl($data = array())
	{
		$result = $this->db->insert('pengadaan_expl', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		}
	}

	public function updateexpl($id = 0, $data = array())
	{
		$this->db->where('id', $id);
		$this->db->update('pengadaan_expl', $data);

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function hapusspkexpl($id = 0)
	{
		$this->db->where('id_pengadaan_expl_fk', $id);
		$this->db->delete('tahun_spk_expl');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function hapusfiatexpl($id = 0)
	{
		$this->db->where('id_pengadaan_expl_fk', $id);
		$this->db->delete('fiat_expl');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function hapustahunanexpl($id = 0)
	{
		$this->db->where('id_pengadaan_expl_fk', $id);
		$this->db->delete('tahun_anggaran_expl');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function delete_expl($id = 0)
	{
		$this->db->where('id', $id);
		$this->db->delete('pengadaan_expl');

		$this->db->where('id_pengadaan_expl_fk', $id);
		$this->db->delete('tahun_anggaran_expl');

		$this->db->where('id_pengadaan_expl_fk', $id);
		$this->db->delete('tahun_spk_expl');

		$this->db->where('id_pengadaan_expl_fk', $id);
		$this->db->delete('fiat_expl');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	function get_data_anggaran_expl($id)
	{
		$this->db->select('a.id,b.id,a.tahun,a.anggaran,c.kode_rka,b.no_ip,b.uker,b.kode_jenis,b.rincian,b.kode_kategori, b.kode_kegiatan,b.nilai_ip,b.year_now,b.tgl_ip,b.pemutus,b.jangka_waktu_awal,b.jangka_waktu_akhir,b.nodin_pbj,b.tgl_nodin_pbj,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jangka_awal_spk,b.jangka_akhir_spk,d.jenis_eksploitasi,c.kegiatan,e.kategori');
		$this->db->join('pengadaan_expl b', 'a.id_pengadaan_expl_fk = b.id');
		$this->db->join('eksploitasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_expl d', 'b.kode_jenis = d.kode_jenis');
		$this->db->join('sub_expl_kategori e', 'b.kode_kategori = e.kode_kategori');

		$this->db->where('a.id_pengadaan_expl_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_anggaran_expl a');
	}

	function get_data_spk_expl($id)
	{
		$this->db->select('a.id,b.id,a.tahun_spk,a.anggaran_spk,c.kode_rka,b.no_ip,b.uker,b.kode_jenis,b.rincian,b.kode_kegiatan,b.nilai_ip,b.year_now,b.tgl_ip,b.pemutus,b.jangka_waktu_awal,b.jangka_waktu_akhir,b.nodin_pbj,b.tgl_nodin_pbj,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jangka_awal_spk,b.jangka_akhir_spk,d.jenis_eksploitasi,c.kegiatan');
		$this->db->join('pengadaan_expl b', 'a.id_pengadaan_expl_fk = b.id');
		$this->db->join('eksploitasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_expl d', 'b.kode_jenis = d.kode_jenis');

		$this->db->where('a.id_pengadaan_expl_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_spk_expl a');
	}

	function get_data_fiat_expl($id)
	{
		$this->db->select('a.id,b.id,e.tahun,e.anggaran,a.no_fiat,a.tgl_fiat,SUM(a.total) as total,a.status_rc,a.tgl_rc,c.kode_rka,b.no_ip,b.uker,b.kode_jenis,b.rincian,b.kode_kegiatan,b.nilai_ip,b.year_now,b.tgl_ip,b.pemutus,b.jangka_waktu_awal,b.jangka_waktu_akhir,b.nodin_pbj,b.tgl_nodin_pbj,b.no_spk,b.nilai_spk,b.spk_now,b.tgl_spk,b.vendor,b.jangka_awal_spk,b.jangka_akhir_spk,d.jenis_eksploitasi,c.kegiatan');
		$this->db->join('pengadaan_expl b', 'a.id_pengadaan_expl_fk = b.id');
		$this->db->join('eksploitasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_expl d', 'b.kode_jenis = d.kode_jenis');
		$this->db->join('tahun_anggaran_expl e', 'b.id = e.id_pengadaan_expl_fk', 'left');

		$this->db->where('a.id_pengadaan_expl_fk', $id);
		$this->db->group_by('b.id');

		return $this->db->get('fiat_expl a');
	}

	public function get_all_sub_inv()
	{
		$this->db->select('*');

		return $this->db->get('sub_inv');
	}

	public function get_all_sub_expl()
	{
		$this->db->select('*');

		return $this->db->get('sub_expl');
	}

	public function get_all_expl_nonit()
	{
		$this->db->select('*');

		return $this->db->get('expl_non_it');
	}

	public function viewbyjenis($kode_jenis)
	{
		$this->db->where('kode_jenis', $kode_jenis);
		return $this->db->get('investasi')->result_array();
	}

	public function get_row_inv($id)
	{
		$this->db->select('a.id,a.no_ip,b.kode_jenis,b.kode_kegiatan,a.rincian,a.nilai_ip,a.tgl_ip,a.nodin_pbj,a.no_spk,a.nilai_spk,a.spk_now,a.pemutus,a.vendor,a.year_now,a.tgl_nodin_pbj,a.tgl_spk,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.uker,a.jangka_awal_spk,a.jangka_akhir_spk,c.jenis_investasi,d.tahun,d.anggaran,e.tahun_spk,e.anggaran_spk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,b.kegiatan,g.firstname,a.files');
		$this->db->join('investasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_inv c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('tahun_anggaran d', 'a.id = d.id_pengadaan_fk', 'left');
		$this->db->join('tahun_spk e', 'a.id = e.id_pengadaan_fk', 'left');
		$this->db->join('fiat_inv f', 'a.id = f.id_pengadaan_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.id', $id);

		return $this->db->get('pengadaan a');
	}

	public function get_data_anggaran_inv($id)
	{
		$this->db->select('a.*,b.*,c.kode_rka,c.kegiatan,d.jenis_investasi');
		$this->db->join('pengadaan b', 'a.id_pengadaan_fk = b.id');
		$this->db->join('investasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_inv d', 'b.kode_jenis = d.kode_jenis');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_anggaran a');
	}

	public function get_data_spk_inv($id)
	{
		$this->db->select('a.*,b.*,c.kode_rka,c.kegiatan,d.jenis_investasi');
		$this->db->join('pengadaan b', 'a.id_pengadaan_fk = b.id');
		$this->db->join('investasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_inv d', 'b.kode_jenis = d.kode_jenis');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->order_by('b.id');

		return $this->db->get('tahun_spk a');
	}

	public function get_data_fiat_inv($id)
	{
		$this->db->select('a.*,b.*,c.kode_rka,c.kegiatan,d.jenis_investasi,e.*');
		$this->db->join('pengadaan b', 'a.id_pengadaan_fk = b.id');
		$this->db->join('investasi c', 'b.kode_kegiatan = c.kode_kegiatan');
		$this->db->join('sub_inv d', 'b.kode_jenis = d.kode_jenis', 'left');
		$this->db->join('tahun_anggaran e', 'b.id = e.id_pengadaan_fk');

		$this->db->where('a.id_pengadaan_fk', $id);
		$this->db->group_by('b.id');

		return $this->db->get('fiat_inv a');
	}

	public function get_alokasi_inv($kode)
	{
		$this->db->select('sisa_alokasi_baru, sisa_alokasi_carry_over');
		//$this->db->from('investasi');
		$this->db->where('kode_kegiatan', $kode);

		return $this->db->get('investasi');
	}

	public function add_inv($data = array())
	{
		$this->db->insert('pengadaan', $data);

		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	public function add_tahun_anggaran($data)
	{
		$this->db->insert('tahun_anggaran', $data);

		return $this->db->affected_rows();
	}

	public function add_fiat($data)
	{
		$this->db->insert('fiat_inv', $data);

		return $this->db->affected_rows();
	}

	public function add_tahun_spk($data)
	{
		$this->db->insert('tahun_spk', $data);

		return $this->db->affected_rows();
	}

	public function update_inv($id, $data = array())
	{
		$this->db->where('id', $id);
		$this->db->update('pengadaan', $data);

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function updateGO($table = false, $where = false, $id = false, $data = array())
	{
		$this->db->where($where, $id);
		$this->db->update($table, $data);
		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false; // Or do whatever you gotta do here to raise an error
		} else {
			return $this->db->affected_rows();
		}
	}

	public function delete_inv($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pengadaan');

		$this->db->where('id_pengadaan_fk', $id);
		$this->db->delete('tahun_anggaran');

		$this->db->where('id_pengadaan_fk', $id);
		$this->db->delete('tahun_spk');

		$this->db->where('id_pengadaan_fk', $id);
		$this->db->delete('fiat_inv');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	function viewbyjenis_expl($kode_jenis)
	{
		$this->db->where('kode_jenis', $kode_jenis);
		return $this->db->get('sub_expl_kategori')->result();
	}

	public function viewbykategori_expl($kode_kategori)
	{
		$this->db->where('kode_kategori', $kode_kategori);
		$result = $this->db->get('eksploitasi')->result(); // Tampilkan semua data kota berdasarkan id provinsi

		return $result;
	}

	public function update_expl_nonit($id, $data = array())
	{
		$this->db->where('id', $id);
		$this->db->update('peng_expl_non_it', $data);

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function delete_expl_nonit($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('peng_expl_non_it');

		$this->db->where('id_pengadaan_fk', $id);
		$this->db->delete('tahun_anggaran_expl_non_it');

		$this->db->where('id_pengadaan_fk', $id);
		$this->db->delete('tahun_spk_non_it');

		$this->db->where('id_pengadaan_fk', $id);
		$this->db->delete('fiat_expl_non_it');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function hapustahunanexplnonit($id = '')
	{
		$this->db->where('id_pengadaan_fk', $id);
		$this->db->delete('tahun_anggaran_expl_non_it');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function hapusspkexplnonit($id = '')
	{
		$this->db->where('id_pengadaan_fk', $id);
		$this->db->delete('tahun_spk_non_it');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	public function hapusfiatexplnonit($id = '')
	{
		$this->db->where('id_pengadaan_fk', $id);
		$this->db->delete('fiat_expl_non_it');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}
}

/* End of file Pengadaan_model.php */
/* Location: ./application/models/Pengadaan_model.php */
