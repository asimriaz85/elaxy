<?php
/*define("DB_SERVER", "localhost:31006");*/
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "elaxy");
define("TBL_USERS", "users");
define("TBL_ATTEMPTS", "login_attempts");
define("ATTEMPTS_NUMBER", "3");
define("TIME_PERIOD", "30");
define("COOKIE_EXPIRE", 60*60*24*100);      //100 days by default
define("COOKIE_PATH", "/");                 //Avaible in whole domain
?>