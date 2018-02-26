-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2018 at 07:32 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.27-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_kinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1519467159),
('m130524_201442_init', 1519467183);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `role` enum('admin','perusahaan','alumni') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `nama`, `email`, `telepon`, `role`) VALUES
(12112, 'admin', 'admin', 'admin', 'admin@gmail.com', '818454154', 'admin'),
(12113, 'perusahaan', 'perusahaan', 'perusahaan', 'perusahaan@gmai.com', '564654564', 'perusahaan'),
(12114, 'alumni', 'alumni', 'alumni', 'alumni@gmail.com', '5456465', 'alumni');

-- --------------------------------------------------------

--
-- Table structure for table `web_artikel`
--

CREATE TABLE `web_artikel` (
  `artikelID` int(11) NOT NULL,
  `artikelKategoriID` int(11) NOT NULL,
  `artikelUserID` int(11) NOT NULL,
  `artikelJudul` text NOT NULL,
  `artikelIsi` text NOT NULL,
  `artikelThumbnails` text NOT NULL,
  `artikelTglPost` varchar(50) NOT NULL,
  `artikeReader` varchar(100) NOT NULL,
  `artikelStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_artikel_komentar`
--

CREATE TABLE `web_artikel_komentar` (
  `artikelKomentarID` int(11) NOT NULL,
  `artikelKomentarArtikelID` int(11) NOT NULL,
  `artikelKomentarEmail` varchar(200) NOT NULL,
  `artikelKomentarNama` varchar(200) NOT NULL,
  `artikelKomentarIsi` text NOT NULL,
  `artikelKomentarTglPost` varchar(50) NOT NULL,
  `artikelKomentarStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_berkas_pelamar`
--

CREATE TABLE `web_berkas_pelamar` (
  `berkasPelamarID` int(11) NOT NULL,
  `berkasPelamarUserID` int(11) NOT NULL,
  `berkasPelamarNama` text NOT NULL,
  `berkasPelamarFile` text NOT NULL,
  `berkasPelamarStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_booking`
--

CREATE TABLE `web_booking` (
  `bookingID` int(11) NOT NULL,
  `bookingEventsID` int(11) NOT NULL,
  `bookingStandsID` int(11) NOT NULL,
  `bookingPerusahaanID` int(11) NOT NULL,
  `bookingCatatan` text,
  `bookingStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_events`
--

CREATE TABLE `web_events` (
  `eventsID` int(11) NOT NULL,
  `eventsJudul` varchar(200) NOT NULL,
  `eventsTanggal` varchar(200) NOT NULL,
  `eventsLokasi` text NOT NULL,
  `eventsThumbnails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_fakultas`
--

CREATE TABLE `web_fakultas` (
  `fakultasID` int(11) NOT NULL,
  `fakultasNama` varchar(200) NOT NULL,
  `fakultasUnivID` int(11) NOT NULL,
  `fakultasStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_hasil_seleksi`
--

CREATE TABLE `web_hasil_seleksi` (
  `hasilSeleksiID` int(11) NOT NULL,
  `hasilSeleksiSeleksiID` int(11) NOT NULL,
  `hasilSeleksiUserID` int(11) NOT NULL,
  `hasilSeleksiLamaranID` int(11) NOT NULL,
  `hasilSeleksiHasil` text NOT NULL,
  `hasilSeleksiKeterangan` text NOT NULL,
  `hasilSeleksiStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_jadwal_events`
--

CREATE TABLE `web_jadwal_events` (
  `jadwalEventsID` int(11) NOT NULL,
  `jadwalEventsEventsID` int(11) NOT NULL,
  `jadwalEventsTgl` varchar(50) NOT NULL,
  `jadwalEventsNama` varchar(200) NOT NULL,
  `jadwalEventsStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_jenjang_pendidikan`
--

CREATE TABLE `web_jenjang_pendidikan` (
  `jenjangPendidikanID` int(11) NOT NULL,
  `jenjangPendidikanNama` text NOT NULL,
  `jenjangPendidikanStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_jurusan`
--

CREATE TABLE `web_jurusan` (
  `jurusanID` int(11) NOT NULL,
  `jurusanNama` varchar(200) NOT NULL,
  `jurusanFakultasID` int(11) NOT NULL,
  `jurusanStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_kategori_artikel`
--

CREATE TABLE `web_kategori_artikel` (
  `kategoriArtikelID` int(11) NOT NULL,
  `kategoriArtikelNama` text NOT NULL,
  `kategoriArtikelStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_kategori_lowongan`
--

CREATE TABLE `web_kategori_lowongan` (
  `kategoriLowonganID` int(11) NOT NULL,
  `kategoriLowonganNama` varchar(200) NOT NULL,
  `kategoriLowonganStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_kategori_seleksi`
--

CREATE TABLE `web_kategori_seleksi` (
  `kategoriSeleksiID` int(11) NOT NULL,
  `kategoriSeleksiNama` text NOT NULL,
  `kategoriSeleksiStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_kota`
--

CREATE TABLE `web_kota` (
  `kotaID` int(11) NOT NULL,
  `kotaProvinsiID` int(11) NOT NULL,
  `kotaNama` varchar(200) NOT NULL,
  `kotaStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_lamaran`
--

CREATE TABLE `web_lamaran` (
  `lamaranID` int(11) NOT NULL,
  `lamaranUserID` int(11) NOT NULL,
  `lamaranLowonganID` int(11) NOT NULL,
  `lamaranPermohonan` text NOT NULL,
  `lamaranTglMelamar` varchar(50) NOT NULL,
  `lamaranKeteranganLamaran` text NOT NULL,
  `lamaranStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_lowongan`
--

CREATE TABLE `web_lowongan` (
  `lowonganID` int(11) NOT NULL,
  `lowonganPerusahaanID` int(11) NOT NULL,
  `lowonganKategoriLowonganID` int(11) NOT NULL,
  `lowonganNama` text NOT NULL,
  `lowonganFungsiPekerjaan` varchar(100) NOT NULL,
  `lowonganLevelPekerjaan` varchar(100) NOT NULL,
  `lowonganTipePekerjaan` varchar(100) NOT NULL,
  `lowonganStatusPekerjaan` text NOT NULL,
  `lowonganSyaratUmum` text NOT NULL,
  `lowonganJenjangPendidikan` text NOT NULL,
  `lowonganJurusan` text NOT NULL,
  `lowonganIpkMinimal` varchar(50) NOT NULL,
  `lowonganSyaratKhusus` text NOT NULL,
  `lowonganJobDesk` text NOT NULL,
  `lowonganKeterangan` text NOT NULL,
  `lowonganTglPost` varchar(50) NOT NULL,
  `lowonganValid` text NOT NULL,
  `lowonganStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_pelamar`
--

CREATE TABLE `web_pelamar` (
  `pelamarID` int(11) NOT NULL,
  `pelamarUserID` int(11) NOT NULL,
  `pelamarNama` varchar(100) NOT NULL,
  `pelamarJK` varchar(10) NOT NULL,
  `pelamarTmptLahir` varchar(100) NOT NULL,
  `pelamarTglLahir` varchar(10) NOT NULL,
  `pelamarKewarganegaraan` varchar(100) NOT NULL,
  `pelamarTinggiBadan` varchar(10) NOT NULL,
  `pelamarBeratBadan` varchar(10) NOT NULL,
  `pelamarGolDarah` varchar(10) NOT NULL,
  `pelamarAgama` varchar(50) NOT NULL,
  `pelamarAlamat` text NOT NULL,
  `pelamarTelfon` varchar(100) NOT NULL,
  `pelamarEmail` varchar(50) NOT NULL,
  `pelamarPendididkanFormal` text NOT NULL,
  `pelamarPendidikanNonFormal` text NOT NULL,
  `pelamarKemampuan` text NOT NULL,
  `pelamarPengalamanAkademik` text NOT NULL,
  `pelamarPengalamanKerja` text NOT NULL,
  `pelamarFoto` text NOT NULL,
  `pelamarNamaAyah` varchar(100) NOT NULL,
  `pelamarNamaIbu` varchar(100) NOT NULL,
  `pelamarPekerjaanIbu` varchar(100) NOT NULL,
  `pelamarStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_perusahaan`
--

CREATE TABLE `web_perusahaan` (
  `perusahaanID` int(11) NOT NULL,
  `perusahaanUserID` int(11) NOT NULL,
  `perusahaanKotaID` int(11) NOT NULL,
  `perusahaanNama` varchar(200) NOT NULL,
  `perusahaanAlamat` text NOT NULL,
  `perusahaanEmail` varchar(200) NOT NULL,
  `perusahaanLink` text NOT NULL,
  `perusahaanTelfon` varchar(20) NOT NULL,
  `perusahaanJenisPerusahaan` varchar(200) NOT NULL,
  `perusahaanProfil` text NOT NULL,
  `perusahaanStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_provinsi`
--

CREATE TABLE `web_provinsi` (
  `provinsiID` int(11) NOT NULL,
  `provinsiNama` varchar(200) NOT NULL,
  `provinsiStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_seleksi`
--

CREATE TABLE `web_seleksi` (
  `seleksiID` int(11) NOT NULL,
  `seleksiLowonganID` int(11) NOT NULL,
  `seleksiKategoriSeleksiID` int(11) NOT NULL,
  `seleksiNama` text NOT NULL,
  `seleksiTglAwal` varchar(50) NOT NULL,
  `seleksiTglAkhir` varchar(50) NOT NULL,
  `seleksiKeterangan` text NOT NULL,
  `seleksiStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `settingID` int(11) NOT NULL,
  `settingSiteTitle` varchar(100) NOT NULL,
  `settingSiteDescription` text NOT NULL,
  `settingMetaKeyword` text NOT NULL,
  `settingCredits` varchar(100) NOT NULL,
  `settingFoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_stands`
--

CREATE TABLE `web_stands` (
  `standsID` int(11) NOT NULL,
  `standsNama` varchar(100) NOT NULL,
  `standsKategori` varchar(100) NOT NULL,
  `standsHarga` int(20) NOT NULL,
  `standsFasilitas` text NOT NULL,
  `standsStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_tiket_events`
--

CREATE TABLE `web_tiket_events` (
  `tiketEventsID` int(11) NOT NULL,
  `tiketEventsEventsID` int(11) NOT NULL,
  `tiketEventsUserID` int(11) NOT NULL,
  `tiketEventsStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_univ`
--

CREATE TABLE `web_univ` (
  `univID` int(11) NOT NULL,
  `univNama` varchar(200) NOT NULL,
  `univStatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `web_artikel`
--
ALTER TABLE `web_artikel`
  ADD PRIMARY KEY (`artikelID`);

--
-- Indexes for table `web_artikel_komentar`
--
ALTER TABLE `web_artikel_komentar`
  ADD PRIMARY KEY (`artikelKomentarID`);

--
-- Indexes for table `web_berkas_pelamar`
--
ALTER TABLE `web_berkas_pelamar`
  ADD PRIMARY KEY (`berkasPelamarID`);

--
-- Indexes for table `web_booking`
--
ALTER TABLE `web_booking`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `web_events`
--
ALTER TABLE `web_events`
  ADD PRIMARY KEY (`eventsID`);

--
-- Indexes for table `web_fakultas`
--
ALTER TABLE `web_fakultas`
  ADD PRIMARY KEY (`fakultasID`);

--
-- Indexes for table `web_hasil_seleksi`
--
ALTER TABLE `web_hasil_seleksi`
  ADD PRIMARY KEY (`hasilSeleksiID`);

--
-- Indexes for table `web_jadwal_events`
--
ALTER TABLE `web_jadwal_events`
  ADD PRIMARY KEY (`jadwalEventsID`);

--
-- Indexes for table `web_jenjang_pendidikan`
--
ALTER TABLE `web_jenjang_pendidikan`
  ADD PRIMARY KEY (`jenjangPendidikanID`);

--
-- Indexes for table `web_kategori_artikel`
--
ALTER TABLE `web_kategori_artikel`
  ADD PRIMARY KEY (`kategoriArtikelID`);

--
-- Indexes for table `web_kategori_lowongan`
--
ALTER TABLE `web_kategori_lowongan`
  ADD PRIMARY KEY (`kategoriLowonganID`);

--
-- Indexes for table `web_kategori_seleksi`
--
ALTER TABLE `web_kategori_seleksi`
  ADD PRIMARY KEY (`kategoriSeleksiID`);

--
-- Indexes for table `web_kota`
--
ALTER TABLE `web_kota`
  ADD PRIMARY KEY (`kotaID`);

--
-- Indexes for table `web_lamaran`
--
ALTER TABLE `web_lamaran`
  ADD PRIMARY KEY (`lamaranID`);

--
-- Indexes for table `web_lowongan`
--
ALTER TABLE `web_lowongan`
  ADD PRIMARY KEY (`lowonganID`);

--
-- Indexes for table `web_pelamar`
--
ALTER TABLE `web_pelamar`
  ADD PRIMARY KEY (`pelamarID`);

--
-- Indexes for table `web_perusahaan`
--
ALTER TABLE `web_perusahaan`
  ADD PRIMARY KEY (`perusahaanID`);

--
-- Indexes for table `web_provinsi`
--
ALTER TABLE `web_provinsi`
  ADD PRIMARY KEY (`provinsiID`);

--
-- Indexes for table `web_seleksi`
--
ALTER TABLE `web_seleksi`
  ADD PRIMARY KEY (`seleksiID`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`settingID`);

--
-- Indexes for table `web_stands`
--
ALTER TABLE `web_stands`
  ADD PRIMARY KEY (`standsID`);

--
-- Indexes for table `web_tiket_events`
--
ALTER TABLE `web_tiket_events`
  ADD PRIMARY KEY (`tiketEventsID`);

--
-- Indexes for table `web_univ`
--
ALTER TABLE `web_univ`
  ADD PRIMARY KEY (`univID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12115;
--
-- AUTO_INCREMENT for table `web_artikel`
--
ALTER TABLE `web_artikel`
  MODIFY `artikelID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_artikel_komentar`
--
ALTER TABLE `web_artikel_komentar`
  MODIFY `artikelKomentarID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_berkas_pelamar`
--
ALTER TABLE `web_berkas_pelamar`
  MODIFY `berkasPelamarID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_booking`
--
ALTER TABLE `web_booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_events`
--
ALTER TABLE `web_events`
  MODIFY `eventsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_fakultas`
--
ALTER TABLE `web_fakultas`
  MODIFY `fakultasID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_hasil_seleksi`
--
ALTER TABLE `web_hasil_seleksi`
  MODIFY `hasilSeleksiID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_jadwal_events`
--
ALTER TABLE `web_jadwal_events`
  MODIFY `jadwalEventsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_jenjang_pendidikan`
--
ALTER TABLE `web_jenjang_pendidikan`
  MODIFY `jenjangPendidikanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_kategori_artikel`
--
ALTER TABLE `web_kategori_artikel`
  MODIFY `kategoriArtikelID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_kategori_lowongan`
--
ALTER TABLE `web_kategori_lowongan`
  MODIFY `kategoriLowonganID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_kategori_seleksi`
--
ALTER TABLE `web_kategori_seleksi`
  MODIFY `kategoriSeleksiID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_kota`
--
ALTER TABLE `web_kota`
  MODIFY `kotaID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_lamaran`
--
ALTER TABLE `web_lamaran`
  MODIFY `lamaranID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_lowongan`
--
ALTER TABLE `web_lowongan`
  MODIFY `lowonganID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_pelamar`
--
ALTER TABLE `web_pelamar`
  MODIFY `pelamarID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_perusahaan`
--
ALTER TABLE `web_perusahaan`
  MODIFY `perusahaanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_provinsi`
--
ALTER TABLE `web_provinsi`
  MODIFY `provinsiID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_seleksi`
--
ALTER TABLE `web_seleksi`
  MODIFY `seleksiID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `settingID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_stands`
--
ALTER TABLE `web_stands`
  MODIFY `standsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_tiket_events`
--
ALTER TABLE `web_tiket_events`
  MODIFY `tiketEventsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `web_univ`
--
ALTER TABLE `web_univ`
  MODIFY `univID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
