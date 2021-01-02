
@echo off
cd..

set /p x=Name of controller 
php artisan make:controller %x%
 
pause

