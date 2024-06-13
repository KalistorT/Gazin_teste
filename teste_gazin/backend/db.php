<?php

$db_name = "gazin";
$db_host = "host.docker.internal";
$db_user = "postgres";
$bd_pass = "docker";

//Executando a Conexao com o Banco de dados
$conn = new PDO("pgsql:dbname=". $db_name . ";host=". $db_host, $db_user, $bd_pass);
//Habilitar erros PDO
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
?>