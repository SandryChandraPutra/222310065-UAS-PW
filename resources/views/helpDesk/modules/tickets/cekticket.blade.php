@extends('helpDesk.layouts.index')
@section('main')
<div class="Balasan">
    <a style="text-decoration:none" href="/main">
    <button class="Bback">Kembali</button>
    </a>
<div class="judul">
<h2>BALASAN</h2>
<p class="p1">Cek balasan dari laporan yang telah kamu kirimkan. Jika balasan tidak menyelesaikan masalah harap laporankan kembali. </p>
</div>

<div class="tiket1">

<h2 class="h2">CEK STATUS TIKET</h2>
<form action="/checking" method="POST">
    @csrf
<div class="tiket2">
    <div class="tiket3">

    {{-- <p class="p2">Email</p>
    <input id="email" name="email" type="text" class="isian"> --}}
    <input type="hidden" name="email" value="{{ auth()->guard('mahasiswa')->user()->email }}">
    <p class="p3">ID Tiket</p>
    <input id="id_tiket" name="id_tiket" type="text" class="isian">
    <div class="button"><a>
    <button>Submit</button>
    </a>
</div>
    </div>
</form>
</div>
</div>
</div>
@if (session('error'))
    <script>alert("{{ session('error') }}");</script>
@endif
@if (session('success'))
    <script>alert("{{ session('success') }}");</script>
@endif
<style>
    .judul{
        padding-top: 30px;
        padding-left: 30px;
    }

    .p1{
        font-size: 18px;
        max-width: 50%;
    }

    .tiket1{
        background-color: #D9D9D9;
        border-radius: 30px;
        padding-left: 50px;
        padding-right: 50px;
        padding-bottom: 40px;
        padding-top: 5px;
        margin-top: 25px;
        margin-left: 150px;
        margin-right: 150px;
        border: 3px solid black;

    }
    .tiket3{
        text-align: center;
    }

    .p2{
        font-size: 18px;
        padding-right: 268px;

    }

    .p3{
        font-size: 18px;
        padding-right: 250px;
    }

    .h2{
        text-align: center;
    }

    p{
        padding-top: 50 px;
    }

    .tiket2{
        background-color: #956A96;
        border-radius: 20px;
        margin-bottom: 30px;
        padding-top: 10px;
        border: 3px solid black;

    }

    .button{
        padding-top: 30px;
        padding-bottom: 30px;


    }

    button{
        width: 325px;
        border-radius: 20px;
        border: 2px solid black;
        background-color: #672968;
        padding: 5px;
        font-weight: bold;
        font-size: 18px;
    }

    button:hover{
        cursor: pointer;
    }

    .isian{
        border-radius: 20px;
        border: 2px solid black;
        width: 8cm;
        background-color: #D9D9D9;
        padding: 10px;
    }

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
    @media(max-width:480px){
        .tiket3 p{
            padding-left: 10px
        }
        .Bback{
            width: 30%
        }
        .tiket1{
            width: 100%;
            justify-content: center;
            align-items: center;
            padding:0;
            /* padding-left:1px */
            margin:0;
            /* display: flex; */
        }
        .tiket2{
            margin-left: 9%;
            margin-right: 9%;
        }
        .isian{
            max-width: 90%;
        }
        button{
            max-width: 90%;
        }
    }
    @media(max-width:768px){
        .Bback{
            width: 30%
        }
        .isian{
            /* max-width: 10; */
        }
        .tiket1{
            width: 90%;
            /* display: block; */
            justify-content: center;
            align-items: center;
            padding: 10px!important;
            margin-left:27px;
            /* margin-right: 30px !important; */
            /* display: flex; */
        }
        .tiket2{
            margin-left: 9%;
            margin-right: 9%;
        }
    }
</style>
@endsection
