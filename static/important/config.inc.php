<?php
$config = array();

$config['db_host'] = "localhost";
$config['db_user'] = "root";
$config['db_pass'] = "";
$config['db_name'] = "fulptube";

$config['recaptcha_secret'] = "";
$config['recaptcha_sitekey'] = "";

session_start();
$conn = mysqli_connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

require($_SERVER['DOCUMENT_ROOT'] . "/static/lib/register.php");
