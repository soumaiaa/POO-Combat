<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
$new = new HeroesManager($db);
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['types']) && !empty($_POST['types']) &&
    isset($_POST['icone']) && !empty($_POST['icone'])
) {
    // var_dump($_POST['icone']);

    $hero = new Hero([
        'name' => $_POST['name'],
        'types' => $_POST['types'],
        'icone' => $_POST['icone']
    ]);
    $new->add($hero);
    header('Location: ../index.php');
} 