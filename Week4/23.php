<!--Example 2.23. 13.php-->
<?php
class Articles {
    var $db;
    var $result;
    // Accept an instance of the MySQL class
    function __construct($db)
    {
        // Assign the object to a local member variable
        $this->db = $db;
        $this->readArticles();
    }
    function readArticles()
    {
        // Perform a query using the MySQL class
        $sql = "SELECT * FROM database.user";  //bắt đầu từ dòng 0, lấy thêm 5
        $this->result = $this->db->query($sql);
    }
    function fetch()
    {
        return ($this->result)->fetch_assoc();
    }
}

// Create an instance of the MySQL class
$db = new mysqli("localhost", "root", "a123456A", "database");
$articles = new Articles($db);

while ($row = $articles->fetch()) {
    echo '<pre>';
    print_r($row);
    echo '</pre>';
}
$db->close();

class Auth
{


    /**
     * Instance of Session class
     * @var Session
     */
    var $session;


    function Auth(&$dbConn, $redirect, $md5 = true)
    {
        $this->dbConn = &$dbConn;
        $this->redirect = $redirect;
        $this->md5 = $md5;
        $this->session = new Session();
        $this->checkAddress();
        $this->login();
    }
}

?>