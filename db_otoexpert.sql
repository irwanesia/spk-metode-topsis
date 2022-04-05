--
-- Database: `db_otoexpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama`, `username`, `password`, `foto`) VALUES
(4, 'andie', 'andie', '$2y$10$iT.dLA6UhqJ3582cGLFtWesiiqFqagLIIJSNVl811aVbtXE/n9XjC', '605242942583c.jpg'),
(16, 'Admin', 'admin', '$2y$10$azbOW2zclECPGyjDyavj2elkwCIfKCvagcF3i1gAnMZxS.Yk1ZH9q', '6032abd7617e1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alt` int(11) NOT NULL,
  `kode_alt` varchar(12) NOT NULL,
  `nama_alt` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `website` varchar(150) NOT NULL,
  `website_seo` varchar(50) NOT NULL,
  `k01` double NOT NULL,
  `k02` double NOT NULL,
  `k03` double NOT NULL,
  `k04` double NOT NULL,
  `k05` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alt`, `kode_alt`, `nama_alt`, `gambar`, `website`, `website_seo`, `k01`, `k02`, `k03`, `k04`, `k05`) VALUES
(1, 'A1', 'Avanza', 'avanza.jpg', 'https://www.toyota.astra.co.id/product/avanza', 'Toyota Astra', 5, 5, 5, 3, 1),
(2, 'A2', 'Sienta', 'sienta.jpg', 'https://www.toyota.astra.co.id/product/veloz', 'Toyota Astra', 3, 5, 3, 3, 1),
(3, 'A3', 'Mobilio', 'mobilio.jpg', 'https://www.honda-indonesia.com/mobilio', 'Toyota Astra', 3, 5, 3, 3, 5),
(4, 'A4', 'Ertiga', 'ertiga.jpg', 'https://www.suzuki.co.id/automobile/all-new-ertiga', 'Toyota Astra', 3, 3, 5, 3, 5),
(5, 'A5', 'Ertiga Sport', 'ertigasport.jpg', 'https://www.suzuki.co.id/automobile/all-new-ertiga-suzuki-sport', 'Toyota Astra', 3, 3, 5, 3, 5),
(6, 'A6', 'Xenia', 'xenia.jpg', 'https://daihatsu.co.id/product/grand-new-xenia/', 'Toyota Astra', 5, 1, 3, 3, 5),
(7, 'A7', 'Xpander', 'xpander.jpg', 'https://www.mitsubishi-motors.co.id/our-cars/xpander#', 'Toyota Astra', 3, 5, 3, 3, 5),
(8, 'A8', 'Xpander Cross', 'xpandercross.jpg', 'https://www.mitsubishi-motors.co.id/our-cars/xpander-cross#', 'Toyota Astra', 3, 3, 3, 3, 5),
(9, 'A9', 'Grand Livina', 'livina.jpg', 'https://nissan.co.id/vehicles/new/all-new-livina.html', 'Toyota Astra', 3, 1, 3, 3, 5),
(10, 'A10', 'Confero', 'confero.jpg', 'https://wuling.id/id/confero-db/', 'Wuling Motors', 5, 3, 3, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bobot_kriteria`
--

CREATE TABLE `tbl_bobot_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bobot_kriteria`
--

INSERT INTO `tbl_bobot_kriteria` (`id_kriteria`, `kriteria`, `bobot`) VALUES
(1, 'Rendah', 1),
(2, 'Cukup', 3),
(3, 'Tinggi', 5),
(4, 'Sangat Rendah', 1),
(5, 'Sangat Tinggi', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `category_slug` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_slug`) VALUES
(1, 'Mobil', 'mobil'),
(2, 'Motor', 'motor'),
(3, 'Tips dan Tricks', 'tips-dan-tricks');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_name` varchar(60) DEFAULT NULL,
  `comment_email` varchar(90) DEFAULT NULL,
  `comment_message` text,
  `comment_status` int(11) DEFAULT '0',
  `comment_parent` int(11) DEFAULT '0',
  `comment_post_id` int(11) DEFAULT NULL,
  `comment_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `comment_date`, `comment_name`, `comment_email`, `comment_message`, `comment_status`, `comment_parent`, `comment_post_id`, `comment_image`) VALUES
(1, '2019-04-07 03:15:05', 'Joko', 'joko@gmail.com', 'Nice Post, thanks', 1, 0, 6, 'user_blank.png'),
(2, '2019-04-12 04:22:34', 'M Fikri', 'fikrifiver97@gmail.com', 'Thank you.<br>', 1, 1, 6, 'fcee14ca639c3ca3c5b93b7c7fc70ba2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_name` varchar(50) DEFAULT NULL,
  `inbox_email` varchar(80) DEFAULT NULL,
  `inbox_subject` varchar(200) DEFAULT NULL,
  `inbox_message` text,
  `inbox_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox_status` varchar(2) DEFAULT '0' COMMENT '0=Unread, 1=Read'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`inbox_id`, `inbox_name`, `inbox_email`, `inbox_subject`, `inbox_message`, `inbox_created_at`, `inbox_status`) VALUES
(1, 'Fikri', 'fikrifiver97@gmail.com', 'Request Artikel', 'Saya mau request artikel tentang mindset.', '2019-04-11 03:46:56', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_krt` int(11) NOT NULL,
  `kode_krt` varchar(50) NOT NULL,
  `nama_krt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_krt`, `kode_krt`, `nama_krt`) VALUES
(1, 'C1', 'Harga'),
(2, 'C2', 'bbm'),
(4, 'C4', 'Fitur Keselamatan'),
(5, 'C5', 'Kapasitas Penumpang'),
(7, 'C6', 'Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(250) DEFAULT NULL,
  `post_description` text,
  `post_contents` longtext,
  `post_image` varchar(40) DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `post_last_update` datetime DEFAULT NULL,
  `post_category_id` int(11) DEFAULT NULL,
  `post_tags` varchar(225) DEFAULT NULL,
  `post_slug` varchar(250) DEFAULT NULL,
  `post_status` int(11) DEFAULT NULL COMMENT '1=Publish, 0=Unpublish',
  `post_views` int(11) DEFAULT '0',
  `post_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `post_title`, `post_description`, `post_contents`, `post_image`, `post_date`, `post_last_update`, `post_category_id`, `post_tags`, `post_slug`, `post_status`, `post_views`, `post_user_id`) VALUES
(7, 'Daftar Mobil Terlaris di Indonesia Semester 1 2021', '', 'Gabungan Industri Kendaraan Bermotor Indonesia (Gaikindo) telah mengumumkan angka penjualan wholesales dari pabrikan mobil anggota mereka untuk bulan Juni 2021. Dari angka tersebut, penjualan dari pabrik ke dealer pada bulan Juni  2021 ini meningkat hingga lebih dari 20 ribu unit atau naik 32,7 persen dari bulan sebelumnya.\r\n\r\nMenurut Gaikindo, penjualan mobil secara wholesales pada Juni 2021 lalu mencapai 72.720 unit, sementara pada Mei 2021, angka penjualan wholesales hanya mencapai 54.815 unit. Dan meski tak menjadi yang tertinggi pada bulan Maret-Mei 2021, namun Honda Brio ternyata tetap sukses menjadi yang paling laku selama 6 bulan pertama 2021 ini, dan kalahkan mobil sejuta umat, Toyota Avanza. Yang menarik duet produk asal China, Wuling Confero dan Wuling Almaz sukses berada di 20 besar mobil terlaris di Indonesia.\r\n\r\nBerikut ini daftar 20 mobil terlaris di Tanah Air sepanjang semester 1 2021\r\n\r\n20 Mobil Terlaris Semester 1 2021 (Wholesales)\r\nNo 	Model 	              Jumlah Terjual (unit)\r\n1 	Honda Brio 	             27.537\r\n2 	Toyota Avanza 	             26.590\r\n3 	Toyota Rush 	             22.629\r\n4 	Mitsubishi Xpander 	     22.170\r\n5 	Toyota Kijang Innova 	     21.687\r\n6 	Daihatsu Sigra 	             17.455\r\n7 	Toyota Calya 	             17.359\r\n8 	Daihatsu Ayla 	             10.001\r\n9 	Daihatsu Terios 	      9.376\r\n10 	Toyota Agya 	              9.041\r\n11 	Honda HR-V 	              8.496\r\n12 	Mitsubishi Pajero Sport    8.299\r\n13 	Toyota Fortuner 	      7.787\r\n14 	Suzuki Ertiga 	              6.468\r\n15 	Daihatsu GranMax MB     6.083\r\n16 	Suzuki XL7 	5.832\r\n17 	Daihatsu Xenia 	5.143\r\n18 	Daihatsu Rocky 	4.642\r\n19 	Wuling Confero 	4.603\r\n20 	Wuling Almaz 	4.415', 'a209fad569cbde1c622e5fc0652681bf.jpg', '2021-08-20 18:09:09', '2021-08-21 01:09:54', 1, 'Mobil', 'daftar-mobil-terlaris-di-indonesia-semester-1-2021', 1, 1, 2),
(8, 'Xpander Jadi Mobil Terlaris di Bulan Juli 2021', '', 'Gabungan Industri Kendaraan Bermotor Indonesia (Gaikindo) merilis data penjualan wholesales (distribusi dari pabrik ke diler) kendaraan roda empat periode Juli 2021 beberapa waktu lalu. Hasilnya mobil yang penjualannya tertinggi adalah Mitsubishi Xpander.\r\n\r\nSelama bulan ketujuh tahun ini, Low MPV andalan tiga berlian itu terjual sebanyak 6.974 unit. Padahal pada bulan Juni lalu torehan penjualannya tak masuk 10 besar mobil terlaris. Hanya terjual 1.704 unit. Artinya dari Juni ke Juli penjualan Xpander naik sebesar 309 persen.\r\n\r\nCapaian tersebut mengungguli Toyota Avanza pada kurun waktu yang sama terjual 5.938 unit. Penjualan Avanza sebagai mobil terlaris kedua naik sebesar 33,4 persen dibandingkan Juni sebesar 4.450 unit. \r\n\r\nTak kalah menarik posisi ketiga mobil yang paling banyak dibeli sepanjang bulan Juli dihuni Honda Brio yang penjualannya mencapai 4.361 unit. Peringkatnya turun dari posisi dua klasemen dari bulan Juni yang sempat menjual 4.867 unit. Pun dengan catatan penjualannya yang mengalami penurunan sekitar 11 persen.\r\n\r\nBerikutnya pada posisi empat justru dihuni oleh Suzuki Carry pick up yang telah dipasok pabrikan sebanyak 3.512 unit pada Juli. Pada Juni kemarin mobil niaga ringan tersebut sejatinya adalah rajanya mobil terlaris dan telah terdistribusi sebanyak 5.277 unit. \r\n\r\nLebih lanjut menutup posisi top five ada Toyota Rush yang merangsek dengan capaian distribusi sebanyak 3.263 unit. Meskipun masuk lima besar tapi penjualan Low SUV terfavorit ini ikut turun dari bulan Juni yang sempat terjual 3.795 unit.  \r\n\r\nBerikutnya posisi enam dikuasai Toyota Raize yang terjual 2.910 unit. Kemudian diikuti Toyota Calya di posisi tujuh dengan 2.293 unit. Lalu dilanjutkan Toyota Fortuner yang terjual sebanyak 2.186 unit pada posisi delapan. Daihatsu Gran Max yang terjual 2.152 unit berhasil mengamankan posisi sembilan. Dan terakhir melengkapi sepuluh besar ada Toyota Kijang Innova yang terjual 2.113 unit.\r\n\r\nBerikut daftar 10 mobil terlaris di Indonesia sepanjang Juli 2021:\r\n\r\n1.  Mitsubishi Xpander (termasuk Xpander Cross): 6.974 unit\r\n2.  Toyota Avanza: 5.938 unit\r\n3.  Honda Brio: 4.361 unit\r\n4.  Suzuki Carry PU: 3.512 unit\r\n5.  Toyota Rush: 3.263 unit\r\n6.  Toyota Raize: 2.910 unit\r\n7.  Toyota Calya: 2.293 unit\r\n8.  Daihatsu Gran Max PU: 2.152 unit\r\n9.  Toyota Fortuner: 2.113 unit\r\n10. Toyota Innova: 2.113 unit', '0572d3e1c65810169dd51d4e8750f9bf.jpg', '2021-08-20 18:20:47', NULL, 1, 'Mobil', 'xpander-jadi-mobil-terlaris-di-bulan-juli-2021', 1, 3, 2),
(9, 'Hyundai Siapkan Low MPV Penantang Avanza', '', 'Perusahaan produsen mobil Hyundai, bersiap untuk meluncurkan jenis mobil yang digadang-gadang menjadi penantang mobil Toyota Avanza. Wujud mobil tipe low MPV ini, dikabarkan sedang diuji jalan di negara asalnya, Korea Selatan.\r\n\r\nDiberi nama Hyundai Stargazer, low MPV ini terlihat memiliki bodi layak seperti jenisnya pada umumnya. Atapnya dirancang agak sedikit landai ke belakang, serta jarak rodanya ke bodi, sedikit lebih tinggi, seperti bisa meredam guncang dengan lebih maksimal.\r\n\r\nDari penerangannya, lampu remnya juga dirancang secara vertikal, agar terlihat jelas dari kejauhan. serta ada tambahan di bagian atasnya. Pada bumper belakang Hyundai Stargazer juga, selain berfungsi untuk penambahan lampung rem, diduga juga merupakan sensor mundur saat parkir.\r\n\r\nDikutip dari laman Gaadiwaadi, Sabtu 31 Juli 2021, Hyundai Stargazer berkelas di bawah Hyundai Staria jenis lainnya dari perusahaan Hyundai. Hyundai di Indonesia juga sudah melakukan pendaftaran merek nama Stargazer ke pemerintah pada akhir tahun lalu, dan mendapatkan restu untuk hadir ke NKRI.\r\n\r\nMeski saat ini pabrik baru Hyundai sedang dibangun, hingga kini, belum diketahui secara pasti, Hyundai Stargazer bakal diproduksi secara lokal atau tidak.', '40e3541f434fae04ba75de632a6c4350.jpg', '2021-08-20 18:28:38', NULL, 1, 'Mobil', 'hyundai-siapkan-low-mpv-penantang-avanza', 1, 2, 2),
(10, 'Toyota Avanza Jadi Mobil Low MPV Terlaris 2020', '', 'Toyota Avanza yang berada di puncak mobil terlaris selama 15 tahun harus mengakui kehebatan Honda Brio pada 2020. Tapi, Toyota Avanza masih menjadi mobil low MPV terlaris di Indonesia.\r\n\r\nGabungan Industri Kendaraan Bermotor Indonesia (Gaikindo) pada akhir pekan ini telah merilis hasil penjualan mobil baru secara wholesales sebanyak 532.027 unit maupun retail sales 578.327 unit sepanjang 2020.\r\n\r\nTerdapat kejutan pada hasil penjualan sepanjang tahun lalu, yakni hadirnya Honda Brio sebagai mobil dengan penjualan tertinggi, disusul Suzuki Carry.\r\n\r\nModel city car dan kendaraan niaga ringan itu menggeser Toyota Avanza yang dikenal sebagai mobil terlaris di Indonesia. Penjualan Honda Brio secara gabungan (tipe Satya dan RS) sebanyak 40.879 unit, Suzuki Carry 38.072, dan Toyota Avanza di urutan ketiga 35.754 unit.\r\n\r\nAvanza masih berpredikat low MPV terlaris di antara pesaingnya. Pesaing terdekatnya adalah Mitsubishi Xpander yang terjual 26.362 (posisi ketujuh), Nissan Livina 9.082 unit (ke-18), dan Suzuki Ertiga (ke-20) sebanyak 7.516 unit.\r\n\r\nDi sisi lain, penjualan retail Avanza mencapai 40.728 unit dengan kontribusi 22,3 persen terhadap total penjualan Toyota. Secara merek, Toyota pun masih berstatus penjualan terbanyak sepanjang 2020.\r\n\r\n"Supply wholesales ada di angka 161.256 unit, tapi untuk retail sales yang terserap market sebanyak 182.665 unit," kata Marketing Director PT Toyota Astra Motor, Anton Jimmy Suwandi.\r\n\r\nKejutan lainnya adalah Daihatsu Xenia, kembaran Toyota Avanza, yang hanya terjual 7.637 unit sepanjang 2020 (urutan ke-19 dalam daftar mobil terlaris 2020). Wholesales Xenia bahkan kalah dari Nissan Livina yang 9.082 unit.\r\n\r\nBerikut daftar wholesales model mobil terlaris 2020:\r\n\r\n1 Honda Brio (RS dan Satya): 40.879 unit\r\n2 Suzuki Carry: 38.072 unit\r\n3 Toyota Avanza 35.754 unit\r\n4 Daihatsu GranMax (minibus dan pick-up): 32.528 unit\r\n5 Toyota Rush: 29.361 unit\r\n6 Toyota Kijang Innova: 27.595 unit\r\n7 Mitsubishi Xpander: 26.362 unit\r\n8 Toyota Calya: 23.442 unit\r\n9 Daihatsu Sigra: 23.295 unit\r\n10 Mitsubishi L300: 16.088 unit', '55513ab73a402dd167d26c47abb3821d.jpg', '2021-08-20 18:34:23', NULL, 1, 'Mobil', 'toyota-avanza-jadi-mobil-low-mpv-terlaris-2020', 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_views`
--

CREATE TABLE `tbl_post_views` (
  `view_id` int(11) NOT NULL,
  `view_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `view_ip` varchar(50) DEFAULT NULL,
  `view_post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post_views`
--

INSERT INTO `tbl_post_views` (`view_id`, `view_date`, `view_ip`, `view_post_id`) VALUES
(1, '2019-04-06 13:33:39', '::1', 6),
(2, '2019-04-06 23:04:18', '::1', 6),
(3, '2019-04-07 03:32:54', '::1', 5),
(4, '2019-04-07 03:33:14', '::1', 4),
(5, '2019-04-07 04:03:50', '::1', 3),
(6, '2019-04-09 12:19:36', '::1', 6),
(7, '2019-04-09 13:28:30', '::1', 4),
(8, '2019-04-10 01:33:10', '::1', 5),
(9, '2019-04-10 10:00:27', '::1', 2),
(10, '2019-04-10 10:58:17', '::1', 1),
(11, '2019-04-10 13:20:32', '::1', 3),
(12, '2019-04-10 13:20:46', '::1', 6),
(13, '2019-04-11 03:32:18', '::1', 6),
(14, '2019-04-11 04:24:22', '::1', 4),
(15, '2019-04-11 07:58:35', '::1', 2),
(16, '2019-04-12 04:23:04', '::1', 6),
(17, '2019-04-12 10:09:30', '::1', 5),
(18, '2019-04-13 01:42:27', '::1', 6),
(19, '2019-04-13 02:01:01', '::1', 5),
(20, '2019-04-13 02:01:18', '::1', 3),
(21, '2019-04-13 03:23:34', '::1', 4),
(22, '2019-04-14 01:39:17', '::1', 1),
(23, '2019-04-14 03:24:24', '::1', 3),
(24, '2019-04-14 04:08:24', '::1', 2),
(25, '2019-04-15 03:44:42', '::1', 6),
(26, '2021-08-20 18:20:55', '::1', 8),
(27, '2021-08-20 18:21:06', '::1', 7),
(28, '2021-08-20 18:28:50', '::1', 9),
(29, '2021-08-21 09:44:47', '127.0.0.1', 8),
(30, '2021-09-06 04:39:43', '::1', 9),
(31, '2021-09-06 04:40:01', '::1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_preferensi`
--

CREATE TABLE `tbl_preferensi` (
  `id` int(11) NOT NULL,
  `pref` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_preferensi`
--

INSERT INTO `tbl_preferensi` (`id`, `pref`) VALUES
(1, 0.489541),
(2, 0.311827),
(3, 0.569197),
(4, 0.701198),
(5, 0.701198),
(6, 0.504028),
(7, 0.569197),
(8, 0.527754),
(9, 0.48272),
(10, 0.583538);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site`
--

CREATE TABLE `tbl_site` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(100) DEFAULT NULL,
  `site_title` varchar(200) DEFAULT NULL,
  `site_description` text,
  `site_logo_header` varchar(50) DEFAULT NULL,
  `site_logo_footer` varchar(50) DEFAULT NULL,
  `site_facebook` varchar(150) DEFAULT NULL,
  `site_twitter` varchar(150) DEFAULT NULL,
  `site_instagram` varchar(150) DEFAULT NULL,
  `site_pinterest` varchar(150) DEFAULT NULL,
  `site_linkedin` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_site`
--

INSERT INTO `tbl_site` (`site_id`, `site_name`, `site_title`, `site_description`, `site_logo_header`, `site_logo_footer`, `site_facebook`, `site_twitter`, `site_instagram`, `site_pinterest`, `site_linkedin`) VALUES
(1, 'OTOEXPERT', '', 'Otoexpert PT Open Source source code untuk personal blog, simple, elegan, full responsif, dan mudah di customize.  ', 'logo-black1.png', 'logo-black2.png', 'https://www.facebook.com/mfikridotcom/', 'https://twitter.com/MFikri75770694/', 'https://www.instagram.com/mfikricom/', 'https://id.pinterest.com/mfikricom/', 'https://www.linkedin.com/in/m-fikri-setiadi-b03370148/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `subscribe_id` int(11) NOT NULL,
  `subscribe_email` varchar(100) DEFAULT NULL,
  `subscribe_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `subscribe_status` int(11) DEFAULT '0',
  `subscribe_rating` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscribe`
--

INSERT INTO `tbl_subscribe` (`subscribe_id`, `subscribe_email`, `subscribe_created_at`, `subscribe_status`, `subscribe_rating`) VALUES
(1, 'fikrifiver97@gmail.com', '2019-04-11 07:40:16', 1, 1),
(3, 'porthere@gmail.com', '2019-04-11 07:57:28', 1, 0),
(4, 'mufty@gmail.com', '2019-04-11 07:58:44', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`tag_id`, `tag_name`) VALUES
(1, 'Mobil'),
(2, 'Motor'),
(3, 'Tips & Trik'),
(4, 'Modfikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(60) DEFAULT NULL,
  `user_password` varchar(40) DEFAULT NULL,
  `user_level` varchar(10) DEFAULT NULL,
  `user_status` varchar(10) DEFAULT '1',
  `user_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_level`, `user_status`, `user_photo`) VALUES
(1, 'M Fikri', 'fikrifiver97@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', 'fcee14ca639c3ca3c5b93b7c7fc70ba2.png'),
(2, 'dimas', 'dimasatriautama@gmail.com', '202cb962ac59075b964b07152d234b70', '1', '1', '3b093547ba2129c3d5312e01b2dde77c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor`
--

CREATE TABLE `tbl_visitor` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `k01` int(11) NOT NULL,
  `k02` int(11) NOT NULL,
  `k03` int(11) NOT NULL,
  `k04` int(11) NOT NULL,
  `k05` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_visitor`
--

INSERT INTO `tbl_visitor` (`id`, `nama`, `email`, `k01`, `k02`, `k03`, `k04`, `k05`, `date`) VALUES
(1, 'dika', 'dict@gmail.com', 3, 3, 4, 5, 1, '2021-09-07'),
(3, 'irwan', 'irwan@arch.co', 2, 4, 5, 3, 3, '2021-09-07'),
(4, 'Luca', 'luc@irwanesia.co.id', 3, 4, 5, 3, 3, '2021-09-20'),
(5, 'Nirnia', 'nia@nirwana.co.id', 4, 2, 3, 5, 2, '2021-09-20'),
(6, 'andi', 'ndi@boril.co.id', 4, 2, 3, 5, 2, '2021-09-20'),
(7, 'test', 'test@g.co', 4, 2, 3, 5, 2, '2021-09-20'),
(8, 'test2', 'ts@go.id', 4, 2, 3, 5, 2, '2021-09-20'),
(9, 'felis', 'fels@bebeb.com', 2, 4, 5, 3, 4, '2021-09-20'),
(10, 'rwa', 'awr@asd.rtr', 3, 3, 3, 3, 3, '2022-03-27'),
(11, 'hans', 'hans@gmail.com', 2, 2, 5, 2, 4, '2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitors`
--

CREATE TABLE `tbl_visitors` (
  `visit_id` int(11) NOT NULL,
  `visit_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `visit_ip` varchar(50) DEFAULT NULL,
  `visit_platform` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_visitors`
--

INSERT INTO `tbl_visitors` (`visit_id`, `visit_date`, `visit_ip`, `visit_platform`) VALUES
(541327, '2019-03-18 14:07:36', '::1', 'Firefox'),
(541328, '2019-03-19 03:33:51', '::1', 'Chrome'),
(541329, '2019-03-20 01:00:19', '::1', 'Chrome'),
(541330, '2019-04-05 01:53:28', '::1', 'Firefox'),
(541331, '2019-04-06 01:37:35', '::1', 'Chrome'),
(541332, '2019-04-06 23:04:12', '::1', 'Chrome'),
(541333, '2019-04-09 12:19:32', '::1', 'Chrome'),
(541334, '2019-04-10 01:33:03', '::1', 'Chrome'),
(541335, '2019-04-11 03:30:38', '::1', 'Chrome'),
(541336, '2019-04-11 03:30:38', '::1', 'Chrome'),
(541337, '2019-04-12 03:51:42', '::1', 'Chrome'),
(541338, '2019-04-12 21:55:51', '::1', 'Chrome'),
(541339, '2019-04-14 01:30:40', '::1', 'Chrome'),
(541340, '2019-04-15 01:42:53', '::1', 'Chrome'),
(541341, '2021-05-06 16:27:12', '::1', 'Chrome'),
(541342, '2021-05-06 17:00:10', '::1', 'Chrome'),
(541343, '2021-05-07 17:08:48', '::1', 'Chrome'),
(541344, '2021-05-09 16:39:17', '127.0.0.1', 'Firefox'),
(541345, '2021-05-09 17:00:18', '127.0.0.1', 'Firefox'),
(541346, '2021-05-09 17:04:35', '::1', 'Chrome'),
(541347, '2021-05-10 17:00:07', '::1', 'Chrome'),
(541348, '2021-08-18 14:05:21', '::1', 'Firefox'),
(541349, '2021-08-19 12:49:30', '::1', 'Firefox'),
(541350, '2021-08-20 18:09:24', '::1', 'Firefox'),
(541351, '2021-08-21 08:54:31', '127.0.0.1', 'Firefox'),
(541352, '2021-09-06 03:53:28', '::1', 'Chrome'),
(541353, '2021-09-06 17:33:53', '::1', 'Chrome'),
(541354, '2021-09-20 16:34:55', '127.0.0.1', 'Firefox'),
(541355, '2021-09-20 18:56:40', '127.0.0.1', 'Firefox'),
(541356, '2022-03-26 23:05:07', '::1', 'Chrome'),
(541357, '2022-04-05 02:08:42', '::1', 'Chrome');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alt`);

--
-- Indexes for table `tbl_bobot_kriteria`
--
ALTER TABLE `tbl_bobot_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_krt`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_post_views`
--
ALTER TABLE `tbl_post_views`
  ADD PRIMARY KEY (`view_id`);

--
-- Indexes for table `tbl_preferensi`
--
ALTER TABLE `tbl_preferensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site`
--
ALTER TABLE `tbl_site`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`subscribe_id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_bobot_kriteria`
--
ALTER TABLE `tbl_bobot_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_post_views`
--
ALTER TABLE `tbl_post_views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_preferensi`
--
ALTER TABLE `tbl_preferensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_site`
--
ALTER TABLE `tbl_site`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `subscribe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_visitor`
--
ALTER TABLE `tbl_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_visitors`
--
ALTER TABLE `tbl_visitors`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541358;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
