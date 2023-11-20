# Times pro

used laravel version 7 

to setup  the project in system
open terminal or command prompt
git clone https://github.com/salunkeakash/quiz.git
composer install 
remame .env.example file to  .env
create database in your mysql 
add database name , user name , user password in env file 
php artisan key:generate
php artisan migrate:fresh --seed
