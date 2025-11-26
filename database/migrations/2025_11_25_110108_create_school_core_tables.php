<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('description', 150)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role_id')) {
                $table->foreignId('role_id')
                    ->nullable()
                    ->after('fullname')
                    ->constrained('roles')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();
                $table->index('role_id', 'idx_users_role');
            }
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->unique();
            $table->string('label', 150)->nullable();
            $table->string('resource', 100)->nullable();
            $table->string('action', 50)->nullable();
            $table->string('description', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('role_permissions', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained('roles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('permission_id')->constrained('permissions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->primary(['role_id', 'permission_id']);
            $table->index('permission_id', 'idx_rp_perm');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 120)->unique();
            $table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete()->cascadeOnUpdate();
            $table->enum('post_type', ['article', 'announcement', 'video'])->default('article');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('featured_media_id')->nullable();
            $table->string('video_url', 255)->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->boolean('react_enabled')->default(true);
            $table->boolean('comments_enabled')->default(true);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->dateTime('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('author_id', 'idx_posts_author');
            $table->index('category_id', 'idx_posts_category');
            $table->index(['status', 'published_at'], 'idx_posts_status_published');
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name', 100);
            $table->string('slug', 120);
            $table->timestamp('created_at')->useCurrent();
            $table->index('post_id', 'idx_tags_post');
            $table->index('slug', 'idx_tags_slug');
        });

        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('origin_post_id')->nullable()->constrained('posts')->nullOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['image', 'video', 'file'])->default('image');
            $table->string('path');
            $table->string('caption', 255)->nullable();
            $table->json('meta')->nullable();
            $table->integer('order_num')->default(0);
            $table->unsignedBigInteger('filesize')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
            $table->index('origin_post_id', 'idx_media_post');
        });

        Schema::create('media_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->constrained('media')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('variant_key', 50);
            $table->string('path');
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedBigInteger('filesize')->nullable();
            $table->json('meta')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->unique(['media_id', 'variant_key'], 'ux_media_variant');
            $table->index('media_id', 'idx_media_variants_media');
        });

        Schema::create('extracurriculars', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120)->unique();
            $table->text('description')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->foreignId('extracurricular_id')->nullable()->constrained('extracurriculars')->nullOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('view_count')->default(0);
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->timestamps();
            $table->softDeletes();
            $table->index('author_id', 'idx_galleries_author');
            $table->index('extracurricular_id', 'idx_galleries_extracurricular');
        });

        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained('galleries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('media_id')->nullable()->constrained('media')->nullOnDelete()->cascadeOnUpdate();
            $table->enum('type', ['image', 'video'])->default('image');
            $table->string('path');
            $table->string('caption', 255)->nullable();
            $table->integer('order_num')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
            $table->index('gallery_id', 'idx_gallery_items_gallery');
            $table->index('media_id', 'idx_gallery_items_media');
        });

        Schema::create('guru_staff', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 50)->nullable();
            $table->string('nama_lengkap', 150);
            $table->string('jabatan', 100)->nullable();
            $table->string('bidang', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('foto', 255)->nullable();
            $table->enum('status', ['guru', 'staff'])->default('guru');
            $table->boolean('is_active')->default(true);
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->softDeletes();
            $table->index('user_id', 'idx_gs_user');
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->string('featured_image', 255)->nullable();
            $table->enum('status', ['draft', 'published'])->default('published');
            $table->integer('order_num')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key_name', 100)->unique();
            $table->text('value')->nullable();
            $table->enum('type', ['text', 'textarea', 'number', 'boolean', 'image', 'json'])->default('text');
            $table->string('group_name', 50)->default('general');
            $table->string('description', 255)->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('seo_overrides', function (Blueprint $table) {
            $table->id();
            $table->string('subject_type', 50);
            $table->unsignedBigInteger('subject_id');
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->string('meta_keywords', 500)->nullable();
            $table->string('canonical', 255)->nullable();
            $table->string('robots', 50)->default('index,follow');
            $table->json('structured_data')->nullable();
            $table->timestamps();
            $table->unique(['subject_type', 'subject_id'], 'ux_seo_subject');
        });

        Schema::create('scheduled_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_key', 150);
            $table->string('job_type', 100);
            $table->json('payload')->nullable();
            $table->dateTime('scheduled_at');
            $table->unsignedTinyInteger('attempts')->default(0);
            $table->enum('status', ['pending', 'running', 'failed', 'done'])->default('pending');
            $table->text('last_error')->nullable();
            $table->timestamps();
            $table->index('job_type', 'idx_sj_type');
            $table->index('scheduled_at', 'idx_sj_scheduled');
        });

        Schema::create('post_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->timestamp('viewed_at')->useCurrent();
            $table->index('post_id', 'idx_pv_post');
            $table->index('user_id', 'idx_pv_user');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->nullable()->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('gallery_id')->nullable()->constrained('galleries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parent_id')->nullable()->constrained('comments')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->string('author_name', 150)->nullable();
            $table->string('author_email', 150)->nullable();
            $table->text('content');
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_spam')->default(false);
            $table->timestamps();
            $table->index('post_id', 'idx_comments_post');
            $table->index('gallery_id', 'idx_comments_gallery');
            $table->index('parent_id', 'idx_comments_parent');
        });

        Schema::create('reaction_types', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('code', 30)->unique();
            $table->string('emoji', 10);
            $table->string('label', 50)->nullable();
            $table->timestamp('created_at')->useCurrent();
        });

        Schema::create('post_reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('reaction_type_id')->constrained('reaction_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->string('session_id', 128)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
            $table->unique(['post_id', 'user_id'], 'ux_pr_post_user');
            $table->unique(['post_id', 'session_id'], 'ux_pr_post_session');
            $table->index('post_id', 'idx_pr_post');
            $table->index('user_id', 'idx_pr_user');
            $table->index('session_id', 'idx_pr_session');
        });

        Schema::create('post_reaction_counts', function (Blueprint $table) {
            $table->foreignId('post_id')->primary()->constrained('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('counts')->nullable();
            $table->unsignedInteger('total')->default(0);
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('activity_log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->string('action', 100);
            $table->string('subject_type', 100)->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->json('meta')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->index('user_id', 'idx_al_user');
        });

        Schema::create('student_applications', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 150);
            $table->string('nisn', 20)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('nama_ortu', 150);
            $table->string('no_hp', 20);
            $table->string('email', 150)->nullable();
            $table->string('asal_sekolah', 150)->nullable();
            $table->string('dokumen_kk')->nullable();
            $table->string('dokumen_akte')->nullable();
            $table->enum('status', ['pending', 'review', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_applications');
        Schema::dropIfExists('activity_log');
        Schema::dropIfExists('post_reaction_counts');
        Schema::dropIfExists('post_reactions');
        Schema::dropIfExists('reaction_types');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('post_views');
        Schema::dropIfExists('scheduled_jobs');
        Schema::dropIfExists('seo_overrides');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('guru_staff');
        Schema::dropIfExists('gallery_items');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('extracurriculars');
        Schema::dropIfExists('media_variants');
        Schema::dropIfExists('media');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('role_permissions');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');

        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role_id')) {
                $table->dropForeign(['role_id']);
                $table->dropColumn('role_id');
            }
        });
    }
};
