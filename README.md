# Sistema Acadêmico

Sistema de gerenciamento acadêmico desenvolvido em PHP e MongoDB, com o objetivo de realizar o cadastro de estudantes, cursos e matrículas.

## Funcionalidades

### Estudantes
- Cadastro de estudantes.
- Armazenamento de dados pessoais.
- Cadastro de endereço.
- Listagem de estudantes cadastrados.
- CPF único para cada estudante.

### Cursos
- Cadastro de cursos.
- Registro de descrição, carga horária, duração e modalidade.
- Listagem de cursos cadastrados.

### Matrículas
- Realização de matrículas vinculando estudantes aos cursos.
- Geração automática de números de matrícula.
- Registro da data da matrícula.
- Permite que um estudante possua várias matrículas.
- Listagem das matrículas realizadas.

## Tecnologias utilizadas

- PHP 8.2
- MongoDB Atlas
- Biblioteca MongoDB PHP Library
- Composer
- Bootstrap 5.3

## Estrutura do banco de dados

O banco de dados utilizado é `sistema_academico`, composto por três coleções:

**1. estudantes**

Armazena os dados pessoais dos estudantes:
- Nome
- CPF
- E-mail
- Telefone
- Data de nascimento
- Naturalidade
- Endereço (rua, número, bairro, cidade e CEP)

**2. cursos**

Armazena as informações dos cursos:
- Nome
- Descrição
- Carga horária
- Duração
- Modalidade

**3. matriculas**

Armazena os vínculos entre estudantes e cursos:
- Número da matrícula
- Identificador do estudante
- Identificador do curso
- Data da matrícula

Os relacionamentos são realizados por meio de referências aos documentos das coleções de estudantes e cursos.

## Estrutura do projeto

```text
sistema_academico/
│
├── estudantes/
│   ├── cadastrar.php
│   └── listar.php
│
├── cursos/
│   ├── cadastrar.php
│   └── listar.php
│
├── matriculas/
│   ├── cadastrar.php
│   └── listar.php
│
├── vendor/
│
├── conexao.php
├── index.php
├── composer.json
├── composer.lock
└── README.md
```

## Instalação e execução

1. Instale o XAMPP.
2. Instale o PHP e o Composer.
3. Configure a extensão MongoDB no PHP.
4. Crie um cluster no MongoDB Atlas.
5. Configure a conexão com o banco de dados no arquivo `conexao.php`.
6. Abra o terminal na pasta do projeto e execute:

```bash
composer install
```

7. Coloque o projeto na pasta `htdocs` do XAMPP.
8. Inicie o Apache.
9. Acesse pelo navegador:

```text
http://localhost/sistema_academico/
```

## Banco de dados

O sistema utiliza o MongoDB Atlas para armazenar os dados. As coleções são criadas automaticamente durante a inserção dos primeiros documentos.

---

**Projeto acadêmico desenvolvido para fins educacionais.**