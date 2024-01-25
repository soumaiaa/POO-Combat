<?php
require_once('./config/autoload.php');
require_once('./config/db.php');
$new = new HeroesManager($db);


  if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['name']) && !empty($_POST['name']) &&
    isset($_POST['types']) && !empty($_POST['types']) && 
    isset($_POST['icone']) && !empty($_POST['icone'])) {
    // var_dump($_POST['icone']);
 
    $hero = new Hero([
        'name' => $_POST['name'],
        'types' => $_POST['types'],
        'icone' => $_POST['icone']
    ]);
    $new->add($hero);
}

$heroes = $new->findAllAlive();

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

<body class="bodyaccuiel">

    <section class="container-md acc">
         
        <!-- <video class="media-url__media" loop="" autoplay="" muted="" playsinline="" width="100%"><source src="https://i.gifer.com/MOOP.mp4" itemprop="contentUrl" type="video/mp4"></video> -->
        <div class="pt-5 acc">

            <!-- <div>
                <video class="media-url__media logo" loop="">
                    <source src="https://i.gifer.com/D6Df.mp4" itemprop="contentUrl" type="video/mp4">
                </video>
            </div> -->
            <div class=" form ">

                <form action="" id="form1" method="post">

                    <div class="row">

                        <div class="col-4">
                            <h1 class="text-center text-white mt-3">Créer votre compte:</h1>
                            <div>
                                <label class="mt-5 text-white" for="">Nom:</label>
                                <input class="mt-3" type="text" name="name"><br>
                                <label class="mt-5 text-white" for="">Type:</label>
                            </div>
                            <div class="input-group mb-3 mt-3">
                                <select class="form-select" name="types" id="inputGroupSelect02">
                                    <option>Guerrier</option>
                                    <option>Mage </option>
                                    <option>Archer</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-8 ps-5">
                            <ul class="list-unstyled">
                                <div class="row">
                                    <li class="col-4">
                                        <input class=" me-1" type="radio" name="icone" value="./assets/EvoYumi_Selection_GIF.gif" id="firstRadio" checked>
                                        <img name="icone" class="image " id="img" src="./assets/EvoYumi_Selection_GIF.gif" alt="logo">

                                    </li>
                                    <li class="col-4">
                                        <input class="me-1" type="radio" name="icone" value="./assets/Ulrich_Selection_GIF.gif" id="secondRadio">
                                        <img name="icone" class="image" id="img" src="./assets/Ulrich_Selection_GIF.gif" alt="logo">
                                    </li>
                                    <li class="col-4">
                                        <input class="me-1" type="radio" name="icone" value="./assets/EvoAelita_Selection_GIF.gif" id="thirdRadio">
                                        <img name="icone" class="image" id="img" src="./assets/EvoAelita_Selection_GIF.gif" alt="logo">
                                    </li>
                                </div>
                                <div class="row">
                                    <li class="col-4">
                                        <input class=" me-1" type="radio" name="icone" value="https://i.giphy.com/lPXKWZv35ejr7wzNZV.webp" id="firstRadio" checked>
                                        <img name="icone" class="image" class="media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:480/480" src="https://i.giphy.com/lPXKWZv35ejr7wzNZV.webp" alt="">

                                    </li>
                                    <li class="col-4">
                                        <input class="me-1" type="radio" name="icone" value="https://i.giphy.com/BxOVwGlhoAdy63cyFr.webp" id="secondRadio">
                                        <img name="icone" class="image" class="media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:480/432" src="https://i.giphy.com/BxOVwGlhoAdy63cyFr.webp" alt="">
                                    </li>
                                    <li class="col-4">
                                        <input class="me-1" type="radio" name="icone" value="https://i.giphy.com/f5SQh2AIEHKPX6rKIp.webp" id="thirdRadio">
                                        <img name="icone" class="image " class="media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:398/480" src="https://i.giphy.com/f5SQh2AIEHKPX6rKIp.webp" alt="">
                                    </li>
                                </div>
                            </ul>


                        </div>
                    </div>
                    <div class="text-center">
                    <button class="mt-3 mb-5" form="form1" type="submit">Entrer</button>
                    </div>
                </form>
            </div>

        </div>
        
        <div class="text-center d-flex align-content-center flex-wrap hero">
            <?php foreach ($heroes as $hero) { ?>
                <div class="carte m-3">
                    <div class="front ">
                        <div class="vignette">⭐⭐⭐</div>

                        <img name="image" class="h-25" id="img" src="<?= $hero->getIcone() ?>" alt="logo">
                        <h1><?= $hero->getName() ?></h1>
                        <div class="d-flex align-content-center justify-content-center ">
                        <img class="w-25" srcset="https://static.vecteezy.com/system/resources/previews/016/774/414/non_2x/heart-rate-pulse-on-transparent-background-free-png.png 1695w, https://static.vecteezy.com/system/resources/previews/016/774/414/large_2x/heart-rate-pulse-on-transparent-background-free-png.png 3390w" sizes="(max-width: 600px) 100vw, (max-width: 1100px) calc(100vw - 60px), (max-width: 1480px) calc(100vw - 420px), (max-width: 1745px) calc(100vw - 500px), calc(100vw - 620px)" alt="pouls de fréquence cardiaque sur fond transparent png" fetchpriority="high" title="pouls de fréquence cardiaque sur fond transparent" draggable="false" data-controller="image-zoom resource-show-preview-zoom" data-zoom-src="https://static.vecteezy.com/system/resources/previews/016/774/414/large_2x/heart-rate-pulse-on-transparent-background-free-png.png" data-action="click->resource-show-preview-zoom#trackZoomIn" data-resource-show-preview-target="previewImage" src="https://static.vecteezy.com/system/resources/previews/016/774/414/non_2x/heart-rate-pulse-on-transparent-background-free-png.png">
                        <h4><?= $hero->getHealth_point() ?></h4>
                        </div>
                        <h6><?= $hero->getTypes()?></h6>
                        <form class="" action="./fight.php" method="post">
                            <input type="hidden" name="id" value="<?= $hero->getId() ?>"><br>
                            <button type="submit" class="bg-danger text-center button ">choisir
                            </button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>