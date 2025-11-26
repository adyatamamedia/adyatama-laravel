# 🗄️ DATABASE SCHEMA - ADYATAMA SCHOOL

## 📊 Entity Relationship Overview

### Core Entities

```
┌─────────────────────────────────────────────────────────────────┐
│                     AUTHENTICATION & RBAC                        │
└─────────────────────────────────────────────────────────────────┘

users (id, name, email, password, role_id)
  ├── roles (id, name, description)
  │     └── role_permissions (role_id, permission_id)
  │           └── permissions (id, name, label, resource, action)
  └── [author of posts, galleries, comments, etc.]


┌─────────────────────────────────────────────────────────────────┐
│                     CONTENT MANAGEMENT                           │
└─────────────────────────────────────────────────────────────────┘

posts (id, author_id, category_id, title, slug, content, status)
  ├── categories (id, name, slug)
  ├── tags (id, post_id, name, slug)
  ├── media (id, path, type) [featured_media_id]
  ├── comments (id, post_id, user_id, content, is_approved)
  ├── post_reactions (id, post_id, user_id, reaction_type_id)
  │     └── reaction_types (id, code, emoji, label)
  ├── post_reaction_counts (post_id, counts, total)
  └── post_views (id, post_id, user_id, ip_address, viewed_at)


┌─────────────────────────────────────────────────────────────────┐
│                        GALLERY SYSTEM                            │
└─────────────────────────────────────────────────────────────────┘

galleries (id, author_id, title, slug, extracurricular_id, status)
  ├── gallery_items (id, gallery_id, media_id, path, caption)
  ├── extracurriculars (id, name, description)
  └── comments (id, gallery_id, user_id, content)


┌─────────────────────────────────────────────────────────────────┐
│                         MEDIA LIBRARY                            │
└─────────────────────────────────────────────────────────────────┘

media (id, origin_post_id, type, path, caption, meta)
  └── media_variants (id, media_id, variant_key, path, width, height)


┌─────────────────────────────────────────────────────────────────┐
│                         SCHOOL DATA                              │
└─────────────────────────────────────────────────────────────────┘

guru_staff (id, nip, nama_lengkap, jabatan, bidang, foto, status)
  └── user_id [optional link to users]

student_applications (id, nama_lengkap, nisn, jenis_kelamin, ...)
  └── status: pending, review, accepted, rejected


┌─────────────────────────────────────────────────────────────────┐
│                      STATIC PAGES & SEO                          │
└─────────────────────────────────────────────────────────────────┘

pages (id, title, slug, content, status, order_num)

seo_overrides (id, subject_type, subject_id, meta_title, ...)
  └── Polymorphic: posts, pages, galleries


┌─────────────────────────────────────────────────────────────────┐
│                      SYSTEM & SETTINGS                           │
└─────────────────────────────────────────────────────────────────┘

settings (id, key_name, value, type, group_name)

scheduled_jobs (id, job_key, job_type, payload, scheduled_at, status)

activity_log (id, user_id, action, subject_type, subject_id, meta)
```

---

## 📋 DETAILED TABLE SCHEMAS

### 1. USERS & AUTHENTICATION

#### `users`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
name                VARCHAR(255)
email               VARCHAR(255) UNIQUE
email_verified_at   TIMESTAMP NULL
password            VARCHAR(255)
role_id             BIGINT UNSIGNED NULL FK→roles.id
remember_token      VARCHAR(100) NULL
created_at          TIMESTAMP
updated_at          TIMESTAMP

INDEX: role_id
```

#### `roles`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
name                VARCHAR(50) UNIQUE
description         VARCHAR(150) NULL
created_at          TIMESTAMP
```

#### `permissions`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
name                VARCHAR(150) UNIQUE
label               VARCHAR(150) NULL
resource            VARCHAR(100) NULL
action              VARCHAR(50) NULL
description         VARCHAR(255) NULL
created_at          TIMESTAMP
```

#### `role_permissions`
```sql
role_id             BIGINT UNSIGNED FK→roles.id
permission_id       BIGINT UNSIGNED FK→permissions.id
PRIMARY KEY (role_id, permission_id)

INDEX: permission_id
```

---

### 2. CONTENT MANAGEMENT

#### `posts`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
author_id           BIGINT UNSIGNED FK→users.id
category_id         BIGINT UNSIGNED NULL FK→categories.id
post_type           ENUM('article', 'announcement', 'video') DEFAULT 'article'
title               VARCHAR(255)
slug                VARCHAR(255) UNIQUE
excerpt             TEXT NULL
content             LONGTEXT NULL
featured_media_id   BIGINT UNSIGNED NULL
video_url           VARCHAR(255) NULL
view_count          INT UNSIGNED DEFAULT 0
react_enabled       BOOLEAN DEFAULT true
comments_enabled    BOOLEAN DEFAULT true
status              ENUM('draft', 'published') DEFAULT 'draft'
published_at        DATETIME NULL
created_at          TIMESTAMP
updated_at          TIMESTAMP
deleted_at          TIMESTAMP NULL

INDEX: author_id, category_id
INDEX: (status, published_at)
```

#### `categories`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
name                VARCHAR(100)
slug                VARCHAR(120) UNIQUE
description         TEXT NULL
created_at          TIMESTAMP
```

#### `tags`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
post_id             BIGINT UNSIGNED FK→posts.id
name                VARCHAR(100)
slug                VARCHAR(120)
created_at          TIMESTAMP

INDEX: post_id, slug
```

#### `comments`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
post_id             BIGINT UNSIGNED NULL FK→posts.id
gallery_id          BIGINT UNSIGNED NULL FK→galleries.id
parent_id           BIGINT UNSIGNED NULL FK→comments.id
user_id             BIGINT UNSIGNED NULL FK→users.id
author_name         VARCHAR(150) NULL
author_email        VARCHAR(150) NULL
content             TEXT
is_approved         BOOLEAN DEFAULT false
is_spam             BOOLEAN DEFAULT false
created_at          TIMESTAMP
updated_at          TIMESTAMP

INDEX: post_id, gallery_id, parent_id
```

---

### 3. REACTIONS & ENGAGEMENT

#### `reaction_types`
```sql
id                  TINYINT UNSIGNED PRIMARY KEY
code                VARCHAR(30) UNIQUE
emoji               VARCHAR(10)
label               VARCHAR(50) NULL
created_at          TIMESTAMP
```

#### `post_reactions`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
post_id             BIGINT UNSIGNED FK→posts.id
reaction_type_id    BIGINT UNSIGNED FK→reaction_types.id
user_id             BIGINT UNSIGNED NULL FK→users.id
session_id          VARCHAR(128) NULL
ip_address          VARCHAR(45) NULL
created_at          TIMESTAMP
updated_at          TIMESTAMP

UNIQUE: (post_id, user_id)
UNIQUE: (post_id, session_id)
INDEX: post_id, user_id, session_id
```

#### `post_reaction_counts`
```sql
post_id             BIGINT UNSIGNED PRIMARY KEY FK→posts.id
counts              JSON NULL
total               INT UNSIGNED DEFAULT 0
updated_at          TIMESTAMP
```

#### `post_views`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
post_id             BIGINT UNSIGNED FK→posts.id
user_id             BIGINT UNSIGNED NULL FK→users.id
ip_address          VARCHAR(45) NULL
user_agent          VARCHAR(255) NULL
viewed_at           TIMESTAMP

INDEX: post_id, user_id
```

---

### 4. MEDIA LIBRARY

#### `media`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
origin_post_id      BIGINT UNSIGNED NULL FK→posts.id
type                ENUM('image', 'video', 'file') DEFAULT 'image'
path                VARCHAR(255)
caption             VARCHAR(255) NULL
meta                JSON NULL
order_num           INT DEFAULT 0
filesize            BIGINT UNSIGNED NULL
created_at          TIMESTAMP
deleted_at          TIMESTAMP NULL

INDEX: origin_post_id
```

#### `media_variants`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
media_id            BIGINT UNSIGNED FK→media.id
variant_key         VARCHAR(50)
path                VARCHAR(255)
width               INT UNSIGNED NULL
height              INT UNSIGNED NULL
filesize            BIGINT UNSIGNED NULL
meta                JSON NULL
created_at          TIMESTAMP

UNIQUE: (media_id, variant_key)
INDEX: media_id
```

---

### 5. GALLERY SYSTEM

#### `galleries`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
author_id           BIGINT UNSIGNED NULL FK→users.id
title               VARCHAR(255)
slug                VARCHAR(255) UNIQUE
description         TEXT NULL
extracurricular_id  BIGINT UNSIGNED NULL FK→extracurriculars.id
view_count          INT UNSIGNED DEFAULT 0
status              ENUM('draft', 'published') DEFAULT 'published'
created_at          TIMESTAMP
updated_at          TIMESTAMP
deleted_at          TIMESTAMP NULL

INDEX: author_id, extracurricular_id
```

#### `gallery_items`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
gallery_id          BIGINT UNSIGNED FK→galleries.id
media_id            BIGINT UNSIGNED NULL FK→media.id
type                ENUM('image', 'video') DEFAULT 'image'
path                VARCHAR(255)
caption             VARCHAR(255) NULL
order_num           INT DEFAULT 0
created_at          TIMESTAMP
deleted_at          TIMESTAMP NULL

INDEX: gallery_id, media_id
```

#### `extracurriculars`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
name                VARCHAR(120) UNIQUE
description         TEXT NULL
created_at          TIMESTAMP
```

---

### 6. SCHOOL DATA

#### `guru_staff`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
nip                 VARCHAR(50) NULL
nama_lengkap        VARCHAR(150)
jabatan             VARCHAR(100) NULL
bidang              VARCHAR(100) NULL
email               VARCHAR(100) NULL
no_hp               VARCHAR(20) NULL
foto                VARCHAR(255) NULL
status              ENUM('guru', 'staff') DEFAULT 'guru'
is_active           BOOLEAN DEFAULT true
user_id             BIGINT UNSIGNED NULL FK→users.id
created_at          TIMESTAMP
updated_at          TIMESTAMP
deleted_at          TIMESTAMP NULL

INDEX: user_id
```

#### `student_applications`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
nama_lengkap        VARCHAR(150)
nisn                VARCHAR(20) NULL
jenis_kelamin       ENUM('L', 'P')
tempat_lahir        VARCHAR(100)
tanggal_lahir       DATE
alamat              TEXT
nama_ortu           VARCHAR(150)
no_hp               VARCHAR(20)
email               VARCHAR(150) NULL
asal_sekolah        VARCHAR(150) NULL
dokumen_kk          VARCHAR(255) NULL
dokumen_akte        VARCHAR(255) NULL
status              ENUM('pending', 'review', 'accepted', 'rejected') DEFAULT 'pending'
created_at          TIMESTAMP
updated_at          TIMESTAMP
```

---

### 7. STATIC PAGES & SEO

#### `pages`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
title               VARCHAR(255)
slug                VARCHAR(255) UNIQUE
content             LONGTEXT NULL
featured_image      VARCHAR(255) NULL
status              ENUM('draft', 'published') DEFAULT 'published'
order_num           INT DEFAULT 0
created_at          TIMESTAMP
updated_at          TIMESTAMP
deleted_at          TIMESTAMP NULL
```

#### `seo_overrides`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
subject_type        VARCHAR(50)
subject_id          BIGINT UNSIGNED
meta_title          VARCHAR(255) NULL
meta_description    VARCHAR(500) NULL
meta_keywords       VARCHAR(500) NULL
canonical           VARCHAR(255) NULL
robots              VARCHAR(50) DEFAULT 'index,follow'
structured_data     JSON NULL
created_at          TIMESTAMP
updated_at          TIMESTAMP

UNIQUE: (subject_type, subject_id)
```

---

### 8. SYSTEM TABLES

#### `settings`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
key_name            VARCHAR(100) UNIQUE
value               TEXT NULL
type                ENUM('text', 'textarea', 'number', 'boolean', 'image', 'json') DEFAULT 'text'
group_name          VARCHAR(50) DEFAULT 'general'
description         VARCHAR(255) NULL
created_at          TIMESTAMP
updated_at          TIMESTAMP
```

#### `scheduled_jobs`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
job_key             VARCHAR(150)
job_type            VARCHAR(100)
payload             JSON NULL
scheduled_at        DATETIME
attempts            TINYINT UNSIGNED DEFAULT 0
status              ENUM('pending', 'running', 'failed', 'done') DEFAULT 'pending'
last_error          TEXT NULL
created_at          TIMESTAMP
updated_at          TIMESTAMP

INDEX: job_type, scheduled_at
```

#### `activity_log`
```sql
id                  BIGINT UNSIGNED PRIMARY KEY
user_id             BIGINT UNSIGNED NULL FK→users.id
action              VARCHAR(100)
subject_type        VARCHAR(100) NULL
subject_id          BIGINT UNSIGNED NULL
ip_address          VARCHAR(45) NULL
user_agent          VARCHAR(255) NULL
meta                JSON NULL
created_at          TIMESTAMP

INDEX: user_id
```

---

## 🔗 RELATIONSHIPS SUMMARY

### One-to-Many
- `users` → `posts` (author)
- `users` → `galleries` (author)
- `users` → `comments`
- `categories` → `posts`
- `posts` → `tags`
- `posts` → `comments`
- `posts` → `post_reactions`
- `posts` → `post_views`
- `galleries` → `gallery_items`
- `galleries` → `comments`
- `media` → `media_variants`
- `extracurriculars` → `galleries`

### Many-to-Many
- `roles` ↔ `permissions` (via `role_permissions`)

### Polymorphic
- `seo_overrides` → posts, pages, galleries (subject_type, subject_id)

### Optional Foreign Keys
- `posts.featured_media_id` → `media.id`
- `guru_staff.user_id` → `users.id`
- `gallery_items.media_id` → `media.id`

---

## 📊 INDEX STRATEGY

### Performance Indexes
```sql
-- Posts
idx_posts_author (author_id)
idx_posts_category (category_id)
idx_posts_status_published (status, published_at)

-- Comments
idx_comments_post (post_id)
idx_comments_gallery (gallery_id)
idx_comments_parent (parent_id)

-- Reactions
idx_pr_post (post_id)
idx_pr_user (user_id)
idx_pr_session (session_id)

-- Views
idx_pv_post (post_id)
idx_pv_user (user_id)

-- Tags
idx_tags_post (post_id)
idx_tags_slug (slug)

-- Media
idx_media_post (origin_post_id)
idx_media_variants_media (media_id)

-- Galleries
idx_galleries_author (author_id)
idx_galleries_extracurricular (extracurricular_id)
idx_gallery_items_gallery (gallery_id)
idx_gallery_items_media (media_id)

-- System
idx_sj_type (job_type)
idx_sj_scheduled (scheduled_at)
idx_al_user (user_id)
```

---

## 🔒 CONSTRAINTS

### Cascading Deletes
- Delete user → cascade delete posts, galleries, comments
- Delete post → cascade delete tags, comments, reactions, views
- Delete gallery → cascade delete gallery_items, comments
- Delete media → cascade delete media_variants

### Soft Deletes
- `posts`
- `galleries`
- `gallery_items`
- `guru_staff`
- `pages`
- `media`

### Nullable Foreign Keys
- `posts.category_id` (null on category delete)
- `posts.featured_media_id`
- `guru_staff.user_id`
- `gallery_items.media_id`

---

## 📈 DATA VOLUME ESTIMATES

### Expected Growth
```
posts               : 100-1000 records/year
galleries           : 50-200 records/year
gallery_items       : 500-2000 records/year
comments            : 1000-5000 records/year
post_views          : 10000-100000 records/year
guru_staff          : 20-50 records (stable)
student_applications: 100-500 records/year
```

### Storage Considerations
- `post_views` will grow rapidly → consider archiving
- `activity_log` will grow rapidly → consider rotation
- `media` files stored in filesystem, not DB

---

*Last Updated: 25 November 2025*
