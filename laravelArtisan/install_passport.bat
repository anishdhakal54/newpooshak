
@echo off
echo                                      ---WARNING---
echo.
start install_passport.html
cd..
composer require laravel/passport
php artisan migrate
php artisan passport:install
pause
