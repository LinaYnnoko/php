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

<body>

<div class="galery-text">
    <img class="imeg-2" src="img/Group 2.png">
    <div class="text-description">
        <h2>Хочешь завести четвероногого друга?</h2>
        <p>Наш приют дает шанс обрести животному хороший дом, а человеку - настоящего друга и верного компаньона. Приют является универсальным и не отказывает в помощи ни одному брошенному питомцу. В галерее приюта вы сможете найти котов, собак, птичьих, грызунов, рептилий и других животных. Если вам понравилась карточка животного - добавляйте его в избранное, чтобы не потерять, а затем приезжайте на базу одного из приютов и забирайте воспитанника себе!</p>
        <a href="catalog.php"><button class="see">СМОТРЕТЬ</button></a>
    </div>
</div>

<div class="new-pet">
    <h1>Недавно добавленные животные</h1>
    <div class="pet-card">
        <div class="new-pet-card-1">
        </div>

        <div class="new-pet-card-2">
        </div>

        <div class="new-pet-card-3">
        </div>
    </div>
    <a href="catalog.php"><button class="see-1">СМОТРЕТЬ</button></a>
</div>

<div class="registr">
    <img src="img/Group 3.png">
    <div class="registr-win">
        <h1>Понравился питомец, но есть вопросы?</h1>
        <p>Зарегистрируйтесь на нашем сайте, чтобы иметь возможность добавлять понравившееся вам животное в избранное. А также имейте возможность связаться и задать вопросы нашим администраторам.</p>
        <a href="/registration"><button>Регистрация</button></a>
    </div>
</div>
</body>
</html>
