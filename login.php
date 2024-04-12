<?php
session_start();

if (isset($_POST['email']) && empty($_POST['email']) == false && isset($_POST['senha']) && empty($_POST['senha']) == false) {
    // Conexão com o BD
    require 'config.php';

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $sql = "select userPassword, userName from User where userEmail = '$email';";
    $sql = $pdo->query($sql);

    if ($sql->rowCount() > 0) {
        foreach ($sql->fetchall() as $user) {
            if ($user['userPassword'] == $senha) {
                $_SESSION['nome'] = $user['userName'];
                echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>";
            } else {
                echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
                <script type=\"text/javascript\">alert(\"Credenciais Inválidas! \");
                </script>";
            }
        }
    } else {
        echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
        <script type=\"text/javascript\">alert(\"Credenciais Inválidas! \");
        </script>";
    }
}

