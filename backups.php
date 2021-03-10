<?php
$interval=50; //minutes
set_time_limit(0);
ignore_user_abort(true);
while (true)
{
    $now=time();
    include("backup.php");
    sleep($interval*60-(time()-$now));
}
?>