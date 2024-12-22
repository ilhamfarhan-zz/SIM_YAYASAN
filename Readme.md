#setelah melakukan clone pada file 
Pastikan Xampp versi 8.1,kemudian ikuti langkah di bawah ini 
-Silahkan untuk melakukan : -composer install
                            -Copy paster file .env kemudian ganti DB_DATABASE = Sesuai yang di inginkan
                            -php artisan config:cache
                            -php artisan key:generate
                            -php artisan migrate
                            -php artisan db:seed --class=AkunSeederphp
                            -php artisan serve
#selamat web telah bisa digunakan
