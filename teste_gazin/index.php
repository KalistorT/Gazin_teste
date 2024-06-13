<?php
session_start();
require_once("backend/db.php");
//include_once("../backend/cadastro.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova Gazin</title>
    <link rel="stylesheet" href="../teste_Gazin/frontend/styles.css">
</head>

<body>
    <div id="container_main">
        <div class="text_h1">
            <h1>Desenvolvedores</h1>
        </div>
        <div id="container_controler">
            <div id="container_titulo">
                <ul>
                    <li class="linha">Id</li>
                    <li class="linha">Nome</li>
                    <li class="linha">Sexo</li>
                    <li class="linha">Idade</li>
                    <li class="linha">Hobby</li>
                    <li class="linha">Data Nascimento</li>
                    <li class="linha">Nivel</li>
                    <li class="linha">Opcoes</li>
                </ul>
            </div>
            <div id="container_valores">
                <!-- Busca os dados no banco e mostra na tabela -->
                <?php
                $query = $conn->query("SELECT
                 d.id,
                 d.nome,
                 d.sexo,
                 DATE_PART('year', AGE(CURRENT_DATE, d.data_nascimento)) AS idade,
                 d.hobby,
                 d.data_nascimento,
                 n.nivel
                FROM desenvolvedor d
                INNER JOIN nivel n on n.id=d.nivel_id
                 ORDER BY id DESC");
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultado as $key) {
                    echo "<ul>";
                    echo "<li>" . $key['id'] . "</li>";
                    echo "<li>" . $key['nome'] . "</li>";
                    echo "<li>" . ($key['sexo'] == 1 ? 'Maculino' : 'Feminino') . "</li>";
                    echo "<li>" . $key['idade'] . "</li>";
                    echo "<li>" . $key['hobby'] . "</li>";
                    echo "<li>" . $key['data_nascimento'] . "</li>";
                    echo "<li>" . $key['nivel'] . "</li>";
                    echo "<li><button class='editar' onclick=\"window.location.href='../teste_Gazin/frontend/cadastro.php?id=$key[id]'\">Editar</button>"
                        . "<button class='excluir' onclick=\"window.location.href='../teste_Gazin/backend/crud.php?id=$key[id]&excluir'\">Excluir</button></li>";
                    echo "</ul>";
                }
                ?>
            </div>
        </div>
        <div id="botton_cadastro">
            <a href="../teste_Gazin/frontend/cadastro.php"> Tela de cadastro</a>
        </div>
    </div>
</body>

</html>