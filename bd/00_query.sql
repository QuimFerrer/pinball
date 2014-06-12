select @rn:=@rn+1 as ‘recid’, j.* from jugador as j, (SELECT @rn:=0) rr;

select  01_pk_idJug,01_pk_idTornInsc,03_nomTorn,02_pk_idJocInsc from jugador
left join inscrit on 01_pk_idJug = 03_pk_idJugInsc
inner join torneig on (01_pk_idTorn = 01_pk_idTornInsc and 02_pk_idJocTorn = 02_pk_idJocInsc )
where 01_pk_idJug=2;

select  01_pk_idJug,02_nomUsuari,01_pk_idTornInsc,03_nomTorn,02_pk_idJocInsc from usuari,jugador
left join inscrit on 01_pk_idJug = 03_pk_idJugInsc
inner join torneig on (01_pk_idTorn = 01_pk_idTornInsc and 02_pk_idJocTorn = 02_pk_idJocInsc )
inner join joc on 02_pk_idJocTorn = 01_pk_idJoc
where 01_pk_idJug=2 group by 02_pk_idJocTorn;

select  01_pk_idJug,02_nomUsuari,01_pk_idTornInsc,03_nomTorn,02_pk_idJocInsc from usuari,joc,jugador
left join inscrit on 01_pk_idJug = 03_pk_idJugInsc
inner join torneig on (01_pk_idTorn = 01_pk_idTornInsc and 02_pk_idJocTorn = 02_pk_idJocInsc )
where 01_pk_idJug=2 and 02_pk_idJocTorn = 01_pk_idJoc;
