USE test;

DROP TABLE IF EXISTS t_utilisateur_produit_favoris ;
DROP TABLE IF EXISTS t_utilisateur;
DROP TABLE IF EXISTS t_produit;

CREATE TABLE t_utilisateur
(
    id_utilisateur INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    u_nom VARCHAR(255) NOT NULL,
    u_login VARCHAR(255) NOT NULL,
    u_password VARCHAR(255)
);

CREATE TABLE t_produit
(
    id_produit INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    p_nom VARCHAR(255) NOT NULL,
    p_photo VARCHAR(255),
    p_text TEXT,
    p_prix INT
);

CREATE TABLE t_utilisateur_produit_favoris
(
    id_utilisateur INT NOT NULL,
    id_produit INT NOT NULL,
    PRIMARY KEY (id_utilisateur, id_produit)
);

ALTER TABLE t_utilisateur_produit_favoris
ADD CONSTRAINT fk_u1 FOREIGN KEY (id_utilisateur) REFERENCES t_utilisateur (id_utilisateur);

ALTER TABLE t_utilisateur_produit_favoris
ADD CONSTRAINT fk_p1 FOREIGN KEY (id_produit) REFERENCES t_produit (id_produit);

