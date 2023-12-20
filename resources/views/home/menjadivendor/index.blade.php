<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Vendor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>

h2 {
    text-align: center;
}

form {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Membuat dua kolom dengan lebar yang sama */
    gap: 10px; /* Jarak antar elemen dalam grid */
    max-width: 800px; /* Atur lebar maksimum form */
    margin: 0 auto;
}

label {
    margin-bottom: 5px;
}

input {
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%; /* Agar input memenuhi lebar kolom */
}

button {
    grid-column: span 2; /* Membuat tombol memanjang melintasi kedua kolom */
    padding: 10px;
    background-color: #3498db;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}

</style>
<body>

<section>
    @include('components.navbar')
</section>

<h2>Form Pendaftaran Vendor</h2>
<form action="{{ route('daftar') }}" method="post" class="rounded-form">
    @csrf
    <label for="name">Nama Lengkap:</label>
    <input type="text" name="name" value="{{auth()->user()->name}}" required>

    <label for="name">Alamat:</label>
    <input type="text" name="alamat" placeholder="Masukkan alamat" required>

    <label for="email">Email:</label>
    <input type="email" name="email" placeholder="Masukkan email yang sedang login" value="{{auth()->user()->email}}" required>

    <label for="name">Nomor Hape:</label>
    <input type="text" name="nohp" placeholder="Masukkan nomor handphone" required>

    <label for="name">Masukkan Nama Vendor:</label>
    <input type="text" name="vendor" placeholder="Masukkan nama vendor" required>

    <button type="submit">Daftar sebagai Vendor</button>
</form>

</body>
</html>
