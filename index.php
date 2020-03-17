<?php

require_once 'app/core/db.php';

ini_set('display_errors', 1);
session_start();

define( 'DB_NAME', 'db_task_manager' );
define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );

DB::getInstance();

require_once 'app/init.php';

