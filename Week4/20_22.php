<!--Example 2.20. 20_22.php (excerpt)-->
<?php

class StandardHeader
{
    var $header = '';

    function StandardHeader($title)
    {
        $html = <<<EOD
<html>         
<head>         
<title> $title </title>         
</head>         
<body>         
<h1>$title</h1>         
EOD;
        $this->setHeader($html);
    }

    /**
     * General method for adding to the header
     */
    function setHeader($string)
    {
        if (!empty($this->header)) {
            $this->header .= $string;
        } else {
            $this->header = $string;
        }
    }

    /**
     * Fetch the header
     */
    function getHeader()
    {
        return $this->header;
    }
}

//Example 2.21. 20_22.php (excerpt)
class CategoryHeader extends StandardHeader
{
    function CategoryHeader($category, $baseUrl)
    {
        parent::StandardHeader($category);
        $html = <<<EOD
            <p><a href="$baseUrl">Home</a> >         
            <a href="$baseUrl?category=$category">$category</a></p>         
EOD;
        // Call the parent setHeader() method
        $this->setHeader($html);
    }
}

//Example 2.22. 20_22.php (excerpt)

// Set the base URL
$baseUrl = '20_22.php';

// An array of valid categories
$categories = array('PHP', 'MySQL', 'CSS');

// Check to see if we're viewing a valid category
if (isset($_GET['category']) &&
    in_array($_GET['category'], $categories)) {

    // Instantiate the subclass
    $header = new CategoryHeader($_GET['category'], $baseUrl);
} else {

    // Otherwise it's the home page. Instantiate the Parent class
    $header = new StandardHeader('Home');
}

// Display the header
echo $header->getHeader();
?>
<h2>Categories</h2>
<p><a href="<?php echo $baseUrl; ?>?category=PHP">PHP</a></p>
<p><a href="<?php echo $baseUrl; ?>?category=MySQL">MySQL</a></p>
<p><a href="<?php echo $baseUrl; ?>?category=CSS">CSS</a></p>
</body>
</html>