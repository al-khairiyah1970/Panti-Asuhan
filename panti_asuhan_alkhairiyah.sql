/*
 Navicat Premium Data Transfer

 Source Server         : Laragon - Local
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3307
 Source Schema         : panti_asuhan_alkhairiyah

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 24/02/2025 03:43:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(0) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks`  (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(0) NOT NULL,
  PRIMARY KEY (`key`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for donasi_donatur
-- ----------------------------
DROP TABLE IF EXISTS `donasi_donatur`;
CREATE TABLE `donasi_donatur`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_donasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_donasi` bigint(0) UNSIGNED NULL DEFAULT NULL,
  `id_donatur` bigint(0) UNSIGNED NULL DEFAULT NULL,
  `nilai_donasi` double NULL DEFAULT NULL,
  `payment_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for finance_donasi
-- ----------------------------
DROP TABLE IF EXISTS `finance_donasi`;
CREATE TABLE `finance_donasi`  (
  `transaction_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `transaction_time` datetime(0) NULL DEFAULT NULL,
  `paid_at` datetime(0) NULL DEFAULT NULL,
  `transaction_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `transaction_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `signature_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `settlement_time` datetime(0) NULL DEFAULT NULL,
  `permata_va_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `va_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `payment_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `masked_card` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fraud_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `currency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `acquirer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `channel_response_message` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `channel_response_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `card_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `eci` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `biller_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bill_key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `approval_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_message` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `amount` double NULL DEFAULT NULL,
  `gross_amount` double NULL DEFAULT NULL,
  `payment_status` double NULL DEFAULT NULL,
  `merchant_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `issuer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `expiry_time` datetime(0) NULL DEFAULT NULL,
  `three_ds_version` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  UNIQUE INDEX `finance_pendaftaran_transaction_id_unique`(`transaction_id`) USING BTREE,
  INDEX `finance_pendaftaran_order_id_index`(`order_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(0) NOT NULL,
  `pending_jobs` int(0) NOT NULL,
  `failed_jobs` int(0) NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int(0) NULL DEFAULT NULL,
  `created_at` int(0) NOT NULL,
  `finished_at` int(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(0) UNSIGNED NOT NULL,
  `reserved_at` int(0) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(0) UNSIGNED NOT NULL,
  `created_at` int(0) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_anak
-- ----------------------------
DROP TABLE IF EXISTS `master_anak`;
CREATE TABLE `master_anak`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `usia` bigint(0) NULL DEFAULT NULL,
  `asal_daerah` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `pendidikan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `prestasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cita_cita` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_banner
-- ----------------------------
DROP TABLE IF EXISTS `master_banner`;
CREATE TABLE `master_banner`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_donasi
-- ----------------------------
DROP TABLE IF EXISTS `master_donasi`;
CREATE TABLE `master_donasi`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_donasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deskripsi_donasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `target_donasi` double NULL DEFAULT NULL,
  `terkumpul_donasi` double NULL DEFAULT NULL,
  `kekurangan_donasi` double NULL DEFAULT NULL,
  `deadline_donasi` date NULL DEFAULT NULL,
  `img_donasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_donasi
-- ----------------------------
INSERT INTO `master_donasi` VALUES (1, 'Makan bergizi gratis', 'Untuk pengadaan bubur sehat', 1000000, 0, 1000000, '2025-02-15', 'scoopy1.png', '2025-02-10 12:27:19', '2025-02-18 23:10:52', NULL);

-- ----------------------------
-- Table structure for master_donatur
-- ----------------------------
DROP TABLE IF EXISTS `master_donatur`;
CREATE TABLE `master_donatur`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_donasi` bigint(0) NULL DEFAULT NULL,
  `nama_depan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `nama_belakang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `telepon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `nominal` double NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_gambar_anak
-- ----------------------------
DROP TABLE IF EXISTS `master_gambar_anak`;
CREATE TABLE `master_gambar_anak`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for master_kepengurusan
-- ----------------------------
DROP TABLE IF EXISTS `master_kepengurusan`;
CREATE TABLE `master_kepengurusan`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_kepengurusan
-- ----------------------------
INSERT INTO `master_kepengurusan` VALUES (1, 'Struktur Kepengurusan Panti Asuhan Al-Khairiyah', 'Struktur Kepengurusan Panti Asuhan Al-Khairiyah', 'kepengurusan.jpeg', '2024-11-27 21:17:35', '2024-11-27 21:17:35');

-- ----------------------------
-- Table structure for master_misi
-- ----------------------------
DROP TABLE IF EXISTS `master_misi`;
CREATE TABLE `master_misi`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_misi
-- ----------------------------
INSERT INTO `master_misi` VALUES (1, 'Menyelenggarakan lembaga pendidikan, pelatihan, sosial dan keagamaan yang berkualitas, mandiri dan berdaya saing.', '2024-11-27 21:17:35', '2024-11-27 21:17:35');
INSERT INTO `master_misi` VALUES (2, 'Melakukan kegiatan antar lembaga, Instansi, untuk meningkatkan pelayanan kepada masyarakat', '2024-11-27 21:17:35', '2024-11-27 21:17:35');
INSERT INTO `master_misi` VALUES (3, 'Menghasilkan SDM yang unggul dan memiliki akhlak mulia dengan nilai-nilai keimanan dan ketaqwaan kepada Allah SWT.', '2024-11-27 21:17:35', '2024-11-27 21:17:35');
INSERT INTO `master_misi` VALUES (4, 'Melaksanakan tata kelola lembaga yang baik, dinamis, akuntabel, trasparan dan menjaga nilai-nilai kemanusian.', '2024-11-27 21:17:35', '2024-11-27 21:17:35');

-- ----------------------------
-- Table structure for master_profile
-- ----------------------------
DROP TABLE IF EXISTS `master_profile`;
CREATE TABLE `master_profile`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_profile
-- ----------------------------
INSERT INTO `master_profile` VALUES (1, 'Pembangunan Nasional merupakan implementasi nilai tradisional\n            Nusantara dan hal ini sesuai dengan sila ke lima dalam Pancasila yang berbunyi :\n            “Keadilan sosial bagi seluruh rakyat Indonesia”. Dari segi yuridis Operasional\n            UU Nomor 6 Tahun 1997 Pasal 8 : “Masyarakat mempunyai kesempatan yang seluas-luasnya\n            untuk mengadakan usaha kesejahteraan sosial dengan mengindahkan garis kebijakan dan\n            ketentuan-ketentuan sebagaimana ditetapkan dalam peratuaran perundang-undangan”.\n            Berkenaan dengan hal tersebut di atas maka kami Pengurus Pengurus yayasan mendirikan\n            asrama Panti Asuhan Yatim Piatu Al-Khairiyah merasa terpanggil untuk melaksanakan usaha\n            kegitan kesejahteraan sosial dengan memberikan pelayanan sosial kepada anak yatim dan\n            yatim piatu yang tak mampu sebanyak 300 anak Yatim/Yatim Piatu yang ada di lingkungan\n            Yayasan Perguruan Islam Al-Khairiyah. Panti Asuhan Yatim Piatu Al-Khairiyah didirikan\n            sejak tahun 1967, atas prakarsa oleh al- mukarrom KH. ZARQONI (alm) Pendiri Yayasan\n            Perguruan Islam Al-Khairiyah. Pada tahun 1969, Yayasan Al-Khairiyah menerima sebidang\n            tanah waqaf dari Bapak SUGANDA, yang diperuntukan sebagai asrama Panti Asuhan Yatim\n            Piatu Al-Khairiyah.', 'image1.png', '2024-11-27 21:17:35', '2024-11-27 21:17:35');

-- ----------------------------
-- Table structure for master_program
-- ----------------------------
DROP TABLE IF EXISTS `master_program`;
CREATE TABLE `master_program`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `judul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_program
-- ----------------------------
INSERT INTO `master_program` VALUES (1, 'Ujicoba posting', 'Mantap', 'Gambar WhatsApp 2025-01-15 pukul 23.32.12_8e3c0745.jpg', 'bulanan', '2025-02-10 08:02:32', '2025-02-10 08:02:32');
INSERT INTO `master_program` VALUES (2, 'Mantapkan postingnya', 'TEst123', 'photo_2025-02-05_13-37-58.jpg', 'bulanan', '2025-02-10 08:02:52', '2025-02-10 08:02:52');
INSERT INTO `master_program` VALUES (3, 'Ujicoba posting', 'Mantap jos', 'Town-Hall-Meeting-Sekawan-Media-2023-scaled.jpg', 'mingguan', '2025-02-10 08:03:26', '2025-02-10 08:03:26');
INSERT INTO `master_program` VALUES (4, 'Ujicoba posting', 'TEst123', 'Gambar WhatsApp 2025-01-15 pukul 23.32.12_8e3c0745.jpg', 'mingguan', '2025-02-10 08:03:36', '2025-02-10 08:03:36');

-- ----------------------------
-- Table structure for master_tujuan
-- ----------------------------
DROP TABLE IF EXISTS `master_tujuan`;
CREATE TABLE `master_tujuan`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_tujuan
-- ----------------------------
INSERT INTO `master_tujuan` VALUES (1, 'Memberikan pendidikan dan pengajaran nilai-nilai Agama Islam serta kecakapan hidup bagi anak asuh.', '2024-11-27 21:17:35', '2024-11-27 21:17:35');
INSERT INTO `master_tujuan` VALUES (2, 'Mendidik dan memberikan keteladanan kepada anak asuh dalam membangun sikap mental, pengetahuan wawasan dan keterampilan membentuk generasi yang berkualitas secara moral maupun ilmu pengetahuan.', '2024-11-27 21:17:35', '2024-11-27 21:17:35');
INSERT INTO `master_tujuan` VALUES (3, 'Membantu pemerintah dalam usaha melaksanakan program kesejahteraan.', '2024-11-27 21:17:35', '2024-11-27 21:17:35');

-- ----------------------------
-- Table structure for master_visi
-- ----------------------------
DROP TABLE IF EXISTS `master_visi`;
CREATE TABLE `master_visi`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of master_visi
-- ----------------------------
INSERT INTO `master_visi` VALUES (1, 'Menjadi Yayasan yang unggul dalam menyelenggarakan kegitan pendidikan,\n            pelatihan, kesehatan, sosial dan keagamaan berdasarkan nilai-nilai keislaman.', '2024-11-27 21:17:35', '2024-11-27 21:17:35');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2024_10_24_060536_create_master_anak_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_10_24_062407_create_master_donasi_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_10_24_075758_create_master_donatur_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_10_31_035159_create_master_banner_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_10_31_040010_create_master_visi_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_10_31_040015_create_master_misi_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_10_31_040024_create_master_profile_table', 1);
INSERT INTO `migrations` VALUES (11, '2024_11_03_043041_create_master_program_table', 1);
INSERT INTO `migrations` VALUES (12, '2024_11_03_094607_create_master_kepengurusan_table', 1);
INSERT INTO `migrations` VALUES (13, '2024_11_27_161154_create_master_tujuan_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_11_27_210628_tujuan_seeder', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(0) UNSIGNED NULL DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sessions_user_id_index`(`user_id`) USING BTREE,
  INDEX `sessions_last_activity_index`(`last_activity`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Super Admin', 'superadmin@alkhairiyah.com', 'superadmin', '2024-11-27 21:17:34', '$2y$12$k1qxOMLGBQ8RUpJupX6OFOGA48IVGfqSg.uhZ9Ouuv4f4LSt4hcfC', '4HXL1uw2rQCht0QYbE8ZiFlkvSMheGKf5R5NgBuYO4tmDtvgFexix5gvCk97', 'SA', '2024-11-27 21:17:35', '2024-11-27 21:17:35');
INSERT INTO `users` VALUES (4, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$k1qxOMLGBQ8RUpJupX6OFOGA48IVGfqSg.uhZ9Ouuv4f4LSt4hcfC', NULL, 'AD', '2025-01-09 15:04:26', '2025-01-25 00:13:36');
SET FOREIGN_KEY_CHECKS = 1;
