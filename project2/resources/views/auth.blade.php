@extends('layouts.html')
@section('content')
    @php
    session_start();
if (isset($_SESSION['id'])){
    session_unset();
    session_destroy();
}
    @endphp
    kek
    <form id="auth_form" action="api/auth/verify" method="POST" >
        <input name="phone" type="text" placeholder="Номер телефона">
        <div id="errors">        </div>
        <input name="password" type="password" placeholder="Пароль">
        <input type="submit" value="Отправить">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        document.getElementById('auth_form').onsubmit = async (e) => {
            e.preventDefault();


            $.ajax({
                type: "POST",
                url: "/api/auth/verify",
                data: $('#auth_form').serialize(),
                success: function(response) {
                    let result=JSON.parse(response);
                    console.log(result.resp)
                    if (result.resp){
                        location.href='{{url('/main')}}';
                    }
                    else document.getElementById('errors').innerHTML="Invalid number or password";
                }

            });
        }
    </script>
@endsection
