
@echo off
echo                                      ---WARNING---
echo.
cd..
set /p Input=Name of migration 
set /p Input1=Name of table  
php artisan make:migration %Input% --table=%Input1%
pause

