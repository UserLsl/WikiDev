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
        $(document).ready(function() { 
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
                <li><a href="testeindex.html">Home</a></li>
                <li><a href="#">Dicas</a></li>
                <li><a href="#">Tutoriais</a></li>
                <li><a href="#">Projetos e Desafios</a></li>
                <li><a href="#">Recursos</a></li>
            </ul>
        </nav>
        <button id="login-btn">
            <i class="fa fa-user"></i>Entrar</a>
        </button>
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
                    $id =  $_GET['id'];
                }

                $sql = 'SELECT *, user.UserName FROM post INNER JOIN user on user.userId = post.userId WHERE postId = '.$id.';';
                $sql = $pdo->query($sql);

                if ($sql->rowCount() > 0) {
                    $post = $sql->fetchAll();
                    echo '<h1 id="titulo-post">'.$post[0]['postTitle'].'</h1>';
                    echo '<hr>';
                    echo '<div id="author-data-wrapper">
                            <p id="author-post">'.$post[0]['UserName'].'</p>
                            <p id="data-post">'.$post[0]['postCreatedAt'].'</p>
                        </div>';
                    echo '<img src="'.$post[0]['postImageURL'].'" alt="">';
                    echo '<p id="texto">'.$post[0]['postBody'].'</p>';
                    echo '<a href="like.php?postId='.$post[0]['postId'].'" id="like"> Curtir: <i id="icone-like" class="fa-regular fa-heart">'.$post[0]['postLikeds'].'</i></a>';
                }
            ?>
                
        </div><!-- /envelope-post-->
        <div class="lateral">
            <input type="search" placeholder="BUSCAR..." id="barra-de-busca">
            <div id="categorias">
                <h3 id="titulo">CATEGORIAS</h3>
                <ul>
                    <li><a href="#">Desenvolvimento Web</a></li>
                    <li><a href="#">Linguagens de Programação</a></li>
                    <li><a href="#">Desenvolvimento Backend</a></li>
                    <li><a href="#">Desenvolvimento FrontEnd</a></li>
                    <li><a href="#">FrameWork.net</a></li>
                    <li><a href="#">JavaScript</a></li>
                    <li><a href="#">Banco de Dados</a></li>
                </ul>
            </div><!-- /CATEGORIAS-->
            <div id="posts-mais-lidos">
                <h3 id="titulo">POSTS MAIS LIDOS</h3>
                <ul>
                    <li>
                        <img src="./img/desenvolvimentoDeSoftware.jpg" alt="">
                        <a href="#">A Arte do Desenvolvimento de Software</a>
                    </li>
                    <li>
                        <img src="./img/universoJavaScript.jpg" alt="">
                        <a href="#">Explorando o Universo JavaScript</a>
                    </li>
                    <li>
                        <img src="./img/construindoComDados.jpg" alt="">
                        <a href="#">Construindo com Dados</a>
                    </li>
                    <li>
                        <img src="./img/desvendandoANuvem.jpg" alt="">
                        <a href="#">Desvendando a Nuvem</a>
                    </li>
                    <li>
                        <img src="./img/mundoDaProgramacao.jpg" alt="">
                        <a href="#">Explorando o Mundo da Programação</a>
                    </li>
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
                    Os materiais aqui encontrados não podem ser publicados, transmitidos, reescritos ou redistribuídos sem autorização.</p>
            </div><!-- /ENVELOPE-RODAPE-MEIO-->
        </div><!-- /ENVELOPE-RODAPE-->
    </footer>
    <script src="script.js"></script>
</body>
</html>