<?php
function handleGender($gender_id) {
    switch($gender_id) {
        case "0":
            return 'nữ';
        case "1":
            return 'nam';
        case "2":
            return 'khác';
        default:
            return 'không xác định';
    }
}