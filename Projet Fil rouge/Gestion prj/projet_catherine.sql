CREATE DATABASE locaauto CHARACTER SET 'utf8';

USE locaauto;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: city
#------------------------------------------------------------

CREATE TABLE city(
        id       Int  Auto_increment  NOT NULL ,
        nameCity Varchar (50) NOT NULL
	,CONSTRAINT city_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: customer
#------------------------------------------------------------

CREATE TABLE customer(
        id        Int  Auto_increment  NOT NULL ,
        lastname  Varchar (50) NOT NULL ,
        firstname Varchar (50) NOT NULL ,
        password  Varchar (50) NOT NULL ,
        birthdate Date NOT NULL ,
        phone     Varchar (20) ,
        email     Varchar (50) NOT NULL ,
        address   Varchar (50) ,
        zipcode   Varchar (50) ,
        depositOk Bool NOT NULL ,
        archived  Bool NOT NULL ,
        id_city   Int NOT NULL
	,CONSTRAINT customer_PK PRIMARY KEY (id)

	,CONSTRAINT customer_city_FK FOREIGN KEY (id_city) REFERENCES city(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: roleUser
#------------------------------------------------------------

CREATE TABLE roleUser(
        id   Int  Auto_increment  NOT NULL ,
        role Varchar (50) NOT NULL
	,CONSTRAINT roleUser_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: agency
#------------------------------------------------------------

CREATE TABLE agency(
        id       Int  Auto_increment  NOT NULL ,
        name     Varchar (50) NOT NULL ,
        phone    Varchar (20) NOT NULL ,
        email    Varchar (50) NOT NULL ,
        address  Varchar (50) NOT NULL ,
        zipcode  Varchar (50) NOT NULL ,
        archived Bool NOT NULL ,
        id_city  Int NOT NULL
	,CONSTRAINT agency_PK PRIMARY KEY (id)

	,CONSTRAINT agency_city_FK FOREIGN KEY (id_city) REFERENCES city(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        id          Int  Auto_increment  NOT NULL ,
        lastname    Varchar (50) NOT NULL ,
        firstname   Varchar (50) NOT NULL ,
        password    Varchar (50) NOT NULL ,
        archived    Bool NOT NULL ,
        id_roleUser Int NOT NULL ,
        id_agency   Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (id)

	,CONSTRAINT user_roleUser_FK FOREIGN KEY (id_roleUser) REFERENCES roleUser(id)
	,CONSTRAINT user_agency0_FK FOREIGN KEY (id_agency) REFERENCES agency(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: stateBooking
#------------------------------------------------------------

CREATE TABLE stateBooking(
        id    Int  Auto_increment  NOT NULL ,
        state Varchar (15) NOT NULL
	,CONSTRAINT stateBooking_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: color
#------------------------------------------------------------

CREATE TABLE color(
        id    Int  Auto_increment  NOT NULL ,
        color Varchar (10) NOT NULL
	,CONSTRAINT color_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: modelCar
#------------------------------------------------------------

CREATE TABLE modelCar(
        id    Int  Auto_increment  NOT NULL ,
        model Varchar (20) NOT NULL,
        id_brand Int NOT NULL
	,CONSTRAINT modelCar_PK PRIMARY KEY (id)
	,CONSTRAINT car_brandCar_FK FOREIGN KEY (id_brandCar) REFERENCES brandCar(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: brandCar
#------------------------------------------------------------

CREATE TABLE brandCar(
        id    Int  Auto_increment  NOT NULL ,
        brand Varchar (20) NOT NULL
	,CONSTRAINT brandCar_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: categoryCar
#------------------------------------------------------------

CREATE TABLE categoryCar(
        id       Int  Auto_increment  NOT NULL ,
        category Varchar (20) NOT NULL
	,CONSTRAINT categoryCar_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: car
#------------------------------------------------------------

CREATE TABLE car(
        id             Int  Auto_increment  NOT NULL ,
        carBoot        Int NOT NULL ,
        nbPlaces       Int NOT NULL ,
        gearBox        Varchar (10) NOT NULL ,
        nbDoors        Int NOT NULL ,
        price          Int NOT NULL ,
        archived       Bool NOT NULL ,
        pathImg        Varchar (100) NOT NULL ,
        id_brandCar    Int NOT NULL ,
        id_modelCar    Int NOT NULL ,
        id_categoryCar Int NOT NULL
	,CONSTRAINT car_PK PRIMARY KEY (id)

	,CONSTRAINT car_brandCar_FK FOREIGN KEY (id_brandCar) REFERENCES brandCar(id)
	,CONSTRAINT car_modelCar0_FK FOREIGN KEY (id_modelCar) REFERENCES modelCar(id)
	,CONSTRAINT car_categoryCar1_FK FOREIGN KEY (id_categoryCar) REFERENCES categoryCar(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: parkCar
#------------------------------------------------------------

CREATE TABLE parkCar(
        id        Int  Auto_increment  NOT NULL ,
        nbKm      Int NOT NULL ,
        archived  Bool NOT NULL ,
        id_color  Int NOT NULL ,
        id_car    Int NOT NULL ,
        id_agency Int NOT NULL
	,CONSTRAINT parkCar_PK PRIMARY KEY (id)

	,CONSTRAINT parkCar_color_FK FOREIGN KEY (id_color) REFERENCES color(id)
	,CONSTRAINT parkCar_car0_FK FOREIGN KEY (id_car) REFERENCES car(id)
	,CONSTRAINT parkCar_agency1_FK FOREIGN KEY (id_agency) REFERENCES agency(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Booking
#------------------------------------------------------------

CREATE TABLE Booking(
        id              Int  Auto_increment  NOT NULL ,
        startDate       Datetime ,
        startEnd        Datetime ,
        price           Float NOT NULL ,
        typeBooking     Varchar (15) NOT NULL ,
        id_agRecovering Int NOT NULL ,
        nbKm            Int ,
        archived        Bool NOT NULL ,
        id_stateBooking Int NOT NULL ,
        id_customer     Int NOT NULL ,
        id_parkCar      Int NOT NULL
	,CONSTRAINT Booking_PK PRIMARY KEY (id)

	,CONSTRAINT Booking_stateBooking_FK FOREIGN KEY (id_stateBooking) REFERENCES stateBooking(id)
	,CONSTRAINT Booking_customer0_FK FOREIGN KEY (id_customer) REFERENCES customer(id)
	,CONSTRAINT Booking_parkCar1_FK FOREIGN KEY (id_parkCar) REFERENCES parkCar(id)
)ENGINE=InnoDB;

