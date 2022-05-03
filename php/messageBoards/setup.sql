create table Posts(
postId BIGINT NOT NULL AUTO_INCREMENT,
title varchar(64) not null,
content longtext not null,
author longtext not null,
author longtext not null,
created_date datetime not null,
updated_date datetime default null,
removed_date datetime default null,
PRIMARY KEY(postId);
);
create table commentId(
commentId BIGINT NOT NULL AUTO_INCREMENT,
content longtext not null,
author longtext not null,
author longtext not null,
created_date datetime not null,
updated_date datetime default null,
removed_date datetime default null,
PRIMARY KEY(postId);
);