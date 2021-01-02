
@echo off
echo                                      ---WARNING---
echo.
cd..
set /p Table=Table name
set /p Input=Name of migration 
php artisan make:migration %Input% --table=%Table%
pause

