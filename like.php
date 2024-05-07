<?php

if (isset($_GET['postId'])) {
    
    require 'config.php';

    $id = addslashes($_GET['postId']);

    $sql = "update Post set postLikeds = postLikeds + 1 where postId = $id;";
    $sql = $pdo->query($sql);

    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; URL=postagem.php?id='.$id.'#like">';
}