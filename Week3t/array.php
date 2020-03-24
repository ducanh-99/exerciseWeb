<?php
$a = array();
for($i=0;$i<7;$i++){
    $a[$i] = $i*$i;
}
for($i=0;$i<7;$i++){
    echo $i.$a[$i]."<br>";
}
?>