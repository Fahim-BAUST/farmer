<?php
session_start();
session_destroy();
unset($_SESSION['name']);
unset($_SESSION['password']);

header('location: index.php');