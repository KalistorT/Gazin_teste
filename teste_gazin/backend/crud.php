<?php
// chama a conexao com o banco
require_once("../backend/db.php");
//Recebe o valor excluir no GET
if (isset($_GET['excluir'])) {
   $id = (!empty($_GET['id']) ? $_GET['id'] : null);
   $query = "DELETE FROM desenvolvedor WHERE id=:id ";
   $stmt = $conn->prepare($query);
   $stmt->bindParam(':id', $id);
   $stmt->execute();
   echo '<meta http-equiv="Refresh" content="2; url=../index.php">';
   exit;
}
//Recebe o valor POST e insere no banco de dados
if (isset($_POST['submit']) != '') {
   $id = (!empty($_POST['cad_id']) ? $_POST['cad_id'] : null);
   $nome = $_POST['cad_nome'];
   $sexo = $_POST['cad_sexo'];
   $hobby = $_POST['cad_hobby'];
   $data_nascimento = $_POST['cad_data_nascimento'];
   $categoria = $_POST['cad_categoria'];
   $query = "INSERT INTO desenvolvedor (nome, sexo, data_nascimento, hobby,nivel_id) VALUES (:nome, :sexo, :data_nascimento,  :hobby,:nivel_id )";
   // verifica o id e chama a funcao de atualizar tabela com valores recebido do banco
   if ($id) {
      $query = "UPDATE desenvolvedor SET nome=:nome, sexo=:sexo, data_nascimento=:data_nascimento,  hobby=:hobby,nivel_id=:nivel_id WHERE id=:id ";
   }
   $stmt = $conn->prepare($query);
   // verifica o id correto igual recebido na variavel e atualiza o id correto
   if ($id) {
      $stmt->bindParam(':id', $id);
   }
   $stmt->bindParam(':nome', $nome);
   $stmt->bindParam(':sexo', $sexo);
   $stmt->bindParam(':data_nascimento', $data_nascimento);
   $stmt->bindParam(':hobby', $hobby);
   $stmt->bindParam(':nivel_id', $categoria);
   $stmt->execute();
} else {
   $nome = '';
   $sexo = '';
   $hobby = '';
   $data_nascimento = '';
   $categoria = '';
}
?>