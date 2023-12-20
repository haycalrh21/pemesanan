<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Vendor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        section {
            display: flex;
            flex-direction: column; /* Mengatur tata letak kolom */
            padding: 20px;
            color: #333;
            box-sizing: border-box;
        }

        .left-section,
        .right-section {
            width: 100%; /* Lebar penuh untuk kedua bagian */
        }

        /* CSS untuk gambar responsif */
        .img-responsive {
            display: block;
            max-width: 100%;
            height: auto;
        }

        h1 {
            color: #333;
            text-align: left;
        }

        div {
            /* background-color: #fff; */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        /* CSS untuk menyamakan rata */
        img {
            vertical-align: middle; /* Untuk menyamakan rata gambar di dalam div */
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (min-width: 768px) {
            /* Gunakan tata letak baris untuk layar lebih besar (seperti laptop) */
            section {
                flex-direction: row;
            }

            .left-section,
            .right-section {
                width: 50%; /* Bagi layar menjadi dua bagian */
            }
        }
    </style>
</head>
@include('components.navbar')


<body>
    <section>
        <div class="left-section">
            <!-- Left Section with Image -->
            @if ($pesanan->gambar_pesanan)
                @php
                    $firstImage = json_decode($pesanan->gambar_pesanan)[0];
                @endphp
                <img src="{{ asset('storage/' . $firstImage) }}" alt="Gambar Pesanan" class="img-responsive">
            @endif
        </div>

        <div class="right-section">
            <!-- Right Section with Vendor Details -->
            <h1>Detail Vendor</h1>
            <div>
                <p>Jenis Layanan: {{ $pesanan->jenis_pesanan }}</p>
                <p>Jenis Detail Layanan: {{ $pesanan->jenis_detail }}</p>
                <p>Nama Layanan: {{ $pesanan->nama_pesanan }}</p>
                <p>Lokasi Provinsi: {{ $pesanan->lokasi_provinsi }}</p>
                <p>Lokasi Kota: {{ $pesanan->lokasi_kota }}</p>
            </div>

            <!-- Button for WhatsApp -->
            @if ($pesanan->vendors && $pesanan->vendors->count() > 0)
                <button onclick="window.location.href='https://wa.me/{{ $pesanan->vendors->first()->nohp }}'">
                    Pesan
                </button>
            @endif

            <!-- Button to go back to Layanan -->
            <button onclick="window.location.href='{{ route('semualayanan') }}'">
                Kembali ke Layanan
            </button>
        </div>
    </section>


</body>

</html>
