<?php 

// Generates the top of the page  
function addHeader($page, $title)
{
    $page .= <<<EOD
        <html>  
        <head>  
        <title>$title</title>  
        </head>  
        <body>  
        <h1 align="center">$title</h1>  
    EOD;
    return $page;
}

// Generates the bottom of the page
function addFooter($page, $year, $copyright){
    $page .= <<<EOD
        <div align="center">&copy; $year $copyright</div>
        </body>  
        </html>  
    EOD;
    return $page;
}

// Initialize the page variable  
$page = '';   

// Add the header to the page  
$page = addHeader($page, 'A Prodecural Script');  

// Add something to the body of the page  
$page .= <<<EOD
    <p align="center">This page was generated with a procedural  
    script</p>
EOD;

// Add the footer to the page  
$page = addFooter($page, date('Y'), 'Procedural Designs Inc.');  
  
// Display the page  
echo $page; 

?>