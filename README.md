# Placement Management System

<p>
  Placement Management System allows the students to get information about the companies coming to the college. From the dashboard, students can apply for interested companies.
  Additionally, there is an admin panel that helps to manage student data, companies data.
</p>

# Live Demo
### <a href="https://maimt2021team03.000webhostapp.com/"> Click Here </a>

## Database Schema: 

<p align="center">
  <img src="https://res.cloudinary.com/dyolrju8j/image/upload/v1632166331/bg-trans_umnv8t.png" />
</p>

## Technologies Used:

<ul>
  <li> HTML5 </li>
  <li> CSS3 </li>
  <li> BootStrap5 </li>
  <li> PHP </li>
  <li> MySQL </li>
</ul>

## Instructions to Use

1. Download and Install XAMPP.

[Click Here to Download](https://www.apachefriends.org/index.html)

2. Install any Text Editor (Sublime Text or Visual Studio Code or Atom or Brackets).

### Installtion

1. Download as as Zip or Clone this project.
 
2. Extract and Move this project to Root Directory.
```
Local Disc C: -> xampp -> htdocs -> 'this project'
```
*Local Disk C is the location where xampp was installed*.

3. Open XAMPP Control Panel and Start 'Apache' and 'MySQL'.

4. Extract and Import Database

  a. Open 'phpmyadmin' in your browser.

  b. Create a Database ('pms').

  c. Import the SQL file provided with this project ('./db/pms.db').

5. Make Changes to settings

  Go to 'config' folder and Open 'db_con.php' file. Then make changes on following constants

```php
<?php 

//Create Constants to save Database Credentials
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');    //Your Database username instead of 'root'
define('PASSWORD', '');        //Your Database Password instead of null/empty
define('DB_NAME', 'pms');      //Your Database Name if it's not 'pms'

$con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DB_NAME);
if ($con->connect_errno) die("Connection failed: " . $con->connect_errno);

?>
```

6. Now, Open the project in your browser. It should run perfectly.
