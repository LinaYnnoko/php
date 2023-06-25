document.getElementById('delete').onsubmit=async(e)=>{
    e.preventDefault();

    form = new FormData(document.getElementById("delete"));

    // console.log(form.get('ID'));
    let resp = await fetch("../del.php", {
        method: "POST",
        body: form
    });

    let resJSon = await resp.json();

    if (resJSon.Key == 0)
    {
        alert("Удалено");
        location.href="catalog.php";
    }
    else 
        alert("Олег");

}