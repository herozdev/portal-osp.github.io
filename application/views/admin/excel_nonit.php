<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=$title.xlsx");
?>

<table border="1">
  <thead>
    <tr>
      <th>#</th>
      <th>No GL</th>
      <th>Mata Anggaran</th>
      <th>RKA</th>
      <th>Sisa Anggaran</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 0;
    $sum_rka = 0;
    $sum_sisa_rka = 0;
    ?>
    <?php foreach ($nonit->result_array() as $vv) : ?>
      <tr>
        <td><?= ++$no; ?></td>
        <td><?php echo $vv['no_gl']; ?></td>
        <td><?php echo $vv['mata_anggaran']; ?></td>
        <td><?= $vv['alokasi']; ?></td>
        <td><?php echo $vv['sisa_alokasi']; ?></td>
      </tr>
    <?php
      $sum_rka += $vv['alokasi'];
      $sum_sisa_rka += $vv['sisa_alokasi'];
    endforeach;
    ?>

    <tr>
      <td colspan="3" align="right"><span style="font-weight: bold; text-transform: uppercase;">Total</span></td>
      <td align="right"><?php echo number_format($sum_rka); ?></td>
      <td align="right"><?php echo number_format($sum_sisa_rka); ?></td>
    </tr>
  </tbody>
</table>