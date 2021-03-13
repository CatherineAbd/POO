select *, IF(id_city=1, 'oui', 'non') from agency;

select * from user;

select * from agency a
join city c on a.id_city = c.id;

select a.id from agency a
join parkcar p on p.id_agency = a.id
where a.id = 1;

select * from parkcar p
join car c on c.id = p.id_car;

select * from brandcar;
update brandcar set brand = 'RENAULT' where id = 2;

select * from modelcar;
select * from brandcar;
update modelcar set model = "TWINGO" where id = 3;

select * from car;

select * from categorycar;

select p.id, p.nbKm, p.archived, co.color, m.model, b.brand from parkcar p
join car c on p.id_car = c.id
join modelcar m on m.id = c.id_modelCar
join brandcar b on b.id = c.id_brandCar
join color co on co.id = p.id_color
where p.id_agency = 2;

select * from user;
update user set id_agency = 2 where id = 10;

select p.id, p.nbKm, p.archived, co.color from parkcar p
join color co on co.id = p.id_color;

select * from user;

update user set id_agency = 3 where id = 2;

select * from parkcar;

select p.id, p.id_car, p.nbKm, p.archived, p.id_color
from parkcar p
join car c on c.id = p.id_car
-- join modelcar m on m.id = c.id_modelCar
where p.id_agency = 2;

insert into parkcar values
(2, 500, 0, 2, 3, 2);

select * from booking;
update booking set startEnd = "2021-03-14";
update booking set id_agRecovering = 2;

delete from booking;

select b.id, b.id_parkcar, b.id_customer, b.startDate, b.startEnd, b.price, b.typeBooking, b.nbKm, b.archived, a.name nameAg, s.state, a2.name nameAgRecov, c.lastname, c.email, co.color, m.model, br.brand from booking b
join parkcar p on p.id = b.id_parkCar
join color co on co.id = p.id_color
join car ca on ca.id = p.id_car
join modelCar m on m.id = ca.id_modelCar
join brandCar br on br.id = ca.id_brandCar
join agency a on a.id = p.id_agency
join statebooking s on s.id = b.id_stateBooking
join customer c on c.id = b.id_customer
join agency a2 on a2.id = b.id_agRecovering;
-- where p.id_agency = 1;

delete from booking;

select * from customer;

select * from statebooking;



