# Inventory System

## Requirements
Pastikan software berikut sudah terinstall di komputer kamu sebelum menjalankan proyek:
- PHP Herd
- Composer (package manager untuk PHP)
- MySQL
- Flutter SDK
- Android Studio / Xcode (untuk menjalankan emulator mobile)

## Cara Menjalankan Backend (/web)
1. Pastikan PHP Herd sudah berjalan

2. Masuk ke folder web
cd web

3. Install semua dependencies Laravel
composer install

4. Jalankan server Laravel
php artisan serve

Server akan berjalan di http://localhost:8000

## Cara Menjalankan Migration Database
1. Pastikan MySQL sudah berjalan dan konfigurasi database sudah diisi di file .env

2. Buat file migrasi (jika belum ada)
php artisan make:migration create_nama_tabel_table

3. Jalankan migrasi untuk membuat semua tabel di database secara otomatis
php artisan migrate

## Cara Menjalankan Aplikasi Mobile (/mobile)
1. Masuk ke folder mobile
cd mobile

2. Install semua dependencies Flutter
flutter pub get

3. Jalankan aplikasi mobile
flutter run
