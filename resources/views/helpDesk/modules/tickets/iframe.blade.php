<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

        /* .balasann{
            background-color: #956A96;
        } */
    </style>
</head>
<body>
    <div class="balasan">
        <div class="balasan1">
            @foreach($balasan as $balasan)
            <div class="balasan2">
            <div class="balasan3">
                <p>Balasan id - {{$balasan->id}} </p>
                <p>Tanggal:</p>
                <p>{{$balasan->tanggal}}</p>
            </div>

            <div class="garis"></div>

            <div class="balasan4">
                <p>Balasan:</p>
                <p style="color: black"> {{$balasan->balasan}}</p>
            </div>
        </div>
        @endforeach
        </div>
        </form>
</body>
</html>
