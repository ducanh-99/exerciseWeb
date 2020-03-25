<html>
<head>
<title>Ex_3.1</title>
    <link type="text/css" rel="stylesheet" href="style1.css"/>
</head>
<body>
    <div class="container" style="margin: 0px 270px 0px 270px">
        <div class="center">
            <h1>DATE</h1>
        </div>
        <br/>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
        <div class="row">
            <label class="col-25">Your Name</label>
            <input class="col-75" type = text name="name" required/><br/>
        </div>
        <div class="row">
            <label class="col-25">Date </label>
            <div class="col-75" >
                <select name ="day">
                    <?php 
                        if($_GET["month"] == 2){
                            if($_GET["year"] % 4== 0 && $_GET["year"] % 100 == 0 && $_GET["year"] % 400== 0 ){
                                for($i = 1; $i < 30; $i++){
                                    print("<option>$i</option>");
                                }
                            }
                            else{
                                for($i = 1; $i < 29; $i++){
                                    print("<option>$i</option>");
                                }
                            }
                        }
                        else if($_GET["month"] == 4 ||$_GET["month"] == 6 ||$_GET["month"] == 9
                            ||$_GET["month"] == 11){
                                for($i = 1; $i < 31; $i++){
                                    print("<option>$i</option>");
                                }
                            }
                        else{
                            for($i = 1; $i < 32; $i++){
                                print("<option>$i</option>");
                            }
                        }

                    ?>
                </select>

                <select class="col-18" name="month">
                    <?php 
                        for($i = 1; $i < 13; $i++){
                            print("<option>$i</option>");
                        }
                    ?>
                </select>
                <select class="col-18" name="year">
                    <?php 
                        for($i = 2020; $i > 0; $i--){
                            print("<option>$i</option>");
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <label class="col-25">Time</label>
            <div class="col-75">
                <select name="hour">
                    <?php 
                        for($i = 0; $i < 24; $i++){
                            print("<option>$i</option>");
                        }
                    ?>
                </select>

                <select name ="minute">
                    <?php
                            for($i = 0; $i < 60; $i++){
                            print("<option>$i</option>");
                            }
                        ?>
                </select>

                <select name ="second">
                    <?php
                            for($i = 0; $i < 60; $i++){
                            print("<option>$i</option>");
                            }
                        ?>
                </select>
            </div>
        </div>

        <div class="row">
            <label class="col-25"></label>
            <div class="col-75">
                <input type="submit" name="submit" value="Submit"/>
                <input type="reset" value="Reset"/>
            </div>
        </div>
        <br>
        <hr>
        <br>
            <?php 
            if(isset($_GET["submit"])){
                $name = $_GET["name"];
                $year = $_GET["year"];
                $month = $_GET["month"];
                $day = $_GET["day"];
                $hour = $_GET["hour"];
                $minute = $_GET["minute"];
                $second = $_GET["second"];
                $show = 1;
                if($year % 400 && $month == 2 && $day >29){
                        echo "Năm $year là năm nhuận<br/>";
                        echo "Tháng $month năm $year có 29 ngày!<br/>";
                    }
                else if($year %4 ==0 && $year % 100 ==0 && $month == 2 && $day > 28){
                            echo "Tháng $month năm $year có 28 ngày! <br/>";
                    }
                
                else if(($month == 4 ||$month == 6 ||$month == 9 ||$month == 11) && $day > 31){
                        echo "Tháng $month có tối đa 30 ngày! <br/> ";
                        
                }
            else if(($month == 1 ||$month == 3 ||$month == 5 ||$month == 7 ||$month == 8 ||
            $month == 10 ||$month == 12 )&& $day > 31){
                echo "Tháng $month có tối đa 31 ngày! <br/>";
            }
            else{
                echo "Hello $name! <br/>";
                echo "You have choose to have an appoitment on $hour:$minute:$second, $day/$month/$year <br/>";
                echo "<br/>";
                if($hour > 11){
                    $hour = $hour % 12;
                    echo "In 12 hour, the time and date is  $hour:$minute:$second, $day/$month/$year <br/>";
                }
                else
                    echo "In 12 hour, the time and date is  $hour:$minute:$second, $day/$month/$year <br/>";

                    
            }
            }
        ?>
    </div>
</body>
</html>