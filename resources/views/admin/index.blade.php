<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <section>
        @include('components.navbaradmin')
    </section>
    <div>
        <h1>halaman admin</h1>
        <p>Selamat datang {{ auth()->user()->name }}</p>
    </div>
</body>
</html>
