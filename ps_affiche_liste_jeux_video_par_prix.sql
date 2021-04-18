USE test;

DROP PROCEDURE IF EXISTS ps_affiche_liste_jeux_video_par_prix;

DELIMITER #
CREATE PROCEDURE ps_affiche_liste_jeux_video_par_prix (IN p_prix_min INT, IN p_prix_max INT)
BEGIN
    DECLARE p_prix_min_modifie INT;
    DECLARE p_prix_max_modifie INT;

    IF (p_prix_min IS NULL) THEN 
        SET p_prix_min_modifie = 0;
    ELSE
        SET p_prix_min_modifie = p_prix_min;
    END IF;
    IF (p_prix_max IS NULL) THEN 
        SELECT * FROM jeux_video 
        WHERE prix >= p_prix_min_modifie
        ORDER BY nom ASC;
    ELSE
        SET p_prix_max_modifie = p_prix_max;
    END IF;
    
    IF (p_prix_max_modifie >= p_prix_min_modifie) THEN
        SELECT * FROM jeux_video 
        WHERE prix BETWEEN p_prix_min_modifie AND p_prix_max_modifie
        ORDER BY nom ASC;
    ELSE
        SELECT * FROM jeux_video 
        WHERE prix BETWEEN p_prix_max_modifie AND p_prix_min_modifie
        ORDER BY nom ASC;
    END IF;
END#
DELIMITER ;

