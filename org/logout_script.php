<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: ../login.php?error=');
}
session_destroy();
header('location: ../login.php?error=');