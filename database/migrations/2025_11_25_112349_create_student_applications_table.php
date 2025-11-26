<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('student_applications')) {
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
                $table->string('pas_foto')->nullable();
                $table->string('foto_ijazah')->nullable();
                $table->enum('status', ['pending', 'review', 'accepted', 'rejected'])->default('pending');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_applications');
    }
};
