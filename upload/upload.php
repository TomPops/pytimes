<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // 检查文件是否是图片
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "文件是一个 " . $check["mime"] . " 类型的图片。";
            $uploadOk = 1;
        } else {
            echo "文件不是一张图片。";
            $uploadOk = 0;
        }
    }
  
    // 检查文件是否已经存在
    if (file_exists($target_file)) {
        echo "对不起，文件已经存在。";
        $uploadOk = 0;
    }
  
    // 检查文件大小
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "对不起，您要上传的文件太大。";
        $uploadOk = 0;
    }
  
    // 允许上传的文件类型
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "对不起，只允许上传 JPG, JPEG, PNG 和 GIF 文件类型。";
        $uploadOk = 0;
    }
  
    // 如果上传失败，则输出错误信息
    if ($uploadOk == 0) {
        echo "对不起，您的文件没有上传成功。";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "文件 " . basename($_FILES["fileToUpload"]["name"]) . " 上传成功。";
        } else {
            echo "对不起，上传过程中出现了错误。";
        }
    }
}
?>