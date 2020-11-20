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
      <th>No IP</th>
      <th>Tanggal IP</th>
      <th>No GL</th>
      <th>Mata Anggaran</th>
      <th>Rincian</th>
      <th>Total Project</th>
      <th>IP <?php echo date('Y'); ?> </th>
      <th>Memo IP</th>
      <th>Jangka Waktu Awal</th>
      <th>Jangka Waktu Akhir</th>
      <th>No SPK</th>
      <th>Tanggal SPK</th>
      <th>Vendor</th>
      <th>Nilai SPK</th>
      <th>SPK <?= date('Y'); ?></th>
      <th>Memo SPK</th>
      <th>Jangka Awal SPK</th>
      <th>Jangka Akhir SPK</th>
      <th>No Fiat</th>
      <th>Tanggal Fiat</th>
      <th>Nilai Fiat</th>
      <th>Nilai Tabanan</th>
      <th>Keterangan</th>
      <th>Tanggal Cashout</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 0;
    $sum_ip = 0;
    $ip_now = 0;
    $memo_ip = 0;
    $fiat = 0;
    $tabanan = 0;
    $sum_spk = 0;
    $spk_now = 0;
    $memo_spk = 0;
    ?>
    <?php while ($expl = mysqli_fetch_array($result)) { ?>
      <tr>
        <td><?= ++$no; ?></td>
        <td><?= $expl['no_ip']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_ip'])); ?></td>
        <td><?= $expl['no_gl']; ?></td>
        <td><?= $expl['mata_anggaran']; ?></td>
        <td><?= $expl['rincian']; ?></td>
        <td><?= $expl['nilai_ip']; ?></td>
        <td><?= $expl['year_now']; ?></td>
        <td><?= $expl['nilai_memo']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['jangka_waktu_awal'])); ?></td>
        <td><?= date('d-M-Y', strtotime($expl['jangka_waktu_akhir'])); ?></td>
        <td><?= $expl['no_spk']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_spk'])); ?></td>
        <td><?= $expl['vendor']; ?></td>
        <td><?= $expl['nilai_spk']; ?></td>
        <td><?= $expl['spk_now']; ?></td>
        <td><?= $expl['nilai_memo_spk']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['jangka_awal_spk'])); ?></td>
        <td><?= date('d-M-Y', strtotime($expl['jangka_akhir_spk'])); ?></td>
        <td><?= $expl['no_fiat']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_fiat'])); ?></td>
        <td><?= $expl['total']; ?></td>
        <td><?= $expl['nilai_tabanan']; ?></td>
        <td><?= $expl['status_rc']; ?></td>
        <td><?= date('d-M-Y', strtotime($expl['tgl_rc'])); ?></td>
        ?>
      </tr>
    <?php
      $sum_ip += $expl['nilai_ip'];
      $ip_now += $expl['year_now'];
      $memo_ip += $expl['nilai_memo'];
      $fiat += $expl['total'];
      $tabanan += $expl['nilai_tabanan'];
      $sum_spk += $expl['nilai_spk'];
      $spk_now += $expl['spk_now'];
      $memo_spk += $expl['nilai_memo_spk'];
    }
    ?>
    <tr>
      <td colspan="5" align="right"><span style="font-weight: bold; text-transform: uppercase;">Total</span></td>
      <td align="right"><?php echo number_format($sum_ip); ?></td>
      <td align="right"><?php echo number_format($ip_now); ?></td>
      <td align="right"><?= number_format($memo_ip); ?></td>
      <td colspan="5"></td>
      <td align="right"><?php echo number_format($sum_spk); ?></td>
      <td align="right"><?php echo number_format($spk_now); ?></td>
      <td align="right"><?= number_format($memo_spk); ?></td>
      <td colspan="4"></td>
      <td align="right"><?php echo number_format($fiat); ?></td>
      <td align="right"><?= number_format($tabanan); ?></td>
      <td colspan="2"></td>
    </tr>
  </tbody>
</table>