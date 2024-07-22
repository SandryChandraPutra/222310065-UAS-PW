@extends('helpDesk.layouts.index')
@section('main')
<div style="display: flex">
  <a style="text-decoration:none" href="/admins">
    <button class="Bback"><span class="span1">Kembali</span></button>
  </a>
</div>
<div class="Laporan">
  <div class="Laporan1">
    <h2>LAPORAN {{ $ticket->id }}</h2>
  </div>
  <div class="Laporan2">
    <div class="laporann">
      <div class="Laporan3">
        <p><b>Pengirim:</b> {{ $ticket->mahasiswa->nama_lengkap }}</p>
        <p><b>Divisi:</b> {{ $ticket->divisi->nama_divisi }}</p>
        <p><b>Judul:</b> {{ $ticket->judul_tiket }}</p>
        <p><b>Priority:</b> {{ $ticket->priority }}</p>
        <p><b>Deskripsi:</b> {{ $ticket->deskripsi }}</p>
      </div>
      <div class="Laporan4">
        <p><b>Tanggal:</b> {{ $ticket->tanggal }}</p>
        <p><b>Attachment:</b></p>
        <div>
          <img src="{{ url('storage/'.$ticket->attachment) }}" width="256" height="auto" />
        </div>
      </div>
    </div>
  </div>

  {{-- <iframe style="margin-top: 20px" src="{{ route('show-iframe') }}" width="100%" height="200px" frameborder="0"></iframe> --}}
<div style="margin-left:30px">
  <h2>Balasan</h2>
</div>
<div class="balasanF">
  @foreach ($balasans as $reply)
<div class="balasan2">
    <div class="balasan3">
        <p><b>Balasan id -</b> {{$reply->id}} </p>
        <p><b>Tanggal:</b></p>
        <p>{{$reply->tanggal}}</p>
    </div>

    <div class="garis"></div>

    <div class="balasan4">
        <p><b>Balasan:</b></p>
        <p style="color: black"> {{$reply->balasan}}</p>
    </div>
</div>
@endforeach
</div>
<form action="/balasMahasiswa" method="POST">
    @csrf
    <div class="Laporan5">
      <div class="Laporan6">
        <p class="p1"><b>ID Laporan</b></p>
        <input name="tujuan" id="tujuan" type="text" value="{{ $ticket->id }}" class="isiinput" />
        <p class="p1"><b>Kirim ke</b></p>
        <input name="penerima" id="penerima" type="text" value="{{ $ticket->mahasiswa->email }}" class="isiinput" />
      </div>
      <div>
        <p class="p1"><b>Balasan</b></p>
        <div class="Laporan8">
          <textarea name="balasan" id="balasan" class="isiinput1" cols="2" rows="3"></textarea>
        </div>
      </div>
    </div>
    <div class="Laporan8">
      <button><b>Kirim</b></button>
    </div>
  </form>
</div>
@if (session('success'))
  <script>
    alert("{{ session('success') }}");
  </script>
@endif
<style>
  .Laporan1 {
    padding-top: 50px;
    padding-left: 30px;
    margin-left: 0;
  }

  .Laporan2 {
    background-color: #D9D9D9;
    margin-left: 30px;
    margin-right: 30px;
    border-radius: 30px;
    padding-bottom: 50px;
    border: 2px solid black;
  }

  .p1 {
    padding-left: 5px;
  }

  .laporann {
    display: grid;
    grid-template-columns: 1fr 1fr;
    height: 100%;
  }

  .Laporan3 {
    padding-left: 20px;
    padding-top: 10px;
  }

  .Laporan4 {
    padding-top: 10px;
  }

  .Laporan5 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    height: 100%;
    font-family: inherit;
  }

  .Laporan6 {
    padding-left: 30px;
  }

  .Laporan7 {

  }

  p {
    font-size: 18px;
  }

  .Laporan8 {
    /* background-color: #D9D9D9; */
    /* width: 50%; */
    margin-right: 50px;
  }

    .isiinput1{
        border-radius: 30px;
        border: 2px solid black;
        border-color: black;
        background-color: #D9D9D9;
        width: 100%;
        padding: 10px;
        padding-bottom: 60px;
        padding-left: 15px;
        resize: none;
        padding-bottom: 1cm;
    }

    .isiinput{
        border-radius: 30px;
        border: 2px solid black;
        border-color: black;
        background-color: #D9D9D9;
        padding: 10px;
        padding-left: 15px;
        width: 70%;
    }

    button{
        margin-left: 30px;
        margin-top: 30px;
        background-color: #956A96;
        border: 2px solid black;
        text-align: center;
        border-radius: 30px;
        width: 100% ;
        padding: 10px;
        font-size: 18px;
    }
    button:hover{
        cursor: pointer;
    }

    .button2 {
    background-color: white;
    border: 2px solid black;
    text-align: center;
    border-radius: 30px;
    width: 100px;
    margin-top: 20px;
    margin-left: 30px;
  }

  .span1 {
    font-weight: bold;
    font-size: 18px;
  }
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
        /* margin-top: 1cm; */
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
   width: 90%;
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
    .balasanF{
        margin-left: 30px;
    }
</style>
@endsection
