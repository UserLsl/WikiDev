<?php
session_start();

if (isset($_POST['pesquisar']) && empty($_POST['pesquisar']) == false && strlen($_POST['pesquisar']) >= 3) {
    $pesquisar = addslashes($_POST['pesquisar']);
    $_SESSION['pesquisa'] = $pesquisar;
    echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>";
} else {
    if (isset($_SESSION['pesquisa'])) {
        unset( $_SESSION['pesquisa'] );
        echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>";
    }
}