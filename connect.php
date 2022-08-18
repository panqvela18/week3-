<?php
// Connect to database
$PDO = new PDO('mysql:host=localhost;port=3306; dbname=data1','root','');
// error exception.
$PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$statement=$PDO->prepare('SELECT * FROM `hogwarts`');
$statement->execute();
$info=$statement->fetchAll(PDO::FETCH_ASSOC);

var_dump($info);


?>



