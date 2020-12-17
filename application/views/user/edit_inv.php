<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg">
      <?= form_open_multipart('user/update_inv'); ?>
      <input type="hidden" id="idf" value="1">
      <input type="hidden" id="idf2" value="1">
      <input type="hidden" id="idf3" value="1">
      <input type="hidden" id="ids" value="1">
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
      <div class="form-group">
        <label for="">Pemutus</label>
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
          <label for="">Uker</label>
          <input type="text" name="uker" id="uker" class="form-control" placeholder="Uker" value="<?= $row['uker']; ?>">
          <?= form_error('uker', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-sm-6">
          <label for="">No IP</label>
          <input type="text" class="form-control" name="no_ip" id="no_ip" value="<?= $row['no_ip']; ?>">
          <?= form_error('no_ip', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="">Tanggal IP</label>
        <input type="text" name="tgl_ip" id="input-tanggal1" class="form-control" placeholder="Tanggal IP" value="<?= $row['tgl_ip']; ?>">
        <?= form_error('tgl_ip', '<small class="text-danger pl-3">', '</small>'); ?>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-2 mb-sm-0">
          <label for="">Jenis Investasi</label>
          <select name="kode_jenis" id="kodejenisinv" class="form-control">
            <option value="">-PILIH-</option>
            <?php foreach ($jenis as $jns) : ?>
              <option value="<?= $jns['kode_jenis']; ?>"><?= $jns['jenis_investasi']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-sm-6">
          <label for="">Kegiatan</label>
          <select name="kode_kegiatan" id="kegiataninv" class="form-control">
            <option value="">-PILIH-</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="">Rincian</label>
        <textarea name="rincian" id="rincian" cols="10" rows="5" class="form-control" placeholder="Rincian"><?= $row['rincian']; ?></textarea>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="">Nilai IP</label>
          <input type="text" name="nilai_ip" id="rupiah1" class="form-control" placeholder="Nilai IP" onkeypress="return hanyaAngka(event)" value="<?= $row['nilai_ip']; ?>">
        </div>
        <div class="col-sm-6">
          <label for="">IP <?= date('Y'); ?></label>
          <input type="text" name="year_now" id="rupiah2" class="form-control" placeholder="IP <?= date('Y'); ?>" onkeypress="return hanyaAngka(event)" value="<?= $row['year_now']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="">Beban Anggaran IP</label>
        <div class="col-sm mb-3 bb-sm-0">
          <div class="mb-3 text-right">
            <?php
            if ($this->fitur = 'Ubah') {
              $yoo = number_format($row['anggaran']);
              echo "<input class='form-control' value='$row[tahun]' disabled>";
              echo " - ";
              echo "<input class='form-control' value='$yoo' disabled>";
            }
            ?>
            <button type="button" onclick="addRincian(); return false;" class="btn btn-outline-primary">Add Form</button>
            <div id="divAkun"></div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="">Jangka Waktu Awal</label>
          <input type="text" class="form-control" name="jangka_waktu_awal" placeholder="Jangka Waktu Awal" value="<?= $row['jangka_waktu_awal']; ?>" id="input-tanggal2">
        </div>
        <div class="col-sm-6">
          <label for="">Jangka Wktu Akhir</label>
          <input type="text" id="input-tanggal3" class="form-control" name="jangka_waktu_akhir" placeholder="Jangka Waktu Akhir" value="<?= $row['jangka_waktu_akhir']; ?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="">Nodin PBJ</label>
          <input type="text" name="nodin_pbj" id="nodin_pbj" class="form-control" placeholder="Nodin PBJ" value="<?= $row['nodin_pbj'] ?>">
        </div>
        <div class="col-sm-6">
          <label for="">Tanggal Nodin PBJ</label>
          <input type="text" name="tgl_nodin_pbj" id="input-tanggal4" class="form-control" placeholder="Tanggal Nodin PBJ" value="<?= $row['tgl_nodin_pbj']; ?>">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="">No SPK</label>
          <input type="text" name="no_spk" id="no_spk" class="form-control" placeholder="No. SPK" value="<?= $row['no_spk']; ?>">
        </div>
        <div class="col-sm-6">
          <label for="">Tanggal SPK</label>
          <input type="text" name="tgl_spk" id="input-tanggal5" class="form-control" placeholder="Tanggal SPK" value="<?= $row['tgl_spk']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="">Vendor</label>
        <input type="text" name="vendor" id="vendor" class="form-control" placeholder="Vendor" value="<?= $row['vendor']; ?>">
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="">Nilai SPK</label>
          <input type="text" name="nilai_spk" id="rupiah3" class="form-control" placeholder="Nilai SPK" value="<?= $row['nilai_spk']; ?>">
        </div>
        <div class="col-sm-6">
          <label for="">SPK <?= date('Y'); ?></label>
          <input type="text" name="spk_now" id="rupiah4" class="form-control" placeholder="SPK <?= date('Y'); ?>" value="<?= $row['spk_now']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="">Beban Anggaran SPK</label>
        <div class="mb-3 text-right">
          <?php
          if ($this->fitur = 'Ubah') {
            $yey = number_format($row['anggaran_spk']);
            echo "<input class='form-control' value='$row[tahun_spk]' disabled>";
            echo " - ";
            echo "<input class='form-control' value='$yey' disabled>";
          }
          ?>
          <button type="button" onclick="addSpk(); return false;" class="btn btn-outline-primary">Add Form</button>
          <div id="divSpk"></div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="">Jangka Awal SPK</label>
          <input type="text" name="jangka_awal_spk" id="input-tanggal6" class="form-control" placeholder="Jangka Awal SPK" value="<?= $row['jangka_awal_spk']; ?>">
        </div>
        <div class="col-sm-6">
          <label for="">Jangka Akhir SPK</label>
          <input type="text" name="jangka_akhir_spk" id="input-tanggal7" class="form-control" placeholder="Jangka Akhir SPK" value="<?= $row['jangka_akhir_spk']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="">Fiat Bayar</label>
        <div class="mb-3 text-left">
          <?php
          if ($this->fitur = 'Ubah') {
            $cost = number_format($row['total']);
            echo "<input class='form-control' value='$cost' disabled>";
            echo " - ";
            echo "<input class='form-control' value='$row[status_rc]' disabled>";
          }
          ?>
          <button type="button" onclick="addFiat(); return false;" class="btn btn-outline-primary">Add Form</button>
          <div id="divFiat"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-sm-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="files" name="files">
              <label class="custom-file-label" for="files">Choose file</label>
            </div>
            <a href="<?= base_url() . 'assets/files/documents/' . $row['files']; ?>" target="_blank">
              View PDF
            </a>
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
        <button type="submit" class="btn btn-outline-primary">Update</button>
      </div>
      <?= form_close(); ?>
      <a href="<?= base_url('user/pengadaan_inv'); ?>" class="btn btn-outline-warning">Back</a>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->