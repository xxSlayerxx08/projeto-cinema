<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema - página de erro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container text-center mt-5">
        <div class="alert alert-danger ">
            <p class="fw-bold"><?= $mensagem ?></p>
            <a href="javascript:history.back();" class='text-decoration-none'>Clique aqui para voltar para o formulário</a>
        </div>
    </div>

</body>
</html>