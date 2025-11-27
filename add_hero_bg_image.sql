-- Tambahkan hero_bg_image ke dalam tabel settings jika belum ada
INSERT INTO settings (key_name, value, type, group_name, description) 
SELECT 'hero_bg_image', '/uploads/hero-bg.jpg', 'image', 'visual_identity', 'Background Image Hero Section'
WHERE NOT EXISTS (
    SELECT 1 FROM settings WHERE key_name = 'hero_bg_image'
);

-- Update deskripsi dan grouping untuk beberapa pengaturan yang perlu diperbaiki
UPDATE settings 
SET group_name = 'visual_identity', description = 'Background Image Hero Section'
WHERE key_name = 'hero_bg_image';

-- Pastikan semua pengaturan hero ada di group visual_identity
UPDATE settings 
SET group_name = 'visual_identity'
WHERE key_name IN ('hero_title', 'hero_description', 'hero_cta_text', 'hero_cta_url');