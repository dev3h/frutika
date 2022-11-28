<?php

if (!isset($_SESSION['role'])) {
    header('location: ../index.php');
}
