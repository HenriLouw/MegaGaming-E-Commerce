CREATE DATABASE megagamingdb;

CREATE TABLE products (
    product_id int AUTO_INCREMENT,
    product_name varchar(50),
    product_description varchar(255),
    product_price float(6,2),
    product_img varchar(50),
    PRIMARY KEY (product_id)
);

CREATE TABLE users (
    usersId int AUTO_INCREMENT,
    userName varchar(50),
    userEmail varchar(255),
    userPhone varchar(10),
    userPwd varchar(255),
    PRIMARY KEY (usersId)
);

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_img`) 
VALUES (NULL, 'GTX 1070 TI', 'Dimesions: 300mm x 175mm x 60mm\r\nColour: Black\r\nWeight: 750g\r\nSpecs: 8GB Memory', '7500.00', 'Resources/GPU.png'), 
(NULL, 'Corshair vengance pro', 'Dimesions: 200mm x 10mm x 60mm\r\nColour: Black with RGB\r\nWeight: 150g\r\nSpecs: 2x8GB 3200Mhz', '2000.00', 'Resources/RAM.png'), 
(NULL, 'Pc Case', 'Dimesions: 450mm x 200mm x 600mm\r\nColour: Black & White\r\nWeight: 1800g\r\nSpecs: Tinted Glass & Great airflow', '3000.00', 'Resources/Case.png'), 
(NULL, 'INTEL I9 CPU', 'Dimesions: 100mm x 100mm x 5mm\r\nColour: Grey\r\nWeight: 50g\r\nSpecs: I9 Chip, 5.2Ghz', '8000.00', 'Resources/CPU.png'), 
(NULL, 'SANDISK SSD', 'Dimesions: 150mm x 40mm x 5mm\r\nColour: Black\r\nWeight: 28g\r\nSpecs: 4gb/s read & write', '3000.00', 'Resources/SSD.png'), 
(NULL, 'ASUS Motherboard', 'Dimesions: 300mm x 400mm x 20mm\r\nColour: Black & RGB\r\nWeight: 500g\r\nSpecs: ATX, Bluetooth', '2000.00', 'Resources/board.png'), 
(NULL, 'Corshair PSU', 'Dimesions: 150mm x 150mm x 100mm\r\nColour: Black\r\nWeight: 700g\r\nSpecs: 550W Gold', '1000.00', 'Resources/PSU.png'), 
(NULL, 'LG Monitor', 'Dimesions: 800mm x 400mm x 50mm\r\nColour: Black\r\nWeight: 1300g\r\nSpecs: 4k, 1ms', '4000.00', 'Resources/Monitor.png'), 
(NULL, 'Razor Mouse', 'Dimesions: 100mm x 50mm x 40mm\r\nColour: Black & RGB\r\nWeight: 70g\r\nSpecs: 8000 DPI', '1500.00', 'Resources/mouse.png'), 
(NULL, 'Razor Keyboard', 'Dimesions: 350mm x 100mm x 30mm\r\nColour: Black & RGB\r\nWeight: 450g\r\nSpecs: MX Red Switches', '2000.00', 'Resources/keyboard.png');