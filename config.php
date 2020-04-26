<?php 

global $config;
$config = array();

define("BASE","http://localhost/recipe");
define("BASEADMIN", BASE. "admin");
define("BASEDIR", __DIR__ . '/');
define("PROJECTPATH", dirname(__DIR__) . '/recipe');

$config['dbname']= 'recipe';
$config['host']= 'localhost';
$config['password']= '';
$config['dbuser']= 'root';

