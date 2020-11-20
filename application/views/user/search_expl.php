<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  $con = mysqli_connect('localhost', 'root', 'brigtiosp', 'osp2');
  include 'pagination1.php';

  if (isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != '') {
    //        jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong)
    //        pakai ini
    $keyword = $_REQUEST['keyword'];
    $reload = "search_expl.php?pagination=true&keyword=$keyword";
    $sql = "SELECT a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,h.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,a.year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,a.spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,d.tahun,d.anggaran,e.tahun_spk,e.anggaran_spk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname FROM pengadaan_expl a LEFT JOIN eksploitasi b ON a.kode_kegiatan=b.kode_kegiatan LEFT JOIN sub_expl c ON a.kode_jenis=c.kode_jenis LEFT JOIN tahun_anggaran_expl d ON a.id=d.id_pengadaan_expl_fk LEFT JOIN tahun_spk_expl e ON a.id=e.id_pengadaan_expl_fk LEFT JOIN fiat_expl f ON a.id=f.id_pengadaan_expl_fk LEFT JOIN user g ON a.user_pn=g.user_pn LEFT JOIN sub_expl_kategori h ON a.kode_kategori=h.kode_kategori WHERE c.jenis_eksploitasi LIKE '%$keyword%' OR a.pemutus LIKE '%$keyword%' OR a.rincian LIKE '%$keyword%' OR b.kegiatan LIKE '%$keyword%' OR g.firstname LIKE '%$keyword%' OR a.vendor LIKE '%$keyword%' OR a.uker LIKE '%$keyword%' GROUP BY a.id";
    $result = mysqli_query($con, $sql);
  } else {
    //            jika tidak ada pencarian pakai ini
    $reload = 'search_expl.php?pagination=true';
    $sql = 'SELECT a.id,b.kode_rka,a.no_ip,a.uker,a.kode_jenis,c.jenis_eksploitasi,a.rincian,a.kode_kategori,h.kategori,a.kode_kegiatan,b.kegiatan,a.rincian,a.nilai_ip,a.year_now,a.tgl_ip,a.pemutus,b.sisa_alokasi_baru,b.sisa_alokasi_carry_over,a.jangka_waktu_awal,a.jangka_waktu_akhir,a.nodin_pbj,a.tgl_nodin_pbj,a.no_spk,a.nilai_spk,a.spk_now,a.tgl_spk,a.vendor,a.jangka_awal_spk,a.jangka_akhir_spk,d.tahun,d.anggaran,e.tahun_spk,e.anggaran_spk,f.no_fiat,f.tgl_fiat,SUM(f.total) as total,f.status_rc,f.tgl_rc,g.firstname FROM pengadaan_expl a LEFT JOIN eksploitasi b ON a.kode_kegiatan=b.kode_kegiatan LEFT JOIN sub_expl c ON a.kode_jenis=c.kode_jenis LEFT JOIN tahun_anggaran_expl d ON a.id=d.id_pengadaan_expl_fk LEFT JOIN tahun_spk_expl e ON a.id=e.id_pengadaan_expl_fk LEFT JOIN fiat_expl f ON a.id=f.id_pengadaan_expl_fk LEFT JOIN user g ON a.user_pn=g.user_pn LEFT JOIN sub_expl_kategori h ON a.kode_kategori=h.kode_kategori GROUP BY a.id';
    $result = mysqli_query($con, $sql);
  }

  $rpp = 5; // jumlah record per halaman
  $page = intval($_GET['page']);
  if ($page <= 0) {
    $page = 1;
  }

  $tcount = mysqli_num_rows($result);
  $tpages = ($tcount) ? ceil($tcount / $rpp) : 1; // total pages, last page number
  $count = 0;
  $i = ($page - 1) * $rpp;
  $no_urut = ($page - 1) * $rpp;
  ?>
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>
      <a href="#" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-fw fa-plus"></i> Add</a>
      <a href="<?= base_url('user/pengadaan_expl'); ?>" class="btn btn-sm btn-danger mb-3"><i class="fas fa-times"></i> Clear</a>
      <form action="<?php echo base_url('user/export_filter_expl'); ?>" method="post">
        <input type="hidden" name="sql" value="<?php echo $sql; ?>">
        <input type="submit" value="Export Excel" class="btn btn-sm btn-success mb-3">
      </form>

      <form action="<?= base_url('user/search_expl'); ?>" method="POST">
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
          <div class="input-group">
            <input type="text" name="keyword" id="keyword" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light" value="<?php echo $_REQUEST['keyword']; ?>">
            <div class="input-group-append">
              <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </form>

      <table class="table align-items-center table-flush table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Pemutus</th>
            <th>Uker</th>
            <th>No IP</th>
            <th>Tanggal IP</th>
            <th>Jenis Eksploitasi</th>
            <th>Kategori</th>
            <th>Kegiatan</th>
            <th>Rincian</th>
            <th>Total Project</th>
            <th>IP <?php echo date('Y'); ?> </th>
            <th>PIC</th>
            <th>Menu</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
          $no = 1;
          $sum_fiat = 0;
          $sum_now = 0;
          $sum_spk = 0;
          ?>
          <?php foreach ($key->result_array() as $expl) : ?>
            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
              <td><?= $no++; ?></td>
              <td><?= $expl['pemutus']; ?></td>
              <td><?= $expl['uker']; ?></td>
              <td><?= $expl['no_ip']; ?></td>
              <td><?= date('d M Y', strtotime($expl['tgl_ip'])); ?></td>
              <td><?= $expl['jenis_eksploitasi']; ?></td>
              <td><?= $expl['kategori']; ?></td>
              <td><?= $expl['kegiatan']; ?></td>
              <td><?= $expl['rincian']; ?></td>
              <td><?= number_format($expl['nilai_ip']); ?></td>
              <td><?= number_format($expl['year_now']); ?></td>
              <td><?= $expl['firstname']; ?></td>
              <td>
                <a href="<?= site_url('user/edit_pengadaan_expl/' . $expl['id']); ?>" class="badge badge-success"><i class="fas fa-pencil-alt"></i> Edit</a>
                <a href="" onclick="confirm_modal('<?= site_url('user/delete_expl/' . $expl['id']); ?>')" data-toggle="modal" data-target="#deleteMenu" class="badge badge-danger"><i class="fas fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
            <tr class="p">
              <td colspan="8" class="hiddenRow">
                <div class="accordion-body collapse p-3" id="demo1">
                  <p>Tahun Anggaran : <?= $expl['tahun']; ?> | Nilai Anggaran : <?= $expl['anggaran']; ?></p>
                  <p>Jangka Waktu Awal : <span style="color:black"><?= date('d M Y', strtotime($expl['jangka_waktu_awal'])); ?></span></p>
                  <p>Jangka Waktu Akhir : <span style="color: black"><?= date('d M Y', strtotime($expl['jangka_waktu_akhir'])); ?></span></p>
                  <p>Nodin PBJ : <span style="color: black"><?= $expl['nodin_pbj']; ?></span></p>
                  <p>Tanggal Nodin PBJ : <span style="color: black"><?= date('d M Y', strtotime($expl['tgl_nodin_pbj'])); ?></span></p>
                  <p>No SPK : <span style="color: black"><?= $expl['no_spk']; ?></span></p>
                  <p>Tanggal SPK : <span style="color: black"><?= date('d M Y', strtotime($expl['tgl_spk'])); ?></span></p>
                  <p>Nilai SPK : <span style="color: black"><?= number_format($expl['nilai_spk']); ?></span></p>
                  <p>SPK <?php echo date('Y'); ?> : <span style="color: black"><?= number_format($expl['spk_now']); ?></span></p>
                  <p>Tahun Anggaran SPK : <?= $expl['tahun_spk']; ?> | Nilai Anggaran : <?= $expl['anggaran_spk']; ?></p>
                  <p>Jangka Awal SPK : <span style="color: black"><?= date('d M Y', strtotime($expl['jangka_awal_spk'])); ?></span></p>
                  <p>Jangka Akhir SPK : <span style="color: black"><?= date('d M Y', strtotime($expl['jangka_akhir_spk'])); ?></span></p>
                  <p>Vendor : <span style="color: black"><?= $expl['vendor']; ?></span></p>
                  <p>No Fiat : <span style="color: black"><?= $expl['no_fiat']; ?></span></p>
                  <p>Tanggal Fiat : <span style="color: black"><?= date('d M Y', strtotime($expl['tgl_fiat'])); ?></span></p>
                  <p>Nilai Fiat : <span style="color: black"><?= number_format($expl['total']); ?></span></p>
                  <p>Keterangan : <span style="color: black"><?= $expl['status_rc']; ?></span></p>
                  <p>Tanggal Cashout : <span style="color: black"><?= date('d M Y', strtotime($expl['tgl_rc'])); ?></span></p>
                </div>
              </td>
            </tr>
          <?php
            $sum_now += $expl['year_now'];
            $sum_spk += $expl['spk_now'];
            $sum_fiat += $expl['total'];
          endforeach;
          ?>
        </tbody>
      </table>
      <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total IP</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_now); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total SPK</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_spk); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Fiat</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_fiat); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Tambah Pengadaan Investasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user/submit_inv'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="idf" value="1">
            <input type="hidden" id="idf2" value="1">
            <input type="hidden" id="idf3" value="1">
            <input type="hidden" id="ids" value="1">
            <input type="hidden" name="id" value="<?= uniqid(); ?>">
            <select name="pemutus" id="pemutus" class="form-control">
              <option value="">-PILIH-</option>
              <option value="Kepala Bagian">Kepala Bagian</option>
              <option value="Wakadiv">Wakadiv</option>
              <option value="Kadiv">Kadiv</option>
              <option value="DIR">DIR</option>
            </select>
            <?= form_error('pemutus', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="uker" id="uker" class="form-control" placeholder="Uker">
              <?= form_error('uker', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-sm-6">
              <input type="text" name="no_ip" id="no_ip" class="form-control" placeholder="No IP">
              <?= form_error('no_ip', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="tgl_ip" id="input-tanggal1" class="form-control" placeholder="Tanggal IP">
            <?= form_error('tgl_ip', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <select name="kode_jenis" id="kodejenisinv" class="form-control">
              <option value="">-PILIH-</option>
              <?php foreach ($jenis as $jns) : ?>
                <option value="<?= $jns['kode_jenis']; ?>"><?= $jns['jenis_investasi']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <select name="kode_kegiatan" id="kegiataninv" class="form-control">
              <option value="">-PILIH-</option>
            </select>
          </div>
          <div class="form-group">
            <textarea name="rincian" id="rincian" cols="10" rows="5" class="form-control" placeholder="Rincian"></textarea>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="nilai_ip" id="rupiah1" class="form-control" placeholder="Nilai IP" onkeypress="return hanyaAngka(event)">
            </div>
            <div class="col-sm-6">
              <input type="text" name="year_now" id="rupiah2" class="form-control" placeholder="IP <?= date('Y'); ?>" onkeypress="return hanyaAngka(event)">
            </div>
          </div>
          <div class="form-group row">
            <label for="">Beban Anggaran IP</label>
            <div class="col-sm mb-3 bb-sm-0">
              <div class="mb-3 text-right">
                <button type="button" onclick="addRincian(); return false;" class="btn btn-outline-primary">Add Form</button>
                <div id="divAkun"></div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" class="form-control" name="jangka_waktu_awal" placeholder="Jangka Waktu Awal" value="" id="input-tanggal2">
            </div>
            <div class="col-sm-6">
              <input type="text" id="input-tanggal3" class="form-control" name="jangka_waktu_akhir" placeholder="Jangka Waktu Akhir" value="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="nodin_pbj" id="nodin_pbj" class="form-control" placeholder="Nodin PBJ">
            </div>
            <div class="col-sm-6">
              <input type="text" name="tgl_nodin_pbj" id="input-tanggal4" class="form-control" placeholder="Tanggal Nodin PBJ">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="no_spk" id="no_spk" class="form-control" placeholder="No. SPK">
            </div>
            <div class="col-sm-6">
              <input type="text" name="tgl_spk" id="input-tanggal5" class="form-control" placeholder="Tanggal SPK">
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="vendor" id="vendor" class="form-control" placeholder="Vendor">
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" name="nilai_spk" id="rupiah3" class="form-control" placeholder="Nilai SPK">
            </div>
            <div class="col-sm-6">
              <input type="text" name="spk_now" id="rupiah4" class="form-control" placeholder="SPK <?= date('Y'); ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="">Beban Anggaran SPK</label>
            <div class="mb-3 text-right">
              <button type="button" onclick="addSpk(); return false;" class="btn btn-outline-primary">Add Form</button>
              <div id="divSpk"></div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-s-0">
              <input type="text" name="jangka_awal_spk" id="input-tanggal6" class="form-control" placeholder="Jangka Awal SPK">
            </div>
            <div class="col-sm-6">
              <input type="text" name="jangka_akhir_spk" id="input-tanggal7" class="form-control" placeholder="Jangka Akhir SPK">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteMenu" tabindex="-1" role="dialog" aria-labelledby="deleteMenuLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteMenuLabel">Delete this menu?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>After this, data can't be restored!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="delete_cancel_link">Close</button>
        <a href="" id="delete_link" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function confirm_modal(delete_url, title) {
    jQuery('#deleteMenu').modal('show', {
      backdrop: 'static',
      keyboard: false
    });
    jQuery("#deleteMenu .grt").text(title);
    document.getElementById('delete_link').setAttribute("href", delete_url);
    document.getElementById('delete_link').focus();
  }
</script>