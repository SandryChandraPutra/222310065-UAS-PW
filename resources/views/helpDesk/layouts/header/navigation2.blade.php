<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReSis Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8f7;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            width: 400px;
            padding: 20px;
        }

        .header {
            background-color: #d3f4f2;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            padding: 10px;
            width: 100%;
            font-size: 24px;
            font-weight: bold;
            margin-top: 0%;
        }

        .header img {
            vertical-align: middle;
        }

        .login-form {
            margin-top: 20px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-form button {
            width: 80%;
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #333;
        }

        .register {
            margin-top: 20px;
        }

        .register button {
            width: 80%;
            padding: 10px;
            background-color: #ccc;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .register button a {
            text-decoration: none;
            color: black;
        }

        .register button:hover {
            background-color: #bbb;
        }

        .terms {
            font-size: 12px;
            color: #888;
            margin-top: 20px;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header" style="margin-bottom: 25px">
        <img src="logo.png" alt="ReSis Logo" width="50" height="50"> ReSis (Recycle Asisten)
    </div>
    <div>
        <div class="container" style="padding: 25px">
            <div class="login-form">
                <h2>Masuk Sebagai Admin</h2>
                <p>Selamat Datang !</p>
                <form>
                    <input type="text" name="username" placeholder="UserName" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Masuk</button>
                </form>
            </div>
            <div class="register">
                <p>Apakah Kamu Sudah Memiliki Akun ? </p>
                <button><a href="/register">Register</a></button>
            </div>
        </div>
        <div class="footer">
            “Sampah bukanlah masalah, Tetapi sebuah peluang”<br>
            @ReSis
        </div>
    </div>
</body>

</html>
