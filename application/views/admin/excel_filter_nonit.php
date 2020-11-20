<?php
$con = mysqli_connect('localhost', 'root', 'brigtiosp', 'osp2');
$sql = isset($_POST['sql']) ? $_POST['sql'] : '';

$result = mysqli_query($con, $sql);
!$result ? die() : '';

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=$title.xlsx");
header('Pragma: no-cache');
header('Expires: 0');
?>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>No GL</th>
      <th>Mata Anggaran</th>
      <th>Kategori</th>
      <th>Kegiatan</th>
      <th>RKA</th>
      <th>Sisa Anggaran</th>
      <th>Anggaran Carry Over</th>
      <th>Sisa Anggaran Carry Over</th>
      <th>Keterangan</th>
      <th>Menu</th>
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
    <?php while ($expl = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?= ++$no; ?></td>
        <td><?php echo $expl['kode_rka']; ?></td>
        <td><?php echo $expl['jenis_eksploitasi']; ?></td>
        <td><?= $expl['kategori']; ?></td>
        <td><?php echo $expl['kegiatan']; ?></td>
        <td><?php echo $expl['alokasi_baru']; ?></td>
        <td><?php echo $expl['sisa_alokasi_baru']; ?></td>
        <td><?= $expl['alokasi_carry_over']; ?></td>
        <td><?= $expl['sisa_alokasi_carry_over']; ?></td>
        <td><?= $expl['keterangan']; ?></td>
      </tr>
    <?php
      $sum_rka += $expl['alokasi_baru'];
      $sum_sisa_rka += $expl['sisa_alokasi_baru'];
      $sum_carry += $expl['alokasi_carry_over'];
      $sum_sisa_carry += $expl['sisa_alokasi_carry_over'];
    };
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