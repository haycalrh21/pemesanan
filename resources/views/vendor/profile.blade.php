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
            margin: 0;
            padding: 0;
            background-color: #1a0909;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }

        .section {
            flex: 0 0 calc(50% - 20px); /* Ubah menjadi 50% */
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            color: #1a0909;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        .logo {
            max-width: 100%;
            border-radius: 8px;
        }

        .banner {
            background-image: url('path/to/your/banner-image.jpg'); /* Ganti dengan path gambar banner */
            background-size: cover;
            height: 200px; /* Sesuaikan tinggi banner */
            border-radius: 8px;
            margin-bottom: 20px; /* Sesuaikan jarak antara banner dan konten */
        }

        @media (max-width: 768px) {
            .section {
                flex: 0 0 100%;
            }
        }
    </style>
</head>

@include('components.navbar')
<body>
    <div class="container">
        <section class="section">
            <!-- Left Section -->
            <div>
                <img src="path/to/your/logo.png" alt="Logo" class="logo">
            </div>
        </section>

        <section class="section">
            <!-- Center Section (Banner) -->
            <div class="banner"></div>
        </section>

        <section class="section">
            <!-- Right Section -->
            <p>Name: {{ $vendor->name }}</p>
            <p>Email: {{ $vendor->email }}</p>
            <p>No HP: {{ $vendor->nohp }}</p>
            <p>Alamat: {{ $vendor->alamat }}</p>
            <p>Vendor: {{ $vendor->vendor }}</p>
        </section>
    </div>
</body>

</html>
