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
} else {
    header("location:./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIGHT </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="fight">

    <div class="container-md mt-5">
        <div class="text-center text-warning">
            <h1>cliquez VS pour commencer le combat</h1>
        </div>
        <div class="d-flex align-items-center mt-2 justify-content-evenly text-warning">
            <div class=" rounded-pill nom1">
                <h3 class="text-center "><?= $hero->getName() ?></h3>
                <div class="d-flex align-content-center justify-content-center div1">
                    <img class="w-25" srcset="https://static.vecteezy.com/system/resources/previews/016/774/414/non_2x/heart-rate-pulse-on-transparent-background-free-png.png 1695w, https://static.vecteezy.com/system/resources/previews/016/774/414/large_2x/heart-rate-pulse-on-transparent-background-free-png.png 3390w" sizes="(max-width: 600px) 100vw, (max-width: 1100px) calc(100vw - 60px), (max-width: 1480px) calc(100vw - 420px), (max-width: 1745px) calc(100vw - 500px), calc(100vw - 620px)" alt="pouls de fréquence cardiaque sur fond transparent png" fetchpriority="high" title="pouls de fréquence cardiaque sur fond transparent" draggable="false" data-controller="image-zoom resource-show-preview-zoom" data-zoom-src="https://static.vecteezy.com/system/resources/previews/016/774/414/large_2x/heart-rate-pulse-on-transparent-background-free-png.png" data-action="click->resource-show-preview-zoom#trackZoomIn" data-resource-show-preview-target="previewImage" src="https://static.vecteezy.com/system/resources/previews/016/774/414/non_2x/heart-rate-pulse-on-transparent-background-free-png.png">
                    <h4><?= $hero->getHealth_point() ?></h4>
                </div>
                <h6 class="text-center  "><?= $hero->getTypes() ?></h6>
            </div>
            <div class="">
                <button class="attaque"> <img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExODJxeWI2MDY0cGx6Nm16eTl5bnRhZDM1ZGc2dWw4OGNiaDB0OHM1MyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9dHM/Kw4Aus4JxvHmtscjhR/giphy.gif" alt="Vs Sticker by Persisofficial" style="width: 100%; height: 100%;"></button>
            </div>
            <div class=" rounded-pill nom1">
                <h3 class="text-center "><?= $monster->getNomMonster() ?></h3>
                <div class="d-flex align-content-center justify-content-center div2">
                    <img class="w-25" srcset="https://static.vecteezy.com/system/resources/previews/016/774/414/non_2x/heart-rate-pulse-on-transparent-background-free-png.png 1695w, https://static.vecteezy.com/system/resources/previews/016/774/414/large_2x/heart-rate-pulse-on-transparent-background-free-png.png 3390w" sizes="(max-width: 600px) 100vw, (max-width: 1100px) calc(100vw - 60px), (max-width: 1480px) calc(100vw - 420px), (max-width: 1745px) calc(100vw - 500px), calc(100vw - 620px)" alt="pouls de fréquence cardiaque sur fond transparent png" fetchpriority="high" title="pouls de fréquence cardiaque sur fond transparent" draggable="false" data-controller="image-zoom resource-show-preview-zoom" data-zoom-src="https://static.vecteezy.com/system/resources/previews/016/774/414/large_2x/heart-rate-pulse-on-transparent-background-free-png.png" data-action="click->resource-show-preview-zoom#trackZoomIn" data-resource-show-preview-target="previewImage" src="https://static.vecteezy.com/system/resources/previews/016/774/414/non_2x/heart-rate-pulse-on-transparent-background-free-png.png">
                    <h4><?= $monster->getPhMonster() ?></h4>
                </div>
                <h6 class="text-center color-white "><?= $monster->getTypeMonster() ?></h6>
            </div>
        </div>
       
        
        <div class="row">

            <div class="col-md-3">
                <img name="" class="imag" src="<?= $hero->getIcone() ?>" alt="logo">
            </div>
            <div class="text-center  resultat mt-5V col-md-6 ">
                <?php foreach ($resultats as $resultat) { ?>
                    <div class="">
                        <p class="rus"><?= $resultat ?></p>                 
                    </div>
                <?php } ?>
            </div>
            <div class=" col-md-3">
                <img name="" class="imag" src="./assets/monster0.webp" alt="logo">
            </div>
        </div>
    </div>https://s3-us-west-2.amazonaws.com/s.cdpn.io/1159990/boom.wav
    <audio src="./assets/AVERAGE ICHIGO ENJOYER COMBO🔥.mp3"></audio>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>