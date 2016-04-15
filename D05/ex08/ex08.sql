SELECT nom, prenom, date_naissance as 'date de naissance' FROM db_tvisenti.fiche_personne
WHERE year(date_naissance) = 1989 ORDER BY nom ASC;
