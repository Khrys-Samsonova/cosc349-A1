/*
  Table to store the user information
  User can use the ID and password to log in (non-functional)
  users are only allowed to place orders, not post meals
*/
create table users (
    user_ID varchar(10),
    user_name varchar(62),
    user_password varchar(64),
    user_address varchar(256),
    PRIMARY KEY (user_ID)
);

/*
  Similar to the user, where the ID and password are used to log in
  the restaurants can only post meals, not order them 
*/
create table restaurants (
    restaurant_ID varchar(10),
    restaurant_name varchar(62),
    restaurant_address varchar(256),
    restaurant_password varchar(64),
    restaurant_rating tinyint(1)
);

/*
  List of meals posted by the restaurants
  should be removed from the list once order is placed/delivered
*/
create table meals (
    meal_ID int auto_increment,
    meal_name varchar(64),
    meal_description varchar(256),
    meal_made_date DATE,
    meal_perishable boolean default 0,
    meal_perish_date DATE,
    delivery_options boolean default 0,
    restaurant_meal_ID varchar(10),
    PRIMARY KEY (meal_ID)
    /*
    foreign key (restaurant_meal_ID) references restaurants(restaurant_ID),
    */
);

/*
  List of all the ordered made. 
  Should not have to delete any of these.
  only admin should be able to modify 
  (apart from the order_delivered which can be modified by the restaurants)
*/
create table orders (
    order_ID int auto_increment,
    order_date DATETIME,
    order_delivered boolean default 0,
    PRIMARY KEY (order_ID)
    
);
  /* 
    The commands below (if functional) should be used to link orders to the user and restaurant:
    
    constraint fk_meal_orders foreign key (meal_ID) references meals(meal_ID),
    constraint fk_users foreign key (user_ID) references users(user_ID),
    meal_ID varchar,
    user_ID varchar
  */

/*
  Test Data for all tables
 */ 
INSERT INTO users (user_ID, user_name, user_password, user_address) VALUES ('001', 'Khrys','123', '309b George st');
INSERT INTO users (user_ID, user_name, user_password, user_address) VALUES ('002', 'Cathy','321', '660 Castle st');
INSERT INTO users (user_ID, user_name, user_password, user_address) VALUES ('003', 'Emily','abc123', '110a Leith st');

INSERT INTO restaurants (restaurant_ID, restaurant_name, restaurant_password, restaurant_address) VALUES ('abc1', 'Kind Company','12345', '333 George st');
INSERT INTO restaurants (restaurant_ID, restaurant_name, restaurant_password, restaurant_address) VALUES ('001', 'Hikari Sushi Bar','hikaribar', '363 George st');
INSERT INTO restaurants (restaurant_ID, restaurant_name, restaurant_password, restaurant_address) VALUES ('a1b2c3', 'Zanzibar','abc123', '311 George st');

/* please note that delivery options: 0 is false (pickup) and 1 is true (delivery) */
INSERT INTO meals (meal_ID, meal_name, meal_description, meal_made_date, meal_perishable, meal_perish_date, delivery_options) VALUES ('01', 'Stew', 'Vege Stew','2021-08-28','1','2021-08-31', '0');
INSERT INTO meals (meal_ID, meal_name, meal_description, meal_made_date, meal_perishable, meal_perish_date, delivery_options) VALUES ('02', 'Green Curry', 'Thai Seafood Curry','2021-08-31','1','2021-09-02', '1');
INSERT INTO meals (meal_ID, meal_name, meal_description, meal_made_date, meal_perishable, meal_perish_date, delivery_options) VALUES ('03', 'Cake', 'Chocolate Cake','2021-09-3','1','2021-09-10', '0');
INSERT INTO meals (meal_ID, meal_name, meal_description, meal_made_date, meal_perishable, meal_perish_date, delivery_options) VALUES ('04', 'Sushi', 'Salmon, Avocado Sushi','2021-09-01','1','2021-09-01', '1');

INSERT INTO orders (order_ID, order_date, order_delivered) VALUES ('001','2021-09-03 12:32:03', '0');
INSERT INTO orders (order_ID, order_date, order_delivered) VALUES ('002','2021-09-05 09:50:48', '1');