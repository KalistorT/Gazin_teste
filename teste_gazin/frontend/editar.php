<!-- <?php
require_once("../backend/crud.php");
require_once("../backend/db.php");
?>

<?php
if (!empty($_GET['id'])) {
    $id_controle = $_GET['id'];

    

    $query = $conn->prepare("SELECT *  FROM desenvolvedor d WHERE id= :id ");
                  $query->bindValue(':id', $id_controle);
                  $query->execute();
                  $resultado = $query->fetch(PDO::FETCH_ASSOC);
                  print_r($resultado);
    // foreach ($resultado as $key) {
        
    //     echo "<ul>";
    //     echo "<li>" . $key['id'] . "</li>";
    //     echo "<li>" . $key['nome'] . "</li>";
    //     echo "<li>" . ($key['sexo'] == 1 ? 'M' : 'F') . "</li>";
    //     echo "<li>" . $key['idade'] . "</li>";
    //     echo "<li>" . $key['hobby'] . "</li>";
    //     echo "<li>" . $key['data_nascimento'] . "</li>";
    //     echo "<li>" . $key['nivel'] . "</li>";
    //     echo "</ul>";
      
        
    // }
    
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/styles.css">
    <title>Prova Gazin</title>
</head>

<body>
    <div id="container_cadastro">
        <form action="cadastro.php" method="POST">
            <h2>Editar Desenvolvedor</h2>
            <p class="cad_text">Nome</p>
            <input type="text" name="cad_nome">
            <br>
            <p class="cad_text">Sexo</p>
            <input type="radio" value="1" name="cad_sexo" id="masculino" />
            <label for="masculino">Masculino</label>
            <br>
            <input type="radio" value="2" name="cad_sexo" id="feminino" />
            <label for="feminino">Feminino</label>
            <br>
            <p class="cad_text">Idade</p>
            <input type="number" name="cad_idade">
            <br>
            <p class="cad_text">Hobby</p>
            <input type="text" name="cad_hobby">
            <br>
            <p class="cad_text">Data de Nascimento</p>
            <input type="date" name="cad_data_nascimento">
            <br>
            <p class="cad_text">Nivel</p>
            <select name="cad_categoria" id="cad_categoria">
                <option value="">Selecione</option>
                <!-- Faz select no banco de dados -->
                <?php
                $query = $conn->query("SELECT * FROM nivel");
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultado as $key) {
                    echo "<option value=" . $key['id'] . ">" . $key['nivel'] . "</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Cadastrar" name="submit">
        </form>
        <div id="botton_navegar">
            <button>
                <a href="../index.php"> inicio</a>
            </button>
        </div>
    </div>
</body>

</html> -->