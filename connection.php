<?php

$link = mysqli_connect ("hostname","username","password","database name");

if(mysqli_connect_error()){
  die("ERROR: Unable to connect to server".mysqli_connect_error());
}

$users = "CREATE TABLE IF NOT EXISTS users(user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,username VARCHAR(30) NOT NULL,email VARCHAR(50) NOT NULL,password VARCHAR(64) NOT NULL,activation VARCHAR(32) NOT NULL,activation2 VARCHAR(32) NOT NULL)";
mysqli_query($link,$users);
$remembername = "CREATE TABLE IF NOT EXISTS remembername(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,authentificator1 CHAR(20) NOT NULL,f2authentificator2 CHAR(64) NOT NULL,user_id INT NOT NULL,expires datetime NOT NULL)";
mysqli_query($link,$remembername);
$forgotpassword = "CREATE TABLE IF NOT EXISTS forgotpassword(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,user_id INT NOT NULL,resetkey CHAR(32) NOT NULL,validationtime INT NOT NULL,status VARCHAR(11) NOT NULL)";
mysqli_query($link,$forgotpassword);
$notes = "CREATE TABLE IF NOT EXISTS notes(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,user_id INT,note TEXT,time INT(10))";
mysqli_query($link,$notes);


 ?>
