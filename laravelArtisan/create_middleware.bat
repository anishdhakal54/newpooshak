@echo off
cd..

set /p x=Name of middleware 
php artisan make:middleware %x%
 
pause