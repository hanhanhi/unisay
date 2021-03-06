<?php
// `$page_name` = 'login';

require __DIR__. '/__connect_db.php';

if(isset($_POST['password'])){
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $nickname = $_POST['nickname'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $password = sha1($password);

    $sql = sprintf("SELECT * FROM `members` WHERE `email_id`='%s' AND `password`='%s'",
        $mysqli->escape_string($_SESSION['user']['email_id']),
        $mysqli->escape_string($password)
    );

    $result = $mysqli->query($sql);

    $success = $result->num_rows>0;

    if($success){
        $row = $result->fetch_assoc();
        if(empty($new_password)){
            $sql = sprintf("UPDATE `members` SET `nickname`='%s',`mobile`='%s',`address`='%s' WHERE `sid`=%s",
                    $mysqli->escape_string($nickname),
                    $mysqli->escape_string($mobile),
                    $mysqli->escape_string($address),
                    $row['sid']
                );
        } else {
            $sql = sprintf("UPDATE `members` SET `password`='%s', `nickname`='%s',`mobile`='%s',`address`='%s' WHERE `sid`=%s",
                sha1($new_password),
                $mysqli->escape_string($nickname),
                $mysqli->escape_string($mobile),
                $mysqli->escape_string($address),
                $row['sid']
                );
        }
        if($mysqli->query($sql)){
            $msg = array(
                'success' => true,
                'info' => '修改完成',
            );
            $_SESSION['user']['nickname'] = $nickname;
            $_SESSION['user']['mobile'] = $mobile;
            $_SESSION['user']['address'] = $address;


        }else{
            $msg = array(
                'success' => false,
                'info' => '錯誤, 請找開發人員',
            );
        }


    } else {
        $msg = array(
            'success' => false,
            'info' => '密碼錯誤',
        );


    }

}
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<title>UniSay</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="css/login_main.css" rel="stylesheet" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"


<!-- Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
 	rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


<!-- fonts -->
 	<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative" rel="stylesheet">
 	<!-- font-family: 'Cinzel Decorative', cursive; -->

 	<link href="https://fonts.googleapis.com/css?family=Amita" rel="stylesheet">
 	<!-- font-family: 'Amita', cursive; -->

 	<link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC" rel="stylesheet">
 	<!-- font-family: 'IM Fell English SC', serif; -->

 	<link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
 	<!-- font-family: 'Fredericka the Great', cursive; -->


</head>


<!-- ====================================================================================== -->


<body>



<!-- 主頁面內容 -->
<div class="wrap">

	<header>

		<!-- 平板手機會fixed的banner -->
		<div class="banner">

			<!-- 三明治選單 -->
			<div class="sandwich"></div>


			<!-- fixed的按鈕 -->

			<div class="cart_icon"></div>
			<div class="cart_sidebar"></div>

			<div class="member_icon"></div>
			<div class="member_sidebar"></div>

			<div class="totop_icon"></div>


			<!-- 中央logo -->
			<div class="logo"><img src="images/header/header_logo.svg" alt=""></div>




			<!-- 上方選單列 -->
			<nav>
				<ul>
					<!-- 當前頁面掛上here的class -->
					<li class="icon_aboutus">
						<a href="aboutus.html"></a>
					</li>
					<li class="icon_product">
						<a href="product.html"></a>
					</li>
					<li class="icon_custom">
						<a href="custom.html"></a>
					</li>
					<li class="icon_inspire">
						<a href="inspire.html"></a>
					</li>
				</ul>
			</nav>


			<!-- 暗幕的背景 -->
			<div class="fixed_shadowbg"></div>

		</div><!-- banner包全部 -->

	</header>


<!-- ====================================================================================== -->


	<content>


		<div class="con">
			<!-- 麵包屑 -->
			<div class="loginnav">
				<p>ACCOUNT-MEMBER</p>
				<img src="images/member/line.svg">
			</div>

			<!-- 中間內容 -->

			<!-- 上方的bar -->
			<div class="upframe">
				<div class="up1 here">
					<img src="images/member/mushroom.svg">
					<a href="memberaccountmember.php">會員專區</a>
				</div>
				<div class="up2">
					<a href="memberaccounteditinfopw.php">修改資料</a>
				</div>
				<div class="up3">
					<a href="member_ordered_list.php">訂單查詢</a>
				</div>
			</div>

			<!-- 下方欄位 -->
			<div class="downframe">
				<p>E-COURPON  購物金查詢</p>
				
				<img src="images/member/line2-01.svg">
				
				<div class="ecourpon">
					<p>您有購物金 100 元。</p>

				</div>

				<div class="howtoget">
					<a href="memberrecycle.html">(如何獲得購物金？)</a>
				</div>

			</div>



		</div>


	</content>


<!-- ====================================================================================== -->


	<footer>



	</footer>


<!-- ====================================================================================== -->


</div><!-- wrap的結尾 -->



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script src="js/nav_icon.js"></script>



</body>
</html>
