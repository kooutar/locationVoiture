create database Drive;
use Drive;
create table role(
   idrole int primary key NOT NULL AUTO_INCREMENT,
  titre  varchar(255) 
);
insert into role(titre) value('client');
insert into role(titre) value('admin');

create table utilisateur(
    iduser int primary key NOT NULL AUTO_INCREMENT,
    nom varchar(20) NOT NULL,
    Email varchar(20) not NULL unique,
    telephone varchar(20) not null ,
    date_Naissance date ,
    gender Enum('male','Femme'),
    password varchar(255) not null,
    idrole int not NULL,
    foreign key(idrole) references role(idrole)
); 
-- INSERT utilisateur(nom,Email,telephone,date_Naissance,gender,password,idrole) values();
 create table categorie(
    idCategorie int primary key NOT NULL AUTO_INCREMENT,
    nom varchar(100) not NUll Unique
 );
 create table vehicule(
    idVehicule int primary key NOT NULL AUTO_INCREMENT,
    idCategorie int NOT NULL NOT NULL,
     prix decimal(10,2) not NULL,
     disponsible bool default false,
     path_image varchar(255) NOT NULL,
     lieu varchar(50) NOT NULL,
     foreign key (idCategorie) references categorie(idCategorie)
 );

 create table reservation(
    date_debut date not null,
    date_fin  date NOT NULL,
   status ENUM('en attente','accepte','refuse') default 'en attente',
    iduser int not NULL,
    idVehicule int NOT NULL,
    foreign key (iduser) references utilisateur(iduser),
    foreign key (idVehicule) references vehicule(idVehicule),
    primary key (iduser,idVehicule)
 );

CREATE TABLE avis (
    idAvis INT AUTO_INCREMENT PRIMARY KEY,
    commentaire TEXT NOT NULL,
    note INT CHECK (note BETWEEN 1 AND 5), 
    iduser INT NOT NULL,
    idVehicule INT NOT NULL,
    FOREIGN KEY (iduser, idVehicule) REFERENCES reservation(iduser, idVehicule)
);

ALTER TABLE utilisateur MODIFY Email VARCHAR(255) NOT NULL;

