-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2021 pada 16.07
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abu_zaid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_beli` date NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual_cash` bigint(20) NOT NULL,
  `laba_cash` bigint(20) NOT NULL,
  `harga_jual_kredit` bigint(20) NOT NULL,
  `laba_kredit` bigint(20) NOT NULL,
  `ram` int(11) DEFAULT NULL,
  `memori` int(11) DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `slug`, `kategori_id`, `supplier_id`, `merk`, `tanggal_beli`, `harga_beli`, `harga_jual_cash`, `laba_cash`, `harga_jual_kredit`, `laba_kredit`, `ram`, `memori`, `gambar`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Oppo A53', 'oppo-a53', 1, 13, 'Oppo', '2020-12-01', 22870000, 2500000, -20370000, 3300000, -19570000, 4, 64, '1614331388_6038bdfc08aea.jpg', '<h3>Spesifikasi OPPO A53</h3>\r\n\r\n<ul>\r\n	<li>Ukuran Layar : 6.5 inch IPS LCD, 720 x 1600 pixels</li>\r\n	<li>Chipset : Qualcomm SM4250 Snapdragon 460 (11 nm)</li>\r\n	<li>OS : Android 10</li>\r\n	<li>RAM: 4GB / 6GB</li>\r\n	<li>Memori internal : 64GB / 128GB</li>\r\n	<li>Ukuran HP : 163.9 x 75.1 x 8.4 mm</li>\r\n	<li>Berat HP : 186 g</li>\r\n	<li>Kamera depan : 16 MP, f/2.0, (wide)</li>\r\n	<li>Kamera belakang : 13 MP, f/2.2, 25mm (wide), 2 MP, f/2.4, (macro), dan 2 MP, f/2.4, (depth)</li>\r\n	<li>Baterai : Li-Po 5000 mAh, non-removable</li>\r\n	<li>Pilihan Warna : Fairy White, Electric Black, Fancy Blue</li>\r\n	<li>Tanggal Rilis : Agustus 2020</li>\r\n</ul>', 1, '2021-02-26 09:21:59', '2021-02-26 09:42:44'),
(2, 'Samsung A10S', 'samsung-a10s', 1, 2, 'Samsung', '2020-12-30', 1511000, 1800000, 289000, 2400000, 889000, 3, 32, '1614331881_6038bfe9d47db.jpg', '<p>Spesifikasi Galaxy A10s :<br />\r\nDimensi bodi 156.9 x 75.8 x 7.8mm<br />\r\nLayar 6.2-inch, resolusi HD+ (720x1520), IPS<br />\r\nKamera depan 8MP (F2.0) Kamera belakang 13MP (F1.8) + 2MP (F2.4)<br />\r\nProsesor octa core 2 GHz, 1,5 GHz<br />\r\nRAM 2 GB ROM 32 GB, ekspansi 512 GB<br />\r\nSoftware Android 9.0 (Pie) + One UI<br />\r\nBaterai 4.000 mAh<br />\r\nKartu SIM Dual-SIM (nano)<br />\r\nKonektor Micro-USB 2.0, 3,5mm audio jack<br />\r\nBiometrik Pemindai sidik jari belakang Face Recognition Warna : Merah, Hijau dan Hitam<br />\r\n<br />\r\nSmartphone Galaxy A10s resmi dirilis Samsung untuk &quot;menyempurnakan&quot; Galaxy A10 yang dirilis Maret lalu. Secara keseluruhan, perubahan spesifikasi dari Galaxy A10 tidak banyak. Banderol harganya pun tidak jauh berbeda dengan Galaxy A10. Kendati demikian, pengguna yang belum pernah menjajal ponsel Samsung dan ingin mencobanya, bisa mempertimbangkan Galaxy A10s sebagai salah satu opsi. Sebab, spesifikasi yang ditingkatkan dari pendahulunya adalah fitur yang vital, seperti kamera dan baterai. Samsung Galaxy A10s memiliki dua kamera belakang dengan masing-masing resolusinya 13 megapiksel dan 2 megapiksel. Resolusi kamera depan Samsung Galaxy A10s ditingkatkan dari pendahulunya jadi 8 megapiksel dari sebelumnya hanya 5 megapiksel. Di bawah cangkang terbenam baterai berkapasitas 4.000 mAh, meningkat dari kapasitas baterai yang dimiliki &quot;adiknya&quot; sebesar 3.400 mAh. Spesifikasi lainnya tampak masih sama dengan Galaxy A10. Layarnya masih berbentang 6,2 inci berapnel IPS dan memiliki resolusi HD Plus. Desain layarnya serupa dengan lini Galaxy A series pada umumnya yakni mengadopsi Infinity V. Soal jeroannya, ponsel ini mengandalkan prosesor octa core yang dipadu RAM 2 GB dan internal 32 GB.Samsung Galaxy A10s memiliki tiga slot yang terdiri dari dua ruang untuk kartu SIM dan satu untuk microSD yang bisa mengekspansi memori internal hingga 512 GB. Samsung Galaxy A10s menjalankan Android 9 Pie yang dilapisi antarmuka One UI. Ada tiga warna yang tersedia yakni biru, hijau</p>', 1, '2021-02-26 09:31:21', '2021-02-26 09:47:37'),
(3, 'Infinix Hot 9 Play', 'infinix-hot-9-play', 1, 13, 'Infinix', '2020-12-15', 1615000, 2000000, 385000, 2500000, 885000, 4, 64, '1614332218_6038c13a76547.jfif', '<p>Spesifikasi Hot 9 Play<br />\r\nJaringan : 2G, 3G, 4G SIM Card<br />\r\nDual SIM (Nano-SIM, dual stand-by)<br />\r\n<br />\r\nBody Dimensi :171,8 x 78 x 8,9 mm<br />\r\nBerat : 209 g<br />\r\nJenis Layar : sentuh kapasitif IPS LCD<br />\r\nUkuran : 6,82 inci<br />\r\nResolusi : 720 x 1640 piksel (~ 263 ppi)<br />\r\nChipset : Mediatek MT6761 Helio A22 (12 nm)<br />\r\nCPU : Quad-core 2.0 GHz Cortex-A53<br />\r\nGPU : PowerVR GE8300<br />\r\n<br />\r\nMemori<br />\r\nRAM : 4GB<br />\r\nMemori Internal : 64GB<br />\r\nMemori Eksternal : microSDXC (slot khusus)<br />\r\n<br />\r\nKamera Utama<br />\r\nJumlah Kamera : 2<br />\r\nResolusi : 13 MP + QVGA<br />\r\n<br />\r\nFitur<br />\r\n- 13 MP, (wide), 1/3.1&quot;, 1.12&micro;m, AF<br />\r\n- QVGA (Sensor cahaya rendah)<br />\r\n+ Triple-LED flash, panorama, HDR<br />\r\nVideo : 1080p@30fps<br />\r\nKamera Selfie<br />\r\nJumlah Kamera : 1<br />\r\nResolusi : 8 MP, (wide)<br />\r\nVideo : 1080p@30fps<br />\r\nKonektivitas Wlan<br />\r\nWi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot<br />\r\nBluetooth<br />\r\n5.0, A2DP, LE<br />\r\nGPS</p>', 1, '2021-02-26 09:36:58', '2021-02-26 09:49:56'),
(4, 'Samsung A20S', 'samsung-a20s', 1, 26, 'Samsung', '2020-11-10', 1965000, 2200000, 235000, 3100000, 1135000, 3, 32, '1614335483_6038cdfbafecf.jpg', '<h3>Spesifikasi Samsung Galaxy A20s</h3>\r\n\r\n<ul>\r\n	<li>Harga hp Samsung A20s (rilis): mulai dari Rp 2.499.000</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tanggal rilis: September 2019</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Layar: 6.5 inch</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Resolusi layar: 720 x 1560 pixels, 19.5:9 ratio (~264 ppi density)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Chipset: Qualcomm SDM450 Snapdragon 450 (14 nm)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>OS: Android 9.0 (Pie); One UI</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>CPU: Octa-core 1.8 GHz Cortex-A53</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>GPU: Adreno 506</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Memori internal: 32GB 3GB RAM, 64GB 4GB RAM</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Memori Eksternal: microSDXC</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>SIM card: Dual SIM (Nano-SIM, dual stand-by)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Berat: 183 gram</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Kamera Belakang: triple kamera 13 MP, f/1.8, 27mm (wide), 8 MP, f/2.2, 13mm (ultrawide), 1/4.0&quot;, 1.12&micro;m, 5 MP, f/2.2, (depth)</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Kamera Depan: 8 MP, f/2.0</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Baterai: Non-removable Li-Po 4000 mAh</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Jack earphone: 3,5mm audio jack</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Varian warna: hitam, biru, merah, dan hijau</li>\r\n</ul>', 1, '2021-02-26 10:31:23', '2021-02-26 10:50:22'),
(5, 'Oppo F9', 'oppo-f9', 1, 38, 'oppo', '2020-12-15', 1800000, 2500000, 700000, 3100000, 1300000, 6, 64, '1614335596_6038ce6cc6f3a.jpg', '<h3>Spesifikasi OPPO F9 di Indonesia</h3>\r\n\r\n<ul>\r\n	<li>Tanggal rilis: April 2018</li>\r\n	<li>Layar: Super AMOLED, 5.8 inci</li>\r\n	<li>Resolusi layar: 1080 x 2340 pixels, 19.5:9 ratio (~409 ppi density)</li>\r\n	<li>Chipset: Mediatek MT6771 Helio P60 (12 nm)</li>\r\n	<li>OS: Android 8.1 (Oreo), ColorOS 5.2</li>\r\n	<li>CPU: Octa-core (4x2.0 GHz Cortex-A73 &amp; 4x2.0 GHz Cortex-A53)</li>\r\n	<li>GPU: Mali-G72 MP3</li>\r\n	<li>Memori internal: 64GB 4GB RAM, 64GB 6GB RAM</li>\r\n	<li>Memori Eksternal: microSDX</li>\r\n	<li>SIM card: Dual SIM (Nano-SIM, dual stand-by)</li>\r\n	<li>Kamera Belakang: 16 MP, f/1.8, 1/3.1, 1.0&micro;m, PDAF</li>\r\n	<li>Kamera Depan: 25 MP, f/2.0, 26mm (wide), 1/2.8&quot;, 0.9&micro;m</li>\r\n	<li>Baterai: Non-Removable Li-Po 3500 mAh</li>\r\n	<li>Jack earphone: 3,5mm audio jack</li>\r\n	<li>Varian warna: Sunrise Red, Twilight Blue, Starry Purple, Jade Green</li>\r\n</ul>', 1, '2021-02-26 10:33:16', '2021-02-26 10:57:39'),
(6, 'Samsung A10S', 'samsung-a10s-77220', 1, 13, 'Samsung', '2020-12-01', 1490000, 2000000, 510000, 2300000, 810000, 2, 32, '1614335691_6038cecb3edff.jpg', '<p>Spesifikasi Galaxy A10s :<br />\r\nDimensi bodi 156.9 x 75.8 x 7.8mm<br />\r\nLayar 6.2-inch, resolusi HD+ (720x1520), IPS<br />\r\nKamera depan 8MP (F2.0) Kamera belakang 13MP (F1.8) + 2MP (F2.4)<br />\r\nProsesor octa core 2 GHz, 1,5 GHz<br />\r\nRAM 2 GB ROM 32 GB, ekspansi 512 GB<br />\r\nSoftware Android 9.0 (Pie) + One UI<br />\r\nBaterai 4.000 mAh<br />\r\nKartu SIM Dual-SIM (nano)<br />\r\nKonektor Micro-USB 2.0, 3,5mm audio jack<br />\r\nBiometrik Pemindai sidik jari belakang Face Recognition Warna : Merah, Hijau dan Hitam<br />\r\n<br />\r\nSmartphone Galaxy A10s resmi dirilis Samsung untuk &quot;menyempurnakan&quot; Galaxy A10 yang dirilis Maret lalu. Secara keseluruhan, perubahan spesifikasi dari Galaxy A10 tidak banyak. Banderol harganya pun tidak jauh berbeda dengan Galaxy A10. Kendati demikian, pengguna yang belum pernah menjajal ponsel Samsung dan ingin mencobanya, bisa mempertimbangkan Galaxy A10s sebagai salah satu opsi. Sebab, spesifikasi yang ditingkatkan dari pendahulunya adalah fitur yang vital, seperti kamera dan baterai. Samsung Galaxy A10s memiliki dua kamera belakang dengan masing-masing resolusinya 13 megapiksel dan 2 megapiksel. Resolusi kamera depan Samsung Galaxy A10s ditingkatkan dari pendahulunya jadi 8 megapiksel dari sebelumnya hanya 5 megapiksel. Di bawah cangkang terbenam baterai berkapasitas 4.000 mAh, meningkat dari kapasitas baterai yang dimiliki &quot;adiknya&quot; sebesar 3.400 mAh. Spesifikasi lainnya tampak masih sama dengan Galaxy A10. Layarnya masih berbentang 6,2 inci berapnel IPS dan memiliki resolusi HD Plus. Desain layarnya serupa dengan lini Galaxy A series pada umumnya yakni mengadopsi Infinity V. Soal jeroannya, ponsel ini mengandalkan prosesor octa core yang dipadu RAM 2 GB dan internal 32 GB.Samsung Galaxy A10s memiliki tiga slot yang terdiri dari dua ruang untuk kartu SIM dan satu untuk microSD yang bisa mengekspansi memori internal hingga 512 GB. Samsung Galaxy A10s menjalankan Android 9 Pie yang dilapisi antarmuka One UI. Ada tiga warna yang tersedia yakni biru, hijau</p>', 1, '2021-02-26 10:34:51', '2021-02-26 10:58:49'),
(7, 'Oppo F11 Pro', 'oppo-f11-pro', 1, 47, 'Oppo', '2020-12-15', 3221000, 4000000, 779000, 5000000, 1779000, 6, 64, '1614335852_6038cf6c13f5e.jpg', '<h3>Spesifikasi OPPO F11 Pro di Indonesia</h3>\r\n\r\n<ul>\r\n	<li>Layar: LTPS IPS LCD 6.5 inci</li>\r\n	<li>Resolusi layar: 2340 x 1080 pixels, rasio 19.5 :9</li>\r\n	<li>Chipset: Mediatek Helio P70 (2nm)</li>\r\n	<li>OS: Android 9.0 (Pie); ColorOS 6</li>\r\n	<li>CPU: Octa Core (4x2.1 GHz Cortex-A73 dan 4x2.0 GHzCortex-A53)</li>\r\n	<li>GPU: Mali-G72 MP3</li>\r\n	<li>Memori internal: 64 GB</li>\r\n	<li>Memori Eksternal: MicroSD hingga 256GB</li>\r\n	<li>SIM card: Dual Sim (Nano + Nano)</li>\r\n	<li>Berat: 190 gram</li>\r\n	<li>Kamera Belakang: Dual Kamera dengan 48MP dengan f/1.8 (PDAF) dan 5MP dengan f/2.4 (Depth Sensor)</li>\r\n	<li>Kamera Depan: Motorized Pop Up 16MP dengan f/2.0</li>\r\n	<li>Baterai: 4000 mAh</li>\r\n	<li>Jack earphone: 3.5mm jack</li>\r\n	<li>Varian warna: Aurora Green dan Thunder Black</li>\r\n	<li>Tanggal rilis: Maret 2019</li>\r\n</ul>', 1, '2021-02-26 10:37:32', '2021-02-26 11:01:44'),
(8, 'Oppo Reno4 F', 'oppo-reno4-f', 1, 30, 'Oppo', '2020-11-17', 3663000, 4000000, 337000, 5000000, 1337000, 8, 128, '1614336007_6038d007546c1.png', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"2\">Tipe</th>\r\n			<th>Tipe</th>\r\n			<td>Smartphone , Phablet , Camera Phone , Selfie Phone , Bezel-less Phone</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Shape</th>\r\n			<td>Bar</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"9\">Dasar</th>\r\n			<th>OS</th>\r\n			<td>Android</td>\r\n		</tr>\r\n		<tr>\r\n			<th>OS ver</th>\r\n			<td>Android 10, ColorOS 7.2</td>\r\n		</tr>\r\n		<tr>\r\n			<th>SIM</th>\r\n			<td>Nano SIM , Dual SIM , Dual Standby</td>\r\n		</tr>\r\n		<tr>\r\n			<th>CPU</th>\r\n			<td>Mediatek MT6779V Helio P95 (12 nm),<br />\r\n			Octa-core Cortex-A75 &amp; Cortex-A55</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kecepatan CPU</th>\r\n			<td>2x2.2 GHz Cortex-A75 &amp; 6x2.0 GHz Cortex-A55</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Memori Internal</th>\r\n			<td>128GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM</th>\r\n			<td>8GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Memori Eksternal</th>\r\n			<td>microSDXC</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Baterai</th>\r\n			<td>Li-Po 4.000 mAh, non-removable<br />\r\n			Fast charging 18W</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"2\">Layar</th>\r\n			<th>Ukuran Layar</th>\r\n			<td>6.43 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Resolusi Layar</th>\r\n			<td>FHD+ 2400 x 1080 pixels, Super AMOLED</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"5\">Network</th>\r\n			<th>Tipe</th>\r\n			<td>2G , 3G , 4G (LTE)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>2G</th>\r\n			<td>GSM: 850/900/1800 / 1900MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>3G</th>\r\n			<td>WCDMA: Bands 1/5/8</td>\r\n		</tr>\r\n		<tr>\r\n			<th>4G (LTE)</th>\r\n			<td>FDD-LTE: Bands 1/3/5/7/8<br />\r\n			<br />\r\n			TD-LTE: Bands 38/40/41</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Speed</th>\r\n			<td>HSPA 42.2/5.76 Mbps, LTE-A</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"2\">Kamera</th>\r\n			<th>Kamera Belakang</th>\r\n			<td>48MP + 8MP + 2MP + 2MP</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kamera Depan</th>\r\n			<td>16MP + 2MP</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"1\">Lainnya</th>\r\n			<th>Fitur</th>\r\n			<td>Wi-Fi , Hotspot/Tethering , GPS , Bluetooth , Flash , Fingerprint Scanner , 3.5mm Headphone Jack , Quad Cameras</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"2\">Ukuran</th>\r\n			<th>Dimensi</th>\r\n			<td>160.1 x 73.8 x 7.5 mm (6.30 x 2.91 x 0.30 in)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Berat</th>\r\n			<td>164 g (5.78 oz)</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, '2021-02-26 10:40:07', '2021-02-26 11:04:13'),
(9, 'Vivo Y30', 'vivo-y30', 1, 9, 'Vivo', '2021-01-01', 2440000, 3000000, 560000, 3600000, 1160000, 4, 128, '1614336130_6038d082e3013.jpg', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"2\">Tipe</th>\r\n			<th>Tipe</th>\r\n			<td>Smartphone , Phablet , Camera Phone , Bezel-less Phone</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Shape</th>\r\n			<td>Bar</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"8\">Dasar</th>\r\n			<th>OS</th>\r\n			<td>Android</td>\r\n		</tr>\r\n		<tr>\r\n			<th>OS ver</th>\r\n			<td>Funtouch OS 10 (Android 10)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>SIM</th>\r\n			<td>Nano SIM , Single SIM , Dual SIM , Dual Standby</td>\r\n		</tr>\r\n		<tr>\r\n			<th>CPU</th>\r\n			<td>Mediatek MT6765 Helio P35 (12nm),<br />\r\n			Octa-core</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kecepatan CPU</th>\r\n			<td>4x 2.35GHz Cortex-A53 &amp; 4x 1.8GHz Cortex-A53</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Memori Internal</th>\r\n			<td>64GB , 128GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>RAM</th>\r\n			<td>4GB , 6GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Baterai</th>\r\n			<td>Non-removable, Li-Po 5.000 mAh<br />\r\n			Charging 10W</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"2\">Layar</th>\r\n			<th>Ukuran Layar</th>\r\n			<td>6.47 inches</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Resolusi Layar</th>\r\n			<td>HD+ 1560 x 720 pixels</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"5\">Network</th>\r\n			<th>Tipe</th>\r\n			<td>2G , 3G , 4G (LTE)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>2G</th>\r\n			<td>GSM B3/5/8</td>\r\n		</tr>\r\n		<tr>\r\n			<th>3G</th>\r\n			<td>WCDMA B1/5/8</td>\r\n		</tr>\r\n		<tr>\r\n			<th>4G (LTE)</th>\r\n			<td>FDD-LTE B1/3/5/8<br />\r\n			TDD-LTE B40</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Speed</th>\r\n			<td>HSPA 42.2/5.76 Mbps, LTE-A</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"2\">Kamera</th>\r\n			<th>Kamera Belakang</th>\r\n			<td>13MP + 8MP + 2MP + 2MP</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kamera Depan</th>\r\n			<td>8MP</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"1\">Lainnya</th>\r\n			<th>Fitur</th>\r\n			<td>Wi-Fi , Hotspot/Tethering , GPS , Bluetooth , Flash , Fingerprint Scanner , 3.5mm Headphone Jack , Quad Cameras</td>\r\n		</tr>\r\n		<tr>\r\n			<th rowspan=\"2\">Ukuran</th>\r\n			<th>Dimensi</th>\r\n			<td>162.04 &times; 76.46 &times; 9.11mm</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Berat</th>\r\n			<td>197 g</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, '2021-02-26 10:42:10', '2021-02-26 11:08:41'),
(10, 'Oppo F11', 'oppo-f11', 1, 38, 'Oppo', '2021-01-05', 2624000, 3000000, 376000, 3600000, 976000, 4, 128, '1614336384_6038d180df0e2.jpg', '<h3>Spesifikasi OPPO F11</h3>\r\n\r\n<ul>\r\n	<li>Chipset: Mediatek MT6771 Helio P70 (12nm)</li>\r\n	<li>RAM: 4GB, memori 128GB</li>\r\n	<li>OS: Android 9.0 (Pie); ColorOS 6.</li>\r\n	<li>Ukuran HP: 161.3 x 76.1 x 8.8mm, 190 gram</li>\r\n	<li>Ukuran layar: 6.5 inci, 1080 x 2340 piksel</li>\r\n	<li>Kamera depan: 16MP</li>\r\n	<li>Kamera belakang: Dual camera, 48+5MP</li>\r\n	<li>Baterai: 4000 mAh</li>\r\n</ul>', 1, '2021-02-26 10:46:24', '2021-02-26 11:11:09'),
(11, 'Oppo Reno 4', 'oppo-reno-4', 1, 47, 'Oppo', '2021-01-12', 4100000, 5000000, 900000, 6000000, 1900000, 8, 128, '1614336542_6038d21e8914d.jpg', '<h3>Spesifikasi OPPO Reno4</h3>\r\n\r\n<ul>\r\n	<li>Rilis: Agustus 2020</li>\r\n	<li>Chipset: Qualcomm SM7125 Snapdragon 720G (8 nm)</li>\r\n	<li>RAM: 8GB</li>\r\n	<li>Memori internal: 128GB</li>\r\n	<li>Ukuran HP: 160.3 x 73.9 x 7.7 mm</li>\r\n	<li>Berat HP: 165 gram</li>\r\n	<li>Ukuran layar: 6.4 inci, 1080 x 2400 pixels</li>\r\n	<li>Kamera depan: 32MP</li>\r\n	<li>Kamera belakang: Quad camera, 48MP+8MP+2MP+2MP</li>\r\n	<li>Baterai: Li-Po 4015 mAh, fast charging 30W, VOOC 4.0</li>\r\n</ul>', 1, '2021-02-26 10:49:02', '2021-02-26 11:12:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Handphone', 1, '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(2, 'Televisi', 1, '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(3, 'Laptop', 1, '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(4, 'Speaker', 1, '2021-02-25 14:11:41', '2021-02-25 14:11:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_15_034155_create_kategori_table', 1),
(5, '2020_10_15_034304_create_suppliers_table', 1),
(6, '2020_10_15_034717_create_barang_table', 1),
(7, '2020_10_15_042414_create_pelanggan_table', 1),
(8, '2020_10_15_042733_create_permission_tables', 1),
(9, '2020_10_15_042806_create_profile_users_table', 1),
(10, '2021_01_13_165059_create_transaksi_table', 1),
(11, '2021_01_13_165229_create_pembayaran_kredit_table', 1),
(12, '2021_01_13_165244_create_pembayaran_cash_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 2),
(4, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `user_id`, `nama`, `slug`, `nik`, `jk`, `no_hp`, `alamat`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Jama', 'jama', '84145116', 'Laki-laki', '(+62) 440 2542 5344', 'Ds. Uluwatu No. 146, Pasuruan 80049, KepR', '', 1, '2021-02-26 09:39:18', '2021-02-26 09:42:44'),
(2, NULL, 'Emung', 'emung', '17939768', 'Laki-laki', '0299 1376 018', 'Jln. Bakti No. 303, Pontianak 92104, JaBar', '', 1, '2021-02-26 09:40:57', '2021-02-26 09:47:38'),
(3, NULL, 'Aris', 'aris', '61347243', 'Laki-laki', '(+62) 623 1716 184', 'Psr. Ahmad Dahlan No. 179, Cimahi 92784, KepR', '', 1, '2021-02-26 09:41:23', '2021-02-26 09:49:57'),
(4, NULL, 'Atep', 'atep', '85041981', 'Laki-laki', '0743 1224 8976', 'Gg. Raya Ujungberung No. 36, Balikpapan 69841, MalUt', '', 1, '2021-02-26 09:41:35', '2021-02-26 10:50:22'),
(5, NULL, 'Ipeng', 'ipeng', '94796216', 'Laki-laki', '0971 1800 4427', 'Jln. Pelajar Pejuang 45 No. 851, Pangkal Pinang 40003, DIY', '', 1, '2021-02-26 10:26:16', '2021-02-26 10:57:39'),
(6, NULL, 'Feri', 'feri', '74018796', 'Laki-laki', '0288 7059 571', 'Gg. Sukajadi No. 180, Semarang 30038, DKI', '', 1, '2021-02-26 10:26:29', '2021-02-26 10:58:50'),
(7, NULL, 'Wisnu', 'wisnu', '79782661', 'Laki-laki', '(+62) 321 8921 350', 'Jr. Setia Budi No. 279, Sorong 13874, Maluku', '', 1, '2021-02-26 10:26:45', '2021-02-26 11:01:45'),
(8, NULL, 'Eki', 'eki', '09746831', 'Laki-laki', '(+62) 491 2120 6970', 'Ki. Elang No. 638, Parepare 97363, PapBar', '', 1, '2021-02-26 10:26:55', '2021-02-26 11:04:14'),
(9, NULL, 'Nurdin', 'nurdin', '13938741', 'Laki-laki', '(+62) 422 2003 3569', 'Gg. Industri No. 297, Sabang 86382, NTT', '', 1, '2021-02-26 10:27:05', '2021-02-26 11:08:41'),
(10, NULL, 'Ade Truk', 'ade-truk', '34042045', 'Laki-laki', '(+62) 969 7296 321', 'Psr. Bagis Utama No. 600, Padangsidempuan 65873, Banten', '', 1, '2021-02-26 10:27:27', '2021-02-26 11:11:09'),
(11, NULL, 'Kirun', 'kirun', '52016578', 'Laki-laki', '0303 4385 315', 'Jr. Jend. A. Yani No. 795, Banjarbaru 61851, SulSel', '', 1, '2021-02-26 10:27:37', '2021-02-26 11:12:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_cash`
--

CREATE TABLE `pembayaran_cash` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_kredit`
--

CREATE TABLE `pembayaran_kredit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `sisa` bigint(20) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran_kredit`
--

INSERT INTO `pembayaran_kredit` (`id`, `admin`, `transaksi_id`, `no_pembayaran`, `tanggal_bayar`, `bayar`, `sisa`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'PKR010221', 'KRD010221', '2020-12-05', 250000, 3050000, '<p>Pembayaran pertama</p>', 0, '2021-02-26 09:42:44', '2021-02-26 09:42:44'),
(2, 1, 'PKR010221', 'KRD020221', '2020-12-12', 250000, 2800000, NULL, 0, '2021-02-26 09:43:01', '2021-02-26 09:43:01'),
(3, 1, 'PKR010221', 'KRD030221', '2020-12-19', 250000, 2550000, NULL, 0, '2021-02-26 09:43:18', '2021-02-26 09:43:18'),
(4, 1, 'PKR010221', 'KRD040221', '2020-12-26', 250000, 2300000, NULL, 0, '2021-02-26 09:43:39', '2021-02-26 09:43:39'),
(5, 1, 'PKR010221', 'KRD050221', '2021-01-02', 250000, 2050000, NULL, 0, '2021-02-26 09:43:52', '2021-02-26 09:43:52'),
(6, 1, 'PKR010221', 'KRD060221', '2021-01-09', 250000, 1800000, NULL, 0, '2021-02-26 09:44:10', '2021-02-26 09:44:10'),
(7, 1, 'PKR010221', 'KRD070221', '2021-01-16', 250000, 1550000, NULL, 0, '2021-02-26 09:44:24', '2021-02-26 09:44:24'),
(8, 1, 'PKR010221', 'KRD080221', '2021-01-23', 250000, 1300000, NULL, 0, '2021-02-26 09:44:36', '2021-02-26 09:44:36'),
(9, 1, 'PKR010221', 'KRD090221', '2021-01-30', 250000, 1050000, NULL, 0, '2021-02-26 09:44:55', '2021-02-26 09:44:55'),
(10, 1, 'PKR010221', 'KRD0100221', '2021-02-07', 250000, 800000, NULL, 0, '2021-02-26 09:45:07', '2021-02-26 09:45:07'),
(11, 1, 'PKR010221', 'KRD0110221', '2021-02-13', 250000, 550000, NULL, 0, '2021-02-26 09:45:18', '2021-02-26 09:45:18'),
(12, 1, 'PKR020221', 'KRD0120221', '2021-01-02', 200000, 2200000, NULL, 0, '2021-02-26 09:47:37', '2021-02-26 09:47:37'),
(13, 1, 'PKR020221', 'KRD0130221', '2021-01-09', 200000, 2000000, NULL, 0, '2021-02-26 09:47:53', '2021-02-26 09:47:53'),
(14, 1, 'PKR020221', 'KRD0140221', '2021-01-16', 200000, 1800000, NULL, 0, '2021-02-26 09:48:05', '2021-02-26 09:48:05'),
(15, 1, 'PKR020221', 'KRD0150221', '2021-01-23', 200000, 1600000, NULL, 0, '2021-02-26 09:48:22', '2021-02-26 09:48:22'),
(16, 1, 'PKR020221', 'KRD0160221', '2021-01-30', 200000, 1400000, NULL, 0, '2021-02-26 09:48:37', '2021-02-26 09:48:37'),
(17, 1, 'PKR020221', 'KRD0170221', '2021-02-07', 200000, 1200000, NULL, 0, '2021-02-26 09:48:52', '2021-02-26 09:48:52'),
(18, 1, 'PKR020221', 'KRD0180221', '2021-02-13', 200000, 1000000, NULL, 0, '2021-02-26 09:49:07', '2021-02-26 09:49:07'),
(19, 1, 'PKR030221', 'KRD0190221', '2020-12-19', 250000, 2250000, NULL, 0, '2021-02-26 09:49:56', '2021-02-26 09:49:56'),
(20, 1, 'PKR030221', 'KRD0200221', '2020-12-26', 250000, 2000000, NULL, 0, '2021-02-26 09:50:33', '2021-02-26 09:50:33'),
(21, 1, 'PKR030221', 'KRD0210221', '2021-01-02', 250000, 1750000, NULL, 0, '2021-02-26 09:50:46', '2021-02-26 09:50:46'),
(22, 1, 'PKR030221', 'KRD0220221', '2021-01-09', 250000, 1500000, NULL, 0, '2021-02-26 09:50:56', '2021-02-26 09:50:56'),
(23, 1, 'PKR030221', 'KRD0230221', '2021-01-16', 250000, 1250000, NULL, 0, '2021-02-26 09:51:11', '2021-02-26 09:51:11'),
(24, 1, 'PKR030221', 'KRD0240221', '2021-01-23', 250000, 1000000, NULL, 0, '2021-02-26 09:51:22', '2021-02-26 09:51:22'),
(25, 1, 'PKR030221', 'KRD0250221', '2021-01-30', 250000, 750000, NULL, 0, '2021-02-26 09:51:32', '2021-02-26 09:51:32'),
(26, 1, 'PKR040221', 'KRD0260221', '2020-11-14', 200000, 2900000, NULL, 0, '2021-02-26 10:50:21', '2021-02-26 10:50:21'),
(27, 1, 'PKR040221', 'KRD0270221', '2020-11-21', 200000, 2700000, NULL, 0, '2021-02-26 10:50:39', '2021-02-26 10:50:39'),
(28, 1, 'PKR040221', 'KRD0280221', '2020-11-28', 200000, 2500000, NULL, 0, '2021-02-26 10:50:50', '2021-02-26 10:50:50'),
(29, 1, 'PKR040221', 'KRD0290221', '2020-12-12', 200000, 2300000, NULL, 0, '2021-02-26 10:51:07', '2021-02-26 10:51:07'),
(30, 1, 'PKR040221', 'KRD0300221', '2020-12-19', 200000, 2100000, NULL, 0, '2021-02-26 10:51:19', '2021-02-26 10:51:19'),
(31, 1, 'PKR040221', 'KRD0310221', '2021-01-09', 200000, 1900000, NULL, 0, '2021-02-26 10:51:32', '2021-02-26 10:51:32'),
(32, 1, 'PKR040221', 'KRD0320221', '2021-01-16', 200000, 1700000, NULL, 0, '2021-02-26 10:51:42', '2021-02-26 10:51:42'),
(33, 1, 'PKR040221', 'KRD0330221', '2021-01-23', 200000, 1500000, NULL, 0, '2021-02-26 10:51:54', '2021-02-26 10:51:54'),
(34, 1, 'PKR040221', 'KRD0340221', '2021-01-30', 200000, 1300000, NULL, 0, '2021-02-26 10:52:07', '2021-02-26 10:52:07'),
(35, 1, 'PKR040221', 'KRD0350221', '2021-02-07', 200000, 1100000, NULL, 0, '2021-02-26 10:52:40', '2021-02-26 10:52:40'),
(36, 1, 'PKR040221', 'KRD0360221', '2021-02-13', 200000, 900000, NULL, 0, '2021-02-26 10:52:51', '2021-02-26 10:52:51'),
(37, 1, 'PKR040221', 'KRD0370221', '2021-02-20', 200000, 700000, NULL, 0, '2021-02-26 10:53:01', '2021-02-26 10:53:01'),
(38, 1, 'PKR040221', 'KRD0380221', '2020-12-26', 200000, 500000, NULL, 0, '2021-02-26 10:54:40', '2021-02-26 10:54:40'),
(39, 1, 'PKR050221', 'KRD0390221', '2020-12-19', 200000, 2900000, NULL, 0, '2021-02-26 10:57:38', '2021-02-26 10:57:38'),
(40, 1, 'PKR050221', 'KRD0400221', '2020-12-26', 250000, 2650000, NULL, 0, '2021-02-26 10:57:54', '2021-02-26 10:57:54'),
(41, 1, 'PKR050221', 'KRD0410221', '2021-01-02', 250000, 2400000, NULL, 0, '2021-02-26 10:58:05', '2021-02-26 10:58:05'),
(42, 1, 'PKR060221', 'KRD0420221', '2020-12-05', 250000, 2050000, NULL, 0, '2021-02-26 10:58:49', '2021-02-26 10:58:49'),
(43, 1, 'PKR060221', 'KRD0430221', '2020-12-12', 250000, 1800000, NULL, 0, '2021-02-26 10:59:01', '2021-02-26 10:59:01'),
(44, 1, 'PKR060221', 'KRD0440221', '2020-12-19', 250000, 1550000, NULL, 0, '2021-02-26 10:59:16', '2021-02-26 10:59:16'),
(45, 1, 'PKR060221', 'KRD0450221', '2020-12-26', 250000, 1300000, NULL, 0, '2021-02-26 10:59:33', '2021-02-26 10:59:33'),
(46, 1, 'PKR060221', 'KRD0460221', '2021-01-02', 250000, 1050000, NULL, 0, '2021-02-26 10:59:45', '2021-02-26 10:59:45'),
(47, 1, 'PKR060221', 'KRD0470221', '2021-01-09', 250000, 800000, NULL, 0, '2021-02-26 10:59:57', '2021-02-26 10:59:57'),
(48, 1, 'PKR060221', 'KRD0480221', '2021-01-16', 250000, 550000, NULL, 0, '2021-02-26 11:00:08', '2021-02-26 11:00:08'),
(49, 1, 'PKR070221', 'KRD0490221', '2020-12-19', 200000, 4800000, NULL, 0, '2021-02-26 11:01:44', '2021-02-26 11:01:44'),
(50, 1, 'PKR070221', 'KRD0500221', '2020-12-26', 300000, 4500000, NULL, 0, '2021-02-26 11:02:04', '2021-02-26 11:02:04'),
(51, 1, 'PKR070221', 'KRD0510221', '2021-01-01', 250000, 4250000, NULL, 0, '2021-02-26 11:02:21', '2021-02-26 11:02:21'),
(52, 1, 'PKR070221', 'KRD0520221', '2021-01-09', 250000, 4000000, NULL, 0, '2021-02-26 11:02:32', '2021-02-26 11:02:32'),
(53, 1, 'PKR070221', 'KRD0530221', '2021-01-16', 250000, 3750000, NULL, 0, '2021-02-26 11:02:56', '2021-02-26 11:02:56'),
(54, 1, 'PKR070221', 'KRD0540221', '2021-01-23', 250000, 3500000, NULL, 0, '2021-02-26 11:03:12', '2021-02-26 11:03:12'),
(55, 1, 'PKR070221', 'KRD0550221', '2021-01-30', 250000, 3250000, NULL, 0, '2021-02-26 11:03:24', '2021-02-26 11:03:24'),
(56, 1, 'PKR070221', 'KRD0560221', '2021-02-13', 250000, 3000000, NULL, 0, '2021-02-26 11:03:35', '2021-02-26 11:03:35'),
(57, 1, 'PKR080221', 'KRD0570221', '2020-11-21', 250000, 4750000, NULL, 0, '2021-02-26 11:04:13', '2021-02-26 11:04:13'),
(58, 1, 'PKR080221', 'KRD0580221', '2020-11-28', 250000, 4500000, NULL, 0, '2021-02-26 11:04:27', '2021-02-26 11:04:27'),
(59, 1, 'PKR080221', 'KRD0590221', '2020-12-05', 250000, 4250000, NULL, 0, '2021-02-26 11:04:37', '2021-02-26 11:04:37'),
(60, 1, 'PKR080221', 'KRD0600221', '2020-12-12', 250000, 4000000, NULL, 0, '2021-02-26 11:04:49', '2021-02-26 11:04:49'),
(61, 1, 'PKR080221', 'KRD0610221', '2020-12-19', 250000, 3750000, NULL, 0, '2021-02-26 11:05:02', '2021-02-26 11:05:02'),
(62, 1, 'PKR080221', 'KRD0620221', '2020-12-26', 250000, 3500000, NULL, 0, '2021-02-26 11:05:16', '2021-02-26 11:05:16'),
(63, 1, 'PKR080221', 'KRD0630221', '2021-01-02', 250000, 3250000, NULL, 0, '2021-02-26 11:05:26', '2021-02-26 11:05:26'),
(64, 1, 'PKR080221', 'KRD0640221', '2021-01-09', 250000, 3000000, NULL, 0, '2021-02-26 11:05:38', '2021-02-26 11:05:38'),
(65, 1, 'PKR080221', 'KRD0650221', '2021-01-16', 250000, 2750000, NULL, 0, '2021-02-26 11:05:53', '2021-02-26 11:05:53'),
(66, 1, 'PKR080221', 'KRD0660221', '2021-01-23', 250000, 2500000, NULL, 0, '2021-02-26 11:06:09', '2021-02-26 11:06:09'),
(67, 1, 'PKR080221', 'KRD0670221', '2021-01-30', 250000, 2250000, NULL, 0, '2021-02-26 11:06:19', '2021-02-26 11:06:19'),
(68, 1, 'PKR080221', 'KRD0680221', '2021-02-07', 250000, 2000000, NULL, 0, '2021-02-26 11:06:32', '2021-02-26 11:06:32'),
(69, 1, 'PKR080221', 'KRD0690221', '2021-02-13', 250000, 1750000, NULL, 0, '2021-02-26 11:06:41', '2021-02-26 11:06:41'),
(70, 1, 'PKR080221', 'KRD0700221', '2021-02-20', 250000, 1500000, NULL, 0, '2021-02-26 11:06:51', '2021-02-26 11:06:51'),
(71, 1, 'PKR090221', 'KRD0710221', '2021-01-02', 250000, 3350000, NULL, 0, '2021-02-26 11:08:41', '2021-02-26 11:08:41'),
(72, 1, 'PKR090221', 'KRD0720221', '2021-01-09', 250000, 3100000, NULL, 0, '2021-02-26 11:08:52', '2021-02-26 11:08:52'),
(73, 1, 'PKR090221', 'KRD0730221', '2021-01-16', 250000, 2850000, NULL, 0, '2021-02-26 11:09:04', '2021-02-26 11:09:04'),
(74, 1, 'PKR090221', 'KRD0740221', '2021-01-23', 250000, 2600000, NULL, 0, '2021-02-26 11:09:19', '2021-02-26 11:09:19'),
(75, 1, 'PKR090221', 'KRD0750221', '2021-01-30', 250000, 2350000, NULL, 0, '2021-02-26 11:09:32', '2021-02-26 11:09:32'),
(76, 1, 'PKR090221', 'KRD0760221', '2021-02-07', 250000, 2100000, NULL, 0, '2021-02-26 11:09:44', '2021-02-26 11:09:44'),
(77, 1, 'PKR090221', 'KRD0770221', '2021-02-13', 250000, 1850000, NULL, 0, '2021-02-26 11:09:55', '2021-02-26 11:09:55'),
(78, 1, 'PKR0100221', 'KRD0780221', '2021-01-09', 250000, 3350000, NULL, 0, '2021-02-26 11:11:09', '2021-02-26 11:11:09'),
(79, 1, 'PKR0100221', 'KRD0790221', '2021-01-16', 250000, 3100000, NULL, 0, '2021-02-26 11:11:20', '2021-02-26 11:11:20'),
(80, 1, 'PKR0100221', 'KRD0800221', '2021-01-23', 250000, 2850000, NULL, 0, '2021-02-26 11:11:30', '2021-02-26 11:11:30'),
(81, 1, 'PKR0100221', 'KRD0810221', '2021-01-30', 250000, 2600000, NULL, 0, '2021-02-26 11:11:40', '2021-02-26 11:11:40'),
(82, 1, 'PKR0100221', 'KRD0820221', '2021-02-07', 250000, 2350000, NULL, 0, '2021-02-26 11:11:50', '2021-02-26 11:11:50'),
(83, 1, 'PKR0110221', 'KRD0830221', '2021-01-12', 2000000, 4000000, NULL, 0, '2021-02-26 11:12:38', '2021-02-26 11:12:38'),
(84, 1, 'PKR0110221', 'KRD0840221', '2021-01-16', 500000, 3500000, NULL, 0, '2021-02-26 11:12:57', '2021-02-26 11:12:57'),
(85, 1, 'PKR0110221', 'KRD0850221', '2021-01-25', 500000, 3000000, NULL, 0, '2021-02-26 11:13:10', '2021-02-26 11:13:10'),
(86, 1, 'PKR0110221', 'KRD0860221', '2021-01-31', 500000, 2500000, NULL, 0, '2021-02-26 11:13:21', '2021-02-26 11:13:21'),
(87, 1, 'PKR0110221', 'KRD0870221', '2021-02-07', 500000, 2000000, NULL, 0, '2021-02-26 11:13:39', '2021-02-26 11:13:39'),
(88, 1, 'PKR0110221', 'KRD0880221', '2021-02-13', 500000, 1500000, NULL, 0, '2021-02-26 11:13:50', '2021-02-26 11:13:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'full-permission', 'web', '2021-02-25 14:11:42', '2021-02-25 14:11:42'),
(2, 'create', 'web', '2021-02-25 14:11:42', '2021-02-25 14:11:42'),
(3, 'read', 'web', '2021-02-25 14:11:42', '2021-02-25 14:11:42'),
(4, 'update', 'web', '2021-02-25 14:11:42', '2021-02-25 14:11:42'),
(5, 'delete', 'web', '2021-02-25 14:11:42', '2021-02-25 14:11:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_users`
--

CREATE TABLE `profile_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profile_users`
--

INSERT INTO `profile_users` (`id`, `user_id`, `no_hp`, `alamat`, `ig`, `fb`, `website`, `github`, `bio`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25 14:13:24', '2021-02-25 14:13:24'),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-25 14:14:05', '2021-02-25 14:14:05'),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-26 12:00:21', '2021-02-26 12:00:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(2, 'admin', 'web', '2021-02-25 14:11:42', '2021-02-25 14:11:42'),
(3, 'pelanggan', 'web', '2021-02-25 14:11:42', '2021-02-25 14:11:42'),
(4, 'user', 'web', '2021-02-25 14:11:42', '2021-02-25 14:11:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aplikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama`, `no_hp`, `aplikasi`, `alamat`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PD Tamba (Persero) Tbk', '0895 6765 5331', 'JD ID', 'Dk. Sumpah Pemuda No. 14, Banjarbaru 40058, Banten', 0, '2021-02-25 14:11:37', '2021-02-25 14:11:37'),
(2, 'PD Hariyah Rahayu Tbk', '020 0819 189', 'Shopee', 'Ds. Achmad No. 240, Pekanbaru 97423, NTB', 1, '2021-02-25 14:11:37', '2021-02-25 14:11:37'),
(3, 'PD Puspasari Wijayanti (Persero) Tbk', '(+62) 876 5289 4906', 'Tokopedia', 'Ds. Yos Sudarso No. 616, Samarinda 30713, KalSel', 1, '2021-02-25 14:11:37', '2021-02-25 14:11:37'),
(4, 'PT Utami Tbk', '0813 6622 1990', 'Shopee', 'Ds. Babah No. 29, Malang 18757, KalTim', 1, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(5, 'PD Wahyudin (Persero) Tbk', '0288 1192 688', 'Offline', 'Psr. Warga No. 770, Lubuklinggau 94568, KalTeng', 0, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(6, 'CV Haryanto (Persero) Tbk', '(+62) 953 1835 8448', 'Offline', 'Ki. Gedebage Selatan No. 590, Tanjungbalai 27857, KalBar', 0, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(7, 'UD Hakim Wasita (Persero) Tbk', '(+62) 479 1262 639', 'Lazada', 'Ds. Ciumbuleuit No. 789, Palopo 15065, Riau', 0, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(8, 'Perum Thamrin Nashiruddin (Persero) Tbk', '(+62) 619 5984 005', 'Offline', 'Jr. Jaksa No. 359, Palangka Raya 91178, PapBar', 0, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(9, 'PT Gunawan Waskita', '(+62) 966 6760 422', 'Tokopedia', 'Kpg. Suprapto No. 857, Batu 82217, BaBel', 1, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(10, 'CV Hariyah', '(+62) 543 6131 5052', 'Shopee', 'Jr. Uluwatu No. 407, Gorontalo 83201, KalTim', 0, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(11, 'Perum Usada Handayani (Persero) Tbk', '028 5079 115', 'Shopee', 'Ds. Supomo No. 455, Banjarmasin 21125, DKI', 1, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(12, 'Perum Kusumo Nasyiah', '(+62) 420 2984 6664', 'Bukalapak', 'Ki. Bayam No. 851, Padangpanjang 92564, Jambi', 1, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(13, 'PT Simanjuntak Mandasari', '(+62) 718 3016 6746', 'Lazada', 'Gg. Siliwangi No. 641, Batam 76726, SumSel', 0, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(14, 'UD Prastuti Riyanti Tbk', '(+62) 383 2015 9348', 'Bukalapak', 'Gg. Baiduri No. 873, Serang 47999, Papua', 0, '2021-02-25 14:11:38', '2021-02-25 14:11:38'),
(15, 'PD Lestari Lailasari Tbk', '(+62) 778 1398 7058', 'Shopee', 'Psr. Adisucipto No. 519, Lubuklinggau 76738, SumBar', 0, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(16, 'CV Mandasari Padmasari', '0904 0809 195', 'Tokopedia', 'Gg. Rajawali Barat No. 262, Pontianak 73215, JaTim', 1, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(17, 'CV Marpaung Purnawati', '0804 385 620', 'Lazada', 'Jln. Soekarno Hatta No. 536, Sungai Penuh 52085, BaBel', 1, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(18, 'UD Mandasari', '0791 0035 093', 'Bukalapak', 'Jr. Cikutra Barat No. 554, Pekanbaru 73085, PapBar', 1, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(19, 'PT Susanti', '(+62) 328 7539 7623', 'JD ID', 'Jln. Abdul No. 760, Mataram 97725, SulTra', 0, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(20, 'PD Puspasari Tbk', '0537 8069 090', 'Shopee', 'Jln. Qrisdoren No. 664, Bitung 61347, SulSel', 0, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(21, 'Perum Siregar Marpaung', '(+62) 228 0347 127', 'JD ID', 'Ds. Babadak No. 366, Palu 80328, Banten', 0, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(22, 'Perum Samosir', '(+62) 633 8238 510', 'Bukalapak', 'Ki. Pahlawan No. 900, Padangpanjang 22559, Jambi', 0, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(23, 'Perum Pratama', '(+62) 287 5709 2657', 'Blibli', 'Dk. Pacuan Kuda No. 730, Pematangsiantar 20032, KalTim', 1, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(24, 'UD Tarihoran Zulaika Tbk', '(+62) 859 733 880', 'Tokopedia', 'Kpg. Barasak No. 105, Denpasar 20644, Bengkulu', 1, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(25, 'UD Mulyani Mulyani', '0951 4074 220', 'Lazada', 'Gg. Pasteur No. 361, Banda Aceh 52646, SulTra', 1, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(26, 'PT Wacana Pangestu', '0879 0032 648', 'JD ID', 'Ki. Kartini No. 148, Tomohon 51523, Bengkulu', 0, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(27, 'Perum Tamba Rajata Tbk', '(+62) 478 5780 477', 'Lazada', 'Ki. Sugiyopranoto No. 626, Pekalongan 56523, MalUt', 0, '2021-02-25 14:11:39', '2021-02-25 14:11:39'),
(28, 'Perum Kuswoyo Widodo (Persero) Tbk', '(+62) 769 7011 3717', 'Blibli', 'Jln. Basudewo No. 922, Tangerang 48175, Lampung', 0, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(29, 'PT Adriansyah Permadi', '0848 022 445', 'JD ID', 'Dk. Urip Sumoharjo No. 45, Tarakan 93411, Lampung', 0, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(30, 'PT Budiyanto Tbk', '0731 5154 3792', 'Lazada', 'Ki. Rajiman No. 975, Madiun 35984, NTT', 1, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(31, 'UD Zulaika Putra', '0749 2267 2710', 'Blibli', 'Gg. Industri No. 282, Gunungsitoli 58973, JaBar', 1, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(32, 'CV Suartini (Persero) Tbk', '0714 2001 8790', 'Shopee', 'Kpg. Jagakarsa No. 170, Ambon 72945, DIY', 1, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(33, 'PD Prayoga Ramadan', '0826 6648 5091', 'Lazada', 'Ds. Rajawali No. 705, Banjar 91677, Riau', 1, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(34, 'CV Najmudin Laksita', '(+62) 561 0994 8108', 'Blibli', 'Ds. Orang No. 886, Pasuruan 50077, Jambi', 1, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(35, 'UD Simanjuntak Wijaya (Persero) Tbk', '020 4261 6236', 'Shopee', 'Ds. Pelajar Pejuang 45 No. 331, Palembang 91944, KalUt', 0, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(36, 'PT Novitasari Tbk', '(+62) 366 7867 5226', 'Tokopedia', 'Gg. Gajah Mada No. 364, Depok 11336, Papua', 1, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(37, 'PD Sihotang Tbk', '(+62) 206 1584 6130', 'Shopee', 'Ki. Agus Salim No. 781, Cimahi 31646, Gorontalo', 1, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(38, 'PT Prastuti', '0456 2396 6640', 'Offline', 'Gg. Dipenogoro No. 551, Samarinda 40163, SumSel', 0, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(39, 'Perum Waluyo', '(+62) 494 9990 9347', 'Tokopedia', 'Jln. Sukajadi No. 362, Surakarta 29726, JaTeng', 1, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(40, 'Perum Aryani Astuti', '0578 8757 5547', 'Lazada', 'Gg. Cemara No. 709, Bukittinggi 51693, SumBar', 0, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(41, 'CV Pradipta (Persero) Tbk', '(+62) 902 6506 813', 'JD ID', 'Gg. Gajah No. 172, Banjar 60727, KalTim', 0, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(42, 'Perum Suartini', '0826 9535 675', 'JD ID', 'Jln. Barasak No. 67, Padang 37500, MalUt', 0, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(43, 'Perum Maryati', '0995 6934 017', 'Lazada', 'Jr. B.Agam Dlm No. 462, Pekalongan 91586, JaBar', 1, '2021-02-25 14:11:40', '2021-02-25 14:11:40'),
(44, 'UD Hidayanto Najmudin Tbk', '(+62) 881 493 849', 'Lazada', 'Ki. Hasanuddin No. 554, Langsa 83048, JaTeng', 0, '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(45, 'PT Prastuti Sinaga (Persero) Tbk', '0884 8299 501', 'Blibli', 'Jln. Sukajadi No. 421, Gunungsitoli 92177, KepR', 0, '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(46, 'UD Samosir Hariyah (Persero) Tbk', '0816 6685 4236', 'Lazada', 'Jln. Cemara No. 843, Medan 86962, Lampung', 0, '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(47, 'PT Dabukke Wahyuni', '(+62) 793 7331 895', 'Offline', 'Kpg. Abdul No. 437, Samarinda 71048, Jambi', 1, '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(48, 'UD Mangunsong Mandasari', '(+62) 354 4407 2225', 'Offline', 'Psr. Jend. A. Yani No. 728, Depok 69539, PapBar', 1, '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(49, 'Perum Hidayat Yulianti', '0846 7836 734', 'JD ID', 'Jr. Pelajar Pejuang 45 No. 801, Tarakan 14623, SumUt', 1, '2021-02-25 14:11:41', '2021-02-25 14:11:41'),
(50, 'PD Tampubolon (Persero) Tbk', '0743 9407 300', 'Blibli', 'Jln. Camar No. 242, Sabang 97271, SumUt', 0, '2021-02-25 14:11:41', '2021-02-25 14:11:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_pembayaran` enum('cash','kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `qty` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `dibayar` bigint(20) DEFAULT NULL,
  `sisa` bigint(20) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `admin`, `pelanggan_id`, `barang_id`, `jenis_pembayaran`, `tanggal_transaksi`, `qty`, `total_harga`, `dibayar`, `sisa`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
('PKR0100221', 1, 10, 10, 'kredit', '2021-01-09', 1, 3600000, 1250000, 2350000, NULL, 0, '2021-02-26 11:11:09', '2021-02-26 11:11:50'),
('PKR010221', 1, 1, 1, 'kredit', '2020-12-05', 1, 3300000, 2750000, 550000, '<p>Pembayaran pertama</p>', 0, '2021-02-26 09:42:43', '2021-02-26 09:45:18'),
('PKR0110221', 1, 11, 11, 'kredit', '2021-01-12', 1, 6000000, 4500000, 1500000, NULL, 0, '2021-02-26 11:12:38', '2021-02-26 11:13:50'),
('PKR020221', 1, 2, 2, 'kredit', '2021-01-02', 1, 2400000, 1400000, 1000000, NULL, 0, '2021-02-26 09:47:37', '2021-02-26 09:49:07'),
('PKR030221', 1, 3, 3, 'kredit', '2020-12-19', 1, 2500000, 1750000, 750000, NULL, 0, '2021-02-26 09:49:56', '2021-02-26 09:51:33'),
('PKR040221', 1, 4, 4, 'kredit', '2020-11-14', 1, 3100000, 2600000, 500000, NULL, 0, '2021-02-26 10:50:21', '2021-02-26 10:54:41'),
('PKR050221', 1, 5, 5, 'kredit', '2020-12-19', 1, 3100000, 700000, 2400000, NULL, 0, '2021-02-26 10:57:38', '2021-02-26 10:58:06'),
('PKR060221', 1, 6, 6, 'kredit', '2020-12-05', 1, 2300000, 1750000, 550000, NULL, 0, '2021-02-26 10:58:49', '2021-02-26 11:00:08'),
('PKR070221', 1, 7, 7, 'kredit', '2020-12-19', 1, 5000000, 2000000, 3000000, NULL, 0, '2021-02-26 11:01:44', '2021-02-26 11:03:35'),
('PKR080221', 1, 8, 8, 'kredit', '2020-11-21', 1, 5000000, 3500000, 1500000, NULL, 0, '2021-02-26 11:04:13', '2021-02-26 11:06:51'),
('PKR090221', 1, 9, 9, 'kredit', '2021-01-02', 1, 3600000, 1750000, 1850000, NULL, 0, '2021-02-26 11:08:41', '2021-02-26 11:09:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `foto`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ardi', 'ardi', 'ardizariat@gmail.com', NULL, '$2y$10$a5lp/hXf.mzZftuCP6lyMuD8lwCH6Jw1GMt.vjWRSPfpkCEIpvn0a', NULL, NULL, NULL, '2021-02-25 14:13:24', '2021-02-25 14:13:24'),
(2, 'Admin', 'admin', 'admin@abuzaid.com', NULL, '$2y$10$D.ijltaQfrUUJrh2tcm.oeBw8YjI2sR94DSHKVroE41C57P23riL2', NULL, NULL, NULL, '2021-02-25 14:14:05', '2021-02-25 14:14:05'),
(3, 'Jama', 'jama', 'jama@abuzaid.com', NULL, '$2y$10$2loK7EdlIo24jMnbWhl/7OlsuOy27nPISvfWE.aDOYhnJmOoVeQRG', NULL, NULL, NULL, '2021-02-26 12:00:20', '2021-02-26 12:00:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barang_slug_unique` (`slug`),
  ADD KEY `barang_kategori_id_foreign` (`kategori_id`),
  ADD KEY `barang_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pelanggan_nik_unique` (`nik`),
  ADD KEY `pelanggan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `pembayaran_cash`
--
ALTER TABLE `pembayaran_cash`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembayaran_cash_no_pembayaran_unique` (`no_pembayaran`),
  ADD KEY `pembayaran_cash_admin_foreign` (`admin`),
  ADD KEY `pembayaran_cash_transaksi_id_foreign` (`transaksi_id`);

--
-- Indeks untuk tabel `pembayaran_kredit`
--
ALTER TABLE `pembayaran_kredit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembayaran_kredit_no_pembayaran_unique` (`no_pembayaran`),
  ADD KEY `pembayaran_kredit_admin_foreign` (`admin`),
  ADD KEY `pembayaran_kredit_transaksi_id_foreign` (`transaksi_id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile_users`
--
ALTER TABLE `profile_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_users_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksi_id_unique` (`id`),
  ADD KEY `transaksi_admin_foreign` (`admin`),
  ADD KEY `transaksi_pelanggan_id_foreign` (`pelanggan_id`),
  ADD KEY `transaksi_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_cash`
--
ALTER TABLE `pembayaran_cash`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_kredit`
--
ALTER TABLE `pembayaran_kredit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `profile_users`
--
ALTER TABLE `profile_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran_cash`
--
ALTER TABLE `pembayaran_cash`
  ADD CONSTRAINT `pembayaran_cash_admin_foreign` FOREIGN KEY (`admin`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_cash_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran_kredit`
--
ALTER TABLE `pembayaran_kredit`
  ADD CONSTRAINT `pembayaran_kredit_admin_foreign` FOREIGN KEY (`admin`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_kredit_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profile_users`
--
ALTER TABLE `profile_users`
  ADD CONSTRAINT `profile_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_admin_foreign` FOREIGN KEY (`admin`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
