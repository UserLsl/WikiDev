<!--NOME DA TABELA NO BANCO DE DADOS = User / Post_Tag
    CAMPOS DA TABELA NO BANCO DE DADOS = userName / postTag
    TODAS AS TABELAS E CAMPOS NO BANCO DE DADOS ESTÃO EM INGLES
    TODAS AS VARIAVEIS EM PHP ESTÃO EM PORTUGUES = nomeUsuario
    TODOS OS ID E CLASSES EM HTML DEVEM FICAR COM UM TRAÇO E EM PORTUGUES= logo-header-->
<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c84d6546c9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>WikiDev</title>
</head>

<body>
   <header>
        <img id="logo-header" src="./img/logo-header.png" alt="Logo WikiDev">
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Dicas</a></li>
                <li><a href="#">Tutoriais</a></li>
                <li><a href="#">Projetos e Desafios</a></li>
                <li><a href="#">Recursos</a></li>
            </ul>
        </nav>
        <a id="btn-home" href="#">Home</a>
        <?php
        session_start();
        if (isset($_SESSION['nome'])) {
            echo "<ul class='dropdown'>
                    <li><a class='nome-usuario' href='#'>". $_SESSION['nome'] ."<i class='fa-solid fa-angle-down'></i></a>
                        <ul>
                            <li><a href='#'>Realizar Postagem</a></li>
                            <li><a href='logout.php' id='logout-btn'>
                                    Sair
                                </a>
                            </li>
                        </ul>
                    </li>";
        } else {
            echo '<button id="login-btn">
                    <i class="fa fa-user"></i>Entrar
                </button>';
        }
        ?>

    </header>
    <div class="fundo-sobreposicao" id="fundo-sobreposicao"></div><!-- /FUNDO-SOBREPOSICAO-->

    <div class="login-container" id="loginContainer">
        <form action="login.php" method="post" class="login-form">
            <h2>Acesse sua conta</h2>
            <input name="email" type="email" placeholder="E-mail de Usuário" required>
            <input name="senha" type="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div><!-- /LOGIN-CONTAINER-->
y
    <section class="envelope-secao" id="secao-principal">
        <div class="envelope-caixa">
            <?php
                require 'config.php';

                $sql = 'SELECT postId, postTitle, postImageURL, CONCAT(substring(postBody, 1, 90), "...") as postBody FROM post;';
                $sql = $pdo->query($sql);

                if ($sql->rowCount() >= 3) {
                    $results = $sql->fetchAll();

                    echo '
                    <a href="postagem.php?id='.$results[0]['postId'].'" class="caixa-post-principal" id="post-destaque">
                        <img src="'.$results[0]['postImageURL'].'" alt="Uma moça jogando em seu computador.">
                        <h1 class="titulo-caixa-post-principal">'.$results[0]['postTitle'].'</h1>
                        <h3 class="subtitulo-caixa-post-principal">'.$results[0]['postBody'].'</h3>
                    </a>';
                    echo '
                    <a href="postagem.php?id='.$results[1]['postId'].'" class="caixa-post-principal post-secundario" id="post-secundario-topo">
                        <img src="'.$results[1]['postImageURL'].'" alt="Um dedo tracejando um grafico em crescimento exponencial">
                        <h1 class="titulo-caixa-post-principal">'.$results[1]['postTitle'].'</h1>
                        <h3 class="subtitulo-caixa-post-principal">'.$results[1]['postBody'].'</h3>
                    </a>';
                    echo '
                    <a href="postagem.php?id='.$results[2]['postId'].'" class="caixa-post-principal post-secundario" id="post-secundario-base">
                        <img src="'.$results[2]['postImageURL'].'" alt="Uma moça jogando em seu cumputador.">
                        <h1 class="titulo-caixa-post-principal">'.$results[2]['postTitle'].'</h1>
                        <h3 class="subtitulo-caixa-post-principal">'.$results[2]['postBody'].'</h3>
                    </a>';
                }
            ?>
        </div><!-- /ENVELOPE-CAIXA -->
    </section>

    <section class="envelope-secao" id="secao-post">
        <div class="envelope-post">

            <?php
                require 'config.php';
                
                $qtde = 6;
                if (isset($_GET['qtde'])) {
                    $qtde =  $_GET['qtde'];
                }

                $sql = 'SELECT postId, postTitle, postImageURL, CONCAT(substring(postBody, 1, 360)) as postBody, postCreatedAt FROM post limit '.$qtde.';';
                $sql = $pdo->query($sql);

                if ($sql->rowCount() > 0) {
                    foreach ($sql->fetchAll() as $post) {
                        echo '<a href="postagem.php?id='.$post['postId'].'" class="post-container">
                            <img id = "imagem-postagem" src="'.$post['postImageURL'].'" alt="">
                            <h3 id="titulo">'.$post['postTitle'].'</h3>
                            <p id="data">'.$post['postCreatedAt'].'</p>
                            <p id="texto">'.$post['postBody'].'</p>
                        </a>';
                    }
                }

                $qtde = $qtde + 3;
                echo '<a href="index.php?qtde='.$qtde.'" id="btn-ver-mais">VER MAIS</a>'
            ?>

        </div><!-- /envelope-post-->
       
        <div class="envelope-lateral">
            <div class="lateral">
                        <input type="search" placeholder="BUSCAR..." id="barra-de-busca">
                        <div id="categorias">
                            <h3 id="titulo">CATEGORIAS</h3>
                            <ul>
                                <?php
                                    require 'config.php';
    
                                    $sql = "select categoryId, categoryTitle, (select count(*) from post where post.categoryId = Category.categoryId) as qtde from Category order by qtde desc limit 7;";
                                    $sql = $pdo->query($sql);
    
                                    if($sql->rowCount() > 0) {
                                        foreach($sql->fetchAll() as $row) {
                                            echo "<li><a href='#".$row['categoryId']."'>".$row['categoryTitle']."</a></li>";
                                        }
                                    }
                                ?>
                            </ul>
                        </div><!-- /CATEGORIAS-->
                        <div id="posts-mais-lidos">
                        <h3 id="titulo">POSTS MAIS CURTIDOS</h3>
                        <ul>
                            <?php
                                require 'config.php';
    
                                $sql = "SELECT postTitle, postImageURL FROM post order by postLikeds desc limit 5;";
                                $sql = $pdo->query($sql);
    
                                if ($sql->rowCount() > 0) {
                                    foreach ($sql->fetchAll() as $post) {
                                        echo
                                        '<li>
                                            <img src="'.$post['postImageURL'].'" alt="'.$post['postTitle'].'">
                                            <a href="postagem.html">'.$post['postTitle'].'</a>
                                        </li>';
                                    }
                                }
                            ?>
                        </ul>
                    </div><!-- /POSTS-MAIS-LIDOS-->
                </div><!-- /LATERAL-->
        </div><!-- /ENVELOPE-LATERAL-->

    </section>
    <footer>
        <div class="envelope-rodape">
            <img src="./img/logo-footer.png" alt="">
            <div id="envelope-rodape-meio">
                <nav>
                    <ul>
                        <li><a href="#">Fale conosco</a></li>
                        <li><a href="#">Sobre nós</a></li>
                    </ul>
                </nav>
                <p>© 2024. Todos os direitos reservados ao WikiDev.<br>
                    Os materiais aqui encontrados não podem ser publicados, transmitidos, reescritos ou redistribuídos
                    sem autorização.</p>
            </div><!-- /ENVELOPE-RODAPE-meio-->
        </div><!-- /ENVELOPE-RODAPE-->
    </footer>
    <script src="script.js"></script>
</body>

</html>