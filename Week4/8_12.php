<!--Example 2.8. 8_12.php (excerpt)-->

<?php
//window.propertag.cmd.push(function() {
//proper_display('sitepoint_content_8');
//});



// Look and feel contains $color and $size
class LookAndFeel {
    var $color;
    var $size;
    function LookAndFeel()
    {
        $this->color = 'white';
        $this->size = 'medium';
    }
    function getColor()
    {
        return $this->color;
    }
    function getSize()
    {
        return $this->size;
    }
    function setColor($color)
    {
        $this->color = $color;
    }
    function setSize($size)
    {
        $this->size = $size;
    }
}
//Next, we have a class that deals with rendering output:
//Example 2.9. 8_12.php (excerpt)
// Output deals with building content for display
class Output {
    var $lookandfeel;
    var $output;

    // Constructor takes LookAndFeel as its argument
    function Output($lookandfeel)
    {
        $this->lookandfeel = $lookandfeel;
    }
    function buildOutput()
    {
        $this->output = 'Color is ' . $this->lookandfeel->getColor() .
            ' and size is ' . $this->lookandfeel->getSize();
    }
    function display()
    {
        $this->buildOutput();
        return $this->output;
    }
}
//Notice the constructor for the Output class. It takes an instance of LookAndFeel as its argument so that, later, it can use this to help build the output for the page. We'll talk more about the ways classes interact with each other later in this chapter.
//Here's how we use the classes:
//Example 2.10. 8_12.php (excerpt)
// Create an instance of LookAndFeel
$lookandfeel = new LookAndFeel();

// Pass it to an instance of Output
$output = new Output($lookandfeel);

// Display the output
echo $output->display();
?>

<!--Example 2.11. 6.php (excerpt)-->
<?php
$lookandfeel = new LookAndFeel(); // Create a LookAndFeel
$output = new Output($lookandfeel); // Pass it to an Output

// Modify some settings
$lookandfeel->setColor('red');
$lookandfeel->setSize('large');

// Display the output
echo $output->display();
//Using the setColor and setSize methods, we change the color to "red" and the size to "large," right? Well, in fact, no. The output display still says:
//Color is white and size is medium
//Why is that? The problem is that we've only passed a copy of the LookAndFeel object to $output. So the changes we make to $lookandfeel have no effect on the copy that $output uses to generate the display.
//To fix this we have to modify the Output class so that it uses a reference to the LookAndFeel object it is given. We do this by altering the constructor:
?>


<!--Example 2.12. 7.php (excerpt)-->
<?php
function Output(&$lookandfeel)
{
    $this->lookandfeel = &$lookandfeel;
}


//$myObject = new MyClass();

class Bar
{
}

class Foo
{
// Return by reference
    function getBar()
    {
        return new Bar();
    }
}

$foo = new Foo();

$bar = $foo->getBar();
function display($message)
{
    echo $message;
}

$myMessage = 'Hello World!';

display($myMessage);

$myMessage = 'Hello World!';

display($myMessage);
?>