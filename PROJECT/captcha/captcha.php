<?
    $caplen = 7;
    $width = 200; 
    $height = 60;
    $font = dirname(__FILE__).'\Gasalt-Regular.ttf';
    $fontsize = 17;

    $im = imagecreatetruecolor($width, $height);
    imagesavealpha($im, true);
    $bg = imagecolorallocatealpha($im, 0, 0, 0, 127);
    imagefill($im, 0, 0, $bg);

    // Задаем фоны для капчи. Можете нарисовать свой и загрузить его в папку /img. 
    //Фонов может быть сколько угодно
    $img_arr = array("back3.png");

    // Генерируем (выбираем) фон для капчи случайным образом
    $img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
    $im = imagecreatefrompng($img_fn);

    // Случайные линии под текстом
    $linenum = rand(5, 10);
    for ($i=0; $i<$linenum; $i++)
    {
        $color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
        imageline($im, rand(0, 10), rand(1, 60), rand(160, 200), rand(1, 60), $color);
    }

   //формирование текста капчи
$a = rand(0, 9);
$b = rand(0, 9);
//$captcha = $a.'/'.$b.'=';
$captcha = [$a,'+',$b,'='];
//переменная для текстового содержания капчи
for ( $i = 0; $i < count($captcha)+1; $i++ ) {
    $x = ( $width - 20 ) / count($captcha) * $i + 10;
    //вычисляем положение сгенерированного символа на изображении по оси х
    $x = rand( $x, $x + 4 );
    //добавляем случайности
    $y = $height - ( ( $height - $fontsize ) / 2 );
    $curcolor = imagecolorallocate( $im, rand( 0, 100 ), rand( 0, 100 ), rand( 0, 100 ) );
    $angle = 0;
    imagettftext( $im, $fontsize, $angle, $x, $y, $curcolor, $font, $captcha[ $i ] );
}


    // Опять линии, уже сверху текста
    $linenum = rand(4, 7);
    for ($i=0; $i<$linenum; $i++)
    {
    $color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
    imageline($im, rand(0, 10), rand(1, 60), rand(160, 200), rand(1, 60), $color);
    }

session_start();
$_SESSION[ 'captcha' ] = $a+$b;

ob_clean();
header( 'Content-type: image/png' );
imagepng( $im );
imagedestroy( $im );