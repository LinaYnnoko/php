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
    <link rel="stylesheet" type="text/css" href="/css/app.css">
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
<img class="body-img-registr" src="img/depositphotos_204643984-stock-photo-row-of-cute-different-dogs.jpg">
<div class="registration-pole">
    <h2>Регистрация</h2>

    <form id="registration" action="{{ route('registration') }}" method="post" novalidate autocomplete="off">
        @csrf

        <ul>
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>

        <input class="name-reg" placeholder="Имя" type="text" name="name" autocomplete="off">

        @if($errors->has('name'))
        <div style="position: absolute; left: 15%; top: 23%; color: red">
            <span>Неккоректное имя</span>
        </div>
        @endif

        <input class="surname-reg" placeholder="Фамилия" type="text"  onchange="check(event)" name="surname" autocomplete="off">

        @if($errors->has('surname'))
            <div style="position: absolute; left: 15%; top: 36%; color: red">
                <span>Неккоректная фамилия</span>
            </div>
        @endif

        <input class="phone-reg" placeholder="Телефон" type="tel" name="phone" pattern="^\+[0-9]{1,3}[0-9]{1,3}[0-9]{3}[0-9]{2}[0-9]{2}$" title="Например: +375296993079">

        @if($errors->has('phone'))
            <div style="position: absolute; left: 15%; top: 48%; color: red">
                <span>Неккоректный телефон</span>
            </div>
        @endif

        <input  class="password-reg" placeholder="Пароль" type="password" name="password" autocomplete="off">
        <input class="password2-reg" placeholder="Повторите пароль"type="password" name="password2" autocomplete="off">
        <input type="submit" id="submit" value="Зарегистрироваться">
    </form>
    <p class="auth">Уже зарегистрированы?</p>
    <a href=""><p class="auth1">Авторизуйтесь!</p></a>
</div>
</body>
</html>
