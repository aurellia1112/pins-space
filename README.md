# 📌 Pins Space

**Pins Space** adalah platform berbagi konten yang memungkinkan pengguna untuk membuat akun, membagikan foto dan video, serta berinteraksi dengan pengguna lain melalui fitur like dan comment.

Project ini dibuat sebagai **tugas project kelompok** dengan tujuan mengembangkan sebuah platform sosial media sederhana yang memiliki fitur autentikasi, upload media, dan interaksi antar pengguna.

## ✨ Features

### 🔐 Authentication

* Register akun baru
* Login
* Logout
* Sistem autentikasi pengguna

### 🖼️ Upload Media

Pengguna dapat membagikan berbagai jenis konten:

* Upload foto
* Upload video
* Video dapat memiliki audio/suara
* Menampilkan konten yang telah di-upload

### ❤️ Interaction

Pengguna dapat berinteraksi dengan konten melalui:

* Like
* Comment
* Melihat jumlah like
* Melihat komentar pada postingan

### 👤 User

* Setiap pengguna memiliki akun masing-masing
* Pengguna dapat membuat dan membagikan postingan
* Konten terhubung dengan akun pengguna yang meng-upload

## 🛠️ Technologies

Project ini dikembangkan menggunakan:

* **PHP**
* **Laravel**
* **MySQL**
* **HTML**
* **CSS**
* **JavaScript**
* **Blade Template**

> Teknologi dapat disesuaikan dengan implementasi yang digunakan pada project.

## 📂 Project Structure

Struktur utama project:

```text
pins-space/
├── app/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

## 🚀 Installation

Ikuti langkah berikut untuk menjalankan project secara lokal.

### 1. Clone Repository

```bash
git clone https://github.com/aurellia1112/pins-space.git
```

Masuk ke folder project:

```bash
cd pins-space
```

### 2. Install Dependencies

```bash
composer install
```

Jika project menggunakan Node.js:

```bash
npm install
```

### 3. Setup Environment

Copy file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Kemudian generate application key:

```bash
php artisan key:generate
```

### 4. Setup Database

Buat database MySQL, kemudian sesuaikan konfigurasi database pada file `.env`.

Contoh:

```env
DB_DATABASE=pins_space
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migration

```bash
php artisan migrate
```

Jika project memiliki seeder:

```bash
php artisan migrate --seed
```

### 6. Run Project

Jalankan Laravel:

```bash
php artisan serve
```

Kemudian buka alamat yang diberikan oleh Laravel pada browser.

Untuk menjalankan frontend jika diperlukan:

```bash
npm run dev
```

## 📸 Main Features

Pins Space menyediakan pengalaman berbagi konten dengan konsep social media sederhana.

**Register & Login**

Pengguna dapat membuat akun dan masuk ke dalam aplikasi menggunakan akun yang telah terdaftar.

**Upload**

Pengguna dapat mengunggah foto maupun video. Video yang diunggah juga dapat mempertahankan audio sehingga pengguna dapat menikmati konten secara lebih lengkap.

**Like & Comment**

Pengguna dapat memberikan like dan komentar pada postingan pengguna lain sebagai bentuk interaksi.

## 🎯 Project Goals

Project ini dibuat untuk menerapkan konsep:

* Web application development
* Authentication & authorization
* CRUD
* Database relationship
* File/media upload
* User interaction
* Frontend & backend integration

## 👥 Team

**Pins Space — Kelompok Project**

Nama

Ananda Rizkia Wulandari
Aurellia Kalila
Nazhira Azalea Laura
Ruthy Mesakh Yahya
Zahra Millan Dalima

> Silakan ubah nama dan role anggota kelompok sesuai pembagian tugas masing-masing.

## 📄 License

This project was created for educational purposes as part of a group project.
