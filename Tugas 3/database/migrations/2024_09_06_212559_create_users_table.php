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
        // Tabel untuk menyimpan informasi pengguna
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama pengguna
            $table->string('email')->unique(); // Email unik
            $table->timestamp('email_verified_at')->nullable(); // Verifikasi email
            $table->string('password'); // Kata sandi pengguna
            $table->foreignId('role_id') // Foreign key mengarah ke tabel roles
                ->nullable()
                ->constrained('roles')
                ->onDelete('set null');
            $table->string('phone_number')->nullable(); // Kolom tambahan untuk nomor telepon
            $table->rememberToken(); // Token untuk "remember me"
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });

        // Tabel untuk menyimpan token reset password
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email sebagai primary key
            $table->string('token'); // Token untuk reset password
            $table->timestamp('created_at')->nullable(); // Timestamp token dibuat
        });

        // Tabel untuk menyimpan sesi pengguna
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID sesi sebagai primary key
            $table->foreignId('user_id')->nullable()->index(); // Foreign key ke tabel users
            $table->string('ip_address', 45)->nullable(); // Alamat IP pengguna
            $table->text('user_agent')->nullable(); // User agent dari browser
            $table->longText('payload'); // Payload dari sesi
            $table->integer('last_activity')->index(); // Waktu terakhir aktivitas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions'); // Menghapus tabel sessions
        Schema::dropIfExists('password_reset_tokens'); // Menghapus tabel password_reset_tokens
        Schema::dropIfExists('users'); // Menghapus tabel users
    }
};
