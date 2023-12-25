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
<h1>halaman pesan</h1>

<section>
    <div>
        @php
            $previousUsername = null;
        @endphp

        @foreach ($messages as $message)
            @if ($message->user->name !== $previousUsername)
                <p><strong>Pengguna:</strong> {{ $message->user->name }}</p>
            @endif
            {{-- <p><strong>Isi Pesan:</strong> {{ $message->content }}</p> --}}

            @php
                $previousUsername = $message->user->name;
            @endphp
        @endforeach
    </div>
</section>
</body>
</html>
