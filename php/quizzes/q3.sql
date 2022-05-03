/**
 * q3.txt
 *
 * Quiz 3 for your enjoyment
 *
 * @category   Quiz
 * @package    Quiz 3
 * @author     Mahmoud Chahine <mhchahine2@hawkmail.hfcc.edu>
 * @version    2019.09.26
 * @grade		10.5 / 10
 */

/* 4/4 pts
1. Your IT department has been tasked with keeping track of all hardware in your organizations.
	Create a database table to store this information in. All queries in this quiz refer to this table.
	Name the table hardware and give it 8 fields, the field information is below.
		hardware_id is a whole number that can get very large, it should be the primary key of the table.
		user_id is also a whole number that can get very large, it should link to the id of the user who owns the device.
		value should track the cost or value of the machine.
		serial_num is a string of numbers and letters used to identify the machine by the manufacturer.
		notes should store any amount of text based notes about the machine, such is if it went for service or has a virus.
		created_date should store when the machine was purchased, so this field should never be null.
		updated_date should store when the machine was modified, this field can be null by default.
		deleted_date should store when the machine was retired, so null by default.
*/
CREATE TABLE hardware(hardware_id BIGINT NOT NULL AUTO_INCREMENT,
user_id BIGINT NOT NULL,
value DOUBLE,
serial_num VARCHAR(100),
notes LONGTEXT,
created_date DATE NOT NULL,
updated_date DATE DEFAULT NULL,
deleted_date DATE DEFAULT NULL,
PRIMARY KEY(hardware_id));

-- 2.5/3 pts
-- 2. Write an insert statement that will insert 3 rows of data into this table.
-- You can make the data up but it should make sense. Feel free to ask me if you need an examples.
INSERT INTO hardware(hardware_id, user_id, value, serial_num, notes, created_date, updated_date, deleted_date)
VALUES (NULL, 1, 400, '223ASDF', 'PRODUCT 1', NOW(), '2002-12-03', '2005-10-09'),
(NULL, 2, 800, '223DSSF', 'PRODUCT 2', '2001-10-10', '2002-12-03', '2005-10-09'),
(NULL, 3, 7600, '223FKDF', 'PRODUCT 3', '2001-10-10', '2002-12-03', '2005-10-09');

-- 1/1 pts
-- 3. Write an update statement that will retire any machine that has a hardware id value of 4.
-- This is done by populating the retire date field and adding a note that says "RETIRED!"
UPDATE `hardware`
SET `notes` = "RETIRED!" AND `deleted_date` = NOW( )
WHERE `hardware_id` = 4;

-- 1/1 pts
-- 4. Write a select statement that will show me the top 5 most expensive pieces of hardware, but do not include any that are retired.
SELECT *
FROM `hardware`
WHERE `deleted_date` IS NULL
ORDER BY `value` DESC
LIMIT 5;

-- 1/1 pt
-- 5. Which engine did I go over that is newer and more efficient than MyISAM?
innoDB

-- 1/1 pt
-- Ex: Write a single statement that will remove all the data from your table and reset the auto_increment to 1.
-- You cannot use the word DROP.
TRUNCATE TABLE `hardware`;