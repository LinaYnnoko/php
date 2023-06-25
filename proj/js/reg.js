async function check(event){
    
    form = new FormData(document.getElementById("registration"));

    let resp=await fetch("check_reg.php",{
        method: "POST",
        body: form
    })

    let resJSon = await resp.json();

	if (resJSon.name == 0)
        document.getElementById("name_err").innerText = "Имя введено некорректно";
    else document.getElementById("name_err").innerText = " ";
    if (resJSon.surname == 0)
        document.getElementById("surname_err").innerText = "Фамилия введена некорректно";
    else document.getElementById("surname_err").innerText = " ";
    if (resJSon.phone == 0)
        document.getElementById("phone_err").innerText = "Данный телефон уже зарегистрирован";
    else document.getElementById("phone_err").innerText = " ";
    if (resJSon.password == 0)
        document.getElementById("password1_err").innerText = "Пароль слишком короткий";
    else document.getElementById("password1_err").innerText = " ";
    if (resJSon.password2 == 0)
        document.getElementById("password2_err").innerText = "Повторный пароль введен неверно";
    else document.getElementById("password2_err").innerText = " ";
}

document.getElementById("registration").onsubmit = async(event) =>{
	event.preventDefault();	

	 form = new FormData(document.getElementById("registration"));

    let resp=await fetch("conf_reg.php",{
        method: "POST",
        body: form
    })

    let resJSon = await resp.json();

    if (resJSon.res==0) location.href = 'registration.php';

}

