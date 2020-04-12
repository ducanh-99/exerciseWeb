<html>
<head>
<?php
    $username = "root";
    $password = "a123456A";
    $server = "localhost";
    $dbname = "business_service";

    $connect = mysqli_connect($server, $username, $password, $dbname);

    if (!$connect) {
        die("Connect Failed :" . mysqli_connect_error());
        exit();
        }
    echo "Successfully Connected <br>";

    $sql = "SELECT * FROM categories";

    $result = $connect->query($sql);
?>

<title>
    <?php
    // print the window title and the topmost body heading
    $doc_title = 'Category Administration';
    echo "$doc_title\n";
    ?>
</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <table>
            <tr>
                <th>Category_ID</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        <?php while ($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo htmlspecialchars($row['category_id']) ?></td>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
            </tr>
        <?php } ?>
            <tr> 
                <td><input type="text" name="Cat_ID"    size="15" maxlength="10" require/></td>
                <td><input type="text" name="Cat_Title" size="40" maxlength="128" require /></td>
                <td><input type="text" name="Cat_Desc"  size="45" maxlength="255" require/></td>
            </tr>
        </table>
        <input type="hidden" name="add_record" value="1" />
        <input type="submit" name="submit" value="Add Category" />
    </form>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['submit'])) {
            $Cat_ID = $_POST['Cat_ID'];
            $Cat_Title = $_POST['Cat_Title'];
            $Cat_Desc = $_POST['Cat_Desc'];
            $add_record = $_POST['add_record'];

            $len_cat_id = strlen($_POST['Cat_ID']);
            $len_cat_tl = strlen($_POST['Cat_Title']);
            $len_cat_de = strlen($_POST['Cat_Desc']);
        }

        if ($add_record == 1) {
            if (($len_cat_id > 0) and ($len_cat_tl > 0) and ($len_cat_de > 0)){
            $sql  = "insert into categories (category_id, title, description)";
            $sql .= " values ('$Cat_ID', '$Cat_Title', '$Cat_Desc')";
            $result = $connect->query($sql);
            echo"Successfully inserted table!!!</p>" ;
        } else {
            
            echo "<p>Please make sure all fields are filled in ";
            echo "and try again.</p>\n";
        }
    }
}
 ?> 
</body>
</html>
<?php
$connect->close();
?>
