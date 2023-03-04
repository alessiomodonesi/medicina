create database medicina;
use medicina;

create table `user` ( 
	id int not null auto_increment primary key,
	name varchar(64) not null,
	surname varchar(64) not null,
	email varchar(128),
	password varchar(128)
 );

create table `privileges` ( 
	`user` int not null,
	name varchar(64) not null,
	foreign key (`user`) references `user`(id)
 );

insert into `user`(name, surname, email, password)
values
('Alessio', 'Modonesi', 'admin', 'admin'),
('Alessio', 'Modonesi', 'user', 'user');

insert into `privileges`(`user`, name)
values
('1', 'Admin'),
('2', 'User');

create table piano_di_studi(
codice varchar(6),
nome varchar(100),
cfu int, 
settore varchar(50),
n_settore int,
taf_ambito varchar(300),
ore_lezione int,
ore_laboratorio int, 
ore_tirocinio int,
tipo_insegnamento varchar(100), 
semestre int,
descrizione_semestre varchar(50),
anno1 int,
anno2 int
);

create table formativa_didattica (
 formativa varchar(6),
 didattica varchar(6)
);

alter table piano_di_studi add primary key (codice);
alter table formativa_didattica add constraint pk_formativa_didattica primary key (formativa,didattica);

alter table formativa_didattica 
add foreign key (formativa) references piano_di_studi(codice),
add foreign key (didattica) references piano_di_studi(codice);

select nome, taf_ambito, settore
from piano_di_studi pds
where taf_ambito like 'lingua%';

select substr(taf_ambito, 1, 4) from piano_di_studi pds;

select distinct substr(taf_ambito, 1, position("/" in taf_ambito)-1)
from piano_di_studi pds;
