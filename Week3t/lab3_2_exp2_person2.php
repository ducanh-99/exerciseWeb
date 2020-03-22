<?php
    $birth2 = $_REQUEST["birth2"];
    echo "Person 2 was born in " . date('D, M d, Y', strtotime($birth2)).", Now He is ".(2020 - date('Y',strtotime($birth2)))." years old";
?>