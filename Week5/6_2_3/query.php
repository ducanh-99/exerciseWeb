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

$sql = "SELECT * FROM products";

$result = $connect->query($sql);
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
        <?php while ($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo htmlspecialchars($row['ProductID']) ?></td>
                <td><?php echo htmlspecialchars($row['Product_desc']); ?></td>
                <td><?php echo htmlspecialchars($row['Cost']); ?></td>
                <td><?php echo htmlspecialchars($row['Weight']); ?></td>
                <td><?php echo htmlspecialchars($row['Numb']); ?></td>
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
