<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg">
      <?= form_open('admin/updateInv'); ?>
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
      <div class="form-group">
        <label for="kode_rka">Kode RKA</label>
        <input type="text" class="form-control" id="kode_rka" name="kode_rka" value="<?= $row['kode_rka']; ?>">
        <?= form_error('kode_rka', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="kode_jenis">Kode Jenis</label>
          <select name="kode_jenis" class="form-control" id="kode_jenis">
            <option value="">-PILIH-</option>
            <?php foreach ($jenis as $m) : ?>
              <option value="<?= $m['kode_jenis']; ?>"><?= $m['jenis_investasi']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-sm-6">
          <input type="hidden" name="kode_kegiatan" value="<?= $row['kode_kegiatan']; ?>">
          <label for="kegiatan">Kegiatan</label>
          <input type="text" class="form-control" name="kegiatan" id="kegiatan" value="<?= $row['kegiatan']; ?>">
          <?= form_error('kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="alokasi_baru">Alokasi Baru</label>
          <input type="text" name="alokasi_baru" id="rupiah1" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= str_replace('.', '', $row['alokasi_baru']); ?>">
          <?= form_error('alokasi_baru', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-sm-6">
          <label for="sisa_alokasi_baru">Sisa Alokasi Baru</label>
          <input type="text" name="sisa_alokasi_baru" id="rupiah2" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= str_replace('.', '', $row['sisa_alokasi_baru']); ?>">
          <?= form_error('sisa_alokasi_baru', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="alokasi_carry_over">Alokasi Carry Over</label>
          <input type="text" name="alokasi_carry_over" id="rupiah3" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= str_replace('.', '', $row['alokasi_carry_over']); ?>">
          <?= form_error('alokasi_carry_over', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-sm-6">
          <label for="sisa_alokasi_carry_over">Sisa Alokasi Carry Over</label>
          <input type="text" name="sisa_alokasi_carry_over" id="rupiah4" class="form-control" onkeypress="return hanyaAngka(event)" value="<?= str_replace('.', '', $row['sisa_alokasi_carry_over']); ?>">
          <?= form_error('sisa_alokasi_carry_over', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $row['keterangan']; ?>">
        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group">
        <a href="<?= base_url('admin/inv'); ?>" class="btn btn-outline-warning">Back</a>
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