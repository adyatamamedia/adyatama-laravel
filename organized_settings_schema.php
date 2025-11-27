<?php

// File ini berisi skema pengaturan yang telah dikelompokkan menjadi beberapa kategori
// untuk menghindari tampilan yang terlalu panjang ke bawah di tab settings

$settingsSchema = [
    // Basic Info Group
    [
        'group_name' => 'basic_info',
        'display_name' => 'Basic Information',
        'description' => 'Informasi dasar sekolah',
        'settings' => [
            [
                'key_name' => 'site_name',
                'value' => 'ADYATAMA SCHOOL',
                'type' => 'text',
                'description' => 'Nama Sekolah'
            ],
            [
                'key_name' => 'school_name',
                'value' => 'Yayasan Adyatama School',
                'type' => 'text',
                'description' => 'Nama Lengkap Lembaga'
            ],
            [
                'key_name' => 'school_type',
                'value' => 'Sekolah Islam Terpadu',
                'type' => 'text',
                'description' => 'Jenjang sekolah (MI, SD, SMP, SMA)'
            ],
            [
                'key_name' => 'school_level',
                'value' => 'MI',
                'type' => 'text',
                'description' => 'Tingkat pendidikan'
            ],
            [
                'key_name' => 'site_slogan',
                'value' => 'Berkarakter, Berkualitas, Berprestasi',
                'type' => 'text',
                'description' => 'Slogan Sekolah'
            ],
            [
                'key_name' => 'school_motto',
                'value' => 'Ilmu, Iman dan Amal',
                'type' => 'text',
                'description' => 'Motto Sekolah'
            ],
        ]
    ],
    
    // Branding Group
    [
        'group_name' => 'branding',
        'display_name' => 'Branding',
        'description' => 'Elemen branding dan visual',
        'settings' => [
            [
                'key_name' => 'site_logo',
                'value' => '',
                'type' => 'image',
                'description' => 'Logo Utama Website'
            ],
            [
                'key_name' => 'site_favicon',
                'value' => '',
                'type' => 'image',
                'description' => 'Favicon Website'
            ],
            [
                'key_name' => 'og_image',
                'value' => '',
                'type' => 'image',
                'description' => 'Open Graph Image'
            ],
            [
                'key_name' => 'primary_color',
                'value' => '#0ea5e9',
                'type' => 'color',
                'description' => 'Warna Primer Website'
            ],
            [
                'key_name' => 'secondary_color',
                'value' => '#0284c7',
                'type' => 'color',
                'description' => 'Warna Sekunder Website'
            ],
            [
                'key_name' => 'theme_color',
                'value' => '#0ea5e9',
                'type' => 'color',
                'description' => 'Color scheme untuk mobile'
            ],
            [
                'key_name' => 'show_branding',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Tampilkan logo/branding di website'
            ],
        ]
    ],
    
    // Hero Section Group
    [
        'group_name' => 'hero_section',
        'display_name' => 'Hero Section',
        'description' => 'Pengaturan tampilan utama di homepage',
        'settings' => [
            [
                'key_name' => 'hero_title',
                'value' => 'Membentuk Generasi Qurani dan Berprestasi',
                'type' => 'text',
                'description' => 'Judul Hero Section'
            ],
            [
                'key_name' => 'hero_description',
                'value' => 'Sekolah Islam terpadu dengan fokus pada karakter dan prestasi akademik.',
                'type' => 'textarea',
                'description' => 'Deskripsi Hero Section'
            ],
            [
                'key_name' => 'hero_bg_image',
                'value' => '',
                'type' => 'image',
                'description' => 'Background Image Hero Section'
            ],
            [
                'key_name' => 'hero_cta_text',
                'value' => 'Daftar Online MI',
                'type' => 'text',
                'description' => 'Teks tombol Call-to-Action'
            ],
            [
                'key_name' => 'hero_cta_url',
                'value' => '/daftar-online',
                'type' => 'url',
                'description' => 'Link Call-to-Action'
            ],
        ]
    ],
    
    // Academic Information Group
    [
        'group_name' => 'academic_info',
        'display_name' => 'Academic Information',
        'description' => 'Informasi akademik sekolah',
        'settings' => [
            [
                'key_name' => 'curriculum',
                'value' => 'Kurikulum Merdeka + Integrasi Nilai Islam',
                'type' => 'textarea',
                'description' => 'Kurikulum yang digunakan'
            ],
            [
                'key_name' => 'academic_year',
                'value' => '2025/2026',
                'type' => 'text',
                'description' => 'Tahun Ajaran'
            ],
            [
                'key_name' => 'accreditation',
                'value' => 'A',
                'type' => 'text',
                'description' => 'Status Akreditasi'
            ],
            [
                'key_name' => 'school_vision',
                'value' => 'Menjadi sekolah unggul berbasis nilai-nilai Islam',
                'type' => 'textarea',
                'description' => 'Visi Sekolah'
            ],
            [
                'key_name' => 'school_mission',
                'value' => 'Mewujudkan siswa beriman, berilmu, dan beramal',
                'type' => 'textarea',
                'description' => 'Misi Sekolah'
            ],
        ]
    ],
    
    // Contact Group
    [
        'group_name' => 'contact',
        'display_name' => 'Contact Information',
        'description' => 'Informasi kontak dan lokasi',
        'settings' => [
            [
                'key_name' => 'school_email',
                'value' => 'info@adyatama.sch.id',
                'type' => 'email',
                'description' => 'Email Umum'
            ],
            [
                'key_name' => 'school_phone',
                'value' => '(021) 123456789',
                'type' => 'tel',
                'description' => 'Telepon Kantor'
            ],
            [
                'key_name' => 'school_address',
                'value' => 'Jl. Pendidikan No. 123, Jakarta Selatan',
                'type' => 'textarea',
                'description' => 'Alamat Lengkap'
            ],
            [
                'key_name' => 'whatsapp_number',
                'value' => '+628123456789',
                'type' => 'tel',
                'description' => 'Nomor WhatsApp (format: +62xxx)'
            ],
            [
                'key_name' => 'whatsapp_message',
                'value' => 'Halo Admin Adyatama School, saya ingin bertanya tentang...',
                'type' => 'textarea',
                'description' => 'Pesan Default WhatsApp'
            ],
            [
                'key_name' => 'emergency_contact',
                'value' => '(021) 987654321',
                'type' => 'tel',
                'description' => 'Kontak Darurat'
            ],
            [
                'key_name' => 'office_hours',
                'value' => 'Senin-Jumat 07:00-15:00',
                'type' => 'text',
                'description' => 'Jam Operasional'
            ],
            [
                'key_name' => 'latitude',
                'value' => '-6.200000',
                'type' => 'text',
                'description' => 'Koordinat Latitude'
            ],
            [
                'key_name' => 'longitude',
                'value' => '106.816666',
                'type' => 'text',
                'description' => 'Koordinat Longitude'
            ],
        ]
    ],
    
    // Maps Group
    [
        'group_name' => 'maps',
        'display_name' => 'Maps & Location',
        'description' => 'Pengaturan lokasi dan peta',
        'settings' => [
            [
                'key_name' => 'maps_embed_url',
                'value' => '',
                'type' => 'url',
                'description' => 'Link Embed Google Maps'
            ],
            [
                'key_name' => 'maps_embed_iframe',
                'value' => '',
                'type' => 'textarea',
                'description' => 'Kode Iframe Google Maps'
            ],
        ]
    ],
    
    // Admission Group
    [
        'group_name' => 'admission',
        'display_name' => 'Admission & Registration',
        'description' => 'Pengaturan pendaftaran siswa',
        'settings' => [
            [
                'key_name' => 'registration_period',
                'value' => 'Januari - Juli 2025',
                'type' => 'text',
                'description' => 'Periode Pendaftaran'
            ],
            [
                'key_name' => 'admission_deadline',
                'value' => '31 July 2025',
                'type' => 'date',
                'description' => 'Deadline Pendaftaran'
            ],
            [
                'key_name' => 'registration_status',
                'value' => 'open',
                'type' => 'text',
                'description' => 'Status: open/closed'
            ],
            [
                'key_name' => 'min_age',
                'value' => '4',
                'type' => 'number',
                'description' => 'Minimal usia masuk'
            ],
            [
                'key_name' => 'max_age',
                'value' => '12',
                'type' => 'number',
                'description' => 'Maksimal usia masuk'
            ],
            [
                'key_name' => 'registration_fee',
                'value' => 'Rp 150.000',
                'type' => 'text',
                'description' => 'Biaya Pendaftaran'
            ],
            [
                'key_name' => 'annual_fee',
                'value' => 'Rp 1.200.000',
                'type' => 'text',
                'description' => 'Biaya Tahunan'
            ],
            [
                'key_name' => 'additional_documents',
                'value' => 'Surat keterangan sehat, Surat akte lahir',
                'type' => 'textarea',
                'description' => 'Dokumen tambahan yang dibutuhkan'
            ],
            [
                'key_name' => 'admission_procedure',
                'value' => '1. Isi formulir pendaftaran\n2. Upload dokumen\n3. Verifikasi admin\n4. Konfirmasi pendaftaran',
                'type' => 'textarea',
                'description' => 'Prosedur pendaftaran'
            ],
        ]
    ],
    
    // Social Media Group
    [
        'group_name' => 'social_media',
        'display_name' => 'Social Media',
        'description' => 'Link media sosial sekolah',
        'settings' => [
            [
                'key_name' => 'instagram_url',
                'value' => 'https://instagram.com/adyatamaschool',
                'type' => 'url',
                'description' => 'Instagram URL'
            ],
            [
                'key_name' => 'facebook_url',
                'value' => 'https://facebook.com/adyatamaschool',
                'type' => 'url',
                'description' => 'Facebook Page URL'
            ],
            [
                'key_name' => 'youtube_url',
                'value' => 'https://youtube.com/@adyatamaschool',
                'type' => 'url',
                'description' => 'YouTube Channel URL'
            ],
            [
                'key_name' => 'tiktok_url',
                'value' => 'https://tiktok.com/@adyatamaschool',
                'type' => 'url',
                'description' => 'TikTok URL'
            ],
            [
                'key_name' => 'twitter_url',
                'value' => 'https://twitter.com/adyatamaschool',
                'type' => 'url',
                'description' => 'Twitter/X URL'
            ],
            [
                'key_name' => 'linkedin_url',
                'value' => '',
                'type' => 'url',
                'description' => 'LinkedIn URL'
            ],
            [
                'key_name' => 'website_url',
                'value' => 'https://adyatamaschool.sch.id',
                'type' => 'url',
                'description' => 'Website Utama'
            ],
            [
                'key_name' => 'social_media_widget',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Tampilkan widget media sosial'
            ],
        ]
    ],
    
    // Legal Documents Group
    [
        'group_name' => 'legal_docs',
        'display_name' => 'Legal Documents',
        'description' => 'Dokumen legalitas sekolah',
        'settings' => [
            [
                'key_name' => 'sk_pendirian',
                'value' => '',
                'type' => 'file',
                'description' => 'SK Pendirian Yayasan'
            ],
            [
                'key_name' => 'izin_operasional',
                'value' => '',
                'type' => 'file',
                'description' => 'Izin Operasional Sekolah'
            ],
            [
                'key_name' => 'akreditasi',
                'value' => '',
                'type' => 'file',
                'description' => 'Sertifikat Akreditasi'
            ],
            [
                'key_name' => 'kurikulum',
                'value' => '',
                'type' => 'file',
                'description' => 'Ijin Kurikulum'
            ],
            [
                'key_name' => 'legalitas_lain',
                'value' => '',
                'type' => 'textarea',
                'description' => 'Legalitas Lainnya (deskripsi saja)'
            ],
            [
                'key_name' => 'npsn',
                'value' => '123456789',
                'type' => 'text',
                'description' => 'Nomor Pokok Sekolah Nasional'
            ],
            [
                'key_name' => 'nss',
                'value' => '123456789',
                'type' => 'text',
                'description' => 'Nomor Statistik Sekolah'
            ],
        ]
    ],
    
    // SEO Group
    [
        'group_name' => 'seo',
        'display_name' => 'SEO Configuration',
        'description' => 'Pengaturan optimasi mesin pencari',
        'settings' => [
            [
                'key_name' => 'meta_description',
                'value' => 'Sekolah Islam Terpadu Adyatama School - Berkarakter, Berkualitas, Berprestasi',
                'type' => 'textarea',
                'description' => 'Deskripsi Website (max 160 karakter)'
            ],
            [
                'key_name' => 'meta_keywords',
                'value' => 'sekolah, pendidikan, islam, adyatama, tk, sd, smp, sma',
                'type' => 'textarea',
                'description' => 'Keywords (dipisah dengan koma)'
            ],
            [
                'key_name' => 'google_analytics',
                'value' => '',
                'type' => 'textarea',
                'description' => 'Google Analytics Tracking Code'
            ],
            [
                'key_name' => 'google_tag_manager',
                'value' => '',
                'type' => 'textarea',
                'description' => 'Google Tag Manager Code'
            ],
            [
                'key_name' => 'facebook_pixel',
                'value' => '',
                'type' => 'textarea',
                'description' => 'Facebook Pixel ID'
            ],
            [
                'key_name' => 'site_verification',
                'value' => '',
                'type' => 'text',
                'description' => 'Google Site Verification Code'
            ],
            [
                'key_name' => 'robots_txt',
                'value' => 'User-agent: *\nAllow: /\nSitemap: /sitemap.xml',
                'type' => 'textarea',
                'description' => 'Custom robots.txt content'
            ],
            [
                'key_name' => 'sitemap_enabled',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Aktifkan sitemap.xml'
            ],
            [
                'key_name' => 'cdn_enabled',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Gunakan CDN untuk assets'
            ],
            [
                'key_name' => 'minify_html',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Minify HTML output'
            ],
        ]
    ],
    
    // Email Group
    [
        'group_name' => 'email',
        'display_name' => 'Email Configuration',
        'description' => 'Pengaturan email dan notifikasi',
        'settings' => [
            [
                'key_name' => 'email_from',
                'value' => 'info@adyatama.sch.id',
                'type' => 'email',
                'description' => 'Alamat email pengirim'
            ],
            [
                'key_name' => 'email_from_name',
                'value' => 'Adyatama School',
                'type' => 'text',
                'description' => 'Nama pengirim email'
            ],
            [
                'key_name' => 'smtp_host',
                'value' => 'smtp.gmail.com',
                'type' => 'text',
                'description' => 'SMTP Host'
            ],
            [
                'key_name' => 'smtp_port',
                'value' => '587',
                'type' => 'number',
                'description' => 'SMTP Port'
            ],
            [
                'key_name' => 'smtp_username',
                'value' => '',
                'type' => 'text',
                'description' => 'SMTP Username'
            ],
            [
                'key_name' => 'smtp_password',
                'value' => '',
                'type' => 'text',
                'description' => 'SMTP Password'
            ],
            [
                'key_name' => 'email_notifications',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Aktifkan notifikasi email'
            ],
            [
                'key_name' => 'application_notification',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Notifikasi pendaftaran baru'
            ],
            [
                'key_name' => 'comment_notification',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Notifikasi komentar baru'
            ],
        ]
    ],
    
    // Security Group
    [
        'group_name' => 'security',
        'display_name' => 'Security & Privacy',
        'description' => 'Pengaturan keamanan dan privasi',
        'settings' => [
            [
                'key_name' => 'recaptcha_enabled',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Aktifkan reCAPTCHA'
            ],
            [
                'key_name' => 'recaptcha_site_key',
                'value' => '',
                'type' => 'text',
                'description' => 'reCAPTCHA Site Key'
            ],
            [
                'key_name' => 'recaptcha_secret_key',
                'value' => '',
                'type' => 'text',
                'description' => 'reCAPTCHA Secret Key'
            ],
            [
                'key_name' => 'gdpr_compliance',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Aktifkan GDPR Compliance'
            ],
            [
                'key_name' => 'cookie_consent',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Tampilkan cookie consent'
            ],
            [
                'key_name' => 'privacy_policy',
                'value' => 'Kebijakan privasi sekolah...',
                'type' => 'textarea',
                'description' => 'Kebijakan privasi'
            ],
            [
                'key_name' => 'terms_of_service',
                'value' => 'Syarat dan ketentuan penggunaan...',
                'type' => 'textarea',
                'description' => 'Terms of Service'
            ],
            [
                'key_name' => 'data_retention_days',
                'value' => '365',
                'type' => 'number',
                'description' => 'Hari retensi data'
            ],
            [
                'key_name' => 'max_login_attempts',
                'value' => '5',
                'type' => 'number',
                'description' => 'Maksimal percobaan login'
            ],
            [
                'key_name' => 'login_lockout_time',
                'value' => '900',
                'type' => 'number',
                'description' => 'Waktu lockout login (detik)'
            ],
        ]
    ],
    
    // Academic Calendar Group
    [
        'group_name' => 'calendar',
        'display_name' => 'Academic Calendar',
        'description' => 'Kalender akademik dan jadwal',
        'settings' => [
            [
                'key_name' => 'academic_calendar_url',
                'value' => '/uploads/academic-calendar.pdf',
                'type' => 'file',
                'description' => 'Link Kalender Akademik'
            ],
            [
                'key_name' => 'holidays_schedule',
                'value' => '1 Jan: Tahun Baru\n25 Jan: Tahun Baru Imlek',
                'type' => 'textarea',
                'description' => 'Jadwal Libur'
            ],
            [
                'key_name' => 'exam_schedule',
                'value' => 'Ujian Tengah Semester: 15 Maret - 5 April 2025',
                'type' => 'textarea',
                'description' => 'Jadwal Ujian'
            ],
            [
                'key_name' => 'event_announcement',
                'value' => '',
                'type' => 'textarea',
                'description' => 'Pengumuman Event Terkini'
            ],
            [
                'key_name' => 'upcoming_events',
                'value' => '',
                'type' => 'textarea',
                'description' => 'Event Mendatang'
            ],
        ]
    ],
    
    // Website Behavior Group
    [
        'group_name' => 'behavior',
        'display_name' => 'Website Behavior',
        'description' => 'Pengaturan perilaku website',
        'settings' => [
            [
                'key_name' => 'maintenance_mode',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Mode maintenance'
            ],
            [
                'key_name' => 'maintenance_message',
                'value' => 'Website sedang dalam perawatan, akan kembali pada pukul 10:00 WIB',
                'type' => 'textarea',
                'description' => 'Pesan maintenance mode'
            ],
            [
                'key_name' => 'guest_comment',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Izinkan komentar guest'
            ],
            [
                'key_name' => 'auto_approve_comments',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Auto approve komentar'
            ],
            [
                'key_name' => 'comment_captcha',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Aktifkan captcha komentar'
            ],
            [
                'key_name' => 'posts_per_page',
                'value' => '9',
                'type' => 'number',
                'description' => 'Jumlah post per halaman'
            ],
            [
                'key_name' => 'galleries_per_page',
                'value' => '12',
                'type' => 'number',
                'description' => 'Jumlah galeri per halaman'
            ],
            [
                'key_name' => 'enable_reactions',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Aktifkan sistem reaksi'
            ],
            [
                'key_name' => 'enable_sharing',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Aktifkan share social media'
            ],
            [
                'key_name' => 'enable_search',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'Aktifkan fitur pencarian'
            ],
            [
                'key_name' => 'search_results_per_page',
                'value' => '10',
                'type' => 'number',
                'description' => 'Hasil pencarian per halaman'
            ],
        ]
    ],
    
    // Payment Group
    [
        'group_name' => 'payment',
        'display_name' => 'Payment & Donation',
        'description' => 'Pengaturan pembayaran dan donasi',
        'settings' => [
            [
                'key_name' => 'payment_enabled',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Aktifkan payment gateway'
            ],
            [
                'key_name' => 'payment_method',
                'value' => 'manual_transfer',
                'type' => 'text',
                'description' => 'Metode pembayaran (manual_transfer, midtrans, etc)'
            ],
            [
                'key_name' => 'bank_account_name',
                'value' => 'Yayasan Adyatama School',
                'type' => 'text',
                'description' => 'Nama rekening'
            ],
            [
                'key_name' => 'bank_account_number',
                'value' => '1234567890',
                'type' => 'text',
                'description' => 'Nomor rekening'
            ],
            [
                'key_name' => 'bank_name',
                'value' => 'Bank BRI',
                'type' => 'text',
                'description' => 'Nama bank'
            ],
            [
                'key_name' => 'donation_enabled',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'Aktifkan sistem donasi'
            ],
            [
                'key_name' => 'donation_message',
                'value' => 'Bantu kami dalam mendidik generasi qurani...',
                'type' => 'textarea',
                'description' => 'Pesan donasi'
            ],
        ]
    ],
];

// Fungsi untuk memasukkan semua pengaturan ke database
foreach ($settingsSchema as $group) {
    foreach ($group['settings'] as $setting) {
        // Gunakan updateOrCreate untuk menghindari duplikasi
        Setting::updateOrCreate(
            ['key_name' => $setting['key_name']],
            [
                'value' => $setting['value'],
                'type' => $setting['type'],
                'group_name' => $group['group_name'],
                'description' => $setting['description']
            ]
        );
    }
}