# Portofolioku

Sistem Manajemen Portofolio Pribadi (CMS) dibangun menggunakan PHP murni (Vanilla PHP) dengan pola arsitektur MVC (Model-View-Controller) tanpa menggunakan framework external. Frontend di-styling menggunakan TailwindCSS dan Vanilla JS sesuai standar `requirment.md`.

## Instalasi

1. Pastikan Anda memiliki PHP >= 8.0 dan MySQL terinstall.
2. Clone repositori ini atau salin folder ke environment local Anda (XAMPP/Laragon/Valet).
3. Buat database baru di MySQL bernama `portofolioku` (atau nama lain, lalu sesuaikan di `config/database.php`).
4. Jalankan script SQL yang ada di `database/migrations/001_create_tables.sql` untuk membuat tabel dan memasukkan data default admin.
5. Konfigurasikan Web Server Anda agar mengarah ke direktori `public` sebagai Document Root.
   - **Apache**: Pastikan modul `mod_rewrite` aktif. Gunakan `.htaccess` yang telah disediakan.
   - **Nginx**: Set konfigurasi `try_files $uri $uri/ /index.php?$query_string;` di block location.

## Deployment

1. Upload seluruh file ke server hosting Anda.
2. Arahkan domain ke folder `public`.
3. Import file database sql ke database produksi Anda.
4. Sesuaikan kredensial di file `config/database.php`.

## Database Structure

Terdapat 6 tabel utama:
- `users`: Admin authentikasi.
- `settings`: Konfigurasi situs (judul, deskripsi, sosial media).
- `projects`: Daftar portofolio yang ditampilkan di halaman depan.
- `skills`: Daftar keahlian (skills).
- `experiences`: Pengalaman kerja/pendidikan.
- `messages`: Inbox dari form kontak di halaman depan.

## API Documentation

Karena aplikasi ini menggunakan MVC murni (Server-Side Rendering), tidak ada external REST API yang disediakan. Namun, logic internal menggunakan Router sederhana.
Semua request di-routing melalui `public/index.php` ke `App\Controllers`.

## Folder Structure

Mengikuti standar `requirment.md`:
- `app/` (Berisi Core System MVC: Controllers, Models, Views)
- `config/` (Konfigurasi)
- `database/` (Migrations/Seeders SQL)
- `public/` (Entry point `index.php` dan aset statis seperti CSS/JS/Images)
- `routes/` (Definisi routing Web dan Admin)

## Coding Standards

- **PSR-4 Autoloading**: Diimplementasikan dengan autoloader manual sederhana di `index.php`.
- **PDO Prepared Statements**: Digunakan di semua Model untuk menghindari SQL Injection.
- **Separation of Concerns**: Logika bisnis di Model, flow control di Controller, tampilan di View.
- **Tailwind Utility-First**: Digunakan via CDN (atau dapat dikompilasi jika dibutuhkan nanti) untuk styling UI/UX yang konsisten.
