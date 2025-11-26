# 🛣️ ROUTES & API DOCUMENTATION

## 📍 PUBLIC ROUTES

### Homepage
```
GET /
Controller: HomeController
Description: Display homepage dengan featured posts, galleries, guru
Returns: View 'home'
```

**Response Data:**
```php
[
    'settings' => [...],           // Site settings
    'featuredPost' => Post,        // Latest published post
    'latestPosts' => Collection,   // 6 latest posts
    'announcements' => Collection, // 3 latest announcements
    'galleries' => Collection,     // 6 latest galleries
    'guru' => Collection,          // 4 active teachers
    'navigation' => [...]          // Navigation menu
]
```

---

### Posts & Articles

#### List All Posts
```
GET /posts
Controller: PostController@index
Query Params:
  - category (string): Filter by category slug
  - q (string): Search query
  - page (int): Pagination page number
```

**Example:**
```
/posts?category=berita&q=prestasi&page=2
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...],
    'posts' => LengthAwarePaginator, // 9 posts per page
    'categories' => Collection        // All categories
]
```

#### Show Post Detail
```
GET /posts/{slug}
Controller: PostController@show
Params:
  - slug (string): Post slug
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...],
    'post' => Post,                  // With author, category, tags, media, comments
    'related' => Collection,         // 3 related posts (same category)
    'recent_posts' => Collection,    // 5 recent posts
    'categories' => Collection,      // Categories with post counts
    'tags' => Collection,            // 20 distinct tags
    'reactions' => Collection        // All reaction types
]
```

#### Submit Comment on Post
```
POST /posts/{slug}/comments
Controller: PostController@storeComment
Params:
  - slug (string): Post slug
Body:
  - author_name (required|string|max:150)
  - author_email (required|email|max:150)
  - content (required|string|max:1000)
```

**Response:**
```
Redirect back with success message
```

---

### Announcements

#### List All Announcements
```
GET /pengumuman
Controller: PostController@announcements
Query Params:
  - page (int): Pagination page number
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...],
    'posts' => LengthAwarePaginator // 10 announcements per page
]
```

---

### Galleries

#### List All Galleries
```
GET /galleries
Controller: GalleryController@index
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...],
    'galleries' => Collection // All published galleries with items
]
```

#### Show Gallery Detail
```
GET /galleries/{slug}
Controller: GalleryController@show
Params:
  - slug (string): Gallery slug
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...],
    'gallery' => Gallery,        // With items, extracurricular, comments
    'related' => Collection      // 3 related galleries
]
```

#### Submit Comment on Gallery
```
POST /galleries/{slug}/comments
Controller: GalleryController@storeComment
Params:
  - slug (string): Gallery slug
Body:
  - author_name (required|string|max:150)
  - author_email (required|email|max:150)
  - content (required|string|max:1000)
```

---

### Extracurriculars

#### List All Extracurriculars
```
GET /ekstrakurikuler
Controller: ExtracurricularController@index
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...],
    'extracurriculars' => Collection // All extracurriculars with gallery count
]
```

---

### Guru & Staff

#### List All Guru & Staff
```
GET /guru-staff
Controller: GuruStaffController@index
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...],
    'guru' => Collection,    // Active teachers
    'staff' => Collection    // Active staff
]
```

#### Show Guru/Staff Profile
```
GET /guru-staff/{id}
Controller: GuruStaffController@show
Params:
  - id (int): GuruStaff ID
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...],
    'person' => GuruStaff
]
```

---

### Static Pages

#### Show Static Page
```
GET /page/{slug}
Controller: PageController@show
Params:
  - slug (string): Page slug
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...],
    'page' => Page
]
```

---

### Contact

#### Show Contact Page
```
GET /kontak
Controller: ContactController
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...]
]
```

---

### Student Registration

#### Show Registration Form
```
GET /daftar-online
Controller: StudentApplicationController@create
```

**Response Data:**
```php
[
    'settings' => [...],
    'navigation' => [...]
]
```

#### Submit Registration
```
POST /daftar-online
Controller: StudentApplicationController@store
Body:
  - nama_lengkap (required|string|max:150)
  - nisn (nullable|string|max:20)
  - jenis_kelamin (required|in:L,P)
  - tempat_lahir (required|string|max:100)
  - tanggal_lahir (required|date)
  - alamat (required|string)
  - nama_ortu (required|string|max:150)
  - no_hp (required|string|max:20)
  - email (nullable|email|max:150)
  - asal_sekolah (nullable|string|max:150)
  - dokumen_kk (nullable|file|mimes:pdf,jpg,png|max:2048)
  - dokumen_akte (nullable|file|mimes:pdf,jpg,png|max:2048)
```

**Response:**
```
Redirect back with success message
```

---

### Media

#### Serve Media File
```
GET /media/uploads/{path}
Controller: MediaController@show
Params:
  - path (string): File path (supports nested paths)
```

**Example:**
```
/media/uploads/2025/11/image.jpg
/media/uploads/guru/photo.png
```

**Response:**
```
File stream with appropriate headers
```

---

## 🔐 ADMIN ROUTES (Not Implemented Yet)

### Authentication
```
GET  /admin/login           - Show login form
POST /admin/login           - Process login
POST /admin/logout          - Logout
GET  /admin/forgot-password - Password reset form
POST /admin/forgot-password - Send reset link
```

### Dashboard
```
GET /admin/dashboard        - Admin dashboard home
```

### Posts Management
```
GET    /admin/posts              - List all posts
GET    /admin/posts/create       - Create post form
POST   /admin/posts              - Store new post
GET    /admin/posts/{id}/edit    - Edit post form
PUT    /admin/posts/{id}         - Update post
DELETE /admin/posts/{id}         - Delete post
POST   /admin/posts/bulk         - Bulk actions
```

### Categories Management
```
GET    /admin/categories         - List all categories
POST   /admin/categories         - Store new category
PUT    /admin/categories/{id}    - Update category
DELETE /admin/categories/{id}    - Delete category
```

### Media Management
```
GET    /admin/media              - Media library
POST   /admin/media/upload       - Upload files
DELETE /admin/media/{id}         - Delete media
```

### Galleries Management
```
GET    /admin/galleries          - List all galleries
GET    /admin/galleries/create   - Create gallery form
POST   /admin/galleries          - Store new gallery
GET    /admin/galleries/{id}/edit - Edit gallery form
PUT    /admin/galleries/{id}     - Update gallery
DELETE /admin/galleries/{id}     - Delete gallery
```

### Guru & Staff Management
```
GET    /admin/guru-staff         - List all guru & staff
GET    /admin/guru-staff/create  - Create form
POST   /admin/guru-staff         - Store new record
GET    /admin/guru-staff/{id}/edit - Edit form
PUT    /admin/guru-staff/{id}    - Update record
DELETE /admin/guru-staff/{id}    - Delete record
```

### Student Applications
```
GET    /admin/applications       - List all applications
GET    /admin/applications/{id}  - View application detail
PUT    /admin/applications/{id}/status - Update status
DELETE /admin/applications/{id}  - Delete application
```

### Settings
```
GET  /admin/settings             - Settings page
POST /admin/settings             - Update settings
```

### Users & Roles
```
GET    /admin/users              - List all users
POST   /admin/users              - Create user
PUT    /admin/users/{id}         - Update user
DELETE /admin/users/{id}         - Delete user
GET    /admin/roles              - List all roles
POST   /admin/roles              - Create role
PUT    /admin/roles/{id}         - Update role
```

---

## 🔌 API ENDPOINTS (Not Implemented Yet)

### Reactions API
```
POST /api/posts/{id}/react
Body:
  - reaction_type_id (required|int)
  - session_id (optional|string)
Response:
  {
    "success": true,
    "counts": {
      "like": 10,
      "love": 5,
      "wow": 2
    },
    "total": 17
  }
```

### Comments API
```
GET  /api/posts/{id}/comments
POST /api/posts/{id}/comments
PUT  /api/comments/{id}
DELETE /api/comments/{id}
```

### Search API
```
GET /api/search
Query Params:
  - q (string): Search query
  - type (string): post|gallery|page
  - limit (int): Results limit
Response:
  {
    "results": [...],
    "total": 42,
    "page": 1
  }
```

---

## 🛠️ HELPER FUNCTIONS

### media_url()

**Location:** `app/Support/helpers.php`

**Signature:**
```php
media_url(?string $path, ?string $fallback = null): ?string
```

**Description:**
Converts a media file path to a full URL, handling various path formats and normalizations.

**Usage:**
```php
// Basic usage
media_url('uploads/2025/11/image.jpg')
// Returns: http://localhost/media/uploads/2025/11/image.jpg

// With fallback
media_url(null, '/default-image.jpg')
// Returns: /default-image.jpg

// Handles various formats
media_url('public/uploads/photo.png')
media_url('dash/public/uploads/photo.png')
media_url('uploads/photo.png')
// All return: http://localhost/media/uploads/photo.png

// External URLs pass through
media_url('https://example.com/image.jpg')
// Returns: https://example.com/image.jpg
```

**Features:**
- ✅ Normalizes path separators (\ to /)
- ✅ Removes 'public/' prefix
- ✅ Removes 'dash/public/uploads/' prefix
- ✅ Removes 'uploads/' prefix
- ✅ Handles external URLs (http/https)
- ✅ Resolves relative paths (../)
- ✅ Returns fallback if path is empty

---

## 📦 SERVICE CLASSES

### SiteMetaService

**Location:** `app/Services/SiteMetaService.php`

#### settings()

**Signature:**
```php
public function settings(): array
```

**Description:**
Returns all site settings as an associative array, cached for 5 seconds.

**Usage:**
```php
$meta = app(SiteMetaService::class);
$settings = $meta->settings();

// Access settings
$siteName = $settings['site_name'];
$logo = $settings['logo']; // Already processed through media_url()
```

**Features:**
- ✅ Cached for 5 seconds
- ✅ Automatically converts image paths to URLs
- ✅ Returns key-value pairs

#### navigation()

**Signature:**
```php
public function navigation(): array
```

**Description:**
Returns published pages for navigation menu, cached for 10 minutes.

**Usage:**
```php
$meta = app(SiteMetaService::class);
$navigation = $meta->navigation();

// Returns array of pages
// [
//   ['title' => 'Visi Misi', 'slug' => 'visi-misi'],
//   ['title' => 'Legalitas', 'slug' => 'legalitas'],
//   ...
// ]
```

**Features:**
- ✅ Cached for 10 minutes
- ✅ Ordered by order_num
- ✅ Limited to 6 items
- ✅ Only published pages

---

## 🔍 MODEL SCOPES

### Post::published()

**Usage:**
```php
Post::published()->get();
Post::published()->where('category_id', 1)->get();
```

**SQL:**
```sql
WHERE status = 'published' AND published_at IS NOT NULL
```

### GuruStaff::active()

**Usage:**
```php
GuruStaff::active()->get();
```

**SQL:**
```sql
WHERE is_active = true
```

---

## 📊 ELOQUENT RELATIONSHIPS

### Post Model

```php
$post->author           // BelongsTo User
$post->category         // BelongsTo Category
$post->tags             // HasMany Tag
$post->featuredMedia    // BelongsTo Media
$post->comments         // HasMany Comment
```

### Gallery Model

```php
$gallery->author            // BelongsTo User
$gallery->items             // HasMany GalleryItem
$gallery->extracurricular   // BelongsTo Extracurricular
$gallery->comments          // HasMany Comment
```

### Comment Model

```php
$comment->post      // BelongsTo Post
$comment->gallery   // BelongsTo Gallery
$comment->parent    // BelongsTo Comment (self)
$comment->user      // BelongsTo User
$comment->replies   // HasMany Comment (self)
```

### Media Model

```php
$media->originPost  // BelongsTo Post
$media->variants    // HasMany MediaVariant
```

### GuruStaff Model

```php
$guruStaff->user    // BelongsTo User
```

---

## 🎯 ROUTE NAMING CONVENTIONS

### Current Named Routes

```php
Route::name('home')                     // /
Route::name('posts.index')              // /posts
Route::name('posts.show')               // /posts/{slug}
Route::name('posts.announcements')      // /pengumuman
Route::name('comments.store')           // /posts/{slug}/comments
Route::name('galleries.index')          // /galleries
Route::name('galleries.show')           // /galleries/{slug}
Route::name('gallery.comments.store')   // /galleries/{slug}/comments
Route::name('extracurriculars.index')   // /ekstrakurikuler
Route::name('guru-staff.index')         // /guru-staff
Route::name('guru-staff.show')          // /guru-staff/{id}
Route::name('pages.show')               // /page/{slug}
Route::name('contact')                  // /kontak
Route::name('registration.create')      // /daftar-online
Route::name('registration.store')       // /daftar-online (POST)
Route::name('media.show')               // /media/uploads/{path}
```

### Usage in Blade

```blade
<a href="{{ route('posts.index') }}">Berita</a>
<a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
<a href="{{ route('guru-staff.show', $person->id) }}">Profile</a>
```

---

## 🔄 MIDDLEWARE (Not Fully Implemented)

### Planned Middleware

```php
// Authentication
Route::middleware('auth')->group(function() {
    // Admin routes
});

// Role-based
Route::middleware('role:admin')->group(function() {
    // Admin only routes
});

// Permission-based
Route::middleware('can:edit-posts')->group(function() {
    // Routes requiring specific permission
});

// Rate limiting
Route::middleware('throttle:60,1')->group(function() {
    // API routes
});

// View tracking
Route::middleware('track-views')->group(function() {
    // Post detail routes
});
```

---

## 📝 VALIDATION RULES

### Comment Validation

```php
[
    'author_name' => 'required|string|max:150',
    'author_email' => 'required|email|max:150',
    'content' => 'required|string|max:1000',
]
```

### Student Application Validation

```php
[
    'nama_lengkap' => 'required|string|max:150',
    'nisn' => 'nullable|string|max:20',
    'jenis_kelamin' => 'required|in:L,P',
    'tempat_lahir' => 'required|string|max:100',
    'tanggal_lahir' => 'required|date',
    'alamat' => 'required|string',
    'nama_ortu' => 'required|string|max:150',
    'no_hp' => 'required|string|max:20',
    'email' => 'nullable|email|max:150',
    'asal_sekolah' => 'nullable|string|max:150',
    'dokumen_kk' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
    'dokumen_akte' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
]
```

---

## 🚨 ERROR RESPONSES

### 404 Not Found
```
Triggered when:
- Post slug not found
- Gallery slug not found
- Page slug not found
- GuruStaff ID not found
- Post status is not 'published'
```

### 422 Validation Error
```
Triggered when:
- Form validation fails
- Invalid input data
```

### 500 Server Error
```
Triggered when:
- Database connection fails
- File upload fails
- Unexpected exceptions
```

---

*Last Updated: 25 November 2025*
