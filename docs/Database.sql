DROP DATABASE IF EXISTS `Voedselbank`;

CREATE DATABASE `Voedselbank`;

USE `Voedselbank`;

CREATE TABLE `Allergie`(
    `id` 					BIGINT  		NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `Type` 					Enum('Gluten', 'pindas', 'schaaldieren', 'hazelnoten', 'lactose') NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB;

INSERT INTO `Allergie` (`Type`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES ('Gluten', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   ('pindas', 1, 'Milde allergische reactie', sysdate(6), sysdate(6)),
       ('schaaldieren', 0, 'Niet meer allergisch', sysdate(6), sysdate(6)),
       ('hazelnoten', 1, NULL, sysdate(6), sysdate(6)),
       ('lactose', 1, 'Vermijden van zuivelproducten', sysdate(6), sysdate(6));

CREATE TABLE `Persoon`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `Voornaam` 				VARCHAR(255) 	NOT NULL,
    `Tussenvoegsel` 		VARCHAR(255) 	NOT NULL,
    `Achternaam` 			VARCHAR(255) 	NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB;

INSERT INTO `Persoon` (`Voornaam`, `Tussenvoegsel`, `Achternaam`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES ('John', 'van der', 'Doe', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   ('Jane', '', 'Smith', 1, 'Actief lid', sysdate(6), sysdate(6)),
       ('Michael', '', 'Johnson', 0, 'Niet meer in dienst', sysdate(6), sysdate(6)),
       ('Sarah', '', 'Davis', 1, NULL, sysdate(6), sysdate(6)),
       ('David', '', 'Brown', 1, 'Manager', sysdate(6), sysdate(6));

CREATE TABLE `LeverancierContactPersoon`(
    `id` 					BIGINT			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `Naam` 					VARCHAR(255) 	NOT NULL,
    `Email` 				VARCHAR(255) 	NOT NULL,
    `Telefoonnummer` 		varchar(25) 	NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB;

INSERT INTO `LeverancierContactPersoon` (`Naam`, `Email`, `Telefoonnummer`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES ('Mazin Jamil', 'mazinjamil@example.com', '1234567890', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   ('Gerwin de Heus', 'gerwindeheus@example.com', '9876543210', 1, 'Actief contactpersoon', sysdate(6), sysdate(6)),
       ('Henk van der Kooij', 'henkvanderkooij@example.com', '5555555555', 0, 'Niet langer contactpersoon', sysdate(6), sysdate(6)),
       ('Andrej', 'Andrej@example.com', '9999999999', 1, NULL, sysdate(6), sysdate(6)),
       ('Arjan de Ruijter', 'arjanderuijter@example.com', '1111111111', 1, 'Hoofdleverancier', sysdate(6), sysdate(6));

CREATE TABLE `Gezin`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `AantalVolwassen` 		INT 			NOT NULL,
    `AantalKinderen` 		INT 			NOT NULL,
    `AantaBabys` 			INT 			NOT NULL,
    `Naam` 					VARCHAR(255) NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB;

INSERT INTO `Gezin` (`AantalVolwassen`, `AantalKinderen`, `AantaBabys`, `Naam`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (2, 1, 0, 'Familie doe', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   (1, 2, 1, 'Familie Smith', 1, 'Actieve familie', sysdate(6), sysdate(6)),
       (2, 0, 0, 'Familie Johnson', 0, 'Niet meer actief', sysdate(6), sysdate(6)),
       (1, 1, 1, 'Familie Davis', 1, NULL, sysdate(6), sysdate(6));

CREATE TABLE `Role`(
    `id` 					BIGINT  		NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `Role` 					Enum('Directie', 'Magazijnmedewerker', 'Vrijwilliger') 	NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB;

INSERT INTO `Role` (`Role`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES ('Directie', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   ('Magazijnmedewerker', 1, 'Actieve familie', sysdate(6), sysdate(6)),
       ('Vrijwilliger', 1, 'Niet meer actief', sysdate(6), sysdate(6));
       

CREATE TABLE `ProductCategorie`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `Type` 					Enum('Aardappelen groente fruit', 'Kaas vleeswaren', 'Zuivel Plantaardig en eieren', 'Bakerij en banket', 'Frisdrank sappen koffie en thee', 'Pasta rijst en wereldkeuken', 'Soepen sauzen kruiden en olie', 'Snoep koek chips en chocolade', 'Baby verzorging en hygiene') NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB;

INSERT INTO `ProductCategorie` (`Type`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES ('Aardappelen groente fruit', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   ('Kaas vleeswaren', 1, 'Actieve categorie', sysdate(6), sysdate(6)),
       ('Zuivel Plantaardig en eieren', 1, 'Niet meer actief', sysdate(6), sysdate(6)),
       ('Bakkerij en banket', 1, NULL, sysdate(6), sysdate(6)),
       ('Frisdrank sappen koffie en thee', 1, 'Belangrijke categorie', sysdate(6), sysdate(6));


CREATE TABLE `Wensen`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `Type` 					Enum('Geen varkensvlees', 'Veganistisch', 'Vegatarisch') 	NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB;

INSERT INTO `Wensen` (`Type`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES ('Geen varkensvlees', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   ('Veganistisch', 1, 'Actieve wens', sysdate(6), sysdate(6)),
       ('Vegetarisch', 0, 'actief', sysdate(6), sysdate(6));

CREATE TABLE `Voedselpakket`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `GezinId` 				BIGINT 			NOT NULL ,
    `DatumVanSamenstelling` DATETIME 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumVanUitgifte` 		DATETIME 		NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`GezinId`)	REFERENCES `Gezin` (`Id`)
)ENGINE = InnoDB;

INSERT INTO `Voedselpakket` (`GezinId`, `DatumVanSamenstelling`, `DatumVanUitgifte`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, sysdate(6), '2023-06-03 14:00:00', 1, 'Pakket voor week 23', sysdate(6), sysdate(6)),
	   (2, sysdate(6), '2023-06-10 13:00:00', 1, 'Pakket voor week 24', sysdate(6), sysdate(6)),
       (3, sysdate(6), '2023-06-17 14:30:00', 1, 'Pakket voor week 25', sysdate(6), sysdate(6)),
       (4, sysdate(6), '2023-06-24 12:00:00', 1, NULL, sysdate(6), sysdate(6));

CREATE TABLE `Leverancier`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `LeverancierContactPersoonId` BIGINT 	NOT NULL,
    `Bedrijfsnaam` 			VARCHAR(255) 	NOT NULL,
    `adres` 				VARCHAR(255) 	NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`LeverancierContactPersoonId`)	REFERENCES `LeverancierContactPersoon` (`Id`)
)ENGINE = InnoDB;

INSERT INTO `Leverancier` ( `LeverancierContactPersoonId`, `Bedrijfsnaam`, `adres`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 'Kaasboer', 'Amsterdam, hoofdstraat 3', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   (2, 'Albert heijn', 'Rotterdam, Straat 46', 1, 'Actieve leverancier', sysdate(6), sysdate(6)),
       (3, 'Plus C', 'Utrecht, laanstraat 4', 0, 'Nactief', sysdate(6), sysdate(6)),
       (4, 'Jumbo', 'Groningen, margrietlaan 7', 1, NULL, sysdate(6), sysdate(6)),
       (5, 'Aldi', 'Arnhem, laan 34', 1, 'Belangrijke leverancier', sysdate(6), sysdate(6));

CREATE TABLE `Product`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `ProductCategorieId` 	BIGINT			NOT NULL,
    `LeverancierId` 		BIGINT 			NOT NULL,
    `Naam` 					VARCHAR(255)	NOT NULL,
    `Streepjescode` 		BIGINT 			NOT NULL,
    `DatumEerstVolgendeLevering` DATETIME 	NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `AantalProducten` 		INT 			NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`LeverancierId`)	REFERENCES `Leverancier` (`Id`)
)ENGINE = InnoDB;

INSERT INTO `Product` (`ProductCategorieId`, `LeverancierId`, `Naam`, `Streepjescode`, `DatumEerstVolgendeLevering`, `AantalProducten`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 2, 'Kaas', 1234567895456, '2023-06-18 14:30:00', 4, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   (2, 1, 'Banaan', 4564573464854,  '2023-06-19 14:30:00', 6, 1, 'Actieve product', sysdate(6), sysdate(6)),
       (3, 3, 'eieren', 2464563489123, 0, '2023-06-15 14:30:00', 3,'prodcut', sysdate(6), sysdate(6)),
       (4, 4, 'Brood', 3452376854575, 1, '2023-06-13 14:30:00', 7, NULL, sysdate(6), sysdate(6)),
       (5, 5, 'Cola', 1256756845345, 1, '2023-06-12 14:30:00', 9, 'Belangrijk product', sysdate(6), sysdate(6));

CREATE TABLE `ProductPerVoedselpakket`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `VoedselpakketId` 		BIGINT 			NOT NULL,
    `ProductId` 			BIGINT 			NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`VoedselpakketId`)	REFERENCES `Voedselpakket` (`Id`),
    FOREIGN KEY (`ProductId`)	REFERENCES `Product` (`Id`)
)ENGINE = InnoDB;

INSERT INTO `ProductPerVoedselpakket` (`VoedselpakketId`, `ProductId`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 4, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   (2, 3, 1, 'actief', sysdate(6), sysdate(6)),
       (3, 2, 0, 'actief', sysdate(6), sysdate(6)),
       (4, 1, 1, NULL, sysdate(6), sysdate(6));
       

CREATE TABLE `User`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `PersoonId` 			BIGINT 			NOT NULL,
    `AllergieId` 			BIGINT 			NOT NULL,
    `WensenId` 				BIGINT 			NOT NULL,
    `GezinId` 				BIGINT 			NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`PersoonId`)	REFERENCES `Persoon` (`Id`),
    FOREIGN KEY (`AllergieId`)	REFERENCES `Allergie` (`Id`),
    FOREIGN KEY (`WensenId`)	REFERENCES `Wensen` (`Id`),
    FOREIGN KEY (`GezinId`)	REFERENCES `Gezin` (`Id`)
)ENGINE = InnoDB;

INSERT INTO `User` (`PersoonId`, `AllergieId`, `WensenId`, `GezinId`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 1, 1, 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   (2, 2, 2, 2, 1, 'User 2', sysdate(6), sysdate(6)),
       (3, 3, 3, 3, 1, 'User 3', sysdate(6), sysdate(6)),
       (4, 4, 2 , 4, 1, 'User 3', sysdate(6), sysdate(6));
       

CREATE TABLE `RolePerPersoon`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `PersoonId` 			BIGINT 			NOT NULL,
    `RoleId` 				BIGINT 			NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`PersoonId`)	REFERENCES `Persoon` (`Id`)
)ENGINE = InnoDB;

INSERT INTO `RolePerPersoon` (`PersoonId`, `RoleId`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (5, 1, 1, 'Geen opmerkingen', sysdate(6), sysdate(6));
	   

CREATE TABLE `Contact`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `PersoonId` 			BIGINT 			NOT NULL,
    `Telefoonnummer` 		BIGINT 			NOT NULL,
    `Email` 				VARCHAR(255) 	NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`PersoonId`)	REFERENCES `Persoon` (`Id`)
)ENGINE = InnoDB;

INSERT INTO `Contact` (`PersoonId`, `Telefoonnummer`, `Email`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES (1, 1234567890, 'Persoon1@example.com', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
	   (2, 5555555555, 'Persoon2@example.com', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (3, 9876543210, 'Persoon3@example.com', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (4, 1111111111, 'Persoon4@example.com', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       (5, 9999999999, 'Persoon5@example.com', 1, 'Geen opmerkingen', sysdate(6), sysdate(6));

CREATE TABLE `Adres`(
    `id` 					BIGINT 			NOT NULL 	AUTO_INCREMENT 	PRIMARY KEY,
    `PersoonId` 			BIGINT 			NOT NULL,
    `Plaats` 				VARCHAR(255) 	NOT NULL,
    `Straat` 				VARCHAR(255) 	NOT NULL,
    `Huisnummer` 			INT 			NOT NULL,
    `Toevoeging` 			VARCHAR(255) 	NOT NULL,
    `Postcode` 				VARCHAR(7) 		NOT NULL,
    `IsActive` 				BIT 			NOT NULL  	DEFAULT 1,
    `Opmerking` 			Varchar(300) 	NULL,
    `DatumAangemaakt` 		TIMESTAMP 		NOT NULL 	DEFAULT CURRENT_TIMESTAMP,
    `DatumGewijzigd` 		TIMESTAMP 		NOT NULL    DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`PersoonId`)	REFERENCES `Persoon` (`Id`)
)ENGINE = InnoDB;

INSERT INTO `Adres` (`PersoonId`, `Plaats`, `Straat`, `Huisnummer`, `Toevoeging`, `Postcode`, `IsActive`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`)
VALUES ('1', 'Amsterdam', 'Keizersgracht', 123, 'A', '1234 AB', 1, 'Geen opmerkingen', sysdate(6), sysdate(6)),
       ('2', 'Rotterdam', 'Willemskade', 456, 'B', '5678 CD', 1, 'Actief adres', sysdate(6), sysdate(6)),
       ('3', 'Den Haag', 'Lange Voorhout', 789, 'C', '9012 EF', 0, 'Niet meer actief', sysdate(6), sysdate(6)),
       ('4', 'Utrecht', 'Oudegracht', 111, 'D', '3456 GH', 1, NULL, sysdate(6), sysdate(6)),
	   ('5', 'Groningen', 'Grote Markt', 999, 'E', '7890 IJ', 1, 'Belangrijk adres', sysdate(6), sysdate(6));






