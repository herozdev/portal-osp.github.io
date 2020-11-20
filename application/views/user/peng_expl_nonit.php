<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>
      <a href="#" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-fw fa-plus"></i> Add</a>
      <a href="<?= base_url('user/export_expl_nonit/'); ?>" class="btn btn-sm btn-success mb-3"><i class="fas fa-fw fa-download"></i> Export Excel</a>

      <form action="<?= base_url('user/search_expl_nonit'); ?>" method="POST">
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
          <div class="input-group">
            <input type="text" name="keyword" id="keyword" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
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
            <th style="text-align: center; vertical-align:middle; font-size:small;">No. IP</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Tanggal IP</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">No GL</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Mata Anggaran</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Perihal</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Total Project</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">IP <?php echo date('Y'); ?></th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Memo <?php echo date('Y'); ?></th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">PIC</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Menu</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
          $no = 0;
          $sum_ip = 0;
          $memo = 0;
          $sum_spk = 0;
          $memo_spk = 0;
          $fiat = 0;
          $tabanan = 0;
          ?>
          <?php foreach ($list as $expl) : ?>
            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
              <td><?= ++$no; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $expl['no_ip']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= date('d M Y', strtotime($expl['tgl_ip'])); ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $expl['no_gl']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $expl['mata_anggaran']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $expl['rincian']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($expl['nilai_ip']); ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($expl['year_now']); ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($expl['nilai_memo']); ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $expl['firstname']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;">
                <a href="<?= site_url('user/edit_pengadaan_expl_nonit/' . $expl['id']); ?>" class="badge badge-success">Edit</a>
                <a href="" onclick="confirm_modal('<?= site_url('user/delete_expl_nonit/' . $expl['id']); ?>')" data-toggle="modal" data-target="#deleteMenu" class="badge badge-danger">Delete</a>
                <a href="<?= site_url('user/view_expl_nonit/' . $expl['id']); ?>" class="badge badge-primary"><i class="fas fa-info-circle"></i> Detail</a>
                <a href="<?= base_url() . 'assets/files/documents/' . $expl['files']; ?>" target="_blank" class="badge badge-info">
                  <i class="fas fa-file-pdf"></i> PDF
                </a>
              </td>
            </tr>

            <tr class="p">
              <td colspan="12" class="hiddenRow">
                <div class="accordion-body collapse p-3" id="demo1">
                  <p>No SPK : <span style="color:black"><?= $expl['no_spk']; ?></span></p>
                  <p>Tanggal SPK : <span style="color: black"><?= date('d M Y', strtotime($expl['tgl_spk'])); ?></span></p>
                  <p>Vendor : <span style="color: black"><?= $expl['vendor']; ?></span></p>
                  <p>Nilai SPK : <span style="color: black"><?= number_format($expl['nilai_spk']); ?></span></p>
                  <p>SPK <?= date('Y'); ?> : <span style="color: black"><?= number_format($expl['spk_now']); ?></span></p>
                  <p>Memo SPK : <span style="color: black"><?= number_format($expl['nilai_memo_spk']); ?></span></p>
                  <p>Jangka Awal SPK : <span style="color: black"><?= date('d M Y', strtotime($expl['jngka_awal_spk'])); ?></span></p>
                  <p>Jangka Akhir SPK : <span style="color: black"><?= date('d M Y', strtotime($expl['jngka_akhir_spk'])); ?></span></p>
                  <p>No Fiat : <span style="color: black"><?= $expl['no_fiat']; ?></span></p>
                  <p>Tanggal Fiat : <span style="color: black"><?= date('d M Y', strtotime($expl['tgl_fiat'])); ?></span></p>
                  <p>Nilai Fiat : <span style="color: black"><?= number_format($expl['total']); ?></span></p>
                  <p>Nilai Tabanan : <span style="color: black;"><?= number_format($expl['nilai_tabanan']); ?></span></p>
                  <p>Keterangan : <span style="color: black"><?= $expl['status_rc']; ?></span></p>
                  <p>Tanggal Cashout : <span style="color: black"><?= date('d M Y', strtotime($expl['tgl_rc'])); ?></span></p>
                </div>
              </td>
            </tr>
          <?php
            $sum_ip += $expl['year_now'];
            $memo += $expl['nilai_memo'];
            $sum_spk += $expl['spk_now'];
            $memo_spk += $expl['nilai_memo_spk'];
            $fiat += $expl['total'];
            $tabanan += $expl['nilai_tabanan'];
          endforeach;
          ?>
        </tbody>
      </table>
      <div class="row">
        <div class="col">
          <?= $pagination; ?>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-2 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total IP</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_ip); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Memo IP</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($memo); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">SPK</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_spk); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Memo SPK</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($memo_spk); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Fiat</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($fiat); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tabanan</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($tabanan); ?></div>
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
        <h5 class="modal-title" id="newMenuModalLabel">Tambah Pengadaan Eksploitasi Non IT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user/submit_expl_nonit'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="idf" value="1">
            <input type="hidden" id="idf2" value="1">
            <input type="hidden" id="idf5" value="1">
            <input type="hidden" id="ids" value="1">
            <input type="hidden" name="id" value="<?= uniqid(); ?>">
          </div>
          <div class="form-group">
            <input type="text" name="no_ip" id="no_ip" class="form-control" placeholder="No IP">
            <?= form_error('no_ip', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <input type="text" name="tgl_ip" id="input-tanggal1" class="form-control" placeholder="Tanggal IP">
            <?= form_error('tgl_ip', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <select name="no_gl" id="no_gl" class="form-control">
              <option value="">-PILIH-</option>
              <?php foreach ($jenis as $jns) : ?>
                <option value="<?= $jns['no_gl']; ?>"><?= $jns['mata_anggaran']; ?></option>
              <?php endforeach; ?>
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
          <div class="form-group">
            <input type="text" name="nilai_memo" id="rupiah3" class="form-control" placeholder="Memo <?= date('Y'); ?>" onkeypress="return hanyaAngka(event)">
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" class="form-control" name="jngka_waktu_awal" placeholder="Jangka Waktu Awal" value="" id="input-tanggal2">
            </div>
            <div class="col-sm-6">
              <input type="text" id="input-tanggal3" class="form-control" name="jngka_waktu_akhir" placeholder="Jangka Waktu Akhir">
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
          <div class="form-group">
            <input type="text" name="nilai_memo_spk" id="rupiah5" class="form-control" placeholder="Memo SPK <?= date('Y'); ?>" onkeypress="return hanyaAngka(event)">
          </div>
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-s-0">
              <input type="text" name="jngka_awal_spk" id="input-tanggal6" class="form-control" placeholder="Jangka Awal SPK">
            </div>
            <div class="col-sm-6">
              <input type="text" name="jngka_akhir_spk" id="input-tanggal7" class="form-control" placeholder="Jangka Akhir SPK">
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