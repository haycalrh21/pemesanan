<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <title>Vendor Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;

            background-color: #1a0909;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: auto 150px auto; /* Menggunakan "auto" untuk mengatur tinggi sejalan dengan konten */
            gap: 20px; /* Memberikan jarak antar elemen */
            justify-items: center; /* Meletakkan elemen di tengah kolom */
            align-items: center; /* Meletakkan elemen di tengah baris */
            padding: 20px;
        }

        .section {
            width: 100%;
            box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            color: #1a0909;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        .logo {
            width: 100px; /* Sesuaikan lebar logo */
            height: 100px; /* Sesuaikan tinggi logo */
            border-radius: 50%;
            margin-top: -50px; /* Sesuaikan jarak antara logo dan atas kontainer */
            margin-bottom: 20px; /* Sesuaikan jarak antara logo dan banner */
        }

        .banner {
            width: 100%; /* Agar lebar banner 100% dari kolom */
            height: 300px; /* Sesuaikan tinggi banner */
            border-radius: 8px; /* Membuat sudut banner melengkung */
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 768px) {
            .section {
                grid-template-columns: 1fr; /* Merubah kolom saat layar kecil */
            }
        }
    </style>

</head>

@include('components.navbar')
<body>
    <div class="container">
        <section class="section">
            <!-- Center Section (Banner) -->
            <div class="banner" style="background-image: url('{{ asset("storage/$folderPath/gambar_banner.jpg") }}');"></div>
        </section>

        <section class="section">
            <!-- Left Section (Logo) -->
            <div>
                <img src="{{ asset("storage/$folderPath/gambar_logo.jpg") }}" alt="Logo" class="logo">
                <h1>
                    {{ $vendor->vendor }}
                </h1>
            </div>
        </section>

        <section class="section">
            <!-- Right Section -->

            <p>Email: {{ $vendor->email }}</p>
            <p>No HP: {{ $vendor->nohp }}</p>
            <p>Alamat: {{ $vendor->alamat }}</p>

        </section>
    </div>
</body>

</html>
