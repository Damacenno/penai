<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correção | Teste</title>
</head>

<body>
    Nota Geral: {{ $payload['nota_geral']['nota_geral'] }}
    <br><br>
    Comentário Geral: {{ $payload['nota_geral']['comentario_geral'] }}
    <br><br>
    Competência 1 - Nota: {{ $payload['competencias']['competencia_01']['nota'] }}
    <br><br>
    Competência 1 - Nota: {{ $payload['competencias']['competencia_01']['comentário'] }}
</body>

</html>