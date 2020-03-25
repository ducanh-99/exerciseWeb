<?php
$birth2 = $_REQUEST["birth2"];
$today = date("Y-m-d");
if (strtotime($birth2) > strtotime($today))
    echo "Person 2 will be born in " . date('D, M d, Y', strtotime($birth2)).", Now He wasn't born yet";
else
    echo "Person 2 was born in " . date('D, M d, Y', strtotime($birth2)) . ", Now He is " . abs(2020 - date('Y', strtotime($birth2))) . " years old";
?>