USE bubbles;

DROP PROCEDURE IF EXISTS ps_voir_utilisateurs_par_login;

DELIMITER #
CREATE PROCEDURE ps_voir_utilisateurs_par_login (IN p_login_mail VARCHAR(255))
BEGIN
    DECLARE l_critere_login_mail VARCHAR(255);
    SET l_critere_login_mail = CONCAT('%',p_login_mail, '%');

    SELECT login_mail, mot_de_passe, date_inscription, pseudonyme, pouvoir
    FROM t_utilisateur
    WHERE login_mail like l_critere_login_mail;
END#
DELIMITER ;
