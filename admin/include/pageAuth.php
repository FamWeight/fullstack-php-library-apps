<?php
session_start();
if (!isset($_COOKIE['username']) || !isset($_SESSION['username']) || $_COOKIE['username'] !== $_SESSION['username'] || $_SESSION['role'] !== 'admin') {
    header("Location: aLogin.php");
    exit();
}
