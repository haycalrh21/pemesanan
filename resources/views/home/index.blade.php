<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            margin-top: 60px;
            margin-bottom: 60px;
        }
        body.dark-mode {
            background-color: #333;
            color: white;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            justify-content: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            min-height: 250px;
        }

        .card h1 {
            margin-bottom: 10px;
            color: #000;
        }

        .card img {
            width: 70%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
            align-self: center;
        }

        .card button {
            border: none;
            border-radius: 10px;
            cursor: pointer;
            background-color: #3498db;
            padding: 10px 20px;
            color: #ffffff;
            font-size: 16px;
            margin-top: auto;
        }

        .dark-mode-btn {
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dark-mode-btn:hover {
            background-color: #777;
        }


    </style>
    <title>Home</title>
@include('components.navbar')

</head>

<body>
    <section>
        <!-- Navbar Section -->
    </section>

    <section>
        <!-- Search Section -->


        <!-- Greeting Section -->
        @guest
            <div style="text-align: center;">
                <h1>Halo Everyone!!</h1>
            </div>
        @endguest
        @auth
            <div style="text-align: center;">
                <h1>Selamat datang {{ auth()->user()->name }}!</h1>
            </div>

        @endauth


    </section>
<section>
   <!-- Bootstrap Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @php
            $active = 'active';
        @endphp
        @foreach ($pesanans as $index => $pesanan)
            @if ($pesanan->status === 'berbayar')
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" class="{{ $active }}"></li>
                @php
                    $active = '';
                @endphp
            @endif
        @endforeach
    </ol>

    <div class="carousel-inner">
        @php
            $active = 'active';
        @endphp
        @foreach ($pesanans as $pesanan)
            @if ($pesanan->status === 'berbayar')
                <div class="carousel-item {{ $active }}">

                    @if ($pesanan->gambar_pesanan)
                        @php
                            $gambarPath = json_decode($pesanan->gambar_pesanan)[0];
                        @endphp
                        <img class="d-block w-100" src="{{ asset('storage/' . $gambarPath) }}" alt="Gambar Pesanan">
                    @endif
                </div>
                @php
                    $active = '';
                @endphp
            @endif
        @endforeach
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



</section>

    <!-- Card Section -->
    <section style="text-align: center;">
        <div>
            <h1>Apasih yang lu cari ?</h1>
        </div>

        <div class="card-container">
            @foreach(['Udara', 'Darat', 'Laut'] as $jenis_pesanan)
                <div class="card">
                    <h1>{{ $jenis_pesanan }} ?</h1>
                    @if($jenis_pesanan == 'Udara')
                        <img src="{{ asset('gambar/plane.png') }}" alt="{{ $jenis_pesanan }} Image">
                    @elseif($jenis_pesanan == 'Darat')
                        <img src="{{ asset('gambar/truck.png') }}" alt="{{ $jenis_pesanan }} Image">
                    @elseif($jenis_pesanan == 'Laut')
                        <img src="{{ asset('gambar/ferry.png') }}" alt="{{ $jenis_pesanan }} Image">
                    @endif
                    <button onclick="window.location='{{ route('layananaja', ['jenis_pesanan' => strtolower($jenis_pesanan)]) }}'">Lihat Disini</button>
                </div>
            @endforeach

            <div class="card">
                <h1>semua layanan</h1>
                <img src="{{ asset('gambar/ferry.png') }}" alt="Ferry Image">
                <button onclick="window.location='{{ route('semualayanan') }}'">Lihat Disini</button>
            </div>
        </div>
          <!-- Carousel Section -->

    </section>
    <section>
        <h1>
            <center>
                kenapa memilih iklan disini ?
            </center>
        </h1>
        <div>
            <form action="{{ route('carilayanan') }}" method="get">
            <center>
                <input type="text" name="keyword" placeholder="cari kata pencarian">
<button type="submi">cari </button>
             </center>
            </form>
        </div>
        <p>adadeh</p>
        <p>adadeh</p>
        <p>adadeh</p>
        <p>adadeh</p>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.querySelector('.carousel-track');
            const items = document.querySelectorAll('.carousel-item');
            const totalItems = items.length;
            let currentIndex = 0;

            function nextSlide() {
                if (currentIndex < totalItems - 1) {
                    currentIndex++;
                } else {
                    currentIndex = 0;
                }
                updateCarousel();
            }

            function prevSlide() {
                if (currentIndex > 0) {
                    currentIndex--;
                } else {
                    currentIndex = totalItems - 1;
                }
                updateCarousel();
            }

            function updateCarousel() {
                const newTransformValue = -currentIndex * 100 + '%';
                track.style.transform = 'translateX(' + newTransformValue + ')';
            }

            document.querySelector('.carousel-button-next').addEventListener('click', nextSlide);
            document.querySelector('.carousel-button-prev').addEventListener('click', prevSlide);
        });
    </script>


</body>

</html>
