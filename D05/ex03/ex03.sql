INSERT INTO db_tvisenti.ft_table (login, groupe, date_de_creation)
	SELECT nom, 'other', date_naissance FROM db_tvisenti.fiche_personne
	WHERE nom
		LIKE '%a%'
		AND char_length(nom) < 9
	ORDER BY nom
	LIMIT 10
	;
