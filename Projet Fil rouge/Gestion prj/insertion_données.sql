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

