<?php
//DB params
define('DB_HOST', 'localhost');
define('DB_USER', '_YOUR_DB_USER_');
define('DB_PASS', '_YOUR_DB_PASS_');
define('DB_NAME', '_YOUR_DB_NAME_');


//approot wil be used when we need absolute path to our app dir.(kelias iki app folderio)
define('APPROOT', dirname(dirname(__FILE__)));
//define('APPROOT', dirname(__FILE__, 2));
//define('APPROOT', dirname(__DIR__));


//url ROOT will be the path in the url(kelias iki public folderio)
define('URLROOT', 'http://localhost/myshare');

//site name
define('SITENAME', 'My share');


//need to change.htaccess in public
//RewriteBase /__YOUR_SITE_DIR__/public
//replace __YOUR_SITE_DIR__ with root dir name of your site