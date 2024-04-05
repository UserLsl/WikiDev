<?php

// declara o BD
$dsn = "mysql:dbname=WikiDev";

// declara o user do BD
$dbuser = "root";

// declara a senha para o BD
$dbpass = "";

// controle de excessão
try {
    // O PDO verifica os três parâmetros
    $pdo = new PDO($dsn, $dbuser, $dbpass);

} catch (PDOException $e) {
    // Excessão do PDO
    echo "Falha ao conectar a base de dados";
}
