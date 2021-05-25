<!DOCTYPE html>
<html>
<head>
	<title>Mua hàng</title>
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

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-5">
				<h2 style="color:black">XÁC NHẬN MUA HÀNG</h2>
			</div>
		</div>
	</div>
	<?php
		$id = isset($_GET['id']) ? $_GET['id'] : 'rong';
		$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 'rong';
		
		$hostName = 'remotemysql.com';
        $userName = 'gZqNASS21b';
        $passWord = '0jDLuMhgCn';
        $databaseName = 'gZqNASS21b';
        $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
        if (!$connect) {
            exit('Kết nối không thành công!');
        }
        $sql="SELECT isbn, tieude, gia, img_path FROM book
			WHERE isbn = '$id'";
        $result = mysqli_query($connect, $sql);
		
		echo'<div class="container">';
		echo '<hr  width="100%" size="5px" />';

		$tongtien;
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$tongtien = $row['gia'];
				echo 
					'<div class="row -mb-3">
						<div class="col-md-2 mt-3">
							<img src="' . $row['img_path'] . '" style="height:170px">
						</div>
						<div class="col-md-8 mt-3">
							<h3>Tên sản phẩm: ' . $row['tieude'] . '</h3>
							<h4>Mã sản phẩm: '. $row['isbn'] . '</h4>
							<h4>Giá: ' . $row['gia'] . 'đ</h4>
							<h4>Số lượng: ' . $soluong . '</h4>
						</div>
					</div>';
			}
		}

		echo '<hr  width="100%" size="5px" />';
		echo '<h4>Phí vận chuyển: 30000đ</h4>';
		echo '<h3 style="color:green">Tổng thanh toán: '. (($tongtien * $soluong) + 30000). 'đ</h3>';
		echo '<hr  width="100%" size="5px" />';
		echo '</div>';

	?>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6">
			<?php
				$id = isset($_GET['id']) ? $_GET['id'] : 'rong';
				$soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 'rong';
				echo '<form action="muathanhcong.php?id='. $id . '&soluong=' . $soluong . '" method="post">';
			?>
					<h2>Thông tin khách hàng</h2>
					<div class="row">
						 <div class="col">
						 	<label>Họ và tên</label>
						 	<input type="text" class="form-control" placeholder="Họ và tên của bạn" required name="hoten">
						 	<br>
						 </div>
						 <br>
						 <div class="col">
					 		<label>Số điện thoại</label>
						 	<input type="text" class="form-control" placeholder="Số điện thoại của bạn" required name="sodt">
						 	<br>
					 	</div>
					 	<div class="form-group">
					 		<label>Email</label>
					  		<input type="text" class="form-control" placeholder="Email của bạn" required name="email">
					  		<br>
					 	</div>
					 	<div class="form-group">
					 		<label>Địa chỉ</label>
					  		<input type="text" class="form-control" placeholder="Địa chỉ của bạn" required name="diachi">
					  		<br>
					 	</div>
					 	<div class="form-group">
					 		<label>Phương thức thanh toán</label>
					 		<br>
					  		<select >
					  			<option>Thanh toán khi nhận hàng</option>
					  		</select>
					 	</div>
					</div>
					<br>
					<div class="form-group">
					 	<input type="checkbox" name="">
					 	<label>Tôi không phải Robot</label>
					 	<br>
					 	<br>
					</div>
					<?php
						$id = isset($_GET['id']) ? $_GET['id'] : 'rong';
							echo
							'<div class="form-group">
								<a href="bookinfo.php?id=' . $id .'" class="btn btn-danger">Quay lại</a>
								<button class="btn btn-success">Mua hàng</button>
							</div>';
					?>	
				</form>
			</div>
		</div>
	</div>


	<div class="container-fluid mt-5" style="background-color:#3f51b570">
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