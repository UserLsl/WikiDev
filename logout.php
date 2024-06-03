<?php
    session_start();
    session_unset();
    session_destroy();
    //unset( $_SESSION['nome'] );
    //echo $_SESSION['nome'];
    echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>"; //header("Location: index.php"); //Faz a mesma coisa