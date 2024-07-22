@extends('helpDesk.layouts.index')
@section('main')
<a style="text-decoration:none" href="/">
    <button class="Bback"><span class="span1">Kembali</span></button>
  </a>
<div class="Login">
    <div class="Login1">
        <h2>REGISTER</h2>
        <p style="font-size: 18px; font-weight: normal;">Register untuk melanjutkan login ke pusat bantuan Insitut Bisnis dan Informatika Kesatuan</p>
        <div class="input">
            <form action="/regis" method="POST">
                @csrf
            <p><b>Nama</b></p>
            <input name="nama_lengkap" type="text" class="isiinput" id="isiinput">
            @if ($errors->has('nama_lengkap'))
                <p class="error"><i>{{ $errors->first('nama_lengkap') }}</i></p>
            @endif
            <p><b>Email</b></p>
            <input name="email" type="email" class="isiinput">
            @if ($errors->has('email'))
                <p class="error"><i>{{ $errors->first('email') }}</i></p>
            @endif
            <p><b>NPM</b></p>
            <input name="npm" type="text" class="isiinput">
            @if ($errors->has('npm'))
                <p class="error"><i>{{ $errors->first('npm') }}</i></p>
            @endif
            <p><b>Password</b></p>
            <div class="password-container">
                <input name="password" type="password" class="isiinput" id="password">
                <span class="toggle-password" onclick="togglePasswordVisibility('password', 'password-toggle')">
                    <svg id="password-toggle" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4.5C7.30558 4.5 3.29086 7.32867 1.5 12C3.29086 16.6713 7.30558 19.5 12 19.5C16.6944 19.5 20.7091 16.6713 22.5 12C20.7091 7.32867 16.6944 4.5 12 4.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 15.75C10.2051 15.75 8.75 14.2949 8.75 12.5C8.75 10.7051 10.2051 9.25 12 9.25C13.7949 9.25 15.25 10.7051 15.25 12.5C15.25 14.2949 13.7949 15.75 12 15.75Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.75 4.75L19.25 19.25" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </div>
            @if ($errors->has('password'))
                <p class="error"><i>{{ $errors->first('password') }}</i></p>
            @endif
        </div>
        <div class="button"><a>
            <button class="Blogin"><span class="span1">Submit</span></button></a>
        </div>
    </div>
    <div class="Login2">
        <img src="https://i.pinimg.com/564x/a9/dd/93/a9dd9332469ecad9d9770985d8e032f0.jpg" alt="" width="300" height="300">
    </div>
</div>

<style>
    .Bback{
   width: 10%;
   margin-left: 20px;
   color: black;
   background-color: white;
   margin-top: 30px;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    border-radius: 30px;
    border: 2px solid black;
    font-size: 18px;
    font-weight: bold
    }

.Bback:hover{
        cursor: pointer;
    }
    .error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}
    .Login1 {
        padding-top: 50px;
        padding-left: 30px;
        padding-bottom: 50px;
    }

    .span1 {
        font-weight: bold;
        font-size: 18px;
    }

    .Login2 {
        align-items: center;
        justify-content: center;
        display: flex;
        padding-top: 2cm;
    }

    button:hover {
        cursor: pointer;
    }

    .Login {
        display: grid;
        grid-template-columns: 1fr 1fr;
        height: 100%;
        font-family: inherit;
    }

    .input {
        font-size: 18px;
    }

    .isiinput {
        border-radius: 30px;
        border: 2px solid black;
        background-color: #D9D9D9;
        width: 8cm;
        padding: 10px;
        position: relative;
    }

    .password-container {
        position: relative;
        width: fit-content;
    }

    .toggle-password {
        position: absolute;
        right: 10px;
        top: 55%;
        transform: translateY(-50%);
        cursor: pointer;
        user-select: none;
    }

    button {
        background-color: #956A96;
        border: 2px solid black;
        text-align: center;
        border-radius: 30px;
        width: 325px;
        padding: 10px
    }

    .Blogin {
        margin-top: 30px;
    }

    img {
        width: 12cm;
        height: 12cm;
    }
    @media (max-width: 810px) {
        .Login {
            grid-template-columns: 1fr;
            gap: 0;
            /* text-align: center; */
            /* align-items: center; */

        }
        .Login1{
            /* align-items: center; */
            margin-left: 20%;
            margin-right: 20%;
            margin-top: 30px
        }
        .Login1, .Login2 {
            padding: 20px;
        }
        .Login2 {
            padding-top: 2cm;
        }
        .Login2 img {
            width: 100%;
            visibility: hidden;
        }
    }
    @media (max-width: 480px) {
        .Login {
            grid-template-columns: 1fr;
        }
        .Login1 {
            padding: 20px;
            padding-left: 12% ;
            padding-right: 2%;
            margin: 0
        }
        .Login2 {
            padding: 20px 0;
        }
        .Login2 img {
            width: 100%;
            height: auto;
            visibility: visible;
        }
        .isiinput {
            width: 80%;
        }
        button {
            width: 86%;

        }
        .password-container{
            width: 100%;

        }
        .toggle-password {
        position:absolute;
        right: 18%;
    }
}
</style>

<script>
    function togglePasswordVisibility(inputId, toggleId) {
        const passwordField = document.getElementById(inputId);
        const toggleIcon = document.getElementById(toggleId);
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.innerHTML = `
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4.5C7.30558 4.5 3.29086 7.32867 1.5 12C3.29086 16.6713 7.30558 19.5 12 19.5C16.6944 19.5 20.7091 16.6713 22.5 12C20.7091 7.32867 16.6944 4.5 12 4.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 15.75C10.2051 15.75 8.75 14.2949 8.75 12.5C8.75 10.7051 10.2051 9.25 12 9.25C13.7949 9.25 15.25 10.7051 15.25 12.5C15.25 14.2949 13.7949 15.75 12 15.75Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4.75 4.75L19.25 19.25" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `;
        } else {
            passwordField.type = 'password';
            toggleIcon.innerHTML = `
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4.5C7.30558 4.5 3.29086 7.32867 1.5 12C3.29086 16.6713 7.30558 19.5 12 19.5C16.6944 19.5 20.7091 16.6713 22.5 12C20.7091 7.32867 16.6944 4.5 12 4.5Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 15.75C10.2051 15.75 8.75 14.2949 8.75 12.5C8.75 10.7051 10.2051 9.25 12 9.25C13.7949 9.25 15.25 10.7051 15.25 12.5C15.25 14.2949 13.7949 15.75 12 15.75Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `;
        }
    }
</script>
@endsection
