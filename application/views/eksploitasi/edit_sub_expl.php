<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">
      <?= form_open('menu/updateSubExpl'); ?>
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
      <div class="form-group">
        <label for="kode_jenis">Kode Jenis</label>
        <input type="text" class="form-control" name="kode_jenis" id="kode_jenis" value="<?= $row['kode_jenis']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="kegiatan">Jenis Eksploitasi</label>
        <input type="text" class="form-control" name="jenis_eksploitasi" id="jenis_eksploitasi" value="<?= $row['jenis_eksploitasi']; ?>">
        <?= form_error('jenis_eksploitasi', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <a href="<?= base_url('menu/sub_expl'); ?>" class="btn btn-outline-warning">Back</a>
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


