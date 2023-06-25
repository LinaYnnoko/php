<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
	<form action="" method="post">
            <label><b> Радиус круга: </b></label>
            <input type="number" name="radius" value="1" min="1" max="50">

            <label><b> Толщина контура: </b></label>
            <input type="number" name="circleThickness" value="1" min="1" max="30">

            <label><b> Цвет контура: </b></label>
            <select name='borderColor' size=1>
                <option value="Красный">Красный</option>
                <option value="Желтый">Желтый</option>
                <option value="Зеленый">Зеленый</option>
                <option value="Синий">Синий</option>
                <option value="Фиолетовый">Фиолетовый</option>
            </select>

            <label><b> Цвет заливки: </b></label>
            <select name='circleColor' size=1>
                <option value="Красный">Красный</option>
                <option value="Желтый">Желтый</option>
                <option value="Зеленый">Зеленый</option>
                <option value="Синий">Синий</option>
                <option value="Фиолетовый">Фиолетовый</option>

            </select>
        <p>
            <input name="circle" type="submit" value="Передать информацию" />
        </p>
    </form>
   <?php
    if (isset($_POST['circle'])) {
        $im = imagecreatetruecolor(200, 200); //создание нового изображения (ширина высота)

        imagefilledrectangle($im, 0, 0, 200, 200, // рисует прямоугольник на странице от левого до правого угла
            imagecolorallocate($im, 255, 255, 255)); //создает цвет для изображения

        if ($_POST['borderColor'] == 'Красный') {
            $border = imagecolorAllocate($im, 255, 0, 0);
        }
        if ($_POST['borderColor'] == 'Желтый') {
            $border = imagecolorAllocate($im, 255, 255, 0);
        }
        if ($_POST['borderColor'] == 'Зеленый') {
            $border = imagecolorAllocate($im, 0, 255, 0);
        }
        if ($_POST['borderColor'] == 'Синий') {
            $border = imagecolorAllocate($im, 0, 0, 255);
        }
        if ($_POST['borderColor'] == 'Фиолетовый') {
            $border = imagecolorAllocate($im, 255, 0, 255);
        }
        if ($_POST['circleColor'] == 'Красный') {
            $fill = imagecolorAllocate($im, 255, 0, 0);
        }
        if ($_POST['circleColor'] == 'Желтый') {
            $fill = imagecolorAllocate($im, 255, 255, 0);
        }
        if ($_POST['circleColor'] == 'Зеленый') {
            $fill = imagecolorAllocate($im, 0, 255, 0);
        }
        if ($_POST['circleColor'] == 'Синий') {
            $fill = imagecolorAllocate($im, 0, 0, 255);
        }
        if ($_POST['circleColor'] == 'Фиолетовый') {
            $fill = imagecolorAllocate($im, 255, 0, 255);
        }

        $diameter = ($_POST['radius'] + $_POST['circleThickness']) * 2;
        imagefilledellipse($im, 100, 100, $diameter, $diameter, $border);//рисует закрашенный элипс в заданных координатах

        imagefilledellipse($im, 100, 100, $_POST['radius'] * 2, $_POST['radius'] * 2, $fill);

        ob_clean();
        Header('Content-type: image/png');
        imagepng($im);
        imagedestroy($im);
    }
    ?>

</body>
</html>