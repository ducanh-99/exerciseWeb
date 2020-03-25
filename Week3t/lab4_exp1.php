<!DOCTYPE html>
<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
    <select name="n" id="n">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <input type="submit" name="sm_get" value="Ready"/>
    </select>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET['sm_get'])) {
        $n = $_GET['n'];
        ?>
        <form action="upload.php" enctype="multipart/form-data" method="POST">
            <?php
            echo '<br><strong>You have allow to upload ' . "<input type=\"text\" name=\"n1\" id=\"n1\" readonly size=\"2\" value=\"$n\">" . ' file.</strong>';
            for ($i = 0; $i < $n; $i++) {
                echo '<br><input name="fileToUpload' . $i . '" id="fileToUpload' . $i . '" type="file" ><br>';
            }

            ?>
            <input type="submit" name="sm_post" value="Upload">
        </form>
        <?php
    }
}
?>

</body>
</html>