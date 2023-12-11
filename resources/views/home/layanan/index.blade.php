<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Semua Layanan</title>
</head>
<body>
    <section>
        <div>
            @include('components.navbar')
            <h1>Halaman Layanan</h1>
        </div>
    </section>

    <section style="display: flex; gap: 1rem; justify-content: center; padding: 25px; height: 70vh;">

        @foreach ($pesanans as $pesanan)
        <div class="card" style="border: 1px solid #ddd; padding: 15px; width: 275px;">

            <p class="card-text" style="overflow-wrap: break-word; word-wrap: break-word;">Jenis Layanan: {{ $pesanan->jenis_pesanan }}</p>
            <p class="card-text" style="overflow-wrap: break-word; word-wrap: break-word;">Jenis Detail Layanan: {{ $pesanan->jenis_detail }}</p>
            <p class="card-text" style="overflow-wrap: break-word; word-wrap: break-word;">Nama Layanan: {{ $pesanan->nama_pesanan }}</p>
            <p class="card-text">Lokasi Provinsi: {{ $pesanan->lokasi_provinsi }}</p>
            <p class="card-text">Lokasi Kota: {{ $pesanan->lokasi_kota }}</p>


            @if ($pesanan->gambar_pesanan)
            <div class="card-img-top">
                {{-- Tampilkan hanya satu gambar --}}
                @php
                $firstImage = json_decode($pesanan->gambar_pesanan)[0];
                @endphp
                <img src="{{ asset('storage/' . $firstImage) }}" alt="Gambar Pesanan" style="width: 100%;">
            </div>
            @endif

        </div>
        @endforeach

    </section>


</body>
</html>
