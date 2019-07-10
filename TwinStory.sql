#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS TwinStory;
Use TwinStory;
#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        idUtilisateur Int  Auto_increment  NOT NULL ,
        nom           VARCHAR (45) NOT NULL ,
        email         Varchar (45) NOT NULL ,
        pseudo        Varchar (45) NOT NULL ,
        motDePasse      Varchar (45) NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (idUtilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Article
#------------------------------------------------------------

CREATE TABLE Article(
        idArticle Int  Auto_increment  NOT NULL ,
        titre     Varchar (10) NOT NULL ,
        contenu   Blob NOT NULL
	,CONSTRAINT Article_PK PRIMARY KEY (idArticle)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Image
#------------------------------------------------------------

CREATE TABLE Image(
        idImage   Int  Auto_increment  NOT NULL ,
        source    Varchar (45) NOT NULL ,
        alt       Varchar (45) NOT NULL ,
        legende   Varchar (45) NOT NULL ,
        idArticle Int NOT NULL
	,CONSTRAINT Image_PK PRIMARY KEY (idImage)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commentaire
#------------------------------------------------------------

CREATE TABLE Commentaire(
        idCommentaire Int  Auto_increment  NOT NULL ,
        texte         Blob NOT NULL ,
        idUtilisateur Int NOT NULL
	,CONSTRAINT Commentaire_PK PRIMARY KEY (idCommentaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Avis
#------------------------------------------------------------

CREATE TABLE Avis(
        idAvis        Int  Auto_increment  NOT NULL ,
        saisie        Blob NOT NULL ,
        date          Date NOT NULL ,
        idUtilisateur Int NOT NULL
	,CONSTRAINT Avis_PK PRIMARY KEY (idAvis)
	,CONSTRAINT Avis_Utilisateur_AK UNIQUE (idUtilisateur)
)ENGINE=InnoDB;


ALTER TABLE Image
ADD FOREIGN KEY (idArticle) REFERENCES Article(idArticle);

ALTER TABLE Avis
ADD FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur);

ALTER TABLE Commentaire
ADD FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur);