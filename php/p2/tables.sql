CREATE TABLE contact(
    contact_id BIGINT NOT NULL AUTO_INCREMENT,
    name varchar (50) NOT NULL,
    email VARCHAR(75) NOT NULL,
    phone VARCHAR(50),
    message LONGTEXT NOT NULL,
    PRIMARY KEY(contact_id)
);
CREATE TABLE products(
    product_id INT NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(50) NOT NULL,
    product_number VARCHAR(50) NOT NULL,
    product_description LONGTEXT NOT NULL,
    product_price DOUBLE NOT NULL,
    PRIMARY KEY(product_id)
);
insert into products(product_id, product_name, product_number, product_description, product_price) values(null, 'Face Invaders', '1_faceInvaders', 'This an arcade game I created with my friend moe in high school it was the final project. I was resposible for making all the game mechanics such as movement, character controls, level design, and my friend was resposible for creating game assets. You could check the game out here it is free to download and play. ', 0);
insert into products(product_id, product_name, product_number, product_description, product_price) values(null, 'Screen Manipulator', '1_screenManipulator', 'This a class I created that allows you to manipulate screen colors by just passing color name as a constructor then it will find the specific hexidecimal that matches the color name. This class allows to manipulate text and screen colors, text coordinates, and allows to simulate typing by the function text simulation and passing text into it. It will simulate a person typing text.', 0);
insert into products(product_id, product_name, product_description, product_price) values (null, 'Journal Recorder', 'This application allows you to create word documents and folders from within the application and open word documents. It helps you manage your documents.', 10);
update products set media='<iframe width="500" height="500" src="https://www.youtube.com/embed/pN3_kphGpIg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' where product_id=6;
CREATE TABLE users(
    user_id BIGINT NOT NULL AUTO_INCREMENT,
    user_firstName VARCHAR(50) NOT NULL,
    user_lastName VARCHAR(50) NOT NULL,
    email VARCHAR(75) NOT NULL,
    phone VARCHAR(50),
    password VARCHAR(100),
    PRIMARY KEY(user_id)
);
--Each user will be linked to an address in the address table
CREATE TABLE addresses(
address_id BIGINT NOT NULL AUTO_INCREMENT,
user_id BIGINT NOT NULL,
country VARCHAR(50),
province VARCHAR(50),
city VARCHAR(50),
address VARCHAR(50),
PRIMARY KEY(address_id)
);
