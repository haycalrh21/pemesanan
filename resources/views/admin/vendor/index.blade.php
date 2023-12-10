<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Vendor</title>
</head>
<body>
    <section>
        @include('components.navbaradmin')
        <div>
            <h1>Halaman Data vendor</h1>
        </div>
    </section>
    <section>
        @foreach ($pesanans as $pesanan )
        <h5 class="card-title">Pesanan ID: {{ $pesanan->id }}</h5>
        <p class="card-text">Vendor ID: {{ $pesanan->vendor_id }}</p>

        @endforeach
    </section>
</body>
</html>
