<?php

require_once __DIR__ . '/../conexao.php';

$matriculas = $database->matriculas;
$estudantes = $database->estudantes;
$cursos = $database->cursos;

$resultado = $matriculas->find();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Matrículas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="text-center mb-4">Matrículas Cadastradas</h2>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Número da Matrícula</th>
                    <th>Estudante</th>
                    <th>Curso</th>
                    <th>Data da Matrícula</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($resultado as $matricula): ?>

                    <?php

                    $estudante = $estudantes->findOne([
                        '_id' => $matricula['estudante_id']
                    ]);

                    $curso = $cursos->findOne([
                        '_id' => $matricula['curso_id']
                    ]);

                    ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($matricula['numero_matricula']) ?>
                        </td>

                        <td>
                            <?= $estudante
                                ? htmlspecialchars($estudante['nome'])
                                : 'Estudante não encontrado' ?>
                        </td>

                        <td>
                            <?= $curso
                                ? htmlspecialchars($curso['nome'])
                                : 'Curso não encontrado' ?>
                        </td>

                        <td>
                            <?= $matricula['data_matricula']
                                ->toDateTime()
                                ->format('d/m/Y H:i') ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <a href="../index.php" class="btn btn-secondary">Voltar</a>

    </div>

</body>

</html>
