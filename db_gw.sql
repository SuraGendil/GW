/*
Navicat MySQL Data Transfer

Source Server         : koneksi01
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_gw

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-06-21 10:31:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `moto_admin` varchar(50) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_jenis_kelamin` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `hak_akses` enum('O','A','P') NOT NULL DEFAULT 'P',
  PRIMARY KEY (`id_admin`),
  KEY `Role` (`id_role`),
  KEY `Jenis Kelamin` (`id_jenis_kelamin`),
  CONSTRAINT `Jenis Kelamin` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `t_jenis_kelamin` (`id_jenis_kelamin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', 'GW_01', 'GW123', 'Saya Adalah Saya', '4', '1', 'raisrahmanismail@gmail.com', 'A');
INSERT INTO `t_admin` VALUES ('2', 'GW_02', 'GW456', 'Kamu Adalah Kamu', '1', '1', 'Wildan@gmail.com', 'A');
INSERT INTO `t_admin` VALUES ('3', 'Gw_03', 'GW789', 'Kamu adalah Saya', '3', '2', 'saya@gmail.com', 'O');
INSERT INTO `t_admin` VALUES ('5', 'operator', '$2y$10$QciERAu0DLJR07pYIcAOXugmH9OA5TVSOIYEyZqm7GaNpkk9wOC3y', 'terus berenang terus berenang terus berenang', '4', '1', 'dann@gmail.com', 'O');
INSERT INTO `t_admin` VALUES ('6', 'admin', '$2y$10$768S.PHv86mzc2Yndhtye.Icl3fX25vSqE0I7XBFfUosVjVftd9jS', 'Jangan lupa bernafas', '1', '1', 'leader@gmail.com', 'A');
INSERT INTO `t_admin` VALUES ('7', 'Wildan', '$2y$10$7JkDNBGDdRTX2qxD9MrFUu44pyHacnny0.eJqle0YYbkw7jpfjMZe', 'Bisa sih, bisa, kan?, bisa lah, bisa ...', '2', '1', 'wildanhraffianshar@gmail.com', 'A');

-- ----------------------------
-- Table structure for `t_jenis_kelamin`
-- ----------------------------
DROP TABLE IF EXISTS `t_jenis_kelamin`;
CREATE TABLE `t_jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(50) DEFAULT '',
  PRIMARY KEY (`id_jenis_kelamin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_jenis_kelamin
-- ----------------------------
INSERT INTO `t_jenis_kelamin` VALUES ('1', 'Laki - Laki');
INSERT INTO `t_jenis_kelamin` VALUES ('2', 'Perempuan');

-- ----------------------------
-- Table structure for `t_jenis_produk`
-- ----------------------------
DROP TABLE IF EXISTS `t_jenis_produk`;
CREATE TABLE `t_jenis_produk` (
  `id_jenis_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_produk` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_jenis_produk
-- ----------------------------
INSERT INTO `t_jenis_produk` VALUES ('1', 'Game');
INSERT INTO `t_jenis_produk` VALUES ('2', 'Pulsa');
INSERT INTO `t_jenis_produk` VALUES ('3', 'APK');

-- ----------------------------
-- Table structure for `t_jenis_status`
-- ----------------------------
DROP TABLE IF EXISTS `t_jenis_status`;
CREATE TABLE `t_jenis_status` (
  `id_jenis_status` int(1) NOT NULL,
  `nama_jenis_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_jenis_status
-- ----------------------------
INSERT INTO `t_jenis_status` VALUES ('1', 'Tampil');
INSERT INTO `t_jenis_status` VALUES ('2', 'Sembunyi');

-- ----------------------------
-- Table structure for `t_metode_pembayaran`
-- ----------------------------
DROP TABLE IF EXISTS `t_metode_pembayaran`;
CREATE TABLE `t_metode_pembayaran` (
  `id_metode_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_metode` varchar(50) DEFAULT NULL,
  `status_metode` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_metode_pembayaran`),
  KEY `s_m_fk` (`status_metode`),
  CONSTRAINT `s_m_fk` FOREIGN KEY (`status_metode`) REFERENCES `t_jenis_status` (`id_jenis_status`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_metode_pembayaran
-- ----------------------------
INSERT INTO `t_metode_pembayaran` VALUES ('1', 'Tranfer Bank', '1');
INSERT INTO `t_metode_pembayaran` VALUES ('2', 'QR code', '1');
INSERT INTO `t_metode_pembayaran` VALUES ('3', 'Virtual Account', '1');
INSERT INTO `t_metode_pembayaran` VALUES ('4', 'M - Banking', '1');
INSERT INTO `t_metode_pembayaran` VALUES ('5', 'Supermarket', '1');
INSERT INTO `t_metode_pembayaran` VALUES ('6', 'Dana', '1');
INSERT INTO `t_metode_pembayaran` VALUES ('7', 'Ovo', '1');
INSERT INTO `t_metode_pembayaran` VALUES ('8', 'Shopeepay', '1');
INSERT INTO `t_metode_pembayaran` VALUES ('9', 'Gopay', '1');
INSERT INTO `t_metode_pembayaran` VALUES ('10', 'COD', '2');
INSERT INTO `t_metode_pembayaran` VALUES ('12', 'PayLater', '2');
INSERT INTO `t_metode_pembayaran` VALUES ('13', 'Kredit', '1');

-- ----------------------------
-- Table structure for `t_nominal`
-- ----------------------------
DROP TABLE IF EXISTS `t_nominal`;
CREATE TABLE `t_nominal` (
  `id_nominal` int(11) NOT NULL AUTO_INCREMENT,
  `nama_nominal` varchar(50) DEFAULT NULL,
  `harga_nominal` decimal(12,2) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `status_nominal` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_nominal`),
  KEY `Produk` (`id_produk`),
  KEY `nominal_status` (`status_nominal`),
  CONSTRAINT `Produk` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`),
  CONSTRAINT `nominal_status` FOREIGN KEY (`status_nominal`) REFERENCES `t_jenis_status` (`id_jenis_status`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_nominal
-- ----------------------------
INSERT INTO `t_nominal` VALUES ('1', '300 Diamond', '500000000.00', '1', '1');
INSERT INTO `t_nominal` VALUES ('2', '550 Diamond', '12000.00', '1', '1');
INSERT INTO `t_nominal` VALUES ('3', '10000 Diamond', '10902.00', '1', '1');
INSERT INTO `t_nominal` VALUES ('4', '60 Genesis Crystals', '10000.00', '2', '1');
INSERT INTO `t_nominal` VALUES ('5', '320 Genesis Crystals', '210000.00', '2', '1');
INSERT INTO `t_nominal` VALUES ('6', '1600 Genesis Crystals', '1000000.00', '2', '1');
INSERT INTO `t_nominal` VALUES ('7', 'Blessing of the Welkin Moon', '60000.00', '2', '1');
INSERT INTO `t_nominal` VALUES ('8', '1 Bulan', '66000.00', '6', '1');
INSERT INTO `t_nominal` VALUES ('9', '3 Bulan', '180000.00', '6', '1');
INSERT INTO `t_nominal` VALUES ('10', '1 Tahun', '700000.00', '6', '1');
INSERT INTO `t_nominal` VALUES ('11', '1GB / 1 minggu', '10000.00', '8', '1');
INSERT INTO `t_nominal` VALUES ('12', '32GB/ 1 bulan', '92000.00', '8', '1');
INSERT INTO `t_nominal` VALUES ('13', '600GB/ 1 tahun', '999000.00', '8', '1');
INSERT INTO `t_nominal` VALUES ('16', '600 Genesis Crystal', '3000000.00', '2', '1');
INSERT INTO `t_nominal` VALUES ('17', '3600 Genesis Crystal', '1000000.00', '2', '1');
INSERT INTO `t_nominal` VALUES ('18', '100 Diamond', '5000.00', '1', '1');
INSERT INTO `t_nominal` VALUES ('19', '7 Days VIP', '20000.00', '41', '1');
INSERT INTO `t_nominal` VALUES ('20', '31 Days VIP', '39000.00', '41', '1');
INSERT INTO `t_nominal` VALUES ('21', 'VVIP', '100000000.00', '41', '1');
INSERT INTO `t_nominal` VALUES ('22', 'Pulsa Rp.100.000', '102000.00', '11', '1');
INSERT INTO `t_nominal` VALUES ('23', '500 Crystal', '81000.00', '4', '1');
INSERT INTO `t_nominal` VALUES ('24', '65 Crystal', '15000.00', '4', '1');
INSERT INTO `t_nominal` VALUES ('25', 'Monthly-Card', '75000.00', '4', '1');
INSERT INTO `t_nominal` VALUES ('26', '6000 B-Chips', '1500000.00', '4', '1');
INSERT INTO `t_nominal` VALUES ('27', 'Minecoins - 1720 Coins', '15000.00', '12', '1');
INSERT INTO `t_nominal` VALUES ('28', 'Minecoins - 3500 Coins', '350000.00', '12', '1');
INSERT INTO `t_nominal` VALUES ('29', 'Minecoins - 500 Coins', '100000.00', '12', '1');
INSERT INTO `t_nominal` VALUES ('30', 'Minecraft Java', '300000.00', '12', '1');
INSERT INTO `t_nominal` VALUES ('31', 'Minecraft Bedrock', '100000.00', '12', '1');
INSERT INTO `t_nominal` VALUES ('32', '1 Gb / 1 Minggu', '10000.00', '9', '1');
INSERT INTO `t_nominal` VALUES ('33', '10 Gb / 1 Minggu', '30000.00', '9', '1');
INSERT INTO `t_nominal` VALUES ('34', '1 Gb / 1 Bulan', '9000.00', '9', '1');
INSERT INTO `t_nominal` VALUES ('35', 'Pulsa 20.000', '22000.00', '10', '1');
INSERT INTO `t_nominal` VALUES ('36', '2 Gb / 1 Tahun', '10000.00', '10', '1');
INSERT INTO `t_nominal` VALUES ('37', '50 Gb / 1 Minggu', '50000.00', '10', '1');
INSERT INTO `t_nominal` VALUES ('38', '2 Gb / 1 Tahun', '10000.00', '7', '1');
INSERT INTO `t_nominal` VALUES ('39', '1 Gb / 1 Bulan', '100000.00', '7', '1');
INSERT INTO `t_nominal` VALUES ('40', '2 Gb / 1 Minggu', '3000.00', '7', '1');
INSERT INTO `t_nominal` VALUES ('41', '1 Gb / 1 Bulan', '16000.00', '11', '1');
INSERT INTO `t_nominal` VALUES ('42', '2 Gb / 1 Tahun', '3000.00', '11', '1');
INSERT INTO `t_nominal` VALUES ('43', '1 Bulan', '16000.00', '5', '1');
INSERT INTO `t_nominal` VALUES ('44', '3 Bulan', '50000.00', '5', '1');
INSERT INTO `t_nominal` VALUES ('45', '1 Tahun ', '150000.00', '5', '1');

-- ----------------------------
-- Table structure for `t_pembelian`
-- ----------------------------
DROP TABLE IF EXISTS `t_pembelian`;
CREATE TABLE `t_pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `no_pembeli` varchar(20) DEFAULT NULL,
  `id_nominal` int(11) DEFAULT NULL,
  `id_metode_pembayaran` int(11) DEFAULT NULL,
  `tgl_pembelian` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_pembelian`),
  KEY `Pembeli` (`no_pembeli`),
  KEY `Metode Pembelian` (`id_metode_pembayaran`),
  KEY `Nominal` (`id_nominal`),
  CONSTRAINT `Metode Pembayaran` FOREIGN KEY (`id_metode_pembayaran`) REFERENCES `t_metode_pembayaran` (`id_metode_pembayaran`),
  CONSTRAINT `Nominal` FOREIGN KEY (`id_nominal`) REFERENCES `t_nominal` (`id_nominal`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_pembelian
-- ----------------------------
INSERT INTO `t_pembelian` VALUES ('1', '13802391', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('2', '0882123', '2', '1', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('3', '08813', '3', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('10', '0882213', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('11', '08221359', '2', '2', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('12', '08221359', '2', '2', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('13', '08221359', '2', '2', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('14', '08221359', '2', '2', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('15', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('16', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('17', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('18', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('19', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('20', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('21', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('22', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('23', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('24', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('25', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('26', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('27', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('28', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('29', '08221359', '1', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('31', '0882123', '3', '4', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('32', '08221359', '3', '1', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('33', '08221359', '3', '2', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('34', '08813', '3', '5', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('35', '853412309', '7', '1', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('36', '853412309', '6', '5', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('37', '082213593995', '9', '5', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('38', '082213593995', '10', '8', '2023-05-28');
INSERT INTO `t_pembelian` VALUES ('47', '18313432', '2', '8', '2023-05-29');
INSERT INTO `t_pembelian` VALUES ('48', '0888199288', '12', '4', '2023-05-29');
INSERT INTO `t_pembelian` VALUES ('49', '0888119288', '11', '5', '2023-05-29');
INSERT INTO `t_pembelian` VALUES ('51', '2', '2', '1', '2023-05-29');
INSERT INTO `t_pembelian` VALUES ('52', '111', '2', '8', '2023-06-18');
INSERT INTO `t_pembelian` VALUES ('53', '111', '3', '5', '2023-06-18');
INSERT INTO `t_pembelian` VALUES ('54', '082213593995', '11', '2', '2023-06-18');
INSERT INTO `t_pembelian` VALUES ('55', '0888119288', '21', '8', '2023-06-19');
INSERT INTO `t_pembelian` VALUES ('56', '22 11', '4', '1', '2023-06-20');
INSERT INTO `t_pembelian` VALUES ('57', '0882213', '5', '3', '2023-06-20');
INSERT INTO `t_pembelian` VALUES ('58', '0882123', '6', '5', '2023-06-20');
INSERT INTO `t_pembelian` VALUES ('59', '082213593995', '10', '4', '2023-06-20');
INSERT INTO `t_pembelian` VALUES ('60', '082213593994', '10', '1', '2023-06-20');
INSERT INTO `t_pembelian` VALUES ('61', '082213593995', '11', '3', '2023-06-20');
INSERT INTO `t_pembelian` VALUES ('62', '0882213', '4', '1', '2023-06-21');
INSERT INTO `t_pembelian` VALUES ('63', '08221359', '4', '2', '2023-06-21');
INSERT INTO `t_pembelian` VALUES ('64', '082213593995', '7', '9', '2023-06-21');
INSERT INTO `t_pembelian` VALUES ('65', '111', '4', '7', '2023-06-21');
INSERT INTO `t_pembelian` VALUES ('66', '082213593995', '20', '3', '2023-06-21');
INSERT INTO `t_pembelian` VALUES ('67', '08813', '19', '2', '2023-06-21');
INSERT INTO `t_pembelian` VALUES ('68', '111', '19', '13', '2023-06-21');
INSERT INTO `t_pembelian` VALUES ('69', '08813', '21', '5', '2023-06-21');

-- ----------------------------
-- Table structure for `t_produk`
-- ----------------------------
DROP TABLE IF EXISTS `t_produk`;
CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(50) DEFAULT '',
  `id_jenis_produk` int(11) DEFAULT NULL,
  `foto_produk` varchar(50) DEFAULT '',
  `terjual_produk` int(11) DEFAULT NULL,
  `status_produk` int(1) DEFAULT NULL,
  `deskripsi_produk` text DEFAULT '',
  PRIMARY KEY (`id_produk`),
  KEY `Jenis Produk` (`id_jenis_produk`),
  KEY `Jenis Status` (`status_produk`),
  CONSTRAINT `Jenis Produk` FOREIGN KEY (`id_jenis_produk`) REFERENCES `t_jenis_produk` (`id_jenis_produk`),
  CONSTRAINT `Jenis Status` FOREIGN KEY (`status_produk`) REFERENCES `t_jenis_status` (`id_jenis_status`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_produk
-- ----------------------------
INSERT INTO `t_produk` VALUES ('1', 'Moblie Legends', '1', 'ml.jpg', '8', '1', 'Mobile Legends: Bang Bang adalah permainan video seluler ber-genre multiplayer online battle arena (MOBA) yang dikembangkan dan diterbitkan oleh Moonton, anak perusahaan dari ByteDance.');
INSERT INTO `t_produk` VALUES ('2', 'Genshin Impact', '1', 'gi.jpg', '12', '1', 'Genshin Impact adalah game open-world yang dikembangkan oleh pengembang asal China, miHoYo. Gim ini tersedia secara gratis dan menerapkan sistem gacha di dalamnya. Dalam gameplay-nya, Genshin Impact memiliki arena dunia fantasi terbuka.');
INSERT INTO `t_produk` VALUES ('3', 'Dota 2', '1', 'dt2.jpg', '500', '1', 'Dota 2 adalah sebuah permainan arena pertarungan online multiplayer, dan merupakan sekuel dari Defense of the Ancients mod pada Warcraft 3: Reign of Chaos dan Warcraft 3: The Frozen Throne. DotA 2 dikembangkan oleh Valve Corporation.');
INSERT INTO `t_produk` VALUES ('4', 'Honkai Impact 3rd', '1', 'hi1.png', '10', '1', 'Honkai Impact 3rd adalah game free-to-play aksi permainan peran 3D mobile game yang dikembangkan oleh miHoYo. Merupakan seri ketiga dari Seri Honkai dan kelanjutan dari Houkai Gakuen, menggunakan banyak karakter yang sama dari judul sebelumnya, dengan cerita baru yang terpisah.');
INSERT INTO `t_produk` VALUES ('5', 'Disney +++', '3', 'dy.jpg', '23', '1', 'Disney+ adalah layanan video sesuai permintaan berlangganan Amerika Serikat yang dimiliki dan dikelola Walt Disney Direct-to-Consumer & International dari The Walt Disney Company. Disney+ diluncurkan di Kanada, Amerika Serikat, dan Belanda pada 12 November 2019.');
INSERT INTO `t_produk` VALUES ('6', 'Netflix', '3', 'nf.jpg', '4', '1', 'Netflix adalah layanan streaming berbasis langganan yang memungkinkan anggota kami menonton acara TV dan film di perangkat yang terhubung ke Internet.');
INSERT INTO `t_produk` VALUES ('7', 'Smartfren', '2', 'sf.jpg', '121', '1', 'Smartfren adalah operator penyedia jasa telekomunikasi berbasis teknologi 4G LTE Advanced yang merupakan pengembangan lanjutan dari 4G. Dahulu bernama Fren.');
INSERT INTO `t_produk` VALUES ('8', 'Telkomsel', '2', 'tf.jpg', '217', '1', 'Apa yang dimaksud dengan Telkomsel?\r\nTelkomsel adalah sebuah perusahaan yang bergerak dalam bidang jasa pelayanan telekomuikasi selular berbasis GSM. Telkomsel merupakan singkatan dari “Telekomunikasi Selular”.');
INSERT INTO `t_produk` VALUES ('9', 'Axis', '2', 'ax.jpg', '8', '1', 'Axis Penyedia Layanan Internet Paling Murah Dengan Jaringan Paling Luas, Tersedia Juga Beragam Paket internet Berkualitas Yang Sesuai Dengan Kebutuhan mu. AXIS (sebelumnya bernama Lippo Telecom dan NTS) adalah sebuah produk layanan telekomunikasi dari XL Axiata, anak perusahaan dari Axiata.');
INSERT INTO `t_produk` VALUES ('10', 'Indosat', '2', 'in.jpg', '6', '1', 'PT Indosat Tbk (dikenal sebagai Indosat Ooredoo Hutchison atau IOH) adalah salah satu perusahaan penyedia jasa telekomunikasi di Indonesia.');
INSERT INTO `t_produk` VALUES ('11', 'XL', '2', 'xl.jpg', '22', '1', 'XL (awalnya merupakan singkatan dari Excelcomindo) adalah sebuah produk telekomunikasi seluler berbasis GSM yang dikeluarkan oleh PT XL Axiata Tbk (sebelumnya bernama PT Excelcomindo Pratama Tbk). XL mulai beroperasi secara komersial pada tanggal 8 Oktober 1996, dan merupakan perusahaan swasta ketiga yang menyediakan layanan seluler GSM di Indonesia.');
INSERT INTO `t_produk` VALUES ('12', 'Minecraft', '1', 'mc.jpg', '99', '1', 'Minecraft adalah sebuah permainan video game sandbox tiga dimensi yang bisa dimainkan oleh satu pemain maupun banyak pemain. Melalui game ini, para pemain dimungkinkan untuk membuat konstruksi dari kubus-kubus 3D untuk membentuk suatu bangunan.');
INSERT INTO `t_produk` VALUES ('41', 'Iqiyi', '3', 'iqiyi13.jpg', '5', '1', 'iQIYI dalah sebuah platform video daring asal Tiongkok yang berpusat di Beijing, dan diluncurkan pada tanggal 22 April 2010.\r\n\r\nSaat ini, iQIYI merupakan salah satu situs video daring terbesar di dunia.');

-- ----------------------------
-- Table structure for `t_role`
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `Role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of t_role
-- ----------------------------
INSERT INTO `t_role` VALUES ('1', 'Leader');
INSERT INTO `t_role` VALUES ('2', 'Admin');
INSERT INTO `t_role` VALUES ('3', 'Customer');
INSERT INTO `t_role` VALUES ('4', 'Penyusup');
DELIMITER ;;
CREATE TRIGGER `tr_pembelian_null` BEFORE INSERT ON `t_pembelian` FOR EACH ROW BEGIN
  IF NEW.no_pembeli = NULL 
  THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'No Pembeli tidak boleh kosong!';
  END IF;
  IF NEW.id_nominal = NULL
  THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Nominal tidak boleh kosong!';
  END IF;
  IF NEW.id_metode_pembayaran = NULL
  THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Metode Pembayaran tidak boleh kosong!';
  END IF;
  
 END
;;
DELIMITER ;
