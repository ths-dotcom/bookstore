<!DOCTYPE html>
<html>
<head>
	<title>Các sản phẩm</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>


	<!-- Thanh menu	 -->
	<nav class="navbar navbar-expand-lg navbar-inverse bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="https://freeiconshop.com/wp-content/uploads/edd/book-open-flat.png" style="height:80px; width:80px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a>
            </li>
			      <li class="nav-item">
              <a class="nav-link" href="sanpham.php?page=1&theloai=tatca">Sản phẩm</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="danghot.php?page=1&theloai=Mới nhất" id="navbarDropdown">Đang hot</a>
              <div class="dropdown-content">
              	<div class="dropdown-divider" href="#"></div>
                <a class="dropdown-item" href="danghot.php?page=1&theloai=Mới nhất">Mới nhất</a>
                <div class="dropdown-divider" href="#"></div>
                <a class="dropdown-item" href="danghot.php?page=1&theloai=Bán chạy nhất">Bán chạy nhất</a>
                <div class="dropdown-divider" href="#"></div>
                <a class="dropdown-item" href="danghot.php?page=1&theloai=Giá tốt nhất">Giá tốt nhất</a>
                <div class="dropdown-divider" href="#"></div>
              </div>
            </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="gioithieu.php" id="navbarDropdown">Giới thiệu</a>
                <div class="dropdown-content">
                  <div class="dropdown-divider" href="#"></div>
                  <a class="dropdown-item" href="gioithieu.php">Liên hệ</a>
                  <div class="dropdown-divider" href="#"></div>                  
                  </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tintuc.php">Tin tức</a>
              </li>
          </ul>
          
          <form action="timkiem.php?page=1" class="d-flex" method="post" style="width:500px">
            <input class="form-control me-2" type="search" placeholder="Tìm sách bạn muốn" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Tìm</button>
          </form>

          <a class="navbar-brand" href="giohang.php?id=0">
            <img src="https://png.pngtree.com/png-vector/20191030/ourlarge/pngtree-cart-plain-shoping-trolly-icon-vector-illustration-for-web-png-image_1927620.jpg" style="height:50px; width:50px">
          </a>

        </div>
      </div>
    </nav>
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<h2 style="color:green">Các sản phẩm đang bày bán</h2>
			</div>
			
		</div>
	</div>
	<br>

	<?php

        //Page
        $page = isset($_GET['page']) ? $_GET['page'] : 'rong';
        $theloai= isset($_GET['theloai']) ? $_GET['theloai'] : 'rong';

        $hostName = 'remotemysql.com';
        $userName = 'gZqNASS21b';
        $passWord = '0jDLuMhgCn';
        $databaseName = 'gZqNASS21b';
        $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
        if (!$connect) {
            exit('Kết nối không thành công!');
        }
        //
        if($page==1) $begin = 0;
        else $begin = ($page - 1)*20; 
        

        echo '<div class="container-fluid">
                <div class= "row">
                  <div class="col-md-2">';
        if($theloai == 'tatca')
          echo '<a href="sanpham.php?page=1&theloai=tatca" type="button" class="btn btn-success mt-2" style="width:100%">Tất cả</a>
                ';
        else  
          echo '<a href="sanpham.php?page=1&theloai=tatca" type="button" class="btn btn-outline-success mt-2" style="width:100%">Tất cả</a>
          ';
        
        $sql="SELECT DISTINCT theloai FROM phanloai";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            if($theloai==$row['theloai'])
              echo '
                <a href="sanpham.php?page=1&theloai=' . $row['theloai'] .'" type="button" class="btn btn-success mt-2" style="width:100%">'. $row['theloai'] .'</a>
              ';
            else
              echo '
                <a href="sanpham.php?page=1&theloai=' . $row['theloai'] .'" type="button" class="btn btn-outline-success mt-2" style="width:100%">'. $row['theloai'] .'</a>
            ';
          }
        }
        echo  '</div>
              <div class="col-md-10">
                <div class="row">
               ';
        if($theloai == "tatca")
          $sql="SELECT isbn, tieude, gia, theloai, img_path FROM book
              LIMIT $begin, 20";
        else 
          $sql="SELECT b.isbn, b.tieude, b.gia, b.theloai, b.img_path, p.theloai  
            FROM book b
            INNER JOIN phanloai p ON b.isbn=p.isbn AND p.theloai = '$theloai'
            LIMIT $begin, 20";

        $result = mysqli_query($connect, $sql);
        
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {                        
              echo '<div class="col-md-3">
                <div class="card" style="width: 18rem;">
                   <img class="card-img-top img-thumbnail" src="'
                           . $row['img_path'] . '" style="width:300px;height:300px" alt="Card image cap">
                   <div class="card-body">
                      <div class= "row" style="height:60px">
                          <h5 class="card-title">' . $row['tieude'] . 
                          '</h5>
                      </div>
                      <div class= "row" style="height:40px">
                          <p class="card-text">' . $row['gia'] . 'đ</p>
                      </div>
                      <a href="bookinfo.php?id='. $row['isbn'] . '" class="btn btn-info">Xem chi tiết >></a>
                   </div>
                </div>
                <br>
              </div>';
                
                    }
                }
        echo '</div>
            </div>
          </div>
        </div>
        <br>';



        // Bắt đầu
        $dem;
        if($theloai=='tatca')
          $sql="SELECT count(*) AS dem FROM book";
        else 
          $sql="SELECT count(*) AS dem FROM phanloai
              WHERE theloai = '$theloai'";

        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $dem = $row['dem'];
            }
        }       

        if($dem%20!=0) $dem = (int) ($dem/20 + 1);
        else $dem = $dem/20;
        
        //
        echo'<div class="btn-toolbar mb-3">
                <div class="col-md-8"></div>
                    <div>';
        if($page == 1)
            echo '<a type="button" class="btn btn-outline-secondary disabled" href="sanpham.php?page=' . $page-1 . '&theloai='. $theloai .'" style="width:100px" ><< Trước</a> ';
        else 
            echo '<a type="button" class="btn btn-outline-secondary" href="sanpham.php?page=' . $page-1 .'&theloai='. $theloai .'" style="width:100px" ><< Trước</a> ';


        for($i=1;$i<=$dem;++$i) {
            if($page==$i)
                echo '<a type="button" class="btn btn-secondary" href="sanpham.php?page='. $i .'&theloai='. $theloai .'">'. $i .'</a> ';
            else
                echo '<a type="button" class="btn btn-outline-secondary" href="sanpham.php?page='. $i .'&theloai='. $theloai .'">'. $i .'</a> ';
        }
        if($page==$dem)
            echo '<a type="button" class="btn btn-outline-secondary disabled" href="sanpham.php?page=' . $page+1 .'&theloai='. $theloai .'" style="width:100px">Sau >></a>';
        else 
        echo '<a type="button" class="btn btn-outline-secondary" href="sanpham.php?page='. $page+1 .'&theloai='. $theloai .'" style="width:100px">Sau >></a>';   
        echo'
                </div>
            </div>';       
    ?>
	<br>


	<div class="container-fluid" style="background-color:#3f51b570">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-1">
				<br>
				<img src="https://freeiconshop.com/wp-content/uploads/edd/book-open-flat.png" style='width:80px;height:80px'>
			</div>
			<div class="col-md-6">
				<br>
				<h7>Địa chỉ: 144 - Xuân Thủy - Cầu Giấy - Hà Nội</h7>
				<br>
				<h7>Email: asdfghjkl@gmail.com</h7>
				<br>
				<h7>Điện thoại: 0969696969</h7>
				<br>
				<br> 
			</div>
			<div class="col-md-4">
				<br>
				<h7>Trương Hoàng Sơn</h7>
				<br>
				<h7>Nguyễn Trần Nhật Anh</h7>
				<br>
				<h7>Nguyễn Tiến Đàn</h7>
				<br>
				<br> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<p>Giấy chứng nhận Đăng ký Kinh doanh số **0304132047** do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp ngày 1/1/2021.</p>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>