-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 18, 2020 at 01:02 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokododo`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(256) NOT NULL,
  `teks` text NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `updateby` varchar(50) NOT NULL,
  `viewnum` varchar(20) NOT NULL,
  `post_type` varchar(20) NOT NULL,
  `terbit` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `id_kategori`, `isi`, `foto`, `teks`, `tgl`, `updateby`, `viewnum`, `post_type`, `terbit`) VALUES
(13, 'Cara Mudah Hapus Virus Readme.eml &amp; runonce.exe 100% Berhasil!', 2, '<p>Jika semua aplikasi/software di komputer anda sudah tidak bisa terbuka \r\ndengan normal, saya sarankan untuk install ulang terlebih dahulu. \r\nsetelah install ulang, anda install software antivirus smadav yang versi\r\n terbaru. <b>Pemberitahuan, Matikan Koneksi Internet Anda</b>, saat melakukan scan penuh smadav, hingga akhir artikel ini.<br>\r\n<br>\r\n1. Buka software smadav, lakukan full scanning untuk mendeteksi software&nbsp;runonce.exe dan file&nbsp;readme.eml.<br>\r\n2. Setelah ketemu virusnya, hapus semua virus.<br>\r\n3. Periksa di task manager, dengan mengetikan di icon windows <b>view running processes with task manager</b>. adakah software&nbsp;runonce.exe yang masih berjalan di latar belakang windows atau tidak. jika ada end process.</p>', '5f3156bfd0815.jpg', 'virus komputer', '10-August-2020', 'RIdho', '0', 'Berita', '1'),
(14, '3 Aplikasi Chat Pencari Jodoh Terbaik &amp; Terbukti Serius, Tunggu Apalagi ?', 2, '<p>Ada pepatah mengatakan, jodoh tidak akan datang sendiri tanpa anda \r\nmencarinya juga. tanpa adanya usaha dan doa semua akan sia-sia. mencari \r\njodoh atau gebetan secara langsung, memang agak susah dan mudah. disini \r\nanda langsung melakukan secara langsung, seperti mengajaknya jalan, dan \r\nbanyak yang bisa anda lakukan.<br>\r\n<br>\r\nBagi anda yang kurang pede dengan diri sendiri, di zaman modren saat ini\r\n ada juga aplikasi pembantu mencari jodoh (pasangan) yang populer di \r\nindonesia. jadi anda tidak perlu susah payah mencari jodoh, karena di \r\naplikasi pencari jodoh ini menyediakan orang yang ingin mendapatkan \r\njodoh juga. di artikel ini saya akan membagikan beberapa aplikasi yang \r\nsering orang gunakan alias populer dan sudah terbukti terpercaya.</p>', '5f31579937621.jpg', 'jodoh adalah cinta', '10-August-2020', 'RIdho', '0', 'Berita', '1'),
(15, 'Situs Yang Wajib Dikunjungi Saat Bosan, Jangan Main Media Sosial Aja !', 4, '<p><b>Kumpulan situs menarik</b> - Perkembangan teknologi yang sangat cepat\r\n berkembang di masyarakat membuat pengguna internet banyak digunakan \r\nhingga saat ini. dari kalangan anak mudah hingga lanjut usia sudah mulai\r\n mengetahui kelebihan internet yang sangat bermanfaat untuk di sekitar \r\nmereka. bisa di bilang tanpa internet, hidup tidak lengkap. tetapi orang\r\n yang mengatakan hal itu, sudah di budak oleh teknologi.</p><p><br></p><p>\r\nSebagai pengguna pintar, anda harus memilih mana yang baik dan buruk, \r\ntidak semua di internet itu positif isinya. ada informasi negatif yang \r\nbisa <b><a href=\"https://bisalagi.com/dampak-buruk-internet-bagi-anak/\" target=\"_blank\">mempengarui anak</a></b>\r\n anda. bagi anda yang sudah sering menggunakan internet selama seharian \r\natau bekerja di depan komputer, pasti merasa dampak besar yang anda \r\ndapatkan oleh internet. tetapi, mungkin anda pernah merasa bosan dengan \r\nkegiatan di media sosial salah satunya di facebook, twitter, dan \r\nlain-lain.<br>\r\n<br>\r\nRasa bosan merupakan sifat alami manusia yang di alami semua orang dalam\r\n kegiatan apapun. walaupun sudah bekerja dengan seharian penuh dan di \r\nlakukan berulang-ulang akan muncul rasa malas dan bosan. sama dengan \r\nmedia internet.<br>\r\n</p><div class=\"widget-content\">\r\n\r\n\r\n\r\n</div>\r\nUntuk mengembalikan rasa bosan itu menjadi sesuatu yang bermanfaat anda \r\nbisa mengunjungi beberapa situs yang saya rekomendasikan di artikel ini.\r\n anda tidak ingin bukan, menghabiskan waktu luang anda dengan kegiatan \r\nyang tidak bermanfaat, seperti scroll halaman facebook yang memunculkan \r\nberita palsu maupun hiburan.<br>\r\n<br>\r\nTerutama untuk pelajar, paling di khususkan <a href=\"https://www.suryapero.com/2019/01/5-aplikasi-android-yang-wajib-install.html\" target=\"_blank\">mahasiswa</a>\r\n yang mayoritas sudah menggunakan hp smartphone. hindari rasa bosan itu \r\ndengan kegiatan menambah ilmu atau yang berguna di sekitar anda.', '5f38bb59a8706.jpg', 'situs menarik', '16-August-2020', 'RIdho', '0', 'Berita', '1'),
(16, 'Cara Menghilangkan Situs Tribunnews di Mesin Pencarian Google', 1, '<p>Menyingkirkan tribunnews hasil kata kunci digoogle - Bagi anda yang \r\nsering menjelajahi pencarian google, pasti tidak asing lagi dengan situs\r\n tribun bukan ? setiap memasukan pertanyaan di kolom pencarian google, \r\npasti muncul di halaman pertama adalah situs rekomendasi yaitu \r\ntribunnew. mungkin, anda merasa terusik dengan kehadiran artikel yang di\r\n miliki tribun ini, karena setiap postingan kalimat tidak jelas dan \r\ntidak sesuai dengan judul yang di tulis.<br>\r\n<br>\r\nParahnya lagi, untuk setiap artikel akan di bagikan beberapa halaman lagi. kalimat akan di potong dengan menggunakan <a href=\"https://www.suryapero.com/2019/04/cara-memasang-pagination-di-dalam-artikel-blog.html\" target=\"_blank\">pagination</a> di bawah untuk melanjutkan membaca. pasti itu sangat tidak relevan bagi pembaca, tidak mungkin menunggu loading kembali.<br>\r\n</p><div class=\"widget-content\">\r\n\r\n\r\n\r\n</div>\r\nSitus tribunnew ini adalah media terbesar informasi yang terbesar di \r\nindonesia. sehingga anda bisa bergabung menulis ke tribunnews ini. hal \r\ntersebut, sangat berdampak buruk bagi seorang blogger (penulis blog) \r\nyang mempunyai kata kunci pertama, tetapi kalah saing dengan situs besar\r\n ini.<br>\r\n<br>\r\nNah, untuk anda yang tidak ingin memunculkan situs tribunnews di setiap \r\npencarian google ada cara mudahnya, tetapi hanya di perangkat anda saja \r\nyang hilang dengan menggunakan kata kunci yang bertujuan menyingkirkan \r\ntribun.', '5f38bbc95734b.jpg', 'menghilangkan situs tribun', '16-August-2020', 'RIdho', '0', 'Berita', '1'),
(17, 'Bahaya Bermain Gadget Sebelum Tidur di Tempat Gelap', 4, '<p>Sebenarnya dampak teknologi seperti ini sangat baik untuk masyarakat. \r\ntetapi, apakah anda tau smartphone bisa berdampak buruk bagi anda \r\nsendiri atau penggunanya. mungkin, hal ini tidak anda sadari dan terjadi\r\n setiap hari tanpa ada rasa khawatir. pengguna hp di masyarakat \r\nrata-rata 2-5 jam perharinya, dengan waktu tersebut sangat tidak baik \r\nuntuk kesehatan tubuh anda terutama mata yang sering menatap layar \r\nsmartphone dengan durasi yang lama.<br>\r\n<br>\r\nKejadian ini sering terjadi oleh anak-anak milenial yang sangat terpaku \r\ndengan smartphone mereka setiap hari. bermain sosmed hingga lupa waktu \r\npun kurang baik dengan kehidupan sehari-hari anda, pekerjaan menjadi di \r\ntunda sampai waktu sebelum tidur pasti anda pernah memainkan hp bukan ? \r\nmelihat yang terbaru atau ada teman yang chat dengan anda sebelum tidur.\r\n mayoritas pengguna hp melakukan ini berulang-ulang, termasuk saya \r\nsendiri&nbsp;main hp di tempat gelap (kamar tidur).</p><div class=\"widget-content\">\r\n\r\n\r\n\r\n</div>\r\n<br>\r\nDi artikel ini saya akan membagikan informasi penting untuk anda yang \r\nkebiasaan sebelum tidur bermain hp. walaupun menurut anda ini adalah \r\nkurang penting, bisa mengakibatkan hal yang besar bagi kehidupan anda \r\nsendiri.<br>\r\n<br>\r\n<h2>\r\nBahaya Bermain Gadget Sebelum Tidur</h2>\r\n<h3>\r\n1. Penyakit Insomnia</h3>\r\nMenyebabkan si penderita menjadi sulit tidur, hilang konsentrasi saat \r\ntidur, dan sulit untuk tidur. walaupun tidur, saat pagi harinya pasti \r\nmasih merasa lelah dan ingin tidur kembali.', '5f38bd45eb34c.jpg', 'bahaya main gadget', '16-August-2020', 'RIdho', '0', 'Berita', '1'),
(18, '4 Situs Populer Penyedia Subtitle Indonesia Terlengkap dan Terbaik', 1, '<p>Bagi anda yang menyukai menonton film, pasti sering mendownload \r\nfilm-film melalui internet bukan ? saat anda mendownload, biasanya anda \r\nmengunjungi website/situs orang yang menyediakan film kesukaan anda, \r\ntetapi terkadang anda juga kendala setelah selesai mengunduh filmnya dan\r\n anda memutar film/video tidak ada subtitle indonesia rupanya.<br>\r\n<br>\r\nMasalah ini banyak terjadi oleh orang yang masih awam atau pertama kali \r\ndownload film. di indonesia film yang paling laris merupakan film barat \r\ndengan bahasa inggris kan ? jika anda fasih mendengarkan bahasa inggris \r\ndan mengetahui makna kalimatnya tidak ada salah tidak menggunakan \r\nsubtitle indonesia. namun, ada beberapa orang termasuk saya tidak pandai\r\n bahasa inggris, hal hasil harus mendownload subtitle indonesia terlebih\r\n dahulu.<br>\r\n<br>\r\nSebelum kita download subtitle indonesia, anda harus mengetahui tentang 2 bagian subtitle yaitu, <b>softsub dan hard sub</b>.<br>\r\n</p><div class=\"widget-content\">\r\n\r\n\r\n\r\n</div>\r\n<b>Hard Sub</b> adalah film/video yang sudah di konversi dengan subtitle\r\n indonesia ke dalam film. sehingga anda tidak perlu download subnya \r\nalias langsung menonton. <b>Soft Sub</b>&nbsp;sebaliknya, yaitu film dan subtitle di sengaja di pisah. menurut pribadi saya lebih bagus hard sub.<br>\r\n<br>\r\n<h2>\r\nSitus Penyedia Subtitle Indonesia Terbaik</h2>\r\nWebsite yang menyediakan subtitle indonesia sangat banyak di pencarian \r\ngoogle, bukan hanya sub indo saja, tetapi subtitle spayol, inggris, \r\nitalia, portugis, dan masih banyak lagi. di artikel ini saya akan \r\nmenjabarkan secara singkat dan padat situs penyedia&nbsp;subtitle indonesia.', '5f38bdb038e86.jpg', 'penyedia subtitle', '16-August-2020', 'RIdho', '0', 'Berita', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `terbit` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `alias`, `terbit`) VALUES
(1, 'Berita', 'berita', 1),
(2, 'Ekonomi', 'ekonomi', 1),
(4, 'Olahraga', 'olahraga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_kon` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `link` varchar(50) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_kon`, `nama`, `tax`, `isi`, `link`, `tipe`) VALUES
(1, 'Judul Situs', 'site_url', 'Portal Berita Terbaru', 'http://localhost/toko-dodo-native/', 'konfigurasi'),
(2, 'Meta Description', 'meta_desc', 'portal berita, situs berita', '', 'konfigurasi'),
(4, 'Alamat', 'alamat', 'Jl.Pepaya', '', 'konfigurasi'),
(5, 'Email', 'email', 'ciuyy12@gmail.com', 'mailto:ciuyy12@gmail.com', 'konfigurasi'),
(6, 'Deskripsi', 'desc', 'berita terbaru dan berita terkini hari ini untuk AS, dunia, cuaca, hiburan, politik, dan kesehatan di CNN.com', '', 'konfigurasi');

-- --------------------------------------------------------

--
-- Table structure for table `konfig_situs`
--

CREATE TABLE `konfig_situs` (
  `id_konfig` int(11) NOT NULL,
  `logo_situs` varchar(50) NOT NULL,
  `logo_icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfig_situs`
--

INSERT INTO `konfig_situs` (`id_konfig`, `logo_situs`, `logo_icon`) VALUES
(1, '5f2d3543b39f2.png', '5f2d358e445fc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` int(1) NOT NULL,
  `foto_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `nama_user`, `password`, `level`, `foto_user`) VALUES
(1, 'ridho@gmail.com', 'RIdho', '202cb962ac59075b964b07152d234b70', 1, '5f2c51ae666c0.jpg'),
(23, 'harun@gmail.com', 'Harun Saputra', 'd9b1d7db4cd6e70935368a1efb10e377', 2, '5f28039324eb8.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `konfig_situs`
--
ALTER TABLE `konfig_situs`
  ADD PRIMARY KEY (`id_konfig`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_kon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konfig_situs`
--
ALTER TABLE `konfig_situs`
  MODIFY `id_konfig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
