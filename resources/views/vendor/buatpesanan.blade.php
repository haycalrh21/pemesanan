<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pesanan</title>
</head>
<body>
    <section>
        @include('components.navbar')
    </section>
    <h2>Form Pesanan</h2>
    <form action="{{ route('prosespesanan') }}" method="post" enctype="multipart/form-data">

        @csrf

        {{-- Ambil vendor_id dari vendor yang sedang login --}}
        <input type="hidden" name="vendor_id" value="{{ Auth::user()->id }}">

        {{-- Ambil user_id dari user yang sedang login --}}
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <label for="jenis_pesanan">Jenis Pesanan:</label>
        <select name="jenis_pesanan" id="jenis_pesanan" required>
            <option value="laut">Laut</option>
            <option value="udara">Udara</option>
            <option value="darat">Darat</option>
        </select><br>

        <label for="jenis_detail">Jenis Detail:</label>
        <select name="jenis_detail" id="jenis_detail" required>
            <!-- Default options -->
            <option value="kapal_kontainer">Kapal Kontainer</option>
            <option value="jet_pribadi">Jet Pribadi</option>
            <option value="pesawat_kargo">Pesawat Kargo</option>
            <!-- Tambahkan opsi lain sesuai kebutuhan -->
        </select><br>

        <label for="nama_pesanan">Nama Pesanan:</label>
        <input type="text" name="nama_pesanan" required><br>

        <label for="lokasi_provinsi">Lokasi Provinsi:</label>
        <input type="text" name="lokasi_provinsi" required><br>

        <label for="lokasi_kota">Lokasi Kota:</label>
        <input type="text" name="lokasi_kota" required><br>

        <label for="lokasi_kecamatan">Lokasi Kecamatan:</label>
        <input type="text" name="lokasi_kecamatan" required><br>

        <label for="lokasi_kelurahan">Lokasi Kelurahan:</label>
        <input type="text" name="lokasi_kelurahan" required><br>

        <label for="gambar_pesanan">Gambar Pesanan:</label>
        <input type="file" name="gambar_pesanan[]" accept="image/*" multiple><br>

        <label for="status" style="display: none;">Status:</label>
        <select name="status" required style="visibility: hidden;">
            <option value="free" selected>--Silahkan Pilih--</option>
            <option value="free">Free</option>
            <option value="berbayar">Berbayar</option>
        </select><br>

        <button type="submit">Proses Pesanan</button>
    </form>
</body>

<script>
    // Menambahkan event listener untuk perubahan pada jenis_pesanan
    document.getElementById('jenis_pesanan').addEventListener('change', function() {
        var jenisDetailSelect = document.getElementById('jenis_detail');
        // Menghapus opsi yang sudah ada
        jenisDetailSelect.innerHTML = "";

        // Menyesuaikan opsi berdasarkan jenis_pesanan yang dipilih
        switch(this.value) {
            case 'laut':
                jenisDetailSelect.add(new Option('Kapal Kontainer', 'kapal_kontainer'));
                jenisDetailSelect.add(new Option('Yacht', 'yacht'));
                // Tambahkan opsi lain sesuai kebutuhan
                break;
            case 'udara':
                jenisDetailSelect.add(new Option('Jet Pribadi', 'jet_pribadi'));
                jenisDetailSelect.add(new Option('Pesawat Kargo', 'pesawat_kargo'));
                // Tambahkan opsi lain sesuai kebutuhan
                break;
            case 'darat':
                jenisDetailSelect.add(new Option('Alat Berat', 'alat_berat'));
                jenisDetailSelect.add(new Option('Mobil', 'mobil'));
                jenisDetailSelect.add(new Option('Bak Kargo', 'bak_kargo'));
                // Tambahkan opsi lain sesuai kebutuhan
                break;
            default:
                // Default jika jenis_pesanan tidak cocok
                jenisDetailSelect.add(new Option('Pilih Jenis Detail', ''));
        }
    });
</script>
</html>
