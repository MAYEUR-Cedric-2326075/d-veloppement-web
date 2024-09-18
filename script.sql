create table rang(
    id_rang serial primary key, 
    intitule_rang VARCHAR2(20) 
);
create table grade(
    id_grade serial primary key, 
    intitule_grade VARCHAR2(20) 
);

create table titre(
    id_titre serial primary key, 
    intitule_titre VARCHAR2(20) 
);

create table dignite(
    id_dignite serial primary key, 
    intitule_dignite VARCHAR2(20) 
);
create table tenrac(
    code serial primary key, 
    nom VARCHAR2(30),
    couriel VARCHAR2(30),
    numero VARCHAR2(10),
    addresse VARCHAR2(50),
    id_rang int ,
    id_grade int not null, 
    id_titre int,
    id_dignite int,
    FOREIGN KEY (id_rang) REFERENCES rang(id_rang),
    FOREIGN KEY (id_grade) REFERENCES grade(id_grade),
    FOREIGN KEY (id_titre) REFERENCES titre(id_titre),
    FOREIGN KEY (id_dignite) REFERENCES dignite(id_dignite)
);

create table ingredien(
    id_ingredien serial primary key, 
    intitule_ingredien VARCHAR2(20) 
);
create table sauce(
    id_sauce serial primary key, 
    intitule_sauce VARCHAR2(20) 
);


create table plat(
    id_plat serial primary key,
    intitule_plat VARCHAR2(50) 
);

create table platsauce(
    id_sauce int,
    id_plat int,
    PRIMARY KEY (id_sauce, id_plat),
    FOREIGN KEY (id_sauce) REFERENCES sauce(id_sauce),
    FOREIGN KEY (id_plat) REFERENCES plat(id_plat)
);

create table platingredien(
    id_ingredien int,
    id_plat int,
    PRIMARY KEY (id_ingredien, id_plat),
    FOREIGN KEY (id_ingredien) REFERENCES ingredien(id_ingredien),
    FOREIGN KEY (id_plat) REFERENCES plat(id_plat)
);
create table dat(
    dat date primary key
);


create table repas(
    
    dat date,


);

