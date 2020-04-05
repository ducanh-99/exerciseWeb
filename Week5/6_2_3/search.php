<?php
$username = "root";
$password = "a123456A";
$server   = "localhost";
$dbname   = "database";

$search = $_REQUEST['search'];
$connect = mysqli_connect($server, $username, $password, $dbname);

if (!$connect) {
    die("Connect Failed :" . mysqli_connect_error());
    exit();
}
echo "Successfully Connected <br>";

$stmt = $connect->prepare("SELECT * FROM `database`.`products` WHERE Product_desc like ?");
$search .="%";
$stmt->bind_param("s", $search);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($result1,$result2,$result3,$result4,$result5);
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP MySQL Query Data Demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<div>
    <h1>Products</h1>
    <table>
        <thead>
        <tr>
            <th>ProductID</th>
            <th>Product_desc</th>
            <th>Cost</th>
            <th>Weight</th>
            <th>Numb</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($stmt->fetch()){ ?>
            <tr>
                <td><?php echo $result1; ?></td>
                <td><?php echo $result2; ?></td>
                <td><?php echo $result3; ?></td>
                <td><?php echo $result4; ?></td>
                <td><?php echo $result5; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</div>
</html>

<?php
$connect->close();
?>
