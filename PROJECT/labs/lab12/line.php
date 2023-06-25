<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
	<h3>
		Задание1. Форма с параметрами линии
	</h3>
 <form action="" method="post">
        <p>
            <label><b>Длина линии: </b></label>
            <br>
            <input type="text" name="length" autocomplete="off" />
        </p>
        <p>
            <label><b>Тип линии: </b></label>
            <br>
            <input name="typeOfLine" type="radio" value="сплошная">
            сплошная
            <br>
            <input name="typeOfLine" type="radio" value="пунктирная">
            пунктирная
        </p>
            <label><b>Цвет линии: </b></label>
            <select name=color size=1>
                <option value="Красный">Красный</option>
                <option value="Желтый">Желтый</option>
                <option value="Зеленый">Зеленый</option>
                <option value="Синий">Синий</option>
                <option value="Фиолетовый">Фиолетовый</option>
            </select>
        <p>
            <label><b>Толщина линии: </b></label>
            <input type="number" name="thickness" value="1" min="1" max="500">
        </p>
        <p>
            <input name="line" type="submit" value="Нарисовать линию" />
        </p>
    </form>

    <?php
    if (isset($_POST['line'])) {
        $i = imageCreate(1920, 1000); // возвращает идентификатор с заданной шириной и высотой, иными словами "Холст для рисования"
        $color = imageColorAllocate($i, 255, 255, 255); //возвращает идентификатор цвета RGB соответственно
    
        imagesetthickness($i, $_POST['thickness']); //задает значение толщины линии

        if ($_POST['color'] == 'Красный') {
            $color = imageColorAllocate($i, 255, 0, 0); // задаем разнообразие цветов
        }
        if ($_POST['color'] == 'Желтый') {
            $color = imageColorAllocate($i, 255, 255, 0);
        }
        if ($_POST['color'] == 'Зеленый') {
            $color = imageColorAllocate($i, 0, 255, 0);
        }
        if ($_POST['color'] == 'Синий') {
            $color = imageColorAllocate($i, 0, 0, 255);
        }
        if ($_POST['color'] == 'Фиолетовый') {
            $color = imageColorAllocate($i, 255, 0, 255);
        }

        if (isset($_POST['typeOfLine'])) { //задаем пунктирную или сплошную
            if ($_POST['typeOfLine'] === "сплошная") {
                imageline($i, 0, 100, $_POST['length'], 100, $color);
            }
            if ($_POST['typeOfLine'] === "пунктирная") {
                imageDashedline($i, 0, 100, $_POST['length'], 100, $color);
            }
        }
        ob_clean(); //очищает буфер вывода, не отправляя его в браузер
        Header("Content-type: image/jpeg"); //функция, которая посылает заголовок на сервер
        imageJpeg($i); //"выбрасывает изображение на экран"
        imageDestroy($i); //уничтожает изображение
    }
    ?>

</body>
</html>