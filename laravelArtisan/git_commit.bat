
@echo off
cd..

set /p x=Write a message 
git add .
git commit -m " %x% "
 
pause

