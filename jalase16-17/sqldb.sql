CREATE TABLE todo(
id INT AUTO_INCREMENT PRIMARY KEY,
item_name VARCHAR(255) NOT NULL,
create_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP ,
is_copleted BOOLEAN DEFAULT FALSE,
is_archived BOOLEAN DEFAULT FALSE
);