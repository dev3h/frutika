<?php

if (empty($_SESSION['role'])) {
    header('location: ../index.php');
}
