<?php        
class A {        
    var $a = 1;        
    function printA()        
    {        
        echo $this->a;        
    }        
}        
        
class B extends A {        
    var $a = 2;        
    function printA()        
    {        
       parent::printA();        
       echo "<br>Wasn't that great?";        
    }        
}        
        
$b = new B();        
$b->printA();        
?>