<?php
require_once('./config/autoload.php');
require_once('./config/db.php');
$new = new HeroesManager($db);



$heroes = $new->findAllAlive();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⭐COMBAT⭐</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
    <div class="row">
        <div class="col-md-3 text-center">
            <img class="w-75 h-75" src="./assets/monster.gif" alt="">
        </div>
        <div class="col-md-7 text-center d-flex justify-content-center aligne-items-center ">
            <img class="w-75" src="./assets/logo-transparent-png.png" alt="">
        </div>
        <div class="col-md-2"></div>
    </div>
    </header>
    <section class="container-md ">
        <div class="pt-5 ">

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 form">

                    <h1 class="text-center text-white mt-3">Créer votre compte:</h1>

                    <form action="./page-back/carte.php" id="form1" method="post">
                        <label class="text-white-50" for="">saisir votre nom d'hero:</label>
                        <input class="w-100 bg-transparent text-white border shadow " type="text" name="name" value="">

                        <label class="text-white-50" for="">choisir un type:</label>
                        <select class="w-100 bg-transparent text-white border shadow " name="types" id="">
                            <option class=" bg-transparent text-dark border shadow " value="Guerrier">Guerrier</option>
                            <option class=" bg-transparent text-dark border shadow " value="Mage">Mage </option>
                            <option class=" bg-transparent text-dark border shadow " value="Archer">Archer </option>
                        </select>


                        <label class="text-white-50" for="">choisir votre icone:</label>
                        <div class=" ps-5">
                            <ul class="list-unstyled">
                                <div class="row">
                                    <li class="col-4">
                                        <input class="me-1" type="radio" name="icone" value="./assets/combat3.gif" id="firstRadio" checked>
                                        <img name="icone" class="image " id="img" src="./assets/combat3.gif" alt="logo">

                                    </li>
                                    <li class="col-4">
                                        <input class="me-1 " type="radio" name="icone" value="./assets/comba4.gif" id="secondRadio">
                                        <img name="icone" class="image" id="img" src="./assets/comba4.gif" alt="logo">
                                    </li>
                                    <li class="col-4">
                                        <input class="me-1 " type="radio" name="icone" value="./assets/combat6.gif" id="thirdRadio">
                                        <img name="icone" class="image" id="img" src="./assets/combat6.gif" alt="logo">
                                    </li>
                                </div>
                                <div class="row">
                                    <li class="col-4">
                                        <input class=" me-1" type="radio" name="icone" value="./assets/combat7.gif" id="firstRadio" checked>
                                        <img name="icone" class="image" src="./assets/combat7.gif" alt="">

                                    </li>
                                    <li class="col-4">
                                        <input class="me-1 " type="radio" name="icone" value="./assets/comba9.webp" id="secondRadio">
                                        <img name="icone" class="image" src="./assets/comba9.webp" alt="">
                                    </li>
                                    <li class="col-4">
                                        <input class="me-1 " type="radio" name="icone" value="./assets/combat2.gif" id="thirdRadio">
                                        <img name="icone" class="image " src="./assets/combat2.gif" alt="">
                                    </li>
                                </div>
                            </ul>

                            <button class="mt-3 bg-danger mb-5" form="form1" type="submit">Entrer</button>


                        </div>
                </div>

                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
        </div>

        <div class="text-center ">
            <div class="container-md  ">
                <div class="row">
                    <?php foreach ($heroes as $hero) { ?>
                        <div class="carte col-md-6 mx-auto m-3 p-2">
                            <div class="front ">
                                <div class="vignette">⭐⭐⭐</div>

                                <img name="image" class="h-25" id="img" src="<?= $hero->getIcone() ?>" alt="logo">
                                <h1><?= $hero->getName() ?></h1>
                                <div class="d-flex align-content-center justify-content-center ">
                                    <img class="w-25" srcset="https://static.vecteezy.com/system/resources/previews/016/774/414/non_2x/heart-rate-pulse-on-transparent-background-free-png.png 1695w, https://static.vecteezy.com/system/resources/previews/016/774/414/large_2x/heart-rate-pulse-on-transparent-background-free-png.png 3390w" sizes="(max-width: 600px) 100vw, (max-width: 1100px) calc(100vw - 60px), (max-width: 1480px) calc(100vw - 420px), (max-width: 1745px) calc(100vw - 500px), calc(100vw - 620px)" alt="pouls de fréquence cardiaque sur fond transparent png" fetchpriority="high" title="pouls de fréquence cardiaque sur fond transparent" draggable="false" data-controller="image-zoom resource-show-preview-zoom" data-zoom-src="https://static.vecteezy.com/system/resources/previews/016/774/414/large_2x/heart-rate-pulse-on-transparent-background-free-png.png" data-action="click->resource-show-preview-zoom#trackZoomIn" data-resource-show-preview-target="previewImage" src="https://static.vecteezy.com/system/resources/previews/016/774/414/non_2x/heart-rate-pulse-on-transparent-background-free-png.png">
                                    <h4><?= $hero->getHealth_point() ?></h4>
                                </div>
                                <h6><?= $hero->getTypes() ?></h6>
                                <form class="" action="./fight.php" method="post">
                                    <input type="hidden" name="id" value="<?= $hero->getId() ?>"><br>
                                    <button type="submit" class="bg-danger text-center button ">choisir
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>