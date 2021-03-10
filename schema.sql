CREATE DATABASE taskforce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE taskforce;

-- --------------------------------------
-- USERS
-- --------------------------------------
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(128) NOT NULL UNIQUE,
    name VARCHAR(128) NOT NULL,
    password CHAR(64) NOT NULL,
    avatar VARCHAR(512),
    birthday DATE,
    about TEXT,
    city TEXT,
    role INT DEFAULT 0,
    phone INT,
    skype VARCHAR(256),
    telegram VARCHAR(256),
    is_show_profile INT DEFAULT 0,
    is_new_messages INT DEFAULT 0,
    is_new_review INT DEFAULT 0,
    is_new_actions INT DEFAULT 0,
    is_show_contacts INT DEFAULT 0
);


-- --------------------------------------
-- TASK CATGORIES
-- --------------------------------------
CREATE TABLE task_categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_title VARCHAR(256)
);

-- --------------------------------------
-- TASKS
-- --------------------------------------
CREATE TABLE tasks (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    task_title VARCHAR(265),
    task_description TEXT,
    id_category INT,
    city_id INT,
    latitude INT,
    longitude INT,
    price INT,
    finish_date TIMESTAMP,
    status_id INT DEFAULT 0,
    id_executor INT
);

-- --------------------------------------
-- TASK STATUS
-- --------------------------------------
CREATE TABLE task_status (
  status_id INT AUTO_INCREMENT PRIMARY KEY,
  status_name VARCHAR(150)
);

-- --------------------------------------
-- CITITES
-- --------------------------------------
CREATE TABLE cities_list (
  city_id INT AUTO_INCREMENT PRIMARY KEY,
  city_name VARCHAR(150),
  latitude INT,
  longitude INT
);

-- --------------------------------------
-- ATTACHMENT
-- --------------------------------------
CREATE TABLE attachment (
  attachment_id INT AUTO_INCREMENT PRIMARY KEY,
  task_id INT,
  attachment_path VARCHAR(512)
);

-- --------------------------------------
-- PORTFOLIO FILES
-- --------------------------------------
CREATE TABLE portfolio_photos (
  photo_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  photo_path VARCHAR(512)
);

-- --------------------------------------
-- REVIEWS
-- --------------------------------------
CREATE TABLE reviews (
  review_id INT AUTO_INCREMENT PRIMARY KEY,
  executer_id INT,
  customer_id INT,
  mark INT,
  commnt TEXT,
  photo_path VARCHAR(512)
);

-- --------------------------------------
-- MESSAGES
-- --------------------------------------
CREATE TABLE messages (
  message_id INT AUTO_INCREMENT PRIMARY KEY,
  sender_id INT,
  recipient_id INT,
  message INT,
  time DATETIME
);