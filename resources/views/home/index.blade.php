<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #000;
        }

        body.dark-mode {
            background-color: #333;
            color: white;
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

        /* Style for the carousel */
        .carousel-container {
        overflow: hidden;
        width: 100%;
    }

    .carousel-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item {
        flex: 0 0 100%; /* Set the width of each item to 100% */
        box-sizing: border-box;
    }

    .carousel-image {
        width: 50%; /* Make sure each image takes up the full width of the slide */
        height: auto; /* Maintain aspect ratio */
    }

    .carousel-nav {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .carousel-button {
        background-color: #333;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }
    </style>
    <title>Home</title>
</head>
<body>

    <section>
        @include('components.navbar')
    </section>

    <section>

        <div style= "margin-top:20px; display: flex; justify-content: center; align-items: center; height: 1vh;">
            <input type="text" style="border-radius: 10px; padding: 10px; width: 500px; margin-right: 10px;">
            <button style="padding: 10px 20px; background-color: #3498db; color: #ffffff; border: none; border-radius: 5px;">Cari</button>
        </div>

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



        <div class="carousel-container" style="text-align: center;">
            <div class="carousel-track">
                @foreach ($pesanans as $pesanan)
                    @if ($pesanan->status === 'berbayar')
                        <div class="carousel-item">
                            <p>ID: {{ $pesanan->id }}</p>
                            <!-- Tampilkan informasi lainnya sesuai kebutuhan -->

                            @if ($pesanan->gambar_pesanan)
                                {{-- Ambil hanya satu gambar --}}
                                @php
                                    $gambarPath = json_decode($pesanan->gambar_pesanan)[0];
                                @endphp

                                <img class="carousel-image" src="{{ asset('storage/' . $gambarPath) }}" alt="Gambar Pesanan">
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>

        <div class="carousel-nav" style="text-align: center;">
            <button class="carousel-button-prev">Previous</button>
            <button class="carousel-button-next">Next</button>
        </div>
        </div>









    </section>

    <section style="text-align: center;">
        <div>
            <h1>Apasih yang lu cari ?</h1>
        </div>
        <div style="display: flex; gap: 1rem; justify-content: center; padding: 25px; height: 60vh;">

            <!-- Card 1 -->
            <div style="border: 1px solid #ddd; padding: 15px; width: 200px;">
                <h1 style="margin-bottom: 10px;">Udara ?</h1>
                <img src="{{ asset('gambar/plane.png') }}" alt="Ferry Image" style="width:70%; max-height: 150px; object-fit: cover;">

                <button onclick="window.location='{{ route('login') }}'" style="border-radius: 10px; background-color: #3498db; margin-top: 25%; padding: 10px 20px; color: #ffffff; font-size: 16px;">Test</button>

            </div>

            <!-- Card 2 -->
            <div style="border: 1px solid #ddd; padding: 15px; width: 200px;">
                <h1>Darat ?</h1>
                <img src="{{ asset('gambar/truck.png') }}" alt="Ferry Image" style="width: 70%; max-height: 150px; object-fit: cover;">

                <button onclick="window.location='{{ route('login') }}'" style="border-radius: 10px; background-color: #3498db; margin-top: 20%; padding: 10px 20px; color: #ffffff; font-size: 16px;">Test</button>

            </div>

            <!-- Card 3 -->
            <div style="border: 1px solid #ddd; padding: 15px; width: 200px;">
                <h1>Laut ?</h1>
                <img src="{{ asset('gambar/ferry.png') }}" alt="Ferry Image" style="width: 70%; max-height: 150px; object-fit: cover;">

                <button onclick="window.location='{{ route('login') }}'" style="border-radius: 10px; background-color: #3498db; margin-top: 20%; padding: 10px 20px; color: #ffffff; font-size: 16px;">Test</button>

            </div>
            <!-- Card 3 -->
            <div style="border: 1px solid #ddd; padding: 15px; width: 200px;">
                <h1>apa semuanya ?</h1>
                <img src="{{ asset('gambar/ferry.png') }}" alt="Ferry Image" style="width: 70%; max-height: 150px; object-fit: cover;">

                <button onclick="window.location='{{ route('semualayanan') }}'" style="border-radius: 10px; background-color: #3498db; margin-top: 20%; padding: 10px 20px; color: #ffffff; font-size: 16px;">Test</button>

            </div>




        </div>
    </section>

</body>


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

</html>
