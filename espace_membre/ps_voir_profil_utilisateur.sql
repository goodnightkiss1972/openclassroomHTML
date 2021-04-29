USE bubbles;

DROP PROCEDURE IF EXISTS ps_voir_profil_utilisateur;

DELIMITER #
CREATE PROCEDURE ps_voir_profil_utilisateur (IN p_login_mail VARCHAR(255))
BEGIN
    SELECT login_mail, mot_de_passe, date_inscription, pseudonyme, pouvoir
    FROM t_utilisateur
    WHERE login_mail = p_login_mail;
END#
DELIMITER ;
