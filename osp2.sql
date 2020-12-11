-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 01:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `eksploitasi`
--

CREATE TABLE `eksploitasi` (
  `id` char(36) NOT NULL,
  `kode_rka` varchar(10) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `kode_kegiatan` varchar(10) NOT NULL,
  `kegiatan` text NOT NULL,
  `alokasi_baru` double NOT NULL,
  `alokasi_carry_over` double NOT NULL,
  `sisa_alokasi_baru` double NOT NULL,
  `sisa_alokasi_carry_over` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eksploitasi`
--

INSERT INTO `eksploitasi` (`id`, `kode_rka`, `kode_jenis`, `kode_kategori`, `kode_kegiatan`, `kegiatan`, `alokasi_baru`, `alokasi_carry_over`, `sisa_alokasi_baru`, `sisa_alokasi_carry_over`, `keterangan`) VALUES
('5f7bcdba4ccc4', 'C.1.1', 'EX-001', 'KAT-001', 'KAT-001', 'Pengadaan Penyedia Jasa Relokasi Perangkat AS400 P7 i795 dan  ATL TS3500 dari DC Sudirman ke ODC di Sentul', 1320000000, 0, 1320000000, 0, ''),
('5f7bcde4e1ac6', 'C.1.2', 'EX-001', 'KAT-001', 'KAT-002', 'Pemasangan dan Instalasi Tray Data & FO DC GTI Lt.4', 1290000000, 0, 1290000000, 0, ''),
('5f7bce17a6328', 'C.1.3', 'EX-001', 'KAT-001', 'KAT-002', 'PMS LAN Kanpus (DC GTI & DC SUD)', 1150815000, 0, 1150815000, 0, ''),
('5f7bce434879c', 'C.1.4', 'EX-001', 'KAT-001', 'KAT-002', 'PMS LAN TIK (DC Tabanan)', 55000000, 0, 55000000, 0, ''),
('5f7bce7250ed1', 'C.1.5', 'EX-001', 'KAT-001', 'KAT-002', 'Instalasi Jarkom', 6876768500, 0, 6876768500, 0, ''),
('5f7bcea3a3d46', 'C.1.6', 'EX-001', 'KAT-001', 'KAT-002', 'Relokasi Mesin Robot EATL IBM Storage DC Tabanan untuk  kebutuhan Tier 3', 161700000, 0, 161700000, 0, ''),
('5f7bcedc6226c', 'C.1.7', 'EX-001', 'KAT-001', 'KAT-002', 'Jasa Implementasi Aplikasi Predictive Analytics dan Dashboard  Monitoring Server', 387090000, 0, 387090000, 0, ''),
('5f7bcf03aa01c', 'C.1.8', 'EX-001', 'KAT-001', 'KAT-002', 'Relayout DC Sudirman', 2000000000, 0, 2000000000, 0, ''),
('5f7bcf3bc1290', 'C.1.9', 'EX-001', 'KAT-001', 'KAT-002', 'PMS LAN (Divisi, Kanwil, Kanins, Sendik, Uker) **', 3201385000, 0, 3201385000, 0, ''),
('5f7bcf958a2c3', 'D.1.1', 'EX-002', 'KAT-002', 'KAT-002', 'Jasa Tenaga Kerja Borongan Div INF', 10626987119, 0, 10626987119, 0, 'Termasuk tenaga kerja borongan / tenaga kerja ahli seperti support engineer, DBA, dan aplikasi lainnya'),
('5f7bcfd6478e5', 'D.1.2', 'EX-002', 'KAT-002', 'KAT-003', 'Honorarium tenaga PKL dan kegiatan Bussiness Relation dan Pengelolaan Proyek IT', 30000000, 0, 30000000, 0, ''),
('5f7bd009d653e', 'D.1.3', 'EX-002', 'KAT-002', 'KAT-003', 'Jasa Operator Satelit dan Network', 9945600000, 0, 9945600000, 0, ''),
('5f7bd05a3f201', 'D.2.1', 'EX-002', 'KAT-003', 'KAT-003', 'Maintenance Contact Center', 2749121667, 0, 2749121667, 0, 'Termasuk kebutuhan layanan contact center internal dan external'),
('5f7bd14aebbcd', 'D.2.2', 'EX-002', 'KAT-003', 'KAT-004', 'Maintenance Mesin Perso', 3424750000, 0, 3424750000, 0, 'Termasuk mesin perso kartu debet dan kartu kredit'),
('5f7bd181df2f1', 'D.2.3', 'EX-002', 'KAT-003', 'KAT-004', 'Maintenance Perangkat IPC', 720000000, 0, 720000000, 0, ''),
('5f7bd1af6fcc3', 'D.2.4', 'EX-002', 'KAT-003', 'KAT-004', 'Maintenance Aplikasi WFM', 80080000, 0, 80080000, 0, ''),
('5f7bd1fc2fa45', 'D.2.5', 'EX-002', 'KAT-003', 'KAT-004', 'Maintanance Network', 40290684737, 0, 40290684737, 0, 'Perangkat GPON FO BRI (OLT & ONT)  Perangkat Core Network  Perangkat iNAC  Load Balancer F5 Internal  Load Balancer F5 DMZ  Maintenance Operation - GCS (extend Warranty)  Maintenance Operation - gRCS (extend Warranty)  Maintenance Operation - HP Server  Perpanjangan Maintenance HUB Jupiter PSCF & BSCF  Perpanjangan Maintenance Perangkat FO BRI (ONT & OLT)'),
('5f7bd2a69b27f', 'D.2.6', 'EX-002', 'KAT-003', 'KAT-004', 'Maintenance DC, DRC, ODC', 117648649598, 0, 117648649598, 0, 'Maintenance Agreement (MA) Server Cisco  Pembayaran Jasa Maintenance Agreement (MA) SAN Storage HDS  Pembayaran Jasa Maintenance Agreement (MA) IBM P8  Pembayaran Jasa Maintenance Agreement (MA) IBM Z13s  Pembayaran Jasa S&S OTCA IBM Z13s  Pembayaran Jasa maintenance Agreement (MA) IBM P7 GTI dan SUD beserta  Tape Library  Pembayaran Jasa On Site Engineer dari Maintenance Agreement (MA) Server  300 HP Server GTI dan DRC  Pembayaran Jasa Maintenance Storage CSTG DRC  Pengadaan / Perpanjangan Jasa Maintenance Agreement (MA) IBM P8  Pengadaan / Perpanjangan Jasa Maintenance Agreement (MA) Server 400  Server Lenovo  Pengadaan / Perpanjangan Jasa Maintenance Agreement (MA) Server 24  Server Lenovo  Pengadaan / Perpanjangan Jasa Maintenance Agreement (MA) Server Cisco  Pengadaan / Perpanjangan Jasa Maintenance Agreement (MA) SAN Storage  HDS  Pengadaan / Perpanjangan Jasa Maintenance Agreement (MA) SAN Storage  HPE 3Par  Pengadaan Jasa MA Engineer Standby dan Sewa Perangkat Golden unit  perangkat Fujitsu  License Mimix dan Local Support  Pengadaan Perpanjangan Jasa Pemeliharaan (Preventive Maintenance) dan  Teknisi Standby UPS Semi Kritis (3x200 KVA) dan Kritis DC SUD (3x275 KVA)  Pengadaan Perpanjangan Jasa Pemeliharaan (Preventive Maintenance) dan  Teknisi Standby UPS Kritis Data Center GTI Ragunan dan UPS Semi Kritis untuk  Ruang Kerja Divisi OPT (6 x 275 KVA)'),
('5f7bd2ebecb11', 'D.3.1', 'EX-002', 'KAT-004', 'KAT-004', 'Supplies Peripheral IT Div INF', 100000000, 0, 100000000, 0, ''),
('5f7bdcc49cd48', 'D.4.1', 'EX-002', 'KAT-006', 'KAT-005', 'Sewa Jaringan komunikasi', 521957000000, 0, 521957000000, 0, 'Untuk kebutuhan sewa saluran komunikasi seluruh unit kerja BRI'),
('5f7bdd03183b9', 'D.4.2', 'EX-002', 'KAT-006', 'KAT-007', 'Simcard EDC BRILink', 12000000000, 0, 12000000000, 0, ''),
('5f7bdd468b21c', 'D.5.1', 'EX-002', 'KAT-007', 'KAT-007', 'Managed Service Wifi Kantor Pusat BRI', 7465233456, 0, 7465233456, 0, ''),
('5f7bde6eefa5e', 'D.5.2', 'EX-002', 'KAT-007', 'KAT-008', 'Managed Service Video Conference', 3141554075, 0, 3141554075, 0, ''),
('5f7bdeae571ce', 'D.5.3', 'EX-002', 'KAT-007', 'KAT-008', 'Managed Service Colocation', 8189218864, 0, 8189218864, 0, ''),
('5f7bdf0d4cfc0', 'D.5.4', 'EX-002', 'KAT-007', 'KAT-008', 'Managed Service Storage', 5247900000, 0, 5247900000, 0, ''),
('5f7bdf3853fca', 'D.5.5', 'EX-002', 'KAT-007', 'KAT-008', 'Managed Services Offsite Data Center (ODC)', 90000000000, 0, 90000000000, 0, ''),
('5f7bdf6c8a5bf', 'D.5.6', 'EX-002', 'KAT-007', 'KAT-008', 'Managed Service License Satcord', 311846312, 0, 311846312, 0, ''),
('5f7bdff463872', 'D.5.7', 'EX-002', 'KAT-007', 'KAT-008', 'Manage Service BRICast untuk Perangkat Head-end dan Remote  unit tahun-1 dari 5', 6210452854, 0, 6210452854, 0, ''),
('5f7be0371c39f', 'D.5.8', 'EX-002', 'KAT-007', 'KAT-008', 'Spacecraft Operation Support Services', 500000000, 0, 500000000, 0, ''),
('5f7be08e8a264', 'D.6.1', 'EX-002', 'KAT-008', 'KAT-008', 'Pembayaran Subsciption and Support Data Analytic Solution', 750200000, 0, 750200000, 0, ''),
('5f7be0bc380b5', 'D.6.2', 'EX-002', 'KAT-008', 'KAT-009', 'Managed Service Data Analytic', 2000000000, 0, 2000000000, 0, ''),
('5f7be131f14be', 'D.7.1', 'EX-002', 'KAT-009', 'KAT-009', 'Pengelolaan Domain', 150000000, 0, 150000000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `expl_non_it`
--

CREATE TABLE `expl_non_it` (
  `no_gl` varchar(20) NOT NULL,
  `mata_anggaran` varchar(50) NOT NULL,
  `alokasi` double NOT NULL,
  `sisa_alokasi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fiat_expl`
--

CREATE TABLE `fiat_expl` (
  `id` char(36) NOT NULL,
  `id_pengadaan_expl_fk` char(36) NOT NULL,
  `no_fiat` varchar(50) NOT NULL,
  `tgl_fiat` date NOT NULL,
  `total` double NOT NULL,
  `status_rc` varchar(100) NOT NULL,
  `tgl_rc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fiat_expl_non_it`
--

CREATE TABLE `fiat_expl_non_it` (
  `id` char(36) NOT NULL,
  `id_pengadaan_fk` char(36) NOT NULL,
  `no_fiat` varchar(50) NOT NULL,
  `tgl_fiat` date NOT NULL,
  `total` double NOT NULL,
  `nilai_tabanan` double NOT NULL,
  `status_rc` varchar(100) NOT NULL,
  `tgl_rc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fiat_inv`
--

CREATE TABLE `fiat_inv` (
  `id` char(36) NOT NULL,
  `id_pengadaan_fk` char(36) NOT NULL,
  `no_fiat` varchar(50) NOT NULL,
  `tgl_fiat` date NOT NULL,
  `total` double NOT NULL,
  `status_rc` varchar(100) NOT NULL,
  `tgl_rc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `investasi`
--

CREATE TABLE `investasi` (
  `id` char(36) NOT NULL,
  `kode_rka` varchar(10) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `kode_kegiatan` varchar(10) NOT NULL,
  `kegiatan` text NOT NULL,
  `alokasi_baru` double NOT NULL,
  `alokasi_carry_over` double NOT NULL,
  `sisa_alokasi_baru` double NOT NULL,
  `sisa_alokasi_carry_over` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investasi`
--

INSERT INTO `investasi` (`id`, `kode_rka`, `kode_jenis`, `kode_kegiatan`, `kegiatan`, `alokasi_baru`, `alokasi_carry_over`, `sisa_alokasi_baru`, `sisa_alokasi_carry_over`, `keterangan`) VALUES
('5f71620716848', 'A.1', 'JNS-001', 'INV-001', 'Pengadaan Hardware untuk Upgrade Mesin IBM AS400 LPAR 3 P8 GTI', 0, 24985000000, 0, 24983250000, 'SPK : B.1190.P-PBJ/PTI/10/2019'),
('5f71626a4bcc9', 'A.2', 'JNS-001', 'INV-002', 'Pengadaan 60 server untuk replacement di DC GTI', 0, 37800000000, 0, 37800000000, 'SPK : B.1144.P-PBJ/PIT/10/2019'),
('5f716352e77db', 'A.3', 'JNS-001', 'INV-003', 'Pengadaan replacement storage 1.5PB di DC GTI', 0, 17440000000, 0, 17440000000, 'SPK : B.1287.P-PBJ/PIT/11/2019'),
('5f7169ae19b56', 'A.4', 'JNS-001', 'INV-004', 'Pengadaan hardware backup solution', 0, 48800000000, 0, 48800000000, ''),
('5f716a134c9e0', 'A.5', 'JNS-001', 'INV-005', 'Pengadaan Investasi Non Proyek Infrastruktur TI DC, Network, Satellite', 141284357396, 0, 141284357396, 0, ''),
('5f716b7710aee', 'A.6', 'JNS-001', 'INV-006', 'Pengadaan IBM iSeries ODC', 150000000000, 0, 150000000000, 0, ''),
('5f716c7861df9', 'A.7', 'JNS-001', 'INV-007', 'Upgrade 230 Server di DC GTI dan TBN', 1828706200, 0, 1828706200, 0, 'Pembayaran'),
('5f716e3329c00', 'A.8', 'JNS-001', 'INV-008', 'Pembelian Environment Monitoring, Alat Ukur, Power Monitoring', 1291000000, 0, 1291000000, 0, ''),
('5f716e81cabec', 'A.9', 'JNS-001', 'INV-009', 'Penggantian PAC DC SUD', 4000000000, 0, 4000000000, 0, ''),
('5f716ef444e72', 'A.10', 'JNS-001', 'INV-010', 'Pengadaan UPS System untuk Jalur Semi Kritis BRI 1', 5000000000, 0, 5000000000, 0, ''),
('5f716f49d09d2', 'A.11', 'JNS-001', 'INV-011', 'Pengadaan Perangkat IT Divisi', 2000000000, 0, 2000000000, 0, ''),
('5f716fdf2de92', 'A.12', 'JNS-001', 'INV-012', 'Proyek Pengadaan & Implementasi Satelit', 16795252000, 0, 16795252000, 0, ''),
('5f717e0beb99c', 'A.13', 'JNS-001', 'INV-013', 'Prototyping dan R&D', 2500000000, 0, 2500000000, 0, ''),
('5f717e695ad88', 'A.14', 'JNS-001', 'INV-014', 'Pengadaan Perangkat Head-end unit BRICast', 15937386300, 0, 15937386300, 0, ''),
('5f717e9dce5cd', 'A.15', 'JNS-001', 'INV-015', 'Pengadaan 2 unit Manpack', 2400000000, 0, 2400000000, 0, ''),
('5f717ed63f460', 'A.16', 'JNS-001', 'INV-016', 'Pengadaan Perangkat NAC / Radius AAA', 15057120100, 0, 15057120100, 0, ''),
('5f717f111cb52', 'A.17', 'JNS-001', 'INV-017', 'DCIM', 8000000000, 0, 8000000000, 0, ''),
('5f717f3d378bd', 'A.18', 'JNS-001', 'INV-018', 'Pengadaan 3 Modem SCPC Reference Uplink Horizontal C-Band  dan 2 Antenna 1,8m BUC 2 watt dan LNB Ful C Band', 300000000, 0, 300000000, 0, ''),
('5f717f7f3955b', 'A.19', 'JNS-001', 'INV-019', 'Pengadaan NPM', 18110000000, 0, 18110000000, 0, ''),
('5f71800c193ee', 'A.20', 'JNS-001', 'INV-020', 'RE-engineering FO (Router Backhaul FO GTI dan Sudirman)', 4155236635, 0, 4155236635, 0, ''),
('5f71808d871ef', 'A.21', 'JNS-001', 'INV-021', 'Re-engineering PE Sudirman, Tabanan, Ragunan', 9561731091, 0, 9561731091, 0, ''),
('5f7180efe7561', 'A.22', 'JNS-001', 'INV-022', 'Router uker Cisco 1100', 50941681600, 0, 50941681600, 0, ''),
('5f71813b52a06', 'A.23', 'JNS-001', 'INV-023', 'Mobile VSAT', 2500000000, 0, 2500000000, 0, ''),
('5f7181673934e', 'A.24', 'JNS-001', 'INV-024', 'Enhancement Antena untuk Satelit Diversity', 15000000000, 0, 15000000000, 0, ''),
('5f71821bf2b15', 'A.25', 'JNS-001', 'INV-025', 'Enhancement Data Analytics', 1000000000, 0, 1000000000, 0, ''),
('5f718f7d6bc0b', 'A.26', 'JNS-001', 'INV-026', 'Hardware Kebutuhan Project Divisi Kantor Pusat', 12962000000, 0, 12962000000, 0, ''),
('5f718fafb4473', 'A.27', 'JNS-001', 'INV-027', 'Migrasi E1/ISDN', 1745867951, 0, 1754867951, 0, ''),
('5f71917eba0f4', 'A.28', 'JNS-001', 'INV-028', 'Pengadaan Perangkat Load Balancer', 2210000000, 0, 2210000000, 0, ''),
('5f7191d8e40af', 'A.29', 'JNS-001', 'INV-029', 'SPOF switch DC(LAN Data Center)', 22150000000, 0, 22150000000, 0, ''),
('5f71921f11357', 'A.30', 'JNS-001', 'INV-030', 'Pengadaan 12 Unit Perangkat SMC Hub Jupiter PSCF & BSCF', 9750000000, 0, 9750000000, 0, ''),
('5f71924c35ce1', 'A.31', 'JNS-001', 'INV-031', 'Pengadaan peremajaan modul pihak ketiga sudirman', 2900000000, 0, 2900000000, 0, ''),
('5f7192836541d', 'A.32', 'JNS-001', 'INV-032', 'Pengadaan Switch lantai & distribusi corpu dan asrama', 1241684800, 0, 1241684800, 0, ''),
('5f7192a8126b4', 'A.33', 'JNS-001', 'INV-033', 'WiFi Performance Tools (3 unit)', 1000000000, 0, 1000000000, 0, ''),
('5f7192d36ce4f', 'A.34', 'JNS-001', 'INV-034', 'Peremajaan F5 DMZ DC+DRC (End of Life)', 10000000000, 0, 10000000000, 0, ''),
('5f7192fcbde30', 'A.35', 'JNS-001', 'INV-035', 'Pengadaan sparepart gRCS', 11000000000, 0, 11000000000, 0, ''),
('5f719365d19b5', 'A.36', 'JNS-001', 'INV-036', 'Carrier System Monitoring Enhancement to Support Satelite Diversity', 571472000, 0, 571472000, 0, ''),
('5f71939e2d078', 'A.37', 'JNS-001', 'INV-037', 'Pengadaan Backup AS400 dengan object storage DC, DRC, ODC', 17500000000, 0, 17500000000, 0, ''),
('5f7193e5d98b6', 'A.38', 'JNS-001', 'INV-038', 'Pengadaan golden unit sw mellanox dan brocade', 2255070730, 0, 2255070730, 0, ''),
('5f719412275ee', 'A.39', 'JNS-001', 'INV-039', 'Pengadaan golden unit Server Fujitsu EDW dan Bigdata', 9000000000, 0, 9000000000, 0, ''),
('5f71945368ecb', 'A.40', 'JNS-001', 'INV-040', 'Pengadaan Logitec Grouf Datasheet, Fasilitas Peralatan Vidio Confrence Untuk Keperluan Direksi BRI', 129442500, 0, 129442500, 0, ''),
('5f7195004163e', 'A.41', 'JNS-001', 'INV-041', 'Pengadaan 31 License Zoom Bussines dan 8 Perangkat Video Conference untuk Kantor Pusat', 242057145, 0, 242057145, 0, ''),
('5f71961dd3ec6', 'A.42', 'JNS-001', 'INV-042', 'Pengadaan Enhancement DCI Router', 142560000, 0, 142560000, 0, ''),
('5f719662f36f6', 'A.43', 'JNS-001', 'INV-043', 'Pengadaan 8 unit perangkat IPGW Hub Jupiter PSCF & BSCF', 2751000000, 0, 2751000000, 0, ''),
('5f7196ca04e27', 'A.44', 'JNS-001', 'INV-044', 'Pengadaan Smart PDU pada rack server DC Tabanan Facility', 1592697436, 0, 1592697436, 0, ''),
('5f719813a7c5b', 'A.45', 'JNS-001', 'INV-045', 'Next Gen Infrastructure ODC', 164200683836, 0, 164200683836, 0, ''),
('5f71983f082ce', 'A.46', 'JNS-001', 'INV-046', 'Pengadaan peremajaan perangkat network BRI 1 & BRI 2', 18600000000, 0, 18600000000, 0, ''),
('5f7199663235b', 'B.1', 'JNS-002', 'INV-047', 'Pengadaan Software/Aplikasi Data Center Infrastructure Management (DCIM)', 4394371520, 0, 4394371520, 0, ''),
('5f73d0f922617', 'B.2', 'JNS-002', 'INV-048', 'Key Management System', 1000000000, 0, 1000000000, 0, ''),
('5f73d124c03d1', 'B.3', 'JNS-002', 'INV-049', 'Penambahan Lisensi DCIM dan Sensor untuk GTI', 1000000000, 0, 1000000000, 0, ''),
('5f73d16ecb44b', 'B.4', 'JNS-002', 'INV-050', 'Pengadaan Software License Hyperconverged beserta Hardware Pendukung', 1500000000, 0, 1500000000, 0, ''),
('5f76d9ce91bb8', 'B.5', 'JNS-002', 'INV-051', 'Pengadaan license VMware untuk replacement server di DC', 11236915404, 0, 11236915404, 0, ''),
('5f76d9f51f33d', 'B.6', 'JNS-002', 'INV-052', 'Pengadaan license virtualisasi untuk workload tahun 2020 DC GTI', 11236915404, 0, 11236915404, 0, ''),
('5f76da2547f78', 'B.7', 'JNS-002', 'INV-053', 'Pengadaan license virtualisasi untuk workload DRC tahun 2020', 11236915404, 0, 11236915404, 0, ''),
('5f76db614dae9', 'B.8', 'JNS-002', 'INV-054', 'Pengadaan license OS GTI 2020', 20000000000, 0, 20000000000, 0, ''),
('5f76dc0e3250a', 'B.9', 'JNS-002', 'INV-055', 'Pengadaan license virtualisasi untuk environment DEV QA', 3745638468, 0, 3745638468, 0, ''),
('5f76dc339aaad', 'B.10', 'JNS-002', 'INV-056', 'Pengadaan software backup solution', 50000000000, 0, 50000000000, 0, ''),
('5f76dea3ac784', 'B.11', 'JNS-002', 'INV-057', 'Pengadaan license OS ODC 2020 * (NSE)', 10000000000, 0, 10000000000, 0, ''),
('5f76e00f8c776', 'B.12', 'JNS-002', 'INV-058', 'Automation tools for disaster recovery', 20000000000, 0, 20000000000, 0, ''),
('5f7bc9701d6d6', 'B.13', 'JNS-002', 'INV-059', 'Spacecraft Operation Tools', 3750000000, 0, 3750000000, 0, ''),
('5f7bc99db1622', 'B.14', 'JNS-002', 'INV-060', 'Pengadaan tools interference identifier', 7878582250, 0, 7878582250, 0, ''),
('5f7bc9ca17a20', 'B.15', 'JNS-002', 'INV-061', 'Enhancement Sistem Pencatatan dan Pelaporan Operasional PAC', 500000000, 0, 500000000, 0, ''),
('5f7bc9eabe0ec', 'B.16', 'JNS-002', 'INV-062', 'Biaya Software Komputer', 8000000, 0, 8000000, 0, ''),
('5f7bca7041acd', 'B.17', 'JNS-002', 'INV-063', 'AntiDDOS', 7000000000, 0, 7000000000, 0, ''),
('5f7bca933a0bc', 'B.18', 'JNS-002', 'INV-064', 'Pengadaan software Satsoft', 5000000000, 0, 5000000000, 0, ''),
('5f7bcabe7b208', 'B.19', 'JNS-002', 'INV-065', 'Pengadaan GSLB License untuk F5 Internal BRI', 1600364920, 0, 1600364920, 0, ''),
('5f7bcade09900', 'B.20', 'JNS-002', 'INV-066', 'Pengadaan Sistem Big Data Network Analytical Th.2020 (Rebuilt &  Deployment)', 850000000, 0, 850000000, 0, ''),
('5f7bcb0cbe190', 'B.21', 'JNS-002', 'INV-067', 'RSA Token SSO', 700000000, 0, 700000000, 0, ''),
('5f7bcb31436b7', 'B.22', 'JNS-002', 'INV-068', 'Next Gen Infrastructure ODC', 40000485844, 0, 40000485844, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id` char(36) NOT NULL,
  `pemutus` varchar(100) NOT NULL,
  `uker` varchar(4) NOT NULL,
  `no_ip` varchar(100) NOT NULL,
  `tgl_ip` date NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `kode_kegiatan` varchar(10) NOT NULL,
  `rincian` text NOT NULL,
  `nilai_ip` double NOT NULL,
  `year_now` double NOT NULL,
  `jangka_waktu_awal` date NOT NULL,
  `jangka_waktu_akhir` date NOT NULL,
  `nodin_pbj` varchar(100) NOT NULL,
  `tgl_nodin_pbj` date NOT NULL,
  `no_spk` varchar(100) NOT NULL,
  `tgl_spk` date NOT NULL,
  `nilai_spk` double NOT NULL,
  `spk_now` double NOT NULL,
  `jangka_awal_spk` date DEFAULT NULL,
  `jangka_akhir_spk` date DEFAULT NULL,
  `vendor` varchar(100) NOT NULL,
  `user_pn` varchar(100) NOT NULL,
  `files` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengadaan`
--

INSERT INTO `pengadaan` (`id`, `pemutus`, `uker`, `no_ip`, `tgl_ip`, `kode_jenis`, `kode_kegiatan`, `rincian`, `nilai_ip`, `year_now`, `jangka_waktu_awal`, `jangka_waktu_akhir`, `nodin_pbj`, `tgl_nodin_pbj`, `no_spk`, `tgl_spk`, `nilai_spk`, `spk_now`, `jangka_awal_spk`, `jangka_akhir_spk`, `vendor`, `user_pn`, `files`) VALUES
('5fcefa801d817', 'Kepala Bagian', 'TSI', '873948734', '2020-12-09', 'JNS-001', 'INV-001', 'bjbvfjerjberbsndvjvnjnsdmnjk\r\n1. sdgsfgewgewbsb\r\n2. sdgwefgrb\r\n3. adsgrgsnergb\r\n', 500000, 500000, '2020-12-09', '2020-12-31', 'jknvjnfjjnjgnw', '2020-12-10', 'y34835y8734', '2020-12-10', 500000, 500000, '2020-12-14', '2020-12-31', 'Solution', '291293', 'SK_Alokasi_Revisi_RKA_TI_Tahun_2020_INF1.pdf'),
('5fcefbdb69a49', 'Kepala Bagian', 'WEW', '90994934', '2020-10-05', 'JNS-001', 'INV-001', '1. hsdbvjsfjbjfdnvjfdnjdbbvfdb.\r\n2. dsjvsdjnfjbjndsjvbfjnvjvdsnvjfdnvjdfj.\r\n3. jsdvnknvjbsdjdsnvjdsnvjdsnvk', 1000000, 500000, '2020-12-15', '2021-02-24', '88534756', '2020-12-15', '63647374', '2020-12-09', 500000, 250000, '2020-12-10', '2020-12-31', 'Maju Mundur Ahay', '291293', 'barubagus_com_modul-pbo-java-untuk-pemula-aswian-editri-spdf.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan_expl`
--

CREATE TABLE `pengadaan_expl` (
  `id` char(36) NOT NULL,
  `pemutus` text NOT NULL,
  `uker` varchar(5) NOT NULL,
  `no_ip` varchar(50) NOT NULL,
  `tgl_ip` date NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `kode_kegiatan` varchar(10) NOT NULL,
  `rincian` text NOT NULL,
  `nilai_ip` double NOT NULL,
  `year_now` double NOT NULL,
  `jangka_waktu_awal` date NOT NULL,
  `jangka_waktu_akhir` date NOT NULL,
  `nodin_pbj` varchar(50) NOT NULL,
  `tgl_nodin_pbj` date NOT NULL,
  `no_spk` varchar(50) NOT NULL,
  `tgl_spk` date NOT NULL,
  `nilai_spk` double NOT NULL,
  `spk_now` double NOT NULL,
  `jangka_awal_spk` date DEFAULT NULL,
  `jangka_akhir_spk` date DEFAULT NULL,
  `vendor` text NOT NULL,
  `user_pn` varchar(100) NOT NULL,
  `files` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peng_expl_non_it`
--

CREATE TABLE `peng_expl_non_it` (
  `id` char(36) NOT NULL,
  `no_ip` varchar(50) NOT NULL,
  `tgl_ip` date NOT NULL,
  `no_gl` varchar(20) NOT NULL,
  `rincian` text NOT NULL,
  `nilai_ip` double NOT NULL,
  `year_now` double NOT NULL,
  `nilai_memo` double NOT NULL,
  `jngka_waktu_awal` date NOT NULL,
  `jngka_waktu_akhir` date NOT NULL,
  `no_spk` varchar(30) NOT NULL,
  `tgl_spk` date NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `nilai_spk` double NOT NULL,
  `spk_now` double NOT NULL,
  `nilai_memo_spk` double NOT NULL,
  `jngka_awal_spk` date NOT NULL,
  `jngka_akhir_spk` date NOT NULL,
  `user_pn` varchar(100) NOT NULL,
  `files` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_expl`
--

CREATE TABLE `sub_expl` (
  `id` char(36) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `jenis_eksploitasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_expl`
--

INSERT INTO `sub_expl` (`id`, `kode_jenis`, `jenis_eksploitasi`) VALUES
('5e2026a4c3f4a', 'EX-001', 'Eksploitasi TI - Non Rutin Non Proyek'),
('5e2026bcad569', 'EX-002', 'Eksploitasi TI - Rutin Non Proyek');

-- --------------------------------------------------------

--
-- Table structure for table `sub_expl_kategori`
--

CREATE TABLE `sub_expl_kategori` (
  `id` char(36) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_expl_kategori`
--

INSERT INTO `sub_expl_kategori` (`id`, `kode_jenis`, `kode_kategori`, `kategori`) VALUES
('5e20278cd1113', 'EX-001', 'KAT-001', 'Biaya Instalasi / Implementasi'),
('5e2027a96e39a', 'EX-002', 'KAT-002', 'Honorarium Biaya TSI'),
('5e2027c5db031', 'EX-002', 'KAT-003', 'Biaya Pemeliharaan & Perbaikan SW HW'),
('5e2027e50bb15', 'EX-002', 'KAT-004', 'Biaya Supplies Komputer'),
('5e2027fb794e2', 'EX-002', 'KAT-005', 'Biaya Sewa Software'),
('5e42695e233b2', 'EX-002', 'KAT-006', 'Sewa Saluran Komunikasi'),
('5e426970b5c9d', 'EX-002', 'KAT-007', 'Managed Service IT'),
('5e426983c8399', 'EX-002', 'KAT-008', 'Managed Service Digital'),
('5f7bdc56b482b', 'EX-002', 'KAT-009', 'Jasa Langganan Software');

-- --------------------------------------------------------

--
-- Table structure for table `sub_inv`
--

CREATE TABLE `sub_inv` (
  `id` char(36) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `jenis_investasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_inv`
--

INSERT INTO `sub_inv` (`id`, `kode_jenis`, `jenis_investasi`) VALUES
('5e202552a7617', 'JNS-001', 'Hardware'),
('5ea53779f159c', 'JNS-002', 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_anggaran`
--

CREATE TABLE `tahun_anggaran` (
  `id` char(36) NOT NULL,
  `id_pengadaan_fk` char(36) NOT NULL,
  `tahun` year(4) NOT NULL,
  `anggaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_anggaran`
--

INSERT INTO `tahun_anggaran` (`id`, `id_pengadaan_fk`, `tahun`, `anggaran`) VALUES
('5fcefc4b185f6', '5fcefbdb69a49', 2019, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_anggaran_expl`
--

CREATE TABLE `tahun_anggaran_expl` (
  `id` char(36) NOT NULL,
  `id_pengadaan_expl_fk` char(36) NOT NULL,
  `tahun` year(4) NOT NULL,
  `anggaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_anggaran_expl_non_it`
--

CREATE TABLE `tahun_anggaran_expl_non_it` (
  `id` char(36) NOT NULL,
  `id_pengadaan_fk` char(36) NOT NULL,
  `tahun` year(4) NOT NULL,
  `anggaran` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_spk`
--

CREATE TABLE `tahun_spk` (
  `id` char(36) NOT NULL,
  `id_pengadaan_fk` char(36) NOT NULL,
  `tahun_spk` year(4) NOT NULL,
  `anggaran_spk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_spk`
--

INSERT INTO `tahun_spk` (`id`, `id_pengadaan_fk`, `tahun_spk`, `anggaran_spk`) VALUES
('5fcefc4b1ddb2', '5fcefbdb69a49', 2019, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_spk_expl`
--

CREATE TABLE `tahun_spk_expl` (
  `id` char(36) NOT NULL,
  `id_pengadaan_expl_fk` char(36) NOT NULL,
  `tahun_spk` year(4) NOT NULL,
  `anggaran_spk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun_spk_non_it`
--

CREATE TABLE `tahun_spk_non_it` (
  `id` char(36) NOT NULL,
  `id_pengadaan_fk` char(36) NOT NULL,
  `tahun_spk` year(4) NOT NULL,
  `anggaran_spk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` char(36) NOT NULL,
  `user_pn` varchar(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_pn`, `email`, `firstname`, `lastname`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
('5ec01dd12eb6e', '', 'herozdevstudio@gmail.com', 'Hero', 'Fazry', 'default.jpg', '$2y$10$RyREgHYuAGxbsgJ/ZZsVVOCgsbC7WwXFr7nUDZ.BQ06ywpQe7ipLa', 2, 0, 1589648849),
('5ec0fb5e132fa', '291293', 'administrator@admin.com', 'Admin', 'Operator', 'baby_iron_man-wallpaper-1366x768.jpg', '$2y$10$uGylc/1vZk/irih4.FxPzeNfFfbEo4DqkyWLyP0ESw8Mhk5Eh83Vi', 1, 1, 1589705566),
('5f30a545d2bf0', '123456', 'eroaja@yahoo.com', 'Ero', 'Ero', 'default.jpg', '$2y$10$w33Zlyr9zHZINt.D5bfl.u2GH1ymcmJc1pRBdifIBmv9NDLb6./7a', 1, 1, 1597023557),
('5f34e971025c6', '12345', 'heroaja@gmail.com', 'hero', 'fazry', 'default.jpg', '$2y$10$tliqgYpRYvN3mM5St7/TIeRJ/0KwKK4IYyfc/0MO8bLZq0gu5zPca', 2, 1, 1597303153);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(3, 1, 1),
(4, 1, 2),
(5, 2, 2),
(6, 1, 3),
(9, 2, 6),
(10, 1, 6),
(11, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `menu_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `menu_order`) VALUES
(1, 'Admin', 1),
(2, 'User', 3),
(3, 'Menu', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` char(36) NOT NULL,
  `title` varchar(128) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `title`, `menu_id`, `url`, `icon`, `is_active`) VALUES
('1', 'Dashboard Admin', 1, 'admin', 'fas fa-fw fa-tachometer-alt', 1),
('2', 'Dashboard User', 2, 'user', 'fas fa-fw fa-user', 1),
('3', 'Edit Profile', 2, 'user/edit_profile', 'fas fa-fw fa-user-edit', 0),
('4', 'Menu Management', 3, 'menu', 'fas fa-fw fa-folder', 1),
('5', 'Sub Menu Management', 3, 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
('5ec2b8f98d130', 'Role', 3, 'admin/role', 'fas fa-fw fa-user-tie', 1),
('5ec35cc69b145', 'Change Password', 2, 'user/change_password', 'fas fa-fw fa-key', 0),
('5ec783110f705', 'List Users', 3, 'admin/list_user', 'fas fa-fw fa-list', 1),
('5ed548e80d52a', 'Breakdown RKA INV', 1, 'admin/inv', 'fas fa-fw fa-list', 1),
('5ed5b3fd6788b', 'Sub Investasi', 3, 'menu/sub_inv', 'fas fa-fw fa-folder-open', 1),
('5ed5c5890f7a2', 'Sub Eksploitasi', 3, 'menu/sub_expl', 'fas fa-fw fa-folder-open', 1),
('5ed5d73bb974c', 'Sub Kategori Eksploitasi', 3, 'menu/sub_expl_kat', 'fas fa-fw fa-folder-open', 1),
('5ed5fc0da47ce', 'Breakdown RKA EXPL', 1, 'admin/expl', 'fas fa-fw fa-list', 1),
('5ed70ba47bd06', 'Pengadaan IT INV', 2, 'user/pengadaan_inv', 'fas fa-fw fa-list', 1),
('5ee3265a02dd0', 'Pengadaan IT EXPL', 2, 'user/pengadaan_expl', 'fas fa-fw fa-list', 1),
('5f03e5bbdfec9', 'Breakdown RKA EXPL Non IT', 1, 'admin/expl_nonit', 'fas fa-fw fa-list', 1),
('5f0bc99d5195a', 'Pengadaan Non IT EXPL', 2, 'user/peng_expl_nonit', 'fas fa-fw fa-list', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` char(36) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
('5ece212bde4cf', 'yuyun@yuyun.com', 'cxy13uscujAPNS63bLgBhrKGhLXGiUFuxJYWhmerWm0=', 1590567211),
('5eddb0bddd901', 'jono@gmail.com', 'DpFMrej/GlPP+nPH3Pwjy6xB9q+P38eMbitRrm2KBkM=', 1591587005),
('5f30a545e266a', 'eroaja@yahoo.com', 'eOgyEcMcEx46VTZCjDoHtd4az9euy531px5Ogr95DwA=', 1597023557),
('5f34e9714af06', 'heroaja@gmail.com', 'Gplo9gYMtkTZbI0ErrxuIT6nCgrkzQJ44CDkEuH/p6I=', 1597303153);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eksploitasi`
--
ALTER TABLE `eksploitasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expl_non_it`
--
ALTER TABLE `expl_non_it`
  ADD PRIMARY KEY (`no_gl`);

--
-- Indexes for table `fiat_expl`
--
ALTER TABLE `fiat_expl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiat_expl_non_it`
--
ALTER TABLE `fiat_expl_non_it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiat_inv`
--
ALTER TABLE `fiat_inv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investasi`
--
ALTER TABLE `investasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengadaan_expl`
--
ALTER TABLE `pengadaan_expl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peng_expl_non_it`
--
ALTER TABLE `peng_expl_non_it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_expl`
--
ALTER TABLE `sub_expl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_expl_kategori`
--
ALTER TABLE `sub_expl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_inv`
--
ALTER TABLE `sub_inv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_anggaran`
--
ALTER TABLE `tahun_anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_anggaran_expl`
--
ALTER TABLE `tahun_anggaran_expl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_anggaran_expl_non_it`
--
ALTER TABLE `tahun_anggaran_expl_non_it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_spk`
--
ALTER TABLE `tahun_spk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_spk_expl`
--
ALTER TABLE `tahun_spk_expl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_spk_non_it`
--
ALTER TABLE `tahun_spk_non_it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
