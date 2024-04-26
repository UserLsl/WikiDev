create database Wikidev;

use Wikidev;

create table User (
    userId int primary key auto_increment,
    userName varchar(50) not null,
    userEmail varchar(50) not null,
    userPassword varchar(32) not null
);

create table Category (
    categoryId int primary key auto_increment,
    categoryTitle varchar(50) not null
);

create table Tag (
    tagId int primary key auto_increment,
    tagName varchar(50) not null
);

create table Post (
    postId int primary key auto_increment,
    postTitle varchar(50) not null,
    postBody text not null,
    postImageURL text null,
    postLikeds int not null,
    postShareds int not null,
    postCreatedAt datetime not null,
    categoryId int not null,
    userId int not null,
    FOREIGN KEY (categoryId) REFERENCES Category(categoryId),
    FOREIGN KEY (userId) REFERENCES User(userId)
);

create table Post_Tag (
    tagId int not null,
    postId int not null,
    FOREIGN KEY (tagId) REFERENCES Tag(tagId),
    FOREIGN KEY (postId) REFERENCES Post(postId)
);

insert into Category set categoryTitle = 'Banco de Dados'

insert into User (
    userName, 
    userEmail, 
    userPassword 
) select 
    'Lucas',
    userEmail,
    userPassword
from User where userId = 1

update User set userEmail = 'lucas@google.com' where userId = 2

delete from User where userId = 2

select * from Category where categoryTitle like 'B%'

select SUBSTRING(categoryTitle, 1, 2) from Category

select COUNT(*) from Category

select * from Category order by categoryTitle desc 

-- criando categorias
insert into category set categoryTitle = "Desenvolvimento Web";
insert into category set categoryTitle = "Desenvolvimento Mobile";
insert into category set categoryTitle = "Desenvolvimento Desktop";
insert into category set categoryTitle = "Interação Humano-Computador";
insert into category set categoryTitle = "Testes Automatizados";
insert into category set categoryTitle = "Banco de Dados";
insert into category set categoryTitle = "Estrutura de Dados";
insert into category set categoryTitle = "Bibliotecas";
insert into category set categoryTitle = "Sistemas de Versionamento";
insert into category set categoryTitle = "Governança em TI";

--- criando tags
insert into tag set tagName = "PHP";
insert into tag set tagName = "Javascript";
insert into tag set tagName = "CSS";
insert into tag set tagName = "HTML";
insert into tag set tagName = "MYSQL";
insert into tag set tagName = "GIT";
insert into tag set tagName = "GITHUB";
insert into tag set tagName = "Responsividade";

-- criando posts (obs.: Mudar tipo do campo postBody e postImageURL para text)
insert into post set postBody = "<h4><strong>teste</strong> dakdasdsadsdjaskfjdd</h4></br><p>lorend dksajdaskdj djfkd</p>", postCreatedAt = Now(), categoryId = 1, postImageURL = null, postLikeds = 0, postShareds = 0, postTitle = "Post Teste", userId = 1;

update post set postBody = '<p>Em "Construindo o Futuro: A Arte do Desenvolvimento de Software", explore os bastidores da criação das tecnologias que impulsionam o nosso mundo. Desde aplicativos móveis até sistemas complexos de back-end, cada linha de código é uma peça crucial na construção de um futuro digital vibrante.</p>', postCreatedAt = Now(), categoryId = 1, postImageURL = "https://pronep.s3.amazonaws.com/wp-content/uploads/2022/10/14235834/tecnologia-medicina-2.png", postLikeds = 0, postShareds = 0, postTitle = "A Arte do Desenvolvimento de Software", userId = 1 where postId = 1;

insert into post set postBody = "<p>Adentre o vasto universo da linguagem JavaScript, onde a fronteira entre web e software é desafiada e redefinida. Neste espaço dedicado ao JavaScript, mergulhe em tutoriais práticos, dicas de codificação eficaz e descobertas sobre as mais recentes inovações.</p>", postCreatedAt = Now(), categoryId = 1, postImageURL = "https://images.idgesg.net/images/article/2023/04/shutterstock_1361674454-100939444-large.jpg?auto=webp&quality=85,70", postLikeds = 0, postShareds = 0, postTitle = "Explorando o Universo JavaScript", userId = 1;

insert into post set postBody = '<p>Dê as boas-vindas ao emocionante mundo dos bancos de dados, onde os dados se transformam em insights e a informação é o motor da inovação. Em "Construindo com Dados", mergulhe em tutoriais práticos, estratégias de otimização e tendências emergentes que moldam o cenário dos bancos de dados modernos.</p>', postCreatedAt = Now(), categoryId = 6, postImageURL = "https://media.oralhealthgroup.com/uploads/2023/05/iStock-1407863764-1024x576.jpg", postLikeds = 3, postShareds = 1, postTitle = "Construindo com Dados", userId = 1;

insert into post set postBody = '<p>Em "Desvendando a Nuvem", mergulhe nas camadas do armazenamento digital em nuvem, onde a praticidade encontra a segurança. Explore guias práticos, dicas de otimização e estratégias de backup para dominar o uso eficaz da nuvem.</p>', postCreatedAt = Now(), categoryId = 10, postImageURL = "https://www.softvilmedia.com/wp-content/uploads/2023/12/Cloud-based-Testing.jpg", postLikeds = 1, postShareds = 0, postTitle = "Desvendando a Nuvem", userId = 1;

insert into post set postBody = '<p>Dê os primeiros passos ou avance para o próximo nível com "Codificação em Ação". Neste espaço dinâmico, oferecemos recursos valiosos para todos os programadores, desde iniciantes até veteranos. Descubra tutoriais passo a passo, dicas úteis, entrevistas com especialistas e muito mais.</p>', postCreatedAt = Now(), categoryId = 3, postImageURL = "https://th.bing.com/th/id/OIP.NEF4ttFT4ZTucR-JjWgtqAHaE8?w=768&h=512&rs=1&pid=ImgDetMain", postLikeds = 5, postShareds = 9, postTitle = "Explorando o mundo da programação", userId = 1;

insert into post set postBody = '<p>Dê as boas-vindas ao emocionante mundo dos bancos de dados, onde os dados se transformam em insights e a informação é o motor da inovação. Em "Construindo com Dados", mergulhe em tutoriais práticos, estratégias de otimização e tendências emergentes que moldam o cenário dos bancos de dados modernos.</p>', postCreatedAt = Now(), categoryId = 6, postImageURL = "https://networkassured.com/wp-content/uploads/2022/08/pci-compliance-logging-1024x683.jpg", postLikeds = 7, postShareds = 4, postTitle = "Banco de Dados Oracle", userId = 1;

insert into post set postBody = '<p>No universo futurista de "Realidade Digital", mergulhe na imersão total da cibernética.</p>"', postCreatedAt = Now(), categoryId = 10, postImageURL = "https://catracalivre.com.br/wp-content/uploads/2023/09/istock-1393796813-910x607.jpg", postLikeds = 0, postShareds = 3, postTitle = "Realidade Digital", userId = 1;

insert into post set postBody = "<p>A humanidade em direção a novos patamares.</p>", postCreatedAt = Now(), categoryId = 10, postImageURL = "https://th.bing.com/th/id/OIP.84XUFmwmGS-fwIuZs83gXgHaD0?w=1077&h=555&rs=1&pid=ImgDetMain", postLikeds = 1, postShareds = 2, postTitle = "Ascensão Mundial", userId = 1;

insert into post set postBody = "<p>As cores vibrantes e a aura mágica que envolvem o planeta.</p>", postCreatedAt = Now(), categoryId = 4, postImageURL = "https://th.bing.com/th/id/OIP.L0Ev4Zl_IEeSNxhVeYT88gHaDs?w=723&h=360&rs=1&pid=ImgDetMain", postLikeds = 0, postShareds = 0, postTitle = "Além das Estrelas", userId = 1;



select categoryId, categoryTitle, (select count(*) from post where post.categoryId = Category.categoryId) as qtde from Category order by qtde desc limit 7;

SELECT postTitle, postImageURL FROM post order by postLikeds desc limit 5;

SELECT postTitle, postImageURL, CONCAT(substring(postBody, 50), '...') as postBody FROM post order by postCreatedAt desc limit 3;

create view vw_new_posts AS
SELECT postId, postTitle, postImageURL, CONCAT(substring(postBody, 50), '...') as postBody FROM post order by postCreatedAt desc limit 3;

select * from post where postId not in (select postId from vw_new_posts);