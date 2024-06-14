create table eval2;

\c eval2

-- /////////////////////////////////////// TABLE /////////////////////////////////////////////////
create sequence seqcourse increment by 1;
create table course (
    id varchar(50) primary key,
    nom varchar(50)
);
create sequence seqEtape increment by 1;
create table etape (
  id varchar(50)  primary key,
  nom varchar(50),
  longueur numeric(10,2),
  nombreCoureur int,
  rang int,
  etat int,
  course varchar(50) references course(id),
  debut datetime
);

--table equipe mitambatra am users admin samihafa fotsiny ny url any 

create table genre(
    id serial primary key,
    genre varchar(50)
);

create sequence seqCoureur increment by 1;
create table coureur(
    id varchar(50) primary key,
    nom varchar(50),
    numeros int,
    genre int references genre(id),
    dtn date,
    equipe int references users(id)
); 


create sequence seqCategorie increment by 1;
create table categorie (
    id varchar(50) primary key,
    nom varchar(50)
);

create table categorieCoureur(
    id serial,
    coureur varchar(50) references coureur(id),
    categorie varchar(50) references categorie(id)
);


create table etapeCoureur(
    id serial primary key,
    etape varchar(50) references etape(id),
    coureur varchar(50) references coureur(id)
);

create table chrono(
    id serial primary key,
    coureur varchar(50) references coureur(id),
    etape varchar(50) references etape(id),
    depart timestamp,
    arriver timestamp
);

create table points(
    id serial primary key,
    rang int,
    valeur numeric(10,2)
);

create table resultat(
    etape_rang int,
    numero_dossar int,
    nom varchar(50),
    genre varchar(50),
    date_naissance date,
    equipe varchar(50),
    arriver timestamp
);

-- create table EtapeImport(
--     etape varchar(50),
--     longueur numeric(10,2),
--     nb_coureur int,
--     rang int,
--     date_depart date,
--     heure_depart time
-- );


-- create table resultatCoureur(
--     id serial,
--     coureur varchar(50) references coureur(id),
--     etape varchar(50) references etape(id),

-- );
create table penalite (
    id serial,
    equipe int references users(id),
    etape varchar(50) references etape(id),
    penalite time
);
-- /////////////////////////////////////// TABLE /////////////////////////////////////////////////

-- /////////////////////////////////////// INSERTION /////////////////////////////////////////////////

ALTER TABLE coureur
ADD CONSTRAINT unique_numeros UNIQUE (numeros);



INSERT INTO etape (id, nom, longueur, nombreCoureur, rang, etat, course, debut) VALUES 
('etape_' || nextval('seqEtape'), 'Ilafy', 4.44, 2, 4, 1, 'COURS001', '2024-06-02 11:00:00'),
('etape_' || nextval('seqEtape'), 'Betsirazaina', 8.6, 1, 1, 1, 'COURS001', '2024-06-01 09:00:00'),
('etape_' || nextval('seqEtape'), 'Analamahitsy', 11.03, 2, 6, 1, 'COURS001', '2024-06-02 15:10:00'),
('etape_' || nextval('seqEtape'), 'Ampasimbe', 18.21, 2, 2, 1, 'COURS001', '2024-06-01 13:15:00'),
('etape_' || nextval('seqEtape'), 'Ambatobe', 13.09, 3, 3, 1, 'COURS001', '2024-06-01 23:35:00'),
('etape_' || nextval('seqEtape'), 'Ambatokely', 22.89, 2, 5, 1, 'COURS001', '2024-06-02 12:05:00');


insert into genre(genre) values ('Homme'),('Femme');
insert into categorie(id,nom) values ('CTG001','Junior'), ('CTG002','Senior');
insert into points(rang,valeur) values (1,10),(2,6),(3,4),(4,2),(5,1);
insert into categorie(id,nom) values ('CTG001','Junior'), ('CTG002','Senior');
insert into categorieCoureur(coureur, categorie) values('COUR001','CTG002'),('COUR002','CTG002'),('COUR003','CTG001'),('COUR004','CTG002'),('COUR005','CTG002'),('COUR006','CTG002');

--insert coureur
INSERT INTO coureur (id, nom, numeros, genre, dtn, equipe)
SELECT 
    'COUR' || LPAD(nextval('seqCoureur')::text, 3, '0') AS id,
    r.nom,
    r.numero_dossar,
    CASE
        WHEN r.genre = 'H' THEN (SELECT id FROM genre WHERE genre = 'Homme')
        WHEN r.genre = 'F' THEN (SELECT id FROM genre WHERE genre = 'Femme')
        ELSE NULL
    END AS genre,
    r.date_naissance,
    (SELECT id FROM users WHERE name = r.equipe) AS equipe
FROM 
    resultat r;

--insert categorieCoureur
INSERT INTO categorieCoureur (coureur, categorie)
SELECT 
    c.id AS coureur,
    CASE
        WHEN EXTRACT(YEAR FROM AGE(c.dtn)) > 18 THEN 'CTG002'
        ELSE 'CTG001'
    END AS categorie
FROM 
    coureur c;

--insertion des etapes coureurs 
INSERT INTO etapeCoureur (etape, coureur)
SELECT 
    e.id AS etape,
    c.id AS coureur
FROM 
    resultat r
JOIN 
    coureur c ON r.numero_dossar = c.numeros
JOIN 
    etape e ON r.etape_rang = e.rang;

--insertion chrono
INSERT INTO chrono (coureur, etape, depart, arriver)
SELECT 
    c.id AS coureur,
    e.id AS etape,
    e.debut AS depart,
    r.arriver
FROM 
    resultat r
JOIN 
    coureur c ON r.numero_dossar = c.numeros
JOIN 
    etape e ON r.etape_rang = e.rang;

--verification des resultats si
 select equipe_nom, sum(points) from classement_points_etape_coureur group by equipe_nom;
select (select nom from etape where id = etape), sum(points) from classement_points_etape_coureur  where equipe = 6 group by etape;

-- /////////////////////////////////////// INSERTION /////////////////////////////////////////////////

-- /////////////////////////////////////// VIERW & FONCTION /////////////////////////////////////////////////
create or replace view classement_equipe_coureur AS 
    SELECT
        coureur_id,
        coureur_nom,
        equipe_nom,
        temps_total,
        DENSE_RANK() OVER (PARTITION BY equipe_nom ORDER BY temps_total) AS rang
    FROM
        classement_points_etape_coureur;

SELECT
    coureur_id,
    coureur_nom,
    equipe_nom,
    temps_total
FROM
    classement_equipe_coureur
WHERE
    rang = 1;

--     $results = DB::select("
--     SELECT
--         coureur_id,
--         coureur_nom,
--         equipe_nom,
--         temps_total
--     FROM
--         classement_equipe_coureur
--     WHERE
--         rang = 1
-- ");




create view vpenalite as 
select
    p.id,
    u.name as equipe,
    e.nom as etape,
    p.penalite
from penalite p
join users u on p.equipe = u.id
join etape e on p.etape = e.id;


create view chrono_coureur as 
select
    c.*,
    ch.etape,
    ch.depart,
    ch.arriver
from chrono ch
join coureur c on ch.coureur = c.id;

--jour 4
create or replace view Chrono_coureur_rang as
select
    cc.*,
    (cc.arriver - cc.depart) as chrono,
    COALESCE((select sum(penalite) from penalite where etape = cc.etape and equipe = cc.equipe), '00:00:00') as penalite,
    (cc.arriver - cc.depart) + COALESCE((select sum(penalite) from penalite where etape = cc.etape and equipe = cc.equipe), '00:00:00'):: interval as temp_final
from chrono_coureur cc;

-- create or replace view chrono_coureur_ranger as
-- select 
--     ccr.id as coureur_id,
--     ccr.nom as coureur_nom,
--     ccr.numeros as numero_dossar,
--     ccr.genre,
--     g.genre as sexe,
--     ccr.equipe as equipe_id,
--     u.name as equipe_nom,
--     ccr.etape as etape_id,
--     e.nom as etape,
--     ccr.chrono,
--     ccr.penalite,
--     ccr.temp final


--jour 4

select * from etape 
where course = 'COURS001' 
order by rang ASC;

select count(coureur)

CREATE OR REPLACE VIEW vcoureur AS
SELECT 
    c.id,
    c.nom,
    c.numeros,
    g.genre,
    c.dtn,
    u.name AS equipe,
    u.id AS idequipe,
    cc.categorie AS idcategorie,
    ct.nom AS categorie
FROM coureur c
JOIN genre g ON g.id = c.genre
LEFT JOIN categorieCoureur cc ON cc.coureur = c.id
LEFT JOIN categorie ct ON cc.categorie = ct.id 
JOIN users u ON u.id = c.equipe;



CREATE OR REPLACE FUNCTION insert_data() 
RETURNS void AS $$
BEGIN
    
    -- Insert coureur
  INSERT INTO coureur (id, nom, numeros, genre, dtn, equipe)
    SELECT DISTINCT ON (r.numero_dossar)
        'COUR' || LPAD(nextval('seqCoureur')::text, 3, '0') AS id,
        r.nom,
        r.numero_dossar,
        CASE
            WHEN r.genre = 'M' THEN (SELECT id FROM genre WHERE genre = 'Homme')
            WHEN r.genre = 'F' THEN (SELECT id FROM genre WHERE genre = 'Femme')
            ELSE NULL
        END AS genre,
        r.date_naissance,
        (SELECT id FROM users WHERE name = r.equipe) AS equipe
    FROM 
        resultat r;



    -- Insert categorieCoureur
    INSERT INTO categorieCoureur (coureur, categorie)
    SELECT 
        c.id AS coureur,
        CASE
            WHEN EXTRACT(YEAR FROM AGE(c.dtn)) > 18 THEN 'CTG002'
            ELSE 'CTG001'
        END AS categorie
    FROM 
        coureur c;

    -- Insertion des etapes coureurs 
    INSERT INTO etapeCoureur (etape, coureur)
    SELECT 
        e.id AS etape,
        c.id AS coureur
    FROM 
        resultat r
    JOIN 
        coureur c ON r.numero_dossar = c.numeros
    JOIN 
        etape e ON r.etape_rang = e.rang;

    -- Insertion chrono
    INSERT INTO chrono (coureur, etape, depart, arriver)
    SELECT 
        c.id AS coureur,
        e.id AS etape,
        e.debut AS depart,
        r.arriver
    FROM 
        resultat r
    JOIN 
        coureur c ON r.numero_dossar = c.numeros
    JOIN 
        etape e ON r.etape_rang = e.rang;

END;
$$ LANGUAGE plpgsql;


-- Calculena le temp anle coureur 
CREATE VIEW temps_total_etape_coureur AS
SELECT
    c.id AS coureur_id,
    c.nom AS coureur_nom,
    c.equipe,
    ch.etape,
    SUM(
        EXTRACT(
            EPOCH FROM (
                (ch.arriver + COALESCE((SELECT SUM(penalite) FROM penalite WHERE equipe = c.equipe AND etape = ch.etape), '00:00:00')::interval) - ch.depart 
            )
        )
    ) AS temps_total
FROM
    coureur c
JOIN
    chrono ch ON c.id = ch.coureur
GROUP BY
    c.id, c.nom, c.equipe, ch.etape;


-- Classena le coureurs par anle temps total mapiasa DENSE_RANK
CREATE VIEW classement_etape_coureur AS
SELECT
    coureur_id,
    coureur_nom,
    equipe,
    etape,
    temps_total,
    DENSE_RANK() OVER (PARTITION BY etape ORDER BY temps_total) AS rang
FROM
    temps_total_etape_coureur;



--omena point amzay ny coureur
CREATE VIEW points_etape_attribution AS
SELECT
    ce.coureur_id,
    ce.coureur_nom,
    ce.equipe,
    ce.etape,
    ce.temps_total,
    ce.rang,
    COALESCE(p.valeur, 0) AS points
FROM
    classement_etape_coureur ce
LEFT JOIN
    points p ON ce.rang = p.rang;


--view anlay classement general
CREATE VIEW classement_points_etape_coureur AS
SELECT
    pe.coureur_id,
    pe.coureur_nom,
    pe.equipe,
    u.name AS equipe_nom,
    u.id AS equipe_id,
    pe.etape,
    pe.temps_total,
    pe.rang,
    pe.points
FROM
    points_etape_attribution pe
JOIN
    users u ON pe.equipe = u.id;


--view general classement etape
CREATE VIEW classement_general_coureur AS
SELECT
    pe.coureur_id,
    pe.coureur_nom,
    pe.equipe,
    u.name AS equipe_nom,
    u.id AS equipe_id,
    SUM(pe.temps_total) AS temps_total_general,
    DENSE_RANK() OVER (ORDER BY SUM(pe.points) DESC) AS rang_general,
    SUM(pe.points) AS points_total
FROM
    classement_points_etape_coureur pe
JOIN
    users u ON pe.equipe = u.id
GROUP BY
    pe.coureur_id, pe.coureur_nom, pe.equipe, u.name, u.id;


--meme qu'en haut mais par genre cette fois c
CREATE VIEW temps_total_etape_genre_coureur AS
SELECT
    c.id AS coureur_id,
    c.nom AS coureur_nom,
    c.genre,
    c.equipe,
    ch.etape,
    SUM(
        EXTRACT(
            EPOCH FROM (
                (ch.arriver + COALESCE((SELECT SUM(penalite) FROM penalite WHERE equipe = c.equipe AND etape = ch.etape), '00:00:00')::interval) - ch.depart 
            )
        )
    ) AS temps_total
FROM
    coureur c
JOIN
    chrono ch ON c.id = ch.coureur
GROUP BY
    c.id, c.nom, c.genre, c.equipe, ch.etape;


CREATE VIEW classement_etape_genre_coureur AS
SELECT
    coureur_id,
    coureur_nom,
    genre,
    equipe,
    etape,
    temps_total,
    DENSE_RANK() OVER (PARTITION BY etape, genre ORDER BY temps_total) AS rang
FROM
    temps_total_etape_genre_coureur;


CREATE VIEW points_etape_genre_attribution AS
SELECT
    ceg.coureur_id,
    ceg.coureur_nom,
    ceg.genre,
    ceg.equipe,
    ceg.etape,
    ceg.temps_total,
    ceg.rang,
    COALESCE(p.valeur, 0) AS points
FROM
    classement_etape_genre_coureur ceg
LEFT JOIN
    points p ON ceg.rang = p.rang;


CREATE VIEW classement_points_genre_etape_coureur AS
SELECT
    peg.coureur_id,
    peg.coureur_nom,
    peg.genre,
    u.name AS equipe_nom,
    u.id AS equipe_id,
    peg.etape,
    peg.temps_total,
    peg.rang,
    peg.points
FROM
    points_etape_genre_attribution peg
JOIN
    users u ON peg.equipe = u.id;



--meme qu'en haut mais par categorie cette fois c
CREATE VIEW temps_total_etape_categorie_coureur AS
SELECT
    c.id AS coureur_id,
    c.nom AS coureur_nom,
    cc.categorie,
    c.equipe,
    ch.etape,
    SUM(
        EXTRACT(
            EPOCH FROM (
                (ch.arriver + COALESCE((SELECT SUM(penalite) FROM penalite WHERE equipe = c.equipe AND etape = ch.etape), '00:00:00')::interval) - ch.depart 
            )
        )
    ) AS temps_total
FROM
    coureur c
JOIN
    chrono ch ON c.id = ch.coureur
JOIN
    categorieCoureur cc ON c.id = cc.coureur
GROUP BY
    c.id, c.nom, cc.categorie, c.equipe, ch.etape;


CREATE VIEW classement_etape_categorie_coureur AS
SELECT
    coureur_id,
    coureur_nom,
    categorie,
    equipe,
    etape,
    temps_total,
    DENSE_RANK() OVER (PARTITION BY etape, categorie ORDER BY temps_total) AS rang
FROM
    temps_total_etape_categorie_coureur;


CREATE VIEW points_etape_categorie_attribution AS
SELECT
    cec.coureur_id,
    cec.coureur_nom,
    cec.categorie,
    cec.equipe,
    cec.etape,
    cec.temps_total,
    cec.rang,
    COALESCE(p.valeur, 0) AS points
FROM
    classement_etape_categorie_coureur cec
LEFT JOIN
    points p ON cec.rang = p.rang;

CREATE VIEW classement_points_categorie_etape_coureur AS
SELECT
    pec.coureur_id,
    pec.coureur_nom,
    pec.categorie,
    u.name AS equipe_nom,
    u.id AS equipe_id,
    pec.etape,
    pec.temps_total,
    pec.rang,
    pec.points
FROM
    points_etape_categorie_attribution pec
JOIN
    users u ON pec.equipe = u.id;


create or replace view coureur_chrono_rang as 
select
    cpec.coureur_id,
    cpec.coureur_nom,
    cpec.equipe_nom,
    (select genre from genre where id = (select genre from coureur where id = cpec.coureur_id)),
    cpec.etape as etape_id,
    e.nom as etape,
    ((make_interval(secs => cpec.temps_total)).time) - COALESCE((select sum(penalite) from penalite where equipe = cpec.equipe and etape = cpec.etape),'00:00:00')AS chrono,
    COALESCE((select sum(penalite) from penalite where equipe = cpec.equipe and etape = cpec.etape),'00:00:00') as penalite,
    (make_interval(secs => cpec.temps_total)).time as temp_final,
    cpec.rang
from 
    classement_points_etape_coureur cpec
join 
    etape e on cpec.etape = e.id;

    


--AZA KITIHANA RETO
-- DELETE FROM categorieCoureur;
-- DELETE FROM etapeCoureur;
-- DELETE FROM chrono;
-- DELETE FROM etape;
-- DELETE FROM coureur;
-- DELETE FROM points;
-- DELETE FROM resultat;


-- TRUNCATE TABLE categorieCoureur;
-- TRUNCATE TABLE etapeCoureur;
-- TRUNCATE TABLE chrono;
-- TRUNCATE TABLE coureur;
-- TRUNCATE TABLE etape;
-- TRUNCATE TABLE points;


-- ALTER SEQUENCE seqcourse RESTART WITH 1;
-- ALTER SEQUENCE seqEtape RESTART WITH 1;
-- ALTER SEQUENCE seqCoureur RESTART WITH 1;
-- ALTER SEQUENCE seqCategorie RESTART WITH 1;
--AZA KITIHANA RETO


--DROP VIEW
DROP VIEW IF EXISTS classement_general_coureur;
DROP VIEW IF EXISTS classement_points_etape_coureur;
DROP VIEW IF EXISTS points_etape_attribution;
DROP VIEW IF EXISTS classement_etape_coureur;
DROP VIEW IF EXISTS temps_total_etape_coureur;

DROP VIEW IF EXISTS classement_points_genre_etape_coureur;
DROP VIEW IF EXISTS points_etape_genre_attribution;
DROP VIEW IF EXISTS classement_etape_genre_coureur;
DROP VIEW IF EXISTS temps_total_etape_genre_coureur;

DROP VIEW IF EXISTS classement_points_categorie_etape_coureur;
DROP VIEW IF EXISTS points_etape_categorie_attribution;
DROP VIEW IF EXISTS classement_etape_categorie_coureur;
DROP VIEW IF EXISTS temps_total_etape_categorie_coureur;


