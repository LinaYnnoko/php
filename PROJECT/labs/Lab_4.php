<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Лабораторная работа №4</title>
    <style type="text/css">
   TABLE {
    text-align: center;
    width: 1000px; /* Ширина таблицы */
    border-collapse: collapse; /* Убираем двойные линии между ячейками */
   }
   TD, TH {
    padding: 7px; /* Поля вокруг содержимого таблицы */
    border: 1px solid black; /* Параметры рамки */
   }
   TH {
    background: #FFFFE0; /* Цвет фона */
   }
  </style>
</head>
<body>
  <?php

//Ex1

echo("Задание 1")."<br/>";

for($i = 0; $i < 5; $i++){
  $mas[]= mt_rand(0,99);
}

$min = min($mas);
$max = max($mas);

echo '<pre>';
print_r($mas);
echo '</pre>';


echo("Минимальное значение массива: $min")."<br/>";
echo("Максимальное значение массива: $max")."<br/>";

echo "<br/>";

//Ex2

echo("Задание 2")."<br/>";

$dx = 0.25;
for($x = -5; $x < 6; $x += $dx){
  $f[]= 2*$x*exp(-$x);
}
$result = $f;

var_dump(implode(", ", $result));
echo "<br/>";


$dx = M_PI/10;
for($x = -M_PI; $x <= M_PI; $x += $dx){
  $g[]= cos($x);
}
$result = $g;

echo '<pre>';
print_r($result);
echo '</pre>';

echo "<br/>";


$x = rand(0,2000);
$y = rand(0,2000);
$z = rand(0,2000);

$x = round($x/6);
$y = round($y/6);
$z = round($z/6);

echo ("Рандомный x: $x")."<br/>";
echo ("Рандомный y: $y")."<br/>";
echo ("Рандомный z: $z")."<br/>";

//
$res = sin(M_PI_4*$x) * sqrt(abs(($y + log10($z*$z+1)/($x + $y + $z))));
echo ("a= $res")."<br/>";

//
$res2 = $x * exp(-(abs($x+$y)/2)) + cos(log10(1 + abs($y))) + pow($z, 1/3);
echo ("b= $res2")."<br/>";

//
for($i = 0; $i < 5; $i++){
  $X[]= mt_rand(0,99);
}
for($i = 0; $i < 5; $i++){
  $Y[]= mt_rand(0,99);
}

echo '<pre>';
print_r($X);
echo '</pre>';

echo '<pre>';
print_r($Y);
echo '</pre>';

$MaxX = max($X);
$MinX = min($X);

$MaxY = max($Y);
$MinY = min($Y);

$res3 = sqrt(abs(($MaxY - $MinY ) / $MaxX + $MinX));
echo ("D = $res3")."<br/>";

//

$res4 = ($y+3)/(sqrt($z*$z+1))*log10(abs($x + 1));
echo ("$res4")."<br/>";

$res5 = sin($x*$x) - log10(abs(cos($y)+ $z + 1));
echo ("$res5")."<br/>";

echo "<br/>";

//Ex3

echo("Задание 3")."<br/>";

$firs_str_10 = 486;
$firs_str_2 = DecBin($firs_str_10);
$firs_str_8 = DecOct($firs_str_10);
$firs_str_16 = DecHex($firs_str_10);

$second_str_2 = 101010111;
$second_str_10 = BinDec($second_str_2);
$second_str_8 = DecOct($second_str_10);
$second_str_16 = DecHex($second_str_10);

$third_str_8 = 145;
$third_str_10 = OctDec($third_str_8);
$third_str_2 = DecBin($third_str_10);
$third_str_16 = DecHex($third_str_10);

$fourth_str_16 = d8e0;
$fourth_str_10 = HexDec($fourth_str_16);
$fourth_str_2 = DecBin($fourth_str_10);
$fourth_str_8 = DecOct($fourth_str_10);;

echo "<table>
<tr>
  <th>Исходное число</th>
  <th>В 10-ной системе</th>
  <th>В 2-ной системе</th>
  <th>В 8-ной системе</th>
  <th>В 16-ной системе</th>
</tr>
 <tr>
    <td> $firs_str_10 </td>
    <td> - </td>
    <td> $firs_str_2 </td>
    <td> $firs_str_8 </td>
    <td> $firs_str_16 </td>
   </tr>
   <tr>
    <td> $second_str_2 </td>
    <td> $second_str_10 </td>
    <td> - </td>
    <td> $second_str_8 </td>
    <td> $second_str_16 </td>
   </tr>
   <tr>
    <td>$third_str_8</td>
    <td>$third_str_10  </td>
    <td> $third_str_2</td>
    <td> - </td>
    <td> $third_str_16 </td>
    </tr>
    <tr>
     <td>$fourth_str_16</td>
     <td> $fourth_str_10 </td>
     <td> $fourth_str_2 </td>
     <td> $fourth_str_8 </td>
     <td> - </td>
       </tr>
</table>";
?>
</body>
</html>
