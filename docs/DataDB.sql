 -- Necesary basic catalog data
 INSERT INTO permissions(description) VALUE ('Read');
 INSERT INTO permissions(description) VALUE ('Write');
 INSERT INTO permissions(description) VALUE ('All');
 
 INSERT INTO modules(name) VALUE ('factors');
 INSERT INTO modules(name) VALUE ('surveys');
 INSERT INTO modules(name) VALUE ('users');
 INSERT INTO modules(name) VALUE ('account');

-- Super admin role
 INSERT INTO roles (description) VALUE ('Super');

-- Poll aplicator and generator role
 INSERT INTO roles (description) VALUE ('Admin');

-- User role, single permisions, only can response
 INSERT INTO roles (description) VALUE ('User');

-- Base super user in system
 INSERT INTO users(`email`,`name`,`password`,`active`,`last_login`,`register_date`) VALUES('super@local.com','super', '$2y$10$sR9bSd2p1AWtHu9FumE67O33yzucHJ.WHeyLYsBR1NStxF0gTmR1W', TRUE, NOW(),NOW());

-- Secondary admin user in system is like poller
 INSERT INTO users(`email`,`name`,`password`,`active`,`last_login`,`register_date`) VALUES('admin@local.com','admin', '$2y$10$Uc2logJhqGF1LOG/FevQ9eLUbBJb23y9NdCEHvev.kMecdx.kuA2a', TRUE, NOW(),NOW());
 
-- Give permissions to Super user
 INSERT INTO module_access(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUE (1,1,3);
 INSERT INTO module_access(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUE (1,2,3);
 INSERT INTO module_access(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUE (1,3,3);
 INSERT INTO module_access(user_types_iduser_type,modules_idmodule,permissions_idpermission) VALUE (1,4,3);
 
-- Asign roles to base users
 INSERT INTO user_roles (users_iduser, roles_idrol ) VALUE (1, 1);
 INSERT INTO user_roles (users_iduser, roles_idrol ) VALUE (2, 3);
 
-- Create users relation, is only sample to see function of relations
 INSERT INTO user_relations (users_iduser_admin, users_iduser_user) VALUE (1, 2); 