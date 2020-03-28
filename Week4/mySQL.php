<?php
$username = "root"; // Khai báo username
$password = "a123456A";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "database";      // Khai báo database

// Kết nối database tintuc
$connect = mysqli_connect($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if (!$connect) {
    die("Không kết nối :" . mysqli_connect_error());
    exit();
}
echo "Successfully Connected <br>";

// Câu SQL lấy danh sách
$sql = "SELECT email, password, userName FROM user";

// Thực thi câu truy vấn và gán vào $result
$result = $connect->query($sql);

// Kiểm tra số lượng record trả về có lơn hơn 0
// Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
if ($result->num_rows > 0)
{
    // Sử dụng vòng lặp while để lặp kết quả
    while($row = $result->fetch_assoc()) {
        echo "email: " . $row["email"]. " - password: " . $row["password"]. " - userName: " . $row["userName"]."<br>";
    }
}
else {
    echo "Không có record nào";
}

// ngắt kết nối
$connect->close();
?>
