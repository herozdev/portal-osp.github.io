<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=$title.xlsx");
?>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>No. IP</th>
      <th>Tanggal IP</th>
      <th>No GL</th>
      <th>Mata Anggaran</th>
      <th>Perihal</th>
      <th>Total Project</th>
      <th>IP <?php echo date('Y'); ?></th>
      <th>Memo <?php echo date('Y'); ?></th>
      <th>No SPK</th>
      <th>Tanggal SPK</th>
      <th>Vendor</th>
      <th>Nilai SPK</th>
      <th>SPK <?= date('Y'); ?></th>
      <th>Memo SPK <?= date('Y'); ?></th>
      <th>Jangka Awal SPK</th>
      <th>Jangka Akhir SPK</th>
      <th>No Fiat</th>
      <th>Tanggal Fiat</th>
      <th>Nilai Fiat</th>
      <th>Nilai Tabanan</th>
      <th>Keterangan</th>
      <th>Tanggal Cashout</th>
      <th>PIC</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 0;
    $sum_ip = 0;
    $sum_now = 0;
    $memo = 0;
    $sum_spk = 0;
    $spk_now = 0;
    $memo_spk = 0;
    $fiat = 0;
    $tabanan = 0;
    ?>
    <?php foreach ($expl_nonit->result_array() as $expl) : ?>
      <tr>
        <td><?= ++$no; ?></td>
        <td><?= $expl['no_ip']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_ip'])); ?></td>
        <td><?= $expl['no_gl']; ?></td>
        <td><?= $expl['mata_anggaran']; ?></td>
        <td><?= $expl['rincian']; ?></td>
        <td><?= $expl['nilai_ip']; ?></td>
        <td><?= $expl['year_now']; ?></td>
        <td><?= $expl['nilai_memo'] ?></td>
        <td><?= $expl['no_spk']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_spk'])); ?></td>
        <td><?= $expl['vendor']; ?></td>
        <td><?= $expl['nilai_spk']; ?></td>
        <td><?= $expl['spk_now']; ?></td>
        <td><?= $expl['nilai_memo_spk']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['jngka_awal_spk'])); ?></td>
        <td><?= date('d-M-Y', strtotime($expl['jngka_akhir_spk'])); ?></td>
        <td><?= $expl['no_fiat']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_fiat'])); ?></td>
        <td><?= $expl['total']; ?></td>
        <td><?= $expl['nilai_tabanan']; ?></td>
        <td><?= $expl['status_rc']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_rc'])); ?></td>
        <td><?= $expl['firstname']; ?></td>
      </tr>
    <?php
      $sum_now += $expl['year_now'];
      $sum_ip += $expl['nilai_ip'];
      $memo += $expl['nilai_memo'];
      $sum_spk += $expl['nilai_spk'];
      $spk_now += $expl['spk_now'];
      $memo_spk += $expl['nilai_memo_spk'];
      $fiat += $expl['total'];
      $tabanan += $expl['nilai_tabanan'];
    endforeach;
    ?>
    <tr>
      <td colspan="6" align="right"><span style="font-weight: bold; text-transform: uppercase;">Total</span></td>
      <td align="right"><?php echo $sum_ip; ?></td>
      <td align="right"><?php echo $sum_now; ?></td>
      <td align="right"><?php echo $memo; ?></td>
      <td colspan="3"></td>
      <td align="right"><?php echo $sum_spk; ?></td>
      <td align="right"><?php echo $spk_now; ?></td>
      <td align="right"><?php echo $memo_spk; ?></td>
      <td colspan="4"></td>
      <td align="right"><?php echo $fiat; ?></td>
      <td align="right"><?php echo $tabanan; ?></td>
      <td colspan="3"></td>
    </tr>
  </tbody>
</table>