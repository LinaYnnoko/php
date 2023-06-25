<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lab 9</title>
	<style type="text/css">
		p {
			font-family: Comic Sans MS;
 			font-size: 15px;
		}
		 .title{
			font-family: Comic Sans MS;
 			text-align: center;
 			border-bottom: solid;
 			margin-top: 30px;
 			padding-bottom: 20px;
 			font-size: 20px;
 		}
 		 .menu{
			font-family: Comic Sans MS;
 			margin-top: 10px;
 			font-size: 15px;
 		}	
	</style>
</head>
<body>
	<h1 class="title">Лабораторная №9. ПЕРЕДАЧА ДАННЫХ. СЕССИИ</h1>
	<h2 class="menu">Задача 1. Создать форму со следующими типами полей (text, email, tel, url, number, search, date, time, range, radio, checkbox, color, file, image, hidden, select, textarea). Оформить в виде анкеты-опросника. ПРИДУМАТЬ ЛОГИЧНЫЕ ОТВЕТЫ И ВОПРОСЫ. В ПОДГРУППЕ ТЕМЫ ОПРОСОВ НЕ ДОЛЖНЫ ПОВТОРЯТЬСЯ. После нажатия на кнопку «отправить» данные из формы в красивом виде должны отобразиться в красивом виде на другой странице. 
</h2>
	<form action="Lab_9_1.php" method="post">
		<p>Давайте знакомиться! Как вас зовут?</p>
		<input type="text" name="FIO"><p>
		<p>Чтобы с вами связаться, нам понадобится ваша почта с:</p>
		<input type="email" name="email"><p>
		<p>А еще, ваш номер телефона :)</p>
		<input type="tel" name="tel"><p>
		<p>Ну и заодно страничку вконтакте</p>
		<input type="url" name="url"><p>
		<p>Введите ваш возраст</p>
		<input type="number" name="number"><p>
		<p>Введите сюда то, что душа пожелает</p>
		<input type="search" name="search"><p>
		<p>Давайте дату вашего рождения</p>
		<input type="date" name="date"><p>
		<p>Ваше любимое время суток?</p>
		<input type="time" name="time"><p>
		<p>Насколько сильно вы любите котиков?</p>
		<input type="range" name="range"><p>
		<p>Что вкуснее, яблоко или груша?</p>
		<input type="radio" name="radio"> Яблоко
		<input type="radio" name="radio"> Груша <p>
		<p>Выберите НЕправильные ответы</p>
		<input type="checkbox" name="checkbox1"> 2+2=5<p>
		<input type="checkbox" name="checkbox2"> Небо зеленого цвета<p>
		<input type="checkbox" name="checkbox3"> Радуга это результат блюющих единорогов<p>
		<input type="checkbox" name="checkbox4"> Меня отчислят :)<p>
		<p>Какой ваш любимый цвет?</p>
		<input type="color" name="color"><p>
		<p>Загрузите вашу любимую фотографию</p>
		<input type="file" name="file"><p>
		<p>Ваша любимая пара года?</p>
		<p><select name="hero">
    	<option value="s1">зима</option>
   		<option value="s2" selected>весна</option>
    	<option value="s3">осень</option>
    	<option value="s3" label="Лариса">лето</option>
   		</select> 
		<p>Напишите сюда пожелания автору анкеты</p>
		<input type="textarea" name="comment"><p>
		<input type="submit" name="submit"><p>
	</form>

	<h2 class="menu">Задача 2. Создать форму с полями ЛОГИН и ПАРОЛЬ. После отправки формы – вывести логин на странице, а пароль должен быть частитчно скрыт: мойпароль –> *о*п*р*л*</h2>
	<form action="Lab_9_2.php" method="post">
	<input type="login" name="login"><p>
	<input type="password" name="password"><p>
	<input type="submit" name="submit"><p>
	</form>
	

	<h2 class="menu">Задача 3. Создать форму для получения секретного слова (любое вводит пользователь). После отправки формы – записать это слово в сессию.
	Сделать две кнопки:	1ая – показывает секретное слово (можно через спойлер или ссылкой на другую страницу) 2ая – открывает форму для изменения секретного слова – изменяется в сессии
	</h2>
	<form action="secret.php" method="post">
		<input type="text" name="secret"><p>
		<input type="submit" name="submit"><p>
	</form>

	<h2 class="menu">Задача 4. Создать форму с полями ИМЯ, ВОЗРАСТ, ПОЛ. После отправки формы на новой странице – вывести изображение соответвующие полу (фото девушки или парня).Открыть сессию и записать в неё имя, возраст (использовать массив), время получения данных. Сделать ссылку на страницу, куда выводятся данные из сессии в красивом виде.</h2>
	<form action="Lab_9_4.php" method="get">
		<p>Имя</p>
		<input type="text" name="name"><p>
		<p>Возраст</p>
		<input type="number" name="age"><p>
		<p>Пол</p>
		<input type="radio" name="radio" value="women"> Ж
		<input type="radio" name="radio" value="man"> М <p>
		<input type="submit" name="submit"><p>
	</form>

	<h2 class="menu">Задача 5. Создать форму с полями ИМЯ, ПОЧТА, СООБЩЕНИЕ. Добавить кнопку отправить. При нажатии на эту кнопку в ранее созданном массиве в сессии должен добавиться новый элемет с этими данными. Пример:
	1 = > [ ‘name’=>’Ivan’, ‘email’ => ‘aaaaa@mail.ru’, ‘mess’ =>’hello’], 
	2 = > [ ‘name’=>’Mat’, ‘email’ => ‘aaa7aa@mail.ru’, ‘mess’ =>’hello2’],
	3 = > [ ‘name’=>’Kat’, ‘email’ => ‘aaaaa7@mail.ru’, ‘mess’ =>’hello3’],
  На другой странице необходимо сделать вывод всех сообщений с указанием автора и почты. Около каждого сообщения должна быть кнопка «Удалить».
Если нажать эту кнопку, то сообщение удалиться из сессии и исчезнет со страницы.Не забыть на первой странице сделать ссылку на вторую </h2>
	<form action="Lab_9_5.php" method="post">
		<span>Имя: </span><input type="text" name="name"><p>
        <span>Email: </span><input type="email" name="email"><p>
        <span>Письмо: </span><input type="textarea" name="mess"><p>
		<input type="submit" name="submit"><p>
	</form>
</body>
</html>