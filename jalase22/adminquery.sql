CREATE TABLE products(
id int AUTO_INCREMENT PRIMARY KEY, /*      ایدی محصول و محصولات اتواتیک */
product_code varchar(50) NOT NULL, /*    کد محصول */
product_title varchar(100) NOT NULL, /*  عنوان محصول */
category varchar(100) NOT NULL, /*      دسته بندی محصول */
brand varchar(100) NOT NULL, /*         برند محصول */
image_url varchar(255) NOT NULL, /*    عکس محصول */
product_url varchar(255) , /*   لینک محصول */
short_description TEXT NOT NULL, /*    توضیحات کوتاه */
price DECIMAL(10,2) , /*                 قیمت محصول */
stock_quantity INT DEFAULT 0 , /*        موجودی محصول */
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, /* تاریخ ایجاد محصول */
);
INSERT INTO products(product_code,product_title,category,brand,image_url, product_url,short_description,price,stock_quantity) VALUES
('sku001','Mens T-shirt','clothing','Adidas','./images/image-1.jpg','/products/mens-tshirt1','Adidas Men T-Shirt ....', '21.33','100' ),
('sku002','Mens T-shirt','clothing','Adidas','./images/image-2.jpg','/products/mens-tshirt2','Adidas Men T-Shirt ....', '22.99','100'),
('sku003','Womens T-shirt','clothing','nike','./images/image-3.jpg','/products/womens-tshirt1','nike Men T-Shirt ....', '24.33','100' ),
('sku004','Child T-shirt','clothing','Adidas','./images/image-4.jpg','/products/child-tshirt3','Adidas Men T-Shirt ....', '16.99','100' ),
('sku005','Women T-shirt','clothing','Adidas','./images/image-5.jpg','/products/women-tshirt1','Adidas Men T-Shirt ....', '18.33','100' ),
('sku006','Teen T-shirt','clothing','Adidas','./images/image-6.jpg','/products/teen-tshirt2','Adidas Men T-Shirt ....', '60.33','100' ),
('sku007','Mens T-shirt','clothing','Adidas','./images/image-7.jpg','/products/mens-tshirt3','Adidas Men T-Shirt ....', '22.50','100' );
// جدول کاربران 
CREATE TABLE users(
user-id int AUTO_INCREMENT PRIMARY KEY,
username varchar(100) NOT NULL,
email varchar(100) NOT NULL UNIQUE,
password varchar(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);









