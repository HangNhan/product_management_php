<?php
include 'dbconnect.php';

if(isset($_POST["submit"])) {
$tensp=$_POST['ten'];
$gia=$_POST['gia'];
$mota=$_POST['mota'];
$hinhanh =$_FILES['hinhanh']['name'];

var_dump($hinhanh);
$target_dir="./image";
$target_file=$target_dir.$hinhanh;
echo "da lay du lieu thanh cong";
if(isset($tensp) && isset($gia) && isset($mota) &&isset($hinhanh)){
     move_uploaded_file($_FILES['hinhanh']['tmp_name'],$target_file);
     
    $sql="INSERT INTO `sanpham`(`masp`, `tensp`, `gia`, `mota`, `imgURL`) 
    VALUES (NULL,'$tensp','$gia','$mota','$hinhanh')";
   
    $result=mysqli_query($conn,$sql);
    
    if ($result==true){
         echo "<script> alert 'Thêm sản phẩm thành công' </script>";
    }

}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-sacale=1.0">

        <title> Thêm sản phẩm </title>
      
</head>
<body>
<button> 
    <a href="index.php"> Quay lại   </a>

    </button>
    <h2> Thêm sản phẩm</h2>
    <form action="#" method="post" enctype="multipart/form-data">
    <label for=""> nhập tên sản phẩm</label><br>
    <input type="text" id="ten" name="ten"> <br>
    <label for="gia">Nhập giá</label> <br>
    <input type="number" id="gia" name="gia"> <br>
    <label for="mota">Mô tả</label><br>
    <textarea name="mota" id="mota" cols="30" rows="10"></textarea><br>
    <label for=""> Hình ảnh</label><br>
    <input type="file" name="hinhanh" id="hinhanh"><br>

    <input type="submit" value="Thêm sản phẩm" name="submit">
    </form>
</body>
</html>




 
