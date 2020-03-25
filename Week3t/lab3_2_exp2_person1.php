<?php
    $birth1 = $_REQUEST["birth1"];
    $today = date("Y-m-d");
    if(strtotime($birth1) > strtotime($today))
        echo "Person 1 will be born in " . date('D, M d, Y', strtotime($birth1)).", Now He wasn't born yet";
    else echo "Person 1 was born in " . date('D, M d, Y', strtotime($birth1)).", Now He is ".abs(2020 - date('Y',strtotime($birth1)))." years old";
?>
