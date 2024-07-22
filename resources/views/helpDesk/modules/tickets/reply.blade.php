@extends('helpDesk.layouts.index')

@section('main')
<div class="balasan">
    <a style="text-decoration: none" href="/cek">
    <button class="Bback">Kembali</button>
    </a>
<div class="balasan1">
    <form action="/balasAdmin" method="POST">
        @csrf
    @foreach ($balasans as $balasan)
    <div class="balasan2">
    <div class="balasan3">
        <p><b>Balasan id -</b> {{$balasan->id}}</p>
        <p><b>Tanggal:</b></p>
        <p> {{$balasan->tanggal}}</p>
    </div>

    <div class="garis"></div>

    <div class="balasan4">
        <p><b>Balasan:</b></p>
        <p style="color: black">{{$balasan->balasan}} </p>
    </div>
</div>
@endforeach
    <input style="visibility: hidden" name="cek" value="{{$ticket->id}}"></input>
<div class="balasan6">
    <textarea name="balasan" id="balasan" cols="30" rows="10" placeholder="ketik balasan"></textarea>
</div>
<div class="buttonb">
    <a class="a1">
    <button class="buttonc">Kirim</button>
    </a>
</div>
</div>
</form>
</div>
<style>
    .buttonb{
        align-items: center;
        justify-content: center;
        display: flex;
    }
    .buttonc{
        margin-top: 20px;
        border-radius: 30px;
        border: 2px solid black;
        background-color: #956A96;
        width: 100%;
        margin-right: 30px;
        padding: 10px;
        font-size: 18px;
        font-weight: bold
    }

    .garis{
        background-color: black;
        width: 2px;
        margin-left: 1cm;
        margin-right: 1cm;
        height: 100%;
    }

    textarea{
        margin-top: 1cm;
        width: 100%;
        margin-right: 30px;
        border-radius: 30px;
        border: 2px solid black;
        padding-left: 20px;
        padding-top: 15px;
        /* : 100%; */
    }

    .balasan6{
        justify-content: center;
        align-items: center;
        display: flex;
    }

    .balasan1{
        background-color: white;
        padding-top: 1cm;
        padding-bottom: 3cm;
        padding-left: 1cm;
    }

    .balasan2{
        display: grid;
        grid-template-columns:2fr 2cm 7fr;
        height:100%;
        background-color: #D9D9D9;
        margin-right: 30px;
        border-radius: 30px;
        border: 2px solid black;
        border-color: black;
        padding-left: 10px;
        margin-bottom: 1cm;
    }

    .a1{
        width: 100%;
        margin-right: 30px;
    }

    .a1 :hover{
        cursor: pointer;
    }

    .balasan3{

        padding-left: 10px;
        margin-right: 30px;
        padding-bottom: 60px;

    }

    .balasan4{
        padding-bottom: 60px
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

    /* .balasann{
        background-color: #956A96;
    } */
</style>
@endsection
