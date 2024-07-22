<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Help Desk IBI Kesatuan</title>
    <style>
        /* Mengatur margin dan padding nol untuk memastikan latar belakang penuh */
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
        }
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .topnav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #672968;
            width: 100%;
            box-sizing: border-box; /* Menambahkan box-sizing untuk memastikan padding dihitung dengan benar */
        }
        .topnav a {
            padding-left: 16px;
            padding-right: 16px;
            text-decoration: none;
            color: black;
            opacity: 100%;
        }
        .topnav a.active {
            background-color: #ffffff;
            color: black;
        }

        .topnav a:hover {
            background-color: #672968;
            color: grey;
        }

        .icontop {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px;
        }
        .fotoibik {
            height: 50px;
            width: 200px;
            margin: 20px;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .topnav {
                /* flex-direction: column;
                align-items: flex-start; */
            }
            .icontop {
                margin: 10px 0;
            }
            .fotoibik {
                height: 40px;
                width: 160px;
                margin: 10px 0;
            }
        }
        @media (max-width: 480px) {
            .topnav {
                /* padding: 5px; */
            }
            .topnav a {
                /* padding: 10px 12px; */
            }
            .icontop {
                /* flex-direction: column;
                align-items: flex-start; */
                /* margin: 5px 0; */
            }
            .fotoibik {
                height: 30px;
                width: 120px;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="topnav">
            <img class="fotoibik" src="https://www.ibik.ac.id/wp-content/uploads/2023/03/logo-ibik-web.png" alt="Foto ibik">
            <div class="icontop">
                <a href="/history">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                    </svg>
                </a>
                <a href="/loginAdmin">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clipboard2-fill" viewBox="0 0 16 16">
                        <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z"/>
                        <path d="M3.5 1h.585A1.5 1.5 0 0 0 4 1.5V2a1.5 1.5 0 0 0 1.5 1.5h5A1.5 1.5 0 0 0 12 2v-.5q-.001-.264-.085-.5h.585A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1"/>
                    </svg>
                </a>
                <a href="#" id="user-info-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <main>
        <div class="main">
            @yield('main')
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('user-info-icon').addEventListener('click', function (event) {
                event.preventDefault();

                // Ambil data user dari elemen HTML
                const userType = "{{ auth()->guard('admin')->check() ? 'admin' : (auth()->guard('mahasiswa')->check() ? 'mahasiswa' : 'guest') }}";
                let userInfo = '';

                if (userType === 'admin') {
                    const admin = @json(auth()->guard('admin')->user());
                    userInfo = `Admin\nEmail: ${admin.email}\nName: ${admin.nama_admin}\nDivisi: ${admin.id_divisi}`;
                } else if (userType === 'mahasiswa') {
                    const mahasiswa = @json(auth()->guard('mahasiswa')->user());
                    userInfo = `Mahasiswa\nEmail: ${mahasiswa.email}\nName: ${mahasiswa.nama_lengkap}\nNPM: ${mahasiswa.npm}`;
                } else {
                    userInfo = 'Anda belum login';
                }

                alert(userInfo);
            });
        });
    </script>
</body>
</html>