<!DOCTYPE html>
<html>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
        <select name="n">
            <option>1</option>
            <option>2</option>
        <input type="submit" name="sm_get" value="Ready">
</form>

<?php
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        if(!empty($_GET['sm_get'])){
            $n= $_GET['n'];
            echo '<strong>You have allow to upload'.$n.'file.</strong>';
    ?>
       <form action="upload.php" enctype="multipart/form-data" method="POST">
                <?php
                    for($i =0; $i < $n ; $i++){
                        echo '<input name="file[]" type="file" /><br>';
                    }
                ?>    
                    <input type="submit" name="sm_post" value="Upload">
                </form>
    
    </form>
<?php
        }
    }
?>

</body>
</html>