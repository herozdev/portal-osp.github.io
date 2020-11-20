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
      <th>Jenis Investasi</th>
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
    <?php foreach ($peng_inv->result_array() as $inv) : ?>
      <tr>
        <td><?= ++$no; ?></td>
        <td><?= $inv['pemutus']; ?></td>
        <td><?= $inv['uker']; ?></td>
        <td><?= $inv['no_ip']; ?></td>
        <td><?= date('d-M-Y', strtotime($inv['tgl_ip'])); ?></td>
        <td><?= $inv['jenis_investasi']; ?></td>
        <td><?= $inv['kegiatan']; ?></td>
        <td><?= $inv['rincian']; ?></td>
        <td><?= $inv['nilai_ip']; ?></td>
        <td><?= $inv['year_now']; ?></td>

        <td><?= date('d-M-Y', strtotime($inv['jangka_waktu_awal'])); ?></td>
        <td><?= date('d-M-Y', strtotime($inv['jangka_waktu_akhir'])); ?></td>
        <td><?= $inv['nodin_pbj']; ?></td>
        <td><?= date('d-M-Y', strtotime($inv['tgl_nodin_pbj'])); ?></td>
        <td><?= $inv['no_spk']; ?></td>
        <td><?= date('d-M-Y', strtotime($inv['tgl_spk'])); ?></td>
        <td><?= $inv['nilai_spk']; ?></td>
        <td><?= $inv['spk_now']; ?></td>
        <td><?= date('d-M-Y', strtotime($inv['jangka_awal_spk'])); ?></td>
        <td><?= date('d-M-Y', strtotime($inv['jangka_akhir_spk'])); ?></td>
        <td><?= $inv['vendor']; ?></td>
        <td><?= $inv['no_fiat']; ?></td>
        <td><?= date('d-M-Y', strtotime($inv['tgl_fiat'])); ?></td>
        <td><?= $inv['total']; ?></td>
        <td><?= $inv['status_rc']; ?></td>
        <td><?= date('d-M-Y', strtotime($inv['tgl_rc'])); ?></td>
        <td><?= $inv['firstname']; ?></td>
      </tr>
    <?php
      $fiat += $inv['total'];
      $sum_now += $inv['year_now'];
      $sum_ip += $inv['nilai_ip'];
      $sum_spk += $inv['nilai_spk'];
      $spk_now += $inv['spk_now'];
    endforeach;
    ?>
    <tr>
      <td colspan="8" align="right"><span style="font-weight: bold; text-transform: uppercase;">Total</span></td>
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