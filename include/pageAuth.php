<?php
session_start();
if (!isset($_COOKIE['username']) || !isset($_SESSION['username']) || $_COOKIE['username'] !== $_SESSION['username'] || $_SESSION['role'] !== 'user') {
    header("Location: index.php");
    exit();
}
