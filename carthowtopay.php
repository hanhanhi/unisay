<?php
require __DIR__ . '/__connect_db.php';

if (empty($_SESSION['cart'])) {
//    header('Location: product.html');
    echo "<script>alert('目前購物車沒有商品，歡迎到產品頁進行選購。'); location.href = './product.html';</script>";
    exit();
} else if (empty($_SESSION['user'])) {
//    header('Location: login.php');
    echo "<script>alert('欲購買商品，請先登入，或加入會員。'); location.href = './login.php';</script>";
    exit();
}

require __DIR__ . '/cart.php';
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <title>UniSay｜由你說</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/shoppingcart_main.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!-- bootstrap -->


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
                    <li class="icon_product here">
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
            <!-- 進度navbar -->
            <div class="cart_navbar">
                <ul>
                    <li class="cart_light on">
                        <div class="light_image"></div>
                        <div class="light_text"><p class="doubleline">購物清單<br>與修改商品明細</p></div>
                    </li>
                    <li class="cart_light on">
                        <div class="light_image"></div>
                        <div class="light_text"><p>配送與付款方式</p></div>
                    </li>
                    <li class="cart_light">
                        <div class="light_image"></div>
                        <div class="light_text"><p>填寫配送資料</p></div>
                    </li>
                    <li class="cart_light">
                        <div class="light_image"></div>
                        <div class="light_text"><p>完成訂購</p></div>
                    </li>
                </ul>
            </div>
            <!-- 下方內容 -->
            <?php foreach ($sids as $sid): ?>
                <div class="list">
                    <!-- <img src="images/shoppingcart/shoppingbar.svg"> -->
                    <div class="oneproduct_top">
                        <div class="oneproduct_01">
                            <div class="p1">
                                <img src="<?= $sid > 111 ? $p_data[$sid]['pic_id']  : $p_data[$sid]['pic_id'] . $p_data[$sid]['type_pic']?>">
                            </div>
                        </div>

                        <div class="oneproduct_02">
                            <div class="p2">商品名稱
                                <div>
                                    <?= $p_data[$sid]['productname'] ?>
                                </div>
                            </div>

                            <div class="p6">規格
                                <div>
                                    <?= $p_data[$sid]['spec'] ?>
                                </div>
                            </div>

                            <div class="wood">
                                <div class="p7">材質
                                    <div class="sel">
                                        <div class="dont_sel">
                                            <?= $p_data[$sid]['type_name'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="oneproduct_03">

                        <div class="qty">
                            <div class="p3">數量</div>
                                <div class="dont_sel">
                                    <?= $p_data[$sid]['qty'] ?>
                                </div>
                        </div>

                        <div class="p4">單價
                            <div>
                                <?= $p_data[$sid]['price'] ?>
                            </div>
                        </div>

                        <div class="p5">折扣
                            <div>
                                0
                            </div>
                        </div>

                        <div class="p8">小計金額
                            <div data-sid="<?= $p_data[$sid]['sid'] ?>">
                                <?= $p_data[$sid]['qty'] * $p_data[$sid]['price'] ?>
                            </div>
                        </div>
                    </div>


                </div>
            <?php endforeach; ?>


            <div class="totalmoney">金額總計 ▍
                <div class="price">NT <span id="totalPricePay">0</span></div>

                <div class="howtodel">

                    <div class="pay">付款方式 ▍

                        <select name="getpro" class="sel2">
                            <option selected="true">超商付款取貨服務</option>
                            <option>貨到付款-付現</option>
                        </select>

                    </div>

                    <div class="pay">配送方式 ▍

                        <select name="deli" class="sel3">
                            <option selected="true">7-11店配</option>
                            <option>宅配</option>
                        </select>

                    </div>

                </div>

            </div>


            <div class="warning3">
                <p> ˙請確認您購買的商品規格與數量，確認後訂單將無法做任何更改。<br>
                    ˙若您上有其他商品需購買，請點選繼續購物，如要進行結帳，請點選下一步。<br>
                    ˙商品售價將以您實際結帳之即時價格為主，商品數量與優惠等，也將以您實際結帳為準。</p>

                <div class="btn-grs">
                    <div class="btn-keepgoingshop">
                        <a href="product.html">繼續購物</a>
                    </div>

                    <div class="btn-nextstep">
                        <a href="cartfilldatahome.php">下一步</a>
                    </div>
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
<script src="js/shopping_cart.js"></script>


</body>
</html>