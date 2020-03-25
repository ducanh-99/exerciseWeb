<!DOCTYPE html>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="style3.css"/>
</head>

<body>
<div class="container" style="margin: 0px 400px 0px 400px">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <div class="center">
            <h1>Upload File</h1>
        </div>
        <br/>
        <div  style="font-size: 10px;">
            <h2>Enter your number of files you want to upload</h2>
        </div>
        <br/>
        <div class="row">
            <label class="col-45" style="font-weight: bold;">Choose your number</label>
            <div class="col-55">
                <select style="float: left;"name="n" id="n">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
                <input type="submit" style="width: 80px;" name="sm_get" value="Ready"/>

            </div>
        </div>

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!empty($_GET['sm_get'])) {
            $n = $_GET['n'];
            ?>
            <form action="upload.php" enctype="multipart/form-data" method="POST">
                <?php
                echo '<br><strong>You have allow to upload ' . "<input type=\"text\"  name=\"n1\" id=\"n1\" readonly size=\"2\" value=\"$n\">" . ' file.</strong><br>';

                for ($i = 0; $i < $n; $i++) {
                    echo '<br><input name="fileToUpload' . $i . '" id="fileToUpload' . $i . '" type="file" ><br>';
                }

                ?>
                <br>
                <div class="row">
                    <label class="col-45"></label>
                    <div class="col-55">
                        <input type="submit" style="width: 80px;" name="sm_post" value="Upload">
                    </div>
                </div>
            </form>
            <?php
        }
    }
    ?>
    <br>
    <br>
</div>
</body>
</html>