<?php
// Array with names
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);    //chuyển nội dung người dùng nhập về chữ viết thường
    $len=strlen($q);    //lấy độ dài nội dung người dùng nhập
    foreach($a as $name) {  //duyệt từng phần tử trong mảng a ~ for(name = a[0] to a[n])
        if (stristr($q, substr($name, 0, $len))) {  //tìm kiếm q trong các phần tử của mảng a[]
            //Hàm stristr() sẽ tìm kiếm vị trí đầu tiên xuất hiện của một kí tự hoặc một chuỗi nào đó trong chuỗi nguồn mà không phân biệt in hoa in thường.
            //Hàm trả về một phần của chuỗi gốc tính từ vị trí xuất hiện đầu tiên của kí tự đến vị trí cuối cùng của chuỗi gốc.
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;    //nếu hint = "", in ra no suggestion, ngược lại, in ra $hint
?>