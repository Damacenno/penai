<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Correções</title>
</head>
<body>
    @foreach ($corrections as $correction)
        <h3>{{ $correction->json_correction}}</h3>
    @endforeach
</body>
</html>