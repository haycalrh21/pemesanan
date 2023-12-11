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
        @include('components.navbar')
    </section>
    <section>
        <h1>halaman Vendor</h1>
    </section>
    @php
    $userId = auth()->id();
@endphp

    <section>
        @foreach ($pesanans as $pesanan )
        @if ($pesanan->user_id === $userId)

        <div class="card" style="width: 18rem; margin-bottom: 20px;">
            <div class="card-body">
                <h5 class="card-title">Pesanan ID: {{ $pesanan->id }}</h5>
                <p class="card-text">Vendor ID: {{ $pesanan->vendor_id }}</p>
                <p class="card-text">User ID: {{ $pesanan->user_id }}</p>
                <p class="card-text">Jenis Pesanan: {{ $pesanan->jenis_pesanan }}</p>
                <p class="card-text">Jenis Detail: {{ $pesanan->jenis_detail }}</p>
                <p class="card-text">Nama Pesanan: {{ $pesanan->nama_pesanan }}</p>
                <p class="card-text">Lokasi Provinsi: {{ $pesanan->lokasi_provinsi }}</p>
                <p class="card-text">Lokasi Kota: {{ $pesanan->lokasi_kota }}</p>
                <p class="card-text">Lokasi Kecamatan: {{ $pesanan->lokasi_kecamatan }}</p>
                <p class="card-text">Lokasi Kelurahan: {{ $pesanan->lokasi_kelurahan }}</p>
                <p class="card-text">Status: {{ $pesanan->status }}</p>

                @if ($pesanan->gambar_pesanan)
                <div class="card-img-top">
                    @foreach(json_decode($pesanan->gambar_pesanan) as $gambarPath)
                    <img src="{{ asset('storage/' . $gambarPath) }}" alt="Gambar Pesanan" style="width: 100%;">
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        @endif
        @endforeach
    </section>

</body>
</html>
