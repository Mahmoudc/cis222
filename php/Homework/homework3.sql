--Author: Mahmoud Chahine
-- Homework: Homework 3
-- Date: 9/24/19-->
-- Grade: 10 / 10
create TABLE hw3_members(
memberId int NOT NULL AUTO_INCREMENT,
fullName varchar(50),
date date,
primary key(memberId)
);
--full name is refrenced from the teams table using member id-->
create TABLE hw3_teams(
teamId int NOT NULL AUTO_INCREMENT,
teamName varchar(50) not null,
memberId int not null,
date date,
foreign key(memberId) references hw3_members(memberId),
primary key(teamId)
);
insert into hw3_members(memberId, fullName, date) values(null, 'Mahmoud Chahine', '2005-10-12');
insert into hw3_teams(teamId, teamName, memberId, date) values(null, 'Tigers',1, '2005-10-12');
update hw3_teams set teamName='Lions' where memberId=1;
select * from hw3_members;
select  * from hw3_teams;
select  * from hw3_members join hw3_teams on hw3_members.memberId = hw3_teams.memberId;
delete from hw3_teams where memberId=1;
delete from hw3_members where memberId=1;