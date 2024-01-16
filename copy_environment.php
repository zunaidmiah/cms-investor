<?php

set_time_limit(60);
for ($i = 0; $i < 59; ++$i) {

    copy('.env.php', 'charts/.env.php');
    copy('.env.php', 'cms/.env.php');
    copy('.env.php', 'laravel/.env.php');
    copy('.env.php', 'bursa/.env.php');
    
    sleep(1);
    
}