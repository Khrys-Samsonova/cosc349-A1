create table users (
    user_ID varchar(10) primary key,
    user_name varchar(62),
    user_password varchar(64),
    user_address varchar(256),
    user_photo varbinary(max)
);

create table meals (
    meal_ID varchar(10) primary key,
    meal_name varchar(64),
    meal_description varchar(256),
    meal_made_date DATE,
    meal_perishable boolean default 0,
    meal_perish_date DATE,
    meal_photo varbinary(max),
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