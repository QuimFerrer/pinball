/*ELS MEUS TORNEIGS. consultar torneigs apuntants amb:
		1. PUNTUACIONS. informació del ranking, posició i punts dins del ranking
 */
 
select i.* from inscrit as i left join torneig as t on (i._01_pk_idTornInsc = t._01_pk_idTorn and i._02_pk_idJocInsc = t._02_pk_idJocTorn)
where i._03_pk_idJugInsc = "4";