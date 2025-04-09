<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Simple Product Management

website ini adalah website management produk sederhana dengan operasi CRUD sederhana yang menggunakan template engine blade, Eloquent ORM dari Laravel, Seeder & Faker, dan MySQL

## Prasyarat

Sebelum memulai, pastikan Anda memiliki hal berikut:

-   PHP >= 8.0
-   Composer
-   MySQL atau database lain yang didukung Laravel
-   Node.js (untuk kebutuhan frontend, jika diperlukan)

## Langkah-Langkah Instalasi

Ikuti langkah-langkah di bawah ini untuk memulai proyek ini:

### 1. Clone Repository

Clone repositori ini ke komputer Anda:

```bash
git clone https://github.com/username/repository-name.git
```

### 2. Install Dependecies

```bash
cd repository-name
composer install
```

### 3. Generate Key Laravel

```bash
php artisan key:generate
```

### 4. Set up Environment Variable

buat file bernama .env dan
copy isi file .env.example

Di bawah ini adalah pengaturan database yang harus Anda konfigurasi di file `.env`:

-   **DB_DATABASE**: `{sesuai nama database}`
-   **DB_USERNAME**: `root` <=== Default.
-   **DB_PASSWORD**: (kosongkan jika tidak ada)

### 5. Migrasi Table dan Seeders

pastikan anda sudah membuat database sesuai dengan database pada .env sebelumnya.

lakukan migrasi tabe menggunakan :

```bash
php artisan migrate
```

dan jalankan seeder untuk data users

```bash
php artisan db:seed
```

### 6. Jalankan Aplikasi

```bash
php artisan serve
---

## 🚀 Route List

### 🔹 Homepage
- **`GET /`**
  - Controller: `HomeController@index`
  - Menampilkan halaman utama aplikasi.

---

### 📦 Produk (CRUD)
Seluruh route produk menggunakan **prefix `/produk`** dan **name route `produk.`**.

| HTTP Method | URI                | Controller Method           | Route Name       | Deskripsi                             |
|-------------|--------------------|-----------------------------|------------------|----------------------------------------|
| GET         | /produk            | ProductController@index     | produk.index     | Menampilkan daftar seluruh produk      |
| GET         | /produk/create     | ProductController@create    | produk.create    | Menampilkan form tambah produk         |
| POST        | /produk            | ProductController@store     | produk.store     | Menyimpan produk baru ke database      |
| GET         | /produk/{id}       | ProductController@show      | produk.show      | Menampilkan detail dari satu produk    |
| GET         | /produk/{id}/edit  | ProductController@edit      | produk.edit      | Menampilkan form edit produk           |
| PUT         | /produk/{id}       | ProductController@update    | produk.update    | Memperbarui data produk berdasarkan ID |
| DELETE      | /produk/{id}       | ProductController@destroy   | produk.destroy   | Menghapus produk dari database         |

---

## ✅ Validasi Input

Pada saat `create` dan `update`, sistem akan memvalidasi input berikut:

- `nama` (required)
- `harga` (required & numeric)
- `stok` (required & integer)

Jika validasi gagal, akan ditampilkan **error message** pada halaman form.

---

```
