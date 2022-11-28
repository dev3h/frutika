<?php
function handleStatus($status_id)
{
    switch ($status_id) {
        case "0":
            return 'chưa kích hoạt';
        case "1":
            return 'kích hoạt';
        default:
            return 'không xác định';
    }
}
