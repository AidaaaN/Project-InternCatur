<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h1>Upload File</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Pilih file untuk diunggah:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Unggah</button>
    </form>

    @if($errors->any())
        <div>
            <strong>Whoops! Ada masalah dengan input Anda.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
