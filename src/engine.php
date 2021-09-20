<?php
$route = [
    'users/create' => 'create_users.php',
    'files/create' => 'create_files.php',
    'users/' => 'index_users.php',
    'files/' => 'index_files.php',

];
foreach ($route as $key => $val) {
    if ($key == $_SERVER['QUERY_STRING']) {
        require $val;
    }
}
