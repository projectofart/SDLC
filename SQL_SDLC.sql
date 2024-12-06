CREATE TABLE `users` (
  'id' INT AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) UNIQUE,
  `password` varchar(255),
  `email` varchar(255) UNIQUE,
  `full_name` varchar(255),
  `phone` varchar(255),
  `address` text,
  `created_at` timestamp
);

CREATE TABLE `categories` (
  `id` integer PRIMARY KEY,
  `name` varchar(255)
);

CREATE TABLE `products` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `description` text,
  `price` decimal(10,2),
  `stock_quantity` integer,
  `image_url` varchar(255),
  `category_id` integer,
  `created_at` timestamp
);

CREATE TABLE `orders` (
  `id` integer PRIMARY KEY,
  `user_id` integer,
  `order_date` timestamp,
  `total_amount` decimal(10,2),
  `status` varchar(255)
);

CREATE TABLE `order_items` (
  `id` integer PRIMARY KEY,
  `order_id` integer,
  `product_id` integer,
  `quantity` integer,
  `price` decimal(10,2)
);

CREATE TABLE `payments` (
  `id` integer PRIMARY KEY,
  `order_id` integer,
  `payment_date` timestamp,
  `payment_method` varchar(255),
  `payment_status` varchar(255),
  `amount` decimal(10,2)
);

ALTER TABLE `orders` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `order_items` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

ALTER TABLE `order_items` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

ALTER TABLE `payments` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

ALTER TABLE `products` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
