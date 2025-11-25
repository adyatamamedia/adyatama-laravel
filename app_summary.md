```markdown
# ADYATAMA SCHOOL - CodeIgniter 4 Project Plan (Qwen Code Mode)

## GOAL
Build a CMS + Admin Dashboard for a school website using:
- CodeIgniter 4 (PHP 8.2)
- MySQL (adyatama_school)
- Volt Admin Theme (Bootstrap 5)

## TASKS

### 1. SETUP
- Create CI4 project
- Configure .env for MySQL
- Run migration & seed
- Install dependencies: CKEditor, Chart.js, Select2
- Helpers: setting(), user_can()

### 2. AUTHENTICATION & RBAC
- Controller: AuthController (login/logout)
- Model: UserModel, RoleModel, PermissionModel
- Middleware: AuthFilter
- Session-based login
- Helper: user_can(permission)
- Routes group: `/admin` (protected)

### 3. LAYOUT (VOLT)
- Add Volt assets to `/public/assets/volt`
- Views:
  - layout/admin_header.php
  - layout/admin_sidebar.php
  - layout/admin_footer.php
  - layout/admin_base.php
- Include Chart.js + Volt.js
- Navbar: profile, logout dropdown

### 4. DASHBOARD
- Controller: Admin\Dashboard
- View: admin/dashboard.php
- Cards: total posts, total users
- Chart: views (7-day)
- Model: PostModel::getViewsLast7Days()

### 5. MODULES

#### POSTS
- Controller: Admin\Posts
- Model: PostModel
- CRUD: list, create, edit, delete
- WYSIWYG: CKEditor
- Select: category, tags
- Upload featured image (MediaModel)
- Auto-slug from title

#### CATEGORIES
- Controller: Admin\Categories
- CRUD simple (name, slug)

#### TAGS
- Inline add/edit with posts

#### MEDIA
- Upload manager
- Generate thumbnails (media_variants)
- Modal selector for featured image

#### GALLERIES
- CRUD + upload multiple image
- Link to extracurriculars
- Drag/drop sorting

#### GURU-STAFF
- CRUD data guru dan staff
- Upload foto
- Filter guru/staff
- Optional link ke user

#### PAGES
- CRUD halaman statis (visi misi, legalitas)
- CKEditor content

#### SETTINGS
- CRUD key/value
- Group tabs: general, contact, seo
- Cache results

#### SEO_OVERRIDES
- CRUD meta (title, desc, keywords)
- Link to posts/pages

### 6. ENGAGEMENT

#### REACTIONS
- API: `/api/posts/{id}/react`
- Update post_reaction_counts (JSON)
- JS: click emoji → update count

#### COMMENTS
- AJAX CRUD (frontend)
- Admin moderation (`is_approved`)

#### VIEWS
- Middleware log per post view
- Dashboard analytics (Chart.js)

### 7. SYSTEM MODULES

#### ACTIVITY_LOG
- Helper: log_action(user, action, subject, id)
- Track login, CRUD, delete
- View logs in admin

#### SCHEDULER
- Command: `php spark publish:scheduled`
- Query: publish posts where `published_at <= NOW()`
- Cron: `* * * * * php spark publish:scheduled`

### 8. TEST & DEPLOY
- Test CRUD + RBAC
- Test uploads & scheduler
- Enable CSRF
- Optimize assets
- Deploy to hosting

## STRUCTURE
```

/app
/Controllers/Admin
Dashboard.php
Posts.php
Settings.php
/Models
PostModel.php
UserModel.php
RoleModel.php
/Views/layout
admin_header.php
admin_sidebar.php
admin_footer.php
admin_base.php
/public
/assets/volt
/uploads

```

## OUTPUT
- CodeIgniter 4 project with Volt theme integrated
- CRUD for posts, pages, galleries, settings
- Role-based access
- Charts for analytics
- Auto-publish scheduler

## AI AGENT ACTIONS
1. Scaffold folder & routes
2. Generate controllers & models
3. Create layout & views
4. Integrate assets & scripts
5. Build CRUD templates
6. Setup API routes (reactions, comments)
7. Add CLI scheduler command
8. Verify migrations & relations

---

**End of QWEN_PLAN.md**
```