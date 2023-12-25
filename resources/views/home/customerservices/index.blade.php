<!-- Blade View -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Pesan</title>
</head>
<body>
    @include("components.navbar")
    <h1>Halaman Pesan</h1>

    <section>
        <div>
            @isset($messages)
                @foreach ($messages as $message)
                    {{-- Tampilkan pesan dari user atau admin --}}
                    <p><strong>{{ $message->user ? 'Pengguna' : 'Admin' }}:</strong> {{ $message->content }}</p>

                    {{-- Tampilkan balasan pesan --}}
                    @isset($message->replies)
                        @foreach ($message->replies as $reply)
                            @if ($reply->is_admin_reply)
                                <p><strong>Admin Reply:</strong> {{ $reply->content }}</p>
                            @endif
                        @endforeach
                    @endisset

                    {{-- Tambahkan formulir untuk admin membalas pesan --}}
                    @if (!$message->user)
                        <form action="{{ route('kirimpesan', ['id' => $message->id]) }}" method="post">
                            @csrf
                            <label for="adminReply">Balas Pesan:</label>
                            <textarea name="adminReply" id="adminReply" rows="3"></textarea>
                            <button type="submit">Kirim Balasan</button>
                        </form>
                    @endif
                    <hr>
                @endforeach
            @endisset
        </div>
    </section>
    <a href="{{ route('layananpesan') }}">Kirim Pesan</a>

</body>
</html>
