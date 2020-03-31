<?php
    class Hello {
        function sayHello()
        {
            return 'Hello';
        }
    }
    
    class Goodbye extends Hello{
        function sayGoodBye()
        {
        return 'Goodbye World';
        }
    }

    $msg= new Goodbye();
    echo $msg->sayHello().'<br/>';
    echo $msg->sayGoodBye().'<br/>';
?>