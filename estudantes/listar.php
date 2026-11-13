<?php

require_once __DIR__ . '/../conexao.php';

$estudantes = $database->estudantes->find();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Estudantes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="text-center mb-4">Estudantes Cadastrados</h2>

        <table class="table table-bordered table-striped">

            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Data de Nascimento</th>
                    <th>Naturalidade</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($estudantes as $estudante): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($estudante['nome']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($estudante['cpf']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($estudante['email']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($estudante['telefone']) ?>
                        </td>

                        <td>
                            <?= $estudante['data_nascimento']->toDateTime()->format('d/m/Y') ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($estudante['naturalidade'] ?? '') ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($estudante['endereco']['cidade']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($estudante['endereco']['bairro']) ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <a href="../index.php" class="btn btn-secondary">Voltar</a>

    </div>

</body>

</html>
