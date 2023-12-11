<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Vendor</title>
</head>
<body>

<section>
    @include('components.navbar')
</section>
    <h2>Form Pendaftaran Vendor</h2>
    <form action="{{ route('daftar') }}" method="post">
        @csrf
        <label for="name">Nama Lengkap:</label>
        <input type="text" name="name" value="{{auth()->user()->name}}" required><br>

        <label for="name">alamat</label>
        <input type="text" name="alamat" placeholder="masukan alamat    " required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="masukam email yang sedang login" value="{{auth()->user()->email}}" required><br>

        <label for="name">Nomor Hape :</label>
        <input type="text" name="nohp" placeholder="masukan no handphone" required><br>

        <label for="name">Masukan Nama Vendor</label>
        <input type="text" name="vendor" placeholder="masukan nama vendor" required><br>

        <button type="submit">Daftar sebagai Vendor</button>
    </form>
</body>
</html>
