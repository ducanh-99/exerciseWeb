<?php
$max = 7;
$target_file = array(); //chứa đường dẫn
$imageFileType = array();   //trả về đuôi của tệp tin trên hệ thống
$target_file_RG = array();  //chứa đường dẫn thu gọn
for ($i = 0; $i < $max; $i++) {
    $target_file[$i] = "uploadLab4//" . basename($_FILES["fileToUpload" . $i]["name"]);
    $target_file_RG[$i] = "uploadLab4/" . basename($_FILES["fileToUpload" . $i]["name"]);
}
$uploadOk = 1;
for ($i = 0; $i < $max; $i++) {
    $imageFileType[$i] = strtolower(pathinfo($target_file[$i], PATHINFO_EXTENSION));
//kiểm tra file đã tồn tại hay chưa
    if (file_exists($target_file[$i])) {
        echo "Sorry, file already exists." . "<br>";
        $uploadOk = 0;
    }
//kiểm tra file có nặng quá 500000 ko
    if ($_FILES["fileToUpload" . $i]["size"] > 500000) {
        echo "Sorry, your file is too large." . "<br>";
        $uploadOk = 0;
    }
}
//upload thất bại
if ($uploadOk == 0) {
    exit('Sorry, your file was not uploaded."."<br>"');
// if everything is ok, try to upload file
} else for ($i = 0; $i < $max; $i++) {
    if (move_uploaded_file($_FILES["fileToUpload" . $i]["tmp_name"], $target_file[$i])) {
        echo "The file " . basename($_FILES["fileToUpload" . "$i"]["name"]) . " has been uploaded." . "<br>";
    } else {
        exit('Sorry, there was an error uploading your file');
    }
}
//hiện thị tệp tin ra màn hình
for ($i = 0; $i < $max; $i++) {
    if ($imageFileType[$i] == "jpg" || $imageFileType[$i] == "png" || $imageFileType[$i] == "jpeg" || $imageFileType[$i] == "gif")
        echo "<div id=\"image$i\" name=\"image$i\"><img src=" . $target_file_RG[$i] . "  width=\"100px\" height=\"100px\"></div>";
    echo "<div id=\"name$i\" name=\"name$i\"><br>" . "Name: " . basename($_FILES["fileToUpload" . $i]["name"]) . "<br></div>";
    echo "Type: " . basename($_FILES["fileToUpload" . $i]["type"]) . "<br>";
    echo "Size: " . basename($_FILES["fileToUpload" . $i]["size"]) . "B <br>";
    echo "tmp_type: " . basename($_FILES["fileToUpload" . $i]["tmp_name"]) . "<br>";
    echo "last modified: " . date("F d Y H:i:s.",filemtime("uploadLab4/".basename($_FILES["fileToUpload" . $i]["name"]))) . "<br><br><br><br>";
}
?>

<?php
//xử lý sắp xêp tệp tin
echo "Sắp xếp theo tên:"."<br>";
$f = array();
$g = array();
for ($i = 0; $i < $max; $i++) $f[$i] = basename($_FILES["fileToUpload" . $i]["name"]);
for ($i = 0; $i < $max; $i++) $g[$i] = $i;
for ($i = 0; $i < $max; $i++) {
    for ($j = $i + 1; $j < $max; $j++) {
        if ($f[$i] > $f[$j]) {
            $tg = $f[$i];
            $f[$i] = $f[$j];
            $f[$j] = $tg;

            $tg = $g[$i];
            $g[$i] = $g[$j];
            $g[$j] = $tg;
        }
    }
}
for ($i = 0; $i < $max; $i++) {
    if ($imageFileType[$g[$i]] == "jpg" || $imageFileType[$g[$i]] == "png" || $imageFileType[$g[$i]] == "jpeg" || $imageFileType[$g[$i]] == "gif")
        echo "<img src=" . $target_file_RG[$g[$i]] . "  width=\"100px\" height=\"100px\">";
    echo "<br>" . "Name: " . basename($_FILES["fileToUpload" . $g[$i]]["name"]) . "<br>";
    echo "Type: " . basename($_FILES["fileToUpload" . $g[$i]]["type"]) . "<br>";
    echo "Size: " . basename($_FILES["fileToUpload" . $g[$i]]["size"]) . "B <br>";
    echo "tmp_type: " . basename($_FILES["fileToUpload" . $g[$i]]["tmp_name"]) . "<br>";
    echo "last modified: " . date("F d Y H:i:s.",filemtime("uploadLab4/".basename($_FILES["fileToUpload" . $g[$i]]["name"]))) . "<br><br><br><br>";
}
?>