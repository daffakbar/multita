<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplikasi Pelanggaran dan Prestasi Trimurti</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="https://kit.fontawesome.com/8d9f7171a0.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Styles -->
    <style>
        html * {
            font-family: 'Montserrat', sans-serif;
            box-sizing: border-box;
        }

        body {
            background: rgb(247, 247, 247);
            padding: 0;
            margin: 0;
        }

        .login-box {
            background: rgb(230, 236, 248);
            padding: 20px;
            max-width: 480px;
            margin: 25vh auto;
            text-align: center;
            letter-spacing: 1px;
            position: relative;
        }

        .login-box:hover {
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .login-box h2 {
            margin: 20px 0 20px;
            padding: 0;
            text-transform: uppercase;
            color: #4688F1;
        }

        .social-button {
            background-position: 25px 0px;
            box-sizing: border-box;
            color: rgb(255, 255, 255);
            cursor: pointer;
            display: inline-block;
            height: 50px;
            line-height: 50px;
            text-align: left;
            text-decoration: none;
            text-transform: uppercase;
            vertical-align: middle;
            width: 100%;
            border-radius: 3px;
            margin: 10px auto;
            outline: rgb(255, 255, 255) none 0px;
            padding-left: 20%;
            transition: all 0.2s cubic-bezier(0.72, 0.01, 0.56, 1) 0s;
            -webkit-transition: all .3s ease;
            -moz-transition: all .3s ease;
            -ms-transition: all .3s ease;
            -o-transition: all .3s ease;
            transition: all .3s ease;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <h2>Pilih login sebagai</h2>
        <a href="{{ url('siswa/login') }}" type="button" class="btn btn-primary btn-lg btn-block" style="color: white;"><i class="fas fa-user-graduate"></i>  Siswa</a>		
        <a href="{{ url('walimurid/login') }}" type="button" class="btn btn-primary btn-lg btn-block" style="color: white;"><i class="fas fa-user-graduate"></i>  Wali Murid</a>		
        <a href="{{ url('bk/login') }}" type="button" class="btn btn-primary btn-lg btn-block" style="color: white;"><i class="fas fa-users"></i>  BK</a>		
        <a href="{{ url('timketertiban/login') }}" type="button" class="btn btn-primary btn-lg btn-block" style="color: white;"><i class="fas fa-users"></i>  Tim Ketertiban</a>		
        <a href="{{ url('walikelass/login') }}" type="button" class="btn btn-primary btn-lg btn-block" style="color: white;"><i class="fas fa-users"></i>  Wali Kelas</a>		
        <a href="{{ url('kepalasekolah/login') }}" type="button" class="btn btn-primary btn-lg btn-block" style="color: white;"><i class="fas fa-users"></i>  Kepala Sekolah</a>		
                        
    </div>
    
</body>

</html>