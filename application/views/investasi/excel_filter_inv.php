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
    <?php while ($inv = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?= ++$no; ?></td>
        <td><?php echo $inv['kode_rka']; ?></td>
        <td><?php echo $inv['jenis_investasi']; ?></td>
        <td><?php echo $inv['kegiatan']; ?></td>
        <td><?php echo $inv['alokasi_baru']; ?></td>
        <td><?php echo $inv['sisa_alokasi_baru']; ?></td>
        <td><?= $inv['alokasi_carry_over']; ?></td>
        <td><?= $inv['sisa_alokasi_carry_over']; ?></td>
        <td><?= $inv['keterangan']; ?></td>
      </tr>
    <?php
      $sum_rka += $inv['alokasi_baru'];
      $sum_sisa_rka += $inv['sisa_alokasi_baru'];
      $sum_carry += $inv['alokasi_carry_over'];
      $sum_sisa_carry += $inv['sisa_alokasi_carry_over'];
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