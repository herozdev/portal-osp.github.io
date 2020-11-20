<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expl_model extends CI_Model
{

	function get_all_expl($start, $limit)
	{
		$this->db->select('a.*,b.jenis_eksploitasi,c.kategori');
		$this->db->join('sub_expl b', 'a.kode_jenis = b.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori c', 'a.kode_kategori = c.kode_kategori', 'left');
		$this->db->order_by('a.id', 'asc');

		return $this->db->get('eksploitasi a', $start, $limit);
	}

	function get_expl_all()
	{
		$this->db->select('a.*,b.jenis_eksploitasi,c.kategori');
		$this->db->join('sub_expl b', 'a.kode_jenis = b.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori c', 'a.kode_kategori = c.kode_kategori', 'left');
		$this->db->order_by('a.id', 'asc');

		return $this->db->get('eksploitasi a');
	}

	function get_all_expl2()
	{
		$this->db->select('SUM(alokasi_baru) as alokasi_baru, SUM(alokasi_carry_over) as alokasi_carry_over');

		return $this->db->get('eksploitasi');
	}

	function get_keyword_expl($keyword)
	{
		$this->db->select('a.*,b.jenis_eksploitasi,c.kategori');
		$this->db->join('sub_expl b', 'a.kode_jenis = b.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori c', 'a.kode_kategori = c.kode_kategori', 'left');

		$this->db->like('a.kegiatan', $keyword);
		$this->db->or_like('a.kode_rka', $keyword);
		$this->db->or_like('b.jenis_eksploitasi', $keyword);
		$this->db->or_like('c.kategori', $keyword);

		return $this->db->get('eksploitasi a');
	}

	function get_all_sub_expl()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'asc');

		return $this->db->get('sub_expl');
	}

	public function get_nonit($kode_jenis = 'EX-001')
	{
		$this->db->select('SUM(a.alokasi_baru) as alokasi_baru, SUM(a.alokasi_carry_over) as alokasi_carry_over, SUM(a.sisa_alokasi_baru) as sisa_alokasi_baru, SUM(a.sisa_alokasi_carry_over) as sisa_alokasi_carry_over,b.kategori');
		$this->db->join('sub_expl_kategori b', 'a.kode_kategori = b.kode_kategori', 'left');

		$this->db->where('a.kode_jenis', $kode_jenis);

		return $this->db->get('eksploitasi a');
	}

	public function get_monitoring_nonit($kode = 'EX-001')
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,SUM(a.year_now) as year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $kode);

		return $this->db->get('pengadaan_expl a');
	}

	public function get_it1($kode_jenis = 'EX-002')
	{
		$this->db->select('SUM(a.alokasi_baru) as alokasi_baru, SUM(a.alokasi_carry_over) as alokasi_carry_over, SUM(a.sisa_alokasi_baru) as sisa_alokasi_baru, SUM(a.sisa_alokasi_carry_over) as sisa_alokasi_carry_over,b.kategori');
		$this->db->join('sub_expl_kategori b', 'a.kode_kategori = b.kode_kategori', 'left');


		$this->db->where('a.kode_jenis', $kode_jenis);
		$this->db->where('b.kode_kategori', 'KAT-002');


		return $this->db->get('eksploitasi a');
	}

	public function get_it2($kode_jenis = 'EX-002')
	{
		$this->db->select('SUM(a.alokasi_baru) as alokasi_baru, SUM(a.alokasi_carry_over) as alokasi_carry_over, SUM(a.sisa_alokasi_baru) as sisa_alokasi_baru, SUM(a.sisa_alokasi_carry_over) as sisa_alokasi_carry_over,b.kategori');
		$this->db->join('sub_expl_kategori b', 'a.kode_kategori = b.kode_kategori', 'left');


		$this->db->where('a.kode_jenis', $kode_jenis);
		$this->db->where('b.kode_kategori', 'KAT-003');


		return $this->db->get('eksploitasi a');
	}

	public function get_it3($kode_jenis = 'EX-002')
	{
		$this->db->select('SUM(a.alokasi_baru) as alokasi_baru, SUM(a.alokasi_carry_over) as alokasi_carry_over, SUM(a.sisa_alokasi_baru) as sisa_alokasi_baru, SUM(a.sisa_alokasi_carry_over) as sisa_alokasi_carry_over,b.kategori');
		$this->db->join('sub_expl_kategori b', 'a.kode_kategori = b.kode_kategori', 'left');


		$this->db->where('a.kode_jenis', $kode_jenis);
		$this->db->where('b.kode_kategori', 'KAT-004');


		return $this->db->get('eksploitasi a');
	}

	public function get_it4($kode_jenis = 'EX-002')
	{
		$this->db->select('SUM(a.alokasi_baru) as alokasi_baru, SUM(a.alokasi_carry_over) as alokasi_carry_over, SUM(a.sisa_alokasi_baru) as sisa_alokasi_baru, SUM(a.sisa_alokasi_carry_over) as sisa_alokasi_carry_over,b.kategori');
		$this->db->join('sub_expl_kategori b', 'a.kode_kategori = b.kode_kategori', 'left');


		$this->db->where('a.kode_jenis', $kode_jenis);
		$this->db->where('b.kode_kategori', 'KAT-005');

		return $this->db->get('eksploitasi a');
	}

	public function get_it5($kode_jenis = 'EX-002')
	{
		$this->db->select('SUM(a.alokasi_baru) as alokasi_baru, SUM(a.alokasi_carry_over) as alokasi_carry_over, SUM(a.sisa_alokasi_baru) as sisa_alokasi_baru, SUM(a.sisa_alokasi_carry_over) as sisa_alokasi_carry_over,b.kategori');
		$this->db->join('sub_expl_kategori b', 'a.kode_kategori = b.kode_kategori', 'left');


		$this->db->where('a.kode_jenis', $kode_jenis);
		$this->db->where('b.kode_kategori', 'KAT-006');

		return $this->db->get('eksploitasi a');
	}

	public function get_it6($kode_jenis = 'EX-002')
	{
		$this->db->select('SUM(a.alokasi_baru) as alokasi_baru, SUM(a.alokasi_carry_over) as alokasi_carry_over, SUM(a.sisa_alokasi_baru) as sisa_alokasi_baru, SUM(a.sisa_alokasi_carry_over) as sisa_alokasi_carry_over,b.kategori');
		$this->db->join('sub_expl_kategori b', 'a.kode_kategori = b.kode_kategori', 'left');


		$this->db->where('a.kode_jenis', $kode_jenis);
		$this->db->where('b.kode_kategori', 'KAT-007');

		return $this->db->get('eksploitasi a');
	}

	public function get_it7($kode_jenis = 'EX-002')
	{
		$this->db->select('SUM(a.alokasi_baru) as alokasi_baru, SUM(a.alokasi_carry_over) as alokasi_carry_over, SUM(a.sisa_alokasi_baru) as sisa_alokasi_baru, SUM(a.sisa_alokasi_carry_over) as sisa_alokasi_carry_over,b.kategori');
		$this->db->join('sub_expl_kategori b', 'a.kode_kategori = b.kode_kategori', 'left');


		$this->db->where('a.kode_jenis', $kode_jenis);
		$this->db->where('b.kode_kategori', 'KAT-008');

		return $this->db->get('eksploitasi a');
	}

	public function get_mon_it1($kode = 'EX-002')
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,SUM(a.year_now) as year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $kode);
		$this->db->where('a.kode_kategori', 'KAT-002');


		return $this->db->get('pengadaan_expl a');
	}

	public function get_mon_it2($kode = 'EX-002')
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,SUM(a.year_now) as year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $kode);
		$this->db->where('a.kode_kategori', 'KAT-003');


		return $this->db->get('pengadaan_expl a');
	}

	public function get_mon_it3($kode = 'EX-002')
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,SUM(a.year_now) as year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $kode);
		$this->db->where('a.kode_kategori', 'KAT-004');


		return $this->db->get('pengadaan_expl a');
	}

	public function get_mon_it4($kode = 'EX-002')
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,SUM(a.year_now) as year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $kode);
		$this->db->where('a.kode_kategori', 'KAT-005');


		return $this->db->get('pengadaan_expl a');
	}

	public function get_mon_it5($kode = 'EX-002')
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,SUM(a.year_now) as year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $kode);
		$this->db->where('a.kode_kategori', 'KAT-006');


		return $this->db->get('pengadaan_expl a');
	}

	public function get_mon_it6($kode = 'EX-002')
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,SUM(a.year_now) as year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $kode);
		$this->db->where('a.kode_kategori', 'KAT-007');


		return $this->db->get('pengadaan_expl a');
	}

	public function get_mon_it7($kode = 'EX-002')
	{
		$this->db->select('a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,d.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,SUM(a.year_now) as year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,SUM(a.spk_now) as spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,e.tahun,e.anggaran,e.id_pengadaan_expl_fk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname,a.files,b.alokasi_baru,b.alokasi_carry_over');
		$this->db->join('eksploitasi b', 'a.kode_kegiatan = b.kode_kegiatan', 'left');
		$this->db->join('sub_expl c', 'a.kode_jenis = c.kode_jenis', 'left');
		$this->db->join('sub_expl_kategori d', 'a.kode_kategori = d.kode_kategori', 'left');
		$this->db->join('tahun_anggaran_expl e', 'a.id = e.id_pengadaan_expl_fk', 'left');
		$this->db->join('fiat_expl f', 'a.id = f.id_pengadaan_expl_fk', 'left');
		$this->db->join('user g', 'a.user_pn = g.user_pn', 'left');

		$this->db->where('a.kode_jenis', $kode);
		$this->db->where('a.kode_kategori', 'KAT-008');


		return $this->db->get('pengadaan_expl a');
	}

	public function sum_all()
	{
		$this->db->select('SUM(alokasi_baru) as alokasi_baru, SUM(alokasi_carry_over) as alokasi_carry_over, SUM(sisa_alokasi_baru) as sisa_alokasi_baru, SUM(sisa_alokasi_carry_over) as sisa_alokasi_carry_over');

		return $this->db->get('eksploitasi');
	}

	function get_all_sub_expl_kategori()
	{
		$this->db->select('a.*,b.jenis_eksploitasi');
		$this->db->join('sub_expl b', 'a.kode_jenis = b.kode_jenis', 'left');
		$this->db->order_by('id', 'asc');

		return $this->db->get('sub_expl_kategori a');
	}

	public function buat_kode_kategori()
	{
		$this->db->select('RIGHT(eksploitasi.kode_kategori,3)as kode', false);
		$this->db->order_by('kode_kategori', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get('eksploitasi');
		if ($query->num_rows() != 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$idmax = str_pad($kode, 3, '0', STR_PAD_LEFT);
		$idfix = 'KAT-' . $idmax;

		return $idfix;
	}

	public function buat_kode()
	{
		$this->db->select('RIGHT(eksploitasi.kode_kegiatan,3) as kode', false);
		$this->db->order_by('kode_kegiatan', 'desc');
		$this->db->limit(1);

		$query = $this->db->get('eksploitasi');
		if ($query->num_rows() != 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}
		$idMax = str_pad($kode, 3, '0', STR_PAD_LEFT);
		$idFix = 'KEG-' . $idMax;

		return $idFix;
	}

	public function kode_sub_jenis()
	{
		$this->db->select('RIGHT(sub_expl.kode_jenis,3) as kode', FALSE);
		$this->db->order_by('kode_jenis', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get('sub_expl');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$idmax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$idfix = "EX-" . $idmax;

		return $idfix;
	}

	public function kode_sub_kategori()
	{
		$this->db->select('RIGHT(sub_expl_kategori.kode_kategori,3) as kode', false);
		$this->db->order_by('kode_kategori', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get('sub_expl_kategori');
		if ($query->num_rows() != 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$idmax = str_pad($kode, 3, '0', STR_PAD_LEFT);
		$idfix = 'KAT-' . $idmax;

		return $idfix;
	}

	function get_row_sub_expl($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);

		return $this->db->get('sub_expl');
	}

	function get_row_sub_expl_kategori($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);

		return $this->db->get('sub_expl_kategori');
	}

	function get_row_expl($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);

		return $this->db->get('eksploitasi');
	}

	function add_expl($data = array())
	{
		$this->db->insert('eksploitasi', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	function add_sub_expl($data = array())
	{
		$this->db->insert('sub_expl', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	function add_sub_expl_kat($data = array())
	{
		$this->db->insert('sub_expl_kategori', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	function update_expl($id, $data = array())
	{
		$this->db->where('id', $id);
		$this->db->update('eksploitasi', $data);

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	function update_sub_expl($id, $data = array())
	{
		$this->db->where('id', $id);
		$this->db->update('sub_expl', $data);

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	function update_sub_expl_kat($id, $data = array())
	{
		$this->db->where('id', $id);
		$this->db->update('sub_expl_kategori', $data);

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	function delete_expl($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('eksploitasi');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	function delete_sub_expl($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('sub_expl');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}

	function delete_sub_expl_kat($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('sub_expl_kategori');

		$err = $this->db->error();
		if ($err['code'] !== 0) {
			return false;
		} else {
			return $this->db->affected_rows();
		}
	}
}

/* End of file Expl_model.php */
/* Location: ./application/models/Expl_model.php */
