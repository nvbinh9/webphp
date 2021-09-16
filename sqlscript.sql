CREATE DATABASE webphp;

CREATE TABLE `webphp`.`admin` ( `admin_id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `username` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `admin_name` VARCHAR(255) NOT NULL , `level` INT(30) NOT NULL , PRIMARY KEY (`admin_id`)) ENGINE = InnoDB;

CREATE TABLE `webphp`.`category` ( `category_id` INT NOT NULL AUTO_INCREMENT , `category_name` VARCHAR(255) NOT NULL , PRIMARY KEY (`category_id`)) ENGINE = InnoDB;

CREATE TABLE `webphp`.`brand` ( `brand_id` INT NOT NULL AUTO_INCREMENT , `brand_name` VARCHAR(255) NOT NULL , PRIMARY KEY (`brand_id`)) ENGINE = InnoDB;

CREATE TABLE `webphp`.`product` ( `product_id` INT(11) NOT NULL AUTO_INCREMENT , `product_name` VARCHAR(255) NOT NULL , `category_id` INT NOT NULL , `brand_id` INT NOT NULL , `description` TEXT NOT NULL , `type` INT NOT NULL , `price` VARCHAR(255) NOT NULL , `image` VARCHAR(255) NOT NULL , PRIMARY KEY (`product_id`)) ENGINE = InnoDB;

CREATE TABLE `webphp`.`cart` ( `cart_id` INT NOT NULL AUTO_INCREMENT , `product_id` INT NOT NULL , `product_name` INT NOT NULL , `session_id` VARCHAR(255) NOT NULL , `price` VARCHAR(255) NOT NULL , `quantity` INT NOT NULL , `image` VARCHAR(255) NOT NULL , PRIMARY KEY (`cart_id`)) ENGINE = InnoDB;

CREATE TABLE `webphp`.`customer` ( `customer_id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `password` INT NOT NULL , `address` VARCHAR(255) NOT NULL , `phone` VARCHAR(50) NOT NULL , `email` VARCHAR(100) NOT NULL, PRIMARY KEY (`customer_id`) ) ENGINE = InnoDB;
