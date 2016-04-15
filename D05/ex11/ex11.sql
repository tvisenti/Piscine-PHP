SELECT UPPER(db_tvisenti.fiche_personne.nom) AS 'NOM', db_tvisenti.fiche_personne.prenom, db_tvisenti.abonnement.prix
    FROM db_tvisenti.fiche_personne
    INNER JOIN membre ON db_tvisenti.fiche_personne.id_perso = db_tvisenti.membre.id_fiche_perso
    INNER JOIN abonnement ON db_tvisenti.membre.id_abo = db_tvisenti.abonnement.id_abo
    WHERE db_tvisenti.abonnement.prix > 42
    ORDER BY db_tvisenti.fiche_personne.nom, db_tvisenti.fiche_personne.prenom;
