<?php

require_once __DIR__ . '/../conexao.php';

$cursos = $database->cursos;

$resultado = $cursos->find();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Cursos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="text-center mb-4">Cursos Cadastrados</h2>

        <table class="table table-striped table-bordered">

            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Carga horária</th>
                    <th>Duração</th>
                    <th>Modalidade</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($resultado as $curso): ?>

                    <tr>
                        <td><?= htmlspecialchars($curso['nome']) ?></td>
                        <td><?= htmlspecialchars($curso['descricao']) ?></td>
                        <td><?= $curso['carga_horaria'] ?> horas</td>
                        <td><?= htmlspecialchars($curso['duracao']) ?></td>
                        <td><?= htmlspecialchars($curso['modalidade']) ?></td>
                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <div class="mt-4 mb-4">
            <a href="../index.php" class="btn btn-secondary">
                Voltar ao menu
            </a>
        </div>

    </div>

</body>
</html>
