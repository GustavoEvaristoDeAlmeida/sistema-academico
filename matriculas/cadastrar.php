<?php

require_once __DIR__ . '/../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $matriculas = $database->matriculas;

    try {

        $estudante_id = new MongoDB\BSON\ObjectId($_POST['estudante_id']);

        $curso_id = new MongoDB\BSON\ObjectId($_POST['curso_id']);

        // Gera o próximo número de matrícula
        $quantidade = $matriculas->countDocuments();

        $numero_matricula = 'MAT-' . str_pad(
            $quantidade + 1,
            4,
            '0',
            STR_PAD_LEFT
        );

        $documento = [
            'numero_matricula' => $numero_matricula,
            'estudante_id' => $estudante_id,
            'curso_id' => $curso_id,
            'data_matricula' => new MongoDB\BSON\UTCDateTime()
        ];

        $resultado = $matriculas->insertOne($documento);

        echo "Matrícula realizada com sucesso! Número: " . $numero_matricula;

    } catch (Throwable $e) {

        echo "Erro ao realizar matrícula: " . $e->getMessage();

    }
}

$estudantes = $database->estudantes->find();

$cursos = $database->cursos->find();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Matrículas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="text-center mb-4">Cadastro de Matrículas</h2>

        <form method="POST" action="">

            <div class="mb-3">
                <label class="form-label">Estudante</label>

                <select name="estudante_id" class="form-select" required>
                    <option value="">Selecione um estudante</option>

                    <?php foreach ($estudantes as $estudante): ?>

                        <option value="<?= $estudante['_id'] ?>">
                            <?= htmlspecialchars($estudante['nome']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Curso</label>

                <select name="curso_id" class="form-select" required>
                    <option value="">Selecione um curso</option>

                    <?php foreach ($cursos as $curso): ?>

                        <option value="<?= $curso['_id'] ?>">
                            <?= htmlspecialchars($curso['nome']) ?>
                        </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="mt-4 mb-4">
                <button type="submit" class="btn btn-primary">
                    Realizar Matrícula
                </button>

                <a href="../index.php" class="btn btn-secondary">
                    Voltar
                </a>
            </div>

        </form>

    </div>

</body>
</html>
