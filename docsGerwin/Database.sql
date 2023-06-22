DROP DATABASE IF EXISTS `VoedselbankMaaskantje`;

CREATE DATABASE `VoedselbankMaaskantje`;

USE `VoedselbankMaaskantje`;

select * from persoon;

CREATE TABLE `Persoon`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `GezinId` 				BIGINT 			NOT NULL,
    `Voornaam` 				VARCHAR(255) 	NOT NULL,
    `Tussenvoegsel` 		VARCHAR(100) 	NOT NULL,
    `Achternaam` 			VARCHAR(255) 	NOT NULL,
    `Volledignaam`			VARCHAR(255)	GENERATED ALWAYS AS (CASE WHEN `Tussenvoegsel` IS NULL THEN CONCAT(`Voornaam`,' ', `Achternaam`)ELSE CONCAT(`Voornaam`, ' ', `Tussenvoegsel`, ' ', `Achternaam`) END) STORED,
    `Geboortedatum` 		DATE 			NOT NULL,
    `TypePersoon` 			VARCHAR(255) 	NOT NULL,
    `IsVertegenwoordiger` 	BIT 			NOT NULL  	DEFAULT 1,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`GezinId`)	REFERENCES `Gezin` (`Id`)
);

INSERT INTO `Persoon` (`GezinId`, `Voornaam`, `Tussenvoegsel`, `Achternaam`, `Geboortedatum`, `TypePersoon`, `IsVertegenwoordiger`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (NULL, 'Hans', 'van', 'Leeuwen', '1958-02-12', 'Manager', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   (NULL, 'Jan', 'van der', 'Sluijs', '1993-04-30', 'Medewerker', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (NULL, 'Herman', 'den', 'Duiker', '1989-08-30', 'Vrijwilliger', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (1, 'Johan', 'van', 'Zevenhuizen', '1990-05-20', 'Klant', 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (1, 'Sarah', 'den', 'Dolder', '1985-03-23', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (1, 'Theo', 'van', 'Zevenhuizen', '2015-03-08', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (1, 'Jantien', 'van', 'Zevenhuizen', '2016-09-20', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (2, 'Arjan', NULL, 'Bergkamp', '1968-07-12', 'Klant', 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (2, 'Janneke', NULL, 'Sanders', '1969-05-11', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (2, 'Stein', NULL, 'Bergkamp', '2009-02-02', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (2, 'Judith', NULL, 'Bergkamp', '2022-02-05', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (3, 'Mazin', 'van', 'Vliet', '1968-08-18', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (3, 'Selma', 'van de', 'Heuvel', '1965-09-04', 'Klant', 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (4, 'Eva', NULL, 'Scherder', '1965-04-07', 'Klant', 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (4, 'Felicia', NULL, 'Scherder', '2021-11-29', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (4, 'Devin', NULL, 'Scherder', '2023-03-01', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (5, 'Frieda', 'de', 'Jong', '1980-09-04', 'Klant', 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (5, 'Simeon', 'de', 'Jong', '2018-05-23', 'Klant', 0, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (6, 'Hanna', 'van der', 'Berg', '1999-09-09', 'Klant', 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6));

CREATE TABLE `Gezin`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `Naam` 					VARCHAR(255) 	NOT NULL,
    `Code` 					VARCHAR(25) 	NOT NULL,
    `Omschrijving` 			VARCHAR(255) 	NOT NULL,
    `AantalVolwassenen` 	INT 			NOT NULL,
    `AantalKinderen` 		INT 			NOT NULL,
    `AantalBabys` 			INT 			NOT NULL,
    `TotaalAantalPersoon` 	INT 			NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `Gezin` (`Naam`, `Code`, `Omschrijving`, `AantalVolwassenen`, `AantalKinderen`, `AantalBabys`, `TotaalAantalPersoon`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES ('ZevenhuizenGezin', 'G0001', 'Bijstandsgezin', 2, 2, 0, 4, 1, NULL, sysdate(6), sysdate(6)),
	   ('BergkampGezin', 'G0002', 'Bijstandsgezin', 2, 1, 1, 4, 1, NULL, sysdate(6), sysdate(6)),
       ('HeuvelGezin', 'G0003', 'Bijstandsgezin', 2, 0, 0, 2, 1, NULL, sysdate(6), sysdate(6)),
       ('ScherderGezin', 'G0004', 'Bijstandsgezin', 1, 0, 2, 3, 1, NULL, sysdate(6), sysdate(6)),
       ('DeJongGezin', 'G0005', 'Bijstandsgezin', 1, 1, 0, 2, 1, NULL, sysdate(6), sysdate(6)),
       ('VanderBergGezin', 'G0006', 'AlleenGaande', 1, 0, 0, 1, 1, NULL, sysdate(6), sysdate(6));

CREATE TABLE `AllergiePerPersoon`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `PersoonId` 			BIGINT		    NOT NULL,
    `AllergieId` 			BIGINT 			NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`PersoonId`)	REFERENCES `Persoon` (`Id`),
    FOREIGN KEY (`AllergieId`)	REFERENCES `Allergie` (`Id`)
);

INSERT INTO `AllergiePerPersoon` (`PersoonId`, `AllergieId`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (4, 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   (5, 2, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (6, 3, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (7, 4, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (8, 3, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (9, 2, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (10, 5, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (11, 2, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (12, 4, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (13, 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (14, 3, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (15, 5, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (16, 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (17, 2, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (18, 4, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (19, 4, 1, 'Geen opmerkingen', sysdate(6), sysdate(6));
CREATE TABLE `Allergie`(
    `id` 					BIGINT	 		NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `Naam` 					VARCHAR(255) 	NOT NULL,
    `Omschrijving` 			VARCHAR(255) 	NOT NULL,
    `AnafylactischRisico` 	VARCHAR(255) 	NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `Allergie` (`Naam`, `Omschrijving`, `AnafylactischRisico`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES ('Gluten', 'Allergisch voor Gluten', 'zeerlaag', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   ('Pindas', 'Allergisch voor Pindas', 'Hoog', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       ('Schaaldieren', 'Allergisch voor RedelijkHoog', 'zeerlaag', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       ('Hazelnoten', 'Allergisch voor Hazelnoten', 'Laag', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       ('Lactose', 'Allergisch voor Lactose', 'zeerlaag', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       ('Soja', 'Allergisch voor Soja', 'zeerlaag', 1, 'Geen opmerkingen', sysdate(6), sysdate(6));
