<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= form_error('admin', '<div class="alert alert-danger" role="alert">', '</div>') ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="#" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#newBreakdown"><i class="fas fa-fw fa-plus"></i>Add</a>

      <a href="<?= base_url('admin/excel_expl_nonit'); ?>" class="btn btn-sm btn-success mb-3"><i class="fas fa-fw fa-download"></i> Export Excel</a>

      <form action="<?= base_url('admin/search_expl_nonit'); ?>" method="POST">
        <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
          <div class="input-group">
            <input type="text" name="keyword" id="keyword" placeholder="What're you searching for?" aria-describedby="button-addon1" class="form-control border-0 bg-light">
            <div class="input-group-append">
              <button type="submit" id="button-addon1" class="btn btn-link text-primary"><i class="fas fa-fw fa-search"></i></button>
            </div>
          </div>
        </div>
      </form>

      <table class="table align-items-center table-flush table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">No GL</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Mata Anggaran</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">RKA</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Sisa Anggaran</th>
            <th style="text-align: center; vertical-align:middle; font-size:small;">Menu</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 0;
          $sum_anggaran = 0;
          $sisa_anggaran = 0;
          ?>
          <?php foreach ($expl_nonit as $vv) : ?>
            <tr>
              <td><?= ++$no; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $vv['no_gl']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $vv['mata_anggaran']; ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($vv['alokasi']); ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($vv['sisa_alokasi']); ?></td>
              <td style="text-align: center; vertical-align:middle; font-size:small;">
                <a href="<?= base_url('admin/edit_form_expl_nonit/' . $vv['no_gl']); ?>" class="badge badge-success"><i class="fas fa-fw fa-pencil-alt"></i> Edit</a>
                <a href="" onclick="confirm_modal('<?= site_url('admin/delete_expl_nonit/' . $vv['no_gl']); ?>')" data-toggle="modal" data-target="#deleteMenu" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i> Delete</a>
              </td>
            </tr>
          <?php
            $sum_anggaran += $vv['alokasi'];
            $sisa_anggaran += $vv['sisa_alokasi'];
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
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total RKA</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sum_anggaran); ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sisa Anggaran</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($sisa_anggaran); ?></div>
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
      <form action="<?= base_url('admin/expl_nonit'); ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" name="no_gl" class="form-control" placeholder="No GL">
            <?= form_error('no_gl', '<div class="alert alert-danger" role="alert">', '</div>') ?>
          </div>
          <div class="form-group">
            <input type="text" name="mata_anggaran" id="" class="form-control" placeholder="Mata Anggaran">
            <?= form_error('mata_anggaran', '<div class="alert alert-danger" role="alert">', '</div>') ?>
          </div>
          <div class="form-group">
            <input type="text" name="alokasi" class="form-control" placeholder="Alokasi" id="rupiah1" onkeypress="return hanyaAngka(event)">
          </div>
          <div class="form-group">
            <input type="text" name="sisa_alokasi" class="form-control" id="rupiah2" placeholder="Konfirmasi Alokasi" onkeypress="return hanyaAngka(event)">
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