CREATE TABLE Tenrac (
id_tenrac SERIAL PRIMARY KEY NOT NULL,
Name VARCHAR NOT NULL,
Surname VARCHAR NOT NULL,
id_dignite INT,
libel_sex VARCHAR NOT NULL,
id_titre INT,
id_rang INT,
id_grade INT NOT NULL,
id_club INT);

CREATE TABLE Sex (
libel_sex VARCHAR PRIMARY KEY NOT NULL);

CREATE TABLE Title (
id_title serial PRIMARY KEY NOT NULL);

CREATE TABLE TitleSex (
libel_sex VARCHAR NOT NULL,
id_title INT NOT NULL,
libel_sex_titre INT NOT NULL,
PRIMARY KEY (libel_sex,id_title));

CREATE TABLE Dignity (
id_dignity INT PRIMARY KEY NOT NULL);

CREATE TABLE DignitySex (
id_dignity INT NOT NULL,
libel_sex INT NOT NULL,
libel_dignite_sex VARCHAR NOT NULL,
PRIMARY KEY (id_dignity,libel_sex));

CREATE TABLE Rank (
id_rank serial PRIMARY KEY NOT NULL);

CREATE TABLE RankSex (
libel_sex VARCHAR NOT NULL,
id_rank INT NOT NULL,
libel_rang_sex VARCHAR NOT NULL,
PRIMARY KEY (libel_sex,id_rank));

CREATE TABLE Grade (
id_grade INT PRIMARY KEY NOT NULL);

CREATE TABLE GradeSex (
libel_sex VARCHAR NOT NULL,
id_grade INT NOT NULL,
libelRangSex VARCHAR NOT NULL,
PRIMARY KEY (libel_sex,id_grade));

CREATE TABLE Club (
id_club serial PRIMARY KEY NOT NULL,
codePostal INT NOT NULL,
denomination VARCHAR NOT NULL);

CREATE TABLE Meal (
id_meal serial PRIMARY KEY NOT NULL,
dat DATE NOT NULL,
address VARCHAR NOT NULL,
id_organizer INT NOT NULL,
id_club INT DEFAULT 1
);

CREATE TABLE TenracMeal (
id_tenrac INT NOT NULL,
id_repas INT NOT NULL,
PRIMARY KEY (id_tenrac,id_repas));

CREATE TABLE Date (
dat DATE PRIMARY KEY NOT NULL);

CREATE TABLE DishMeal (
id_plat INT NOT NULL,
id_repas INT NOT NULL,
PRIMARY KEY (id_plat,id_repas));

CREATE TABLE Dish (
id_dish serial PRIMARY KEY NOT NULL,
libel_dish VARCHAR NOT NULL);

CREATE TABLE Sauce (
id_sauce serial PRIMARY KEY NOT NULL,
libel_sauce INT NOT NULL);

CREATE TABLE DishSauce (
id_sauce INT NOT NULL,
id_dish INT NOT NULL,
PRIMARY KEY (id_sauce,id_dish));

CREATE TABLE Ingredient (
id_ingredient serial PRIMARY KEY NOT NULL,
is_vegetable BOOLEAN NOT NULL,
libel_ingredient INT NOT NULL);

CREATE TABLE DishIngredient (
id_ingredient serial NOT NULL,
id_plat INT NOT NULL,
PRIMARY KEY (id_ingredient,id_plat));

ALTER TABLE Tenrac ADD CONSTRAINT FK1 FOREIGN KEY (id_dignite) REFERENCES Dignity(id_dignity);
ALTER TABLE Tenrac ADD CONSTRAINT FK2 FOREIGN KEY (libel_sex) REFERENCES Sex(libel_sex);
ALTER TABLE Tenrac ADD CONSTRAINT FK3 FOREIGN KEY (id_titre) REFERENCES Title(id_title);
ALTER TABLE Tenrac ADD CONSTRAINT FK4 FOREIGN KEY (id_rang) REFERENCES Rank(id_rank);
ALTER TABLE Tenrac ADD CONSTRAINT FK5 FOREIGN KEY (id_grade) REFERENCES Grade(id_grade);
ALTER TABLE Tenrac ADD CONSTRAINT FK6 FOREIGN KEY (id_club) REFERENCES Club(id_club);
ALTER TABLE TitleSex ADD CONSTRAINT FK7 FOREIGN KEY (libel_sex) REFERENCES Sex(libel_sex);
ALTER TABLE TitleSex ADD CONSTRAINT FK8 FOREIGN KEY (id_title) REFERENCES Title(id_title);
ALTER TABLE DignitySex ADD CONSTRAINT FK9 FOREIGN KEY (id_dignity) REFERENCES Dignity(id_dignity);
ALTER TABLE DignitySex ADD CONSTRAINT FK10 FOREIGN KEY (libel_sex) REFERENCES Tenrac(id_tenrac);
ALTER TABLE RankSex ADD CONSTRAINT FK11 FOREIGN KEY (libel_sex) REFERENCES Sex(libel_sex);
ALTER TABLE RankSex ADD CONSTRAINT FK12 FOREIGN KEY (id_rank) REFERENCES Rank(id_rank);
ALTER TABLE GradeSex ADD CONSTRAINT FK13 FOREIGN KEY (libel_sex) REFERENCES Sex(libel_sex);
ALTER TABLE GradeSex ADD CONSTRAINT FK14 FOREIGN KEY (id_grade) REFERENCES Grade(id_grade);
ALTER TABLE Meal ADD CONSTRAINT FK15 FOREIGN KEY (dat) REFERENCES Date(dat);
ALTER TABLE Meal ADD CONSTRAINT FK16 FOREIGN KEY (id_organizer) REFERENCES Tenrac(id_tenrac);
ALTER TABLE Meal ADD CONSTRAINT FK17 FOREIGN KEY (id_club) REFERENCES Club(id_club);
ALTER TABLE TenracMeal ADD CONSTRAINT FK18 FOREIGN KEY (id_tenrac) REFERENCES Tenrac(id_tenrac);
ALTER TABLE TenracMeal ADD CONSTRAINT FK19 FOREIGN KEY (id_repas) REFERENCES Meal(id_meal);
ALTER TABLE DishMeal ADD CONSTRAINT FK20 FOREIGN KEY (id_plat) REFERENCES Dish(id_dish);
ALTER TABLE DishMeal ADD CONSTRAINT FK21 FOREIGN KEY (id_repas) REFERENCES Meal(id_meal);
ALTER TABLE DishSauce ADD CONSTRAINT FK22 FOREIGN KEY (id_sauce) REFERENCES Sauce(id_sauce);
ALTER TABLE DishSauce ADD CONSTRAINT FK23 FOREIGN KEY (id_dish) REFERENCES Dish(id_dish);
ALTER TABLE DishIngredient ADD CONSTRAINT FK24 FOREIGN KEY (id_ingredient) REFERENCES Ingredient(id_ingredient);
ALTER TABLE DishIngredient ADD CONSTRAINT FK25 FOREIGN KEY (id_plat) REFERENCES Dish(id_dish);