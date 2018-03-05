<?php
$Filepath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// ^ это нужно чтобы сервер не искал файл вида /news/?page=2
$File = __DIR__ . '/' . trim($Filepath, '/');
$_GET['url'] = $Filepath;
unset($Filepath, $File);

ini_set("display_errors",1);
error_reporting(E_ALL);

session_start();

// use an autoloader
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Pagination.php';

//Library
require 'libs/Database.php';

require 'config/params.php';
require 'config/database.php';

$app = new Bootstrap();