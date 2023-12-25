<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Pesan</title>
</head>
<body>
    @include("components.navbaradmin")
    <h1>Halaman Pesan</h1>

    <section>
        <div>
            @foreach ($messages as $message)
            <p><strong>Pengguna:</strong> {{ $message->user->name }}</p>
            <p><strong>Isi Pesan:</strong> {{ $message->content }}</p>

            @foreach ($message->replies as $reply)
                @if ($reply->is_admin_reply)
                    <p><strong>Admin:</strong> {{ $reply->content }}</p>
                @else
                    <p><strong>Pengguna:</strong> {{ $reply->content }}</p>
                @endif
            @endforeach

            {{-- Tambahkan formulir untuk admin membalas pesan --}}
            <form action="{{ route('balespesan', ['id' => $message->id]) }}" method="post">
                @csrf
                <label for="adminReply">Balas Pesan:</label>
                <textarea name="adminReply" id="adminReply" rows="3"></textarea>
                <button type="submit">Kirim Balasan</button>
            </form>
            <hr>
        @endforeach

        </div>

    </section>
</body>
</html>
