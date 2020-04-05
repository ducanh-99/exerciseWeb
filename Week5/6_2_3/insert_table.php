<?php
$username = "root";
$password = "a123456A";
$server   = "localhost";
$dbname   = "database";
$descr = $_POST['descr'];
$weight = $_POST['weight'];
$cost = $_POST['cost'];
$num = $_POST['num'];
$connect = mysqli_connect($server, $username, $password, $dbname);

if (!$connect) {
    die("Connect Failed :" . mysqli_connect_error());
    exit();
}
echo "Successfully Connected <br>";

$sql = "INSERT INTO `database`.`products` (`Product_desc`, `Cost`, `Weight`, `Numb`) VALUES ($descr,$weight,$cost,$num)";
$stmt = $connect->prepare("INSERT INTO `database`.`products` (`Product_desc`, `Cost`, `Weight`, `Numb`) VALUES (?,?,?,?)");
$stmt->bind_param("ssss", $descr, $weight, $cost,$num);
$result = $stmt->execute();
if($result){
    echo "Successfully inserted table!!!"."<br>".$sql;
} else{
    echo "Error inserted table!!!";
}
$connect->close();
?>
