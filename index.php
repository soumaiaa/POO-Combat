<?php
require_once('./config/autoload.php');
require_once('./config/db.php');
$new = new HeroesManager($db);
if (isset($_POST['name']) && !empty($_POST['name'])) {

    $hero = new Hero([
        'name' => $_POST['name']   
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

<body class="body">
    <section class="container-md">

        <div class="row pt-5">
            <div class="col-4"></div>
            <div class="col-4 form text-center">
                <form action="" method="post">
                    <label class="mt-5" for="">Nom:</label><br>
                    <input class="mt-3" type="text" name="name"><br>
                    <button class="mt-3 mb-5" type="submit">Entrer</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>

        <div class="row ">
            <?php foreach ($heroes as $hero) { ?>

                <div class="carte m-3 col-4">
                    <div class="front ">
                        <div class="vignette">⭐⭐⭐</div>

                        <img name="image" class="h-25" id="img" src="./assets/EvoAelita_Selection_GIF.gif" alt="logo">
                        <h1><?= $hero->getName() ?></h1>
                        <h4><?= $hero->getHealth_point() ?></h4>
                        <form class=" m-3" action="./fight.php" method="post">
                            <input type="hidden" name="id" value="<?= $hero->getId() ?>"><br>
                            <button type="submit" class="text-center button ">choisir
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