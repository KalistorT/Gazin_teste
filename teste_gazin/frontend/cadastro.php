<?php
require_once("../backend/crud.php");
require_once("../backend/db.php");
$values = array();
$type = "Cadastrar";
$title = "Cadastro Desenvolvedores";

if (isset($_GET['id'])) {
    $query = $conn->prepare("SELECT *  FROM desenvolvedor d WHERE id= :id ");
    $query->bindValue(':id', $_GET['id']);
    $query->execute();
    $values = $query->fetch(PDO::FETCH_ASSOC);
    $type = "Atualizar";
    $title = "Editar Desenvolvedor";
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
            <h2>
                <?php echo $title ?>
            </h2>
            <input name="cad_id" type="hidden" value="<?php echo isset($values['id']) ? $values['id'] : '' ?>">
            <p class="cad_text">Nome</p>
            <input type="text" name="cad_nome" value="<?php echo isset($values['nome']) ? $values['nome'] : '' ?>">
            <br>
            <p class="cad_text">Sexo</p>
            <input type="radio" value="1" <?php echo (isset($values['sexo']) && $values['sexo'] == '1') ? 'checked' : ''; ?> name="cad_sexo" id="masculino" />
            <label for="masculino">Masculino</label>
            <br>
            <input type="radio" value="2" <?php echo (isset($values['sexo']) && $values['sexo'] == '2') ? 'checked' : ''; ?> name="cad_sexo" id="feminino" />
            <label for="feminino">Feminino</label>
            <br>
            <p class="cad_text">Hobby</p>
            <input type="text" name="cad_hobby" value="<?php echo isset($values['hobby']) ? $values['hobby'] : '' ?>">
            <br>
            <p class="cad_text">Data de Nascimento</p>
            <input type="date" name="cad_data_nascimento"
                value="<?php echo isset($values['data_nascimento']) ? $values['data_nascimento'] : '' ?>">
            <br>
            <p class="cad_text">Nivel</p>
            <select name="cad_categoria" id="cad_categoria">
                <option value="">Selecione</option>
                <?php
                $query = $conn->query("SELECT * FROM nivel");
                $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultado as $key) {
                    echo "<option value='" . $key['id'] . "'" . (isset($values['nivel_id']) && $key['id']
                        == $values['nivel_id'] ? ' selected' : '') . ">" . $key['nivel'] . "</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" value="<?php echo $type ?>" name="submit">
            <br> <br>
            <div id="botton_voltar">
                <a href="../index.php"> Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>