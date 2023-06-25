document.getElementById('oleg').onsubmit=async(e)=>{
	e.preventDefault();

	form = new FormData(document.getElementById("oleg"));

    // console.log(form.get('ID'));
    let resp = await fetch("../favorite.php", {
        method: "POST",
        body: form
    });

    let resJSon = await resp.json();

    if (resJSon.Key == 1)
        document.getElementById('oleg').getElementsByTagName("input")[1].style.background="black";
    else 
        alert("Зарегистрируйтесь, чтобы добавить в избранные");

}

