<?php$dbhost = 'localhost';
$dbuser = 'hatim';
$dbpass = 'QJb4yhZzNG4CwGKJ';
$dbname='oss_db';
$toDay = date('d-m-Y');
    exec("mysqldump --user=$dbuser --password='$dbpass' --host=$dbhost --single-transaction $dbname > D:\Sql_Backupse:\xampp\htdocs/Oss".$toDay."_DB.sql");
?>