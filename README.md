# COSC349 Assignment 1
## Khrys Samsonova and Oliver Cross

This aplication (non-functional) is for a meal share service focused on reducing food waste. Restaraunts who have extra meals can upload them onto the website by providing some information about the meals and users can place orders on them. There is also a separete website for administrative tasks, where the admin can access fields of the database which are not visible to normal users.


There are three VMs:
1. The user webserver, which is used by 'normal' users who wish to place an order on the displayed meals. 
2. The admin webserver, which is used by the admins to resolve any administrative issues. Makes sure 'normal' users don't have access to all the data from the database. 
3. The database server, used for storing the required data and information about users, restaraunts, meals, and orders

(HOW THE VMs INTERACT:)


In order to use this application:
1. git clone this reposatory into your local drive
2. Once you've relocated to the directory which you copied this repository into, run "vagrant up" in your terminal
3. Once that's finished running (might take a while) you can use the sites listed below:

 User site link (for making and placing orders): http://127.0.0.1:8080/ 
 Admin site (Used by the admin for administrative purposes such as blocking users and resulting issues): http://127.0.0.1:8081/ 
