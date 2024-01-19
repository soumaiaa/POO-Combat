<?php
require_once('./config/autoload.php');
require_once('./config/db.php');

$new = new HeroesManager($db);
if (isset($_POST['id'])) {
    // var_dump($_POST['id']);
    $hero = $new->find($_POST['id']);
    // var_dump($hero);

    $fightManager = new FightsManager();
    $monster = $fightManager->createMonster();
    $resultats = $fightManager->fight($hero, $monster);
    $new->update($hero);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="body">

    <div class="container-md mt-5">
        <div class="d-flex align-items-center mt-2 justify-content-evenly">
            <div class=" rounded-pill nom1">
                <h1 class="text-center color-white pt-3"><?= $hero->getName() ?></h1>
            </div>
            <div class=""><img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExODJxeWI2MDY0cGx6Nm16eTl5bnRhZDM1ZGc2dWw4OGNiaDB0OHM1MyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9dHM/Kw4Aus4JxvHmtscjhR/giphy.gif" alt="Vs Sticker by Persisofficial" style="width: 100%; height: 100%;">
            </div>
            <div class=" rounded-pill nom1">
                <h1 class="text-center color-white pt-3"><?= $monster->getNomMonster() ?></h1>
            </div>
        </div>
        <div class="text-center mt-5 ">
            <?php foreach ($resultats as $resultat) { ?>
                <ol class="">
                    <li class="rus"><?= $resultat ?></p>
                    </li>
                </ol>
            <?php } ?>
        </div>
        <div class=" image d-flex justify-content-evenly">

            <div class="hero">
                <img name="" class="" src="./assets/EvoAelita_Selection_GIF.gif" alt="logo">

            </div>
            <div class="monster">
                <img name="" class="" src="./assets/EvoYumi_Selection_GIF.gif" alt="logo">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>