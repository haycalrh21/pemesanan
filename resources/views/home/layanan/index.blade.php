<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Semua Layanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            padding: 20px;
        }

        .card {
            flex: 0 0 calc(25% - 50px);
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            color: #000000;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            width: 275px;
            box-sizing: border-box;
            position: relative;
        }
        .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin-top: 20px;
    }

    .pagination li {
        margin: 0 3px;
        display: flex;
        align-items: center;
    }

    .pagination a {
        text-decoration: none;
        padding: 15px; /* Sesuaikan dengan ukuran yang Anda inginkan */
        border-radius: 5px;
        color: #007bff;
        border: 1px solid #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .pagination .active a {
        background-color: #007bff;
        color: #fff;
    }

        ul {
            list-style: none;
            padding: 0;
        }

        p {
            color: #000000;
            overflow-wrap: break-word;
            word-wrap: break-word;
        }

        img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .card-img-top {
            overflow: hidden;
        }

        /* Kecilkan semua gambar */
        .card img {
            width: 100%;
            max-height: 200px;
            object-fit: fill;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .card-buttons {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: space-around;
            width: 80%;
            max-width: 200px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }



        @media (max-width: 1000px) {
            .card {
                flex: 0 0 calc(50% - 20px);
            }

            button {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 5px 10px;
                border-radius: 8px;
                cursor: pointer;
            }
        }

        @media (max-width: 576px) {
            .card {
                flex: 0 0 100%;
            }

            .card-buttons {
                width: 100%;
            }

            button {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 5px 10px;
                border-radius: 8px;
                cursor: pointer;
            }
        }
    </style>
</head>
@include('components.navbar')

<body>
    <section>
        <div>
            <h1>Halaman Layanan</h1>
        </div>
        <div>
            <form action="{{ route('carilayanan') }}" method="get">
                <center>
                    <input type="text" name="keyword" placeholder="cari kata pencarian">
                    <button type="submit">cari</button>
                </center>
            </form>
        </div>
    </section>

    <section class="card-container">
        <!-- Loop untuk setiap pesanan -->
        @foreach ($pesanans as $pesanan)



        <div class="card">
            <h1 class="card-text">{{ $pesanan->nama_pesanan }}</h1>

            <p class="card-text">
                Lokasi Provinsi: {{ $pesanan->lokasi_provinsi }}

            <!-- Mengakses relasi vendor() -->
            <p class="card-text">
                Vendor: {{ $pesanan->vendor ? $pesanan->vendor->vendor : 'Tidak ada vendor' }}
            </p>


            <p class="card-text">
                Lokasi kota: {{ $pesanan->lokasi_kota }}
            </p>

            <!-- Tampilkan gambar pertama -->
            @if ($pesanan->gambar_pesanan)
            <div class="card-img-top">
                @php
                $firstImage = json_decode($pesanan->gambar_pesanan)[0];
                @endphp
                <img src="{{ asset('storage/' . $firstImage) }}" alt="Gambar Pesanan">
            </div>
            @endif

            <!-- Tombol-tombol -->
            <div class="card-buttons">
                <!-- Tombol pesan -->
                @if($pesanan->vendor)
                <button onclick="window.location.href='https://wa.me/{{ $pesanan->vendor->nohp }}'">Pesan</button>
            @else
                <p>Tidak ada vendor.</p>
            @endif

                <!-- Tombol lihat detail -->
                <button
                    onclick="window.location.href='{{ route('vendordetail', ['id' => $pesanan->id]) }}'">Lihat Detail</button>
            </div>


        </div>


        @endforeach
    </section>

    <!-- Tambahkan baris berikut untuk menampilkan pagination -->
    <div>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($pesanans->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&laquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $pesanans->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($pesanans->hasMorePages())
                <li>
                    <a href="{{ $pesanans->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&raquo;</span>
                </li>
            @endif
        </ul>
    </div>


</body>

</html>
