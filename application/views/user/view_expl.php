<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url('user/pengadaan_expl/'); ?>" class="btn btn-sm btn-warning mb-3"><i class="fas fa-undo-alt"></i> Back</a>

      <table class="table table-responsive table-flush table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>Pemutus</th>
            <th>Uker</th>
            <th>No IP</th>
            <th>Tanggal IP</th>
            <th>Kode RKA</th>
            <th>Jenis Eksploitasi</th>
            <th>Kategori</th>
            <th>Kegiatan</th>
            <th>Rincian</th>
            <th>Total Project</th>
            <th>IP <?php echo date('Y'); ?> </th>
            <?php
            foreach ($data_expl->result() as $expl) {
              echo "<th>$expl->tahun</th>";
            }
            ?>
            <th>Nota Dinas (PBJ)</th>
            <th>No. SPK</th>
            <th>Tanggal SPK</th>
            <th>Vendor</th>
            <th>Nilai SPK</th>
            <th>SPK <?php echo date('Y'); ?></th>
            <?php
            foreach ($spk_expl->result() as $gg) {
              echo "<th>$gg->tahun_spk</th>";
            }
            ?>
            <th>Jangka Waktu Awal SPK</th>
            <th>Jangka Waktu Akhir SPK</th>
            <th>No Fiat Bayar</th>
            <th>Tanggal Fiat</th>
            <th>Nilai Fiat Bayar</th>
            <th>Keterangan</th>
            <th>Tanggal Cash Out</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($this->fitur == 'Lihat') {
          ?>
            <tr>
              <td></td>
              <td><?php echo $view->pemutus; ?></td>
              <td><?php echo $view->uker; ?></td>
              <td><?php echo $view->no_ip; ?></td>
              <td><?php echo date('d M Y', strtotime($view->tgl_ip)); ?></td>
              <td><?php echo $view->kode_rka; ?></td>
              <td><?php echo $view->jenis_eksploitasi; ?></td>
              <td><?= $view->kategori; ?></td>
              <td><?php echo $view->kegiatan; ?></td>
              <td><?php echo $view->rincian; ?></td>
              <td align="right"><?php echo number_format($view->nilai_ip); ?></td>
              <td align="right"><?php echo number_format($view->year_now); ?></td>
              <?php
              foreach ($data_expl->result() as $terr) {
                $rp = number_format($terr->anggaran);
                echo "<td align='right'>$rp</td>";
              }
              ?>
              <td><?php echo $view->nodin_pbj; ?></td>
              <td><?php echo $view->no_spk; ?></td>
              <td><?php echo date('d M Y', strtotime($view->tgl_spk)); ?></td>
              <td><?php echo $view->vendor; ?></td>
              <td align="right"><?php echo number_format($view->nilai_spk); ?></td>
              <td align="right"><?php echo number_format($view->spk_now); ?></td>
              <?php
              foreach ($spk_expl->result() as $key) {
                $cring = number_format($key->anggaran_spk);
                echo "<td align='right'>$cring</td>";
              }
              ?>
              <td><?php echo date('d M Y', strtotime($view->jangka_awal_spk)); ?></td>
              <td><?php echo date('d M Y', strtotime($view->jangka_akhir_spk)); ?></td>
              <?php
              foreach ($fiat_expl->result() as $woyo) {
                $deal = number_format($woyo->total);
                $tgl1 = date('d M Y', strtotime($woyo->tgl_fiat));
                $tgl2 = date('d M Y', strtotime($woyo->tgl_rc));
                echo "<td>$woyo->no_fiat</td>";
                echo "<td>$tgl1</td>";
                echo "<td>$deal</td>";
                echo "<td>$woyo->status_rc</td>";
                echo "<td>$tgl2</td>";
              }
              ?>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->