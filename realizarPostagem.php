<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c84d6546c9.js" crossorigin="anonymous"></script>
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#myTextarea',
            placeholder: 'Digite o corpo do post...',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                'code', 'fullscreen', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        });
    </script>
    <link rel="stylesheet" href="realizarPostagem.css">
    <title>WikiDev</title>
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
        <?php
        session_start();
        if (isset($_SESSION['nome'])) {
            echo "<ul class='dropdown'>
                    <li><a class='nome-usuario' href='#'>". $_SESSION['nome'] ."<i class='fa-solid fa-angle-down'></i></a>
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
    
    <section id="secao-realizar-postagem">
        <div id="envelope-secao-realizar-postagem">
            <h1>Realizar Postagem</h1>
            <hr>
            <p><i>Preencha todos os campos do formulário com os dados da postagem!</i></p>

            <div id="envelope-formulario">
                <form id="form-realizar-postagem" action="post.php" method="post">
                    <label id="label-titulo-postagem" for="titulo-postagem">Titulo da postagem:</label>
                    <input name="titulo" type="text" id="input-titulo-postagem" placeholder="Digite o titulo do post..." required>
    
                    <label for="corpo-postagem">Corpo da postagem:</label>
                    <textarea name="conteudo" id="myTextarea"></textarea>
    
                    <label for="categoria-postagem">Categoria da postagem:</label>
                    <select name="categoria" id="input-categoria-postagem" required>
                        <?php
                            require 'config.php';

                            $sql = 'SELECT categoryId, categoryTitle FROM category;';
                            $sql = $pdo->query($sql);

                            foreach ($sql->fetchAll() as $category) {
                                echo "<option value='".$category['categoryId']."'>".$category['categoryTitle']."</option>";
                            }
                        ?>
                    </select>
    
                    <label for="imagem-postagem">Imagem da postagem:</label>
                    <input name="imagem" type="url" placeholder="Digite o url da imagem do post..." required>

                    <label for="caixa-input-checkbox">Tags da postagem:</label>
                    <div class="caixa-input-checkbox">
                        <?php
                            require 'config.php';

                            $sql = 'SELECT tagId, tagName FROM tag;';
                            $sql = $pdo->query($sql);

                            foreach ($sql->fetchAll() as $tag) {
                                echo "<div class='item-checkbox'>";
                                echo "<input type='checkbox' name='tags[]' value='".$tag['tagId']."'>";
                                echo "<label>".$tag['tagName']."</label>";
                                echo "</div>";
                            }
                        ?>
                    </div>

                    <button id="btn-formulario" type="submit">Enviar Formulário</button>
                </form>
            </div><!-- /ENVELOPE-FORMULARIO-->
        </div><!-- /ENVELOPE-SECAO-REALIZAR-POSTAGEM-->
        <div class="lateral">
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