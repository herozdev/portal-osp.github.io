<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg">
      <?= form_open('admin/updateNonit'); ?>
      <div class="form-group">
        <label for="no_gl">No GL</label>
        <input type="text" class="form-control" id="no_gl" name="no_gl" value="<?= $row['no_gl']; ?>" readonly>
        <?= form_error('no_gl', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <label for="mata_anggaran">Mata Anggaran</label>
        <input type="text" name="mata_anggaran" id="mata_anggaran" class="form-control" value="<?= $row['mata_anggaran']; ?>">
        <?= form_error('mata_anggaran', '<small class="text-danger pl-3">', '</small>') ?>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="alokasi">Alokasi</label>
          <input type="text" name="alokasi" id="rupiah1" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= str_replace('.', '', $row['alokasi']); ?>">
          <?= form_error('alokasi', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-sm-6">
          <label for="sisa_alokasi">Sisa Alokasi</label>
          <input type="text" name="sisa_alokasi" id="rupiah2" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= str_replace('.', '', $row['sisa_alokasi']); ?>">
          <?= form_error('sisa_alokasi', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group">
        <a href="<?= base_url('admin/expl_nonit'); ?>" class="btn btn-outline-warning">Back</a>
        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
        <button type="submit" class="btn btn-outline-primary">Update</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->