 INSERT INTO permissions(description) VALUE ('Read');
 INSERT INTO permissions(description) VALUE ('Write');
 INSERT INTO permissions(description) VALUE ('All');
 
 INSERT INTO modules(name) VALUE ('factors');
 INSERT INTO modules(name) VALUE ('surveys');
 INSERT INTO modules(name) VALUE ('users');
 INSERT INTO modules(name) VALUE ('account');

 INSERT INTO roles (description) VALUE ('Super');
 INSERT INTO roles (description) VALUE ('Admin');
 INSERT INTO roles (description) VALUE ('User');

 INSERT INTO users(email,`name`,`password`,`active`,`last_login`,`register_date`) VALUES('admin@local.com','admin', '12345', TRUE, NOW(),NOW());
