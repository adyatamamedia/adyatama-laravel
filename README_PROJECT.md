# 🏫 ADYATAMA SCHOOL - Website Sekolah Islam Terpadu

![Laravel](https://img.shields.io/badge/Laravel-12.0-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?style=flat-square&logo=php)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-4.1-38bdf8?style=flat-square&logo=tailwindcss)
![Status](https://img.shields.io/badge/Status-In_Development-yellow?style=flat-square)
![Progress](https://img.shields.io/badge/Progress-60%25-orange?style=flat-square)

Website sekolah Islam terpadu yang dibangun dengan Laravel 12 dan TailwindCSS 4. Proyek ini berfungsi sebagai CMS (Content Management System) lengkap untuk mengelola konten website sekolah.

---

## 📋 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Fitur](#-fitur)
- [Teknologi](#-teknologi)
- [Instalasi](#-instalasi)
- [Penggunaan](#-penggunaan)
- [Struktur Proyek](#-struktur-proyek)
- [Dokumentasi](#-dokumentasi)
- [Roadmap](#-roadmap)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)

---

## 🎯 Tentang Proyek

**ADYATAMA SCHOOL** adalah platform website sekolah modern yang dirancang untuk:

- 📰 Publikasi berita dan pengumuman sekolah
- 🖼️ Galeri foto kegiatan dan prestasi siswa
- 👨‍🏫 Profil guru dan staff pengajar
- 🎯 Informasi ekstrakurikuler
- 📝 Pendaftaran siswa online
- 📄 Halaman informasi statis (visi/misi, legalitas, dll)
- 💬 Interaksi melalui komentar
- ⚙️ Manajemen konten yang mudah (akan datang)

---

## ✨ Fitur

### ✅ Sudah Tersedia

#### Frontend Public Website
- ✅ **Homepage** - Tampilan menarik dengan featured posts dan galeri
- ✅ **Berita & Artikel** - Sistem publikasi berita dengan kategori dan tag
- ✅ **Pengumuman** - Halaman khusus untuk pengumuman sekolah
- ✅ **Galeri Foto** - Album foto dengan multiple images
- ✅ **Profil Guru & Staff** - Informasi lengkap tenaga pendidik
- ✅ **Ekstrakurikuler** - Daftar kegiatan ekstrakurikuler
- ✅ **Pendaftaran Online** - Form pendaftaran siswa dengan upload dokumen
- ✅ **Halaman Statis** - Visi/misi, legalitas, dan informasi lainnya
- ✅ **Sistem Komentar** - Interaksi pada berita dan galeri
- ✅ **Responsive Design** - Tampilan optimal di semua perangkat

#### Backend Features
- ✅ **Database Schema** - 23 tabel dengan relasi lengkap
- ✅ **Models & Relationships** - 15 Eloquent models
- ✅ **Caching System** - Settings dan navigation ter-cache
- ✅ **Media Helper** - Helper function untuk URL media
- ✅ **SEO Ready** - Meta tags dan SEO optimization
- ✅ **Soft Deletes** - Data tidak hilang permanen

### 🚧 Dalam Pengembangan

- ⏳ **Admin Dashboard** - Interface untuk manage konten
- ⏳ **Authentication** - Login admin dengan RBAC
- ⏳ **Media Manager** - Upload dan organize media files
- ⏳ **Email Notifications** - Notifikasi otomatis
- ⏳ **Advanced Search** - Full-text search
- ⏳ **Analytics** - Dashboard statistik dan analytics
- ⏳ **Reactions** - Emoji reactions pada posts
- ⏳ **Testing** - Unit dan feature tests

---

## 🛠️ Teknologi

### Backend
- **Framework:** Laravel 12.0
- **PHP:** 8.2+
- **Database:** SQLite (development), MySQL (production ready)
- **ORM:** Eloquent

### Frontend
- **Template Engine:** Blade
- **CSS Framework:** TailwindCSS 4.1
- **Build Tool:** Vite 7.0
- **JavaScript:** Vanilla JS (minimal)

### Design
- **Font:** Instrument Sans (Google Fonts)
- **Primary Color:** Sky Blue (#0ea5e9)
- **Design Style:** Modern, Clean, Responsive

---

## 📦 Instalasi

### Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18
- NPM atau Yarn
- SQLite (untuk development)

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/yourusername/adyatama-school.git
   cd adyatama-school
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Setup database**
   ```bash
   # Untuk SQLite (development)
   touch database/database.sqlite
   
   # Jalankan migrations
   php artisan migrate --seed
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Jalankan development server**
   ```bash
   # Terminal 1: Laravel server
   php artisan serve
   
   # Terminal 2: Vite dev server
   npm run dev
   ```

8. **Akses aplikasi**
   ```
   http://localhost:8000
   ```

---

## 🚀 Penggunaan

### Development Mode

```bash
# Jalankan semua services sekaligus (requires concurrently)
composer run dev
```

Ini akan menjalankan:
- PHP Artisan Server
- Queue Listener
- Pail (Log viewer)
- Vite Dev Server

### Production Build

```bash
# Build assets untuk production
npm run build

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Database Management

```bash
# Jalankan migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Refresh database (HATI-HATI: akan hapus semua data!)
php artisan migrate:fresh --seed

# Jalankan seeders
php artisan db:seed
```

---

## 📁 Struktur Proyek

```
adyatama-school/
├── app/
│   ├── Http/Controllers/      # Controllers untuk routes
│   ├── Models/                # Eloquent models
│   ├── Services/              # Business logic services
│   └── Support/               # Helper functions
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── resources/
│   ├── css/                   # Stylesheets
│   ├── js/                    # JavaScript
│   └── views/                 # Blade templates
├── routes/
│   └── web.php                # Web routes
├── public/
│   └── build/                 # Compiled assets
└── storage/
    └── app/                   # File uploads
```

Untuk struktur lengkap, lihat [STRUKTUR_VISUAL.md](STRUKTUR_VISUAL.md)

---

## 📚 Dokumentasi

Proyek ini dilengkapi dengan dokumentasi lengkap:

1. **[PROJECT_ANALYSIS.md](PROJECT_ANALYSIS.md)** - Analisis lengkap proyek
   - Ringkasan eksekutif
   - Struktur proyek
   - Fitur yang ada dan belum ada
   - Teknologi yang digunakan
   - Rekomendasi pengembangan

2. **[DATABASE_SCHEMA.md](DATABASE_SCHEMA.md)** - Dokumentasi database
   - Entity Relationship Diagram
   - Detail semua tabel
   - Relationships dan constraints
   - Index strategy

3. **[FEATURE_CHECKLIST.md](FEATURE_CHECKLIST.md)** - Checklist fitur
   - Progress tracking
   - Priority matrix
   - Next steps
   - Success metrics

4. **[API_ROUTES.md](API_ROUTES.md)** - Dokumentasi routes & API
   - Semua public routes
   - Request/response format
   - Helper functions
   - Model relationships

5. **[RINGKASAN.md](RINGKASAN.md)** - Ringkasan (Bahasa Indonesia)
   - Overview singkat
   - Status proyek
   - Cara menjalankan
   - Prioritas pengembangan

6. **[STRUKTUR_VISUAL.md](STRUKTUR_VISUAL.md)** - Visualisasi struktur
   - Diagram alur data
   - Relasi database visual
   - Statistik kode
   - Coverage map

---

## 🗺️ Roadmap

### Phase 1: Foundation (✅ Selesai)
- ✅ Database schema design
- ✅ Models & relationships
- ✅ Public frontend views
- ✅ Basic routing

### Phase 2: Admin Panel (🚧 Sedang Dikerjakan)
- ⏳ Authentication system
- ⏳ Admin dashboard layout
- ⏳ Posts CRUD
- ⏳ Media upload & management
- ⏳ Settings management

### Phase 3: Advanced Features (📅 Planned)
- 📅 Email notifications
- 📅 Advanced search
- 📅 Analytics dashboard
- 📅 Reactions system
- 📅 Scheduled publishing

### Phase 4: Testing & Optimization (📅 Planned)
- 📅 Unit tests
- 📅 Feature tests
- 📅 Performance optimization
- 📅 Security hardening

### Phase 5: Deployment (📅 Planned)
- 📅 Production deployment
- 📅 CI/CD pipeline
- 📅 Monitoring & logging
- 📅 Backup strategy

---

## 📊 Progress

**Overall Completion: 60%**

| Component | Progress | Status |
|-----------|----------|--------|
| Frontend | 90% | 🟢 Excellent |
| Backend Logic | 60% | 🟡 Good |
| Database | 100% | 🟢 Complete |
| Admin Panel | 0% | 🔴 Not Started |
| Authentication | 20% | 🔴 Minimal |
| Testing | 0% | 🔴 Not Started |
| Documentation | 80% | 🟢 Good |

---

## 🤝 Kontribusi

Kontribusi sangat diterima! Berikut cara berkontribusi:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

### Coding Standards

- Follow PSR-12 coding standards
- Write meaningful commit messages
- Add comments untuk logic yang kompleks
- Update dokumentasi jika perlu

---

## 🐛 Bug Reports

Jika menemukan bug, silakan buat issue dengan informasi:

- Deskripsi bug
- Langkah untuk reproduce
- Expected behavior
- Screenshots (jika ada)
- Environment (PHP version, OS, dll)

---

## 📝 Lisensi

Proyek ini menggunakan lisensi MIT. Lihat file [LICENSE](LICENSE) untuk detail.

---

## 👥 Tim

- **Developer:** [Your Name]
- **Designer:** [Designer Name]
- **Project Manager:** [PM Name]

---

## 📞 Kontak

- **Email:** info@adyatamaschool.com
- **Website:** https://adyatamaschool.com
- **GitHub:** https://github.com/yourusername/adyatama-school

---

## 🙏 Acknowledgments

- Laravel Framework
- TailwindCSS
- Instrument Sans Font
- Semua kontributor open source

---

## 📸 Screenshots

### Homepage
![Homepage](docs/screenshots/homepage.png)

### Berita
![Posts](docs/screenshots/posts.png)

### Galeri
![Gallery](docs/screenshots/gallery.png)

### Profil Guru
![Teachers](docs/screenshots/teachers.png)

---

## ⚡ Quick Start

```bash
# Clone & install
git clone https://github.com/yourusername/adyatama-school.git
cd adyatama-school
composer install && npm install

# Setup
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed

# Run
npm run dev & php artisan serve
```

Buka browser: `http://localhost:8000`

---

## 🔐 Security

Jika menemukan vulnerability, jangan buat public issue. Silakan email ke security@adyatamaschool.com

---

## 📈 Stats

![GitHub stars](https://img.shields.io/github/stars/yourusername/adyatama-school?style=social)
![GitHub forks](https://img.shields.io/github/forks/yourusername/adyatama-school?style=social)
![GitHub issues](https://img.shields.io/github/issues/yourusername/adyatama-school)
![GitHub pull requests](https://img.shields.io/github/issues-pr/yourusername/adyatama-school)

---

**Made with ❤️ by ADYATAMA SCHOOL Development Team**

*Last Updated: 25 November 2025*
