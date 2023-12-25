<!-- resources/views/messages/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messages</title>
</head>
<body>
    @include('components.navbar')
    <h1>Messages</h1>

    @foreach ($messages as $message)
        <p>
            <strong>{{ $message->user->name }}</strong>: {{ $message->content }}
        </p>
    @endforeach

    <a href="{{ route('layananpesan') }}">Kirim Pesan</a>
</body>
</html>
