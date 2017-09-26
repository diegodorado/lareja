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


insert into lareja_web_person (name,last_name,email,phone,is_master,created_at,updated_at) values
("Marina","Rojas","mrojas@gmail.com","11.2323.2323",1,now(),now()),
("Ricardo","Montecinos","rmontecinos@gmail.com","11.4545.3434",1,now(),now()),
("Maria Laura","Eceiza","mleceiza@gmail.com","11.2323.4545",1,now(),now());

insert into lareja_web_person (name,last_name,email,phone,is_master,created_at,updated_at) values
("Laura Abril","Campo Cordero","lacampocordero@gmail.com","11.3535.5757",1,now(),now()),
("Gaspar","Sitglich","gstiglich@yahoo.com","11.3322.4545",1,now(),now()),
("Stina","Satz","ssatz@suecia.com","11.3322.4543",1,now(),now()),
("Tamara","Ferrer","tferrer@yahoo.com","11.2223.4452",1,now(),now()),
("Alejandro","Ferrer","aferrer@yahoo.com","11.2225.4343",1,now(),now()),
("Alejandro","Loiacono","aloiacono@outlook.com","11.3367.3322",1,now(),now()),
("Sandra","Pampurro","spampurro@gmail.com","11.2223.2242",1,now(),now()),
("Javier Zaldarriaga","jzaldarriaga@gmail.com","11.2223.3432","",1,now(),now()),
("Jorge","Zaldarriaga","jzaldarriagajr@gmail.com","11.2224.2325",1,now(),now()),
("Patricia","Segovia","psegovia@gmail.com","11.2224.2326",1,now(),now()),
("Patricia Celia","Centurión","pccenturion@gmail.com","11.2224.2327",1,now(),now()),
("Diego","Rodriguez","drodriguez@yahoo.com","11.2224.2328",1,now(),now()),
("Pablo","López","plopez@gmail.com","11.2224.2329",1,now(),now()),
("Romina","Vidal Zihno","rvidalzihno@yahoo.com","11.2224.2330",1,now(),now()),
("Nacho","Arruez","narruez@gmail.com","11.2224.2331",1,now(),now()),
("Osvaldo","Sosa","ososa@gmail.com","11.2224.2332",1,now(),now()),
("Claudia","Álvarez","calvarez@gmail.com","11.2224.2333",1,now(),now()),
("Noelia","Rufat","nrufat@gmail.com","11.2224.2334",1,now(),now()),
("Sol","Nassif","snassif@gmail.com","11.2224.2335",1,now(),now()),
("Nicolás","Blanco","nblanco@gmail.com","11.2224.2336",1,now(),now()),
("Alejandro","Drandich","phil@gmail.com","11.2224.2337",1,now(),now()),
("Flor","Uruzuna","furuzuna@gmail.com","11.2224.2338",1,now(),now()),
("Fede","Visani","falgo@gmail.com","11.2224.2339",1,now(),now()),
("Cecilia","Frontini","cfrontini@outlook.com","11.2224.2340",1,now(),now()),
("José","Visani","jvisani@gmail.com","11.2224.2341",1,now(),now()),
("Carina","Fichera","cfichera@gmail.com","11.2224.2342",1,now(),now()),
("Armengol","Espíritu","aespiritu@gmail.com","11.2224.2343",1,now(),now());


