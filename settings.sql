-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2025 at 02:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adyatama_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `type` enum('text','textarea','number','boolean','image','json') DEFAULT 'text',
  `group_name` varchar(50) DEFAULT 'general',
  `description` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key_name`, `value`, `type`, `group_name`, `description`, `updated_at`, `created_at`) VALUES
(1, 'site_title', 'MI Manarul Huda', 'text', 'general', 'Judul Website', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(2, 'site_tagline', 'Berkarakter, Berkualitas, Berprestasi', 'text', 'general', 'Tagline Website', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(3, 'site_description', 'Sekolah Islam Terpadu yang mengutamakan pendidikan karakter dan prestasi akademik', 'textarea', 'general', 'Deskripsi Singkat Sekolah', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(4, 'timezone', 'Asia/Jakarta', 'text', 'general', 'Zona Waktu', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(5, 'language', 'id', 'text', 'general', 'Bahasa Default (id/en)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(6, 'date_format', 'd-m-Y', 'text', 'general', 'Format Tanggal', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(7, 'site_name', 'MI Manarul Huda', 'text', 'visual_identity', 'Nama Sekolah', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(8, 'site_slogan', 'Berkarakter, Berkualitas, Berprestasi', 'text', 'visual_identity', 'Tagline/Motto Sekolah', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(9, 'site_logo', 'uploads/settings/site_logo_1764230049.png', 'image', 'visual_identity', 'Logo Utama Website (PNG)', '2025-11-27 07:54:09', '2025-11-27 07:50:34'),
(10, 'site_favicon', 'uploads/settings/site_favicon_1764230090.png', 'image', 'visual_identity', 'Favicon Website (ICO/PNG 32x32)', '2025-11-27 07:54:50', '2025-11-27 07:50:34'),
(11, 'og_image', 'uploads/settings/og_image_1764230090.png', 'image', 'visual_identity', 'Default OG Image (1200x630px)', '2025-11-27 07:54:50', '2025-11-27 07:50:34'),
(12, 'primary_color', '#0ea5e9', 'text', 'visual_identity', 'Warna Primer Website', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(13, 'hero_bg_image', 'uploads/settings/hero_bg_image_1764230065.jpg', 'image', 'visual_identity', 'Background Hero Section', '2025-11-27 07:54:25', '2025-11-27 07:50:34'),
(14, 'school_name', 'Yayasan Adyatama', 'text', 'contact_info', 'Nama Lembaga Resmi', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(15, 'school_email', 'info@adyatama.sch.id', 'text', 'contact_info', 'Email Umum', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(16, 'school_phone', '(021) 123456789', 'text', 'contact_info', 'Telepon Kantor', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(17, 'school_address', 'Jl. Pendidikan No. 123, Jakarta Selatan', 'textarea', 'contact_info', 'Alamat Lengkap', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(18, 'whatsapp_number', '+628123456789', 'text', 'contact_info', 'Nomor WhatsApp (format: +62xxx)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(19, 'whatsapp_message', 'Halo Admin Adyatama School, saya ingin bertanya tentang...', 'textarea', 'contact_info', 'Pesan Default WhatsApp', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(20, 'latitude', '-6.2088', 'text', 'contact_info', 'Latitude Lokasi', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(21, 'longitude', '106.8456', 'text', 'contact_info', 'Longitude Lokasi', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(22, 'maps_embed_url', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4685.544753842309!2d112.7185464!3d-8.0960681!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd623c3430d1a13%3A0x40e39a40c495cf74!2sMI%20Manarul%20Huda!5e1!3m2!1sid!2sid!4v1764512403967!5m2!1sid!2sid', 'text', 'contact_info', 'Link Google Maps', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(23, 'registration_status', 'open', 'text', 'admission_info', 'Status Pendaftaran (open/closed)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(24, 'registration_period', 'Januari - Juli 2025', 'text', 'admission_info', 'Periode Pendaftaran', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(25, 'admission_deadline', '2025-07-31', 'text', 'admission_info', 'Deadline Pendaftaran', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(26, 'registration_fee', 'Rp 500.000', 'text', 'admission_info', 'Biaya Pendaftaran', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(27, 'annual_fee', 'Rp 12.000.000', 'text', 'admission_info', 'Biaya Tahunan', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(28, 'min_age', '5', 'number', 'admission_info', 'Minimal Usia Pendaftaran', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(29, 'max_age', '18', 'number', 'admission_info', 'Maksimal Usia Pendaftaran', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(30, 'admission_procedure', '1. Isi formulir online\r\n2. Upload dokumen persyaratan\r\n3. Bayar biaya pendaftaran\r\n4. Tes masuk\r\n5. Pengumuman', 'textarea', 'admission_info', 'Prosedur Pendaftaran', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(31, 'additional_documents', '- Fotocopy Akta Kelahiran\r\n- Fotocopy Kartu Keluarga\r\n- Pas Foto 3x4 (3 lembar)\r\n- Rapor terakhir', 'textarea', 'admission_info', 'Dokumen yang Diperlukan', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(32, 'instagram_url', 'https://instagram.com/adyatamaschool', 'text', 'social_media', 'Instagram URL', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(33, 'facebook_url', 'https://facebook.com/adyatamaschool', 'text', 'social_media', 'Facebook Page URL', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(34, 'youtube_url', 'https://youtube.com/@adyatamaschool', 'text', 'social_media', 'YouTube Channel URL', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(35, 'tiktok_url', 'https://tiktok.com/@adyatamaschool', 'text', 'social_media', 'TikTok URL', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(36, 'twitter_url', '', 'text', 'social_media', 'Twitter/X URL', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(37, 'social_media_widget', '1', 'boolean', 'social_media', 'Tampilkan Widget Social Media', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(38, 'sk_pendirian', '', 'text', 'legal_documents', 'SK Pendirian Yayasan (PDF/DOC)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(39, 'izin_operasional', '', 'text', 'legal_documents', 'Izin Operasional Sekolah (PDF/DOC)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(40, 'akreditasi', '', 'text', 'legal_documents', 'Sertifikat Akreditasi (PDF/JPG)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(41, 'kurikulum', '', 'text', 'legal_documents', 'Ijin Kurikulum (PDF/DOC)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(42, 'npsn', '', 'text', 'legal_documents', 'Nomor Pokok Sekolah Nasional', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(43, 'nss', '', 'text', 'legal_documents', 'Nomor Statistik Sekolah', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(44, 'privacy_policy', '', 'textarea', 'legal_documents', 'Kebijakan Privasi', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(45, 'terms_of_service', '', 'textarea', 'legal_documents', 'Syarat dan Ketentuan', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(46, 'meta_description', 'Sekolah Islam Terpadu Adyatama School - Berkarakter, Berkualitas, Berprestasi', 'textarea', 'seo_config', 'Meta Description (max 160 karakter)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(47, 'meta_keywords', 'sekolah, pendidikan, islam, adyatama, tk, sd, smp, sma', 'textarea', 'seo_config', 'Meta Keywords (dipisah koma)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(48, 'google_analytics', '', 'textarea', 'seo_config', 'Google Analytics Tracking Code', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(49, 'robots_txt', 'User-agent: *\r\nAllow: /', 'textarea', 'seo_config', 'Konten robots.txt', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(50, 'sitemap_enabled', '1', 'boolean', 'seo_config', 'Aktifkan Sitemap XML', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(51, 'smtp_host', 'smtp.gmail.com', 'text', 'email_config', 'SMTP Host', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(52, 'smtp_port', '587', 'number', 'email_config', 'SMTP Port', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(53, 'smtp_username', '', 'text', 'email_config', 'SMTP Username', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(54, 'smtp_password', '', 'text', 'email_config', 'SMTP Password', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(55, 'smtp_encryption', 'tls', 'text', 'email_config', 'SMTP Encryption (tls/ssl)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(56, 'email_from', 'noreply@adyatama.sch.id', 'text', 'email_config', 'Email Pengirim', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(57, 'email_from_name', 'Adyatama School', 'text', 'email_config', 'Nama Pengirim', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(58, 'email_notifications', '1', 'boolean', 'email_config', 'Aktifkan Notifikasi Email', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(59, 'application_notification', '1', 'boolean', 'email_config', 'Notifikasi Pendaftaran Baru', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(60, 'comment_notification', '1', 'boolean', 'email_config', 'Notifikasi Komentar Baru', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(61, 'recaptcha_enabled', '0', 'boolean', 'security', 'Aktifkan reCAPTCHA', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(62, 'recaptcha_site_key', '', 'text', 'security', 'reCAPTCHA Site Key', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(63, 'recaptcha_secret_key', '', 'text', 'security', 'reCAPTCHA Secret Key', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(64, 'max_login_attempts', '5', 'number', 'security', 'Maksimal Percobaan Login', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(65, 'login_lockout_time', '900', 'number', 'security', 'Durasi Lockout (detik)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(66, 'gdpr_compliance', '1', 'boolean', 'security', 'Aktifkan GDPR Compliance', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(67, 'cookie_consent', '1', 'boolean', 'security', 'Tampilkan Cookie Consent', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(68, 'data_retention_days', '365', 'number', 'security', 'Lama Retensi Data (hari)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(69, 'academic_year', '2024/2025', 'text', 'academic_calendar', 'Tahun Ajaran', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(70, 'semester', 'Ganjil', 'text', 'academic_calendar', 'Semester Aktif', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(71, 'academic_calendar_url', '', 'text', 'academic_calendar', 'File Kalender Akademik (PDF)', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(72, 'holidays_schedule', '17-08-2025 Hari Kemerdekaan\r\n25-12-2025 Natal', 'textarea', 'academic_calendar', 'Jadwal Libur', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(73, 'exam_schedule', '', 'textarea', 'academic_calendar', 'Jadwal Ujian', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(74, 'event_announcement', '', 'textarea', 'academic_calendar', 'Pengumuman Event', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(75, 'upcoming_events', '', 'textarea', 'academic_calendar', 'Event Mendatang', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(76, 'maintenance_mode', '0', 'boolean', 'website_behavior', 'Mode Maintenance', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(77, 'maintenance_message', 'Website sedang dalam perbaikan. Mohon kembali lagi nanti.', 'textarea', 'website_behavior', 'Pesan Maintenance', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(78, 'posts_per_page', '12', 'number', 'website_behavior', 'Jumlah Post per Halaman', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(79, 'galleries_per_page', '12', 'number', 'website_behavior', 'Jumlah Galeri per Halaman', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(80, 'search_results_per_page', '10', 'number', 'website_behavior', 'Hasil Pencarian per Halaman', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(81, 'enable_search', '1', 'boolean', 'website_behavior', 'Aktifkan Fitur Pencarian', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(82, 'enable_sharing', '1', 'boolean', 'website_behavior', 'Aktifkan Tombol Share', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(83, 'enable_reactions', '1', 'boolean', 'website_behavior', 'Aktifkan Reaksi Emoji', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(84, 'guest_comment', '0', 'boolean', 'website_behavior', 'Izinkan Komentar Tamu', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(85, 'auto_approve_comments', '0', 'boolean', 'website_behavior', 'Auto Approve Komentar', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(86, 'comment_captcha', '1', 'boolean', 'website_behavior', 'Captcha untuk Komentar', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(87, 'cdn_enabled', '0', 'boolean', 'website_behavior', 'Gunakan CDN', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(88, 'minify_html', '0', 'boolean', 'website_behavior', 'Minify HTML Output', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(89, 'payment_enabled', '1', 'boolean', 'payment_config', 'Aktifkan Payment Gateway', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(90, 'payment_method', 'manual_transfer', 'text', 'payment_config', 'Metode Pembayaran Default', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(91, 'bank_name', 'Bank Mandiri', 'text', 'payment_config', 'Nama Bank', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(92, 'bank_account_name', 'Yayasan Adyatama', 'text', 'payment_config', 'Nama Pemilik Rekening', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(93, 'bank_account_number', '1234567890', 'text', 'payment_config', 'Nomor Rekening', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(94, 'midtrans_server_key', '', 'text', 'payment_config', 'Midtrans Server Key', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(95, 'midtrans_client_key', '', 'text', 'payment_config', 'Midtrans Client Key', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(96, 'midtrans_is_production', '0', 'boolean', 'payment_config', 'Midtrans Production Mode', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(97, 'donation_enabled', '1', 'boolean', 'payment_config', 'Aktifkan Fitur Donasi', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(98, 'donation_message', 'Dukung pendidikan berkualitas di Adyatama School', 'textarea', 'payment_config', 'Pesan Donasi', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(99, 'school_vision', 'Menjadi lembaga pendidikan Islam terpadu yang unggul dalam prestasi dan berakhlak mulia', 'textarea', 'academic_info', 'Visi Sekolah', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(100, 'school_mission', '1. Menyelenggarakan pendidikan berkualitas\r\n2. Membentuk karakter Islami\r\n3. Mengembangkan potensi siswa', 'textarea', 'academic_info', 'Misi Sekolah', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(101, 'curriculum', 'Kurikulum Merdeka dengan pendekatan Islam Terpadu', 'textarea', 'academic_info', 'Kurikulum', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(102, 'accreditation', 'A', 'text', 'academic_info', 'Akreditasi', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(103, 'total_students', '500', 'number', 'academic_info', 'Jumlah Siswa', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(104, 'total_teachers', '50', 'number', 'academic_info', 'Jumlah Guru', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(105, 'total_classes', '24', 'number', 'academic_info', 'Jumlah Kelas', '2025-11-30 14:20:21', '2025-11-27 07:50:34'),
(106, 'facilities', '- Laboratorium Komputer\r\n- Perpustakaan\r\n- Masjid\r\n- Lapangan Olahraga\r\n- Kantin', 'textarea', 'academic_info', 'Fasilitas Sekolah', '2025-11-30 14:20:21', '2025-11-27 07:50:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key_name` (`key_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
