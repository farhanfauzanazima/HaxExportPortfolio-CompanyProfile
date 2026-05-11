# CocoExport — Website Company Profile

Website company profile untuk **PT. Hax Trade Export (CocoExport) "Sebagai Contoh"**, perusahaan ekspor produk kelapa berkualitas tinggi dari Indonesia untuk pasar global.

---

## Deskripsi Proyek

CocoExport adalah website statis berbasis PHP yang berfungsi sebagai media promosi dan penghubung antara perusahaan dengan calon mitra bisnis di seluruh dunia. Website ini menampilkan profil perusahaan, produk unggulan, serta menyediakan formulir kontak yang terintegrasi dengan database MySQL.

---

## Fitur Utama

- Tampilan company profile yang responsif (mobile-friendly)
- Halaman produk dengan detail spesifikasi
- Formulir kontak dengan validasi input
- Penyimpanan data kontak ke database MySQL
- Modal pop-up sukses setelah form terkirim
- Keamanan query menggunakan Prepared Statement (anti SQL Injection)

---

## Struktur Halaman

| Halaman | File | Deskripsi |
|---|---|---|
| Beranda | `index.php` | Hero section, keunggulan, produk unggulan, testimoni, info kontak |
| Tentang Kami | `tentangKami.php` | Visi misi, statistik perusahaan, nilai-nilai, form kontak |
| Produk | `produk.php` | Detail produk VCO, daftar produk terkait |
| Kontak | `kontak.php` | Modal form kontak, informasi perusahaan |

---

## Struktur Direktori

```
cocoexport/
│
├── index.php               # Halaman Beranda
├── tentangKami.php         # Halaman Tentang Kami
├── produk.php              # Halaman Produk
├── kontak.php              # Halaman Kontak
├── simpanData.php          # Backend: menerima & menyimpan data form
│
├── css/
│   ├── bootstrap.min.css   # Framework Bootstrap 5
│   └── style/
│       └── style.css       # Custom CSS
│
├── js/
│   ├── bootstrap.bundle.min.js
│   └── script/
│       ├── script.js       # Script umum
│       └── form.js         # Script handling form kontak (kontak.php)
│
└── image/                  # Aset gambar produk & perusahaan
```

---

## Alur Form Kontak

```
User isi form → POST ke simpanData.php → Validasi server → INSERT MySQL → Response JSON
```

**Field yang dikumpulkan:**

| Field | Nama Input | Validasi |
|---|---|---|
| Nama Lengkap | `namaLengkap` | Wajib diisi |
| Email | `emailAddress` | Wajib, format email valid |
| Nama Perusahaan | `namaPerusahaan` | Wajib diisi |
| Negara | `negara` | Wajib diisi |
| Pesan | `pesan` | Wajib diisi |

---

## Database

**Nama Database:** `haxexport_db`

**Tabel:** `form_kontak`

```sql
CREATE TABLE form_kontak (
    id               INT AUTO_INCREMENT PRIMARY KEY,
    namaLengkap      VARCHAR(255) NOT NULL,
    namaPerusahaan   VARCHAR(255) NOT NULL,
    emailAddress     VARCHAR(255) NOT NULL,
    negara           VARCHAR(100) NOT NULL,
    pesan            TEXT         NOT NULL,
    tanggal_submit   DATETIME     DEFAULT CURRENT_TIMESTAMP
);
```

---

## Tech Stack

| Komponen | Teknologi |
|---|---|
| Frontend | HTML5, Bootstrap 5, CSS3 |
| Backend | PHP (native) |
| Database | MySQL |
| Keamanan | Prepared Statement, `filter_var()` |

---

## Cara Instalasi

### Prasyarat

- PHP >= 7.4
- MySQL >= 5.7
- Web server: Apache / Nginx (atau XAMPP / Laragon untuk lokal)

### Langkah-langkah

1. **Clone atau download** repository ini ke direktori web server kamu:
   ```bash
   # Contoh untuk XAMPP
   cd C:/xampp/htdocs/
   git clone <url-repo> cocoexport
   ```

2. **Buat database** di phpMyAdmin atau MySQL CLI:
   ```sql
   CREATE DATABASE haxexport_db;
   USE haxexport_db;

   CREATE TABLE form_kontak (
       id               INT AUTO_INCREMENT PRIMARY KEY,
       namaLengkap      VARCHAR(255) NOT NULL,
       namaPerusahaan   VARCHAR(255) NOT NULL,
       emailAddress     VARCHAR(255) NOT NULL,
       negara           VARCHAR(100) NOT NULL,
       pesan            TEXT         NOT NULL,
       tanggal_submit   DATETIME     DEFAULT CURRENT_TIMESTAMP
   );
   ```

3. **Konfigurasi koneksi database** di file `simpanData.php`:
   ```php
   $hostname = "localhost";
   $username = "";    // sesuaikan
   $password = "";    // sesuaikan
   $database = "";
   ```

4. **Jalankan** web server dan akses melalui browser:
   ```
   http://localhost/cocoexport/index.php
   ```

---

## Produk yang Ditampilkan

- Virgin Coconut Oil (VCO)
- Minyak Kelapa Biasa
- Santan Bubuk Instan
- Santan Segar Beku
- Kelapa Parut Kering
- Coconut Sugar / Gula Kelapa Organik
- Coconut Powder
- Arang Briket
- Kelapa Segar

---

## Informasi Perusahaan

| | |
|---|---|
| **Perusahaan** | PT. Hax Trade Export (Contoh) |
| **Brand** | CocoExport / HaxExport |
| **Berdiri** | 2008 (15+ tahun pengalaman) |
| **Jangkauan** | 50+ negara |
| **Klien** | 1.000+ |
| **Email** | info@cocoexport.com |
| **Telepon** | +62 821-1173-0000 |
| **Alamat** | Jl. Raya Export No. 123, Jakarta Selatan 12345 |

---

## Lisensi

&copy; 2025 CocoExport — PT. Hax Trade Export. All rights reserved.
