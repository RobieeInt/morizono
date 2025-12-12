<p align="center">
  <strong style="font-size:22px">RECONEXT</strong><br>
  <span>Internal Web Application</span>
</p>

---

## Tentang Aplikasi

Aplikasi ini dikembangkan oleh **RECONEXT** sebagai sistem internal berbasis web  
dengan arsitektur **monolith**,

Framework yang digunakan adalah **Laravel**, dengan tujuan mempermudah
pengelolaan data dan proses operasional

---

## Spesifikasi Teknis

-   **Framework**: Laravel
-   **PHP**: **8.1**
-   **Database**: **MySQL (versi terbaru)**
-   **Arsitektur**: Monolith
-   **Dependency Manager**: Composer
-   **Frontend**: Blade + Vite (jika digunakan)
-   **PDF Generator**: Node.js (custom script / Puppeteer)

---

## Kebutuhan Sistem

Pastikan environment lokal sudah terpasang:

-   PHP **8.1**
-   MySQL (latest stable)
-   Composer
-   Node.js (LTS disarankan)
-   Web server:
    -   Apache / Nginx, atau
    -   `php artisan serve`

---

## Cara Instalasi (Local)

1. Masuk ke folder project

    ```bash
    cd reconext-project

    ```

2. Install dependency backend
   composer install

3. Copy file environment
   cp .env.example .env

4. Atur konfigurasi database di .env
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=

5. Generate application key
   php artisan key:generate

6. Jalankan migration dan seed
   php artisan migrate --seed

7. Jalankan aplikasi
   php artisan serve

8. Akses aplikasi melalui browser
   http://127.0.0.1:8000

Database
• Database menggunakan MySQL
• Struktur database dikelola melalui:
• Migration Laravel
• (Opsional) SQL dump
• Pastikan database sudah dibuat sebelum menjalankan migration

Akun Default

Jika menggunakan seeder, akun awal tersedia:
• Role: Admin
• Username / Email: (lihat seeder)
• Password: (lihat seeder)

Disarankan mengganti password setelah login pertama.

Kepemilikan & Dukungan
• Aplikasi dikembangkan oleh RECONEXT
• Hak kepemilikan source code berada pada pihak perusahaan
• Dukungan teknis mengikuti kesepakatan kerja sama
