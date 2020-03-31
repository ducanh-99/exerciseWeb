<?php    
// Page class    
class Page {    
    
  // Declare a class member variable    
  var $page;    
  var $title;    
  var $year;    
  var $copyright;    
    
  // The constructor function    
  function Page($title, $year, $copyright)    
  {    
    // Assign values to member variables    
    $this->page = '';    
    $this->title = $title;    
    $this->year = $year;    
    $this->copyright = $copyright;    
    
    // Call the addHeader() method    
    $this->addHeader();    
  }    
    
  // Generates the top of the page    
  function addHeader()    
  {    
    $this->page .= <<<EOD
        <html>    
        <head>    
        <title>$this->title</title>    
        </head>    
        <body>    
        <h1 align="center">$this->title</h1>    
    EOD;    
  }    
    
  // Adds some more text to the page    
  function addContent($content)    
  {    
    $this->page .= $content;    
  }    
    
  // Generates the bottom of the page    
  function addFooter()    
  {    
    $this->page .= <<<EOD
      <div align="center">&copy; $this->year $this->copyright</div>    
      </body>    
      </html>    
    EOD;    
  }    
    
  // Gets the contents of the page    
  function get()    
  {    
    // Keep a copy of $page with no footer    
    $temp = $this->page;    
    
    // Call the addFooter() method    
    $this->addFooter();    
    
    // Restore $page for the next call to get    
    $page = $this->page;    
    $this->page = $temp;    
    
    return $page;    
  }    
}

// Instantiate the page class     
$webPage = new Page('As Easy as it Gets', date('Y'),     
  'Easy Systems Inc.');     
     
// Add something to the body of the page     
$webPage->addContent(     
  "<p align=\"center\">It's so easy to use!</p>n");     
     
// Display the page     
echo $webPage->get();     
?>