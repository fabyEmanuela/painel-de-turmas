<?php

function view($name, $data = [])
{
    extract($data);
    require_once __DIR__ . '/../Views/layouts/header.php';
    require_once __DIR__ . '/../Views/layouts/menu-bar.php';
    require_once __DIR__ . "/../Views/{$name}.php";
    require_once __DIR__ . '/../Views/layouts/footer.php';
}
// function redirect($url)
// {
//     header("Location: {$url}");
//     exit();
// }
