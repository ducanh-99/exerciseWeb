<?php
$name = $_POST['name'];
$class = $_POST['class'];
$university = $_POST['university'];
$dateofbirth = $_POST['dateofbirth'];
$country = $_POST['country'];
$nowaddress = $_POST['nowaddress'];
$curriculum = $_POST['curriculum'];
$aboutyourself = $_POST['aboutyourself'];
$admission = $_POST['admission'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <meta name="author" content="">

    <title>From</title>
    <link type="text/css" rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="container" style="margin: 0px 240px 0px 270px">
    <div class="center">
        <h1>Profile</h1>
    </div>
    <h1>Your information</h1>
    <label>Hi:</label>
    <span><?php echo $name; ?></span><br/>
    <label>Class:</label>
    <span><?php echo $class; ?></span><br/>
    <label>University:</label>
    <span><?php echo $university; ?></span><br/>
    <label>Curriculum</label>
    <span><?php echo $curriculum; ?></span><br/>
    <label>Admission</label>
    <span><?php echo $admission; ?></span><br/>
    <label>Date of Birth:</label>
    <span><?php echo $dateofbirth; ?></span><br/>
    <label>Country:</label>
    <span><?php echo $country; ?></span><br/>
    <label>Now address:</label>
    <span><?php echo $nowaddress; ?></span><br/>
    <label>Hobby:</label>
    <span>
            <?php
            echo '<br>';
            for ($i = 1; $i <= 5; $i = $i + 1)
                if (isset($_POST["hobby{$i}"])) {
                    echo $_POST["hobby{$i}"];
                    echo '<br>';
                }
            ?>
        </span><br/>
    <label>About yourself:</label>
    <span><?php echo $aboutyourself; ?></span><br/>
</div>

</body>
</html>
