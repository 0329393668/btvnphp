CREATE TABLE category (
  category_id INT PRIMARY KEY,
  category_name VARCHAR(255)
);

CREATE TABLE product (
  product_id INT PRIMARY KEY,
  product_name VARCHAR(255),
  price DECIMAL(10, 2),
  description TEXT,
  category_id INT,
  FOREIGN KEY (category_id) REFERENCES category(category_id)
);

CREATE TABLE user_info (
  user_id INT PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  address VARCHAR(255)
);

CREATE TABLE order_table (
  order_id INT PRIMARY KEY,
  user_id INT,
  order_date DATETIME,
  status VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES user_info(user_id)
);

CREATE TABLE cart (
  cart_id INT PRIMARY KEY,
  user_id INT,
  product_id INT,
  quantity INT,
  FOREIGN KEY (user_id) REFERENCES user_info(user_id),
  FOREIGN KEY (product_id) REFERENCES product(product_id)
);