
@echo off
echo                                      ---WARNING---
echo.
cd..
git init
set /p Input=Paste the origin of git 
git remote add origin %Input%

git status
git add .
git commit -m "Initial commit"
pause
