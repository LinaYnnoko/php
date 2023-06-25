<?
$host = "localhost";
$database = "mini_shop";
$user = "root";
$password = "";

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
$link->set_charset('utf8');

$query = "SELECT * FROM category";
$result = mysqli_query($link, $query) or die ("Ошибка вывода категорий!" . mysqli_error($link));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?
while ($row = $result->fetch_row()) {
    echo '<p>'.$row[0].'. '.$row[1].'</p>';
}
?>
<a href="page.php">Просмотреть продукты</a>
<form action="form.php" method="post">
    <h2>
        Добавить категорию:
    </h2>
    <p>
        <label> Категория </label>
        <input name="title_category" type="text" size="25" maxlength="25">
    </p>
    <p>
        <button type="submit" name="submit">Отправить</button>
        <br>
    </p>
</form>

<form action="form.php" method="post">
    <h2>
        Удалить категорию:
    </h2>
    <p>
        <label> Категория </label>
        <input name="del_title_category" type="text" size="25" maxlength="25">
    </p>
    <p>
        <button type="submit" name="submit">Отправить</button>
        <br>
    </p>
</form>

<form action="form.php" method="post">
    <h2>
        Изменить категорию:
    </h2>
    <p>
        <label> Старое наименование Категории </label>
        <input name="old_title_category" type="text" size="25" maxlength="25"><p>
        <label> Новое наименование Категории </label>
        <input name="new_title_category" type="text" size="25" maxlength="25">
    </p>
    <p>
        <button type="submit" name="submit">Отправить</button>
        <br>
    </p>
</form>

</body>
</html>