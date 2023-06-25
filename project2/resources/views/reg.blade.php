@extends('layouts.html')
@section('content')
    @php
        session_start();
if (isset($_SESSION['id'])){
    session_unset();
    session_destroy();
}
    @endphp
    <form id="reg_form" method="GET" >
        {{ csrf_field() }}
        <input name="phone" type="text" placeholder="Номер телефона">
        <div id="phone_errors">        </div>
        <input name="name" type="text" placeholder="Имя">
        <div id="name_errors">        </div>
        <input name="surname" type="text" placeholder="Фамилия">
        <div id="surname_errors">        </div>
        <input name="password" type="password" placeholder="Пароль">
        <div id="password_errors">        </div>
        <input name="password_confirmation" type="password" placeholder="Повторите Пароль">
        <input type="submit" value="Отправить">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        document.getElementById('reg_form').onsubmit = async (e) => {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "/api/reg/verify",
                data: $('#reg_form').serialize(),
                success: function(response) {
                    let k=0;
                    let result=JSON.parse(response);
                    console.log(result);

                    if (result.length!=0){
                        document.getElementById("name_errors").innerText="";
                        document.getElementById("surname_errors").innerText="";
                        document.getElementById("password_errors").innerText="";
                        document.getElementById("phone_errors").innerText="";

                        result.name.forEach(element => {
                            k++;
                            document.getElementById("name_errors").innerText+=element;
                        });
                        result.surname.forEach(element => {
                            k++;
                            document.getElementById("surname_errors").innerText+=element;
                        });
                        result.password.forEach(element => {
                            k++;
                            document.getElementById("password_errors").innerText+=element;
                        });
                        result.phone.forEach(element => {
                            k++;
                            document.getElementById("phone_errors").innerText+=element;
                        });

                    } else {
                        location.href='{{url('/main')}}';
                    }
                }

            });
        }
    </script>
@endsection
