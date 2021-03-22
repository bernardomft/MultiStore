
 The following SQL statements will be executed:

     CREATE TABLE box (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_box_fk (id_subcategory), INDEX id_product_box_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, descripcion VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE charger (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_charger_fk (id_subcategory), INDEX id_product_charger_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE desktop (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, ram_memory VARCHAR(20) NOT NULL, ram_technology VARCHAR(20) NOT NULL, ram_frequency VARCHAR(20) NOT NULL, hard_disk VARCHAR(20) NOT NULL, hard_disk_technology VARCHAR(20) NOT NULL, processor_maker VARCHAR(20) NOT NULL, processor_model VARCHAR(20) NOT NULL, processor_velocity VARCHAR(20) NOT NULL, processor_core VARCHAR(20) NOT NULL, processor_cache VARCHAR(20) NOT NULL, graphic_maker VARCHAR(20) NOT NULL, graphic_model VARCHAR(20) NOT NULL, graphic_technology VARCHAR(20) NOT NULL, graphic_capacity VARCHAR(20) NOT NULL, graphic_interface VARCHAR(20) NOT NULL, usb_2_0 INT DEFAULT NULL, usb_3_0 INT DEFAULT NULL, hdmi INT DEFAULT NULL, dvi INT DEFAULT NULL, bluetooht INT DEFAULT NULL, INDEX id_sub_cat_desktop_fk (id_subcategory), INDEX id_product_desktop_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE device_case (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_device_case_fk (id_subcategory), INDEX id_product_device_case_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE graphic_card (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_graphic_card_fk (id_subcategory), INDEX id_product_graphic_card_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE hard_disk (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_hard_disk_fk (id_subcategory), INDEX id_product_hard_disk_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE headphones (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_headphones_fk (id_subcategory), INDEX id_product_headphones_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE keyboard (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, type VARCHAR(20) NOT NULL, type_2 TINYINT(1) NOT NULL, connector VARCHAR(20) NOT NULL, weight VARCHAR(30) DEFAULT NULL, INDEX id_sub_cat_keyboard_fk (id_subcategory), INDEX id_product_keyboard_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE laptop (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, ram_memory VARCHAR(20) NOT NULL, ram_technology VARCHAR(20) NOT NULL, ram_frequency VARCHAR(20) NOT NULL, hard_disk VARCHAR(20) NOT NULL, hard_disk_technology VARCHAR(20) NOT NULL, processor_maker VARCHAR(20) NOT NULL, processor_model VARCHAR(20) NOT NULL, processor_velocity VARCHAR(20) NOT NULL, processor_core VARCHAR(20) NOT NULL, processor_cache VARCHAR(20) NOT NULL, graphic_maker VARCHAR(20) NOT NULL, graphic_model VARCHAR(20) NOT NULL, graphic_technology VARCHAR(20) NOT NULL, graphic_capacity VARCHAR(20) NOT NULL, graphic_interface VARCHAR(20) NOT NULL, usb_2_0 INT DEFAULT NULL, usb_3_0 INT DEFAULT NULL, hdmi INT DEFAULT NULL, dvi INT DEFAULT NULL, bluetooht INT DEFAULT NULL, bluetooht_version VARCHAR(5) DEFAULT NULL, screen_resolution VARCHAR(30) DEFAULT NULL, screen_size VARCHAR(30) DEFAULT NULL, screen_frequency VARCHAR(30) DEFAULT NULL, baterry_capacity VARCHAR(30) DEFAULT NULL, baterry_charge_time VARCHAR(30) DEFAULT NULL, INDEX id_sub_cat_laptop_fk (id_subcategory), INDEX id_product_laptop_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE motherboard (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_motherboard_fk (id_subcategory), INDEX id_product_motherboard_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE mouse (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, dpi VARCHAR(20) NOT NULL, type VARCHAR(20) NOT NULL, type_2 TINYINT(1) NOT NULL, connector VARCHAR(20) NOT NULL, frequency VARCHAR(20) DEFAULT NULL, INDEX id_sub_cat_mouse_fk (id_subcategory), INDEX id_product_mouse_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, id_store INT DEFAULT NULL, address VARCHAR(80) NOT NULL, amount DOUBLE PRECISION NOT NULL, shipping_costs DOUBLE PRECISION NOT NULL, state VARCHAR(10) NOT NULL, date DATETIME NOT NULL, id_order_product INT NOT NULL, INDEX id_order_fk (id_user), INDEX id_order_store_fk (id_store), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE order_product (id INT AUTO_INCREMENT NOT NULL, id_order INT DEFAULT NULL, id_product INT DEFAULT NULL, amount INT NOT NULL, INDEX id_code_product_fk (id_product), INDEX id_code_order_fk (id_order), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE power_supply (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_power_supply_fk (id_subcategory), INDEX id_product_power_supply_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE processor (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_processor_fk (id_subcategory), INDEX id_product_processor_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, id_category INT DEFAULT NULL, id_store INT DEFAULT NULL, name VARCHAR(20) NOT NULL, model VARCHAR(20) NOT NULL, mark VARCHAR(20) NOT NULL, maker VARCHAR(20) NOT NULL, store VARCHAR(20) NOT NULL, stock INT NOT NULL, descripcion VARCHAR(300) NOT NULL, picture VARCHAR(200) NOT NULL, price DOUBLE PRECISION NOT NULL, discount DOUBLE PRECISION NOT NULL, second_hand TINYINT(1) NOT NULL, dimmensions VARCHAR(30) DEFAULT NULL, weight VARCHAR(30) DEFAULT NULL, year INT DEFAULT NULL, INDEX id_category_fk (id_category), INDEX id_store_fk (id_store), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE ram_memory (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_ram_memory_fk (id_subcategory), INDEX id_product_ram_memory_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE refrigeration (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_refrigeration_fk (id_subcategory), INDEX id_product_refrigeration_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE screen (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, size VARCHAR(4) NOT NULL, resolution VARCHAR(10) NOT NULL, resolution_px VARCHAR(10) NOT NULL, frequency VARCHAR(10) NOT NULL, response_time VARCHAR(5) DEFAULT NULL, shine VARCHAR(8) DEFAULT NULL, view VARCHAR(8) DEFAULT NULL, connectors VARCHAR(8) DEFAULT NULL, INDEX id_sub_cat_screen_fk (id_subcategory), INDEX id_product_screen_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE smartphone (id INT AUTO_INCREMENT NOT NULL, id_category INT DEFAULT NULL, id_porduct INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_cat_smartphone_fk (id_category), INDEX id_product_smartphone_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE smartwatch (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_smartwatch_fk (id_subcategory), INDEX id_product_smartwatch_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, username VARCHAR(15) NOT NULL, password VARCHAR(60) NOT NULL, nif VARCHAR(9) NOT NULL, address VARCHAR(80) NOT NULL, balance DOUBLE PRECISION NOT NULL, descripcion VARCHAR(300) NOT NULL, web_page VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE subcategory (id INT AUTO_INCREMENT NOT NULL, id_category INT DEFAULT NULL, name VARCHAR(20) NOT NULL, descripcion VARCHAR(100) NOT NULL, INDEX id_category_sub_fk (id_category), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE tablet (id INT AUTO_INCREMENT NOT NULL, id_category INT DEFAULT NULL, id_porduct INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_cat_tablet_fk (id_category), INDEX id_product_tablet_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(15) NOT NULL, password VARCHAR(60) NOT NULL, name VARCHAR(20) NOT NULL, surname VARCHAR(20) NOT NULL, address VARCHAR(80) NOT NULL, birthday DATETIME NOT NULL, picture VARCHAR(2000) NOT NULL, role INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     CREATE TABLE webcam (id INT AUTO_INCREMENT NOT NULL, id_porduct INT DEFAULT NULL, id_subcategory INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX id_sub_cat_webcam_fk (id_subcategory), INDEX id_product_webcam_fk (id_porduct), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
     ALTER TABLE box ADD CONSTRAINT FK_8A9483A2AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE box ADD CONSTRAINT FK_8A9483A15CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE charger ADD CONSTRAINT FK_4DE8608C2AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE charger ADD CONSTRAINT FK_4DE8608C15CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE desktop ADD CONSTRAINT FK_96105A42AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE desktop ADD CONSTRAINT FK_96105A415CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE device_case ADD CONSTRAINT FK_F1314C3E2AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE device_case ADD CONSTRAINT FK_F1314C3E15CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE graphic_card ADD CONSTRAINT FK_5184D4582AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE graphic_card ADD CONSTRAINT FK_5184D45815CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE hard_disk ADD CONSTRAINT FK_6212417D2AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE hard_disk ADD CONSTRAINT FK_6212417D15CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE headphones ADD CONSTRAINT FK_61CAF9C2AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE headphones ADD CONSTRAINT FK_61CAF9C15CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE keyboard ADD CONSTRAINT FK_837480952AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE keyboard ADD CONSTRAINT FK_8374809515CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE laptop ADD CONSTRAINT FK_E001563B2AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE laptop ADD CONSTRAINT FK_E001563B15CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE motherboard ADD CONSTRAINT FK_7F7A0F2B2AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE motherboard ADD CONSTRAINT FK_7F7A0F2B15CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE mouse ADD CONSTRAINT FK_AF35B6ED2AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE mouse ADD CONSTRAINT FK_AF35B6ED15CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE `order` ADD CONSTRAINT FK_F52993986B3CA4B FOREIGN KEY (id_user) REFERENCES user (id);
     ALTER TABLE `order` ADD CONSTRAINT FK_F529939811D21947 FOREIGN KEY (id_store) REFERENCES store (id);
     ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE61BACD2A8 FOREIGN KEY (id_order) REFERENCES `order` (id);
     ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE6DD7ADDD FOREIGN KEY (id_product) REFERENCES product (id);
     ALTER TABLE power_supply ADD CONSTRAINT FK_C6E145F32AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE power_supply ADD CONSTRAINT FK_C6E145F315CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE processor ADD CONSTRAINT FK_29C046502AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE processor ADD CONSTRAINT FK_29C0465015CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE product ADD CONSTRAINT FK_D34A04AD5697F554 FOREIGN KEY (id_category) REFERENCES category (id);
     ALTER TABLE product ADD CONSTRAINT FK_D34A04AD11D21947 FOREIGN KEY (id_store) REFERENCES store (id);
     ALTER TABLE ram_memory ADD CONSTRAINT FK_9FF211962AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE ram_memory ADD CONSTRAINT FK_9FF2119615CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE refrigeration ADD CONSTRAINT FK_D51C6EF02AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE refrigeration ADD CONSTRAINT FK_D51C6EF015CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE screen ADD CONSTRAINT FK_DF4C61302AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE screen ADD CONSTRAINT FK_DF4C613015CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE smartphone ADD CONSTRAINT FK_26B07E2E5697F554 FOREIGN KEY (id_category) REFERENCES category (id);
     ALTER TABLE smartphone ADD CONSTRAINT FK_26B07E2E2AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE smartwatch ADD CONSTRAINT FK_32F4A3D52AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE smartwatch ADD CONSTRAINT FK_32F4A3D515CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
     ALTER TABLE subcategory ADD CONSTRAINT FK_DDCA4485697F554 FOREIGN KEY (id_category) REFERENCES category (id);
     ALTER TABLE tablet ADD CONSTRAINT FK_1A2397825697F554 FOREIGN KEY (id_category) REFERENCES category (id);
     ALTER TABLE tablet ADD CONSTRAINT FK_1A2397822AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE webcam ADD CONSTRAINT FK_626C69152AEFEFAB FOREIGN KEY (id_porduct) REFERENCES product (id);
     ALTER TABLE webcam ADD CONSTRAINT FK_626C691515CE69BF FOREIGN KEY (id_subcategory) REFERENCES subcategory (id);
