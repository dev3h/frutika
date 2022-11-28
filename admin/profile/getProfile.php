 <?php
    require_once '../classes/db.php';
    $query = "SELECT admin.*, role_types.name AS role_name FROM admin 
                                        JOIN role_types ON admin.role = role_types.id WHERE username='$_SESSION[username]'";
    $query_run = Database::getInstance()->query($query);
    if ($query_run->num_rows == 1) {
        $each = $query_run->fetch_assoc();
    }
