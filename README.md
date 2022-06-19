# Setting up the project
Clone the project to the apache server.

Edit .htaccess file in the Document Root Directory to point towards project directory.

Create database tables for users, services, user_services, inquiries.

Install composer.


## Explaination

This project followed the basic structure explained in here https://www.giuseppemaccario.com/how-to-build-a-simple-php-mvc-framework/


### .htaccess
.htaccess defines the entry point of the application.

Htaccess is a configuration file for the Apache web server, and the mod_rewrite directive tells to Apache that every request will end up to the public/index.php file.

### Composer and autoloader
Composer is a dependency manager for php. It helps to easily manage libraries. We can use the autoloader functionality of the composer to load classes without a hassle.

### model
Model is an object that will represent data. It has a database table structure and will interact with the database crud operations.

### view
Views are responsible of taking data from the controllers and viewing them. They contains html code.

### controller
Controller is responsible for accepting input and converting it into commands that can handle model or views.

### routing
We use symfony route package to deal with urls.
