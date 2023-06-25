<?require('header.php');?>
	<img class="body-img-registr" src="img/depositphotos_204643984-stock-photo-row-of-cute-different-dogs.jpg">
	<div class="registration-pole">
		<h2>Регистрация</h2>
		<form id="registration" action="">
			<input class="name-reg" placeholder="Имя" type="text" onchange="check(event)" name="name" autocomplete="off">
			<span id="name_err"></span>
			<input class="surname-reg" placeholder="Фамилия" type="text"  onchange="check(event)"name="surname" autocomplete="off">
			<span id="surname_err"></span>
			<input class="phone-reg" placeholder="Телефон" type="tel"onchange="check(event)" name="phone" pattern="^\+[0-9]{1,3}[0-9]{1,3}[0-9]{3}[0-9]{2}[0-9]{2}$" title="Например: +375296993079">
			<span id="phone_err"></span>
			<input  class="password-reg" placeholder="Пароль"type="password"onchange="check(event)" name="password1" autocomplete="off">
			<span id="password1_err"></span>
			<input class="password2-reg" placeholder="Повторите пароль"type="password"onchange="check(event)" name="password2" autocomplete="off">
			<span id="password2_err"></span>
			<input type="submit" id="submit" value="Зарегистрироваться">
		</form>
		<p class="auth">Уже зарегистрированы?</p>
		<a href="registration.php"><p class="auth1">Авторизуйтесь!</p></a>
	</div>
		<script src="js/reg.js"></script>
</body>
</html>