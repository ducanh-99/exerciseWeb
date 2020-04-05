<?php
$username = "root";
$password = "a123456A";
$server   = "localhost";
$dbname   = "database";

$connect = mysqli_connect($server, $username, $password, $dbname);

if (!$connect) {
    die("Connect Failed :" . mysqli_connect_error());
    exit();
}
echo "Successfully Connected <br>";

$sql = "CREATE TABLE `database`.`products` (
  `ProductID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Product_desc` VARCHAR(50) NULL,
  `Cost` INT NULL,
  `Weight` INT NULL,
  `Numb` INT NULL,
  PRIMARY KEY (`ProductID`));
";

$result = $connect->query($sql);
if($result){
    echo "Successfully created table!!!"."<br>".$sql;
} else{
    echo "Error Created table!!!";
}
$connect->close();
?>
