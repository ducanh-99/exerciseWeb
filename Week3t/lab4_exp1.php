<!DOCTYPE html>
<html>
<head>
</head>
<body>


<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET" >
        <input  type = number name="n">
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <br>
    <input type="file" name="fileToUpload0" id="fileToUpload0"><br>
    <input type="file" name="fileToUpload1" id="fileToUpload1"><br>
    <input type="file" name="fileToUpload2" id="fileToUpload2"><br>
    <input type="file" name="fileToUpload3" id="fileToUpload3"><br>
    <input type="file" name="fileToUpload4" id="fileToUpload4"><br>
    <input type="file" name="fileToUpload5" id="fileToUpload5"><br>
    <input type="file" name="fileToUpload6" id="fileToUpload6"><br>


    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>