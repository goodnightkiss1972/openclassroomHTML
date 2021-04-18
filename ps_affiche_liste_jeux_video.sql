USE test;

DROP PROCEDURE IF EXISTS ps_affiche_liste_jeux_video;

DELIMITER #
CREATE PROCEDURE ps_affiche_liste_jeux_video ()
BEGIN
    SELECT * FROM jeux_video ORDER BY nom ASC;
END#
DELIMITER ;

