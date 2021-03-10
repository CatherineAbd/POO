insert into roleuser (role) values
('superviseur'), ('employé');

insert into city (nameCity) values
('Le Havre'), ('Caen'), ('Rouen');

insert into agency values
(1, 'Admin', '0', 'lhcentre@locaauto.fr', "pas d'adresse", 0, FALSE, 1),
(2, 'LH centre', '0235101112', 'lhcentre@locaauto.fr', '74 rue des Alpes', '76600', FALSE, 1),
(3, 'Caen', '0237202122', 'caen@locaauto.fr', '7 rue du Havre', '14000', FALSE, 2);

insert into user values
(1, 'Abdmeziem', 'Catherine', 'pouet', FALSE, 1, 1),
(2, 'Tokilebon', 'Olga', 'olga', FALSE, 2, 3);

insert into color values
(1, 'rouge'),
(2, 'bleu'),
(3, 'blanc'),
(4, 'noir'),
(5, 'gris'),
(6, 'vert');

insert into brandcar values
(1, 'PEUGEOT'),
(2, 'RENAULT'),
(3, 'FORD'),
(4, 'SKODA'),
(5, 'NISSAN'),
(6, 'CITROEN'),
(7, 'VOLKSWAGEN'),
(8, 'HYUNDAI'),
(9, 'FIAT'),
(10, 'MERCEDES'),
(11, 'SUZUKI'),
(12, 'AUDI'),
(13, 'OPEL'),
(14, 'DAIHATSU'),
(15, 'IVECO'),
(16, 'KIA'),
(17, 'TESLA')
;

insert into modelcar values
(1, '208', 1),
(2, '308', 1),
(3, 'TWINGO', 2),
(4, 'CLIO', 2),
(5, 'TWINGO II', 2),
(6, 'MODEL 3', 17),
(7, 'STONIC', 16),
(8, '207 SW', 1),
(9, 'DAILY', 15),
(10, 'COCCINELLE', 7),
(11, 'A3 SPORTBACK', 12),
(12, 'TERIOS', 14),
(13, '206', 1),
(14, 'MERIVA', 13),
(15, 'C5', 6),
(16, 'CLIO III', 2),
(17, 'TRAFIC', 2),
(18, 'A3', 12),
(19, 'SX4', 11),
(20, 'C4', 6),
(21, 'MICRA', 5),
(22, 'MEGANE', 2),
(23, 'SCENIC II', 2),
(24, '500', 9),
(25, '207', 1),
(26, 'EXPERT', 1),
(27, 'SPRINTER', 10),
(28, 'GOLF', 7),
(29, 'POLO', 7),
(30, 'SCUDO', 9),
(31, 'I20', 8),
(32, 'C3 II', 6),
(33, 'JUMPER', 6),
(34, 'CLIO II', 2),
(35, 'JUMPY', 6),
(36, 'NOTE', 5),
(37, 'FABIA', 4),
(38, 'FOCUS', 3);

;

insert into categorycar values
(1, 'citadine'),
(2, 'monospace'),
(3, 'suv'),
(4, 'électrique'),
(5, 'utilitaire'),
(6, 'berline');

insert into car values
(2, 540, 5, 'manuelle', 5, 40, false, 'SKODA FABIA.jpg', 4, 37, 1),
(3, 325, 7, 'manuelle', 5, 40, false, 'NISSAN NOTE.jpg', 5, 36, 2),
(4, 650, 5, 'manuelle', 5, 55, false, 'CITROEN JUMPY.jpg', 6, 35, 2),
(5, 400, 3, 'auto', 5, 25, false, 'PEUGEOT 208.jpg', 1, 1, 1),
(6, 350, 5, 'auto', 3, 25, false, 'RENAULT CLIO II.jpg', 2, 34, 1),
(7, 700, 3, 'manuelle', 3, 70, false, 'CITROEN JUMPER.jpg', 6, 33, 5),
(8, 350, 3, 'manuelle', 5, 35, false, 'VOLKSWAGEN POLO.JPG', 7, 29, 1),
(9, 700, 5, 'auto', 5, 75, false,  'CITROEN JUMPER.JPG', 6, 33, 2),
(10, 420, 3, 'auto', 5, 25, false, 'CITROEN C3 II.jpg', 6, 32, 1),
(11, 500, 5, 'manuelle', 5, 45, false, 'HYUNDAI I20.jpg', 8, 31, 6),
(12, 340, 5, 'manuelle', 3, 20, false, 'RENAULT CLIO.jpg', 2, 4, 1),
(13, 610, 5, 'auto', 5, 70, false, 'FIAT SCUDO.jpg', 9, 30, 2),
(14, 350, 5, 'auto', 5, 38, false, 'VOLKSWAGEN POLO.JPG', 7, 29, 4),
(15, 420, 5, 'manuelle', 5, 50, false, 'VOLKSWAGEN GOLF.JPG', 7, 28, 6),
(16, 850, 3, 'manuelle', 3, 95, false, 'MERCEDES SPRINTER.jpg', 10, 27, 5),
(17, 480, 5, 'manuelle', 5, 50, false, 'PEUGEOT 308.jpg', 1, 2, 6),
(18, 675, 9, 'manuelle', 5, 80, false, 'PEUGEOT EXPERT.jpg', 1, 26, 2),
(19, 340, 3, 'auto', 5, 20, false, 'RENAULT CLIO.jpg', 2, 4, 1),
(20, 360, 3, 'auto', 5, 23, false, 'PEUGEOT 207.jpg', 1, 25, 1);

insert into parkcar values
(1, 400, false, 1, 1, 1);

select * from parkcar;



