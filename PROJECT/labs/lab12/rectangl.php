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
            <label><b> Длина прямоугольника: </b></label>
            <input type="number" name="height" value="1" min="1" max="500">
        </p>
        <p>
            <label><b> Ширина прямоугольника: </b></label>
            <input type="number" name="width" value="1" min="1" max="500">
        </p>
        <p>
            <label><b> Толщина контура: </b></label>
            <input type="number" name="rectangleThickness" value="1" min="1" max="20">
        </p>
        <p>
            <label><b> Цвет контура: </b></label>
            <select name='border' size=1>
                <option value="Красный">Красный</option>
                <option value="Желтый">Желтый</option>
                <option value="Зеленый">Зеленый</option>
                <option value="Синий">Синий</option>
                <option value="Фиолетовый">Фиолетовый</option>

            </select>
        </p>
        <p>
            <label><b>Цвет заливки: </b></label>
            <select name='fill' size=1>
                <option value="Красный">Красный</option>
                <option value="Желтый">Желтый</option>
                <option value="Зеленый">Зеленый</option>
                <option value="Синий">Синий</option>
                <option value="Фиолетовый">Фиолетовый</option>

            </select>
        </p>

        <p>
            <input name="rectangl" type="submit" value="Передать данные" />
        </p>
    </form>
    <?php
    if (isset($_POST['rectangl'])) {

    	$im = imageCreate(1920, 1000); // возвращает идентификатор с заданной шириной и высотой, иными словами "Холст для рисования"

        imagefilledrectangle($im, 0, 0, 200, 200, imagecolorallocate($im, 255, 255, 255));

        if ($_POST['border'] == 'Красный') {
            $border = imagecolorAllocate($im, 255, 0, 0);
        }
        if ($_POST['border'] == 'Желтый') {
            $border = imagecolorAllocate($im, 255, 255, 0);
        }
        if ($_POST['border'] == 'Зеленый') {
            $border = imagecolorAllocate($im, 0, 255, 0);
        }
        if ($_POST['border'] == 'Синий') {
            $border = imagecolorAllocate($im, 0, 0, 255);
        }
        if ($_POST['border'] == 'Фиолетовый') {
            $border = imagecolorAllocate($im, 255, 0, 255);
        }
        if ($_POST['fill'] == 'Красный') {
            $fill = imagecolorAllocate($im, 255, 0, 0);
        }
        if ($_POST['fill'] == 'Желтый') {
            $fill = imagecolorAllocate($im, 255, 255, 0);
        }
        if ($_POST['fill'] == 'Зеленый') {
            $fill = imagecolorAllocate($im, 0, 255, 0);
        }
        if ($_POST['fill'] == 'Синий') {
            $fill = imagecolorAllocate($im, 0, 0, 255);
        }
        if ($_POST['fill'] == 'Фиолетовый') {
            $fill = imagecolorAllocate($im, 255, 0, 255);
        }

        $x2 = 20 + $_POST['height'];
        $y2 = 20 + $_POST['width'];
        imageFilledRectangle($im, 20 - $_POST['rectangleThickness'], 20 - $_POST['rectangleThickness'], $x2 + $_POST['rectangleThickness'], $y2 + $_POST['rectangleThickness'], $border);
        imageFilledRectangle($im, 20, 20, $x2, $y2, $fill);

        ob_clean();
        Header('Content-type: image/png');
        imagepng($im);
        imagedestroy($im);

    }
    ?>
</body>
</html>