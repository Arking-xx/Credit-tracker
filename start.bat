@echo off

:: Start XAMPP Apache and MySQL
echo starting XAMPP...
cd C:\xampp
start /B xampp_start.exe

:: Wait for XAMPP to fully start
echo Waiting for XAMPP...
timeout /t 5 /nobreak

:: Go to your project and start Laravel
echo Starting Laravel...
cd C:\xampp\htdocs\dashboard\laravel-proj\credit-tracker
start http://localhost/dashboard/laravel-proj/credit-tracker/public/

pause