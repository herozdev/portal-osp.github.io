<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= form_error('admin', '<div class="alert alert-danger" role="alert">', '</div>') ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="#" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#newBreakdown"><i class="fas fa-fw fa-plus"></i>Add</a>
      <a href="<?= base_url('admin/excel_inv'); ?>" class="btn btn-sm btn-success mb-3"><i class="fas fa-fw fa-download"></i> Export Excel</a>

      <form action="<?= base_url('admin/search_inv'); ?>" method="POST">
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
          <div class="input-group">
            <input type="text" name="keyword" id="keyword" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
            <div class="input-group-append">
              <button type="submit" id="button-addon1" class="btn btn-link text-primary"><i class="fas fa-fw fa-search"></i></button>
            </div>
          </div>
        </div>
      </form>

      <table class="table table-flush table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Kode</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Jenis Investasi</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Kegiatan</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">RKA</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Sisa Anggaran</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Keterangan</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Menu</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
          $no = 0;
          $sum_rka = 0;
          $sum_sisa_rka = 0;
          $sum_carry = 0;
          $sum_sisa_carry = 0;
          ?>
          <?php foreach ($inv as $vv) : ?>
            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= ++$no; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?php echo $vv['kode_rka']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?php echo $vv['jenis_investasi']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?php echo $vv['kegiatan']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?php echo number_format($vv['alokasi_baru']); ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?php echo number_format($vv['sisa_alokasi_baru']); ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $vv['keterangan']; ?></td>
              <td>
                <a href="<?= base_url('admin/edit_form_inv/' . $vv['id']); ?>" class="badge badge-success"><i class="fas fa-fw fa-pencil-alt"></i> Edit</a>
                <a href="" onclick="confirm_modal('<?= site_url('admin/deleteInv/' . $vv['id']); ?>')" data-toggle="modal" data-target="#deleteMenu" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>
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
        <div class="col">
          <?= $pagination; ?>
        </div>
      </div>
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
<div class="modal fade" id="newBreakdown" tabindex="-1" role="dialog" aria-labelledby="newBreakdownLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBreakdownLabel">Add New Breakdown</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/inv'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" value="<?= uniqid(); ?>">
            <input type="text" name="kode_rka" class="form-control" placeholder="Kode RKA">
            <?= form_error('kode_rka', '<div class="alert alert-danger" role="alert">', '</div>') ?>
          </div>
          <div class="form-group">
            <select name="kode_jenis" class="form-control">
              <option value="">-PILIH-</option>
              <?php foreach ($jenis as $ok) : ?>
                <option value="<?= $ok['kode_jenis']; ?>"><?= $ok['jenis_investasi']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="hidden" name="kode_kegiatan" value="<?= $kode; ?>">
            <input type="text" name="kegiatan" class="form-control" placeholder="Kegiatan">
          </div>
          <div class="form-group">
            <input type="text" name="alokasi_baru" class="form-control" placeholder="Anggaran RKA" id="rupiah1" onkeypress="return hanyaAngka(event)">
          </div>
          <div class="form-group">
            <input type="text" name="sisa_alokasi_baru" class="form-control" id="rupiah2" placeholder="Konfirmasi Anggaran RKA" onkeypress="return hanyaAngka(event)">
          </div>
          <div class="form-group">
            <input type="text" name="alokasi_carry_over" class="form-control" id="rupiah3" placeholder="RKA Carry Over" onkeypress="return hanyaAngka(event)">
          </div>
          <div class="form-group">
            <input type="text" name="sisa_alokasi_carry_over" class="form-control" id="rupiah4" placeholder="Konfirmasi RKA Carry Over" onkeypress="return hanyaAngka(event)">
          </div>
          <div class="form-group">
            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
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