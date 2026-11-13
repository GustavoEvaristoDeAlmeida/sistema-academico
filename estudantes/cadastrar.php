<?php

require_once __DIR__ . '/../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $naturalidade = $_POST['naturalidade'];

    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];

    $estudantes = $database->estudantes;

    try {

        $dataNascimento = new MongoDB\BSON\UTCDateTime(
            (new DateTimeImmutable(
                $data_nascimento,
                new DateTimeZone('UTC')
            ))->getTimestamp() * 1000
        );

        $documento = [
            'nome' => $nome,
            'cpf' => $cpf,
            'email' => $email,
            'telefone' => $telefone,
            'data_nascimento' => $dataNascimento,
            'naturalidade' => $naturalidade,

            'endereco' => [
                'rua' => $rua,
                'numero' => $numero,
                'bairro' => $bairro,
                'cidade' => $cidade,
                'cep' => $cep
            ]
        ];

        $resultado = $estudantes->insertOne($documento);

        echo "Estudante cadastrado com sucesso!";

    } catch (Throwable $e) {

        echo "Erro ao cadastrar estudante: " . $e->getMessage();

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Estudantes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2 class="text-center mb-4">Cadastro de Estudantes</h2>

        <form method="POST" action="">

            <h5 class="mb-3">Dados Pessoais</h5>

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Naturalidade</label>
                <input type="text" name="naturalidade" class="form-control" required>
            </div>

            <hr>

            <h5 class="mb-3">Endereço</h5>

            <div class="mb-3">
                <label class="form-label">Rua</label>
                <input type="text" name="rua" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Número</label>
                <input type="text" name="numero" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Bairro</label>
                <input type="text" name="bairro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Cidade</label>
                <input type="text" name="cidade" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">CEP</label>
                <input type="text" name="cep" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Cadastrar Estudante
            </button>

            <a href="../index.php" class="btn btn-secondary">
                Voltar
            </a>

        </form>

    </div>

</body>

</html>
