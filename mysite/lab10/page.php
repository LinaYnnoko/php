<?
$host = "localhost";
$database = "mini_shop";
$user = "root";
$password = "";

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
$link->set_charset('utf8');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">Назад</a>
<?
$query = "SELECT * FROM product RIGHT OUTER JOIN category ON product.id_category = category.id";
$result = mysqli_query($link, $query) or die ("Ошибка" . mysqli_error($link));
while ($row = $result->fetch_row()) {
    echo "<div style='border: solid 2px black; margin: 20px'>";
    echo "<h3>".$row[1]."</h3>";

    echo "<p>".$row[2]."</p>";
    echo "<p>".$row[6]."</p>";
    echo "<h4>" . $row[3] . "бел.р.</h4>";
    echo "</div>";
}
?>
</body>
</html>