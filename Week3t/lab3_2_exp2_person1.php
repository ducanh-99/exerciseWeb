<?php
    $birth1 = $_REQUEST["birth1"];

    echo "Person 1 was born in " . date('D, M d, Y', strtotime($birth1)).", Now He is ".(2020 - date('Y',strtotime($birth1)))." years old";

?>
