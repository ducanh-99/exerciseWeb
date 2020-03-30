<!--Example 2.24. 24_26.php (excerpt)-->
<?php
class Message {
  var $message;
  function setMessage($message)
  {
    $this->message = $message;
  }
  function getMessage()
  {
    return $this->message;
  }
}
class PoliteMessage extends Message {
  function PoliteMessage()
  {
    $this->setMessage('How are you today?');
  }
}

class TerseMessage extends Message {
  function TerseMessage()
  {
    $this->setMessage('Howzit?');
  }
}

class RudeMessage extends Message {
  function RudeMessage()
  {
    $this->setMessage('You look like *%&* today!');
  }
}
//Example 2.25. 24_26.php (excerpt)
class MessageReader {
  var $messages;
  function MessageReader(&$messages) {
    $this->messages = &$messages;
    $this->readMessages();
  }
  function readMessages() {
    foreach ($this->messages as $message) {
      echo $message->getMessage() . '<br />';
    }
  }
}

$classNames = array('PoliteMessage', 'TerseMessage', 'RudeMessage');
$messages = array();
srand((float)microtime() * 1000000); // Prepares random shuffle
for ($i = 0; $i < 10; $i++) {
    shuffle($classNames);
    $messages[] = new $classNames[0]();
}
$messageReader = new MessageReader($messages);
?>