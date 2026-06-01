<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rekam Medis Klinik</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased"
      style="
      background: linear-gradient(135deg,#0f172a,#1e293b,#2563eb);
      min-height:100vh;
      ">

    <div class="min-h-screen flex flex-col justify-center items-center">

        <div class="mb-6 text-center">
            <h1 style="
                color:white;
                font-size:40px;
                font-weight:bold;
            ">
                🏥 Rekam Medis Klinik
            </h1>

            <p style="
                color:#cbd5e1;
                margin-top:10px;
            ">
                Sistem Informasi Rekam Medis Berbasis Laravel
            </p>
        </div>

        <div style="
            width:450px;
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 15px 40px rgba(0,0,0,0.25);
        ">
            {{ $slot }}
        </div>

        <p style="
            color:white;
            margin-top:20px;
            font-size:14px;
        ">
            © 2026 Rekam Medis Klinik
        </p>

    </div>

</body>
</html>