@extends('helpDesk.layouts.index')

@section('main')
<div class="buat">
    <a style="text-decoration: none" href="/main">
    <button class="Bback">Kembali</button>
    </a>
    <div class="buat1">
        <div class="judul">
            <h1>BUAT TIKET</h1>
            <p class="p1">Buat tiket untuk melaporkan masalah ke divisi terkait</p>
        </div>
    <div class="bungkus">
    <form action="/buat" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input">
            <div class="input1">
                <p><b>Pilih divisi</b></p>
                    <select id="id_divisi" name="id_divisi" class="divisi">
                    @foreach ($divisis as $divisi)
                        <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('id_divisi'))
                <p class="error"><i>{{ $errors->first('id_divisi') }}</i></p>
            @endif
                <p><b>Judul</b></p>
                <input id="judul_tiket" name="judul_tiket" type="text" class="inputan">
                @if ($errors->has('judul_tiket'))
                <p class="error"><i>{{ $errors->first('judul_tiket') }}</i></p>
            @endif
            </div>
        <div class="input2">
            <p><b>Priority</b></p>
            <select id="priority" name="priority" class="priority">
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
            @if ($errors->has('priority'))
                <p class="error"><i>{{ $errors->first('priority') }}</i></p>
            @endif
            <p><b>Attachment</b></p>
            <input id="attachment" name="attachment" type="file" class="file">
        </div>
    </div>
    <div class="input3">
        <p><b>Deskripsi masalah</b></p>
        <textarea id="deskripsi" name="deskripsi" class="masalah" cols="30" rows="10" placeholder="Ketik laporan anda">

        </textarea>
        @if ($errors->has('deskripsi'))
                <p class="error"><i>{{ $errors->first('deskripsi') }}</i></p>
            @endif
    </div>
        <div class="button">
            <a>
        <button>Submit</button>
            </a>
    </div>
</form>
</div>
</div>
</div>
<style>
    /* .p1{
        padding-left: 0;
    } */
    .error {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}

    .buat1{
    padding-top: 50px;
    }

    h1{
        padding-left: 15px;
    }

    .a1{
        text-decoration: none;
    }

    .a1 :hover{
        cursor: pointer;
    }


    p{
        padding-left: 15px;
    }
    .buat{
        margin-left: 30px;
        margin-right: 30px;
        margin-bottom: 50px;
    }

    .input{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .input2{
        /* padding-left: 100px; */
        margin-left: 130px;

    }
    .input3{
        padding-right: 40px;
    }

    textarea{
        width: 100%;
        background-color: #D9D9D9;
        border-radius: 30px;
        border: 2px solid black;
        padding: 20px;
    }
    .divisi{
        background-color: #D9D9D9;
        border-radius: 30px;
        border: 2px solid black;
        padding: 10px;
        width: 14cm;
        /* padding-right: 20px; */

    }

    .inputan{
        background-color: #D9D9D9;
        border-radius: 30px;
        border: 2px solid black;
        padding: 10px;
        width: 505px;
    }

    .priority{
        background-color: #D9D9D9;
        border-radius: 30px;
        border: 2px solid black;
        padding: 10px;
        width: 14cm;
    }

    .file{
    /* padding-left: 1cm; */
        border-radius: 30px;
        border: 2px solid black;
        padding: 10px;
        width: 505px;
        background-color: #D9D9D9;
    }

    button{
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 10px;
        background-color: #672968;
        border-radius: 30px;
        border: 2px solid black;
        font-size: 18px;
        font-weight: bold
    }

    .button{
        padding-bottom: 1cm;
    }

    p{
        font-size: 18px;
        /* font-family: Cambria; */
    }

    .bungkus{
        margin-left: 15px;
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
    @media(max-width: 480px){
    .judul{
        grid-template-columns: 1fr;
            display: grid;
            width: 100%;
            margin: 0;
            padding: 0;
    }
    .input{
        display: grid;
        grid-template-columns: 1fr;
        /* width: 100%; */
}
    .input2{
        margin: 0;
    }
.inputan{
    width: 93%;
}
.divisi{
    width: 100%
}
    .priority{
        width: 100%;
    }
    .file{
    width: 93%
    }
.Bback{
width: 35%;
font-size: 100%;

}
}
@media(max-width: 768px){
    .judul{
        grid-template-columns: 1fr;
            display: grid;
            width: 100%;
            margin: 0;
            padding: 0;
    }
    .input{
        display: grid;
        grid-template-columns: 1fr;
        width: 100%;
    }
    .input2{
        margin: 0;
    }
.inputan{
    width: 96%;
}
.divisi{
    width: 100%
}
    .priority{
        width: 100%;
    }
    .file{
    width: 96%
    }
.Bback{
width: 35%;
font-size: 100%;

}
}

</style>
@endsection
