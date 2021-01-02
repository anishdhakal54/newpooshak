
@echo off
echo                                      ---WARNING---
echo.
cd..
set /p Input=Name of migration 
php artisan make:migration %Input% 
pause

