<html>
<head>
<title>
<?php
 $doc_title = 'Business Registration';
 echo "$doc_title\n";
?>
</title>
</head>
<body>
<h1>
<?= $doc_title ?>
</h1>

<?php
 $username = "root";
 $password = "a123456A";
 $server = "localhost";
 $dbname = "business_service";

 $connect = mysqli_connect($server, $username, $password, $dbname);

 // fetch query parameters

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $add_record = $_REQUEST['add_record'];
 $Biz_Name = $_REQUEST['Biz_Name'];
 $Biz_Address = $_REQUEST['Biz_Address'];
 $Biz_City = $_REQUEST['Biz_City'];
 $Biz_Telephone = $_REQUEST['Biz_Telephone'];
 $Biz_URL = $_REQUEST['Biz_URL'];
 $Biz_Categories = $_REQUEST['Biz_Categories'];
}
else{
$Biz_Name = "";
 $Biz_Address = "";
 $Biz_City = "";
 $Biz_Telephone = "";
 $Biz_URL = "";
 $Biz_Categories = "";
 $add_record = 0;

}

 $pick_message = 'Click on one, or control-click on<BR>multiple ';
 $pick_message .= 'categories:';


 // add new business
 if ($add_record == 1) {
     $pick_message = 'Selected category values<br />are highlighted:';
     $sql  = 'INSERT INTO businesses (name, address, city, telephone, ';
     $sql .= ' url) VALUES (?, ?, ?, ?, ?)';
     
     $query = $connect->prepare($sql);
     $query->bind_param("sssis", $Biz_Name, $Biz_Address, $Biz_City, $Biz_Telephone, $Biz_URL);
     $query->execute();
     $resp = $connect->commit(  );
     echo '<p class="message">Record inserted as shown below.</p>';
     $result = $connect->query('SELECT max(business_id) as max FROM businesses');
     $biz_id = $result->fetch_assoc();
 }
?>

<form method="post">
<table>
<tr><td class="picklist"> <?= $pick_message ?>
    <p>
    <select name="Biz_Categories[]" size="4" multiple style="width: 300px;">
        

    <?php
     $sql = "select * from categories";
     $result = $connect->query($sql);
     if ($result)
     while ($row = $result->fetch_assoc()){

         if ($add_record == 1){
             $selected = false;
             if (in_array($row['title'], $Biz_Categories)) {
                 $sql  = 'INSERT INTO biz_categories';
                 $sql .= ' (business_id, category_id)';
                 $sql .= ' VALUES (?, ?)';
                 $query = $connect->prepare($sql);
                 $query->bind_param("is", $biz_id['max'], $row['category_id']);
                 $query->execute();                 
                 $selected = true;
                 echo "<option selected= 'selected'>$row[title]</option>\n";
             }
             if ($selected == false) {
                 echo "<option>$row[title]</option>\n";
             }
         } else {
             echo "<option>$row[title]</option>\n";
         }
     }
    ?> 

    </select>

    </td>
    <td class="picklist">
        <table>
        <tr><td class="FormLabel">Business Name:</td>
            <td><input type="text" name="Biz_Name" size="40" maxlength="255"
                value="<?= $Biz_Name ?>" /></td>
        </tr>
        <tr><td class="FormLabel">Address:</td>
         <td><input type="text" name="Biz_Address" size="40" maxlength="255"
                value="<?= $Biz_Address ?>" /></td>
        </tr>
        <tr><td class="FormLabel">City:</td>
            <td><input type="text" name="Biz_City" size="40" maxlength="128"
                value="<?= $Biz_City ?>" /></td>
        </tr>
        <tr><td class="FormLabel">Telephone:</td>
        <td><input type="text" name="Biz_Telephone" size="40" maxlength="64"
                value="<?= $Biz_Telephone ?>" /></td>
        </tr>
        <tr><td class="FormLabel">URL:</TD>
            <td><input type="text" name="Biz_URL" size="40" maxlength="255"
                value="<?= $Biz_URL ?>" /></td>
        </tr>
        </table>
    </td>
</tr>
</table>
<p>

<input type="hidden" name="add_record" value="1" />

<?php
    if ($add_record == 1){
        echo "<p><a href= 6_6.php>Add Another Business</a></p>";
    } else if($add_record == 0) {
        echo '<input type="submit" name="submit" value="Add Business" />';
 }
?>
</p>
</body>
</html>
