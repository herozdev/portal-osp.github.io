<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=$title.xlsx");
?>

<table class="table align-items-center table-flush table-bordered">
  <thead class="thead-dark">
    <tr>
      <th rowspan="2" style="text-align: center; vertical-align:middle; font-size:small;">Pengadaan/Kegiatan</th>
      <th colspan="2" style="text-align: center; vertical-align:middle; font-size:small;">RKA IT 1 Tahun</th>
      <th rowspan="2" style="text-align: center; vertical-align:middle; font-size:small;">Total Realisasi IP <?= date('Y'); ?></th>
      <th rowspan="2" style="text-align: center; vertical-align:middle; font-size:small;">%</th>
      <th rowspan="2" style="text-align: center; vertical-align:middle; font-size:small;">Total Realisasi SPK <?= date('Y'); ?></th>
      <th rowspan="2" style="text-align: center; vertical-align:middle; font-size:small;">%</th>
      <th rowspan="2" style="text-align: center; vertical-align:middle; font-size:small;">Total Perkiraan Cashout <?= date('Y'); ?></th>
      <th rowspan="2" style="text-align: center; vertical-align:middle; font-size:small;">%</th>
    </tr>
    <tr>
      <th style="text-align: center; vertical-align:middle; font-size:small;">Baru</th>
      <th style="text-align: center; vertical-align:middle; font-size:small;">Carry Over</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php foreach ($hw as $a) : ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;">Investasi Hardware - Non Proyek</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($a['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($a['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($inv as $s) : ?>
        <?php
        $persentase1 = round($s['year_now'] / ($s['alokasi_baru'] + $s['alokasi_carry_over']) * 100, 2);
        $persentase2 = round($s['spk_now'] / ($s['alokasi_baru'] + $s['alokasi_carry_over']) * 100, 2);
        $persentase3 = round($s['total'] / ($s['alokasi_baru'] + $s['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($s['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $persentase1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($s['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $persentase2; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($s['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $persentase3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <?php foreach ($sw as $z) : ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;">Investasi Software - Non Proyek</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($z['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($z['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($soft as $v) : ?>
        <?php
        $persen1 = round($v['year_now'] / ($v['alokasi_baru'] + $v['alokasi_carry_over']) * 100, 2);
        $persen2 = round($v['spk_now'] / ($v['alokasi_baru'] + $v['alokasi_carry_over']) * 100, 2);
        $persen3 = round($v['total'] / ($v['alokasi_baru'] + $v['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($v['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $persen1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($v['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $persen2; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($v['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $persen3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <td style="text-align: right; vertical-align:middle; font-size:small;">Total Investasi</td>
      <?php
      $sum1 = $a['alokasi_baru'] + $z['alokasi_baru'];
      $sum2 = $a['alokasi_carry_over'] + $z['alokasi_carry_over'];
      $sum3 = $s['year_now'] + $v['year_now'];
      $sum4 = round($sum3 / ($sum1 + $sum2) * 100, 2);
      $sum5 = $s['spk_now'] + $v['spk_now'];
      $sum6 = round($sum5 / ($sum1 + $sum2) * 100, 2);
      $sum7 = $s['total'] + $v['total'];
      $sum8 = round($sum7 / ($sum1 + $sum2) * 100, 2);
      ?>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($sum1); ?></td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($sum2); ?></td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($sum3); ?></td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($sum4); ?>%</td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($sum5); ?></td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($sum6); ?>%</td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($sum7); ?></td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($sum8); ?>%</td>
    </tr>
  </tbody>
</table>