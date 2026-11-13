<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Acadêmico</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center mb-4">Sistema Acadêmico</h1>

        <p class="text-center text-muted mb-5">
            Gerenciamento de estudantes, cursos e matrículas
        </p>

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="d-grid gap-3">

                    <a href="estudantes/cadastrar.php" class="btn btn-primary btn-lg">
                        Cadastrar Estudante
                    </a>

                    <a href="estudantes/listar.php" class="btn btn-outline-primary btn-lg">
                        Listar Estudantes
                    </a>

                    <a href="cursos/cadastrar.php" class="btn btn-success btn-lg">
                        Cadastrar Curso
                    </a>

                    <a href="cursos/listar.php" class="btn btn-outline-success btn-lg">
                        Listar Cursos
                    </a>

                    <a href="matriculas/cadastrar.php" class="btn btn-warning btn-lg">
                        Realizar Matrícula
                    </a>

                    <a href="matriculas/listar.php" class="btn btn-outline-warning btn-lg">
                        Listar Matrículas
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
