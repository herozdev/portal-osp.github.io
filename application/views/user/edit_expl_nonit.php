<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?= $this->session->flashdata('message'); ?>
  <div class="row">
    <div class="col-lg">
      <?= form_open('user/update_expl_nonit'); ?>
      <input type="hidden" id="idf" value="1">
      <input type="hidden" id="idf2" value="1">
      <input type="hidden" id="idf4" value="1">
      <input type="hidden" id="idf5" value="1">
      <input type="hidden" id="ids" value="1">
      <input type="hidden" name="id" value="<?= $row['id']; ?>">
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="">No IP</label>
          <input type="text" class="form-control" name="no_ip" id="no_ip" value="<?= $row['no_ip']; ?>">
          <?= form_error('no_ip', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="col-sm-6">
          <label for="">Tanggal IP</label>
          <input type="text" name="tgl_ip" id="input-tanggal1" class="form-control" placeholder="Tanggal IP" value="<?= $row['tgl_ip']; ?>">
          <?= form_error('tgl_ip', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="">Mata Anggaran</label>
        <select name="no_gl" id="no_gl" class="form-control">
          <option value="">-PILIH-</option>
          <?php foreach ($jenis as $jns) : ?>
            <option value="<?= $jns['no_gl']; ?>"><?= $jns['mata_anggaran']; ?></option>
          <?php endforeach; ?>
        </select>
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
              echo "<input class='form-control' value='$row[tahun]' disabled>";
              echo " - ";
              $aa = number_format($row['anggaran']);
              echo "<input class='form-control' value='$aa' disabled>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="">Memo <?= date('Y'); ?></label>
        <input type="text" name="nilai_memo" id="rupiah3" class="form-control" placeholder="Memo <?= date('Y'); ?>" onkeypress="return hanyaAngka(event)" value="<?= $row['nilai_memo']; ?>">
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="">Jangka Waktu Awal</label>
          <input type="text" class="form-control" name="jngka_waktu_awal" placeholder="Jangka Waktu Awal" value="<?= $row['jngka_waktu_awal']; ?>" id="input-tanggal2">
        </div>
        <div class="col-sm-6">
          <label for="">Jangka Wktu Akhir</label>
          <input type="text" id="input-tanggal3" class="form-control" name="jngka_waktu_akhir" placeholder="Jangka Waktu Akhir" value="<?= $row['jngka_waktu_akhir']; ?>">
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
            echo "<input class='form-control' value='$row[tahun_spk]' disabled>";
            echo " - ";
            $sss = number_format($row['anggaran_spk']);
            echo "<input class='form-control' value='$sss' disabled>";
          }
          ?>
        </div>
      </div>
      <div class="form-group">
        <label for="">Memo SPK <?= date('Y'); ?></label>
        <input type="text" name="nilai_memo_spk" id="rupiah5" class="form-control" placeholder="Memo SPK <?= date('Y'); ?>" value="<?= $row['nilai_memo_spk'] ?>">
      </div>
      <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <label for="">Jangka Awal SPK</label>
          <input type="text" name="jngka_awal_spk" id="input-tanggal6" class="form-control" placeholder="Jangka Awal SPK" value="<?= $row['jngka_awal_spk']; ?>">
        </div>
        <div class="col-sm-6">
          <label for="">Jangka Akhir SPK</label>
          <input type="text" name="jngka_akhir_spk" id="input-tanggal7" class="form-control" placeholder="Jangka Akhir SPK" value="<?= $row['jngka_akhir_spk']; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="">Fiat Bayar</label>
        <div class="mb-3 text-right">
          <button type="button" onclick="addFiatnonIT(); return false;" class="btn btn-outline-primary">Add Form</button>
          <div id="divFiatexplnonIT"></div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?php
            if ($this->fitur = 'Ubah') {
              $ddf = number_format($row['total']);
              echo "<input class='form-control' value='$ddf' disabled>";
              echo " - ";
              echo "<input class='form-control' value='$row[status_rc]' disabled>";
            }
            ?>
          </div>
        </div>
      </div>
      <div class="form-group">
        <a href="<?= base_url('user/pengadaan_inv'); ?>" class="btn btn-outline-warning">Back</a>
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