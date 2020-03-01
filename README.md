# Basic-PHP-Database-Website
A PHP-based website that manages a MySQL database

## Running Locally
You'll need to have an SQL server configured on your local network, import the dumped database, and reconfigure the connection to 
the server in the .php files 
'''php
$mysqli = new mysqli('localhost','apache24','1234','spital');
'''
where 'localhost' is the address to your server, 'apache24' is the username used to access the database, and 
'1234' being the passwod. 'spital' is the name of the schema, leave it unchanged.
