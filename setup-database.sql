create table users (
    user_ID varchar(10) primary key,
    user_name varchar(62),
    user_password varchar(64),
    user_address varchar(256),
);

create table meals (
    meal_ID varchar(10) primary key,
    meal_name varchar(64),
    meal_description varchar(256),
    meal_made_date DATE,
    meal_perishable boolean default 0,
    meal_perish_date DATE,
    user_meal varchar(10) not null,
    foreign key (user_meal)
        references users(user_ID)
);

create table orders (
    order_ID varchar(10) primary key,
    order_date DATE,
    order_delivered boolean default 0,
    meal varchar(10) not null,
    foreign key (meal)
        references meals(meal_ID)
);

INSERT INTO user (user_ID, user_name, user_address) VALUES ('01', 'Khrys', '309b George st');
INSERT INTO meals (meal_ID, meal_name, meal_description, meal_made_date, meal_perishable, meal_perish_date) VALUES ('01', 'Stew', 'Vege Stew','2021-08-28','1','2021-08-31' );
