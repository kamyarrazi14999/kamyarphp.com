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
user_id int AUTO_INCREMENT PRIMARY KEY,
username varchar(100) NOT NULL,
email varchar(100) NOT NULL UNIQUE,
password varchar(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- جدول سفارشات
CREATE TABLE orders(
order_id int AUTO_INCREMENT PRIMARY KEY, /*       ایدی سفارش */
user_id INT ,       /* ایدی کاربر */
order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, /* تاریخ سفارش */
status varchar(60) , /* وضعیت سفارش */
total_amount DECIMAL(10,2) , /* مبلغ کل سفارش */
FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- جدول سفارشات محصولات
CREATE TABLE orderitems (
order_item_id INT AUTO_INCREMENT PRIMARY KEY, /*  ایدی سفارش */
 order_id INT, /* ایدی سفارش */
 user_id INT, /* ایدی کاربر */
 product_id INT, /* ایدی محصول */
 quantity INT, /* تعداد محصول */
 price DECIMAL(10,2) , /* قیمت محصول */
 FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE , /* اینجا روی ایدی سفارش کاربر در جدول سفارشات می گذاریم */
 FOREIGN KEY (product_id) REFERENCES products(id) /* اینجا روی ایدی محصول در جدول محصولات می گذاریم */
);
CREATE TABLE transactions (
transaction_id INT AUTO_INCREMENT PRIMARY KEY, /* ایدی تراکنش */
order_id INT , /* ایدی سفارش */
user_id INT , /* ایدی کاربر */
amount DECIMAL(10,2) , /* مبلغ پرداختی */
transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, /* تاریخ تراکنش */
payment_method varchar(50) , /* شیوه پرداخت */
 status varchar(50) , /* وضعیت تراکنش */
 transtion_reference varchar(255), /* مرجع تراکنش */
FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE, /* اینجا روی ایدی سفارش کاربر در جدول سفارشات می گذاریم */
 FOREIGN KEY (user_id) REFERENCES users(user_id)
/* اینجا روی ایدی کاربر در جدول کاربران می گذاریم */
);









