/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : coursepedia

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2022-07-26 10:57:57
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `administrator`
-- ----------------------------
DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `id_admin` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `username` varchar(8) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of administrator
-- ----------------------------
INSERT INTO `administrator` VALUES ('AD001', 'Fajar Abdillah', 'L', 'Cianjur', '089621321234', 'agus', '*809312860A5AB082E7D21D361D527FFD0FE3D432');
INSERT INTO `administrator` VALUES ('AD002', 'Daffa Albari', 'L', 'Riau', '0877213212231', 'daffa', '*624EA284D9C4E288314E0FADBF539AB0E0680E60');
INSERT INTO `administrator` VALUES ('AD003', 'Mausa Gani', 'L', 'Bandung', '0857213212244', 'gani', '*598C8D1A06FE9B817765F1ED6BFBFAE6DD413BBF');
INSERT INTO `administrator` VALUES ('AD004', 'Rizky Ramdanii', 'L', 'Bandung', '0821213212261', 'rizky', '*68100202595748637536891E79CAF912EF6ADDD4');
INSERT INTO `administrator` VALUES ('AD005', 'Salma', 'P', 'Bekasi', '0812213212411', 'salma', '*4EED0B8168A2CBF280C7DAE7F2144EBD549FE9D9');

-- ----------------------------
-- Table structure for `anggota`
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id_anggota` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_paket` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_paket` (`id_paket`),
  CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket_belajar` (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES ('AG001', 'Siswa 1', 'L', 'Cianjur', '087124358715', 'PB001', 'siswa1@gmail.com', 'siswa1', '*320E565A388C9B030A71963688928DDB174BA6CE');
INSERT INTO `anggota` VALUES ('AG002', 'Siswa 2', 'P', 'Jakarta', '085124358123', 'PB002', 'siswa2@gmail.com', 'siswa2', '*066723EE81F28ED19B17BB596AD262C99F0C8584');

-- ----------------------------
-- Table structure for `kategori_materi`
-- ----------------------------
DROP TABLE IF EXISTS `kategori_materi`;
CREATE TABLE `kategori_materi` (
  `id_kategori` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of kategori_materi
-- ----------------------------

-- ----------------------------
-- Table structure for `kelas`
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES ('K001', '1');
INSERT INTO `kelas` VALUES ('K002', '2');
INSERT INTO `kelas` VALUES ('K003', '3');
INSERT INTO `kelas` VALUES ('K004', '4');
INSERT INTO `kelas` VALUES ('K005', '5');
INSERT INTO `kelas` VALUES ('K006', '6');

-- ----------------------------
-- Table structure for `materi`
-- ----------------------------
DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi` (
  `id_materi` varchar(8) NOT NULL,
  `id_kategori` varchar(8) NOT NULL,
  `id_mentor` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id_materi`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_mentor` (`id_mentor`),
  CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_materi` (`id_kategori`),
  CONSTRAINT `materi_ibfk_3` FOREIGN KEY (`id_mentor`) REFERENCES `mentor` (`id_mentor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of materi
-- ----------------------------

-- ----------------------------
-- Table structure for `mentor`
-- ----------------------------
DROP TABLE IF EXISTS `mentor`;
CREATE TABLE `mentor` (
  `id_mentor` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id_mentor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mentor
-- ----------------------------
INSERT INTO `mentor` VALUES ('MT001', 'Mentor 1', 'L', 'Jakarta Utara', '089639241234', 'mentor1', '*38D2B07642BC0D659C6293EB3FBD17BEA962D1BA');
INSERT INTO `mentor` VALUES ('MT002', 'Mentor 2', 'L', 'Sukabumi', '087739241234', 'mentor2', '*D27064D396FD977884662B6EC8DAEC1443649688');
INSERT INTO `mentor` VALUES ('MT003', 'Mentor 3', 'P', 'Cimahi', '085139241234', 'mentor3', '*0A6BB5E834E95FB9F5F5046F8FFCAEF4DD7119B1');
INSERT INTO `mentor` VALUES ('MT004', 'Mentor 4', 'P', 'Jakarta Barat', '081239241234', 'mentor4', '*0D632E6A09C8C4932098F838B544D7E495ACF33A');
INSERT INTO `mentor` VALUES ('MT005', 'Mentor 5', 'L', 'Jakarta Selatan', '083539241234', 'mentor5', '*1858E83D0AE20D0734335EAF1418A7DB96B2AB70');

-- ----------------------------
-- Table structure for `paket_belajar`
-- ----------------------------
DROP TABLE IF EXISTS `paket_belajar`;
CREATE TABLE `paket_belajar` (
  `id_paket` varchar(8) NOT NULL,
  `id_kelas` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_paket`),
  KEY `kelas` (`id_kelas`),
  CONSTRAINT `kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of paket_belajar
-- ----------------------------
INSERT INTO `paket_belajar` VALUES ('PB001', 'K001', 'Paket Belajar Kelas 1 SD Full 1 Tahun', '500000');
INSERT INTO `paket_belajar` VALUES ('PB002', 'K002', 'Paket Belajar Kelas 2 SD Full 1 Tahun', '550000');
INSERT INTO `paket_belajar` VALUES ('PB003', 'K003', 'Paket Belajar Kelas 3 SD Full 1 Tahun', '570000');
INSERT INTO `paket_belajar` VALUES ('PB004', 'K004', 'Paket Belajar Kelas 4 SD Full 1 Tahun', '600000');
INSERT INTO `paket_belajar` VALUES ('PB005', 'K005', 'Paket Belajar Kelas 5 SD Full 1 Tahun', '630000');
INSERT INTO `paket_belajar` VALUES ('PB006', 'K006', 'Paket Belajar Kelas 6 SD Full 1 Tahun', '700000');

-- ----------------------------
-- Table structure for `pembelajaran`
-- ----------------------------
DROP TABLE IF EXISTS `pembelajaran`;
CREATE TABLE `pembelajaran` (
  `id_pembelajaran` varchar(8) NOT NULL,
  `id_anggota` varchar(8) NOT NULL,
  `id_mentor` varchar(8) NOT NULL,
  `id_materi` varchar(8) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pembelajaran`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_mentor` (`id_mentor`),
  KEY `id_materi` (`id_materi`),
  CONSTRAINT `pembelajaran_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  CONSTRAINT `pembelajaran_ibfk_2` FOREIGN KEY (`id_mentor`) REFERENCES `mentor` (`id_mentor`),
  CONSTRAINT `pembelajaran_ibfk_3` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pembelajaran
-- ----------------------------

-- ----------------------------
-- Table structure for `tagihan`
-- ----------------------------
DROP TABLE IF EXISTS `tagihan`;
CREATE TABLE `tagihan` (
  `no_invoice` varchar(11) NOT NULL,
  `id_paket` varchar(8) NOT NULL,
  `id_anggota` varchar(8) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `total` int(11) NOT NULL,
  `id_administrator` varchar(8) NOT NULL,
  PRIMARY KEY (`no_invoice`),
  KEY `id_administrator` (`id_administrator`),
  KEY `id_anggota` (`id_anggota`),
  KEY `paketbelajar` (`id_paket`),
  CONSTRAINT `paketbelajar` FOREIGN KEY (`id_paket`) REFERENCES `paket_belajar` (`id_paket`),
  CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_administrator`) REFERENCES `administrator` (`id_admin`),
  CONSTRAINT `tagihan_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of tagihan
-- ----------------------------
INSERT INTO `tagihan` VALUES ('INV/PB/0001', 'PB001', 'AG001', '2022-07-20', '500000', 'AD001');
INSERT INTO `tagihan` VALUES ('INV/PB/0002', 'PB002', 'AG002', '2022-05-15', '550000', 'AD001');
