<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=$title.xlsx");
?>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Kode</th>
      <th>Jenis Investasi</th>
      <th>Kegiatan</th>
      <th>RKA</th>
      <th>Sisa Anggaran</th>
      <th>Anggaran Carry Over</th>
      <th>Sisa Anggaran Carry Over</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 0;
    $sum_rka = 0;
    $sum_sisa_rka = 0;
    $sum_carry = 0;
    $sum_sisa_carry = 0;
    ?>
    <?php foreach ($inv->result_array() as $vv) : ?>
      <tr>
        <td><?= ++$no; ?></td>
        <td><?php echo $vv['kode_rka']; ?></td>
        <td><?php echo $vv['jenis_investasi']; ?></td>
        <td><?php echo $vv['kegiatan']; ?></td>
        <td><?php echo $vv['alokasi_baru']; ?></td>
        <td><?php echo $vv['sisa_alokasi_baru']; ?></td>
        <td><?= $vv['alokasi_carry_over']; ?></td>
        <td><?= $vv['sisa_alokasi_carry_over']; ?></td>
        <td><?= $vv['keterangan']; ?></td>
      </tr>
    <?php
      $sum_rka += $vv['alokasi_baru'];
      $sum_sisa_rka += $vv['sisa_alokasi_baru'];
      $sum_carry += $vv['alokasi_carry_over'];
      $sum_sisa_carry += $vv['sisa_alokasi_carry_over'];
    endforeach;
    ?>

    <tr>
      <td colspan="4" align="right"><span style="font-weight: bold; text-transform: uppercase;">Total</span></td>
      <td align="right"><?php echo number_format($sum_rka); ?></td>
      <td align="right"><?php echo number_format($sum_sisa_rka); ?></td>
      <td align="right"><?php echo number_format($sum_carry); ?></td>
      <td align="right"><?php echo number_format($sum_sisa_carry); ?></td>
    </tr>
  </tbody>
</table>