<?
//формат число.число.число
$regularDate = '/(0[1-9]|[1-2][0-9]|3[0-1])[.](0[1-9]|1[0-2])[.](19|20)[0-9]{2}/';

$months = array(" января ", " февраля ", " марта ", " апреля ", " мая ", " июня ", " июля ", " августа ", " сентября ", " октября ", " ноября ", " декабря ");

//формат для растровых изображений
$regularCheckRast = '/[A-Za-z0-9]+\.(ecw|ico|ilbm|mrsid|jpg|jpeg|png|gif|raw|tiff|bmp|psd)/';

//формат для векторных изображений
$regularCheckVector = '/[A-Za-z0-9]+\.(eps|svg|ai|cdr|emf|wmf|pdf)/';

//u для русских без него не аботает
$regularCheckName = '/[А-ЯЁ]{1}[а-яё]{3,}\s[А-ЯЁ]{1}[а-яё]{3,}\s[А-ЯЁ]{1}[а-яё]{3,}/u';

//формат проверки дня рождения
$regularCheckBirthday = '/(0[1-9]|[1-2][0-9]|3[0-1])[-](0[1-9]|1[0-2])[-](19|20)[0-9]{2}/';

//формат для поля email, задание 2
$regularCheckEmailTask2 = '/[A-Za-z0-9]+@(mama\.ru|mama\.com|papa\.ru|papa\.com)/';

//формат проверки телефона
$telRegexToCheck = '/\+375\s\((29)\)\s[0-9]{3}-[0-9]{2}-[0-9]{2}/';

//формат для поля email, задание 3
$regularCheckEmailTask3 = '/[A-Za-z0-9-]+@([A-Za-z\.]+\.[A-Za-z]{2,3})/';

//формат для поля email, задание 4
$regularCheckEmailTask4 = '/(?=.{1,22}$)([A-Za-z]*\_?[A-Za-z]*@[a-z]{3,}\.(ru|com|net|by))/';


if (isset($_POST['form1'])) {
    $monthInput = substr($_POST['date'], 3, 2) - 1;
    if (isset($_POST['date']) && !empty($_POST['date']) && isset($_POST['file']) && !empty($_POST['file'])) {
        if (preg_match($regularDate, $_POST['date'])) {
            //в массиве сразу меняем
            $dateInNewForm = substr_replace($_POST['date'], $months[$monthInput], 2, 4);

            print "<script language = 'JavaScript' type='text/javascript'>
                    alert('$dateInNewForm'); 
                    </script>";
        } else {
            print "<script language = 'JavaScript' type='text/javascript'>
                    alert('Это не дата'); 
                    </script>";
        }
    }
    if (isset($_POST['file']) && !empty($_POST['file'])) {
        if (preg_match($regularCheckRast, $_POST['file'])) {
            print "<script language = 'JavaScript' type='text/javascript'>
                    alert('Растровый формат'); 
                    </script>";
        } elseif (preg_match($regularCheckVector, $_POST['file'])) {
            print "<script language = 'JavaScript' type='text/javascript'>
                    alert('Векторный формат'); 
                    </script>";
        } else {
            $foolImage = 'nooo.png';
            echo 'Изыди!';
            echo "<img src = '$foolImage' style='margin:10px; width: 30%;'/>";
        }
    }
}

if (isset($_POST['form2'])) {
    if (isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['bday']) && !empty($_POST['bday']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['tel']) && !empty($_POST['tel']))
    {
        if (preg_match($regularCheckName, $_POST['name'])) {
            $name = $_POST['name'];
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('$name'); 
                </script>";
        } else {
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('ФИО введено некорректно'); 
                </script>";
        }

        if (preg_match($regularCheckBirthday, $_POST['bday'])) {
            $bday = $_POST['bday'];
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('$bday'); 
                </script>";
        } else {
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('Дата введена некорректно'); 
                </script>";
        }

        if (preg_match($regularCheckEmailTask2, $_POST['email'])) {
            $email = $_POST['email'];
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('$email'); 
                </script>";
        } else {
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('Почта введена некорректно'); 
                </script>";
        }

        if (preg_match($telRegexToCheck, $_POST['tel'])) {
            $tel = $_POST['tel'];
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('$tel'); 
                </script>";
        } else {
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('Телефон введен некорректно'); 
                </script>";
        }
    }
}

if (isset($_POST['form3'])) {
    if (isset($_POST['text']) && !empty($_POST['text'])) {
        $textWithReplacedEmail = preg_replace($regularCheckEmailTask3, '[email]', $_POST['text']);
        print "<script language = 'JavaScript' type='text/javascript'>
            alert('$textWithReplacedEmail'); 
            </script>";
    }
}

if (isset($_POST['form4'])) {
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        if (preg_match($regularCheckEmailTask4, $_POST['email'])) {
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('Почта введена корректно'); 
                </script>";
        } else {
            print "<script language = 'JavaScript' type='text/javascript'>
                alert('Почта введена некорректно'); 
                </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <h4>Введите дату (например, 12.12.12)</h4>
    <input type="text" name="date"/>
    <h4>Введите имя файла</h4>
    <input type="text" name="file"/>
    <p><input name="form1" type="submit" value="Передать информацию"/></p>
</form>

<form action="" method="post">
    <h4>Введите ФИО (все с заглавной буквы через пробел)</h4>
    <input type="text" name="name"/>
    <h4>Введите дату рождения (dd-mm-yyyy)</h4>
    <input type="text" name="bday"/>
    <h4>Введите e-mail </h4>
    <input type="email" name="email"/>
    <h4>Введите номер телефона (+375 (29) 123-45-67) </h4>
    <input type="tel" name="tel"/>
    <p>
        <input name="form2" type="submit" value="Передать информацию"/>
    </p>
</form>

<form action="" method="post">
    <h4>Введите текст и вашу почту: </h4>
    <textarea name="text" cols="40" rows="10"></textarea>
    <input name="form3" type="submit" value="Передать информацию"/>
</form>

<form action="" method="post">
    <h4>Введите e-mail</h4>
    <input type="email" name="email"/>
    </p>
    <p>
        <input name="form4" type="submit" value="Передать информацию"/>
    </p>
</form>

</body>
</html>