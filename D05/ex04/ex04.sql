UPDATE db_tvisenti.ft_table
	SET date_de_creation = date_add(date_de_creation, interval 20 year)
	WHERE id > 5
	;
