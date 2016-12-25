<?php
require __DIR__ . '/__connect_db.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$mid = $_SESSION['user']['sid'];
$sql = "SELECT * FROM `orders` JOIN members ON members.sid=orders.member_sid WHERE `member_sid` = $mid";
$result = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <title>UniSay</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/login_main.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="source/css/bootstrap.min.css" rel="stylesheet">
    <script src="source/js/bootstrap.min.js"></script>


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
                    <li class="icon_aboutus ">
                        <a href="aboutus.html"></a>
                    </li>
                    <li class="icon_product">
                        <a href="product.html"></a>
                    </li>
                    <li class="icon_custom">
                        <a href=""></a>
                    </li>
                    <li class="icon_inspire">
                        <a href=""></a>
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

            <!-- 上方的bar -->
            <div class="upframe">
                <div class="up1">
                    <a href="#">會員專區</a>
                </div>
                <div class="up2">
                    <a href="#">修改資料</a>
                </div>
                <div class="up3 here">
                    <img src="images/member/mushroom.svg">
                    <a href="#">訂單查詢</a>
                </div>
            </div>

            <!-- 下方欄位 -->
            <div class="downframe">
                <p>ORDERS 訂單查詢</p>
                <img src="images/member/line2-01.svg">
            </div>
            <?php
            while ($row = $result->fetch_assoc()): ?>
            <div class="member-content clearfix">
                <div class="member-content-hd">
                    <h4>訂單編號：PO20161116073692</h4>
                </div>
                <div class="member-content-bd">
                    <div class="section">
                        <table class="table-order table-order--detail">
                            <tbody>
                            <tr>
                                <th width="30%">商品名稱</th>
                                <th>數量</th>
                                <th>單價</th>
                                <th>折扣</th>
                                <th>規格</th>
                                <th>小計</th>
                            </tr>
                            <tr>
                                <td><?=$row['sid']?></td>
                                <td>1</td>
                                <td><?=$row['amount']?></td>
                                <td>0</td>
                                <td><?=$row['amount']?></td>
                                <td><?=$row['amount']?></td>

                            </tr>
                            </tbody>
                        </table>
                        <!-- <div class="cart-bill">
                            <ul>
                                <li>
                                    <span>總金額</span>
                                    <span>NT.1000</span>
                                </li>
                                <li>
                                    <span>運費</span>
                                    <span>NT.0</span>
                                </li>
                                <li>
                                    <span>折價卷折扺</span>
                                    <span>NT.0</span>
                                </li>
                                <li>
                                    <span>購物金折扺</span>
                                    <span>NT.245</span>
                                </li>
                                <li class="last">
                                    <span>應付金額</span>
                                    <span>NT.333</span>
                                </li>
                            </ul>
                        </div> -->
                    </div>

                    <!-- /section -->
                    <div class="section section-order-detail">
                        <h5>訂購資料</h5>
                        <table class="table-order">
                            <tbody>
                            <tr>
                                <th>訂購日期</th>
                                <th>收件人</th>
                                <th>出貨日期</th>
                                <th>包裹編號</th>
                                <th width="25%">備註</th>
                            </tr>
                            <tr>
                                <td><?=$row['order_date']?></td>
                                <td><?=$row['nickname']?></td>
                                <td><?=$row['order_date']?></td>
                                <td>15710309</td>
                                <td>已出貨</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="section section-order-detail">
                        <h5>付款及運送方式</h5>
                        <table class="table-order">
                            <tbody>
                            <tr>
                                <th>付款方式</th>
                                <th>付款結果</th>
                                <th>運送方式</th>
                                <th>運送地址</th>
                            </tr>
                            <tr>
                                <td>7-11 門市付款</td>
                                <td><!-- 完成付款 --> </td>
                                <td><!-- 7-11 (蘆三門市) --></td>
                                <td><!-- 新北市蘆洲區三民路6號8號 --></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="section section-order-detail">
                        <h5>發票資訊</h5>
                        <table class="table-order">
                            <tbody>
                            <tr>
                                <th>發票種類</th>
                                <!-- <th>手機載具條碼</th>
                                <th>愛心碼</th>
                                <th>統一編號</th>
                                <th>抬頭</th> -->
                            </tr>
                            <tr>
                                <td>電子發票</td>
                                <!-- <td><span>手機載具條碼</span>---</td>
                                <td><span>愛心碼</span>---</td>
                                <td><span>統一編號</span>---</td>
                                <td><span>抬頭</span>---</td> -->
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <?php endwhile; ?>
            <!-- <div class="ordernum">
                <p>訂單編號</p>
                <p>PO20161116073692</p>
            </div> -->


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