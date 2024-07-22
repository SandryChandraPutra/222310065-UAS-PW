{{-- @extends('helpDesk.layouts.index')

@section('main')
<div style="display: flex">
    <form action="/logout/mahasiswa" method="POST">
        @csrf
        <button class="Blogout" onclick="confirm('apakah kamu ingin logout?')">Logout</button>
    </form>
</div>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@auth('mahasiswa')
<h1>Selamat datang di help desk<br>institut bisnis dan informatika kesatuan</h1>
<p>Selamat datang, {{ Auth::guard('mahasiswa')->user()->nama_lengkap }}, {{ Auth::guard('mahasiswa')->user()->id }}</p>
@endauth
<div class="buttons">
    <div class="button">
        <a href="/buattiket">
            <img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/ticket-512.png" alt="Buat Tiket">
            <p>Buat Tiket</p>
            <p1>Buat tiket untuk menyampaikan keluhan yang kamu rasakan pada lingkungan kampus</p1>
        </a>
    </div>
    <div class="button">
        <a href="/cek">
            <img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/ticket-512.png" alt="Cek Tiket">
            <p>Cek Tiket</p>
            <p1>Cek tiket yang telah kamu laporkan</p1>
        </a>
    </div>
</div>
@if(session('ticket_id'))
    <script>
        console.log('Session ticket_id:', '{{ session('ticket_id') }}');
        alert('Tiket berhasil dibuat dengan ID: {{ session('ticket_id') }}');
    </script>
@else
<script>
    console.log('No ticket_id in session');
</script>
@endif

<style>
header {
    background-color: #5d3a7a;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    box-sizing: border-box;
}

.logo img {
    height: 50px;
}

.logout {
    background-color: #fff;
    color: #5d3a7a;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
}

main {
    text-align: center;
    margin-top: 50px;
}

h1 {
    color: #333;
    font-size: 24px;
}

.buttons {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.button {
    border: 2px solid black;
    background-color: #b083c5;
    flex-direction: row;
    margin-top: 20px;
    margin: 0 30px;
    padding: 20px;
    border-radius: 10px;
    width: 250px;
    height: 230px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.button a {
    text-decoration: none;
    color: #000;
}

  .button2 {
    background-color: white;
    border: 2px solid black;
    text-align: center;
    border-radius: 30px;
    width: 100px;
    margin-top: 10px;
    margin-left: 30px;
  }

  .span1 {
    font-weight: bold;
    font-size: 18px;
  }

.button img {
    width: 100px;
    height: 100px;
}

.button p {
    margin-top: 10px;
    font-size: 18px;
    font-weight: bold;
}
.Blogout{
    justify-content: center;
    width: 70%;
    margin-left: 50px;
    color: black;
    background-color: white;
    /* margin-top: 10px; */
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
.Blogout:hover{
cursor: pointer
}
</style>
@endsection --}}
@extends('helpDesk.layouts.index')

@section('main')
<div class="main2">
    <div class="main">
        <form action="/logout/mahasiswa" method="POST">
            @csrf
            <button class="Blogout" onclick="confirm('apakah kamu ingin logout?')">Logout</button>
        </form>
        <div class="judul">
            <h1>Selamat datang di help desk</h1>
            <h1>Institut Bisnis dan Informatika Kesatuan</h1>
            <div class="content">
                <div class="content1">
                    <a href="/buattiket">
                        <div class="pisah">
                            <img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/ticket-512.png" alt="" width="160px" height="160px">
                            <p class="p1">Buat Tiket</p>
                        </div>
                    </a>
                </div>
                <div class="content2">
                    <a href="/cek">
                        <div class="pisah">
                            <img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/ticket-512.png" alt="" width="160px" height="160px">
                            <p class="p1">Cek Tiket</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('ticket_id'))
    <script>
        alert('Tiket berhasil dibuat dengan ID: {{ session('ticket_id') }}');
    </script>
@endif
<style>
    .Blogout {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100px;
        height: 40px;
        margin: 30px 50px 0;
        color: black;
        background-color: white;
        border-radius: 30px;
        border: 2px solid black;
        font-size: 18px;
        font-weight: bold;
    }

    .Blogout:hover {
        cursor: pointer;
    }

    .p1 {
        text-align: center;
        color: black;
    }

    h1 {
        font-size: 50px;
        font-family: Cambria;
    }

    a:hover {
        cursor: pointer;
    }

    img {
        border-radius: 30px;
    }

    a {
        text-decoration: none;
    }

    .content {
        margin-bottom: 2cm;
        margin-right: 30px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        height: 100%;
        justify-content: center;
        align-items: center;
        gap: 2cm;
        font-size: 25px;
        font-weight: bold;
    }

    .content1, .content2 {
        background-color: #956A96;
        padding: 80px;
        border-radius: 30px;
        border: 2px solid black;
        text-align: center;
        margin-right: 2cm;
    }

    .judul {
        margin-left: 100px;
        max-width: 100%;
    }

    .main {
        /* margin-left: 30px; */
    }

    @media (max-width: 768px) {
        .main {
            margin-bottom: 5cm;
        }

        .content {
            grid-template-columns: 1fr;
            gap: 1cm;
            justify-content: center;
        }

        .content1, .content2 {
            padding: 20px;
        }

        h1 {
            font-size: 30px;
        }
    }

    @media (max-width: 480px) {
        .main {
            overflow: scroll;
        }

        h1 {
            font-size: 15px;
            padding-left: 10px;
        }

        .pisah {
            display: grid;
            grid-template-columns: 1fr 20fr;
            height: 100%;
            text-align: center;
        }

        .judul {
            margin-left: 0;
            padding-left: 15px;
            padding-right: 15px;
        }

        .content1, .content2 {
            width: 100%;
            margin: 10px auto;
        }

        .content {
            display: block;
        }

        .p1 {
            font-size: 25px;
            padding-left: 20px;
            padding-top: 10px;
            text-align: left;
            flex: 1;
            display: flex;
        }

        img {
            width: 100px;
            height: 100px;
        }

        .Blogout{
            margin-left: 25px
        }
    }
</style>
@endsection
