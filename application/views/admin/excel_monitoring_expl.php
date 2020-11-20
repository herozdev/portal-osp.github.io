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
      <td colspan="9" style="vertical-align:middle; font-size:small;">EKSPLOITASI TI - NON RUTIN NON PROYEK</td>
    </tr>
    <tr>
      <?php foreach ($nonit as $p) : ?>
        <td style="text-align: center; font-size:small;"><?= $p['kategori']; ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($p['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($p['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($monit1 as $x) : ?>
        <?php
        $nilai1 = round($x['year_now'] / ($x['alokasi_baru'] + $x['alokasi_carry_over']) * 100, 2);
        $nilai2 = round($x['spk_now'] / ($x['alokasi_baru'] + $x['alokasi_carry_over']) * 100, 2);
        $nilai3 = round($x['total'] / ($x['alokasi_baru'] + $x['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($x['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $nilai1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($x['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $nilai2; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($x['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $nilai3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <?php
      $sum = 0;
      $sum_cv = 0;
      $sum_ip = 0;
      $sum_spk = 0;
      $sum_fiat = 0;


      $sum += $p['alokasi_baru'];
      $sum_cv += $p['alokasi_carry_over'];
      $sum_ip += $x['year_now'];
      $sum_spk += $x['spk_now'];
      $sum_fiat += $x['total'];

      $t1 = round($sum_ip / ($sum + $sum_cv) * 100, 2);
      $t2 = round($sum_spk / ($sum + $sum_cv) * 100, 2);
      $t3 = round($sum_fiat / ($sum + $sum_cv) * 100, 2);
      ?>
      <td style="text-align:right; vertical-align:middle; font-size:small;">TOTAL</td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= number_format($sum); ?></td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= number_format($sum_cv); ?></td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= number_format($sum_ip); ?></td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= $t1; ?>%</td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= number_format($sum_spk); ?></td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= $t2; ?>%</td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= number_format($sum_fiat); ?></td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= $t3; ?>%</td>
    </tr>
    <tr>
      <td colspan="9" style="vertical-align:middle; font-size:small;">EKSPLOITASI TI - RUTIN NON PROYEK</td>
    </tr>
    <tr>
      <?php foreach ($it1 as $j) : ?>
        <td style="text-align: center; font-size:small;"><?= $j['kategori']; ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($j['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($j['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($mon_it1 as $g) : ?>
        <?php
        $a1 = round($g['year_now'] / ($g['alokasi_baru'] + $g['alokasi_carry_over']) * 100, 2);
        $a2 = round($g['spk_now'] / ($g['alokasi_baru'] + $g['alokasi_carry_over']) * 100, 2);
        $a3 = round($g['total'] / ($g['alokasi_baru'] + $g['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($g['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $a1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($g['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $a2 ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($g['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $a3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <?php foreach ($it2 as $i) : ?>
        <td style="text-align: center; font-size:small;"><?= $i['kategori']; ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($i['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($i['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($mon_it2 as $y) : ?>
        <?php
        $b1 = round($y['year_now'] / ($y['alokasi_baru'] + $y['alokasi_carry_over']) * 100, 2);
        $b2 = round($y['spk_now'] / ($y['alokasi_baru'] + $y['alokasi_carry_over']) * 100, 2);
        $b3 = round($y['total'] / ($y['alokasi_baru'] + $y['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($y['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $b1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($y['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $b2 ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($y['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $b3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <?php foreach ($it3 as $we) : ?>
        <td style="text-align: center; font-size:small;"><?= $we['kategori']; ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($we['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($we['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($mon_it3 as $oi) : ?>
        <?php
        $c1 = round($oi['year_now'] / ($oi['alokasi_baru'] + $oi['alokasi_carry_over']) * 100, 2);
        $c2 = round($oi['spk_now'] / ($oi['alokasi_baru'] + $oi['alokasi_carry_over']) * 100, 2);
        $c3 = round($oi['total'] / ($oi['alokasi_baru'] + $oi['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($oi['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $c1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($oi['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $c2 ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($oi['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $c3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <?php foreach ($it4 as $ki) : ?>
        <td style="text-align: center; font-size:small;"><?= $ki['kategori']; ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($ki['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($ki['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($mon_it4 as $yu) : ?>
        <?php
        $d1 = round($yu['year_now'] / ($yu['alokasi_baru'] + $yu['alokasi_carry_over']) * 100, 2);
        $d2 = round($yu['spk_now'] / ($yu['alokasi_baru'] + $yu['alokasi_carry_over']) * 100, 2);
        $d3 = round($yu['total'] / ($yu['alokasi_baru'] + $yu['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($yu['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $d1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($yu['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $d2 ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($yu['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $d3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <?php foreach ($it5 as $hf) : ?>
        <td style="text-align: center; font-size:small;"><?= $hf['kategori']; ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($hf['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($hf['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($mon_it5 as $lm) : ?>
        <?php
        $e1 = round($lm['year_now'] / ($lm['alokasi_baru'] + $lm['alokasi_carry_over']) * 100, 2);
        $e2 = round($lm['spk_now'] / ($lm['alokasi_baru'] + $lm['alokasi_carry_over']) * 100, 2);
        $e3 = round($lm['total'] / ($lm['alokasi_baru'] + $lm['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($lm['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $e1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($lm['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $e2 ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($lm['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $e3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <?php foreach ($it6 as $jb) : ?>
        <td style="text-align: center; font-size:small;"><?= $jb['kategori']; ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($jb['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($jb['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($mon_it6 as $uy) : ?>
        <?php
        $f1 = round($uy['year_now'] / ($uy['alokasi_baru'] + $uy['alokasi_carry_over']) * 100, 2);
        $f2 = round($uy['spk_now'] / ($uy['alokasi_baru'] + $uy['alokasi_carry_over']) * 100, 2);
        $f3 = round($uy['total'] / ($uy['alokasi_baru'] + $uy['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($uy['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $f1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($uy['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $f2 ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($uy['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $f3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <?php foreach ($it7 as $no) : ?>
        <td style="text-align: center; font-size:small;"><?= $no['kategori']; ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($no['alokasi_baru']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($no['alokasi_carry_over']); ?></td>
      <?php endforeach; ?>
      <?php foreach ($mon_it7 as $on) : ?>
        <?php
        $g1 = round($on['year_now'] / ($on['alokasi_baru'] + $on['alokasi_carry_over']) * 100, 2);
        $g2 = round($on['spk_now'] / ($on['alokasi_baru'] + $on['alokasi_carry_over']) * 100, 2);
        $g3 = round($on['total'] / ($on['alokasi_baru'] + $on['alokasi_carry_over']) * 100, 2);
        ?>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($on['year_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $g1; ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($on['spk_now']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $g2 ?>%</td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($on['total']); ?></td>
        <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $g3; ?>%</td>
      <?php endforeach; ?>
    </tr>
    <tr>
      <?php
      $x1 = $j['alokasi_baru'] + $i['alokasi_baru'] + $we['alokasi_baru'] + $ki['alokasi_baru'] + $hf['alokasi_baru'] + $jb['alokasi_baru'] + $no['alokasi_baru'];
      $x2 = $j['alokasi_carry_over'] + $i['alokasi_carry_over'] + $we['alokasi_carry_over'] + $ki['alokasi_carry_over'] + $hf['alokasi_carry_over'] + $jb['alokasi_carry_over'] + $no['alokasi_carry_over'];
      $x3 = $g['year_now'] + $y['year_now'] + $oi['year_now'] + $yu['year_now'] + $lm['year_now'] + $uy['year_now'] + $on['year_now'];
      $x4 = round($x3 / ($x1 + $x2) * 100, 2);
      $x5 = $g['spk_now'] + $y['spk_now'] + $oi['spk_now'] + $yu['spk_now'] + $lm['spk_now'] + $uy['spk_now'] + $on['spk_now'];
      $x6 = round($x5 / ($x1 + $x2) * 100, 2);
      $x7 = $g['total'] + $y['total'] + $oi['total'] + $yu['total'] + $lm['total'] + $uy['total'] + $on['total'];
      $x8 = round($x7 / ($x1 + $x2) * 100, 2);
      ?>
      <td style="text-align:right; vertical-align:middle; font-size:small;">TOTAL</td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= number_format($x1); ?></td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= number_format($x2); ?></td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= number_format($x3); ?></td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $x4; ?>%</td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($x5); ?></td>
      <td style="text-align:center; vertical-align:middle; font-size:small;"><?= $x6; ?>%</td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= number_format($x7); ?></td>
      <td style="text-align: center; vertical-align:middle; font-size:small;"><?= $x8; ?>%</td>
    </tr>
  </tbody>
</table>