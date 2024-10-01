Eeeee

DARIETTO Nicolas
​
DARIETTO Nicolas
​


CREATE TABLE Tenrac (
mail_tenrac VARCHAR PRIMARY KEY NOT NULL,
Name VARCHAR NOT NULL,
Surname VARCHAR NOT NULL,
id_dignite INT,
id_grade INT NOT NULL,
libel_sex VARCHAR NOT NULL,
id_titre INT,
id_rang INT,
id_club INT,
mot_de_passe VARCHAR(255) NOT NULL,
is_admin BOOLEAN NOT NULL DEFAULT false);

CREATE TABLE Sex (
libel_sex VARCHAR PRIMARY KEY NOT NULL);

CREATE TABLE Title (
id_title INT PRIMARY KEY NOT NULL);

CREATE TABLE TitleSex (
libel_sex VARCHAR NOT NULL,
id_title INT NOT NULL,
libel_sex_titre INT NOT NULL,
PRIMARY KEY (libel_sex,id_title));

CREATE TABLE Dignity (
id_dignity INT PRIMARY KEY NOT NULL);

CREATE TABLE DignitySex (
id_dignity INT NOT NULL,
libel_sex VARCHAR NOT NULL,
libel_dignite_sex VARCHAR NOT NULL,
PRIMARY KEY (id_dignity,libel_sex));

CREATE TABLE Rank (
id_rank INT PRIMARY KEY NOT NULL);

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
id_club INT PRIMARY KEY NOT NULL,
codePostal INT NOT NULL,
denomination  VARCHAR NOT NULL);

CREATE TABLE Meal (
id_meal INT PRIMARY KEY NOT NULL,
dat DATE NOT NULL,
address VARCHAR NOT NULL,
id_organizer INT NOT NULL,
id_club INT);

CREATE TABLE TenracMeal (
mail_tenrac VARCHAR NOT NULL,
id_repas INT NOT NULL,
PRIMARY KEY (mail_tenrac,id_repas));

CREATE TABLE Date (
dat DATE PRIMARY KEY NOT NULL);

CREATE TABLE DishMeal (
id_plat INT NOT NULL,
id_repas INT NOT NULL,
PRIMARY KEY (id_plat,id_repas));

CREATE TABLE Dish (
id_dish INT PRIMARY KEY NOT NULL,
libel_dish VARCHAR NOT NULL);

CREATE TABLE Sauce (
id_sauce INT PRIMARY KEY NOT NULL,
libel_sauce INT NOT NULL);

CREATE TABLE DishSauce (
id_sauce INT NOT NULL,
id_dish INT NOT NULL,
PRIMARY KEY (id_sauce,id_dish));

CREATE TABLE Ingredient (
id_ingredient INT PRIMARY KEY NOT NULL,
is_vegetable BOOLEAN NOT NULL,
libel_ingredient INT NOT NULL);

CREATE TABLE DishIngredient (
id_ingredient INT NOT NULL,
id_plat INT NOT NULL,
PRIMARY KEY (id_ingredient,id_plat));

CREATE TABLE TenracIngredient (
mail_tenrac VARCHAR NOT NULL,
id_igredient INT NOT NULL,
PRIMARY KEY (mail_tenrac,id_igredient));

ALTER TABLE Tenrac ADD CONSTRAINT Tenrac_id_dignite_Dignity_id_dignity FOREIGN KEY (id_dignite) REFERENCES Dignity(id_dignity);
ALTER TABLE Tenrac ADD CONSTRAINT Tenrac_id_grade_Grade_id_grade FOREIGN KEY (id_grade) REFERENCES Grade(id_grade);
ALTER TABLE Tenrac ADD CONSTRAINT Tenrac_libel_sex_Sex_libel_sex FOREIGN KEY (libel_sex) REFERENCES Sex(libel_sex);
ALTER TABLE Tenrac ADD CONSTRAINT Tenrac_id_titre_Title_id_title FOREIGN KEY (id_titre) REFERENCES Title(id_title);
ALTER TABLE Tenrac ADD CONSTRAINT Tenrac_id_rang_Rank_id_rank FOREIGN KEY (id_rang) REFERENCES Rank(id_rank);
ALTER TABLE Tenrac ADD CONSTRAINT Tenrac_id_club_Club_id_club FOREIGN KEY (id_club) REFERENCES Club(id_club);
ALTER TABLE TitleSex ADD CONSTRAINT TitleSex_libel_sex_Sex_libel_sex FOREIGN KEY (libel_sex) REFERENCES Sex(libel_sex);
ALTER TABLE TitleSex ADD CONSTRAINT TitleSex_id_title_Title_id_title FOREIGN KEY (id_title) REFERENCES Title(id_title);
ALTER TABLE DignitySex ADD CONSTRAINT DignitySex_id_dignity_Dignity_id_dignity FOREIGN KEY (id_dignity) REFERENCES Dignity(id_dignity);
ALTER TABLE DignitySex ADD CONSTRAINT DignitySex_libel_sex_Sex_libel_sex FOREIGN KEY (libel_sex) REFERENCES Sex(libel_sex);
ALTER TABLE RankSex ADD CONSTRAINT RankSex_libel_sex_Sex_libel_sex FOREIGN KEY (libel_sex) REFERENCES Sex(libel_sex);
ALTER TABLE RankSex ADD CONSTRAINT RankSex_id_rank_Rank_id_rank FOREIGN KEY (id_rank) REFERENCES Rank(id_rank);
ALTER TABLE GradeSex ADD CONSTRAINT GradeSex_libel_sex_Sex_libel_sex FOREIGN KEY (libel_sex) REFERENCES Sex(libel_sex);
ALTER TABLE GradeSex ADD CONSTRAINT GradeSex_id_grade_Grade_id_grade FOREIGN KEY (id_grade) REFERENCES Grade(id_grade);
ALTER TABLE Meal ADD CONSTRAINT Meal_dat_Date_dat FOREIGN KEY (dat) REFERENCES Date(dat);
ALTER TABLE Meal ADD CONSTRAINT Meal_id_organizer_Tenrac_mail_tenrac FOREIGN KEY (id_organizer) REFERENCES Tenrac(mail_tenrac);
ALTER TABLE Meal ADD CONSTRAINT Meal_id_club_Club_id_club FOREIGN KEY (id_club) REFERENCES Club(id_club);
ALTER TABLE TenracMeal ADD CONSTRAINT TenracMeal_mail_tenrac_Tenrac_mail_tenrac FOREIGN KEY (mail_tenrac) REFERENCES Tenrac(mail_tenrac);
ALTER TABLE TenracMeal ADD CONSTRAINT TenracMeal_id_repas_Meal_id_meal FOREIGN KEY (id_repas) REFERENCES Meal(id_meal);
ALTER TABLE DishMeal ADD CONSTRAINT DishMeal_id_plat_Dish_id_dish FOREIGN KEY (id_plat) REFERENCES Dish(id_dish);
ALTER TABLE DishMeal ADD CONSTRAINT DishMeal_id_repas_Meal_id_meal FOREIGN KEY (id_repas) REFERENCES Meal(id_meal);
ALTER TABLE DishSauce ADD CONSTRAINT DishSauce_id_sauce_Sauce_id_sauce FOREIGN KEY (id_sauce) REFERENCES Sauce(id_sauce);
ALTER TABLE DishSauce ADD CONSTRAINT DishSauce_id_dish_Dish_id_dish FOREIGN KEY (id_dish) REFERENCES Dish(id_dish);
ALTER TABLE DishIngredient ADD CONSTRAINT DishIngredient_id_ingredient_Ingredient_id_ingredient FOREIGN KEY (id_ingredient) REFERENCES Ingredient(id_ingredient);
ALTER TABLE DishIngredient ADD CONSTRAINT DishIngredient_id_plat_Dish_id_dish FOREIGN KEY (id_plat) REFERENCES Dish(id_dish);
ALTER TABLE TenracIngredient ADD CONSTRAINT TenracIngredient_mail_tenrac_Tenrac_mail_tenrac FOREIGN KEY (mail_tenrac) REFERENCES Tenrac(mail_tenrac);
ALTER TABLE TenracIngredient ADD CONSTRAINT TenracIngredient_id_igredient_Ingredient_id_ingredient FOREIGN KEY (id_igredient) REFERENCES Ingredient(id_ingredient);

