<?php

$filename = "   lap Trinh PHP     Tai greenAcademy.xx.ccc.docx";

if(strlen($filename) > 0 && strpos($filename,'.') > 0){
// Hủy khoảng trắng trước và sau chuỗi
$filename = trim($filename);

// chuyển chữ hoa thành chữ thường
$filename = strtolower($filename);

// chuyển khoảng trắng thì dấu -
$filename = preg_replace('!\s+!','-',$filename);

// Tìm vị trí xuất hiện lần đầu tiên của dấu chấm và cắt lấy tên file
$find_first_dot = strpos($filename,'.');
$name = substr($filename,0,$find_first_dot);

// Tìm vị trí xuất hiện lần cuối của dấu chấm và cắt lấy đuôi file
$find_last_dot = strrpos($filename,'.') + 1;
$extension = substr($filename,$find_last_dot);

// nối tên file và đuôi file 
// $filename = $name + $extension ;
$filename = $name .".". $extension;
echo $filename ."<br/>";
// echo $name . ".". $extension;
} else {
    echo "Sai file";
};
?>

<?php

$text = "Thủ tướng Phạm Minh Chính khẳng định Việt Nam không hình sự hóa các quan hệ dân sự, bảo vệ những doanh nhân kinh doanh chân chính nhưng không thể dung túng những hành vi sai trái.";

if(mb_strlen($text) > 100){
    
    $text = mb_substr($text,0,100); // lấy đoạn chuỗi có 100 ký tự.
    
    $pos = mb_strrpos($text,' '); // lấy đoạn chuỗi có 100 ký tự bỏ bớt chữ bị cắt mất nghĩa.

    $text = mb_substr($text,0,$pos);
    
    echo "$text ...";
} else {
    echo $text;
}


?>
<hr/>
<?php

$chuoi = "Thủ tướng: Bảo vệ doanh nhân chân chính, không dung túng sai trái.";

function stripVN($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);

    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    return $str;
};

$chuoi = stripVN($chuoi);

echo $chuoi;

?>