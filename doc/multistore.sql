drop database if exists multistore;

create database if not exists  multistore;

use multistore;
-- -----------------------------------------------------
create table if not exists `user`(
    `id` int(10) NOT NULL,
    `username` varchar(15) NOT NULL,
    `password` varchar(60) NOT NULL,
    `name` varchar(20) NOT NULL,
    `surname` varchar(20) NOT NULL,
    `address` varchar(80) NOT NULL,
    `birthday` datetime NOT NULL,
    -- `picture` varchar(2000), mirar como subir imagenes a symfony 
    `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- -----------------------------------------------------

create table if not exists `order`(
    `id` int(10) NOT NULL,
    `address` varchar(80) NOT NULL,
    `amount` float(10) NOT NULL,
    `shipping_costs` float(10) NOT NULL,
    `state` varchar(10) NOT NULL,
    `id_user` int(10) NOT NULL,
    `date` datetime NOT NULL,
    `id_order_product` int(10) NOT NULL,
    `id_store` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- -----------------------------------------------------

create table if not exists `product`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `store` varchar(20) NOT NULL,
    `stock` int(3) NOT NULL,
    `descripcion` varchar(300) NOT NULL,
    -- `picture` varchar(2000), mirar como subir imagenes a symfony
    `price` float(10) NOT NULL,
    `discount` float(5) NOT NULL,
    `second_hand` boolean NOT NULL,
    `id_category` int(10) NOT NULL,
    `id_store` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- -----------------------------------------------------

create table if not exists `store`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `username` varchar(15) NOT NULL,
    `password` varchar(60) NOT NULL,
    `nif` varchar(9) NOT NULL,
    `address` varchar(80) NOT NULL,
    `balance` float(10) NOT NULL,
    `descripcion` varchar(300) NOT NULL,
    `web_page` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `store`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- -----------------------------------------------------

create table if not exists `order_product`(
    `id` int(10) NOT NULL,
    `id_order` int(20) NOT NULL,
    `amount` int(5) NOT NULL,
    `id_product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `order_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- -----------------------------------------------------

 create table if not exists `category`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- -----------------------------------------------------
 
create table if not exists `subcategory`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_category` int(10) NOT NULL,
    `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `subcategory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `desktop`(
    `id` int(10) NOT NULL,
    `model` varchar(20) NOT NULL,
    `mark` varchar(20) NOT NULL,
    `maker` varchar(20) NOT NULL,
    `ram_memory` varchar(20) NOT NULL,
    `ram_technology` varchar(20) NOT NULL,
    `ram_frequency` varchar(20) NOT NULL,
    `hard_disk` varchar(20) NOT NULL,
    `hard_disk_technology` varchar(20) NOT NULL,
    `processor_maker` varchar(20) NOT NULL,
    `processor_model` varchar(20) NOT NULL,
    `processor_velocity` varchar(20) NOT NULL,
    `processor_core` varchar(20) NOT NULL,
    `processor_cache` varchar(20) NOT NULL,
    `graphic_maker` varchar(20) NOT NULL,
    `graphic_model` varchar(20) NOT NULL,
    `graphic_technology` varchar(20) NOT NULL,
    `graphic_capacity` varchar(20) NOT NULL,
    `graphic_interface` varchar(20) NOT NULL,
    `usb_2_0` int(2),
    `usb_3_0` int(2),
    `hdmi` int(2),
    `dvi` int(2),
    `bluetooht` int(2),
    `size` varchar(30),
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `desktop`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `desktop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `laptop`(
    `id` int(10) NOT NULL,
    `model` varchar(20) NOT NULL,
    `mark` varchar(20) NOT NULL,
    `maker` varchar(20) NOT NULL,
    `ram_memory` varchar(20) NOT NULL,
    `ram_technology` varchar(20) NOT NULL,
    `ram_frequency` varchar(20) NOT NULL,
    `hard_disk` varchar(20) NOT NULL,
    `hard_disk_technology` varchar(20) NOT NULL,
    `processor_maker` varchar(20) NOT NULL,
    `processor_model` varchar(20) NOT NULL,
    `processor_velocity` varchar(20) NOT NULL,
    `processor_core` varchar(20) NOT NULL,
    `processor_cache` varchar(20) NOT NULL,
    `graphic_maker` varchar(20) NOT NULL,
    `graphic_model` varchar(20) NOT NULL,
    `graphic_technology` varchar(20) NOT NULL,
    `graphic_capacity` varchar(20) NOT NULL,
    `graphic_interface` varchar(20) NOT NULL,
    `usb_2_0` int(2),
    `usb_3_0` int(2),
    `hdmi` int(2),
    `dvi` int(2),
    `bluetooht` int(2),
    `size` varchar(30),
    `screen_resolution` varchar(30),
    `screen_size` varchar(30),
    `screen_frequency` varchar(30),
    `baterry_capacity` varchar(30),
    `baterry_charge_time` varchar(30),
    `id_subcategory` int(10) NOT NULL,0
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `laptop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `mouse`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `mouse`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mouse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `keyboard`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `keyboard`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `keyboard`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `screen`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `screen`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `screen`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `smartphone`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_category` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `smartphone`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `smartphone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `tablet`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_category` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tablet`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tablet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `headphones`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `headphones`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `headphones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `charger`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `charger`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `charger`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `device_case`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `device_case`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `device_case`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `smartwatch`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `smartwatch`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `smartwatch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `webcam`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `webcam`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `webcam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `hard_disk`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `hard_disk`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `hard_disk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `box`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `box`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `box`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `ram_memory`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `ram_memory`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ram_memory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `motherboard`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `motherboard`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `processor`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `processor`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `processor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `power_supply`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `power_supply`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `power_supply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `graphic_card`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `graphic_card`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `graphic_card`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------

create table if not exists `refrigeration`(
    `id` int(10) NOT NULL,
    `name` varchar(20) NOT NULL,
    `id_subcategory` int(10) NOT NULL,
    `id_porduct` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `refrigeration`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `refrigeration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

-- ------------------------------------------------------




ALTER TABLE `product`
  ADD CONSTRAINT `id_category_fk` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `id_store_fk` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`);

ALTER TABLE `order`
  ADD CONSTRAINT `id_order_fk` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
   ADD CONSTRAINT `id_order_store_fk` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`);

ALTER TABLE `order_product`
  ADD CONSTRAINT `id_code_product_fk` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `id_code_order_fk` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`);

ALTER TABLE `subcategory`
  ADD CONSTRAINT `id_category_sub_fk` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

ALTER TABLE `desktop`
  ADD CONSTRAINT `id_sub_cat_desktop_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_desktop_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `laptop`
  ADD CONSTRAINT `id_sub_cat_laptop_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_laptop_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `mouse`
  ADD CONSTRAINT `id_sub_cat_mouse_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_mouse_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `keyboard`
  ADD CONSTRAINT `id_sub_cat_keyboard_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_keyboard_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `screen`
  ADD CONSTRAINT `id_sub_cat_screen_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_screen_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `smartphone`
  ADD CONSTRAINT `id_cat_smartphone_fk` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `id_product_smartphone_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `tablet`
  ADD CONSTRAINT `id_cat_tablet_fk` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `id_product_tablet_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `headphones`
  ADD CONSTRAINT `id_sub_cat_headphones_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_headphones_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `charger`
  ADD CONSTRAINT `id_sub_cat_charger_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_charger_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `device_case`
  ADD CONSTRAINT `id_sub_cat_device_case_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_device_case_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `smartwatch`
  ADD CONSTRAINT `id_sub_cat_smartwatch_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_smartwatch_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `webcam`
  ADD CONSTRAINT `id_sub_cat_webcam_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_webcam_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `hard_disk`
  ADD CONSTRAINT `id_sub_cat_hard_disk_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_hard_disk_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `box`
  ADD CONSTRAINT `id_sub_cat_box_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_box_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `ram_memory`
  ADD CONSTRAINT `id_sub_cat_ram_memory_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_ram_memory_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `motherboard`
  ADD CONSTRAINT `id_sub_cat_motherboard_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_motherboard_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `processor`
  ADD CONSTRAINT `id_sub_cat_processor_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_processor_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `power_supply`
  ADD CONSTRAINT `id_sub_cat_power_supply_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_power_supply_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `graphic_card`
  ADD CONSTRAINT `id_sub_cat_graphic_card_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_graphic_card_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);

ALTER TABLE `refrigeration`
  ADD CONSTRAINT `id_sub_cat_refrigeration_fk` FOREIGN KEY (`id_subcategory`) REFERENCES `subcategory` (`id`),
  ADD CONSTRAINT `id_product_refrigeration_fk` FOREIGN KEY (`id_porduct`) REFERENCES `product` (`id`);