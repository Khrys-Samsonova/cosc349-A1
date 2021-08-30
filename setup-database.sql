create table users (
    user_ID varchar(10) NOT NULL,
    user_name varchar(62),
    user_password varchar(64),
    user_address varchar(256),
    PRIMARY KEY (user_ID)
    /* 
    add photo field
    add dietary requirements?
    */
);

create table restaurants (
    restaurant_ID varchar(10) NOT NULL,
    restaurant_name varchar(62),
    restaurant_address varchar(256),
    restaurant_password varchar(64),
    restaurant_rating tinyint(1)
)

create table meals (
    meal_ID varchar(10) NOT NULL,
    meal_name varchar(64),
    meal_description varchar(256),
    meal_made_date DATE,
    meal_perishable boolean default 0,
    meal_perish_date DATE,
    delivery_options boolean default 0,
    PRIMARY KEY (meal_ID),
    FOREIGN KEY (restaurant_ID) REFERENCES restaurants(restaurant_ID)
    /*
    add photo field
    add allergens
    add meal photo
    */
);

create table orders (
    order_ID varchar(10) NOT NULL,
    order_date DATETIME,
    order_delivered boolean default 0,
    PRIMARY KEY (order_ID),
    FOREIGN KEY (meal_ID) REFERENCES meals(meal_ID),
    FOREIGN KEY (user_ID) REFERENCES users(user_ID)
);

INSERT INTO users (user_ID, user_name, user_password, user_address) VALUES ('01', 'Khrys','123', '309b George st');
INSERT INTO meals (meal_ID, meal_name, meal_description, meal_made_date, meal_perishable, meal_perish_date) VALUES ('01', 'Stew', 'Vege Stew','2021-08-28','1','2021-08-31' );
