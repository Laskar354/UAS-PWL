-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2022 pada 11.41
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `password`) VALUES
(4, 'admin', '$2y$10$FBh8bnWJwXUY/.xR5gacQOlz58xof7ODUvagAYgWcJ.BAMQnzr/d.'),
(5, 'laskar', '$2y$10$L8Z.xQghZxMOh5GMnMi5ouMq40OOOQfNPu1Utl/iLK6sG4nIuyZA6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `judul_quis`
--

CREATE TABLE `judul_quis` (
  `id_judul_quis` int(11) NOT NULL,
  `judul_quis` varchar(100) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `judul_quis`
--

INSERT INTO `judul_quis` (`id_judul_quis`, `judul_quis`, `id_mapel`, `id_admin`) VALUES
(1, 'Penjumlahan dan Pengurangan Bilangan', 1, 4),
(3, 'Interaksi kehidupan Di Negara Negara ASEAN', 6, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kelas`, `nama_mapel`, `gambar`, `id_admin`) VALUES
(1, 'Kelas 1 SD', 'Matematika', 'matematika.jpg', 4),
(4, 'Kelas 1 SMP', 'IPA', '61d80e2ec7ffc.jpg', 4),
(5, 'Kelas 1 SMA', 'Bahasa Indonesia', '61ddbd511c749.jpg', 5),
(6, 'Kelas 2 SMP', 'IPS', '61e405bbdaa2d.jpg', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `nama_materi` varchar(50) NOT NULL,
  `video` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'gratis',
  `id_mapel` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `nama_materi`, `video`, `isi`, `status`, `id_mapel`, `id_admin`) VALUES
(1, 'Bilangan cacah dan Lambangnya', 'https://www.youtube.com/embed/oPg4O6EWiik', 'Bilangan cacah dan lambangnya', 'gratis', 1, 4),
(4, 'Penjumlahan dan Pengurangan Bilangan', 'https://www.youtube.com/embed/SOwdVSsjg-U', '<h2>Penjumlahan Dua Bilangan Untuk Kelas 1 SD</h2>\r\n    <img src=\"https://i0.wp.com/www.jumanto.com/wp-content/uploads/2019/12/Penjumlahan-dan-Pengurangan-untuk-Kelas-1-SD-semester-2.jpg?w=692&ssl=1\" alt=\"\">\r\n    <h3>Perbedaan Antara Angka Dan Bilangan</h3>\r\n    <p>Angka adalah suatu tanda atau lambang yang digunakan untuk melambangkan bilangan. Atau dengan kata lain Angka disebut juga digit. Angka tidak sama dengan bilangan, tetapi bilangan terdiri dari angka-angka.<br>\r\n        Contoh :  ???123??? merupakan bilangan seratus dua puluh tiga yang terdiri dari tiga angka.<br>\r\n        Pada poin ini, penjumlahan dua bilangan dapat berupa penjumlahan dua bilangan satuan,\r\n        dua bilangan puluhan, dua bilangan ratusan ataupun penjumlahan antara bilangan satu dengan yang lainnya.</p>\r\n\r\n    <h3>Contoh Penjumlahan Dua Bilangan</h3>\r\n    <ul>\r\n        <li>15 + 7 = 22</li>\r\n    </ul>\r\n    <p>15 merupakan bilangan yang pertama yang dijumlahkan dengan 7 sebagai bilangan yang kedua dan 22 merupakan hasil dari penjumlahan dua bilangan tersebut.</p>\r\n    <ul>\r\n        <li>175 + 50 = 225</li>\r\n    </ul>\r\n    <p>175 merupakan bilangan yang pertama yang dijumlahkan dengan 50 sebagai bilangan yang kedua dan 225 merupakan hasil dari pejumlahan kedua bilangan tersebut.</p>\r\n    <h3>Pengurangan Bilangan Matematika</h3>\r\n    <p>Untuk pengenalan materi ini, yang digunakan disini adalah pengurangan bilangan asli positif yang menghasilkan bilangan positif juga.<br> Jadi bilangan yang akan dikurangi harus lebih besar dari bilangan yang mengurangi.</p>\r\n    <h4>Contoh Pengurangan Bilangan :</h4>\r\n    <ul>\r\n        <li>8 - 5 = 3</li>\r\n    </ul>\r\n    <p>Angka 8 merupakan bilangan positif yang jumlahnya lebih dari 5, dimana angka 8 merupakan angka yang dikurangi dan 5 sebagai angka yang mengurangi dan 3 adalah hasil dari pengurangan tersebut.</p>\r\n    <h3>Sifat Pertukaran Pada Penjumlahan</h3>\r\n    <p>Yang dimaksud dengan sifat pertukaran dalam penjumlahan adalah sifat komutatif. <br>\r\n        Sifat komutatif pada penjumlahan :     a + b = b + a <br> <br>\r\n        Contoh : <br>\r\n        5 + 4 = 9 <br>\r\n        4 + 5 = 9 <br> <br>\r\n        Dari kedua penjumlahan diatas dapat kesimpulan bahwa 5 + 4 = 4 + 5  , karena dari penjumlahan keduanya sama-sama menghasilkan angka 9. Pertukaran posisi antara angka 4 dan angka 5 inilah yang dimaksud dengan pertukaran pada penjumlahan.</p>\r\n    <h3>Sifat Pengelompokkan Pada Penjumlahan</h3>\r\n    <p>Pengelompokkan pada penjumlahan yang dimaksud disini dapat disebut sebagai sifat Asosiatif. <br>\r\n        Sifat Asosiatif pada penjumlahan :     ( a + b ) + c = a + ( b + c ) <br> <br>\r\n        contoh : <br>\r\n        ( 1 + 2 ) + 3 = 1 + ( 2 + 3 ) <br>\r\n        3 + 3 = 1 + 5 <br>\r\n        =>    6 = 6 <br>\r\n        dengan    a = 1       b = 2       c = 3,  hasil dari kedua penjumlahan antara kanan dan kiri sama-sama menghasilkan angka yang sama yaitu angka 6.</p>\r\n    <h2>Menyelesaikan Soal Cerita Penjumlahan Dan Pengurangan Untuk Kelas 1 SD</h2>\r\n    <p>Setelah poin-poin di atas dapat dikuasai oleh siswa, maka penting dengan adanya evaluasi melalui soal. <br> Mereka juga harus bisa menganalisis permasalahan matematika yang dituliskan melalui soal cerita.</p>\r\n    <h3>Contoh Soal Cerita Penjumlahan Dan Pengurangan Beserta Jawabannya</h3>\r\n    <ol>\r\n        <li>Ani memiliki 5 buah apel, Lisa juga memiliki apel dengan jumlah 10. Berapakah jumlah semua apel Ani dan Lisa ?</li>\r\n        <li>Pada suatu hari, Dodi pergi ke pasar bersama ibunya. Dodi membeli 15 buah kelereng. Sesampainya di rumah, Dodi memberikan 7 buah kelereng yang dimilikinya kepada adiknya. Berapakah kelereng yang dimiliki Dodi sekarang?</li>\r\n        <li>Pak Raden memiliki ayam sebanyak 50 ekor. 30 ekor ayam dimilikinya adalah ayam jantan. Berapakah jumlah ayam betina yang dimiliki pak Raden ?</li>\r\n        <li>Adi memiliki kelereng sebanyak 86 biji dan Tono memiliki kelereng sebanyak 21 biji. Berapakah selisih jumlh kelereng yang dimiliki Adi dan Tono ?</li>\r\n        <li>Vina memiliki 16 permen. Dimakan 3 permen. Berapa sisa permen yang dimiliki Vina sekarang?</li>\r\n    </ol>\r\n    <h4>Kunci Jawaban :</h4>\r\n    <ol>\r\n        <li>5 + 10 = 15   Jadi jawabannya adalah 15 buah apel</li>\r\n        <li>15 ??? 7 = 8   jadi jawabannya adalah  8 buah kelereng</li>\r\n        <li>50 ??? 30 = 20    jawabannya adalah 20 ayam betina</li>\r\n        <li>86 ??? 21 = 65   ,selisih kelereng yang dimiliki oleh Adi dan Tono adalah 65 biji.</li>\r\n        <li>16 ??? 3 = 13    sisa permen yang dimiliki Vina sekarang ada 13 biji permen.</li>\r\n    </ol>\r\n    <p>Nah itulah penjelasan dari setiap poin yang ada di Bab Penjumlahan dan Pengurangan untuk kelas 1 semester 2. Dengan adanya penjelasan ini diharapkan dapat mempermudah proses belajar anak.</p>\r\n', 'gratis', 1, 4),
(5, 'Bangun Ruang', 'https://www.youtube.com/embed/TPy8zfIVZ5w', ' <h2>Bangun Ruang</h2>\r\n    <img src=\"https://3.bp.blogspot.com/-hagrW6GxNOQ/WcSlwCP7CkI/AAAAAAAAAAQ/cP-HCYiQINoiN-Q4GDwZojPpGBU9L5wEgCEwYBhgL/s320/mengenal-bangun-ruang-matematika-kelas-1-sd-2-728.jpg\" alt=\"\">\r\n    <p>Bangun ruang adalah bangun matematika yang memiliki isi ataupun volume.</p>\r\n    <h3>Pengertian dan Sifat-Sifat Bangun Ruang Kubus</h3>\r\n    <h4>Pengertian Kubus</h4>\r\n    <p>Kubus adalah bangun ruang tiga dimensi yang dibatasi oleh enam bidang sisi yang kongruen berbentuk bujur sangkar. Kubus memiliki 6 sisi, 12 rusuk dan 8 titik sudut. Kubus juga disebut bidang enam beraturan, selain itu juga merupakan bentuk khusus dalam prisma segiempat.</p>\r\n    <h4>Sifat-Sifat Bangun Ruang Kubus</h4>\r\n    <b>Bangun ruang kubus memiliki sifat-sifat sebagai berikut:</b>\r\n    <ul>\r\n        <li>memiliki 6 sisi berbentuk persegi yang ukurannya sama luas</li>\r\n        <li>memiliki 12 rusuk yang ukurannya sama panjang</li>\r\n        <li>memiliki 8 titik sudut</li>\r\n        <li>memiliki 4 buah diagonal ruang</li>\r\n        <li>memiliki 12 buah bidang diagonal</li>\r\n    </ul>\r\n    <h3>Pengertian dan Sifat-Sifat Bangun Ruang Balok</h3>\r\n    <h4>Pengertian Balok</h4>\r\n    <p>Balok adalah bangun ruang tiga dimensi yang dibentuk oleh tiga pasang persegi atau persegi panjang, dengan paling tidak satu pasang di antaranya berukuran berbeda. Balok memiliki 6 sisi, 12 rusuk dan 8 titik sudut. Balok yang dibentuk oleh enam persegi sama dan sebangun disebut sebagai kubus.</p>\r\n    <h4>Sifat-Sifat Bangun Ruang Balok </h4>\r\n    <b>Bangun ruang balok memiliki sifat-sifat sebagai berikut:</b>\r\n    <ul>\r\n        <li>memiliki 4 sisi  berbentuk persegi panjang ( 2 pasang persegi panjang yang ukurannya sama )</li>\r\n        <li>memiliki 2 sisi yang bentuknya sama ( 1 pasang persegi panjang dengan ukurannya sama namun berbeda ukuran dengan 2 pasang persegi panjang yang lain )</li>\r\n        <li>memiliki 12 rusuk yang ukurannya sama panjang</li>\r\n        <li>memiliki 8 titik sudut</li>\r\n    </ul>\r\n    <h3>Pengertian dan Sifat-Sifat Bangun Ruang Bola</h3>\r\n    <h4>Pengertian Bangun Ruang Bola</h4>\r\n    <p>Dalam geometri, bola adalah bangun ruang tiga dimensi yang dibentuk oleh tak hingga lingkaran berjari-jari sama panjang dan berpusat pada satu titik yang sama. Bola hanya memiliki 1 sisi.</p>\r\n    <h4>Sifat-Sifat Bangun Ruang Bola</h4>\r\n    <p>Bangun ruang bola memiliki sifat-sifat sebagai berikut:</p>\r\n    <ul>\r\n        <li>memiliki 1 sisi</li>\r\n        <li>memiliki 1 titik pusat</li>\r\n        <li>tidak memiliki titik sudut</li>\r\n        <li>memiliki jari-jari yang tak terhingga dan semuanya sama panjang</li>\r\n    </ul>', 'berbayar', 1, 4),
(6, 'Interaksi kehidupan Di Negara Negara ASEAN', 'https://www.youtube.com/embed/Zs3NMp6RM8Y', '<h2>Interaksi kehidupan Di Negara Negara ASEAN</h2>\r\n    <h3>A. Mengenal Negara-Negara ASEAN</h3>\r\n    <p>ASEAN (Association of South East Asian Nations) merupakan organisasi yangberanggotakan negara-negara di Asia Tenggara.ASEAN berdiri pada 8 Agustus 1967di Bangkok, Thailand. ASEAN diprakarsai lima negara, yaitu Indonesia, Malaysia,Filipina, Singapura, dan Thailand. Saat ini, ASEAN beranggotakan 10 negara, yaituIndonesia, Malaysia, Filipina, Singapura, Thailand, Brunei Darussalam, Vietnam,Laos, Myanmar, dan Kamboja. Berikut profil Negara-negara ASEAN:</p>\r\n    <h4>1. Indonesia</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAFVBMVEXOESf////GAB/oiJD/9fP+/f/NCh33JDCpAAAA0ElEQVR4nO3QqQHAAAwAofTdf+T6nKuGEZgBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB+ednmZJuLbW62edjmYHNSTspJOSkn5aSclJNyUk7KSTkpJ+WknJSTclJOykk5KSflpJyUk3JSTspJOSkn5aSclJNyUk7KSTkpJ+WknJSTclJOykk5KSflpJyUk3JSTspJOSkn5aSclJNyUk7KSTkpJ+WknJSTclJOykk5KSflpJyUk3JSTspJOSkn5aSclJNyUk7KSTkpJ+WknJST+gCHHnUY+FSFcgAAAABJRU5ErkJggg==\" alt=\"\">\r\n    <ul>\r\n        <li>Nama resmi : Indonesia</li>\r\n        <li>Ibu kota : Jakarta</li>\r\n        <li>Pemerintahan : Republik</li>\r\n        <li>Kepala Negara : Presiden</li>\r\n        <li>Kepala pemerintahan : Presiden</li>\r\n        <li>Bahasa utama : Bahasa Indonesia</li>\r\n        <li>Agama utama : Islam, Kristen, Hindu, Buddha, Katolik, dan Konghuchu</li>\r\n        <li>Suku bangsa : Dari hasil sensus 2010, jumlah suku bangsa ?? 1.128.</li>\r\n        <li>Penduduk : 267,7 juta jiwa</li>\r\n        <li>Mata uang : Rupiah</li>\r\n        <li>Hari Kemerdekaan : 17 Agustus 1945</li>\r\n        <li>Lagu Kebangsaan : Indonesia Raya</li>\r\n    </ul>\r\n    <br>\r\n    <h4>2. Brunai Darussalam</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/jpeg;base64,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\" alt=\"\">\r\n    <ul>\r\n        <li>Nama resmi : Negara Brunei Darussalam</li>\r\n        <li>Ibu kota : Bandar Seri Begawanarta</li>\r\n        <li>Pemerintahan : Kesultanan</li>\r\n        <li>Kepala Negara : Sultan</li>\r\n        <li>Bahasa utama : Melayu (resmi), Inggris, Tiongkok</li>\r\n        <li>Agama utama : Islam (resmi), Buddha, Kristen</li>\r\n        <li>Rakyat : Bangsa Melayu</li>\r\n        <li>Penduduk, th. 2015 : 0,4 juta jiwa</li>\r\n        <li>Mata uang : Dollar Brunei</li>\r\n        <li>Lagu kebangsaan : Allah Peliharakan Sultan</li>\r\n        <li>Hari kemerdekaan : 1 Januari 1984</li>\r\n    </ul>\r\n    <br>\r\n    <h4>3. Filipina</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/png;base64,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\" alt=\"\">\r\n    <ul>\r\n        <li>Nama resmi : Republik Filipina (Republica de Filipinas)</li>\r\n        <li>Ibu kota : Manila</li>\r\n        <li>Pemerintahan : Republik</li>\r\n        <li>Badan Legislatif : Dewan Nasional</li>\r\n        <li>Penduduk, th. 2015 : 103 juta jiwa</li>\r\n        <li>Bahasa : Filipino atau tagalog (resmi), Inggris (resmi), Cebuano,Ilocano, dialek lokal.</li>\r\n        <li>Agama : Katolik Roma, Protestan, Islam, Buddha</li>\r\n        <li>Satuan Mata Uang : Peso</li>\r\n        <li>Lagu kebangsaan : Lupang Hinirang.</li>\r\n        <li>Hari kemerdekaan : 12 Juni 1988, The American Friendship Day: 4 Juli 1948</li>\r\n    </ul>\r\n    <br>\r\n    <h4>4. Kamboja</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/png;base64,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\" alt=\"\">\r\n    <ul>\r\n        <li>Nama resmi : Republik Rakyat Kampuchea</li>\r\n        <li>Ibu kota : Phnom Penh</li>\r\n        <li>Pemerintahan : Republik Komunis</li>\r\n        <li>Kepala negara : Presiden (Dewan Negara)</li>\r\n        <li>Kepala pemerintahan : Ketua Dewan Menteri (Perdana menteri)</li>\r\n        <li>Badan legislatif : Majelis Nasional</li>\r\n        <li>Penduduk, th. 2015 : 15,4 juta jiwa</li>\r\n        <li>Bahasa : Khmer (resmi), Perancis</li>\r\n        <li>Agama : Buddha Theravada</li>\r\n        <li>Rakyat : Bangsa Kampuchea atau Kamboja</li>\r\n        <li>Mata uang : Rie</li>\r\n    </ul>\r\n    <br>\r\n    <h4>5. Laos</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAb1BMVEXOESYAKGj///8AKWzPECS3FzcAJWcAAFkAAFcAI2YAIWUAG2MAHWN7hKEAE2BDUH3z9fgADF0YLGggMmtQXYWFjqm4vMvX2uLh5u0qO3HIz9sAF2FpdJbQ1N2Lk6sABls0RHWco7dibJCXnrQ7SnmgNXE+AAACu0lEQVR4nO3di26iQBiGYZ3ddcAj1FKt2OKh93+NG2QTG/9xq0C+MeZ9rmDyBsZxOA0GAAAAAAAAAAAAAAAAAAAAAADA+I1Lgz+4NPiFS4MhLtHEoolFE4smFk2sB2kyasQeRiN+k3GZ+3n6slwuX9K5z8tx7AFFbpJOEv9avK3Wmatl69Vb8eqTSRp1VDGbTP17sXHWpnj304jjitekTLYfgSCNj21SRhtZrCZl9ZldLXI6jz6rWFXiNBlXs/8XOVWZVXHm2yhNqt3qxyK11a6KMbwITUZ+f1OR2t5HWLPom0zT2w6Sf4dKqv8FkjeZL36eSb7LFnP1ENVN8sNdRWqHXDxGcZN8e3cS57biKNom8/uPktORoj19pE2mi1ZJnFtIJ1plk9Hwvun1LBsqf5KVTfy6ZRLn1l44TmGT6valmrUXrmh1TVpPJg3hlKJrkrc/c2pr3Q+yrElZdEriXCHbOpA18R2TOCebZlVN5sfOTY6qlZuqSdl2aXKWqU4eUZPJrHMS52YTzWBFTZJ79kyuWSWawWqapF89JHHuS3PdR9Ok7D7D1o6aGUXTpJdTR3byaJrkvSRxTrOWlTQZH3pqcpBc8JE06WHB1tAs2yRNfOhKeRsbyfpe06TbX+IzzdaSZj7pvrBvZE8zn4yWvTVZKvZlJU12PSVxbvcsTXpa2dckq3tJk247sd8tnqYJx4nBfGLxuxPA+sRiHWvxf8fif7HF/kkA+2wW+7EW+/YW13cCuA5ocb04gPsKLO4/CeA+JYv72QK479Hi/tgA7qMO4H57i+cyAnh+J4DnvAJ4HjCA50YDeL44gOfQA3hfQQjvtQjg/SchvCcnhPcphfDerRDezxbGe/yu4H2PD44mFk0smlg0sWhi8R0Ei+9lWHxXxYr9qRsAAAAAAAAAAAAAAAAAAAAAAB7RX4OLpdud1nu3AAAAAElFTkSuQmCC\" alt=\"\">\r\n    <ul>\r\n        <li>Nama resmi : Republik Demokratik Rakyat Laos</li>\r\n        <li>Ibu kota : Vientiane</li>\r\n        <li>Pemerintahan : Republik Komunis</li>\r\n        <li>Kepala negara : Presiden</li>\r\n        <li>Kepala pemerintahan : Perdana Menteri</li>\r\n        <li>Badan legislatif : Dewan Nasional</li>\r\n        <li>Penduduk, th. 2015 : 6,9 juta jiwa</li>\r\n        <li>Bahasa : Lao (resmi), Perancis, Inggris</li>\r\n        <li>Agama : Buddha, animisme</li>\r\n        <li>Rakyat : Orang Lao atau Bangsa Lao</li>\r\n        <li>Mata uang : Kip</li>\r\n        <li>Hari Kemerdekaan : 2 Desember 1975</li>\r\n        <li>Lagu Kebangsaan : Pheng Kat Lao</li>\r\n    </ul>\r\n    <br>\r\n    <h4>6. Malaysia</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/png;base64,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\" alt=\"\">\r\n    <ul>\r\n        <li>Nama resmi : Malaysia</li>\r\n        <li>Ibu kota : Kuala Lumpur</li>\r\n        <li>Pemerintahan: Monarki Konstitusional</li>\r\n        <li>Kepala negara:Yang Dipertuan Agong Sultan Abdul Halim Muadzam Shah</li>\r\n        <li>Kepala pemerintahan : Perdana Menteri, Najib Tun Razak</li>\r\n        <li>Penduduk, th. 2015: 30,8 juta jiwa</li>\r\n        <li>Bahasa : Melayu (resmi), Cina, Tamil, Inggris</li>\r\n        <li>Agama : Islam (resmi), Kong Hu Cu, Tao, Buddha, Hindu, Kristen</li>\r\n        <li>Rakyat : Melayu</li>\r\n        <li>Satuan mata uang: Ringgit atau Dollar Malaysia (MS)</li>\r\n        <li>Lagu kebangsaan : Negaraku</li>\r\n        <li>Hari kemerdekaan: 31 Agustus 1957</li>\r\n    </ul>\r\n    <br>\r\n    <h4>7. Myanmar</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/png;base64,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\" alt=\"\">\r\n    <ul>\r\n        <li>Nama resmi : Republik Sosialis Uni Myanmar</li>\r\n        <li>Ibu kota : Yangon (dulu Rangon)</li>\r\n        <li>Pemerintahan : Republik</li>\r\n        <li>Kepala negara : Presiden</li>\r\n        <li>Kepala pemerintahan : Perdana Menteri</li>\r\n        <li>Badan legislatif : Dewan rakyat</li>\r\n        <li>Bahasa : Myanmar (resmi), Inggris, dialek lokal</li>\r\n        <li>Hari kemerdekaan : 4 Januari</li>\r\n        <li>Agama : Buddha, Islam, Hindu, Kristen dan kepercayaan animisme</li>\r\n        <li>Penduduk, th. 2015 : 52,1 juta jiwa</li>\r\n        <li>Lagu kebangsaan : Kaba Makye (Tanah Negaraku yang Bebas)</li>\r\n        <li>Jumlah penduduk : ?? 55 juta jiwa (2014)</li>\r\n        <li>Mata uang : Kyat</li>\r\n    </ul>\r\n    <br>\r\n    <h4>8. Singapura</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/png;base64,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\" alt=\"\">\r\n    <ul>\r\n        <li>Republik Singapura</li>\r\n        <li>Ibu kota : Singapura</li>\r\n        <li>Penduduk, th. 2015 : 5,5 juta jiwa</li>\r\n        <li>Bahasa : Melayu (resmi), Cina (resmi), Tamil (resmi), Inggris(resmi)</li>\r\n        <li>Agama : Buddha, Tao, Konghucu, Hindu, Islam, Kristen</li>\r\n        <li>Pemerintahan : Republik</li>\r\n        <li>Kepala negara : Presiden, sekarang Tony Tan Keng Yam</li>\r\n        <li>Kepala pemerintahan : Perdana Menteri, sekarang Lee Hsien Loong</li>\r\n        <li>Satuan Mata Uang : Dolar Singapura (S $)</li>\r\n        <li>Lagu kebangsaan : Majulah Singapura</li>\r\n        <li>Hari kemerdekaan : 9 Agustus 1965</li>\r\n    </ul>\r\n    <br>\r\n    <h4>9. Thailand</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAP1BMVEXeERgAI33//////v/6//8AJnX///3s9/oAHIUAJHsAIoIAIYcAAGDf6/P///n8/f/im5TWAADYAArReXodLnWj1oLlAAABSklEQVR4nO3dSU4dMRRA0QcJpKELzf7Xmq+CD9K7CwCJcwZVHl/JHpRl1wwAAAAAAAAAcHhim2e2uWeby1c/eXVqMT/enMbn9zceHs+5ZtOk3ucO785rLB80KU1Kk9KkNClNSpPSpDQpTUqT0qQ0KU1Kk9KkNClNSpPSpHy3L/s7Nb/Y5oVtfrPNH7a5Ypu/bHPBpklpUpqUJqVJaVKalCalSWlSmpQmpUlpUpqUJqVJaVKalCalSWlSmpQmpUlpUpqUJqVJaVKalCalSWlSmpQmpUlpUpqUJqVJaVKalCalSWlSmpQmpUlpUs4DlnOj5XxxzQ3b3LLNHZs7YUqTcp9SaVKalCalSWlSmpQmpUlpUpqUJqVJaVKalCalSWlSmpQmpUnNZ/9X+guyl1GalLlTxxr7wNmxxt6zzT+2eWQbAAAAAAAAAODwH8xhwAxrnnApAAAAAElFTkSuQmCC\" alt=\"\">\r\n    <ul>\r\n        <li>Nama resmi : Muang Thai atau Prathet Thai/Kerajaan</li>\r\n        <li>Ibu kota : Bangkok</li>\r\n        <li>Penduduk, th. 2015 : 65,1 juta jiwa</li>\r\n        <li>Bahasa : Thai (resmi), Inggris, Cina, Melayu, bahasa-bahasa suku</li>\r\n        <li>Agama : Buddha (resmi), Islam, Kristen, animisme</li>\r\n        <li>Pemerintahan : Kerajaan Konstitusional</li>\r\n        <li>Kepala negara : Raja Bhumibool Adulyadej</li>\r\n        <li>Kepala pemerintahan : Perdana Menteri, saat ini Prayuth Chan-ocha</li>\r\n        <li>Satuan Mata Uang : Bath Thailand</li>\r\n        <li>Lagu kebangsaan : Pleng Chard Thai</li>\r\n    </ul>\r\n    <br>\r\n    <h4>10. Vietnam</h4>\r\n    <img width=\"500px\" style=\"border: 1px solid black;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAACnCAMAAAAPIrEmAAAAeFBMVEXaJR3//wD98ALtkg7voQ3qhBDyrwv99AHbKRz+/ADncxPbLRzePhr1xwj++gH76gPhTxfmbhPztQrkYhX65ATgRRndNhv53QXgShjzuwnlaRTwqgvjXRbjVxb52QX41Ab3zgb0wQjvng3umA7sjQ/qghHpfBH75wN3Asl7AAADVElEQVR4nO3c6XaiQBAF4DQqqOBucI1rknn/NxxxZSlsUNJll/f7Ocs5dU8YrzQ1fHwAAAAAAAAAAAAAAAAAAAAAvKYw5J6ATbvNPQGb2Yx7Ai6+5/ncMzAZKDXgnoHJUKkh9ww8fE+pN73i5+pgzj0FCzeK7nJPwaHpRNGdJvccDEbqaMQ9B4PFKfqCew4GvVP0N7zil+psyT2JcfVL9Dr3JMb1LtF73JOY9qWuvrhnMWx3i77jnsWw8S36mHsWs/oqps89jVH7ePQ99zRGTeLRJ9zTmDRVCVPueQyqJaPXuOcxaJWMvuKex5xPlfLJPZEx3+no39wTGbNOR19zT2RKkE7+Pld8Ixu9wT2TIZts9A33TGYQ17tSAfdURvxQ0X+4pzKiQ0XvcE9lQtiiordsX7AIOo6WRyVXytP/zc5LfyA0a+TPtBL1Vz+xH/X0IR7hWPBMNtz+RfLXvtivGt2qg7esuaPvT/RpyhhbdFTvu1UmH9pVfO2cDivPs+7WJiBuUh6xtvB+tpqKf/kypy2frnjH2nWTZyvekjKnPVPx9pQ57fGKt6nMaY9WvGVlThs45YN7v9xTV6N8xdtY5rSyFW9pmdPKVLy9ZU4rXvFWlzmtWMXbXua0dpHoMv/7104fXOoS3VgfXOgSXV+fOyJxiW6vjx2RuERX8D5G4BLdVJ/6RN4SXU0f+kResa/0oU/ELdFlVuXyiblrO8usyuWTtkSXWZXLJ2yJjlwdyiPr1o1YlTvo0Xfx1j1puos8otoG4Yz69Q33tFUKiAOq7rHAqbv4lqQrnliVm5zvU6ZE4UtaosuuyrnXNzX49cxvClqiy6zKeYnDmMxBvfVLdDe/qWjpY/bMQb2QBxAH22Sw7DF7+qB+yzHlXwgTn+I98ph9+S/+Z7pSrvjEUew2p7mSFS/lYDYWqnvnm1p880jIe7n8W6TJ3UPHWMV3ZbylaHAN5GoCxSpexnu5huc0XoF/wPNLxYt4L9flei/2zPxS8SLeyzXPK3PapeIt2AHXcvPLnHaqeAHv5Tq+ZWtW6itKGH06CHhL0eh+mdOiird/t2KhKXPaoeLtfy+Xoytzml+3/orvP/zdZCDxcTMAAAAAAAAAAAAAAAAAAAAAAAAAABjwHw94IGr82attAAAAAElFTkSuQmCC\" alt=\"\">\r\n    <ul>\r\n        <li>Nama resmi : Cong Hoa Xa Hol Chu Viet Nam (Republik SosialisVietnam)</li>\r\n        <li>Ibu kota : Hanoi</li>\r\n        <li>Pemerintahan : Republik Komunis</li>\r\n        <li>Kepala Negara : Ketua Dewan Negara</li>\r\n        <li>Kepala pemerintahan : Perdana Menteri</li>\r\n        <li>Bahasa utama : Vietnam (resmi), selain itu digunakan bahasa Prancis, Cina,Inggris, Khmer</li>\r\n        <li>Agama utama : Buddha (Buddha), Kong Hu Chu, Kristen dan Islam</li>\r\n        <li>Rakyat : Disebut bangsa Vietnam</li>\r\n        <li>Penduduk, th. 2015 : 91,7 juta jiwa</li>\r\n        <li>Mata uang : Dong.</li>\r\n        <li>Hari kemerdekaan : 2 Juli 1976</li>\r\n        <li>Lagu Kebangsaan : Tien Quan Ca</li>\r\n    </ul>\r\n    <br>\r\n    <h3>B. Interaksi Antar Negara Negara ASEAN</h3>\r\n    <h4>1. Pengertian, Faktor Pendorong, dan Penghambat Kerja Sama</h4>\r\n    <h5>a. Faktor Pendorong</h5>\r\n    <ul>\r\n        <li>Kesamaan dan perbedaan sumber daya alam</li>\r\n        <li>Kesamaan dan perbedaan wilayah (kondisi geografi)</li>\r\n    </ul>\r\n    <br>\r\n    <h5>b. Faktor Penghambat</h5>\r\n    <ul>\r\n        <li>Perbedaan Ideologi</li>\r\n        <li>Konflik dan peperangan</li>\r\n        <li>Kebijakan protektif</li>\r\n        <li>Perbedaan kepentingan tiap-tiap Negara</li>\r\n    </ul>\r\n    <br>\r\n    <h4>2. Bentuk-bentuk Kerjasama</h4>\r\n    <ul>\r\n        <li>Bidang Sosial dan Budaya</li>\r\n        <li>Bidang Politik dan Keamanan</li>\r\n        <li>Bidang Pendidikan</li>\r\n    </ul>', 'gratis', 6, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quis`
--

CREATE TABLE `quis` (
  `id_quis` int(11) NOT NULL,
  `no_soal` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jawaban_a` text NOT NULL,
  `jawaban_b` text NOT NULL,
  `jawaban_c` text NOT NULL,
  `jawaban_d` text NOT NULL,
  `jawaban_benar` text NOT NULL,
  `id_judul_quis` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quis`
--

INSERT INTO `quis` (`id_quis`, `no_soal`, `soal`, `jawaban_a`, `jawaban_b`, `jawaban_c`, `jawaban_d`, `jawaban_benar`, `id_judul_quis`, `id_mapel`) VALUES
(1, 1, 'Hasil penjumlahan dari 70 + 30 adalah?', '85', '90', '110', '100', 'd', 1, 1),
(4, 2, 'Hasil pengurangan dari 20 - 5 -3 adalah..?', '12', '11', '10', '9', 'a', 1, 1),
(5, 3, 'Hasil dari 20 + 10 - 5 adalah..?', '20', '10', '25', '30', 'c', 1, 1),
(6, 4, 'Hasil perhitungan dari 20 + 10 + 5 - 2', '30', '33', '32', '31', 'b', 1, 1),
(7, 1, 'Ada berapa negara yang ada di ASEAN?', '12', '11', '10', '9', 'b', 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submission`
--

CREATE TABLE `submission` (
  `id_submission` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `harga` int(15) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `sampai_tgl` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_bayar`, `harga`, `bukti`, `sampai_tgl`, `id_user`) VALUES
(2, '2022-01-15', 30000, '61e2ca9727f31.jpg', '15-04-2022', 5),
(3, '2022-01-16', 30000, '61e407b76e626.jpg', '16-04-2022', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'gratis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `status`) VALUES
(4, 'jihad', 'jihad@gmail.com', '$2y$10$Yd6JEjTKSF4TUPaSHrdiN.27hv/uCs1uVGcwvtY6T8PtOav1m9Cvu', 'berlangganan'),
(5, 'laskar', 'laskar@gmail.com', '$2y$10$QGRZOOPovCXuShAMZNtFQurQ2qufvQUCqp5I8..N1N2ENhzvEtdA.', 'berlangganan'),
(8, 'aldin', 'aldin@gmail.com', '$2y$10$dOi3MANFApnvJ1Fs4xdYneWAfLyErunmOmfvjwpPXIYJcTKgNy2RK', 'gratis'),
(9, 'abdul', 'abdul@gmail.com', '$2y$10$yTflQgbkSNARLw8fdeINQOIgEXwiO3uf.UWYgcVMvCQQDGyQN.BPq', 'gratis');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `judul_quis`
--
ALTER TABLE `judul_quis`
  ADD PRIMARY KEY (`id_judul_quis`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `quis`
--
ALTER TABLE `quis`
  ADD PRIMARY KEY (`id_quis`),
  ADD KEY `id_judul_quis` (`id_judul_quis`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id_submission`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `judul_quis`
--
ALTER TABLE `judul_quis`
  MODIFY `id_judul_quis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `quis`
--
ALTER TABLE `quis`
  MODIFY `id_quis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `submission`
--
ALTER TABLE `submission`
  MODIFY `id_submission` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `judul_quis`
--
ALTER TABLE `judul_quis`
  ADD CONSTRAINT `judul_quis_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `judul_quis_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `materi_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `quis`
--
ALTER TABLE `quis`
  ADD CONSTRAINT `quis_ibfk_1` FOREIGN KEY (`id_judul_quis`) REFERENCES `judul_quis` (`id_judul_quis`),
  ADD CONSTRAINT `quis_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
