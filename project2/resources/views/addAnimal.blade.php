@extends('layouts.html')
@section('content')

    <form id="add_form" action="/api/animal/verify" method="POST" >
        <select name="type">
            @foreach    (\App\Type::all() as $type)
                <option value="{{$type->id}}">{{$type->type}}</option>
            @endforeach
        </select>
        <select name="city">
            @foreach    (\App\City::all() as $type)
                <option value="{{$type->id}}">{{$type->city}}</option>
            @endforeach
        </select>
        <select name="color">
            @foreach    (\App\Color::all() as $type)
                <option value="{{$type->id}}">{{$type->color}}</option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="Name">
        <textarea name="description">

        </textarea>
        <input type="number" name="age">
        <select name="gender">
            <option value="1">Муж</option>
            <option value="0">Жен</option>
        </select>
        <input type="file" name="photo" value="upload photo" accept="image/*,image/jpeg">
        <div id="errors">

        </div>
        <input type="submit" value="Отправить">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        document.getElementById('add_form').onsubmit = async (e) => {
            e.preventDefault();

            let form=new FormData(document.getElementById('add_form'));

            let resp = await fetch("/api/animal/verify", {
                method: "POST",
                body: form
            });

            let result = await resp.json();
            console.log(result.errors)

            if (result.result){
                alert('Животинка успешно добавлена');
            }
            else {
                document.getElementById('errors').innerHTML='';
                result.errors.name.forEach(element => {
                    document.getElementById("errors").innerText+=element;
                });
                result.errors.description.forEach(element => {
                    document.getElementById("errors").innerText+=element;
                });
                result.errors.age.forEach(element => {
                    document.getElementById("errors").innerText+=element;
                });
            };
        }
    </script>
@endsection
