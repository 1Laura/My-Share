<?php
//load config file
require_once "config/config.php";

////load core libraries
//require_once "libraries/Core.php";
//require_once "libraries/Controller.php";
//require_once "libraries/Database.php";

// load libraries automatically
spl_autoload_register(function ($className) {
    require_once "libraries/$className.php";
});

