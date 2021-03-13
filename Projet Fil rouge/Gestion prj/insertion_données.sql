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
(8, 350, 3, 'manuelle', 5, 35, false, 'VOLKSWAGEN POLO.jpg', 7, 29, 1),
(9, 700, 5, 'auto', 5, 75, false,  'CITROEN JUMPER.jpg', 6, 33, 2),
(10, 420, 3, 'auto', 5, 25, false, 'CITROEN C3 II.jpg', 6, 32, 1),
(11, 500, 5, 'manuelle', 5, 45, false, 'HYUNDAI I20.jpg', 8, 31, 6),
(12, 340, 5, 'manuelle', 3, 20, false, 'RENAULT CLIO.jpg', 2, 4, 1),
(13, 610, 5, 'auto', 5, 70, false, 'FIAT SCUDO.jpg', 9, 30, 2),
(14, 350, 5, 'auto', 5, 38, false, 'VOLKSWAGEN POLO.jpg', 7, 29, 4),
(15, 420, 5, 'manuelle', 5, 50, false, 'VOLKSWAGEN GOLF.jpg', 7, 28, 6),
(16, 850, 3, 'manuelle', 3, 95, false, 'MERCEDES SPRINTER.jpg', 10, 27, 5),
(17, 480, 5, 'manuelle', 5, 50, false, 'PEUGEOT 308.jpg', 1, 2, 6),
(18, 675, 9, 'manuelle', 5, 80, false, 'PEUGEOT EXPERT.jpg', 1, 26, 2),
(19, 340, 3, 'auto', 5, 20, false, 'RENAULT CLIO.jpg', 2, 4, 1),
(20, 360, 3, 'auto', 5, 23, false, 'PEUGEOT 207.jpg', 1, 25, 1),
(21, 290, 4, 'manuelle', 3, 19, false, 'FIAT 500.jpg', 9, 24, 1),
(22, 550, 7, 'manuelle', 5, 60, false, 'RENAULT SCENIC II.jpg', 2, 23, 2),
(23, 410, 5, 'auto', 4, 50, false, 'RENAULT MEGANE.jpg', 2, 22, 6),
(24, 320, 5, 'manuelle', 3, 25, false, 'NISSAN MICRA.jpg', 5, 21, 1),
(25, 360, 5, 'auto', 5, 30, false, 'RENAULT CLIO III.jpg', 2, 16, 1),
(26, 490, 5, 'manuelle', 5, 50, false, 'CITROEN C4.jpg', 6, 20, 6),
(27, 340, 5, 'auto', 5, 25, false, 'RENAULT CLIO.jpg', 2, 4, 1),
(28, 450, 5, 'auto', 5, 45, false, 'SUZUKI SX4.jpg', 11, 19, 3),
(29, 340, 5, 'manuelle', 5, 60, false, 'AUDI A3.jpg', 12, 18, 6),
(30, 850, 3, 'manuelle', 3, 95, false, 'RENAULT TRAFIC.jpg', 2, 17, 5),
(31, 530, 5, 'manuelle', 5, 33, false, 'PEUGEOT 207 SW.jpg', 1, 8, 1),
(32, 360, 5, 'manuelle', 5, 28, false, 'RENAULT CLIO III.jpg', 2, 16, 1),
(33, 550, 5, 'manuelle', 5, 50, false, 'CITROEN C5.jpg', 6, 15, 6),
(34, 530, 7, 'manuelle', 5, 60, false, 'OPEL MERIVA.jpg', 13, 14, 2),
(35, 360, 5, 'manuelle', 5, 25, false, 'PEUGEOT 206.jpg', 1, 13, 1),
(36, 240, 2, 'manuelle', 2, 19, false, 'DAIHATSU TERIOS.jpg', 14, 12, 1),
(37, 300, 5, 'auto', 3, 19, false, 'RENAULT TWINGO.jpg', 2, 3, 1),
(38, 360, 5, 'manuelle', 5, 70, false, 'AUDI A3 SPORTBACK.jpg', 12, 11, 6),
(39, 300, 5, 'manuelle', 5, 15, false, 'RENAULT TWINGO.jpg', 2, 3, 1),
(40, 355, 5, 'manuelle', 3, 45, false, 'VOLKSWAGEN COCCINELLE.jpg', 7, 10, 1),
(41, 880, 3, 'manuelle', 3, 105, false, 'IVECO DAILY.jpg', 15, 9, 5),
(42, 530, 5, 'auto', 5, 39, false, 'PEUGEOT 207 SW.jpg', 1, 8, 1),
(43, 400, 5, 'manuelle', 5, 50, false, 'KIA STONIC.jpg', 16, 7, 6),
(44, 360, 5, 'auto', 5, 100, false, 'TESLA MODEL 3.jpg', 17, 6, 6),
(45, 290, 5, 'auto', 3, 27, false, 'RENAULT TWINGO II.jpg', 2, 5, 1);

insert into parkcar values
(1, 400, false, 1, 1, 1);

select * from parkcar;
delete from parkcar where id = 103;

insert into statebooking values
(1, 'Réservé'),
(2, 'En cours'),
(3, 'Restitué');

INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (4,4324,FALSE,2,40,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (5,3692,FALSE,1,6,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (6,3152,FALSE,5,13,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (7,946,FALSE,2,39,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (8,579,FALSE,5,35,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (9,872,FALSE,2,37,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (10,2538,FALSE,2,21,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (11,3720,FALSE,5,24,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (12,270,FALSE,3,11,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (13,1542,FALSE,4,8,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (14,4034,FALSE,1,24,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (15,4166,FALSE,1,40,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (16,2033,FALSE,5,25,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (17,1888,FALSE,3,10,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (18,4380,FALSE,4,34,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (19,135,FALSE,2,16,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (20,2281,FALSE,1,39,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (21,2909,FALSE,6,5,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (22,1238,FALSE,3,35,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (23,1382,FALSE,4,5,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (24,4015,FALSE,4,11,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (25,4035,FALSE,1,34,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (26,3022,FALSE,1,17,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (27,4280,FALSE,6,30,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (28,2593,FALSE,1,37,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (29,3294,FALSE,1,1,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (30,2186,FALSE,6,18,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (31,2098,FALSE,4,4,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (32,4577,FALSE,5,27,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (33,1899,FALSE,4,34,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (34,3188,FALSE,6,23,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (35,3121,FALSE,4,38,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (36,677,FALSE,5,44,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (37,3154,FALSE,5,35,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (38,2367,FALSE,5,14,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (39,2258,FALSE,3,33,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (40,712,FALSE,4,7,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (41,1449,FALSE,6,19,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (42,1344,FALSE,1,20,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (43,2018,FALSE,1,23,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (44,516,FALSE,3,40,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (45,4079,FALSE,1,18,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (46,779,FALSE,3,6,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (47,2607,FALSE,3,21,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (48,1572,FALSE,6,42,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (49,1966,FALSE,4,29,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (50,4758,FALSE,4,38,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (51,303,FALSE,5,42,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (52,120,FALSE,5,9,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (53,3568,FALSE,6,1,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (54,1626,FALSE,4,29,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (55,4098,FALSE,6,12,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (56,704,FALSE,4,21,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (57,2728,FALSE,4,5,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (58,3491,FALSE,6,40,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (59,345,FALSE,6,26,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (60,35,FALSE,3,28,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (61,1972,FALSE,6,41,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (62,1685,FALSE,4,33,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (63,4357,FALSE,2,43,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (64,2312,FALSE,6,24,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (65,4919,FALSE,2,26,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (66,217,FALSE,5,17,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (67,2330,FALSE,6,36,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (68,3166,FALSE,4,1,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (69,3494,FALSE,4,1,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (70,1163,FALSE,6,7,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (71,2604,FALSE,4,9,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (72,3845,FALSE,5,30,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (73,3560,FALSE,4,45,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (74,4409,FALSE,3,14,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (75,926,FALSE,4,12,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (76,2444,FALSE,3,13,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (77,4483,FALSE,1,12,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (78,2878,FALSE,1,45,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (79,1288,FALSE,2,19,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (80,3593,FALSE,3,13,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (81,1479,FALSE,6,28,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (82,4563,FALSE,2,17,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (83,2665,FALSE,2,11,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (84,1651,FALSE,1,6,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (85,721,FALSE,5,14,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (86,4981,FALSE,1,32,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (87,3388,FALSE,3,45,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (88,3076,FALSE,1,36,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (89,3995,FALSE,6,31,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (90,2594,FALSE,1,6,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (91,2486,FALSE,1,27,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (92,2223,FALSE,6,3,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (93,795,FALSE,6,4,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (94,1245,FALSE,2,35,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (95,3470,FALSE,2,37,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (96,3314,FALSE,4,11,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (97,2440,FALSE,1,17,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (98,2491,FALSE,4,42,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (99,3445,FALSE,5,32,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (100,3972,FALSE,3,42,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (101,410,FALSE,1,23,2);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (102,1116,FALSE,3,6,3);
INSERT INTO `parkcar` (`id`,`nbKm`,`archived`,`id_color`,`id_car`,`id_agency`) VALUES (103,1739,FALSE,4,11,3);