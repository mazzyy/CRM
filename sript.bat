cd "c:\xampp\mysql\bin"
@echo off
For /f "tokens=2-4 delims=/ " %%a in ('date /t') do (set mydate=%%b-%%a-%%c)
For /f "tokens=1-2 delims=/:" %%a in ('time /t') do (set mytime=%%a-%%b)
mysqldump -uhatim -pQJb4yhZzNG4CwGKJ oss_db > "C:\xampp\htdocs\Oss_db%mydate%_%mytime%.sql"
