<div class="login-box">
	<h2>Добро пожаловать!</h2>
	<form action="registration.php" method="post">
		<div class="user-box">
			<input type="text" name="fio" autocomplete="off" value="<?= isset($_POST['fio']) ? $_POST['fio'] : ''?>">
			<label> ФИО </label>
		</div>

		<div class="user-box">
			<input type="text" name="login" autocomplete="off" value="<?= isset($_POST['login']) ? $_POST['login'] : ''?>">
			<label> Логин </label>
		</div>

		<div class="user-box">
			<input type="email" name="email" autocomplete="off" value="<?= isset($_POST['email']) ? $_POST['email'] : ''?>">
			<label> E-mail </label>
		</div>

		<div class="user-box">
			<input type="password" name="password" autocomplete="off" value="<?= isset($_POST['password']) ? $_POST['password'] : ''?>">
			<label>Пароль</label>
		</div>

		<div class="gender">
			<input type="radio" name="radio">
			<label>Мужчина</label>
			<input type="radio" name="radio">
			<label>Женщина</label>
		</div>

		<div class="captcha">
			<label>Введите код с картинки</label>
		</div>
		<div>
			<img src='captcha/captcha.php' id='capcha-image'>
			<br>&emsp;&emsp;
			<a href="javascript:void(0);" onclick="document.getElementById('capcha-image').src='captcha/captcha.php?rid=' + Math.random();">Обновить капчу</a>
			<br>
			<br>&nbsp;
			<input type="text" name="captcha" /><br />
			<br>&emsp;&emsp;&emsp;
		</div>
		<div class="button-form">
			<input type="submit" id="submit" name="form" value="Submit">
		</div>
		<a href="auth.php">Войти</a>
	</form>
</div>
</div>