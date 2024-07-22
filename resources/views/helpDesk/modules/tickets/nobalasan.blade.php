@extends('helpDesk.layouts.index')

@section('main')
<a style="text-decoration: none" href="/cek">
    <button class="Bback"><span class="span1">Kembali</span></button>
  </a>
<div>
    <h1 style="color: grey; text-align: center; display:flex; justify-content: center; min-height: 100vh; align-items: center">'tidak ada balasan'</h1>
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
</style>
<script>
    function goback(){
        window.history.back();
    }
     </script>
@endsection
