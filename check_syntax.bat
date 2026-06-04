@echo off
cd /d "c:\Joshua\Semester 4\Pengembangan Aplikasi Web\Praktikum\Project Akhir\PAW_KEL9"
echo === Syntax Check ===
php -l app/Http/Controllers/PembeliController.php
echo.
echo === Check PenjualController ===
php -l app/Http/Controllers/PenjualController.php
echo.
echo === Check checkout form ===
php -l resources/views/pembeli/checkout.blade.php
echo.
pause
