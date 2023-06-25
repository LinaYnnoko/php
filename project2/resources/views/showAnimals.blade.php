@extends('layouts.html')
@section('content')
    @php(session_start())
    <form id="filter_form" action="/api/animal/verify" method="POST">
        <select name="type">
            @foreach    (\App\Type::all() as $type)
                <option value="{{$type->id}}">{{$type->type}}</option>
            @endforeach
            <option value="-1">Все</option>
        </select>
        <select name="city">
            @foreach    (\App\City::all() as $type)
                <option value="{{$type->id}}">{{$type->city}}</option>
            @endforeach
            <option value="-1">Все</option>
        </select>
        <select name="gender">
            <option value="1">Муж</option>
            <option value="0">Жен</option>
            <option value="-1">Любой</option>
        </select>
        <select name="sort_type">
            <option value="1">Недавние</option>
            <option value="0" selected>Давние (че)</option>
        </select>
        <div id="errors">

        </div>
        <input type="submit" value="Отправить">
    </form>
    <form id="showFavorites">
        <input type="submit" value="Показать избранное">
    </form>
    <div id="animals">
        @foreach (\App\Animal::all() as $animal)
            <div class="animal_card"
                 style="width: 150px; display: flex; flex-wrap: wrap; height: fit-content; justify-content: center"
                 attr_id="{{$animal->id}}">
                <div>
                    {{$animal->name}}
                </div>
                <div>
                    @if($animal->gender)
                        Муж
                    @else Жен
                    @endif
                </div>
                <div>
                    {{$animal->decription}}
                </div>
                <div>
                    {{$animal->belongsTo(\App\Color::class, 'color')->get()[0]->color}}
                </div>
                <div>
                    {{$animal->belongsTo(\App\City::class, 'city')->get()[0]->city}}
                </div>
                <div>
                    {{$animal->belongsTo(\App\Type::class, 'type')->get()[0]->type}}
                </div>
                <div>
                    <img width="100px" src="{{url($animal->photo_link)}}">
                </div>
                <form class="addFavorites">
                    <input name="idAnimal" type="number" style="visibility: hidden" value="{{$animal->id}}">
                    <input class="submit" type="submit" value=@if(\App\Favorites::where([
                    ['idUser', $_SESSION['id']],
                    ['idAnimal',$animal->id]
                ])->get()->isEmpty())"В избранное"
                    @else "Удалить из избранного"
                    @endif>@if(\App\User::find($_SESSION['id'])->isAdmin)
                        <input type="button" value="Удалить" onclick="del({{$animal->id}});">
                    @endif
                </form>
            </div>
        @endforeach
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        async function del(id) {
            let FD = new FormData();
            FD.append('delId', id);

            let resp = await fetch("/api/animal/delete", {
                method: "POST",
                body: FD
            });

            let result = await resp.json();
            console.log(result);

            if (result.result) {
                alert('Успешно удалено')
                refresh(result.animals);
            } else alert("Ошибка")
        }

        async function refresh(animals) {
            let doc = document.getElementById('animals');
            doc.innerHTML = "";
            for (let i=0;i<animals.length;i++){
                let admin={{\App\User::find($_SESSION['id'])->isAdmin}};

                let an=await getInfo(animals[i].id);
                console.log(an['id']);

                let gender='Жен';
                let adminstr='';
                let fav="В избранное";

                if (an['gender']==1) gender='Муж';
                if (admin) adminstr=`<input type="button" value="Удалить" onclick="del(`+an['id'].toString()+`)">`;
                if (!an['fav']) fav='Удалить из избранного';

                let str=`<div class="animal_card"
                style="width: 150px; display: flex; flex-wrap: wrap; height: fit-content; justify-content: center"
                attr_id="`+an['id'].toString()+`">
                    <div>`+an['name'].toString()+`</div>
                    <div>`+gender+`</div>
                    <div>`+an['decription'].toString()+`</div>
                    <div>`+an['color'].toString()+`</div>
                    <div>`+an['city'].toString()+`</div>
                    <div>`+an['type'].toString()+`</div>
                    <div><img width="100px" src="`+an['photo_link'].toString()+`"></div>
                    <form class="addFavorites">
                    <input name="idAnimal" type="number" style="visibility: hidden" value="`+an['id'].toString()+`">
                    <input class="submit" type="submit" value="`+fav+`">
                `+adminstr+`</form> </div>`;

                doc["innerHTML"]+=str;
            }

        }

        async function getInfo(id){
            let FD = new FormData();
            FD.append('id', id);

            let resp = await fetch("/api/animal/getInfo", {
                method: "POST",
                body: FD
            });

            let result = await resp.json();

            if (result.result) {
                return result.info;
            } else return result.result;
        }

        form = document.getElementById("filter_form");
        form.onsubmit = async (e) => {
            e.preventDefault();

            let FD = new FormData(form);

            let resp = await fetch("/api/animal/filter", {
                method: "POST",
                body: FD
            });

            let result = await resp.json();
            console.log(result);


            if (result.result > 0) {
            } else {
                alert("ниче не найдено");
            }
            refresh(result.animals);
        }

        listFavForm = document.getElementsByClassName('addFavorites');
        console.log(listFavForm);

        for (let i = 0; i < listFavForm.length; i++) {
            listFavForm[i].onsubmit = async (e) => {
                e.preventDefault();

                let FD = new FormData(listFavForm[i]);

                let resp = await fetch("/api/animal/addFavorites", {
                    method: "POST",
                    body: FD
                });

                let result = await resp.json();
                console.log(result);


                if (result.result) {
                    alert('Успешно добавлено в избранное');
                    listFavForm[i].getElementsByClassName('submit')[0].setAttribute('value', 'Удалить из избранного');
                } else {
                    alert("Успешно удалено из избранного");
                    listFavForm[i].getElementsByClassName('submit')[0].setAttribute('value', 'В избранное');
                }

            }
        }
    </script>
@endsection
