<?php

////
//try {

  //  $myPDO = new PDO("mysql:host=localhost;dbname=cjdiaz_nota;charset=UTF8","cjdiaz_nota","rodriguez2017rafael");


  //  $myPDO = new PDO("mysql:host=localhost;dbname=iutjmc_nota;charset=UTF8","iutjmc_notas","rodriguez2017rafael");

//} catch (PDOException $e) 
//{
  //  echo $e->getMessage();
///}
/////


    $servername = "localhost";
    $database = "iutjmc_nota";
    $username = "iutjmc_notas";
    $password = "rodriguez2017rafael";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";
    mysqli_close($conn);



try {

    $myPDO = new PDO("mysql:host=localhost;dbname=$database;charset=UTF8","$username","$password");


} catch (PDOException $e) 
{
   echo $e->getMessage();
}


?>