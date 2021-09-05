# COSC349 Assignment 1
## Khrys Samsonova and Oliver Cross

This application (non-functional) is for a meal share service focused on reducing food waste. Restaurants that have extra meals can upload them onto the website by providing some information about the meals and users can place orders on them. There is also a separate website for administrative tasks, where the admin can access fields of the database which are not visible to normal users.


There are three VMs:
The user webserver, which is used by 'normal' users who wish to place an order on the displayed meals.
The admin webserver, which is used by the admins to resolve any administrative issues. Makes sure 'normal' users don't have access to all the data from the database.
The database server, used for storing the required data and information about users, restaurants, meals, and orders


webserver vm and admin vm both read their information from the database vm to display on their own websites


In order to use this application:


1. git clone this repository into your local drive
2. Once you've relocated to the directory which you copied this repository into, run "vagrant up" in your terminal
3. Once that's finished running (might take a while) you can use the sites listed below:


User site link (for making and placing orders): http://127.0.0.1:8080/ 
 
 
Admin site (Used by the admin for administrative purposes such as blocking users and resulting issues): http://127.0.0.1:8081/

