@extends('helpDesk.layouts.index')
@section('main')
<div class="Balasan">
    <button class="Bback" onclick="goback()">Kembali</button>
    <div class="judul">
<h2>Edit Tiket</h2>
<p class="p1">Silahkan edit tiket disini</p>
</div>

<div class="tiket1">

<h2 class="h2">EDIT TIKET</h2>
<div class="tiket2">
    <div class="tiket3">
        <form action="/update/{{ $tiket->id }}/edit" method="POST">
            @csrf
        <p class="p2">Status</p>
        <select name="status" id="status" class="priority">
        <option value="selesai">Selesai</option>
        <option value="belum selesai">Belum Selesai</option>
        </select>
        <p class="p3">Priority</p>
        <select id="priority" name="priority" class="priority">
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
    <div class="button">
    <button>Submit</button>
</div>
        </form>
    </div>




</div>

</div>
</div>
<style>
     .priority{
    background-color: #D9D9D9;
    border-radius: 30px;
    border: 2px solid black;
    padding: 10px;
    width: 330px;
 }
    .Bback{
   width: 10%;
   margin-left: 20px;
   color: black;
   background-color: white;
   margin-top: 30px;
   justify-content: center;
   width: 10%;
   margin-left: 50px;
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

    .judul{
        padding-top: 50px;
        padding-left: 30px;
        margin-left: 30px;
        margin-bottom: 50px;
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
        padding-right: 275px;
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
        .priority{
            width: 99%
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
            margin-right: 27px;
            /* margin-right: 30px !important; */
            /* display: flex; */
        }
        .tiket2{
            margin-left: 9%;
            margin-right: 9%;
        }
    }

</style>

<script>
    function goback(){
        window.history.back();
    }
     </script>



@endsection
