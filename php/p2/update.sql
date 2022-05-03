create  table user_job_request(
    request_id BIGINT NOT NULL AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    project_name VARCHAR(100) NOT NULL,
    project_description LONGTEXT NOT NULL,
    project_deadline DATE DEFAULT NULL,
    project_cost_minimum DOUBLE NOT NULL,
    project_cost_maximum DOUBLE NOT NULL,
    status VARCHAR(30) DEFAULT NULL,
    progress FLOAT DEFAULT NULL,
    PRIMARY KEY(request_id)
);
create table cart (
    cartId BIGINT NOT NULL AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    productId BIGINT NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    product_number VARCHAR(50) NOT NULL,
    product_description LONGTEXT NOT NULL,
    product_price DOUBLE NOT NULL,
    primary key(cartId)
);
create table orders(
    order_id BIGINT NOT NULL AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    total_price DOUBLE,
    date_ordered DATETIME,
    primary key(order_id)
);
create table order_items(
    order_item_id BIGINT NOT NULL AUTO_INCREMENT,
    order_id BIGINT NOT NULL,
    product_id BIGINT NOT NULL,
    price DOUBLE NOT NULL,
    primary key(order_item_id)
);