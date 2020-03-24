<?php
$max = 7;
$target_file = array(); //chứa đường dẫn
$imageFileType = array();   //trả về đuôi của tệp tin trên hệ thống
$target_file_RG = array();  //chứa đường dẫn thu gọn
for ($i = 0; $i < $max; $i++) {
    $target_file[$i] = "uploadLab4//" . basename($_FILES["fileToUpload" . $i]["name"]);
    $target_file_RG[$i] = "uploadLab4/" . basename($_FILES["fileToUpload" . $i]["name"]);
}
//$_FILES['nameInputFile']['properties']
//nameInputFile: là name của input file mà các bạn đặt ở form.
//properties: Bao gồm 5 thuộc tính sau đây:
//name: Tên của file các bạn vừa upload lên.
//type: Kiểu dữ liệu của file
//tmp_name: Đường dẫn tạm của file ở trên server.
//error: Trạng thái của file. 0 là không có lỗi (xem thêm)
//size: Dung lượng của file ở đây đơn vị là bytes.
//pathinfo trả về thông tin của tập tin trên hệ thống
$uploadOk = 1;
for ($i = 0; $i < $max; $i++) {
    $imageFileType[$i] = strtolower(pathinfo($target_file[$i], PATHINFO_EXTENSION));
//kiểm tra xem có phải đã up ảnh lên không
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload" . $i]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . "." . "<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image." . "<br>";
            $uploadOk = 0;
        }
    }
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
//không chấp nhận up file ko phải ảnh
    if ($imageFileType[$i] != "jpg" && $imageFileType[$i] != "png" && $imageFileType[$i] != "jpeg" && $imageFileType[$i] != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed." . "<br>";
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
    echo "<img src=" . $target_file_RG[$i] . "  width=\"100px\" height=\"100px\">";
    echo "<br>" . "Name: " . basename($_FILES["fileToUpload" . $i]["name"]) . "<br>";
    echo "Type: " . basename($_FILES["fileToUpload" . $i]["type"]) . "<br>";
    echo "Size: " . basename($_FILES["fileToUpload" . $i]["size"]) . "KB <br>";
    echo "tmp_type: " . basename($_FILES["fileToUpload" . $i]["tmp_name"]) . "<br><br><br><br>";
}
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
    echo "<img src=" . $target_file_RG[$g[$i]] . "  width=\"100px\" height=\"100px\">";
    echo "<br>" . "Name: " . basename($_FILES["fileToUpload" . $g[$i]]["name"]) . "<br>";
    echo "Type: " . basename($_FILES["fileToUpload" . $g[$i]]["type"]) . "<br>";
    echo "Size: " . basename($_FILES["fileToUpload" . $g[$i]]["size"]) . "KB <br>";
    echo "tmp_type: " . basename($_FILES["fileToUpload" . $g[$i]]["tmp_name"]) . "<br><br><br><br>";
}
?>