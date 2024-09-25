CREATE DATABASE api_prex_giphy_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER 'api_prex_giphy_user'@'localhost' IDENTIFIED BY 'SUPERfuerte1234*';
GRANT ALL PRIVILEGES ON api_prex_giphy_db.* TO 'api_prex_giphy_user'@'localhost';
FLUSH PRIVILEGES;