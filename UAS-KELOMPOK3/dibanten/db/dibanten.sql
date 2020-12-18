-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 01:35 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dibanten`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `jk_admin` varchar(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `jk_admin`, `username`, `password`) VALUES
(1, 'gungwik', 'Perempuan', 'gungwik', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
(1, 'BNI 46'),
(2, 'BRI'),
(3, 'BCA'),
(4, 'Danamon'),
(5, 'Simpedes'),
(6, 'Bukopin'),
(7, 'Central Asia');

-- --------------------------------------------------------

--
-- Table structure for table `banten`
--

CREATE TABLE `banten` (
  `id_banten` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_banten` varchar(255) NOT NULL,
  `deskripsi_banten` varchar(400) NOT NULL,
  `kelengkapan_banten` varchar(400) NOT NULL,
  `foto_banten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banten`
--

INSERT INTO `banten` (`id_banten`, `id_kategori`, `id_toko`, `nama_banten`, `deskripsi_banten`, `kelengkapan_banten`, `foto_banten`) VALUES
(2, 1, 8, 'Banten Pengulap', 'Banten untuk upacara otonan setiap enam bulan sekali', 'Banten lengkap sesuai dengan tingkatan banten yang dipesan. Harga banten menyesuaikan', 'bantentumpeng.png'),
(3, 1, 8, 'Banten Pengulap', 'Banten pengulapan untuk upacara .', 'Banten lengkap sesuai dengan tingkatan banten yang dipesan. ', 'bantenpengulap.png'),
(4, 2, 19, 'Banten Pecaruan Agung Tawur Kesanga', 'a', 'a', 'BEBANTENAN-02.png'),
(5, 6, 8, 'Kain Putih Poleng', 'Kain untuk prada pelinggih taksu', 'Harga kain menyesuaikan panjang kainnya masing-masing', 'kainpoleng-14.png'),
(6, 2, 8, 'Banten Pecaruan Agung', 'Banten untuk upacara pecaruan agung tawur kesanga', 'Banten lengkap sesuai dengan tingkatan banten yang dipesan', 'bantensoda.png'),
(7, 3, 8, 'Banten Pengabenan', 'Banten untuk prosesi upacara pengabenan', 'Banten lengkap sesuai tingkatan banten yang dipesan, harga menyesuaikan', 'kainputihkuningomkarapenjor-12.png'),
(8, 1, 8, 'Banten Saraswati', 'Banten ngodalin buku saat hari raya saraswati', 'Kelengkapan banten lengkap', 'bantentumpeng.png'),
(9, 1, 8, 'Banten Galungan', 'Banten untuk upacara galungan', 'Kelengkapan banten sesuai dengan tingkatan banten yang dipesan', 'canangsari-21.png'),
(10, 1, 9, 'Banten Galungan', 'Banten untuk upacara galungan dan kuningan. Rangkaian prosesi upacara', 'Banten lengkap sesuai dengan tingkatan banten yang dipesan', 'bantencoba.png'),
(11, 6, 9, 'Kain Wastra Kuning', 'Kain wastra pelinggih', 'Panjang kain menyesuiakan ukuran yang dipesan', 'bantentumpeng.png'),
(12, 6, 9, 'Pengider-ngider', 'Ojer bendera ong kara', '1 pasang ojer bendera ong kara', 'bantentumpeng.png'),
(13, 6, 9, 'Klatkat', 'klatkat untuk sarana upakara', 'Harga yang tertera mendapatkan 5 pcs klatkat', 'Klakat-13.png'),
(14, 1, 9, 'Banten Pengodalan', 'Banten untuk ngodalin di sanggah rumah masing-masing', 'Kelengkapan banten sesuai dengan tingkatan yang dipesan', 'BEBANTENAN-01.png'),
(15, 1, 9, 'Pejati', 'Pejati untuk ngodalin', 'Kelengkapan banten sesuai dengan tingkatan banten yang dipesan', 'Banten1.png'),
(16, 1, 9, 'Gulung Penjor', 'Hiasan untuk mempercantik penjor saat galungan', '1 set gulung-gulung terdiri dari 5 pcs', 'bantentumpeng.png'),
(17, 1, 9, 'Gulung Penjor Bawah', 'Gulung hiasan penjor di bawah', '1 bungkus terdiri dari 2 pcs gulung bawah', 'bantentumpeng.png');

-- --------------------------------------------------------

--
-- Table structure for table `detailbanten`
--

CREATE TABLE `detailbanten` (
  `id_detail` int(11) NOT NULL,
  `id_banten` int(11) NOT NULL,
  `id_tingkatan` int(11) NOT NULL,
  `stok_detail` int(11) NOT NULL,
  `diskon_detail` int(11) NOT NULL,
  `hargajual_detail` int(11) NOT NULL,
  `hargadiskon_detail` int(11) NOT NULL,
  `ratingproduk_detail` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detailbanten`
--

INSERT INTO `detailbanten` (`id_detail`, `id_banten`, `id_tingkatan`, `stok_detail`, `diskon_detail`, `hargajual_detail`, `hargadiskon_detail`, `ratingproduk_detail`) VALUES
(17, 3, 1, 9, 10, 1000000, 900000, 0),
(18, 9, 2, 2, 0, 120000, 120000, 0),
(19, 10, 1, 9, 10, 1200000, 1080000, 0),
(20, 10, 2, 12, 12, 1400000, 1232000, 0),
(21, 10, 3, 12, 0, 100000, 100000, 0),
(22, 8, 1, 9, 5, 1200000, 1140000, 0),
(23, 3, 3, 12, 12, 1300000, 1144000, 0),
(24, 5, 4, 12, 0, 70000, 70000, 0),
(25, 2, 1, 2, 12, 180000, 158400, 0),
(26, 9, 3, 11, 0, 90000, 90000, 0),
(27, 7, 1, 3, 5, 2500000, 2375000, 0),
(28, 9, 1, 9, 0, 1500000, 1500000, 0),
(29, 8, 2, 12, 0, 1500000, 1500000, 0),
(30, 2, 2, 12, 0, 1300000, 1300000, 0),
(31, 7, 2, 4, 0, 120000, 120000, 0),
(33, 13, 4, 120, 0, 10000, 10000, 0),
(34, 12, 4, 12, 0, 25000, 25000, 0),
(35, 15, 1, 12, 5, 75000, 71250, 0),
(36, 14, 1, 14, 5, 500000, 475000, 0),
(37, 15, 2, 12, 0, 130000, 130000, 0),
(38, 16, 4, 12, 0, 50000, 50000, 0),
(39, 16, 1, 12, 5, 100000, 95000, 0),
(40, 17, 2, 100, 5, 80000, 76000, 0),
(41, 8, 3, 14, 0, 190000, 190000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detailpembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `hargajual_dp` int(11) NOT NULL,
  `diskon_dp` int(11) NOT NULL,
  `hargadiskon_dp` int(11) NOT NULL,
  `quantity_dp` int(11) NOT NULL,
  `namabanten_dp` varchar(255) NOT NULL,
  `tingkatanbanten_dp` varchar(100) NOT NULL,
  `kelengkapanbanten_dp` varchar(500) NOT NULL,
  `deskripsibanten_dp` varchar(500) NOT NULL,
  `kategoribanten_dp` varchar(255) NOT NULL,
  `namatoko_dp` varchar(200) NOT NULL,
  `alamattoko_dp` varchar(500) NOT NULL,
  `kodepostoko_dp` int(8) NOT NULL,
  `kotatoko_dp` varchar(255) NOT NULL,
  `provinsitoko_dp` varchar(100) NOT NULL,
  `catatanpemesanan_dp` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `nama_jasa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `nama_jasa`) VALUES
(1, 'GOJEK - GOSEND'),
(2, 'GRAB - GRAB EXPRESS'),
(3, 'TIKI Express');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribanten`
--

CREATE TABLE `kategoribanten` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `gambar_kategori` varchar(500) NOT NULL DEFAULT 'employee.png',
  `deskripsi_kategori` varchar(500) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoribanten`
--

INSERT INTO `kategoribanten` (`id_kategori`, `nama_kategori`, `gambar_kategori`, `deskripsi_kategori`, `id_admin`) VALUES
(1, 'Dewa Yadnya', 'dewayadnya.png', 'Dewa yadnya adalah suatu bentuk persembahan atau korban suci dengan tulus iklas yang di tujukan kepada sang pencipta (Ida Sang Hyang Widhi Wasa) beserta dengan manifestasinya dalam bentuk TRI MURTI.', 0),
(2, 'Bhuta Yadnya', 'bhutayadnya.png', 'Bhuta yadnya adalah suatu upakara/upacara suci yang ditujukan kepada bhuta kala atau makluk bawah . Bhuta kala adalah kekuatan yang ada di alam yang bersifat negative yang perlu dilebur agar kembali kesifat positif agar tidak mengganggu kedamaian hidup umat manusia yang berada di bumi dalam menjalankan aktifitasnya .', 0),
(3, 'Pitra Yadnya', 'pitrayadnya.jpg', 'Pitra Yadnya adalah suatu bentuk persembahan atau korban suci yang di tujukan kepada roh-roh para leluhur dan bhatara-bhatara karena mereka lah yang membuat kita ada di dunia hingga kita dewasa . Pitra yadnya ini bertujuan menyucikan roh-roh para leluhur agar mendapatkan tempat yang layak di kahyangan .', 0),
(4, 'Manusa Yadnya', 'manusayadnya.png', 'Manusa Yadnya adalah suatu upacara suci yang bertujuan untuk memelihara hidup , mencapai kesempurnaan dalam kehidupan dan kesejahteraan manusia selama hidupnya .', 0),
(5, 'Rsi Yadnya', 'rsiyadnya.png', 'Rsi Yadnya adalah suatu bentuk persembahan karya suci yang di tujukan kepada para rsi , orang suci , pinandita , pandita , sulinggih , guru , dan orang suci yang berhubungan dengan agama hindu .Rsi adalah orang-orang yang bijaksana dan berjiwa suci .', 0),
(6, 'Umum', 'umum.png', 'Perlengkapan penunjang upacara yadnya menjadi sangat penting. Tanpa hal tersebut pelaksanaan yadnya menjadi tidak lengkap. Yadnya juga harus dilakukan dengan tulus dan ikhlas.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `harga_ongkir` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `id_wilayah`, `id_toko`, `harga_ongkir`) VALUES
(8, 4, 8, 12000),
(10, 6, 8, 20000),
(11, 8, 8, 50000),
(15, 9, 8, 12000),
(16, 5, 8, 15000),
(18, 1, 8, 20000),
(19, 7, 8, 12000),
(21, 2, 8, 12000),
(22, 1, 9, 120000),
(23, 2, 9, 12000),
(24, 3, 9, 12000),
(25, 4, 9, 12000),
(26, 5, 9, 12000),
(27, 6, 9, 12000),
(28, 7, 9, 12000),
(29, 8, 9, 12000),
(30, 9, 9, 15000),
(31, 3, 8, 25000),
(32, 1, 10, 20000),
(33, 2, 10, 30000),
(34, 3, 10, 50000),
(35, 4, 10, 90000),
(36, 5, 10, 15000),
(37, 6, 10, 30000),
(38, 7, 10, 20000),
(39, 8, 10, 50000),
(40, 9, 10, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `idpembelian_pembayaran` int(11) NOT NULL,
  `namapembayar_pembayaran` varchar(255) NOT NULL,
  `bank_pembayaran` varchar(255) NOT NULL,
  `nomorrekening_pembayaran` int(11) NOT NULL,
  `tanggalbayar_pembayaran` date NOT NULL,
  `tanggalkonfirmasi_pembayaran` date NOT NULL,
  `buktitransfer_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `namadepan_pembeli` varchar(300) NOT NULL,
  `namabelakang_pembeli` varchar(300) NOT NULL,
  `email_pembeli` varchar(300) NOT NULL,
  `hp_pembeli` varchar(20) NOT NULL,
  `username_pembeli` varchar(300) NOT NULL,
  `password_pembeli` varchar(300) NOT NULL,
  `alamat_pembeli` varchar(300) NOT NULL,
  `kodepos_pembeli` mediumint(9) NOT NULL,
  `kota_pembeli` varchar(300) NOT NULL,
  `provinsi_pembeli` varchar(300) NOT NULL,
  `foto_pembeli` varchar(300) NOT NULL DEFAULT 'avatarpembeli.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `namadepan_pembeli`, `namabelakang_pembeli`, `email_pembeli`, `hp_pembeli`, `username_pembeli`, `password_pembeli`, `alamat_pembeli`, `kodepos_pembeli`, `kota_pembeli`, `provinsi_pembeli`, `foto_pembeli`) VALUES
(2, 'Satria', 'Budiman', 'satria_Md@yahoo.com', '081337788912', 'bimbim', '$2y$10$2n0EWWsjnVLP2jkl0WJGTerIjN4w1/BXSpmreXq63LrCNG.8u2hCS', 'Jalan Raya Singapadu Nomor 35', 80114, 'Denpasar', 'Bali', '200px-KakashiHatake.jpg'),
(6, 'Budi', 'Waseso', 'Budi@gmail.com', '081337700152', 'Budi', '$2y$10$m9/Cvj7113bZJaliLuKnpuArm8k0JM9VqNdMtPRIRzak/SV7ld5ZO', 'Jalan Padang Sambian Kaja Nomor 35 Denpasar', 80112, 'Denpasar', 'Bali', 'avatarpembeli.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `idpembeli_pembelian` int(11) NOT NULL,
  `idtoko_pembelian` int(11) NOT NULL,
  `tanggalbeli_pembelian` date NOT NULL,
  `tanggalkirim_pembelian` date NOT NULL,
  `tanggalkonfirmasi_pembelian` date NOT NULL,
  `namapembeli_pembelian` varchar(255) NOT NULL,
  `hppembeli_pembelian` varchar(20) NOT NULL,
  `emailpembeli_pembelian` varchar(500) NOT NULL,
  `alamatpengiriman_pembelian` varchar(500) NOT NULL,
  `kodepospengiriman_pembelian` varchar(255) NOT NULL,
  `kotapengiriman_pembelian` varchar(100) NOT NULL,
  `provinsipengiriman_pembelian` varchar(100) NOT NULL,
  `tarifongkir_pembelian` int(11) NOT NULL,
  `totalharga_pembelian` int(11) NOT NULL COMMENT 'Total harga barang ditambah dengan harga ongkir yang dipilh oleh user',
  `jasapengiriman_pembelian` varchar(500) NOT NULL COMMENT 'Jasa pengiriman barang yang bekerja sama',
  `status_pembelian` varchar(255) NOT NULL DEFAULT 'pending',
  `catatanpenolakan_pembelian` text NOT NULL,
  `resipengiriman_pembelian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `namadepan_penjual` varchar(255) NOT NULL,
  `namabelakang_penjual` varchar(255) NOT NULL,
  `email_penjual` varchar(255) NOT NULL,
  `hp_penjual` varchar(255) NOT NULL,
  `dompet_penjual` int(11) NOT NULL DEFAULT '0',
  `username_penjual` varchar(255) NOT NULL,
  `password_penjual` varchar(255) NOT NULL,
  `foto_penjual` varchar(255) NOT NULL DEFAULT 'avatarpenjual.png',
  `id_toko` int(11) NOT NULL DEFAULT '0',
  `id_bank` int(11) NOT NULL,
  `rekening_penjual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `namadepan_penjual`, `namabelakang_penjual`, `email_penjual`, `hp_penjual`, `dompet_penjual`, `username_penjual`, `password_penjual`, `foto_penjual`, `id_toko`, `id_bank`, `rekening_penjual`) VALUES
(12, 'Satria', 'Bimantara ', 'satria_Md@yahoo.com', '081337700152', 0, 'bimbim', '$2y$10$9JeJOVHj3vz9ElR1o6aulersHUJ9LNQ6Tjv1QmDeAOQ.9BwVOpGqq', '40087_135221623176754_7055308_n.jpg', 8, 3, '081234764'),
(16, 'Devan', 'Bramantya', 'cahya@gmail.com', '12', 0, 'devan', '$2y$10$P4siYEM/riAEN2u0csOoXuU9W4sT5DRsVOccDxFGVmLGQtvxas1W.', 'Mipa Terbaru.png', 9, 1, '12'),
(18, 'Dewi', 'Lestari', 'budi@gmail.com', '123', 0, 'gungwik', '$2y$10$Ga/jGMdwGlAk5IfB0u7HjuHnxwvMMjtcka909GXNpQsPvBQCxhAbS', 'avatarpenjual.png', 10, 4, '123'),
(19, 'Dewi', 'Ambalika', 'dewiambalika@gmail.com', '081229922167', 0, 'dewi', '$2y$10$1rntSIcvg1fNhBxnewDjE.KRNFjCE0W4r/OVX6lqcHYNkCiFjez8G', 'avatarpenjual.png', 11, 3, '78947392');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembelian`
--

CREATE TABLE `status_pembelian` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pembelian`
--

INSERT INTO `status_pembelian` (`id_status`, `nama_status`) VALUES
(1, 'Lunas'),
(2, 'Barang Diproses'),
(3, 'Barang Dikirim'),
(4, 'Pesanan Dibatalkan'),
(5, 'Pesanan Diterima'),
(6, 'Pembayaran Tidak Valid'),
(7, 'Upload Pembayaran'),
(8, 'Pesanan Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tingkatanbanten`
--

CREATE TABLE `tingkatanbanten` (
  `id_tingkatan` int(11) NOT NULL,
  `nama_tingkatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkatanbanten`
--

INSERT INTO `tingkatanbanten` (`id_tingkatan`, `nama_tingkatan`) VALUES
(1, 'Utama'),
(2, 'Madya'),
(3, 'Nista'),
(4, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` varchar(255) NOT NULL,
  `kodepos_toko` varchar(255) NOT NULL,
  `kota_toko` varchar(255) NOT NULL,
  `provinsi_toko` varchar(255) NOT NULL,
  `deskripsi_toko` varchar(400) NOT NULL DEFAULT 'Tidak ada deskripsi dari toko ini',
  `catatan_toko` varchar(400) NOT NULL DEFAULT 'Tidak ada catatan dari toko ini',
  `status_toko` varchar(50) NOT NULL DEFAULT 'Buka',
  `jumlah_pelanggan` int(11) NOT NULL DEFAULT '0' COMMENT 'Jumlah pelanggan yang memberikan rating',
  `foto_toko` varchar(300) NOT NULL,
  `rating_toko` float NOT NULL DEFAULT '0',
  `id_wilayah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `kodepos_toko`, `kota_toko`, `provinsi_toko`, `deskripsi_toko`, `catatan_toko`, `status_toko`, `jumlah_pelanggan`, `foto_toko`, `rating_toko`, `id_wilayah`) VALUES
(8, 'Toko Banten Gianyar', 'Jalan Raya Mas Ubud', '80114', 'Klungkung', 'Bali', 'Toko yang menjual alat-alat persembahyangan dan banten sarana upakara', 'Toko buka setiap hari kecuali hari libur dan tanggal merah', 'Buka', 0, 'BEBANTENAN-26.png', 0, 2),
(9, 'Toko Banten Cahya', 'Jalan Raya Padangluwih Nomor 35 Denpasar', '80112', 'Denpasar', 'Bali', 'Toko yang menyediakan sarana dan prasarana upakara di Bali', '', 'Buka', 0, 'BEBANTENAN-26.png', 0, 1),
(10, 'Toko Banten Dewi Lestari', 'Jalan Raya Sempit', '14045', 'Denpasar', 'Bali', 'Toko yang menjual segala banten dan sarana upakara di Bali', 'Toko buka setiap hari kecuali hari libur keagamaan di Bali', 'Buka', 0, 'BEBANTENAN-26.png', 0, 1),
(11, 'Toko Dewi ', 'Jalan Sesetan', '80991', 'Denpasar', 'Bali', 'Toko yang menyediakan sarana dan prasarana upakara di Bali wss\r\n', 'Buka setiap hari', 'Buka', 0, 'BEBANTENAN-26.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `provinsi_wilayah` varchar(255) NOT NULL,
  `kota_wilayah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `provinsi_wilayah`, `kota_wilayah`) VALUES
(1, 'Bali', 'Denpasar'),
(2, 'Bali', 'Klungkung'),
(3, 'Bali', 'Singaraja'),
(4, 'Bali', 'Karangasem'),
(5, 'Bali', 'Gianyar'),
(6, 'Bali', 'Jembrana'),
(7, 'Bali', 'Badung'),
(8, 'Bali', 'Tabanan'),
(9, 'Bali', 'Bangli');

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
-- Indexes for table `banten`
--
ALTER TABLE `banten`
  ADD PRIMARY KEY (`id_banten`);

--
-- Indexes for table `detailbanten`
--
ALTER TABLE `detailbanten`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `kategoribanten`
--
ALTER TABLE `kategoribanten`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

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
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `status_pembelian`
--
ALTER TABLE `status_pembelian`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tingkatanbanten`
--
ALTER TABLE `tingkatanbanten`
  ADD PRIMARY KEY (`id_tingkatan`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banten`
--
ALTER TABLE `banten`
  MODIFY `id_banten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detailbanten`
--
ALTER TABLE `detailbanten`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategoribanten`
--
ALTER TABLE `kategoribanten`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `status_pembelian`
--
ALTER TABLE `status_pembelian`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tingkatanbanten`
--
ALTER TABLE `tingkatanbanten`
  MODIFY `id_tingkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
