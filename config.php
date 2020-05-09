<?php 

global $config;
$config = array();

define("BASE","http://toifatululum.com");
define("BASEADMIN", BASE. "admin");
define("BASEDIR", __DIR__ . '/');
define("PUBLIC_DIR", __DIR__ . '/assets/images/uploads/');
define("PROJECTPATH", dirname(__DIR__) . '/recipe');

$config['dbname']= 'recipe';
$config['host']= 'localhost';
$config['password']= 'root';
$config['dbuser']= 'root';

