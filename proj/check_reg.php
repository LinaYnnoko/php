<?
$valid = array();

if (preg_match("/^[a-zA-Zа-яА-Я]+$/u", $_POST['name']) > 0)
    $valid["name"] = 1;
else
    $valid["name"] = 0;

if (preg_match("/^[a-zA-Zа-яА-Я]+$/u", $_POST['surname']) > 0)
    $valid["surname"] = 1;
else
    $valid["surname"] = 0;

$db = mysqli_connect('localhost', 'root', '', 'animal_shelter');
if (mysqli_num_rows(mysqli_query($db, "Select * From user Where phone = '{$_POST['phone']}'")) == 0)
    $valid["phone"] = 1;
else
    $valid["phone"] = 0;

if (strlen($_POST['password1']) > 7)
    $valid["password"] = 1;
else
    $valid["password"] = 0;

if ($_POST['password1'] == $_POST['password2'])
    $valid["password2"] = 1;
else
    $valid["password2"] = 0;

    echo (json_encode([
        "name" => $valid["name"],
        "surname" => $valid["surname"],
        "phone" => $valid["phone"],
        "password" => $valid["password"],
        "password2" => $valid["password2"],
    ]));

?>