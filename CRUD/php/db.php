<?php 

function createDatabase()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Book_Store";

    // create a new connection 
    $con = mysqli_connect($servername, $username, $password);

    //check the connection 
    if(!$con)
        die("Connection Failed".mysqli_connect_error());
    
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);
         
        $sql ="
                CREATE TABLE IF NOT EXISTS books(
                    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    book_name VARCHAR(25) NOT NULL, 
                    publisher VARCHAR(20), 
                    price FLOAT
                );
        ";
        if(mysqli_query($con, $sql)){
            return $con;
        }else 
        echo "cannot create table";
    }
    else 
        echo "Error to Create The DATABASE".mysqli_error($con);        
}