<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c84d6546c9.js" crossorigin="anonymous"></script>
    <script lang="Javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="postagem.css">
    <title>WikiDev</title>
    <script>
        $(document).ready(function () {
            var href = window.location.href;

            if (href.substr(href.length - 5) == '#like') {
                document.getElementById('icone-like').classList.replace('fa-regular', 'fa-solid');
                document.getElementById('icone-like').style.color = '#2d44a0';
                document.getElementById('like').href = "#like";
            }
        });
    </script>
</head>

<body>
    <header>
        <img id="logo-header" src="./img/logo-header.png" alt="Logo WikiDev">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
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
                    <li><a class='nome-usuario' href='#'>" . $_SESSION['nome'] . "<i class='fa-solid fa-angle-down'></i></a>
                        <ul>
                            <li><a href='realizarPostagem.html'>Realizar Postagem</a></li>
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

    <section class="envelope-secao" id="secao-post">
        <div class="envelope-post">
            <?php
            require 'config.php';
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }

            $sql = 'SELECT *, user.UserName FROM post INNER JOIN user on user.userId = post.userId WHERE postId = ' . $id . ';';
            $sql = $pdo->query($sql);

            if ($sql->rowCount() > 0) {
                $post = $sql->fetchAll();
                echo '<h1 id="titulo-post">' . $post[0]['postTitle'] . '</h1>';
                echo '<hr>';
                echo '<div id="author-data-wrapper">
                            <p id="author-post">' . $post[0]['UserName'] . '</p>
                            <p id="data-post">' . $post[0]['postCreatedAt'] . '</p>
                        </div>';
                echo '<img src="' . $post[0]['postImageURL'] . '" alt="">';
                echo '<div id=texto>' . $post[0]['postBody'] . '</div>';
                echo '<a href="like.php?postId=' . $post[0]['postId'] . '" id="like"> Curtir: <i id="icone-like" class="fa-regular fa-heart">' . $post[0]['postLikeds'] . '</i></a>';
            }
            ?>

        </div><!-- /envelope-post-->
        <div class="lateral">
            <form action="pesquisar.php" method="post" id="caixa-pesquisa">
                <?php
                if (isset($_SESSION['pesquisa'])) {
                    echo "<input name='pesquisar' type='search' value='" . $_SESSION['pesquisa'] . "' id='barra-de-busca'>";
                } else {
                    echo "<input name='pesquisar' type='search' placeholder='BUSCAR...' id='barra-de-busca'>";
                }
                ?>

                <button type="submit" id="btn-caixa-pesquisa"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div id="categorias">
                <h3 id="titulo">CATEGORIAS</h3>
                <ul>
                    <?php
                    require 'config.php';

                    $sql = "select categoryId, categoryTitle, (select count(*) from post where post.categoryId = Category.categoryId) as qtde from Category order by qtde desc limit 7;";
                    $sql = $pdo->query($sql);

                    if ($sql->rowCount() > 0) {
                        foreach ($sql->fetchAll() as $row) {
                            echo "<li><a href='#" . $row['categoryId'] . "'>" . $row['categoryTitle'] . "</a></li>";
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
                                            <img src="' . $post['postImageURL'] . '" alt="' . $post['postTitle'] . '">
                                            <a href="postagem.html">' . $post['postTitle'] . '</a>
                                        </li>';
                        }
                    }
                    ?>
                </ul>
            </div><!-- /POSTS-MAIS-LIDOS-->
        </div><!-- /LATERAL-->
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
            </div><!-- /ENVELOPE-RODAPE-MEIO-->
        </div><!-- /ENVELOPE-RODAPE-->
    </footer>
    <script src="script.js"></script>
</body>

</html>