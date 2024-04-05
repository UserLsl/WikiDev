<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
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
                <li><a href="#" id="loginBtn">Entrar</a></li>
                <li><p>
                    <?php
                    session_start(); 
                    if (isset($_SESSION['nome'])) {
                        echo $_SESSION['nome'];
                    }
                    //unset( $_SESSION['palavra'] );
                    //session_destroy();
                    ?>
                </p></li>
            </ul>
        </nav>
    </header>
    <div class="overlay" id="overlay"></div><!-- /OVERLAY-->

    <div class="login-container" id="loginContainer">
        <form action="login.php" method="post" class="login-form">
            <h2>Acesse sua conta</h2>
            <input name="email" type="email" placeholder="E-mail de Usuário" required>
            <input name="senha" type="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div><!-- /LOGIN-CONTAINER-->

    <section class="section-wrapper" id="main-section">
        <div class="box-wrapper">
            <div class="box-post-main" id="featured-post">
                <img src="./img/realidade-digital.png" alt="Uma moça jogando em seu computador.">
                <h1 class="titulo-box-post-main">Realidade Digital</h1>
                <h3 class="subtitulo-box-post-main">No universo futurista de "Realidade Digital", mergulhe na imersão total da cibernética.</h3>
            </div><!-- /FEATURED-POST-->
            <div class="box-post-main secondary-post" id="secondary-post-top">
                <img src="./img/ascensao-mundial.png" alt="Um dedo tracejando um grafico em crescimento exponencial">
                <h1 class="titulo-box-post-main">Ascensão Mundial</h1>
                <h3 class="subtitulo-box-post-main">A humanidade em direção a novos patamares.</h3>
            </div><!-- /SECONDARY-POST-->
            <div class="box-post-main secondary-post" id="secondary-post-bottom">
                <img src="./img/alem-das-estrelas.png" alt="Uma moça jogando em seu cumputador.">
                <h1 class="titulo-box-post-main">Além das Estrelas</h1>
                <h3 class="subtitulo-box-post-main">As cores vibrantes e a aura mágica que envolvem o planeta.</h3>
            </div><!-- /SECONDARY-POST-->
        </div><!-- /BOX-WRAPPER-->
    </section><!-- /MAIN-SECTION-->
    
    <section class="section-wrapper" id="post-section">
        <div class="post-wrapper">
            <div class="post-container">
                <img src="./img/desenvolvimentoDeSoftware.jpg" alt="">
                <h3 id="title">A Arte do Desenvolvimento de Software</h3>
                <p id="date">23 Mar, 2024</p>
                <p id="text">Em "Construindo o Futuro: A Arte do Desenvolvimento de Software", explore os bastidores da criação das tecnologias que impulsionam o nosso mundo. Desde aplicativos móveis até sistemas complexos de back-end, cada linha de código é uma peça crucial na construção de um futuro digital vibrante.</p>
            </div><!-- /POST-CONTAINER-->
            <div class="post-container">
                <img src="./img/universoJavaScript.jpg" alt="">
                <h3 id="title">Explorando o Universo JavaScript</h3>
                <p id="date">23 Mar, 2024</p>
                <p id="text">Adentre o vasto universo da linguagem JavaScript, onde a fronteira entre web e software é desafiada e redefinida. Neste espaço dedicado ao JavaScript, mergulhe em tutoriais práticos, dicas de codificação eficaz e descobertas sobre as mais recentes inovações. </p>
            </div><!-- /POST-CONTAINER-->
            <div class="post-container">
                <img src="./img/construindoComDados.jpg" alt="">
                <h3 id="title">Construindo com Dados</h3>
                <p id="date">23 Mar, 2024</p>
                <p id="text">Dê as boas-vindas ao emocionante mundo dos bancos de dados, onde os dados se transformam em insights e a informação é o motor da inovação. Em "Construindo com Dados", mergulhe em tutoriais práticos, estratégias de otimização e tendências emergentes que moldam o cenário dos bancos de dados modernos. </p>
            </div><!-- /POST-CONTAINER-->
            <div class="post-container">
                <img src="./img/desvendandoANuvem.jpg" alt="">
                <h3 id="title">Desvendando a Nuvem</h3>
                <p id="date">23 Mar, 2024</p>
                <p id="text">Em "Desvendando a Nuvem", mergulhe nas camadas do armazenamento digital em nuvem, onde a praticidade encontra a segurança. Explore guias práticos, dicas de otimização e estratégias de backup para dominar o uso eficaz da nuvem. </p>
            </div><!-- /POST-CONTAINER-->
            <div class="post-container">
                <img src="./img/mundoDaProgramacao.jpg" alt="">
                <h3 id="title">Explorando o mundo da programação</h3>
                <p id="date">23 Mar, 2024</p>
                <p id="text">Dê os primeiros passos ou avance para o próximo nível com "Codificação em Ação". Neste espaço dinâmico, oferecemos recursos valiosos para todos os programadores, desde iniciantes até veteranos. Descubra tutoriais passo a passo, dicas úteis, entrevistas com especialistas e muito mais.</p>
            </div><!-- /POST-CONTAINER-->
            <div class="post-container">
                <img src="./img/BancoDeDados.jpg" alt="">
                <h3 id="title">Banco de Dados</h3>
                <p id="date">23 Mar, 2024</p>
                <p id="text">Dê as boas-vindas ao emocionante mundo dos bancos de dados, onde os dados se transformam em insights e a informação é o motor da inovação. Em "Construindo com Dados", mergulhe em tutoriais práticos, estratégias de otimização e tendências emergentes que moldam o cenário dos bancos de dados modernos.</p>
            </div><!-- /POST-CONTAINER-->
        </div><!-- /POST-WRAPPER-->
        <div class="aside">
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
                        <img src="/img/desenvolvimentoDeSoftware.jpg" alt="">
                        <a href="#">A Arte do Desenvolvimento de Software</a>
                    </li>
                    <li>
                        <img src="/img/universoJavaScript.jpg" alt="">
                        <a href="#">Explorando o Universo JavaScript</a>
                    </li>
                    <li>
                        <img src="/img/construindoComDados.jpg" alt="">
                        <a href="#">Construindo com Dados</a>
                    </li>
                    <li>
                        <img src="/img/desvendandoANuvem.jpg" alt="">
                        <a href="#">Desvendando a Nuvem</a>
                    </li>
                    <li>
                        <img src="/img/mundoDaProgramacao.jpg" alt="">
                        <a href="#">Explorando o Mundo da Programação</a>
                    </li>
                </ul>
            </div><!-- /POSTS-MAIS-LIDOS-->
        </div><!-- /ASIDE-->
    </section>

    <script src="script.js"></script>
</body>
</html>