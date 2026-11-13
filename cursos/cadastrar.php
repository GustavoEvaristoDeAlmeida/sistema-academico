<?php

require_once __DIR__ . '/../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $carga_horaria = $_POST['carga_horaria'];
    $duracao = $_POST['duracao'];
    $modalidade = $_POST['modalidade'];

    $cursos = $database->cursos;

    $documento = [
        'nome' => $nome,
        'descricao' => $descricao,
        'carga_horaria' => (int) $carga_horaria,
        'duracao' => $duracao,
        'modalidade' => $modalidade
    ];

    try {

        $resultado = $cursos->insertOne($documento);

        echo "Curso cadastrado com sucesso!";

    } catch (Throwable $e) {

        echo "Erro ao cadastrar curso: " . $e->getMessage();

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Cursos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="text-center mb-4">Cadastro de Cursos</h2>

        <form method="POST" action="">

            <div class="mb-3">
                <label class="form-label">Nome do curso</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Carga horária (horas)</label>
                <input type="number" name="carga_horaria" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Duração</label>
                <input type="text" name="duracao" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Modalidade</label>
                <select name="modalidade" class="form-select" required>
                    <option value="">Selecione</option>
                    <option value="Presencial">Presencial</option>
                    <option value="EAD">EAD</option>
                    <option value="Híbrido">Híbrido</option>
                </select>
            </div>

            <div class="mt-4 mb-4">
                <button type="submit" class="btn btn-primary">
                    Cadastrar Curso
                </button>

                <a href="../index.php" class="btn btn-secondary">
                    Voltar
                </a>
            </div>

        </form>

    </div>

</body>
</html>
