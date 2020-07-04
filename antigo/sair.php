<?php
session_start();
unset($_SESSION['cLogin']);
unset($_SESSION['nome']);
header('location: ./');
?>