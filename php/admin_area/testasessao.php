<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] !== 'ok') {
    header('Location: login-page.php?login=semsessao');
    exit;
}
?>