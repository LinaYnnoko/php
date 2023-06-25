<?php

//Ex1

echo("Задание 1")."<br/>";

$sub_str = "подольше";
$main_str = "Но у каждого свой путь и пусть, мы может не увидимся больше. Мне только тебя бы не спугнуть, вот бы это было подольше...";

$str_len = round(strlen($main_str)/2);
$pos = strpos($main_str, $sub_str, $str_len);

if($pos == false)
    echo("последовательность не найдена")."<br/>";
else
    echo("последовательность найдена")."<br/>";

echo "<br/>";

//Ex2

echo("Задание 2")."<br/>";

$sub_str = "ratulat";
$main_str = "congratulations";

$pos = strpos($main_str, $sub_str);

if($pos == false)
    echo("последовательность не найдена")."<br/>";
else
    echo($main_str[$pos - 1]);
    echo($sub_str);
    echo($main_str[$pos + strlen($sub_str)])."<br/>";

echo "<br/>";

//Ex3

echo("Задание 3")."<br/>";

$main_str3 = "Red Hot Chilli Pepper";
$n = rand(0,strlen($main_str3)/2);
$first_str = substr($main_str3, 0, $n);

$last_str = substr($main_str3, -$n);

echo "<br> Исходная строка".$main_str3;
echo "<br> Подстрока с первыми n символами: ".$first_str;
echo "<br> Подстрока с последними n символами: ".$last_str;

if($first_str === $last_str)
echo ("Строки равны")."<br/>";
else
echo ("Строки не равны")."<br/>";

//Ex4

echo("Задание 4")."<br/>";

$str = 'abc abc abc';
$b = 'b';
$pos1 = strpos ($str, $b);
$pos2 = strripos($str, $b);
$pos3 = strpos($str, $b, 3);

echo("Позиция первой буквы: $pos1")."<br/>";
echo("Позиция последней буквы: $pos2")."<br/>";
echo("Позиция первой буквы, но поиск с позиции 3: $pos3")."<br/>";

echo "<br/>";

//Ex5

echo("Задание 5")."<br/>";

$str = "aaa aaaaa aaa aaaa aaa";
$result = strpos($str, ' ', strpos($str, ' ') + 1);
echo("$result")."<br/>";

echo "<br/>";

echo("Задание 6")."<br/>";

 $str1 = '1234567890';
 $arr1 = str_split($str1, 2);

 echo '<pre>';
 print_r($arr1);
 echo '</pre>';

echo("Задание 7")."<br/>";

 $str1 = '1234567890';
 $arr2 = str_split($str1, 2);
 echo implode('-', $arr2)."<br/>";

 echo "<br/>";

 echo("Задание 8")."<br/>";

 $str3 = '/php-8.0/';
  echo chop(trim($str3, '/'),"-8.0")."<br/>";

  echo "<br/>";

echo("Задание 9-10")."<br/>";

  $str4 = 'слова слова слова';
  $str44 = 'слова слова слова.';
  echo trim($str4, '.').'.' . "</br>";
  echo trim($str44, '.').'.'. "<br/>";
  echo "<br/>";

echo("Задание 11")."<br/>";
  $str5 = 'madam';
  $str55 = 'kayak';

  $exitStr1 = ($str5 == strrev($str5)) ? 'является' : 'не является';
  $exitStr2 = ($str55 == strrev($str55)) ? 'является' : 'не является';

  echo $exitStr1 ."</br>";
  echo $exitStr2 ."</br>";
  echo "<br/>";

echo("Задание 12")."<br/>";

  $str6 = 'Hello There';
  echo str_shuffle($str6)."<br/>";
  echo "<br/>";

echo("Задание 13")."<br/>";

  $str7 = 'abcdefghiklmnopqrstvxyz';
  $shuffle = str_shuffle($str7);
  echo substr($shuffle, 0, 6)."<br/>";

  echo "<br/>";

echo("Задание 14")."<br/>";
  $str8 = '12345678';
  echo number_format($str8, 0, ',', ' ')."<br/>";

  echo "<br/>";

echo("Задание 15")."<br/>";
  $str9 = 'I--love-you';
  echo ("Исходная строка  $str9")."<br/>";
  echo ltrim($str9,"I")."<br/>";

  echo "<br/>";



echo("Задание ")."<br/>";
$str = 'улица Свердfgfgfgfлова дом 1366';

$result = explode(' ', $str);
var_dump($result);
$ul = mb_strcut($result[0], 0, 4);
$home = mb_strcut($result[2], 0, 3);

echo $ul.".".$result[1]." ".$home.".".$result[3];

  echo "<br/>";
    echo "<br/>";


    echo("Задание")."<br/>";

    $str_new = "cxfdff/15/22";
    $str_one = explode("/", $str_new);

    var_dump($str_one);
    $yan = mb_strcut($str_one[0], 0, 3);
    echo "<br/>";
    echo $str_one[1]." ".$yan."."." "."20".$str_one[2]."г.";


?>