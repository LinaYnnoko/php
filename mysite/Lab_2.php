<?php
//Ex1

echo("Задание 1")."<br/>";
$x = True;
$y = False;
$z = True;

echo ($x + $y)."<br/>";
echo ($x + $z)."<br/>";
echo ($y + $z)."<br/>";

echo ($x - $y)."<br/>";
echo ($x - $z)."<br/>";
echo ($y - $z)."<br/>";

echo ($x * $y)."<br/>";
echo ($x * $z)."<br/>";
echo ($y * $z)."<br/>";

echo ($x / $y)."<br/>"; //Деление на 0
echo ($x / $z)."<br/>";
echo ($y / $z)."<br/>";

echo "<br/>";

//Ex2
echo("Задание 2")."<br/>";

var_dump((bool) "");
var_dump((bool) 3);
var_dump((bool) -2);
var_dump((bool) "one");
var_dump((bool) 2.3e5);
var_dump((bool) array(1));
var_dump((bool) array());
var_dump((bool) "false");
var_dump((bool) 0);
var_dump((bool) 0.1);
var_dump((bool) true);
var_dump((bool) false);
var_dump((bool) -0.01);
var_dump((bool) null);
var_dump((bool) " ");

echo "<br/>";


//Ex3
echo("Задание 3")."<br/>";
$a = 0123; // восьмеричное число ( 83 )
$b = 01750; // восьмеричное число ( 1000 )
$c = 07; // восьмеричное число ( 7 )

$d = 10;
$e = 987;
$f = 1098;

$j = 0x1A; // шестнадцатеричное число ( 26 )
$h = 0x1E; // шестнадцатеричное число ( 30 )
$i = 0x28; // шестнадцатеричное число ( 40 )

var_dump($a);
var_dump($b);
var_dump($c);
var_dump($d);
var_dump($e);
var_dump($f);
var_dump($j);
var_dump($h);
var_dump($i);

echo "<br/>";

//Ex4
echo("Задание 4")."<br/>";

$a = FALSE;
$b = 3243553.8787865757;
$c = 88888.11111;
$d = 54521.5;
$e = (5*3)/2003;

$a1 = intval($a);
$b1 = intval($b);
$c1 = intval($c);
$d1 = intval($d);
$e1 = intval($e);

echo ($a1)."<br/>";
echo ($b1)."<br/>";
echo ($c1)."<br/>";
echo ($d1)."<br/>";
echo ($e1)."<br/>";

echo "<br/>";
//Ex5
echo ("Задание 5")."<br/>";

$a = 1.234;
$b = 1.2e6;
$c = 3E-5;
$d = 1_2.56;
$e = 0.0001;
$f = -1.0e22;
$j = 2_12.542;
$h = 12E-123;
$i = -0.0001;

echo "<br/>";

//Ex6
echo ("Задание 6")."<br/>";

$a = "Бью ногой отражение в луже";
$b = 'Никакой рассыпаюсь по нотам';
$c = <<<EOD
Просто кто-то очень нужен,
очень нужен кто-то
EOD;

echo ($a)."<br/>";
echo ($b)."<br/>";
echo ($c)."<br/>";

echo "<br/>";

//Ex7
echo ("Задание 7")."<br/>";

$str = <<<EOT
     “Осень”
Листья в поле пожелтели,
И кружатся и летят;
Лишь в бору поникши ели
Зелень мрачную хранят.
EOT;

echo nl2br($str);
echo "<br/>";

//Ex8
echo "<br/>";
echo ("Задание 8")."<br/>";

$mass[] = "дождь";
$mass[] = "солнце";
$mass[] = "ветер";
$mass[] = "тучи";
$mass[] = "лужи";

echo $mass[0];
echo "<br/>";
echo $mass[4];

$mass2[0][0] = "ноты";
$mass2[0][1] = "гамма";
$mass2[1][0] = "до";
$mass2[1][1] = "ре";
$mass2[1][2] = "ми";

echo "<br/>";
echo $mass2[0][0];
echo "<br/>";
echo $mass2[1][2];
echo "<br/>";

$mass3["Нервы"] = "Евгений Мильковский";
$mass3["Пошлая Молли"] = "Кирилл Бледный";
$mass3["Lida"] = "Вячеславич Ромадов";
$mass3["Король и Шут"] = "Михаил Горшенев";
$mass3["Валентин Стрыкало"] = ["Юрий Каплан",666];

echo "<pre>";
 var_dump($mass3);
echo "</pre>";


echo $mass3["Нервы"];
echo "<br/>";
echo $mass3["Lida"];
echo "<br/>";

$mass4["полка 1"] = array ("author"=>"Лев Толстой", "name"=>"Война и Мир", "pages"=>"1300");
$mass4["полка 2"] = array ("author"=>"Николай Гоголь", "name"=>"Шинель", "pages"=>"96");
$mass4["полка 3"] = array ("author"=>"Федор Достоевский", "name"=>"Преступление и наказание", "pages"=>"608");
$mass4["полка 4"] = array ("author"=>"Михаил Булгаков", "name"=>"Мастер и Маргарита", "pages"=>"310");
$mass4["полка 5"] = array ("author"=>"Николай Гоголь", "name"=>"Мертвые души", "pages"=>"352");

echo $mass4["полка 1"]["author"];
echo "<br/>";
echo $mass4["полка 3"]["author"];
echo "<br/>";

//Ex9
echo "<br/>";
echo ("Задание 9")."<br/>";
class Hi
{
    function hello()
    {
        echo "Hello there :)";
    }
}

$bar = new Hi;
$bar->hello();
echo "<br/>";

//Ex10
echo "<br/>";
echo ("Задание 10")."<br/>";

$var1 = NULL;
$var2 = 1;
$var3;
$var4 = '';

unset($var2);

var_dump($var1);
echo($var2);
echo($var3);
echo($var4);

?>