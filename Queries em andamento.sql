SELECT
	  e.id as id_evento
	, p.fk_id_venda as id_venda
	, v.name
	, COUNT(p.status) AS 'Total de parcelas'
	, CASE WHEN p.status = 'A' THEN COUNT(p.status) ELSE 0 END AS 'Em aberto'
    , CASE WHEN p.status = 'F' THEN COUNT(p.status) ELSE 0 END AS 'Fechadas'
    , CASE WHEN p.status = 'F' THEN COUNT(p.status) ELSE 0 END AS 'Atrasadas'
    -- dt_vencimento_parcela 
    -- Elaborar forma de setar que a parcela está em atraso
    
    
FROM 
	parcelas AS p

INNER JOIN
	compras AS c
    ON c.id = p.fk_id_venda

INNER JOIN
	eventos AS e
    ON e.id = c.fk_id_evento

INNER JOIN 
	viagems AS v
    ON v.id = e.fk_id_viagem
    
WHERE
	
    EXTRACT(MONTH FROM p.dt_vencimento_parcela) = 9
GROUP BY
	p.status