<?php
//Ex1

echo("Задание 1")."<br/>";

$a = 3047;
$b = 1250;

$otr = -$a;
$sum = $a + $b;
$sub = $a - $b;
$div = $a / $b;
$mult = $a * $b;
$mod = $a % $b;

echo("Отрицание: $otr")."<br/>";
echo("Сложение: $sum")."<br/>";
echo("Вычитание: $sub")."<br/>";
echo("Деление: $div")."<br/>";
echo("Умножение: $mult")."<br/>";
echo("Деление по модулю: $mod")."<br/>";

echo "<br/>";

//Ex2

echo("Задание 2")."<br/>";

$per1 = 101;
$per2 = 'g';

$per1_prefix_in = ++$per1;
$per1_postfix_in = $per1++;
$per1_prefix_di = --$per1;
$per1_postfix_di = $per1--;

$per2_prefix_in = ++$per2;
$per2_postfix_in = $per2++;
$per2_prefix_di = --$per2;
$per2_postfix_di = $per2--;

echo ("Префиксный инкремент числа: $per1_prefix_in")."<br/>";
echo ("Постфиксный инкремент числа: $per1_postfix_in")."<br/>";
echo ("Префиксный дикремент числа: $per1_prefix_di")."<br/>";
echo ("Префиксный дикремент числа: $per1_postfix_di")."<br/>";

echo ("Префиксный инкремент строки: $per2_prefix_in")."<br/>";
echo ("Постфиксный инкремент строки: $per2_postfix_in")."<br/>";
echo ("Префиксный дикремент строки: $per2_prefix_di")."<br/>";
echo ("Префиксный дикремент строки: $per2_postfix_di")."<br/>";

echo "<br/>";

//Ex3

echo("Задание 3")."<br/>";

$type1 = 53;
$type2 = false;
$type3 = true;
$type4 = NULL;

$result1 = 48 + $type1;
$result2 = $type2 + 1;
$result3 = $type3 + false;
$result4 = $type4 + 100;

echo($result1)."<br/>";
echo($result2)."<br/>";
echo($result3)."<br/>";
echo($result4)."<br/>";

$type1 += 47;
$type2 += 5;
$type3 += true;
$type4 += false;

echo($type1)."<br/>";
echo($type2)."<br/>";
echo($type3)."<br/>";
echo($type4)."<br/>";

echo "<br/>";

//Ex4

echo("Задание 4")."<br/>";

$str1 = ' Cutes ';
$str2 = ' Frogs ';

$result_str1 = $str1 . $str2;
echo($result_str1)."<br/>";

$str1 .= $str2;
echo($str1)."<br/>";

$i = 'f';
for($n=1; $n<12; $n++)
   echo ++$i;

echo "<br/>";

//Ex5
echo "<br/>";

echo("Задание 5")."<br/>";

$a = 15; // 1111
$b = 4; // 0101

$result_and = $a & $b;
$result_or = $a | $b;
$result_exc_or = $a ^ $b;
$result_shift_left = $a << $b;
$result_shift_right = $a >> $b;

echo($result_and)."<br/>";
echo($result_or)."<br/>";
echo($result_exc_or)."<br/>";
echo($result_shift_left)."<br/>";
echo($result_shift_right)."<br/>";

echo "<br/>";

//Ex6

echo("Задание 6")."<br/>";

$a = 220;
$b = 200;

echo('результат условия  $a==$b :');
var_dump(($a==$b));
echo "<br/>";

echo('результат условия  $a===$b :');
var_dump(($a===$b));
echo "<br/>";

echo('результат условия  $a!=$b :');
var_dump(($a!=$b));
echo "<br/>";

echo('результат условия  $a<>$b :');
var_dump(($a<>$b));
echo "<br/>";

echo('результат условия  $a!==$b :');
var_dump(($a!==$b));
echo "<br/>";

echo('результат условия  $a<$b :');
var_dump(($a<$b));
echo "<br/>";

echo('результат условия  $a>$b :');
var_dump(($a>$b));
echo "<br/>";

echo('результат условия  $a<=$b :');
var_dump(($a<=$b));
echo "<br/>";

echo('результат условия  $a>=$b :');
var_dump(($a>=$b));
echo "<br/>";

echo('результат условия  $a <=> $b :');
var_dump(($a <=> $b));
echo "<br/>";
echo "<br/>";

//Ex7

echo("Задание 7")."<br/>";

$a = 10;
$b = 5;

echo 'Результат условия ($a>0 and $b>0) : ';
var_dump(($a>0 and $b>0));
echo "<br/>";

echo 'Результат условия ($a>0 or $b>0) : ';
var_dump(($a>0 or $b>0));
echo "<br/>";

echo 'Результат условия ($a>0 xor $b>0) : ';
var_dump(($a>0 xor $b>0));
echo "<br/>";

echo 'Результат условия (!$b>0) : ';
var_dump((!$b>0));
echo "<br/>";

echo 'Результат условия (!$b>0) : ';
var_dump((!$b<0));
echo "<br/>";

echo 'Результат условия ($a>0 && $b>0) : ';
var_dump(($a>0 && $b>0));
echo "<br/>";

echo 'Результат условия ($a>0 || $b>0) : ';
var_dump(($a>0 || $b>0));
echo "<br/>";

?>