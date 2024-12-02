-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 09:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sparepart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `user` text DEFAULT NULL,
  `pass` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
(1, 'BRI'),
(2, 'BCA'),
(3, 'Bank Panin'),
(4, 'Mandiri'),
(5, 'Bukopin'),
(6, 'BNI');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_pulsa` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_keranjang`, `id_barang`, `id_pulsa`, `id_pembeli`, `tanggal`, `qty`) VALUES
(127, NULL, 0, 4, '2023-05-13', 1),
(130, NULL, 0, 5, '2023-05-14', 1),
(131, NULL, 0, 5, '2023-05-14', 1),
(133, NULL, 0, 5, '2023-05-16', 1),
(134, NULL, 0, 5, '2023-05-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `bank` varchar(15) DEFAULT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama`, `bank`, `jumlah`, `tanggal`, `foto`) VALUES
(23, 'Gema fajar', 'BRI ', '4910000', '2019-08-13', NULL),
(24, 'Aris', 'BRI ', '2807000', '2023-05-11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `telpon` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `email`, `password`, `telpon`, `alamat`) VALUES
(1, 'gema fajar', 'gemafajar09@gmail.com', 'admin', '082122855458', 'Jalan Raya lubuk minturun'),
(2, 'Egova', 'egova123@gmail.com', 'admin', '0987654321', 'parak karakah'),
(3, 'fanderio', 'fanderio@gmail.com', 'admin', '08995489505', 'jalan raya lubuk minturun Rt.0'),
(4, 'Aris', 'arissugiarto498@gmail.com', '180209', '082262743163', 'Perumahan Seminai'),
(5, 'ape putra', 'ariapeputra@gmail.com', '180209', '081233457786', 'cerenti');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `id_cart` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`id_cart`, `id_pembeli`, `id_barang`, `total`, `tanggal`, `status`) VALUES
(111, 4, 23, '300000', '2023-05-12', 'pending'),
(112, 5, 15, '2800000', '2023-05-14', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Pending'),
(2, 'Sedang Diproses'),
(3, 'Sedang Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alamat`
--

CREATE TABLE `tbl_alamat` (
  `id_alamat` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `tanggal_peng` date DEFAULT NULL,
  `kode_pos` varchar(11) DEFAULT NULL,
  `total_belanja` varchar(30) DEFAULT NULL,
  `ongkos` varchar(30) DEFAULT NULL,
  `kurir` varchar(30) DEFAULT NULL,
  `total_kes` varchar(30) DEFAULT NULL,
  `status` varchar(15) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_alamat`
--

INSERT INTO `tbl_alamat` (`id_alamat`, `id_pembeli`, `tanggal_peng`, `kode_pos`, `total_belanja`, `ongkos`, `kurir`, `total_kes`, `status`) VALUES
(17, 1, '2019-08-13', '25175', '4870000', '40000', 'jne', '4910000', 'Sedang Dikirim'),
(18, 4, '2023-05-11', '29255', '2800000', '0', 'jne', '2800000', 'Sedang Dikirim'),
(19, 4, '2023-05-11', '29255', '2800000', '7000', 'jne', '2807000', 'Sedang Dikirim'),
(20, 4, '2023-05-12', '29255', '5400000', '7000', 'jne', '5407000', 'Sedang Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'handphone'),
(2, 'audio'),
(4, 'Sparepart Hp'),
(5, 'Sparepart Audio'),
(10, 'Aksesoris Hp'),
(11, 'pulsa regular'),
(12, 'pulsa data'),
(13, 'pulsa listrik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komen`
--

CREATE TABLE `tbl_komen` (
  `id_komen` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `komentar` varchar(250) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_komen`
--

INSERT INTO `tbl_komen` (`id_komen`, `id_pembeli`, `komentar`, `tanggal`) VALUES
(3, 4, 'jangan lupa subscribe', '2023-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `kd_barang` varchar(30) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` varchar(30) DEFAULT NULL,
  `garansi` varchar(30) DEFAULT NULL,
  `jumlah` varbinary(30) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id_barang`, `id_kategori`, `kd_barang`, `nama_barang`, `harga`, `garansi`, `jumlah`, `berat`, `tgl`, `ket`, `foto`) VALUES
(15, 1, 'HP-01', 'SAMSUNG A6', '2800000', '1 tahun', 0x3139, 2, '2023-05-12', 'Galaxy A6 dibekali layar 5.6 inci berasio 18.5:9, dengan ditenagai Exynos 7870 octa-core dipadukan RAM 3GB/4GB, ROM 32GB/64GB, IP68 water-resistant, kamera belakang 16MP dan kamera depan 16MP, baterai berkapasitas 3000 mAh', '3.jpg'),
(17, 1, 'Hp-02', 'SAMSUNG A8', '4800000', '2 Tahun', 0x3134, 1, '2023-05-12', 'OS 	Android 7.1.1 (Nougat), upgradable to Android 9.0 (Pie); One UI\r\nChipset 	Exynos 7885 (14 nm)\r\nCPU 	Octa-core (2x2.2 GHz Cortex-A73 & 6x1.6 GHz Cortex-A53)\r\nGPU 	Mali-G71', '4.jpg'),
(18, 4, 'Sp-01', 'Fleksibel', '70000', '1 bulan', 0x3135, 1, '2019-08-20', 'Fleksibel samsung Semua tipe', 'p1.jpg'),
(19, 2, 'AS-01', 'Polytron Muze Mini Bluetooth Speaker', '300000', '1 Tahun', 0x3134, 2, '2023-05-12', 'Polytron Muze Mini speaker dapat dikoneksikan menggunakan bluetooth, slot USB, micro SD atau TF card, serta AUX. Mama tidak perlu khawatir jika smartphone kehabisan baterai, mengingat ada antenna dalam untuk memutar lagu dari channel FM radio.\r\n\r\nSelain berfungsi sebagai speaker, ia juga memiliki microphone yang cukup peka untuk menjawab panggilan telepon secara langsung, lho. Terlebih lagi, speaker yang satu ini dapat bertahan hingga 8 jam pemutaran.', 'speaker-mini-polytron.jpg'),
(21, 1, 'HP-03', 'Samsung Galaxy A14 5G', '5000000', '1 Tahun', 0x3230, 1, '2023-05-12', 'Galaxy A14 5G dibekali tiga kamera belakang yang terdiri dari lensa utama 50 MP, lensa depth 2 MP serta lensa macro 2 MP. Tak lupa, ada kamera depan 13 MP yang dapat diandalkan untuk selfie.Dari sisi performa ditenagai prosesor MediaTek Dimensity 700 dengan sokongan RAM 6 GB yang mendukung foitur RAM Plus hingga 6 GB, termasuk dukungan penyimpanan internal 128 GB dan memori eksternal hingga 1 TB. Untuk layarnya berukuran 6,6 inci dengan resolusi FullHD+ serta mendukung refresh rate 90Hz.', 'Samsung-Galaxy-A14-5G.jpeg'),
(22, 10, 'AH-01', 'Powerbank M11', '86000', '6 Bulan', 0x3230, 1, '2023-05-11', 'Untuk Anda yang memiliki budget terbatas, produk ini bisa dipertimbangkan. Dengan kapasitas 10.000 mAh, Mofit Powerbank M11 memiliki harga terjangkau. Anda tidak perlu menyiapkan bujet yang besar. Power bank Mofit ini sudah dilengkapi dua output port sehingga Anda bisa melakukan charging ke dua perangkat sekaligus. Output port-nya juga sudah support fitur fast charging', 'Powerbank M11.jpg'),
(23, 10, 'AH-02', '20.000 mAh Redmi Fast Charge Power BankPB200LZM', '300000', '1 Tahun', 0x3133, 1, '2023-05-12', 'Ada fitur fast charging agar mengisi daya lebih cepat\r\nDilengkapi smart protection agar penggunaan power bank lebih aman', 'cd4ee475aca4c9577b30839e134c2506.jpg'),
(24, 2, 'AS-02', 'Lenovo Portable Speaker Stereo Mini HiFi WirelessK3', '400000', '1 Tahun', 0x3135, 1, '2023-05-12', 'Memiliki fitur 360°omnidirectional yang menyebarkan suara dengan merata dan seimbang\r\nUkurannya paling compact di antara speaker mini lainnya', 'Lenovo Portable Speaker Stereo Mini HiFi WirelessK3.jpeg'),
(25, 2, 'AS-03', 'Speaker Bluetooth MiniVS1', '185000', '6 Bulan', 0x3330, 1, '2023-05-12', 'Speaker ini bisa dibawa baik saat jogging maupun berenang. Dengan fitur IPX5, Anda tak perlu khawatir meski speaker terguyur air hujan atau terciprat air kolam sekalipun.Tambahan lanyard-nya membuat speaker mini ini makin mudah dibawa bepergian. Bobotnya ringan, handy, dan juga mudah dibawa. Kini, waktu olahraga Anda pun makin menyenangkan dan meriah berkat speaker Bluetooth mini dari Vivan.', 'Speaker Bluetooth MiniVS1.jpg'),
(26, 10, 'AH-03', 'TWS Wireless Earphone Airbuds T30', '250000', '6 Bulan', 0x35, 1, '2023-05-12', 'Harganya tergolong lebih murah dibandingkan TWS sekelasnya. Meski harganya sangat terjangkau, produk ini sudah menggunakan koneksi Bluetooth 5.3 yang lebih cepat dan stabil. Dengan demikian, Anda tidak perlu khawatir mengalami bug saat menggunakannya dalam jarak tertentu.', 'TWS Wireless Earphone Airbuds T30.jpg'),
(27, 10, 'AH-04', 'Redmi Buds 3 Pro', '700000', '1 Tahun', 0x3130, 1, '2023-05-12', ' produk ini juga dibekali dengan mode transparansi yang membuat Anda dapat mendengar suara sekitar tanpa harus melepas headset. Mode tersebut tentu berguna sekali saat di kantor. Menariknya lagi, baterai headset ini mampu bertahan sampai 28 jam jika noice cancelling-nya tidak aktif.', 'Redmi Buds 3 Pro.png'),
(28, 11, '', '', 'Rp. 7000', '', '', 0, '0000-00-00', '', 'telkomsel5000.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pulsa`
--

CREATE TABLE `tbl_pulsa` (
  `id_pulsa` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kd_pulsa` varchar(30) NOT NULL,
  `nama_operator` varchar(30) NOT NULL,
  `isi_pulsa` varchar(30) NOT NULL,
  `hargapulsa` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pulsa`
--

INSERT INTO `tbl_pulsa` (`id_pulsa`, `id_kategori`, `kd_pulsa`, `nama_operator`, `isi_pulsa`, `hargapulsa`, `tanggal`, `foto`) VALUES
(1, 11, 'P-01', 'Telkomsel', '5000', '6500', '2023-05-14', '20230514_055328.png'),
(2, 11, 'P-02', 'Telkomsel', '10000', '12000', '2023-05-14', '20230514_055457.png'),
(6, 11, 'P-03', 'Telkomsel', '15000', '17000', '2023-05-14', '20230514_055513.png'),
(7, 11, 'P-04', 'Telkomsel', '20000', '22000', '2023-05-14', '20230514_055531.png'),
(8, 11, 'P-05', 'Telkomsel', '25000', '27000', '2023-05-14', '20230514_055548.png'),
(9, 11, 'P-06', 'Telkomsel', '30000', '32000', '2023-05-14', '20230514_055602.png'),
(10, 11, 'P-07', 'Telkomsel', '50000', '52000', '2023-05-14', '20230514_055621.png'),
(11, 11, 'P-08', 'Telkomsel', '75000', '77000', '2023-05-14', '20230514_055640.png'),
(12, 11, 'P-09', 'Telkomsel', '100000', '102000', '2023-05-14', '20230514_055709.png'),
(13, 11, 'P-10', 'XL', '5000', '7000', '2023-05-14', '20230514_060345.png'),
(14, 11, 'P-11', 'XL', '10000', '12000', '2023-05-14', '20230514_060232.png'),
(15, 11, 'P-12', 'XL', '15000', '17000', '2023-05-14', '20230514_060245.png'),
(16, 11, 'P-13', 'XL', '20000', '22000', '2023-05-14', '20230514_060300.png'),
(17, 11, 'P-14', 'XL', '25000', '27000', '2023-05-14', '20230514_060312.png'),
(18, 11, 'P-15', 'XL', '30000', '32000', '2023-05-14', '20230514_060325.png'),
(19, 11, 'P-16', 'XL', '50000', '52000', '2023-05-14', '20230514_060214.png'),
(20, 11, 'P-17', 'XL', '75000', '77000', '2023-05-14', '20230514_060158.png'),
(21, 11, 'P-18', 'XL', '100000', '102000', '2023-05-14', '20230514_060126.png'),
(22, 11, 'P-19', 'Axis', '5000', '7000', '2023-05-14', '20230514_060523.png'),
(23, 11, 'P-20', 'Axis', '10000', '12000', '2023-05-14', '20230514_060544.png'),
(24, 11, 'P-21', 'Axis', '15000', '17000', '2023-05-14', '20230514_060558.png'),
(25, 11, 'P-22', 'Axis', '20000', '22000', '2023-05-14', '20230514_060612.png'),
(26, 11, 'P-23', 'Axis', '25000', '27000', '2023-05-14', '20230514_060624.png'),
(27, 11, 'P-24', 'Axis', '30000', '32000', '2023-05-14', '20230514_060637.png'),
(28, 11, 'P-25', 'Axis', '50000', '52000', '2023-05-14', '20230514_060651.png'),
(29, 11, 'P-26', 'Axis', '75000', '77000', '2023-05-14', '20230514_060707.png'),
(30, 11, 'P-27', 'Axis', '100000', '102000', '2023-05-14', '20230514_060737.png'),
(31, 11, 'P-28', 'Indosat Ooredoo', '5000', '7000', '2023-05-14', '20230514_061305.png'),
(32, 11, 'P-29', 'Indosat Ooredoo', '10000', '12000', '2023-05-14', '20230514_061119.png'),
(33, 11, 'P-30', 'Indosat Ooredoo', '15000', '17000', '2023-05-14', '20230514_061151.png'),
(34, 11, 'P-31', 'Indosat Ooredoo', '20000', '22000', '2023-05-14', '20230514_061136.png'),
(35, 11, 'P-32', 'Indosat Ooredoo', '25000', '27000', '2023-05-14', '20230514_061206.png'),
(36, 11, 'P-33', 'Indosat Ooredoo', '30000', '32000', '2023-05-14', '20230514_061220.png'),
(37, 11, 'P-34', 'Indosat Ooredoo', '50000', '52000', '2023-05-14', '20230514_061233.png'),
(38, 11, 'P-35', 'Indosat Ooredoo', '75000', '77000', '2023-05-14', '20230514_061247.png'),
(39, 11, 'P-36', 'Indosat Ooredoo', '100000', '102000', '2023-05-14', '20230514_061039.png'),
(40, 11, 'P-37', 'Tri', '5000', '7000', '2023-05-14', '20230514_061432.png'),
(41, 11, 'P-38', 'Tri', '10000', '12000', '2023-05-14', '20230514_061447.png'),
(42, 11, 'P-39', 'Tri', '15000', '17000', '2023-05-14', '20230514_061459.png'),
(43, 11, 'P-40', 'Tri', '20000', '22000', '2023-05-14', '20230514_061509.png'),
(44, 11, 'P-41', 'Tri', '25000', '27000', '2023-05-14', '20230514_061522.png'),
(45, 11, 'P-42', 'Tri', '30000', '32000', '2023-05-14', '20230514_061533.png'),
(46, 11, 'P-43', 'Tri', '50000', '52000', '2023-05-14', '20230514_061545.png'),
(47, 11, 'P-44', 'Tri', '75000', '77000', '2023-05-14', '20230514_061556.png'),
(48, 11, 'P-45', 'Tri', '100000', '102000', '2023-05-14', '20230514_061618.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `tanggal_b` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_barang`, `id_pembeli`, `tanggal_b`, `status`) VALUES
(45, 17, 1, '2019-08-13', 'Pending'),
(46, 18, 1, '2019-08-13', 'Pending'),
(47, 15, 4, '2023-05-11', 'Pending'),
(48, 15, 4, '2023-05-11', 'Pending'),
(49, 23, 4, '2023-05-12', 'Pending'),
(50, 19, 4, '2023-05-12', 'Pending'),
(51, 17, 4, '2023-05-12', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_alamat`
--
ALTER TABLE `tbl_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_komen`
--
ALTER TABLE `tbl_komen`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_pulsa`
--
ALTER TABLE `tbl_pulsa`
  ADD PRIMARY KEY (`id_pulsa`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_alamat`
--
ALTER TABLE `tbl_alamat`
  MODIFY `id_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_komen`
--
ALTER TABLE `tbl_komen`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_pulsa`
--
ALTER TABLE `tbl_pulsa`
  MODIFY `id_pulsa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
