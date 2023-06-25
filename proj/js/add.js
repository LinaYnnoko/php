document.getElementById("add").onsubmit=async (event)=>{
	event.preventDefault();

	form = new FormData(document.getElementById("add"));

    let resp=await fetch("../add.php",{
        method: "POST",
        body: form
    })


    let resJSon = await resp.json();

    if (resJSon.Key==1) alert("gnida");
    else alert("добавил. Доволен?");

}