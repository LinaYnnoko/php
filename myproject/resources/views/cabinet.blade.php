<?
session_start();


$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');

$arrMenu = mysqli_query($db, "SELECT * FROM `Menu`");
$arrAnimals = mysqli_query($db, "SELECT * FROM `Type`");
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>Pet</title>
</head>
<header>
    <nav>
        <ul class="topmenu">
            <? while (($menu = mysqli_fetch_assoc($arrMenu)) != false) {?>
            <li><a href="<?=$menu['Link']?>"><?=$menu['HomePage']?></a>
                    <? if($menu['idMenu'] == 2){?>
                <ul class="submenu">
                        <?while (($animal = mysqli_fetch_assoc($arrAnimals)) != false) {?>
                    <li><a href="<?=$menu['Link']?>?type=<?=$animal['idType']?>"><?=$animal['TypeName']?></a></li>
                    <?}?>
                </ul>
                <?}?>
            </li>
            <?}?>
        </ul>
    </nav>
</header>
<div class="hello-backgrount">
    <h1> Добро пожаловать!</h1>

    <div class="favorite-card">
        <h2>Избранные питомцы</h2>

    </div>
    <a href="{{ route('logout') }}"> Выйти из кабинета </a>
</div>
</html>
