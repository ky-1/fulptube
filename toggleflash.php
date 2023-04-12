<?php 
session_start();

if(!isset($_SESSION['flash'])) {
    $_SESSION['flash'] = true;
} else {
    unset($_SESSION['flash']);
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>