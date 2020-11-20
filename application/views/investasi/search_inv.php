<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  $con = mysqli_connect('localhost', 'root', 'brigtiosp', 'osp2');
  include 'pagination1.php';

  if (isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != '') {
    //        jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong)
    //        pakai ini
    $keyword = $_REQUEST['keyword'];
    $reload = "search_inv.php?pagination=true&keyword=$keyword";
    $sql = "SELECT a.id,a.kode_rka,a.kode_jenis,a.kode_kegiatan,a.kegiatan,a.alokasi_baru,a.sisa_alokasi_baru,a.alokasi_carry_over,a.sisa_alokasi_carry_over,a.keterangan,b.jenis_investasi FROM investasi a LEFT JOIN sub_inv b ON a.kode_jenis=b.kode_jenis WHERE b.jenis_investasi LIKE '%$keyword%' OR a.kode_rka LIKE '%$keyword%' OR a.kegiatan LIKE '%$keyword%' ORDER BY a.id";
    $result = mysqli_query($con, $sql);
  } else {
    //            jika tidak ada pencarian pakai ini
    $reload = 'search_inv.php?pagination=true';
    $sql = 'SELECT a.id,a.kode_rka,a.kode_jenis,a.kode_kegiatan,a.kegiatan,a.alokasi_baru,a.sisa_alokasi_baru,a.alokasi_carry_over,a.sisa_alokasi_carry_over,a.keterangan,b.jenis_investasi FROM investasi a LEFT JOIN sub_inv b ON a.kode_jenis=b.kode_jenis ORDER BY a.id';
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
      <a href="<?= base_url('admin/inv'); ?>" class="btn btn-sm btn-danger mb-3"><i class="fas fa-times"></i> Clear</a>
      <form action="<?php echo base_url('admin/excel_filter_inv'); ?>" method="POST">
        <input type="hidden" name="sql" value="<?php echo $sql; ?>">
        <input type="submit" value="Export Excel" class="btn btn-sm btn-success mb-3">
      </form>

      <form action="<?= base_url('admin/search_inv'); ?>" method="POST">
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
          <div class="input-group">
            <input type="text" name="keyword" id="keyword" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light" value="<?php echo $_REQUEST['keyword']; ?>">
            <div class="input-group-append">
              <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </form>

      <table class="table align-items-center table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Jenis Investasi</th>
            <th>Kegiatan</th>
            <th>RKA</th>
            <th>Sisa Anggaran</th>
            <th>Keterangan</th>
            <th>Menu</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
          $no = 1;
          $sum_rka = 0;
          $sum_sisa_rka = 0;
          $sum_carry = 0;
          $sum_sisa_carry = 0;
          ?>
          <?php foreach ($key->result_array() as $vv) : ?>
            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
              <td><?= $no++; ?></td>
              <td><?php echo $vv['kode_rka']; ?></td>
              <td><?php echo $vv['jenis_investasi']; ?></td>
              <td><?php echo $vv['kegiatan']; ?></td>
              <td><?php echo number_format($vv['alokasi_baru']); ?></td>
              <td><?php echo number_format($vv['sisa_alokasi_baru']); ?></td>
              <td><?= $vv['keterangan']; ?></td>
              <td>
                <a href="<?= base_url('admin/edit_form_inv/' . $vv['id']); ?>" class="badge badge-success">Edit</a>
                <a href="" onclick="confirm_modal('<?= site_url('admin/delete_inv/' . $vv['id']); ?>')" data-toggle="modal" data-target="#deleteMenu" class="badge badge-danger">Delete</a>
              </td>
            </tr>
            <tr class="p">
              <td colspan="8" class="hiddenRow">
                <div class="accordion-body collapse p-3" id="demo1">
                  <p>Anggaran Carry Over : <span style="color: black;"><?= number_format($vv['alokasi_carry_over']); ?></span></p>
                  <p>Sisa Anggaran Carry Over : <span style="color: black;"><?= number_format($vv['sisa_alokasi_carry_over']); ?></span></p>
                </div>
              </td>
            </tr>
          <?php
            $sum_rka += $vv['alokasi_baru'];
            $sum_sisa_rka += $vv['sisa_alokasi_baru'];
            $sum_carry += $vv['alokasi_carry_over'];
            $sum_sisa_carry += $vv['sisa_alokasi_carry_over'];
          endforeach;
          ?>
        </tbody>
      </table>
      <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total RKA</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_rka); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sisa Anggaran RKA</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_sisa_rka); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Carry Over</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_carry); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sisa Carry Over</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_sisa_carry); ?></div>
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