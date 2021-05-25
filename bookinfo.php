<!DOCTYPE html>
<html>
<head>
	<title>Thông tin sách </title>
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

	

	<?php

		$isbn = isset($_GET['id']) ? $_GET['id'] : 'rong';
		
		$cmt = isset($_GET['cmt']) ? $_GET['cmt'] : 'rong';

		$hostName = 'remotemysql.com';
        $userName = 'gZqNASS21b';
        $passWord = '0jDLuMhgCn';
        $databaseName = 'gZqNASS21b';
        $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
        if (!$connect) {
            exit('Kết nối không thành công!');
        }

		if($cmt==1) {
			$hoten = $_POST['hoten'];
			$cmt = $_POST['cmt'];
			$sql = "INSERT INTO binhluan(hoten, ngay, cmt, isbn)
					VALUES ('$hoten', now(), '$cmt', $isbn)";
			if(!mysqli_query($connect, $sql)) echo 'no';
		}

		$dadat = 0;
		$sql= "SELECT soluong from orderdetails
				WHERE isbn = $isbn";
		$result = mysqli_query($connect, $sql);
		if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
				if(isset($row['soluong']))	
					$dadat+= $row['soluong'];
			}
		}

		$sql="SELECT * FROM book
			WHERE isbn = $isbn";

		$theloai;

        $result = mysqli_query($connect, $sql);
		if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
				$theloai = $row['theloai'];
				echo '
				<form method="post" action="muangay.php?id='. $row['isbn'] . '">
				<div class="container" >
					<div class="row">
						<div class="col-md-4">
							<img src="'. $row['img_path'] .'" alt="" style="height:400px;width:100%">
						</div>  
						<div class="col-md-6">
							<div style="height:250px">
								<h2>' . $row['tieude'] .'</h2>
								<h4>Tác giả: ' . $row['tacgia']. '</h4>
								<h3> Giá: ' . $row['gia'] . 'đ</h3>
							
								<h5>Số lượng: </h5>
								<div class="quantity" >	
									<button class="minus-btn disabled" type="button" style="width:30px">-</button>
									<input type="number" id="quantity" value="1" style="width:50px" name="soluong">
									<button class="plus-btn" type="button" style="width:30px">+</button>		
								</div>
								<h3 class="total-price">																	
									<div class="col-md-2">
										<span><i class="fa fa-rupee"></i></span>
										<span id="price"></span>
									</div>								
								</h3>
								<h6>Số lượng còn trong kho: ' . ($row['soluong']-$dadat) . '</h6>
							</div>
							
							<br>';

							


						if(($row['soluong']-$dadat) == 0){
							echo '<h3 style="color:red"> Đã hết hàng </h3>
										</div>
										</div>  
									</div>
								</div>
								</form>
								<br>';
						}
						else {
							echo'<div class="col-md-5">
								<div class="row">										
									<button class="btn btn-danger" style="height:50px">Mua ngay</button>
								</div>
								
								<div class="row">
									<a type="button" href="giohang.php?id='. $row['isbn'] . '" class="btn btn-success mt-2" style="height:50px;text-align:center">Thêm vào giỏ hàng</a>
								</div>
							</div>
						</div>  
					</div>
				</div>
				</form>
				<br>';
						}


				echo'<div class="container">
					<hr  width="100%" size="4px" />
					<h3>Thông tin sản phẩm:</h3>
					<br>
					<h6>Mã hàng: ' . $row['isbn'] . '</h6>
					<br>
					<h6>Tác giả: ' . $row['tacgia'] .  '</h6>
					<br>
					<h6>Nhà xuất bản: ' . $row['nhaxb'] . '</h6>
					<br>
					<h6>Năm xuất bản: ' . $row['namxb'] . '</h6>
					<br>
					<h6>Ngôn ngữ: Tiếng việt</h6>
					<br>
					<h6>Thể loại: ';
				
				$hostName = 'localhost';
				$userName = 'root';
				$passWord = '';
				$databaseName = 'bookstore';
				$connect1 = mysqli_connect($hostName, $userName, $passWord, $databaseName);
				if (!$connect1) {
					exit('Kết nối không thành công!');
				}
				$sql1="SELECT theloai FROM phanloai
				WHERE isbn = $isbn";
				$result1 = mysqli_query($connect1, $sql1);
				if(mysqli_num_rows($result1) > 0) {
					while($row1 = mysqli_fetch_assoc($result1)) {
						echo $row1['theloai'] . ' ';
					}
				}
				mysqli_close($connect1);

				echo '</h6>
					<hr  width="100%" size="4px" />
					<h6>Nội dung:</h6>
					<p>'. $row['noidung'] .'</p>
					<hr  width="100%" size="4px" />
				</div>';	
			}
		}

		$count = 0;
		echo'<div class="container">
				<h3 class="mb-3"> Bình luận </h3>';
		$sql="SELECT hoten, date(ngay) as ngay, cmt FROM binhluan
				WHERE isbn = $isbn";
		$result = mysqli_query($connect, $sql);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo
					'<div>
						<div class="box">
							<div class="box" style="float:left">
								<img src="https://iupac.org/wp-content/uploads/2018/05/default-avatar.png" alt="" style="height:30px;width:30px">
							</div>
							<div class="box" style="margin-left: 40px">
								<h5>' . $row['hoten'] . '</h5>
							</div>
						</div>
						<div class="box"style="padding-left:40px;width:50%">
							
								<h6>' . $row['ngay'] . '</h6>
								<p>' . $row['cmt'] . '</p>
							
						</div>
					</div>
					<br>';
				++$count;
			}
		}
		if($count==0) {
			echo '<h5>Chưa có bình luận nào</h5>
					<br>';
		}


		echo'
			<form action="bookinfo.php?id=' . $isbn . '&cmt=1" method="post">
				<label>Họ và tên</label>
				<input type="text" class="form-control" placeholder="Họ và tên của bạn" required name="hoten" style="width:30%">
				<label>Bình luận</label>
				<textarea  class="form-control" placeholder="Nhập nội dung bình luận" required name="cmt" style="width:60%;height:100px"></textarea>
				<button class="btn btn-outline-success mt-3">Thêm bình luận</button> 
			</form>
		';
		

		echo'<hr  width="100%" size="4px" />
			</div>
			<br>';

		$sql="SELECT b.isbn, b.tieude, b.gia, b.theloai, b.img_path, p.theloai  
				FROM book b
				INNER JOIN phanloai p ON b.isbn=p.isbn AND p.theloai = '$theloai'
				ORDER BY RAND()
				LIMIT 4";
        $result = mysqli_query($connect, $sql);

		echo'
		<div class="container">
        	<h3>Gợi ý cho bạn:</h3>
			<br>
    	</div>';
		echo '<div class="container">
                <div class= "row">';
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
								<p class="card-text">' . $row['gia'] . 'đ -  ' . $row['theloai'] .'</p>
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
		</div>';

		echo '
			<div class="container box mb-4">
				<form style="text-align:center" action="sanpham.php?page=1&theloai=' . $theloai .'" method="post">
					<button style="width:250px;height:50px" class="btn btn-outline-success">Xem thêm >> </button>
				</form>
			</div>';

	?>



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
	<script type="text/javascript" src="script.js"></script>
</body>
</html>