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
    <div class="row">
        <label class="col-25">Hi:</label>
        <span class="col-18"><?php echo $name; ?></span><br/>
    </div>
    <div class="row">
        <label class="col-25">Class:</label>
        <span class="col-18"><?php echo $class; ?></span><br/>
    </div>
    <div class="row">
        <label class="col-25">University:</label>
        <span class="col-18"><?php echo $university; ?></span><br/>
    </div>
    <div class="row">
        <label class="col-25">Curriculum</label>
        <span class="col-18"><?php echo $curriculum; ?></span><br/>
    </div>
    <div class="row">
        <label class="col-25">Admission</label>
        <span class="col-18"> <?php echo $admission; ?></span><br/>
    </div>
    <div class="row">
        <label class="col-25">Date of Birth:</label>
        <span class="col-18"><?php echo $dateofbirth; ?></span><br/>
    </div>
    <div class="row">
        <label class="col-25">Country:</label>
        <span class="col-18"><?php echo $country; ?></span><br/>
    </div>
    <div class="row">
        <label class="col-25">Now address:</label>
        <span class="col-18"><?php echo $nowaddress; ?></span><br/>
    </div>
    <div class="row">
        <label class="col-25">Hobby:</label>
        <span class="col-18">
            <?php
            echo '<br>';
            for ($i = 1; $i <= 5; $i = $i + 1)
                if (isset($_POST["hobby{$i}"])) {
                    echo $_POST["hobby{$i}"];
                    echo '<br>';
                }
            ?>
        </span><br/>
    </div>
    <div class="row">
        <label class="col-25">About yourself:</label>
        <span class="col-18"><?php echo $aboutyourself; ?></span><br/>
    </div>
</div>

</body>
</html>
