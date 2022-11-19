<?php
require("dbconnect.php");
$masp = (int) $_GET['id'];
$sql ="SELECT * FROM `sanpham` WHERE `masp` ='$masp'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);
$img=$row['imgURL'];
if(isset($_POST["submit"])) {
    $tensp=$_POST['ten'];
    $gia=$_POST['gia'];
    $mota=$_POST['mota'];
    $hinhanh =$_FILES['hinhanh']['name'];
    $target_dir="./image";
    if($hinhanh){
        if (file_exists("./images/".$img)){
            unlink("./images/".$img);
        }
        $target_file=$target_dir.$hinhanh;  
    }else{
        $target_file=$target_dir.$img;
        $hinhanh=$img;
    }
    // var_dump($hinhanh);
    // $target_file=$target_dir.$hinhanh;
if(isset($tensp) && isset($gia) && isset($mota) &&isset($hinhanh)){
         move_uploaded_file($_FILES['hinhanh']['tmp_name'],$target_file);
         
        $sql="UPDATE `sanpham` SET `tensp`='$tensp',`gia`='$gia',`mota`='$mota',`imgURL`='$hinhanh' WHERE `masp`=$masp";   
        mysqli_query($conn,$sql);
        header("Location:index.php");
    
}
    
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>
<body>
<button> 
    <a href="index.php"> Quay về   </a>

    </button>
    <h2>Cập nhật  sản phẩm</h2>
    <form action="#" method="post" enctype="multipart/form-data">
    
    <label for="">Nhập tên sản phẩm</label><br>
    <input type="text" id="ten" name="ten" value="<?=$row["tensp"]?>"> <br>

    <label for="gia">Nhập giá</label> <br>
    <input type="number" id="gia" name="gia" value="<?=$row["gia"]?>"> <br>

    <label for="mota">Mô tả</label><br>
    <textarea name="mota" id="mota" cols="30" rows="10"><?=$row["mota"]?></textarea><br>
    
    <label for="">Hình ảnh</label><br>
    <input type="file" name="hinhanh" id="hinhanh"><br>
    <img style="width:200px;height:200px;" src="./image/<?=$row['imgURL'] ;?>" alt=""> <br>
    
    <button type="submit" value="Thêm sản phẩm" name="submit"> 
    Cập nhật sản phẩm
    </button>
    </form>

</body>
</html>