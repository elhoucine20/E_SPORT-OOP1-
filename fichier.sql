CREATE TABLE club (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE,
    ville VARCHAR(255) NOT null UNIQUE,
    club_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Tournoi (
    id INT PRIMARY KEY AUTO_INCREMENT,
    Titre VARCHAR(255) ,
    montant VARCHAR(255) NOT null UNIQUE,
    format  VARCHAR(255),
    date DATETIME not null
);

CREATE TABLE equipes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE,
    jeu VARCHAR(255) NOT null,
    club_id INT,
    FOREIGN KEY (club_id) REFERENCES club(id)
);

CREATE TABLE Joueur(
    id INT PRIMARY KEY AUTO_INCREMENT,
    Pseudo VARCHAR(255) UNIQUE ,
    role VARCHAR(255) NOT null ,
    salaire INT NOT null,
    equip_id INT,
    FOREIGN KEY (equip_id) REFERENCES equipes(id)
);



CREATE TABLE Sponsor(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE,
    Contribution  decimal not null,
    tournoi_id INT,
    FOREIGN KEY (tournoi_id) REFERENCES Tournoi(id)
);

CREATE TABLE Matchs( 
    id INT PRIMARY KEY AUTO_INCREMENT, 
    equip_A VARCHAR(255), 
    equip_B VARCHAR(255), 
    Score_A INT NOT null, 
    Score_B INT NOT null , 
    tournoi_id INT, 
    winer INT, 
    FOREIGN KEY (equip_A) REFERENCES equipes(name), 
    FOREIGN KEY (equip_B) REFERENCES equipes(name), 
    FOREIGN KEY (tournoi_id) REFERENCES Tournoi(id) 
    );
