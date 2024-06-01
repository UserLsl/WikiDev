<?php
session_start();

if (isset($_POST['titulo']) && empty($_POST['titulo']) == false && isset($_POST['categoria']) && empty($_POST['categoria']) == false && isset($_POST['imagem']) && empty($_POST['imagem']) == false && isset($_POST['conteudo']) && empty($_POST['conteudo']) == false && isset($_POST['tags']) && empty($_POST['tags']) == false) {
    // Conexão com o BD
    require 'config.php';

    if (isset($_SESSION['userId'])) {


        $titulo = addslashes($_POST['titulo']);
        $categoria = addslashes($_POST['categoria']);
        $imagem = addslashes($_POST['imagem']);
        $conteudo = addslashes($_POST['conteudo']);
        $user = addslashes($_SESSION['userId']);

        var_dump($id);

        $sql = "insert into post set postBody = '".$conteudo."', postCreatedAt = Now(), categoryId = ".$categoria.", postImageURL = '".$imagem."', postLikeds = 0, postShareds = 0, postTitle = '".$titulo."', userId = ".$user.";";
        $sql = $pdo->query($sql);

        if ($sql->rowCount() > 0) {

            $sql = "select * from post where postTitle = '".$titulo."';";
            $sql = $pdo->query($sql);

            $results = $sql->fetchAll();

            foreach ($_POST['tags'] as $tag) {
                $sql = "INSERT into post_tag set postId = ".$results[0]['postId'].", tagId = ".$tag.";";
                $sql = $pdo->query($sql);
            }

            echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
            <script type=\"text/javascript\">alert(\"Postagem cadastrada! \");
            </script>";
        } else {
            echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
            <script type=\"text/javascript\">alert(\"Algo deu errado! \");
            </script>";
    }

    } else {
        echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
        <script type=\"text/javascript\">alert(\"Usuário logado não encontrado! \");
        </script>";
    }

} else {
    echo "<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
    <script type=\"text/javascript\">alert(\"Algum campo não está sendo passado corretamente! \");
    </script>";
}