<?php
//DB params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'myshare');


//approot wil be used when we need absolute path to our app dir.(kelias iki app folderio)
define('APPROOT', dirname(dirname(__FILE__)));
//define('APPROOT', dirname(__FILE__, 2));
//define('APPROOT', dirname(__DIR__));


//url ROOT will be the path in the url(kelias iki public folderio)
define('URLROOT', 'http://localhost/myshare');

//site name
define('SITENAME', 'MyShare');

//app version
define("APPVERSION", "1.0.0");





//need to change.htaccess in public
//RewriteBase /__YOUR_SITE_DIR__/public
//replace __YOUR_SITE_DIR__ with root dir name of your site


//Table users
//CREATE TABLE `myshare` . `users` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `created` DATETIME on update CURRENT_TIMESTAMP NOT NULL default CURRENT_TIMESTAMP , PRIMARY KEY(`id`)) ENGINE = MyISAM;