document.getElementById("authorization").onsubmit = async (event) => {
    event.preventDefault();

    form = new FormData(document.getElementById("authorization"));

    let resp = await fetch("auth.php", {
        method: "POST",
        body: form
    });

    let resJSon = await resp.json();

    if (resJSon.err_code == 0) location.href = 'cabinet.php';
    else {
        document.getElementById("phone_err_auth").innerText = "";
        document.getElementById("password_err_auth").innerText = "";
        if (resJSon.err_code == 1) document.getElementById("phone_err_auth").innerText ="Телефон введен неверно, либо не зарегистрирован";
        else document.getElementById("password_err_auth").innerText = "Неверный пароль";
    }
}