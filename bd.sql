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
    postBody varchar(50) not null,
    postImageURL varchar(50) not null,
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