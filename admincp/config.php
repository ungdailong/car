<?php
$dbhost   = "localhost";
$dbname   = "car_ci";
$dbprefix = "tbl_";
$dbuser   = "root";
$dbpass   = "";

define('PAGE_ROWS',10);
define('CUR_ROWS',9);
define('PAGE_ROWS_ADMIN',15);

ini_set('display_errors', 0);

define('BASE_NAME', 'http://'.$_SERVER['HTTP_HOST'].'/car_ci/');
//define('APP_PATH', 'http://'.$_SERVER['HTTP_HOST'].'/php/century_ci/');
define('CHECK_OK', '<img src="'.APPPATH.'images/ok.gif" width="10"  />');
define('CHECK_NOK', '<img src="'.APPPATH.'images/nok.gif" width="10"  />');

$mod_rewrite = true;

$arrPath = explode('/',$_GET['p']);
define('PATH_CLASS_MODEL','modules/'.$arrPath[0].'/model/');
//
define('_path_image','../application/static/upload/images/');


define('PATH_CAPTCHA_PHOTO','lib/captcha/');;
define('UPLOAD_NEWS','../upload/news/');
define('UPLOAD_LOGO','../upload/logo/');
// email address for tbl
define('MAIL_CONTACT', 'nhatco.it@gmail.com');
define('MAIL_FROM', 'test@tmvsolution.com');

define("DEBUG",1);
define("PRIVATE_KEY","na");

////acount for send email smtp gmail
define('SERVER_SMTP','mail.tmvsolution.com');
define('USER_SMTP','test@tmvsolution.com');
define('PASSWORD_SMTP','minhvu');
define('FROM_NAME','Vacation Travel');
define('FROM','test@tmvsolution.com');

define('SIGNATURE_MAIL','<br><br><img src="'.BASE_NAME.'images/logo.png" width="150" /><br><br>');
?>