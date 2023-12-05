/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : transaction_nci

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 05/12/2023 23:20:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_barang
-- ----------------------------
DROP TABLE IF EXISTS `tbl_barang`;
CREATE TABLE `tbl_barang`  (
  `kode_barang` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stok` int NULL DEFAULT NULL,
  `harga` float NULL DEFAULT NULL,
  PRIMARY KEY (`kode_barang`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_barang
-- ----------------------------
INSERT INTO `tbl_barang` VALUES ('B0001', 'Keyboard', 6, 100000);
INSERT INTO `tbl_barang` VALUES ('B0002', 'Mouse', 8, 50000);
INSERT INTO `tbl_barang` VALUES ('B0003', 'Speaker', 10, 20000);
INSERT INTO `tbl_barang` VALUES ('B0004', 'Headphone', 4, 10000);

-- ----------------------------
-- Table structure for tbl_customer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_customer`  (
  `kode_customer` int NOT NULL,
  `nama_customer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kode_customer`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_customer
-- ----------------------------
INSERT INTO `tbl_customer` VALUES (1, 'Budi', 'Bandung');
INSERT INTO `tbl_customer` VALUES (2, 'Doni', 'Jakarta');
INSERT INTO `tbl_customer` VALUES (3, 'Artha', 'Jakarta');
INSERT INTO `tbl_customer` VALUES (4, 'tezz', 'bandung');
INSERT INTO `tbl_customer` VALUES (5, 'mario', 'bandung');
INSERT INTO `tbl_customer` VALUES (6, 'Doni', 'Jl. Otto Iskandar Dinata No.107');
INSERT INTO `tbl_customer` VALUES (7, 'Winda', 'Jakarta');
INSERT INTO `tbl_customer` VALUES (8, 'Arjuna', 'Jl. Mangga No.2');

-- ----------------------------
-- Table structure for tbl_detail_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detail_transaksi`;
CREATE TABLE `tbl_detail_transaksi`  (
  `no_transaksi` int NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `kode_barang` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `urut` int NOT NULL,
  `qty` float NULL DEFAULT NULL,
  `harga` float NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detail_transaksi
-- ----------------------------
INSERT INTO `tbl_detail_transaksi` VALUES (8, '2023-12-01 00:00:00', 'B0002', 1, 4, 50000);
INSERT INTO `tbl_detail_transaksi` VALUES (9, '2023-12-01 00:00:00', 'B0002', 1, 1, 50000);
INSERT INTO `tbl_detail_transaksi` VALUES (10, '2023-12-01 00:00:00', 'B0001', 1, 1, 100000);
INSERT INTO `tbl_detail_transaksi` VALUES (11, '2023-12-01 00:00:00', 'B0001', 1, 3, 100000);
INSERT INTO `tbl_detail_transaksi` VALUES (12, '2023-12-01 00:00:00', 'B0001', 1, 2, 100000);
INSERT INTO `tbl_detail_transaksi` VALUES (13, '2023-12-01 00:00:00', 'B0002', 1, 2, 50000);
INSERT INTO `tbl_detail_transaksi` VALUES (14, '2023-12-01 00:00:00', 'B0004', 1, 1, 10000);
INSERT INTO `tbl_detail_transaksi` VALUES (15, '2023-12-05 00:00:00', 'B0002', 1, 2, 50000);
INSERT INTO `tbl_detail_transaksi` VALUES (15, '2023-12-05 00:00:00', 'B0001', 2, 3, 100000);

-- ----------------------------
-- Table structure for tbl_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE `tbl_transaksi`  (
  `no_transaksi` int NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `kode_customer` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total` float NULL DEFAULT NULL,
  `keterangan` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`no_transaksi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transaksi
-- ----------------------------
INSERT INTO `tbl_transaksi` VALUES (8, '2023-12-01 00:00:00', '3', 200000, 'Lunas');
INSERT INTO `tbl_transaksi` VALUES (9, '2023-12-01 00:00:00', '4', 50000, 'Lunas');
INSERT INTO `tbl_transaksi` VALUES (10, '2023-12-01 00:00:00', '5', 100000, 'Lunas');
INSERT INTO `tbl_transaksi` VALUES (11, '2023-12-01 00:00:00', '7', 300000, 'Lunas');
INSERT INTO `tbl_transaksi` VALUES (12, '2023-12-01 00:00:00', '8', 200000, 'Lunas');
INSERT INTO `tbl_transaksi` VALUES (13, '2023-12-01 00:00:00', '6', 100000, 'Lunas');
INSERT INTO `tbl_transaksi` VALUES (14, '2023-12-01 00:00:00', '7', 10000, 'Lunas');
INSERT INTO `tbl_transaksi` VALUES (15, '2023-12-05 00:00:00', '49', 400000, 'Lunas');

SET FOREIGN_KEY_CHECKS = 1;
