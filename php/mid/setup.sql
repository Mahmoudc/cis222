CREATE TABLE midterm_animals(
animal_index BIGINT NOT NULL AUTO_INCREMENT,
animal_type varchar(50) NOT NULL,
animal_breed varchar(50) NOT NULL,
checked_in DATE NULL,
checked_out DATE DEFAULT NULL,
PRIMARY KEY(animal_index)
);
insert into midterm_animals(animal_index, animal_type, animal_breed, checked_in, checked_out)
values(NULL,'Dog', 'Golden','2019-10-12', NULL),
(NULL,'Cat', 'Tabbi','2019-10-10', NULL),
(NULL,'Reptile', 'Turtle','2019-10-09', NULL);