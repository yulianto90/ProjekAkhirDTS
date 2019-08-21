-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 01:15 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `no_antrian` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `no_pasien` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`no_antrian`, `username`, `no_pasien`, `waktu`, `status`) VALUES
(1, 'munadiyah', 321, '2019-04-01 00:15:31', 0),
(2, 'nadia', 1, '2019-04-01 00:12:28', 0),
(3, 'munadiyah', 2, '2019-04-01 22:45:31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `username` varchar(100) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`username`, `nama_dokter`) VALUES
('munadiyah', 'Munadiyah Asy Syahidah'),
('nadia', 'Nadia Lovianda');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `no_gaji` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `gaji` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Belum Dibayarkan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`no_gaji`, `username`, `tanggal`, `gaji`, `status`) VALUES
(2, 'nadia', '2019-02-12', 134800, 'Sudah Dibayarkan'),
(3, 'perawat', '2019-02-12', 1500000, 'Sudah Dibayarkan'),
(4, 'nadia', '2019-03-15', 174400, 'Sudah Dibayarkan'),
(5, 'perawat', '2019-03-27', 1500000, 'Belum Dibayarkan'),
(6, 'perawat', '2019-04-01', 1500000, 'Belum Dibayarkan'),
(7, 'nadia', '2019-04-01', 25600, 'Belum Dibayarkan');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `no_pasien` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `riwayat_alergi` varchar(500) NOT NULL,
  `penyakit` varchar(500) NOT NULL,
  `no_hp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nama`, `tgl_lahir`, `umur`, `alamat`, `pekerjaan`, `riwayat_alergi`, `penyakit`, `no_hp`) VALUES
(1, 'Rafiqah Majidah', '1998-02-06', '21', 'Jalan Panjaitan Gg. 13 No. 33', 'Mahasiswa', 'Tidak ada', 'Tidak ada', '085288539828'),
(2, 'Safd Riva', '1994-03-01', '25', 'Malang', 'ASN', 'Alergi paracetamol', 'Tidak ada', '085372618290'),
(3, 'Rosa', '1997-09-27', '22', 'Malang', 'Mahasiswa', 'Tidak ada', 'Tidak ada', '086453829765'),
(12, 'Ahsan Zaid', '2000-10-22', '18', 'Payolinyam', 'Siswa', 'Tidak ada', 'Tidak ada', '-'),
(20, 'Bindadri', '1989-04-11', '30', 'Tabek Panjang', '-', 'Tidak ada', 'Tidak ada', '082389827070'),
(21, 'Ando', '1990-01-21', '28', 'Tabek Panjang', 'Karyawan Swasta', 'Tidak ada', 'Tidak ada', '082389827070'),
(25, 'Al Mughni Hamdani', '2004-12-12', '12', 'Bunian', 'Pelajar', 'Tidak ada', 'Tidak ada', '-'),
(30, 'Azdi', '1975-03-15', '43', 'Batu Sangkar', 'Tani', 'Tidak ada', 'Tidak ada', '081239922025'),
(42, 'Anjani', '2011-01-01', '7', 'Sawah Padang', 'Pelajar', 'Tidak ada', 'Tidak ada', '081267289908'),
(43, 'Ainda', '2003-08-28', '13', 'Tanjung Pati', 'Siswa', 'Tidak ada', 'Tidak ada', '-'),
(44, 'Anes', '2005-10-30', '13', 'Tanjung Pati', 'Siswa', 'Tidak ada', 'Tidak ada', '-'),
(45, 'Anisa Syazatul Husni', '2003-09-29', '14', 'Tanjung Pati', 'Siswa', 'Tidak ada', 'Tidak ada', '-'),
(55, 'Niken', '1993-03-22', '25', 'Padang Cubadak', 'Ibu Rumah Tangga', 'Tidak ada', 'Tidak ada', '81261719229'),
(64, 'Noverma Yetti', '1983-11-03', '35', 'Situjuah Tanjuang Bungo', 'Guru', 'Tidak ada', 'Tidak ada', '85263713405'),
(65, 'Najwa', '2010-01-11', '8', 'Situjuah Tanjuang Bungo', 'Pelajar', 'Tidak ada', 'Tidak ada', '85263713405'),
(81, 'Abdullah Halim Ar-Rasid', '2010-08-13', '8', 'Talang', 'Pelajar', 'Tidak ada', 'Tidak ada', '085274244774'),
(91, 'Nuraini', '1999-02-26', '19', 'Panyabuangan', 'Pelajar', 'Tidak ada', 'Malaria', '82386709532'),
(96, 'Arifin', '2012-02-27', '4', 'Tanjuang Pauah', '-', 'Tidak ada', 'Tidak ada', '085263647589'),
(100, 'Annisa', '1999-10-07', '18', 'Bonai Indah', 'Pelajar', 'Tidak ada', 'Tidak ada', '082389088589'),
(104, 'Aldi', '1994-12-20', '23', 'Lampasi', 'Perawat Klinik', 'Tidak ada', 'Tidak ada', '085218545025'),
(105, 'Atika Adawiyah ', '2006-06-05', '12', 'Tanjung Pati', 'Pelajar', 'Tidak ada', 'Tidak ada', '-'),
(118, 'Aldo', '1997-12-26', '22', 'Situjuah Koto', 'Karyawan ', 'Tidak ada', 'Tidak ada', '081275431241'),
(122, 'Naufal Alfanzi', '2003-08-05', '13', 'Padang Kaduduak', 'Pelajar', 'Paracetamol', 'Tidak ada', '-'),
(123, 'Afeza Dian Destari', '1986-04-11', '32', 'Koto Nan IV', 'Ibu Rumah Tangga', 'Tidak ada', 'Tidak ada', '085278179616'),
(124, 'Akhdan', '2012-06-09', '6', 'Kubang Gajah', '-', 'Tidak ada', 'Tidak ada', '081277353634'),
(125, 'Nasywa', '2002-07-02', '17', 'Tanjung Pati', 'Pelajar', 'Tidak ada', 'Tidak ada', '-'),
(127, 'Aqira Saspro', '2013-04-24', '5', 'Bonai Indah', 'Siswi', 'Tidak ada', 'Tidak ada ', '085263146925'),
(137, 'Nailatul Faiza', '1994-11-10', '24', 'Balai Kalili', 'Karyawan Swasta', 'Tidak ada', 'Tidak ada', '81261790004'),
(141, 'Azfredo ', '1999-03-04', '19', 'Padang Belimbing', 'Pelajar', 'Tidak ada', 'Tidak ada', '082384042848'),
(147, 'Nofri Wandri', '1987-11-07', '31', 'Balai Upi', 'Wirausaha', 'Tidak ada', 'Tidak ada', '85278292979'),
(154, 'Nurni Azizah', '1968-10-10', '50', 'Situjuah', 'Ibu Rumah Tangga', 'Tidak ada', 'Hipertensi, Vertigo', '85363112891'),
(155, 'Novalita', '2018-11-18', '22', 'Ampalu', 'Mahasiswi', 'Tidak ada', 'Maag', '82386457943'),
(157, 'Azizah', '2006-01-20', '12', 'Halaban', 'Pelajar', 'Tidak ada', 'Tidak ada', '081363486802'),
(163, 'Amina Al Syarifah ', '2004-01-20', '14', 'Payolinyam', 'Pelajar', 'Tidak ada', 'Tidak ada', '0852630465'),
(166, 'Abdurrahman Fawwaz ', '2009-03-18', '9', 'Payobadar', 'Pelajar', 'Tidak ada', 'Tidak ada', '-'),
(168, 'Anton', '1981-01-06', '37', 'Tiakar', 'Wirastwasta', 'Tidak ada', 'Tidak ada', '082261280840'),
(180, 'Nabila', '1993-06-27', '25', 'Lampasi', 'Guru', 'Tidak ada', 'Tidak ada', '81375218096'),
(186, 'Atina Ainun', '2002-03-18', '16', 'Harau', 'Siswi', 'Tidak ada', 'Tidak ada ', '-'),
(190, 'Alisa', '2011-06-06', '7', 'Situjuah Batua', '-', 'Tidak ada', 'Tidak ada', '081267034819'),
(193, 'Novita putri', '1996-11-09', '22', 'Supayang', 'Mahasiswi', 'Amoxicilin', 'Tidak ada', '82174447676'),
(198, 'Najwa Aqila Putri', '2009-11-11', '9', 'Pakan Sinayan', 'Siswa', 'Tidak ada', 'Tidak ada', '85274475838'),
(204, 'Normalinda', '1973-11-19', '45', 'Situjuah', 'PNS', 'Tidak ada', 'Maag, Vertigo', '-'),
(212, 'Nayla Nurul Haq', '2006-12-07', '12', 'Harau', 'Siswi', 'Tidak ada', 'Tidak ada', '82226728567'),
(213, 'Alya Rahman ', '2003-10-24', '14', 'Harau', 'Ssiswi', 'Tidak ada', 'Tidak ada ', '-'),
(214, 'Nur Hayati MJ', '2001-03-15', '18', 'Mungka Tangah', 'Pelajar', 'Tidak ada', 'Maag', '81364576090'),
(222, 'Nurul', '1991-06-22', '27', 'Lintau', 'PLN', 'Tidak ada', 'Tidak ada', '8116607654'),
(223, 'Nurhidayati', '1986-07-27', '32', 'Sawah Padang', 'Ibu Rumah Tangga', 'Tidak ada', 'Tidak ada', '81270254855'),
(225, 'April', '1962-03-08', '56', 'Jambi', 'Wirastwasta', 'Tidak ada', 'Kolesterol ', '085266183804'),
(228, 'Azzahra SR', '2007-02-07', '11', 'Harau', 'Siswi', 'Tidak ada', 'Maag', '-'),
(235, 'Naura', '2015-02-03', '4', 'Tanjung Gadang', '-', 'Tidak ada', 'Tidak ada', '81330597297'),
(238, 'Aziz', '2007-07-21', '9', 'Sawah Padang', 'Siswa', 'Tidak ada', 'Tidak ada ', '085363119488'),
(242, 'Aisyah ', '2011-05-31', '7', 'Guguak', 'Pelajar', 'Tidak ada', 'Tidak ada ', '08126779997'),
(243, 'Arumi Zahira', '2009-09-28', '9', 'Sawah Padang', 'Pelajar', 'Tidak ada', 'Tidak ada ', '085356402407'),
(244, 'Nur Hayati', '1976-10-03', '42', 'Situjuah Banda Dalam', 'Ibu Rumah Tangga', 'Tidak ada', 'Tidak ada', '-'),
(255, 'Amalia Tulili', '1990-01-20', '28', 'Situjuah', 'Karyawan Swasta', 'Tidak ada', 'Tidak ada ', '085218615042'),
(261, 'Arifah Dareh', '2005-06-03', '13', 'Harau', 'Sisiwi', 'Tidak ada', 'Tidak ada ', '-'),
(292, 'Afnil Hayati', '1969-05-23', '49', 'Situjuah Lakung', 'Ibu Rumah Tangga', 'Tidak ada', 'Tidak ada ', '085763161247'),
(299, 'Azzahra', '2004-11-22', '13', 'Harau', 'Siswi', 'Tidak ada', 'Tidak ada ', '-'),
(302, 'Aisya Hawana Febrian', '2006-02-02', '12', 'Harau', 'Siswi', 'Tidak ada', 'Asma ', '-'),
(303, 'Arkan', '2013-07-13', '5', 'Gurun, Tanjung Pati', '-', 'Tidak ada', 'Tidak ada ', '082285147496'),
(312, 'Alifa Pilter', '1996-10-22', '22', 'Tanjung Pati', 'Mahasiswa', 'Tidak ada', 'Tidak ada ', '081279597970'),
(313, 'Adila Rima Hatadi', '2006-07-13', '12', 'Harau', 'Siswi', 'Tidak ada', 'Amandel', '-'),
(316, 'Agella', '1980-12-22', '28', 'Jln. Muh. Yamin', 'Guru', 'Tidak ada', 'Tidak ada ', '082313055952'),
(317, 'anto', '1997-03-07', '22', 'Malang', 'Mahasiswa', 'Alergi paracetamol', 'Tidak ada', '09786543'),
(318, 'Beby Tsubasa', '2000-07-23', '32', 'Jl.Majungkang', 'Artis Dadakan', 'Air Mineral', 'Hati', '08777882299'),
(319, 'coba', '1998-03-14', '20', 'Malang', 'Mahasiswa', 'Tidak ada', 'Tidak ada', '08777882299'),
(320, 'Baru', '1999-03-08', '20', 'Malang', 'Mahasiswa', 'Tidak ada', 'Tidak ada', '09786543'),
(321, 'Faris Attaqi', '2008-08-28', '11', 'Situjuah Batua', 'Siswa', 'Tidak Ada', 'Tidak Ada', '087654232424');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `no_faktur` int(11) NOT NULL,
  `no_pasien` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `no_perawatan` int(11) NOT NULL,
  `regio` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`no_faktur`, `no_pasien`, `username`, `no_perawatan`, `regio`, `keterangan`, `tanggal`, `total`, `status`) VALUES
(1, 2, 'munadiyah', 9, 'atas 4', '-', '2019-02-07', 14000, 1),
(2, 3, 'munadiyah', 2, 'atas 4', '-', '2019-02-21', 0, 0),
(3, 2, 'nadia', 2, 'atas 4', '-', '2019-02-27', 100000, 1),
(4, 3, 'munadiyah', 2, 'atas 8', '-', '2019-03-05', 50000, 1),
(5, 1, 'nadia', 6, 'atas 8', '-', '2019-02-06', 237000, 1),
(6, 317, 'munadiyah', 6, '6', '-', '2019-03-06', 201000, 1),
(7, 3, 'nadia', 2, 'atas 3', '-', '2019-03-08', 64000, 1),
(8, 318, 'nadia', 16, 'atas 8', 'Sembuh Insya Allah', '2019-02-12', 99000, 1),
(9, 1, 'munadiyah', 1, 'atas 4', '-', '2019-03-13', 0, 0),
(10, 1, 'nadia', 2, 'atas 7', '-', '2019-04-01', 100000, 1),
(11, 321, 'munadiyah', 1, 'atas 4', '-', '2019-04-01', 120000, 1),
(12, 2, 'munadiyah', 1, 'atas 7', '-', '2019-04-02', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan_bersih`
--

CREATE TABLE `pendapatan_bersih` (
  `tanggal` date NOT NULL,
  `pendapatan_kotor` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `pendapatan_bersih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendapatan_bersih`
--

INSERT INTO `pendapatan_bersih` (`tanggal`, `pendapatan_kotor`, `pengeluaran`, `pendapatan_bersih`) VALUES
('2019-03-14', 351000, 4500000, -4149000),
('2019-03-31', 450000, 4634800, -4184800);

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan_details`
--

CREATE TABLE `pendapatan_details` (
  `no_pendapatan` int(11) NOT NULL,
  `no_faktur` int(11) NOT NULL,
  `kode_bahan` varchar(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendapatan_details`
--

INSERT INTO `pendapatan_details` (`no_pendapatan`, `no_faktur`, `kode_bahan`, `harga_jual`, `jumlah`) VALUES
(1, 1, 'B002', 14000, 1),
(2, 4, 'B001', 50000, 1),
(3, 4, 'B001', 50000, 1),
(4, 4, 'B001', 50000, 1),
(5, 4, 'B001', 50000, 1),
(6, 4, 'B001', 50000, 1),
(7, 4, 'B001', 50000, 1),
(8, 4, 'B001', 50000, 1),
(9, 4, 'B001', 50000, 1),
(10, 4, 'B002', 14000, 1),
(11, 4, 'B002', 14000, 1),
(12, 4, 'B001', 50000, 1),
(13, 5, 'B001', 50000, 1),
(14, 6, 'B002', 14000, 1),
(15, 7, 'B002', 14000, 1),
(16, 8, 'B003', 35000, 1),
(17, 8, 'B001', 50000, 1),
(18, 8, 'B001', 50000, 1),
(19, 8, 'B002', 14000, 1),
(20, 8, 'B003', 35000, 1),
(21, 10, 'B001', 50000, 1),
(22, 11, 'B005', 35000, 2);

--
-- Triggers `pendapatan_details`
--
DELIMITER $$
CREATE TRIGGER `pendapatan` AFTER INSERT ON `pendapatan_details` FOR EACH ROW BEGIN
	UPDATE stok_bahan SET stok = stok-NEW.jumlah
    WHERE kode_bahan=NEW.kode_bahan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `no_pengeluaran` int(11) NOT NULL,
  `kode_bahan` varchar(100) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_pokok` double NOT NULL,
  `total` double NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`no_pengeluaran`, `kode_bahan`, `nama_bahan`, `jumlah`, `harga_pokok`, `total`, `tanggal`) VALUES
(1, 'B001', 'Resin', 100, 30000, 3000000, '2019-02-08'),
(2, 'B003', 'Alkaline', 20, 27556, 551120, '2019-08-12'),
(3, 'B002', 'Resin', 3, 30000, 90000, '2019-03-12'),
(7, 'B001', 'Resin', 3, 30000, 90000, '2019-03-06'),
(8, 'B004', 'Komposit', 3, 30000, 90000, '2019-03-11'),
(9, 'B007', 'coba', 10, 30000, 300000, '2019-03-14'),
(10, 'B007', 'cobalagii', 100, 30000, 3000000, '2019-03-14'),
(11, 'B008', 'es', 2, 10000, 20000, '2019-03-14'),
(12, 'B009', 'hwhwhw', 10, 30000, 300000, '2019-03-16'),
(13, 'B008', 'es', 3, 10000, 30000, '2019-03-09'),
(14, 'B001', 'Resin', 3, 30000, 90000, '2019-03-07'),
(15, 'B004', 'Komposit', 7, 30000, 210000, '2019-03-15'),
(16, 'B009', 'hwhwhw', 10, 30000, 300000, '2019-03-15'),
(17, 'B007', 'cobalagii', 200, 30000, 6000000, '2019-03-16'),
(18, 'B008', 'es', 7, 10000, 70000, '2019-03-16'),
(19, 'B001', 'Resin', 10, 30000, 300000, '2019-03-31'),
(20, 'B003', 'Alkaline', 3, 27556, 82668, '2019-03-06');

--
-- Triggers `pengeluaran`
--
DELIMITER $$
CREATE TRIGGER `pengeluaran` AFTER INSERT ON `pengeluaran` FOR EACH ROW BEGIN
	UPDATE stok_bahan SET stok = stok+NEW.jumlah
    WHERE kode_bahan=NEW.kode_bahan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` enum('perawat','dokter','dokter_pemilik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `akses`) VALUES
('munadiyah', 'dokterpemilik', 'dokter_pemilik'),
('nadia', 'dokter', 'dokter'),
('perawat', 'perawat', 'perawat');

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `username` varchar(100) NOT NULL,
  `nama_perawat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`username`, `nama_perawat`) VALUES
('perawat', 'Nabila Sahara');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `no_perawatan` int(11) NOT NULL,
  `jenis_perawatan` varchar(100) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`no_perawatan`, `jenis_perawatan`, `biaya`) VALUES
(1, 'Pemeriksaan', 50000),
(2, 'Konsultasi', 50000),
(3, 'Premedikasi', 150000),
(4, 'Perawatan Abses', 150000),
(5, 'Penskelingan', 300000),
(6, 'Tumpatan: Resin Komposit', 187000),
(7, 'Tumpatan: Amalgram', 200000),
(8, 'Tumpatan: GIC', 82000),
(9, 'Perawatan Saluran Akar: Satu', 93000),
(10, 'Perawatan Saluran Akar: Dua', 145500),
(11, 'Perawatan Saluran Akar: Tiga', 157000),
(12, 'Pencabutan Gigi: Susu', 40000),
(13, 'Pencabutan Gigi: Permanen', 134000),
(14, 'Inlay', 120000),
(15, 'Uplay', 150000),
(16, 'Crown Bridge Marryland (PFM)', 200000),
(17, 'Crown Bridge Marryland (Ceramic)', 250000),
(18, 'Crown Bridge Marryland (Porcelain)', 250000),
(19, 'Gigi Tiruan Sebagian (Akrilik)', 500000),
(20, 'Gigi Tiruan Sebagian (Valplast)', 1000000),
(21, 'Gigi Tiruan Sebagian (Kerangka Logam)', 1000000),
(22, 'Gigi Tiruan Penuh (Akrilik)', 2000000),
(23, 'Gigi Tiruan Penuh (Valplast)', 2300000),
(24, 'Perawatan Orthodonti', 2000000),
(25, 'Bedah Minor', 2000000),
(26, 'Reparasi Gigi Tiruan', 1000000),
(27, 'Tumpatan: Sementara', 45000),
(28, 'Pasang Behel Metal', 3572500),
(29, 'Pasang Behel Ceramic', 3572500),
(30, 'Kontrol Behel', 100000),
(31, 'Bleaching', 1250000);

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `no_rekam_medis` int(11) NOT NULL,
  `no_pasien` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` varchar(500) DEFAULT NULL,
  `diagnosa` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`no_rekam_medis`, `no_pasien`, `tanggal`, `keluhan`, `diagnosa`) VALUES
(1, 21, '2017-09-19', 'Pasien ingin scaling\r\n', 'Skeling RA/RB \r\n'),
(2, 21, '2017-09-25', 'Pasien ingin menambal ', '2 tambalan kecil, 1 tambalan besar '),
(3, 25, '2017-10-10', 'Pasien ingin memeriksa gigi', 'Polip gigi + kp 6'),
(4, 30, '2017-12-13', 'Pasien ingin pasang jaket gigi yang copot', 'Penambalan semenntara+ rujukan'),
(5, 30, '2017-12-22', 'Perawatan lanjutan', 'Penambalan sementara'),
(6, 30, '2017-12-30', 'Perawatan lanjutan', 'Pengisian'),
(7, 12, '2018-01-10', 'Pasein inggin menambal gigi', 'Tambal sementara'),
(8, 45, '2018-01-12', 'Pasien ingin membersihkan karang gigi', 'Gingiutis ra/rb - skeling'),
(9, 42, '2018-01-15', 'Pasien ingin mencabut gigi ', 'Ekso 2 gigi'),
(10, 30, '2018-01-16', 'Perawatan lanjutan', 'Pemasangan pisak + busit up'),
(11, 44, '2018-01-17', 'Pasien ingin menambal gigi', 'Pulpitis'),
(12, 43, '2018-01-17', 'Pasien mengatakan tambalannya di bongkar lagi', 'Pulpitis  + bongkar tambalan'),
(13, 44, '2018-01-24', 'Pasien ingin menambal gigi', 'Ulputis - arsen '),
(14, 43, '2018-01-24', 'Pasien ingin memeriksakan gigi', 'Tambalan rk'),
(15, 55, '2018-01-26', 'Pasien ingin periksa gigi', 'Pulpitis reversible/ gic dan rk'),
(16, 30, '2018-01-27', 'Perawatan lanjutan', 'Pencetakan + preparasi (ra+rb)'),
(17, 64, '2018-02-09', 'Pasien ingin skeling', 'Gingivitis ra/rb'),
(18, 65, '2018-02-09', 'Pasien ingin mencabut gigi', 'Persistensi-ekso'),
(19, 81, '2018-02-24', 'Pasien ingin periksa gigi', 'Tambal kls 1 ek'),
(20, 123, '2018-03-03', 'Pasien ingin menambal gigi ', 'Rujuk ro-foto'),
(21, 91, '2018-03-12', 'Pasien ingin menambal gigi', 'Penambalan'),
(22, 30, '2018-03-15', 'Perawatan lanjutan', 'Pemasangan crown'),
(23, 96, '2018-03-24', 'Pasien sedang sakit gigi', 'Abses peiodontal'),
(24, 100, '2018-03-27', 'Pasien ingin tambal gigi', 'Rp -> defitalasi'),
(25, 105, '2018-04-05', 'Pasien ingin menabal gigi', 'Iritasio pulpa -> pulp capping'),
(26, 104, '2018-04-05', 'Pasien ingin menambal gigi', 'Prepasai + caoch , cabut '),
(27, 30, '2018-04-24', 'Pasien ingin cabut gigi', 'Pencabutan'),
(28, 118, '2018-04-27', 'Pasien ingin menambal gigi ', 'Karies dentin- tambalan rk '),
(29, 124, '2018-05-03', 'Pasien ingin cabut gigi', 'Mobiliti-ekso'),
(30, 127, '2018-05-04', 'Pasien mengatakan tambalannya lepas ,', 'Karies pulpa'),
(31, 141, '2018-05-04', 'Pasien ingin menambal gigi', 'Karies dentin (2)'),
(32, 122, '2018-05-07', 'Pasien ingin menambal gigi', 'Penambalan'),
(33, 125, '2018-05-10', 'Pasien ingin menambal gigi', 'Penambalan'),
(34, 122, '2018-05-10', 'Pasien ingin menambal gigi', 'Penambalan'),
(35, 127, '2018-05-10', 'Pasien mengatakan tambalan gigi', 'Konsul'),
(36, 137, '2018-05-14', 'Pasien ingin skeling', 'Gingivitis ra/rb'),
(37, 124, '2018-05-29', 'Pasien ingin menambal gigi', 'Tambalan rk'),
(38, 214, '2018-06-28', 'Pasien ingin skeling', 'Skeling ra/rb'),
(39, 147, '2018-06-28', 'Pasien ingin skeling', 'Skeling ra/rb'),
(40, 155, '2018-06-29', 'Pasien ingin konsul', 'Skeling'),
(41, 154, '2018-06-29', 'Pasien ingin mencabut gigi', 'Konsul'),
(42, 157, '2018-07-01', 'Pasien ingin periksa gigi yang patah', 'Pembersihan +obat'),
(43, 198, '2018-07-02', 'Pasien ingin periksa gigi', 'Skeling dan pencabutan'),
(44, 163, '2018-07-05', 'Pasien ingin bersihkan gigi', 'Skeling ra+rb , ta,mbal gigi 2 '),
(45, 166, '2018-07-09', 'Pasien ingin cabut gigi', 'Pencabutan ekso 2 gigi'),
(46, 168, '2018-07-12', 'Pasien ingin skeling', 'Skeling ra+rb , + penambalan 2 '),
(47, 180, '2018-07-20', 'Pasien ingin periksa gigi', 'Tambalan rk'),
(48, 186, '2018-07-23', 'Pasien ingin kontrol behel', 'Lepas kawat + ganti karet (2)'),
(49, 190, '2018-07-24', 'Pasien ingin mencabut gigi', 'Pencabutan'),
(50, 193, '2018-07-28', 'Pasien ingin menambal gigi', 'Penambalan'),
(51, 12, '2018-07-29', 'Pasien inggi periksa gigi', 'Konsultasi'),
(52, 12, '2018-08-05', 'Pasien inggin malakukan perawatan lanjutan', 'Obat + bersihkan - ts'),
(53, 204, '2018-08-07', 'Pasien ingin skeling', 'Skeling ra/rb'),
(54, 212, '2018-08-10', 'Pasien ingin kontrol behel', 'Kontrol behel'),
(55, 12, '2018-08-11', 'Pasien inggin melakukan perawatan lanjutan', 'Konsultasi'),
(56, 12, '2018-08-11', 'Pasien inggin melakukan perawatan lanjutan', 'Konsultasi'),
(57, 213, '2018-08-14', 'Pasien ingin periksa gigi', 'Angkat polip'),
(58, 222, '2018-08-21', 'Pasien ingin periksa gigi', 'Konsul'),
(59, 214, '2018-08-23', 'Pemasangan gigi ra/rb', 'Valplast'),
(60, 214, '2018-08-26', 'Pencetakan gigi ra/rb', 'Edentulus-protesa'),
(61, 255, '2018-08-26', 'Pasien ingin periksa gigi', 'Karies dentin+ sandwich gic + rk'),
(62, 223, '2018-08-27', 'Pasien ingin periksa gigi', 'Konsul'),
(63, 228, '2018-08-28', 'Pasien ingin memeriksakan gigi', 'Premedikasi'),
(64, 225, '2018-08-28', 'Pasien ingin periksa gigi, gusi terasa ngilu', 'Skeling ra+ rb '),
(65, 213, '2018-09-06', 'Pasien ingin cabut gigi', 'Devitalisasi'),
(66, 235, '2018-09-07', 'Pasien ingin menambal gigi', 'Tambal sementara dan eugenol'),
(67, 238, '2018-09-08', 'Pasien ingin cabut gigi', 'Pencabutan '),
(68, 186, '2018-09-21', 'Pasien ingin potong kawat behel', 'Orto kit + potong kawat'),
(69, 261, '2018-10-01', 'Pasien ingin mencabut gigi', 'Pencabutan'),
(70, 242, '2018-10-06', 'Pasien mengeluh giginya goyang ', 'Pencabutan gigi susu'),
(71, 243, '2018-10-07', 'Pasien ingin cabut gigi', 'Pencabutan'),
(72, 244, '2018-10-09', 'Pasien ingin periksa gigi', 'Konsul'),
(73, 292, '2018-10-27', 'Pasien ingin skeling ', 'Periodoritis '),
(74, 302, '2018-10-29', 'Pasien ingin perawatan', 'Tambalan sederhana '),
(75, 303, '2018-10-29', 'Pesien ingin mencabut ', 'Fraktur '),
(76, 299, '2018-10-29', 'Pasien ingin kontrol behel', 'Ganti 2 breket'),
(77, 312, '2018-11-04', 'Paisen ingin menambal gigi', 'Tamambalan rk gigi '),
(78, 261, '2018-11-06', 'Pasien ingin periksa gigi ', 'Pencabutan'),
(79, 302, '2018-11-06', 'Pasien ingin perawatan', 'Perawatan kunjungan ke 2 '),
(80, 302, '2018-11-12', 'Pasien ingin perawatan lanjutan', 'Penggisian + tambalan sementara'),
(81, 313, '2018-11-12', 'Pasien ingin periksa gigi', 'Premedikasi'),
(82, 316, '2018-11-15', 'Pasieningin memeriksakan gigi', 'Skeling + penambalan'),
(83, 318, '2018-11-19', 'Pasien ingin menambal gigi', 'Eugenol'),
(84, 302, '2018-11-25', 'Pasien ingin perawatan lanjutan', 'Tambalan'),
(85, 318, '2018-11-25', 'Pasien inginperawatab lanjutan ', 'Preparasi '),
(86, 127, '2018-12-11', 'Pasien mengeluhkan sedang sakit gigi', 'Tambalan sementara'),
(87, 12, '2018-12-14', 'Pasien inggin menambal gigi', 'Skeling ra-rb tambal 3'),
(88, 20, '2018-12-15', 'Pasien menambal gigi', 'Perawan, tambalan'),
(89, 127, '2018-12-16', 'Pasien ingin melakukan perawatan lanjutan', 'Ganti obat '),
(91, 1, '2019-03-06', 'Ingin tambal gigi', 'Tambalan sementara'),
(92, 317, '2019-03-06', 'sakit gigi', 'tambal'),
(93, 3, '2019-03-08', 'sakit gigi', 'gpp kok'),
(94, 318, '2019-03-12', 'Sakit Gigi bukan Sakit Hati', 'Kebanyakan sambat'),
(95, 2, '2019-03-12', 'hg', NULL),
(96, 1, '2019-03-13', 'gs', 'gpp'),
(97, 3, '2019-03-13', 'gaskjd', NULL),
(98, 321, '2019-04-01', 'gigi berlubang', 'gapapa'),
(99, 1, '2019-04-01', 'gusi bengkak', 'ashfsfsfds'),
(100, 2, '2019-04-02', 'testtt', 'sudaah');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_bahan`
--

CREATE TABLE `satuan_bahan` (
  `no_satuan` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_bahan`
--

INSERT INTO `satuan_bahan` (`no_satuan`, `satuan`) VALUES
(1, 'Pcs'),
(2, 'Bungkus');

-- --------------------------------------------------------

--
-- Table structure for table `stok_bahan`
--

CREATE TABLE `stok_bahan` (
  `kode_bahan` varchar(11) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT '0',
  `stok_minimal` int(11) NOT NULL,
  `no_satuan` int(11) NOT NULL,
  `harga_pokok` double NOT NULL,
  `harga_jual` double NOT NULL,
  `no_perawatan` int(11) NOT NULL,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_bahan`
--

INSERT INTO `stok_bahan` (`kode_bahan`, `nama_bahan`, `stok`, `stok_minimal`, `no_satuan`, `harga_pokok`, `harga_jual`, `no_perawatan`, `expired`) VALUES
('B001', 'Resin', 113, 5, 1, 30000, 50000, 2, '2019-08-17'),
('B003', 'Alkaline', 21, 10, 2, 27556, 35000, 8, '2020-02-12'),
('B005', 'test', 23, 5, 2, 27556, 35000, 4, '2020-03-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`no_antrian`),
  ADD KEY `nama_dokter` (`username`),
  ADD KEY `no_pasien` (`no_pasien`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`no_gaji`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_pasien`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `no_pasien` (`no_pasien`),
  ADD KEY `no_perawatan` (`no_perawatan`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pendapatan_bersih`
--
ALTER TABLE `pendapatan_bersih`
  ADD PRIMARY KEY (`tanggal`);

--
-- Indexes for table `pendapatan_details`
--
ALTER TABLE `pendapatan_details`
  ADD PRIMARY KEY (`no_pendapatan`),
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `no_bahan` (`kode_bahan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`no_pengeluaran`),
  ADD KEY `kode_bahan` (`kode_bahan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`no_perawatan`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`no_rekam_medis`),
  ADD KEY `no_pasien` (`no_pasien`);

--
-- Indexes for table `satuan_bahan`
--
ALTER TABLE `satuan_bahan`
  ADD PRIMARY KEY (`no_satuan`);

--
-- Indexes for table `stok_bahan`
--
ALTER TABLE `stok_bahan`
  ADD PRIMARY KEY (`kode_bahan`),
  ADD KEY `no_satuan` (`no_satuan`),
  ADD KEY `no_perawatan` (`no_perawatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `no_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `no_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `no_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;
--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pendapatan_details`
--
ALTER TABLE `pendapatan_details`
  MODIFY `no_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `no_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `no_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `no_rekam_medis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `satuan_bahan`
--
ALTER TABLE `satuan_bahan`
  MODIFY `no_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
