<?
$host = "localhost";
$database = "mini_shop";
$user = "root";
$password = "";

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));
$link->set_charset('utf8');

if (isset($_POST['title_category'])) {
    $title_category = $_POST['title_category'];
    $query = "INSERT INTO category (title) VALUES ('$title_category')";

    $result = mysqli_query($link, $query) or die ("Ошибка2" . mysqli_error($link));
    if ($result) {
        print "<script language='JavaScript' type='text/JavaScript'>
				alert('Категория записана!');
				function reload(){top.location = 'index.php'};
				setTimeout('reload()', 0)
				</script>";
    }
}

if (isset($_POST['del_title_category'])) {
    $d_title_category = $_POST['del_title_category'];

    $query = "SELECT id FROM category WHERE title ='".$d_title_category."'";
    $result = mysqli_query($link, $query) or die ("Ошибка вывода категорий!" . mysqli_error($link));

    if($row = $result->fetch_row()) {
        echo $row[0];
        $query = "DELETE FROM product WHERE id_category=" . $row[0];
        mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
    }

    $query = "DELETE FROM category WHERE title = '" . $d_title_category . "';";
    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
    if ($result) {
        print "<script language='JavaScript' type='text/JavaScript'>
            alert('Категория удалена');
            function reload(){location = 'index.php'};
            setTimeout('reload()', 0)
            </script>";
    }
}

if (isset($_POST['old_title_category']) && isset($_POST['new_title_category'])) {
    $old_title = $_POST['old_title_category'];
    $new_title = $_POST['new_title_category'];

    $query = "UPDATE category SET title = '".$new_title."' WHERE title = '".$old_title."'";
    $result = mysqli_query($link, $query) or die ("Ошибка изменения категорий!" . mysqli_error($link));

    if ($result) {
        print "<script language='JavaScript' type='text/JavaScript'>
            alert('Категория изменена!');
            function reload(){location = 'index.php'};
            setTimeout('reload()', 0)
            </script>";
    }
}
