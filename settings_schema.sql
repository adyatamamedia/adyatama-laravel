-- ======================================================
-- Settings Schema for ADYATAMA SCHOOL
-- Generated: Complete settings schema for Laravel + CI4 integration
-- ======================================================

-- Visual Identity Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('site_name', 'ADYATAMA SCHOOL', 'text', 'visual_identity', 'Nama Sekolah'),
('site_slogan', 'Berkarakter, Berkualitas, Berprestasi', 'text', 'visual_identity', 'Slogan Sekolah'),
('site_logo', '/uploads/logo.png', 'image', 'visual_identity', 'Logo Utama Website'),
('site_favicon', '/uploads/favicon.ico', 'image', 'visual_identity', 'Favicon Website'),
('og_image', '/uploads/og-image.jpg', 'image', 'visual_identity', 'Open Graph Image'),
('primary_color', '#0ea5e9', 'color', 'visual_identity', 'Warna Primer Website'),
('secondary_color', '#0284c7', 'color', 'visual_identity', 'Warna Sekunder Website'),
('theme_color', '#0ea5e9', 'color', 'visual_identity', 'Color scheme untuk mobile'),
('show_branding', '1', 'boolean', 'visual_identity', 'Tampilkan logo/branding di website'),
('hero_title', 'Membentuk Generasi Qurani dan Berprestasi', 'text', 'visual_identity', 'Judul Hero Section'),
('hero_description', 'Sekolah Islam terpadu dengan fokus pada karakter dan prestasi akademik.', 'textarea', 'visual_identity', 'Deskripsi Hero Section'),
('hero_bg_image', '/uploads/hero-bg.jpg', 'image', 'visual_identity', 'Background Image Hero Section'),
('hero_cta_text', 'Daftar Online MI', 'text', 'visual_identity', 'Teks tombol Call-to-Action'),
('hero_cta_url', '/daftar-online', 'url', 'visual_identity', 'Link Call-to-Action');

-- Academic Information Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('school_type', 'Sekolah Islam Terpadu', 'text', 'academic_info', 'Jenjang sekolah (MI, SD, SMP, SMA)'),
('school_level', 'MI', 'text', 'academic_info', 'Tingkat pendidikan'),
('curriculum', 'Kurikulum Merdeka + Integrasi Nilai Islam', 'textarea', 'academic_info', 'Kurikulum yang digunakan'),
('academic_year', '2025/2026', 'text', 'academic_info', 'Tahun Ajaran'),
('accreditation', 'A', 'text', 'academic_info', 'Status Akreditasi'),
('school_motto', 'Ilmu, Iman dan Amal', 'text', 'academic_info', 'Motto Sekolah'),
('school_vision', 'Menjadi sekolah unggul berbasis nilai-nilai Islam', 'textarea', 'academic_info', 'Visi Sekolah'),
('school_mission', 'Mewujudkan siswa beriman, berilmu, dan beramal', 'textarea', 'academic_info', 'Misi Sekolah');

-- Contact & Location Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('school_name', 'Yayasan Adyatama School', 'text', 'contact_info', 'Nama Lengkap Lembaga'),
('school_email', 'info@adyatama.sch.id', 'email', 'contact_info', 'Email Umum'),
('school_phone', '(021) 123456789', 'tel', 'contact_info', 'Telepon Kantor'),
('school_address', 'Jl. Pendidikan No. 123, Jakarta Selatan', 'textarea', 'contact_info', 'Alamat Lengkap'),
('whatsapp_number', '+628123456789', 'tel', 'contact_info', 'Nomor WhatsApp (format: +62xxx)'),
('whatsapp_message', 'Halo Admin Adyatama School, saya ingin bertanya tentang...', 'textarea', 'contact_info', 'Pesan Default WhatsApp'),
('emergency_contact', '(021) 987654321', 'tel', 'contact_info', 'Kontak Darurat'),
('office_hours', 'Senin-Jumat 07:00-15:00', 'text', 'contact_info', 'Jam Operasional'),
('maps_embed_url', '', 'url', 'contact_info', 'Link Embed Google Maps'),
('maps_embed_iframe', '', 'textarea', 'contact_info', 'Kode Iframe Google Maps'),
('latitude', '-6.200000', 'text', 'contact_info', 'Koordinat Latitude'),
('longitude', '106.816666', 'text', 'contact_info', 'Koordinat Longitude');

-- Admission & Registration Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('registration_period', 'Januari - Juli 2025', 'text', 'admission_info', 'Periode Pendaftaran'),
('admission_deadline', '31 July 2025', 'date', 'admission_info', 'Deadline Pendaftaran'),
('registration_status', 'open', 'text', 'admission_info', 'Status: open/closed'),
('min_age', '4', 'number', 'admission_info', 'Minimal usia masuk'),
('max_age', '12', 'number', 'admission_info', 'Maksimal usia masuk'),
('registration_fee', 'Rp 150.000', 'text', 'admission_info', 'Biaya Pendaftaran'),
('annual_fee', 'Rp 1.200.000', 'text', 'admission_info', 'Biaya Tahunan'),
('additional_documents', 'Surat keterangan sehat, Surat akte lahir', 'textarea', 'admission_info', 'Dokumen tambahan yang dibutuhkan'),
('admission_procedure', '1. Isi formulir pendaftaran\n2. Upload dokumen\n3. Verifikasi admin\n4. Konfirmasi pendaftaran', 'textarea', 'admission_info', 'Prosedur pendaftaran');

-- Social Media Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('instagram_url', 'https://instagram.com/adyatamaschool', 'url', 'social_media', 'Instagram URL'),
('facebook_url', 'https://facebook.com/adyatamaschool', 'url', 'social_media', 'Facebook Page URL'),
('youtube_url', 'https://youtube.com/@adyatamaschool', 'url', 'social_media', 'YouTube Channel URL'),
('tiktok_url', 'https://tiktok.com/@adyatamaschool', 'url', 'social_media', 'TikTok URL'),
('twitter_url', 'https://twitter.com/adyatamaschool', 'url', 'social_media', 'Twitter/X URL'),
('linkedin_url', '', 'url', 'social_media', 'LinkedIn URL'),
('website_url', 'https://adyatamaschool.sch.id', 'url', 'social_media', 'Website Utama'),
('social_media_widget', '1', 'boolean', 'social_media', 'Tampilkan widget media sosial');

-- Legal Documents Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('sk_pendirian', '', 'file', 'legal_documents', 'SK Pendirian Yayasan'),
('izin_operasional', '', 'file', 'legal_documents', 'Izin Operasional Sekolah'),
('akreditasi', '', 'file', 'legal_documents', 'Sertifikat Akreditasi'),
('kurikulum', '', 'file', 'legal_documents', 'Ijin Kurikulum'),
('legalitas_lain', '', 'textarea', 'legal_documents', 'Legalitas Lainnya (deskripsi saja)'),
('npsn', '123456789', 'text', 'legal_documents', 'Nomor Pokok Sekolah Nasional'),
('nss', '123456789', 'text', 'legal_documents', 'Nomor Statistik Sekolah');

-- SEO & Web Performance Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('meta_description', 'Sekolah Islam Terpadu Adyatama School - Berkarakter, Berkualitas, Berprestasi', 'textarea', 'seo_config', 'Deskripsi Website (max 160 karakter)'),
('meta_keywords', 'sekolah, pendidikan, islam, adyatama, tk, sd, smp, sma', 'textarea', 'seo_config', 'Keywords (dipisah dengan koma)'),
('google_analytics', '', 'textarea', 'seo_config', 'Google Analytics Tracking Code'),
('google_tag_manager', '', 'textarea', 'seo_config', 'Google Tag Manager Code'),
('facebook_pixel', '', 'textarea', 'seo_config', 'Facebook Pixel ID'),
('site_verification', '', 'text', 'seo_config', 'Google Site Verification Code'),
('robots_txt', 'User-agent: *\nAllow: /\nSitemap: /sitemap.xml', 'textarea', 'seo_config', 'Custom robots.txt content'),
('sitemap_enabled', '1', 'boolean', 'seo_config', 'Aktifkan sitemap.xml'),
('cdn_enabled', '0', 'boolean', 'seo_config', 'Gunakan CDN untuk assets'),
('minify_html', '0', 'boolean', 'seo_config', 'Minify HTML output');

-- Email & Notification Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('email_from', 'info@adyatama.sch.id', 'email', 'email_config', 'Alamat email pengirim'),
('email_from_name', 'Adyatama School', 'text', 'email_config', 'Nama pengirim email'),
('smtp_host', 'smtp.gmail.com', 'text', 'email_config', 'SMTP Host'),
('smtp_port', '587', 'number', 'email_config', 'SMTP Port'),
('smtp_username', '', 'text', 'email_config', 'SMTP Username'),
('smtp_password', '', 'text', 'email_config', 'SMTP Password'),
('email_notifications', '1', 'boolean', 'email_config', 'Aktifkan notifikasi email'),
('application_notification', '1', 'boolean', 'email_config', 'Notifikasi pendaftaran baru'),
('comment_notification', '1', 'boolean', 'email_config', 'Notifikasi komentar baru');

-- Security & Privacy Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('recaptcha_enabled', '0', 'boolean', 'security', 'Aktifkan reCAPTCHA'),
('recaptcha_site_key', '', 'text', 'security', 'reCAPTCHA Site Key'),
('recaptcha_secret_key', '', 'text', 'security', 'reCAPTCHA Secret Key'),
('gdpr_compliance', '0', 'boolean', 'security', 'Aktifkan GDPR Compliance'),
('cookie_consent', '1', 'boolean', 'security', 'Tampilkan cookie consent'),
('privacy_policy', 'Kebijakan privasi sekolah...', 'textarea', 'security', 'Kebijakan privasi'),
('terms_of_service', 'Syarat dan ketentuan penggunaan...', 'textarea', 'security', 'Terms of Service'),
('data_retention_days', '365', 'number', 'security', 'Hari retensi data'),
('max_login_attempts', '5', 'number', 'security', 'Maksimal percobaan login'),
('login_lockout_time', '900', 'number', 'security', 'Waktu lockout login (detik)');

-- Academic Calendar Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('academic_calendar_url', '/uploads/academic-calendar.pdf', 'file', 'academic_calendar', 'Link Kalender Akademik'),
('holidays_schedule', '1 Jan: Tahun Baru\n25 Jan: Tahun Baru Imlek', 'textarea', 'academic_calendar', 'Jadwal Libur'),
('exam_schedule', 'Ujian Tengah Semester: 15 Maret - 5 April 2025', 'textarea', 'academic_calendar', 'Jadwal Ujian'),
('event_announcement', '', 'textarea', 'academic_calendar', 'Pengumuman Event Terkini'),
('upcoming_events', '', 'textarea', 'academic_calendar', 'Event Mendatang');

-- Website Behavior Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('maintenance_mode', '0', 'boolean', 'website_behavior', 'Mode maintenance'),
('maintenance_message', 'Website sedang dalam perawatan, akan kembali pada pukul 10:00 WIB', 'textarea', 'website_behavior', 'Pesan maintenance mode'),
('guest_comment', '1', 'boolean', 'website_behavior', 'Izinkan komentar guest'),
('auto_approve_comments', '0', 'boolean', 'website_behavior', 'Auto approve komentar'),
('comment_captcha', '1', 'boolean', 'website_behavior', 'Aktifkan captcha komentar'),
('posts_per_page', '9', 'number', 'website_behavior', 'Jumlah post per halaman'),
('galleries_per_page', '12', 'number', 'website_behavior', 'Jumlah galeri per halaman'),
('enable_reactions', '1', 'boolean', 'website_behavior', 'Aktifkan sistem reaksi'),
('enable_sharing', '1', 'boolean', 'website_behavior', 'Aktifkan share social media'),
('enable_search', '1', 'boolean', 'website_behavior', 'Aktifkan fitur pencarian'),
('search_results_per_page', '10', 'number', 'website_behavior', 'Hasil pencarian per halaman');

-- Payment & Donation Settings
INSERT INTO settings (key_name, value, type, group_name, description) VALUES
('payment_enabled', '0', 'boolean', 'payment_config', 'Aktifkan payment gateway'),
('payment_method', 'manual_transfer', 'text', 'payment_config', 'Metode pembayaran (manual_transfer, midtrans, etc)'),
('bank_account_name', 'Yayasan Adyatama School', 'text', 'payment_config', 'Nama rekening'),
('bank_account_number', '1234567890', 'text', 'payment_config', 'Nomor rekening'),
('bank_name', 'Bank BRI', 'text', 'payment_config', 'Nama bank'),
('donation_enabled', '0', 'boolean', 'payment_config', 'Aktifkan sistem donasi'),
('donation_message', 'Bantu kami dalam mendidik generasi qurani...', 'textarea', 'payment_config', 'Pesan donasi');

-- Done