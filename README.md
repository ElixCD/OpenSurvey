# OurVoice Survey System
A little and simple survey system.

Is an excercise of PHP with OOP, the actual state is incomplete core and some modules are finished.

Require PHP 7.4.4+ with pdo_mysql, Composer 2.0.9+, MySQL 5+ or MariaDB 10.4+.

App Installation
+ Clone/download source code into web directory
+ Execute 'composer install' in terminal
+ Change name to .env_example file to .env and modify enviroment values correspond to your machine and database server.

DB Installation
+ Enter docs directory and find OurVoice.sql file
+ Log mysql and execute next command:
    source OurVoice.sql
* Grant permissions to your user
* Add initial data: 
    source DataDB.sql
