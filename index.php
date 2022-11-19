<?php
include 'dbconnect.php';
$sql ="select * from `sanpham`";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ </title>

    <style>
    #productList {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #productList td,
    #productList th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #productList tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #productList tr:hover {
        background-color: #ddd;
    }


    #productList th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;


    }

    button {
        background-color: #2F54EB;
        padding: 8x 16px;


    }

    button a {

        color: white;
    }


    a {
        text-decoration: none;
    }
    </style>
</head>

<body>

    <h2> Danh sách các sản phẩm </h2>
    <button>
        <a href="create.php"> Thêm sản phẩm </a>

    </button>

    <table id="productList">
        <tr>
            <th>Mã sản phẩm </th>
            <th>Tên sản phẩm </th>
            <th>Giá </th>
            <th>Mô tả </th>
            <th>Hình ảnh </th>
            <th></th>
        </tr>
        <?php
        while($row =mysqli_fetch_assoc($result)){ 
        ?>
        <tr>
            <td><?=$row['masp'] ;?></td>
            <td><?=$row['tensp'] ;?></td>
            <td><?=$row['gia'] ;?></td>
            <td><?=$row['mota'] ;?></td>
            <td><img width="200" height="200" src="./image/<?=$row['imgURL'] ;?>" alt=""></td>
            <td>
                <a href="update.php?id=<?= $row['masp']?>">Sửa</a>

                <a href="delete.php?id=<?= $row['masp']?>" onclick="return deleteProduct()">Xoá </a>
            </td>
        </tr>
        <script>
        function deleteProduct() {
            var conf = confirm(`Bạn có chắc muốn xóa sản phẩm không?`);
            return conf;
        }
        </script>
        <?php 
        }
        ?>

    </table>

</body>

</html>