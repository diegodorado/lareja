truncate lareja_web_reservation;
insert into lareja_web_reservation (is_keeper,workshop_people,responsible_id,total_amount,created_at,updated_at) values 
(1,0,21,400,now(),now()),
(0,3,18,700,now(),now()),
(0,0,10,1000,now(),now());

truncate lareja_web_reservation_host;
insert into lareja_web_reservation_host (reservation_id,person_id,`from`,`to`,place_id) values
(1,3,"2017/09/22","2017/09/24",2),
(1,4,"2017/09/22","2017/09/24",2);

insert into lareja_web_reservation_host (reservation_id,person_id,`from`,`to`,place_id) values
(2,18,"2017/10/07","2017/10/08",2),
(2,19,"2017/10/07","2017/10/08",2),
(2,20,"2017/10/07","2017/10/08",2);

insert into lareja_web_reservation_host (reservation_id,person_id,`from`,`to`,place_id) values
(3,10,"2017/09/29","2017/10/01",1),
(3,11,"2017/09/29","2017/10/01",1),
(3,12,"2017/09/29","2017/10/01",1),
(3,13,"2017/09/30","2017/10/01",1),
(3,17,"2017/09/29","2017/10/01",2);

