/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50734 (5.7.34)
 Source Host           : localhost:3306
 Source Schema         : riska

 Target Server Type    : MySQL
 Target Server Version : 50734 (5.7.34)
 File Encoding         : 65001

 Date: 29/04/2023 09:31:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for arsip
-- ----------------------------
DROP TABLE IF EXISTS `arsip`;
CREATE TABLE `arsip` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_file` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `kasi_id` int(11) DEFAULT NULL,
  `kepala_id` int(11) DEFAULT NULL,
  `penyedia_id` int(11) DEFAULT NULL,
  `illustrasi` text,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of arsip
-- ----------------------------
BEGIN;
INSERT INTO `arsip` (`id`, `no_file`, `nama`, `tanggal`, `kategori_id`, `kasi_id`, `kepala_id`, `penyedia_id`, `illustrasi`, `file`, `status`, `created_at`, `updated_at`) VALUES (2, '2', 'sdf1111', '2023-04-18', 1, 2, 1, 1, 'dsfdsf', '1681748325_Pra RKA 2024 Pengembangan Aplikasi dan Proses Bisnis Pemerintahan Berbasis Elektronik.xlsx', '111sdfsdf', '2023-04-18 00:06:48', '2023-04-18 00:18:45');
INSERT INTO `arsip` (`id`, `no_file`, `nama`, `tanggal`, `kategori_id`, `kasi_id`, `kepala_id`, `penyedia_id`, `illustrasi`, `file`, `status`, `created_at`, `updated_at`) VALUES (3, '3', 'sdf', '2023-04-18', 1, 2, 1, 1, 'dsfds', '1681747772_hendra2.sql', 'fsdfdsf', '2023-04-18 00:09:32', '2023-04-18 00:09:32');
INSERT INTO `arsip` (`id`, `no_file`, `nama`, `tanggal`, `kategori_id`, `kasi_id`, `kepala_id`, `penyedia_id`, `illustrasi`, `file`, `status`, `created_at`, `updated_at`) VALUES (4, '4', 'sf', '2023-04-16', 1, 2, 1, 1, 'dfgfd', '1681750768_TPP_03-2023-10_50_00.xlsx', 'dfg', '2023-04-18 00:59:28', '2023-04-18 00:59:28');
COMMIT;

-- ----------------------------
-- Table structure for kasi
-- ----------------------------
DROP TABLE IF EXISTS `kasi`;
CREATE TABLE `kasi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `status_pegawai` varchar(255) DEFAULT NULL,
  `status_kasi` varchar(255) DEFAULT NULL,
  `tanggal_menjabat` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kasi
-- ----------------------------
BEGIN;
INSERT INTO `kasi` (`id`, `nama`, `status_pegawai`, `status_kasi`, `tanggal_menjabat`) VALUES (2, 'adi', 'pns', 'kasi', '2023-04-16');
COMMIT;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kategori
-- ----------------------------
BEGIN;
INSERT INTO `kategori` (`id`, `nama`) VALUES (1, 'kategori 1');
INSERT INTO `kategori` (`id`, `nama`) VALUES (2, 'kategori 2');
COMMIT;

-- ----------------------------
-- Table structure for kepala
-- ----------------------------
DROP TABLE IF EXISTS `kepala`;
CREATE TABLE `kepala` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `status_pegawai` varchar(255) DEFAULT NULL,
  `status_kepala` varchar(255) DEFAULT NULL,
  `tanggal_menjabat` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kepala
-- ----------------------------
BEGIN;
INSERT INTO `kepala` (`id`, `nama`, `status_pegawai`, `status_kepala`, `tanggal_menjabat`) VALUES (1, '1udin', 'pns1', '1kepala', '2023-04-16');
COMMIT;

-- ----------------------------
-- Table structure for penyedia
-- ----------------------------
DROP TABLE IF EXISTS `penyedia`;
CREATE TABLE `penyedia` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `telp` varchar(255) DEFAULT NULL,
  `status_penyedia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of penyedia
-- ----------------------------
BEGIN;
INSERT INTO `penyedia` (`id`, `nama`, `alamat`, `telp`, `status_penyedia`) VALUES (1, 'sinta1', 'jl pramuka k 6 gg teratai1', '09876567891', 'ok1');
COMMIT;

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
BEGIN;
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1, 1);
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (3, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (2, 'pemohon', '2022-10-19 14:20:54', '2022-10-19 14:20:54');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `password_superadmin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `change_password` int(1) unsigned DEFAULT '0' COMMENT '0: belum, 1: sudah',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (1, 'superadmin', NULL, 'superadmin', '2022-11-07 00:40:59', '$2y$10$E9xG1OtIFvBRbHqlwHCC3u48vO5eBf2OQ9wFNpi.qKOAzVqNDUdW2', NULL, NULL, '2022-11-07 00:40:59', '2022-11-06 16:40:59', '$2y$10$tjMANlV25IUwvKuPxEODW.3qE3zPSKjwhmgTcZUgsPDZRGcpgGAN.', NULL, 0);
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (3, 'te', NULL, 'te', '2023-04-18 01:03:14', '$2y$10$sBMWuW0TAIADxUCBKKkrb.az.5GFj/VMGcY0aVkUfnSHC6CZ.3K6e', NULL, NULL, '2023-04-18 01:03:14', '2023-04-18 01:03:14', NULL, NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
