

## Langkah langkah menjalankan projek kasir_pintar

Ketikan perintah-perintah berikut di terminal
1. git clone [<URL-repository-GitHub>](https://github.com/LegarSuryantara/kasir_pintar.git) : Untuk Menduplikasi projek

2. composer install : digunakan untuk menginstall semua dependesi laravel. Jangan lupa masuk ke dalam projek laravel yang sudah kita clone sebelumnya "cd kasir_pintar"

3. cp .env.example .env : digunakan untuk membuat file konfigurasi .env

4. php artisan key:generate : Membuat kunci enkripsi untuk aplikasi Laravel

5. buat database mysql dengan nama "kasir_pintar"

6. php artisan migrate, php artisan db:seed : ketikan perintah tersebut untuk membuat dan mengsi tabel

7. php artisan serve : menjalankan laravel

