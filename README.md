# Toko-Baju-Eduwork
1. Tugas studi kasus pembuatan web catalog terkait toko baju dengan fitur home, manajemen CRUD, dan About pages.
2. Menggunakan HTML, CSS, Js (internal), manajemen database dengan MySQL phpMyAdmin.
3. Tools yang digunakan Vscode dan XAMPP localhost PhpMyAdmin.

# Penjelasan File tiap Folder
## Database
1. Berisi database Mysql untuk menyimpan data products, relasi dan tabel dapat dilihat pada gambar database\tabel-database-db_baju.png.
2. Import db_baju(2).sql untuk mendapatkan data yang sudah terisi. (untuk mendapatkan struktur table saja bisa menggunakan database db_baju.sql).
3. Berisi connect.php untuk menghubungkan tampilan dengan database localhost.

## Folder-no-use
- Tidak perlu dipikirkan, folder ini hanya berisi kumpulan kode orak-orek saja.

## Pages
   ### about
   1. about.html -> Section untuk pengenalan about me.
   2. aboutproject.html -> Section tentang project.
   3. contactsect.html -> Section Contact (Dalam tahap pengembangan, dapat diabaikan).
   4. sendemail.php -> Proses untuk mengirim ke email (Dalam tahap pengembangan, dapat diabaikan).
   ### footer
   1. footer.html -> Bagian bawah web.
   ### home
   1. home.php -> Section menampilkan product yang dimiliki, terintegrasi dengan database.
   2. landing.html -> Section paling atas menu home sebagai landing page sebelum ke Section home.php (tampilan product). 
   3. quote.html -> Section paling bawah menu home sebagai quote setelah Section home.php (tampilan product).
   ### navbar
   1. navbar.html Bagian atas web.

## Public
   - Berisi logo dari proyek web catalog ini untuk ditampilkan di navbar dan taskbar web.

## Styles
1. global.css

## File Manajemen CRUD (Admin)
1. products-jquery.php -> menampilkan product yang dimiliki, sudah dijoinkan dengan tabel lainnya. dan bisa melakukan proses tambah, edit, dan delete pada bagian ini.
2. tambah-jquery.php -> file untuk form tambah product.
3. prosestambah-jquery.php -> proses ke database dari hasil input form tambah-jquery.php (untuk menambah).
4. edit-jquery.php -> file untuk form edit product.
5. prosesedit-jquery.php -> proses ke database dari hasil input form edit-jquery.php (untuk mengedit).
6. delete -> proses ke database dari hasil menekan tombol delete (untuk menghapus).

## File menampilkan Halaman
1. index.php -> merupakan halaman utama, memanggil navabar.html, landing.html, home.php, quote.html, dan footer.html
2. manajemen.php -> merupakan halaman manajemen admin untuk menambah, update, dan delete product. file ini memanggil navbar.html, products-jquery.php, dan footer.html
3. about.php -> merupakan halaman about, memanggil navabar.html, aboutproject.html, about.php, contactsect.html, dan footer.html

## File Lainnya
1. README.md -> Penjelasan fitur, file, dan project.
2. Requirement Tugas.pdf -> Berisi requirement tugas dari project ini

# Foto Product Menggunakan Dataset Kaggle.
- https://www.kaggle.com/datasets/paramaggarwal/fashion-product-images-dataset. 