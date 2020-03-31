<?php        
class Hello {        
  function getMessage()        
  {        
    return 'Hello World!';        
  }        
}        
        
class Goodbye extends Hello {        
  function getMessage()        
  {        
    $parentMsg = parent::getMessage();        
    return $parentMsg . '<br />Goodbye World!';        
  }        
}        
        
$goodbye = new Goodbye();        
echo $goodbye->getMessage() .'<br />';        
?>