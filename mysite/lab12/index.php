<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	 <form action="" method="post">
        <p>
            <p><i> Вид примитива: </i></p>
            <input name="primitive" type="radio" value="линия">
           	<b>Линия</b>
            <br>
            <input name="primitive" type="radio" value="круг">
            <b>Круг</b>
            <br>
            <input name="primitive" type="radio" value="прямоугольник">
            <b>Прямоугольник</b>
        </p>
        <p>
            <input name="figure" type="submit" value="Передать информацию" />
        </p>
    </form>
	<?php
	    session_start();
	    if (isset($_POST['figure'])) {
	        if (isset($_POST['primitive'])) {
	            if ($_POST['primitive'] === "линия") {
	                Header("Location: line.php");
	            }
	            if ($_POST['primitive'] === "круг") {
	                Header("Location: circle.php");
	            }
	            if ($_POST['primitive'] === "прямоугольник") {
	                Header("Location: rectangl.php");
	            }
	        }
	    }
	?>

	 <form action="" method="post">
        
            <input name="picture" type="submit" value="Нарисовать рисунок" />
        
    </form>
<?



?>


 	<form action="" method="post">
        
            <input name="diagrama" type="submit" value="Построить диаграмму" />
        
    </form>

    <?php
    if (isset($_POST['diagrama'])) {
        $arr = [];
        for ($i = 0; $i <= 5; $i++) {
            $arr[] = rand(20, 100);
        }
        $im = imagecreatetruecolor(300, 300);

        imagefilledrectangle($im, 0, 0, 700, 700, imagecolorallocate($im, 255, 255, 255));

        imagesetthickness($im, 4);
        imageLine($im, 5, 10, 5, 190, imagecolorallocate($im, 0, 0, 0));

        imagesetthickness($im, 2);
        imageFilledRectangle($im, 5, 20, $arr[0], 40, imagecolorallocate($im, 0, 255, 0));
        imagerectangle($im, 5, 20, $arr[0], 40, imagecolorallocate($im, 0, 0, 0));

        imageFilledRectangle($im, 5, 55, $arr[1], 75, imagecolorallocate($im, 255, 0, 0));
        imagerectangle($im, 5, 55, $arr[1], 75, imagecolorallocate($im, 0, 0, 0));

        imageFilledRectangle($im, 5, 90, $arr[2], 110, imagecolorallocate($im, 0, 255, 255));
        imagerectangle($im, 5, 90, $arr[2], 110, imagecolorallocate($im, 0, 0, 0));

        imageFilledRectangle($im, 5, 125, $arr[3], 145, imagecolorallocate($im, 255, 255, 0));
        imagerectangle($im, 5, 125, $arr[3], 145, imagecolorallocate($im, 0, 0, 0));

        imageFilledRectangle($im, 5, 160, $arr[4], 180, imagecolorallocate($im, 0, 0, 255));
        imagerectangle($im, 5, 160, $arr[4], 180, imagecolorallocate($im, 0, 0, 0));

        ob_clean();
        header('Content-Type: image/jpeg');
        imagejpeg($im);
        imagedestroy($im);
    }
    ?>
</body>
</html>