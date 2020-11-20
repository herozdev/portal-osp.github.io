<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=$title.xlsx");
?>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Pemutus</th>
      <th>Uker</th>
      <th>No IP</th>
      <th>Tanggal IP</th>
      <th>Jenis Eksploitasi</th>
      <th>Kategori</th>
      <th>Kegiatan</th>
      <th>Rincian</th>
      <th>Total Project</th>
      <th>IP <?php echo date('Y'); ?> </th>
      <th>Jangka Waktu Awal</th>
      <th>Jangka Waktu Akhir</th>
      <th>Nodin PBJ</th>
      <th>Tanggal Nodin PBJ</th>
      <th>No SPK</th>
      <th>Tanggal SPK</th>
      <th>Nilai SPK</th>
      <th>SPK <?= date('Y'); ?></th>
      <th>Jangka Awal SPK</th>
      <th>Jangka Akhir SPK</th>
      <th>Vendor</th>
      <th>No Fiat</th>
      <th>Tanggal Fiat</th>
      <th>Nilai Fiat</th>
      <th>Keterangan</th>
      <th>Tanggal Cashout</th>
      <th>PIC</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 0;
    $fiat = 0;
    $sum_ip = 0;
    $sum_now = 0;
    $sum_spk = 0;
    $spk_now = 0;
    ?>
    <?php foreach ($peng_expl->result_array() as $expl) : ?>
      <tr>
        <td><?= ++$no; ?></td>
        <td><?= $expl['pemutus']; ?></td>
        <td><?= $expl['uker']; ?></td>
        <td><?= $expl['no_ip']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_ip'])); ?></td>
        <td><?= $expl['jenis_eksploitasi']; ?></td>
        <td><?= $expl['kategori']; ?></td>
        <td><?= $expl['kegiatan']; ?></td>
        <td><?= $expl['rincian']; ?></td>
        <td><?= $expl['nilai_ip']; ?></td>
        <td><?= $expl['year_now']; ?></td>

        <td><?= date('d-M-Y', strtotime($expl['jangka_waktu_awal'])); ?></td>
        <td><?= date('d-M-Y', strtotime($expl['jangka_waktu_akhir'])); ?></td>
        <td><?= $expl['nodin_pbj']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_nodin_pbj'])); ?></td>
        <td><?= $expl['no_spk']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_spk'])); ?></td>
        <td><?= $expl['nilai_spk']; ?></td>
        <td><?= $expl['spk_now']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['jangka_awal_spk'])); ?></td>
        <td><?= date('d-M-Y', strtotime($expl['jangka_akhir_spk'])); ?></td>
        <td><?= $expl['vendor']; ?></td>
        <td><?= $expl['no_fiat']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_fiat'])); ?></td>
        <td><?= $expl['total']; ?></td>
        <td><?= $expl['status_rc']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_rc'])); ?></td>
        <td><?= $expl['firstname']; ?></td>
      </tr>
    <?php
      $fiat += $expl['total'];
      $sum_now += $expl['year_now'];
      $sum_ip += $expl['nilai_ip'];
      $sum_spk += $expl['nilai_spk'];
      $spk_now += $expl['spk_now'];
    endforeach;
    ?>
    <tr>
      <td colspan="9" align="right"><span style="font-weight: bold; text-transform: uppercase;">Total</span></td>
      <td align="right"><?php echo $sum_ip; ?></td>
      <td align="right"><?php echo $sum_now; ?></td>
      <td colspan="6"></td>
      <td align="right"><?php echo $sum_spk; ?></td>
      <td align="right"><?php echo $spk_now; ?></td>
      <td colspan="5"></td>
      <td align="right"><?php echo $fiat; ?></td>
      <td colspan="3"></td>
    </tr>
  </tbody>
</table>