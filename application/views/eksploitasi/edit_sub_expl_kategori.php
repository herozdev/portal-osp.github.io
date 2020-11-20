<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-6">
      <?= form_open('menu/updateSubExplKat'); ?>
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
      <div class="form-group">
        <label for="kode_jenis">Kode Jenis</label>
        <select name="kode_jenis" id="kode_jenis" class="form-control">
          <option value="">-PILIH-</option>
          <?php foreach ($jenis as $val): ?>
            <option value="<?= $val['kode_jenis']; ?>"><?= $val['jenis_eksploitasi']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <input type="hidden" name="kode_kategori" value="<?= $row['kode_kategori']; ?>">
      <div class="form-group">
        <label for="kategori">Kategori</label>
        <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $row['kategori']; ?>">
        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <a href="<?= base_url('menu/sub_expl_kat'); ?>" class="btn btn-outline-warning">Back</a>
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


