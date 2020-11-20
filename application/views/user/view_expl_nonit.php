<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url('user/peng_expl_nonit/'); ?>" class="btn btn-sm btn-warning mb-3"><i class="fas fa-undo-alt"></i> Back</a>

      <table class="table table-responsive table-flush table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#</th>
            <th>No IP</th>
            <th>Tanggal IP</th>
            <th>No GL</th>
            <th>Mata Anggaran</th>
            <th>Rincian</th>
            <th>Total Project</th>
            <th>IP <?php echo date('Y'); ?> </th>
            <?php
            foreach ($data_nonit->result() as $expl) {
              echo "<th>$expl->tahun</th>";
            }
            ?>
            <th>Memo IP</th>
            <th>No. SPK</th>
            <th>Tanggal SPK</th>
            <th>Vendor</th>
            <th>Nilai SPK</th>
            <th>SPK <?php echo date('Y'); ?></th>
            <?php
            foreach ($spk_nonit->result() as $gg) {
              echo "<th>$gg->tahun_spk</th>";
            }
            ?>
            <th>Memo SPK</th>
            <th>No Fiat Bayar</th>
            <th>Tanggal Fiat</th>
            <th>Nilai Fiat Bayar</th>
            <th>Nilai Tabanan</th>
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
              <td><?php echo $view->no_ip; ?></td>
              <td><?php echo date('d M Y', strtotime($view->tgl_ip)); ?></td>
              <td><?php echo $view->no_gl; ?></td>
              <td><?php echo $view->mata_anggaran; ?></td>
              <td><?php echo $view->rincian; ?></td>
              <td align="right"><?php echo number_format($view->nilai_ip); ?></td>
              <td align="right"><?php echo number_format($view->year_now); ?></td>
              <?php
              foreach ($data_nonit->result() as $terr) {
                $rp = number_format($terr->anggaran);
                echo "<td align='right'>$rp</td>";
              }
              ?>
              <td><?php echo $view->nilai_memo; ?></td>
              <td><?php echo $view->no_spk; ?></td>
              <td><?php echo date('d M Y', strtotime($view->tgl_spk)); ?></td>
              <td><?php echo $view->vendor; ?></td>
              <td align="right"><?php echo number_format($view->nilai_spk); ?></td>
              <td align="right"><?php echo number_format($view->spk_now); ?></td>
              <?php
              foreach ($spk_nonit->result() as $key) {
                $cring = number_format($key->anggaran_spk);
                echo "<td align='right'>$cring</td>";
              }
              ?>
              <td><?= number_format($view->nilai_memo_spk); ?></td>
              <?php
              foreach ($fiat_nonit->result() as $woyo) {
                $deal = number_format($woyo->total);
                $memo = number_format($woyo->nilai_tabanan);
                $tgl1 = date('d M Y', strtotime($woyo->tgl_fiat));
                $tgl2 = date('d M Y', strtotime($woyo->tgl_rc));
                echo "<td>$woyo->no_fiat</td>";
                echo "<td>$tgl1</td>";
                echo "<td>$deal</td>";
                echo "<td>$memo</td>";
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