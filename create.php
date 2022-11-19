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
         echo "<script>Thêm sản phẩm thành công</script>";
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
    <style>
    body {
        background-color: #04AA6D;
    }

    input[type=submit] {
        color: white;
        background-color: orange;
        border: none;
        padding: 12px;
        width: 100%;
    }

    h2 {
        text-align: center;
        color: white;
        text-transform: uppercase;
        margin-top: 30px;
        margin-bottom: 40px;
    }

    #createForm {
        margin: 20px 20%;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
    }

    .smallCol {
        width: 50%;
        display: inline-block;
    }

    .row {
        width: 100%;
        display: table;
    }

    textarea {
        width: 100%;
        margin-top: 6px;
        margin-bottom: 10px;


    }

    label {
        font-weight: 600;

    }

    input[type=text],
    input[type=number],
    input[type=file] {
        margin-top: 6px;
        margin-bottom: 20px;
        width: 90%;
    }

    .requireCharacter {
        color: red;
    }
    </style>

</head>

<body>
    <a style="color: black;font-size: 20px;" href="index.php"> Quay lại </a>
    <h2> Thêm sản phẩm</h2>
    <div id="createForm">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="smallCol">
                    <label for="">Tên sản phẩm <span class="requireCharacter">*</span></label>
                    <br />

                    <input type="text" id="ten" name="ten">
                </div>

                <div class="smallCol">
                    <label for="gia">Giá sản phẩm <span class="requireCharacter">*</span> </label>
                    <br />
                    <input type="number" id="gia" name="gia">
                </div>
            </div>

            <div>
                <label for="mota">Mô tả <span class="requireCharacter">*</span></label><br>
                <textarea name="mota" id="mota" cols="30" rows="10"></textarea><br>
            </div>

            <label for=""> Hình ảnh <span class="requireCharacter">*</span></label><br>
            <input type="file" name="hinhanh" id="hinhanh"><br>

            <input type="submit" value="Thêm sản phẩm" name="submit">


        </form>
    </div>
</body>

</html>